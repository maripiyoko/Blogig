<?php
class Articles extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->library('session');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');

        if($this->form_validation->run() === FALSE)
        {
            $data['title'] = '新しいブログ記事を作成';
            $this->load->view('templates/header', $data);
            $this->load->view('articles/create');
            $this->load->view('templates/footer');
        } else {
            // save article
            $this->article_model->create($this->session->userdata('user_id'));
            redirect('home');
        }


    }
}
/* end of controllers/articles.php */