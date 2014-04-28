<?php

class Blogs extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('article_model');
        $this->load->library('md');
    }

    public function index($blog_name = NULL, $article_digest = NULL)
    {
        if (is_null($blog_name)) {
            $this->_display_blog_index();
            return;
        }

        $data = $this->user_model->get_blog_title($blog_name);
        if(isset($data['error'])) {
            $this->_display_blog_index();
            return;
        }
        $this->_display_pages($blog_name, $data['blog_title'], $article_digest);
    }

    function _display_blog_index()
    {
        $data['page_title'] = '公開しているブログ一覧';
        $data['blogs'] = $this->article_model->get_open_blogs();
        $this->load->view('blogs/index', $data);
    }

    public function _display_pages($blog_name, $blog_title, $article_digest = NULL)
    {
        $data['page_title'] = $blog_title;
        $data['blog_name'] = $blog_name;
        $data['articles'] = $this->article_model->get_recent_published_articles($blog_name);

        if (is_null($article_digest) === FALSE) {
            // individual page
            $article = $this->article_model->get_article_by_digest($article_digest);
            if($article) {
                $data['individual'] = $article;
            }
        }
        $this->load->view('blogs/home', $data);
    }
}

/* end of controllers/blogs.php */