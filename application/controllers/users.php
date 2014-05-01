<?php
class Users extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('image_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('my_image_handler');
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
        //$this->output->enable_profiler(TRUE);
        $data['page_title'] = '新規ユーザー作成';
        // create new user and its blog
        $this->form_validation->set_rules('user_name', 'ユーザー名',
            'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('password', 'パスワード',
            'trim|required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'パスワードの確認',
            'trim|required');
        $this->form_validation->set_rules('blog_name', 'ブログ識別名',
            'trim|required|min_length[5]|max_length[12]|alpha_dash');
        $this->form_validation->set_rules('blog_title', 'ブログタイトル', 'required');

        if ($this->form_validation->run() === TRUE && $this->user_model->create())
        {
            $query = $this->user_model->login();
            if(isset($query['error'])) {
                $data = $query;
            } else {
                // success login
                $this->_save_blog_info($query);
                redirect('home');
            }
        }
        // error
        $this->load->view('users/create', $data);
    }

    public function valid_user_name($user_name)
    {
        return $this->user_model->is_valid_user_name($user_name);
    }

    public function valid_blog_name($blog_name)
    {
        return $this->user_model->is_valid_blog_name($user_name);
    }

    public function edit()
    {
        $data['page_title'] = 'ユーザープロファイル編集';
        $data['user_name'] = get_login_user_name();

        $user_id = get_login_user_id();
        $image_id = $this->image_model->get_user_profile_image_id($user_id);
        $result_data = $this->my_image_handler->save_image($user_id, $image_id);

        if(array_key_exists('error', $result_data)) {
            $data['error'] = $result_data['error'];
        }
        if(array_key_exists('success', $result_data)) {
            $data['success'] = $result_data['success'];
        }

        // 更新後の画像を再取得
        $data['user_image'] = $this->image_model->
            get_user_profile_image_as_base64($user_id);
        $this->load->view('users/edit', $data);
    }
}

/* end of controllers/users.php */