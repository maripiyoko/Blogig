<?php
class Users extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('article_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->login();
    }

    public function home()
    {
        if($this->_display_home_page_if_user_logged_in()) {
            return;
        } else {
            $this->login();
        }
    }

    public function login()
    {
        if($this->_display_home_page_if_user_logged_in()) {
            return;
        }

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
                $this->_display_home_page($query['id'], $query['blog_name']);
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

    function _display_home_page_if_user_logged_in()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $user_data_array = array(
            $this->session->userdata('user_id'),
            $this->session->userdata('user_name'),
            $this->session->userdata('blog_name')
        );
        foreach ($user_data_array as $value) {
            if(isset($value) === FALSE || empty($value)) {
                return FALSE;
            }
        }
        $this->_display_home_page($this->session->userdata('user_id'),
            $this->session->userdata('blog_name'));
        //echo 'User is already logged in!';
        return TRUE;
    }

    function _display_login_page($data = array())
    {
        $data['title'] = 'Login';
        $this->load->view('templates/header', $data);
        $this->load->view('login');
        $this->load->view('templates/footer');
    }

    function _display_home_page($user_id, $blog_name)
    {
        $data['articles'] = $this->article_model->get_articles($user_id);
        $data['title'] = $blog_name;
        $this->load->view('templates/header', $data);
        $this->load->view('home');
        $this->load->view('articles/index', $data);
        $this->load->view('templates/footer');
    }
}

/* end of controllers/users.php */