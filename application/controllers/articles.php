<?php
class Articles extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->library('session');
        $this->load->library('md');
        $html = $this->md->defaultTransform('+ list sample');
        echo $html;
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');

        if($this->form_validation->run() === FALSE)
        {
            $this->_display_create_page();
        } else {
            // save article
            $result = $this->article_model->create($this->session->userdata('user_id'));
            if($result) {
                redirect('home');
            } else {
                $data['error'] = '保存できませんでした。';
                $this->_display_create_page();
            }
        }
    }

    function _display_create_page($data = array())
    {
        $data['title'] = '新しいブログ記事を作成';
        $this->load->view('templates/header', $data);
        $this->load->view('articles/create');
        $this->load->view('templates/footer');
    }
}
/* end of controllers/articles.php */