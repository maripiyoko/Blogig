<?php

class Blogs extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('article_model');
    }

    public function index($blog_name, $article_digest = NULL)
    {
        $data = $this->user_model->get_blog_title($blog_name);
        if(isset($data['error'])) {
            show_404();
        }
        $data['page_title'] = $data['blog_title'];
        $data['blog_name'] = $blog_name;
        $data['articles'] = $this->article_model->get_recent_published_articles($blog_name);

        if (is_null($article_digest) === FALSE) {
            // individual page
            $article = $this->article_model->get_article_by_digest($article_digest);
            if($article) {
                $data['individual'] = $article;
            }
        }
        $this->load->view('blogs/index', $data);
    }

}

/* end of controllers/blogs.php */