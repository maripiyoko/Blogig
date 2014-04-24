<?php

class Blogs extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index($blog_name)
    {
        $data = $this->user_model->get_blog_title($blog_name);
        if(isset($data['error'])) {
            show_404();
        }
        $data['page_title'] = $data['blog_title'];
        $this->load->view('blogs/index', $data);
    }
}

/* end of controllers/blogs.php */