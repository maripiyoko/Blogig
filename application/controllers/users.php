<?php
class Users extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function login()
    {
        $this->form_validation->set_rules('user_name', 'User name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->_display_login_page();
        } else {
            $query = $this->user_model->login();
            if(isset($query['error'])) {
                $data = $query;
                $this->_display_login_page($data);
            } else {
                // success login
                $this->_save_blog_info($query);
                redirect('home');
            }
        }
    }

    function _save_blog_info($query)
    {
        $user_data = array(
            'user_id' => $query['id'],
            'user_name' => $query['user_name'],
            'blog_name' => $query['blog_name'],
            'blog_title' => $query['blog_title'],
            'blog_description' => $query['blog_description']
        );
        $this->session->set_userdata($user_data);
    }


    function _display_login_page($data = array())
    {
        $data['page_title'] = 'Login';
        $this->load->view('login', $data);
    }

    public function logout()
    {
        $user_data = array(
            'user_id' => '',
            'user_name' => '',
            'blog_name' => '',
            'blog_title' => '',
            'blog_description' => ''
        );
        $this->session->unset_userdata($user_data);
        redirect('blogs');
    }


    public function create()
    {
        $this->output->enable_profiler(TRUE);
        $data['page_title'] = '新規ユーザー作成';
        // create new user and its blog
        $this->form_validation->set_rules('user_name', 'ユーザー名', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'パスワード',
            'trim|required|matches[passconf]|md5');
        $this->form_validation->set_rules('passconf', 'パスワードの確認',
            'trim|required');
        $this->form_validation->set_rules('blog_name', 'ブログ識別名',
            'trim|required|min_length[5]|max_length[12]|alpha_dash');
        $this->form_validation->set_rules('blog_title', 'ブログタイトル', 'required');
        if ($this->form_validation->run() === TRUE && $this->user_model->create()) {
            $this->load->view('users/success', $data);
        }
        $this->load->view('users/create', $data);
    }
}

/* end of controllers/users.php */