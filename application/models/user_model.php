<?php
class User_model extends CI_Model
{
    var $id = '';
    var $user_name = '';
    var $password_digest = '';
    var $blog_name = '';
    var $blog_title = '';
    var $blog_description = '';
    var $date_created = '';
    var $date_modified = '';

    function __construct()
    {
        $this->load->database();
        $this->load->helper('security');
    }

    public function login()
    {
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');

        $password_digest = do_hash($password);
        echo "\"".$password_digest."\"";

        $condition =  array('user_name' => $user_name,
            'password_digest' => $password_digest);
        $query = $this->db->get_where('users', $condition);
        if($query->num_rows() === 1) {
            return $query->row_array();
        } else {
            return array('error' => 'ユーザー名またはパスワードが違います。ログインできません。');
        }
    }

    public function get_blog_title($blog_name)
    {
        $query = $this->db->select('blog_title')
            ->where('blog_name', $blog_name)
            ->get('users');
        if($query->num_rows() === 1) {
            $data['blog_title'] = $query->row()->blog_title;
        } else {
            $data['error'] = 'お探しのブログは見つかりませんでした。';
        }
        return $data;
    }

    public function create()
    {
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        $password_digest = do_hash($password);
        $blog_name = $this->input->post('blog_name');
        $blog_title = $this->input->post('blog_title');
        $today = get_formatted_today();

        $data = array(
           'user_name' => $user_name,
           'password_digest' => $password_digest,
           'blog_name' => $blog_name,
           'blog_title' => $blog_title,
           'date_created' => $today
        );

        return $this->db->insert('users', $data);
    }
}
/* end of models/user_model.php */