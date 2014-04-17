<?php
class User_model extends CI_Model
{
    var $id = '';
    var $user_name = '';
    var $password = '';
    var $blog_name = '';
    var $blog_description = '';
    var $date_created = '';
    var $date_modified = '';

    function __construct()
    {
        $this->load->database();
    }

    public function login()
    {
        $this->user_name = $this->input->post('user_name');
        $this->password = $this->input->post('password');

        $condition =  array('user_name' => $this->user_name,
            'password' => $this->password);
        $query = $this->db->get_where('users', $condition);
        if($query->num_rows() === 1) {
            return $query->row_array();
        } else {
            return array('error' => 'ユーザー名またはパスワードが違います。ログインできません。');
        }
    }
}
/* end of models/user_model.php */