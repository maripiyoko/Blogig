<?php
class Users extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
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
            'blog_description' => $query['blog_description']
        );
        $this->session->set_userdata($user_data);
    }


    function _display_login_page($data = array())
    {
        $data['page_title'] = 'Login';
        $this->load->view('login', $data);
    }

}

/* end of controllers/users.php */