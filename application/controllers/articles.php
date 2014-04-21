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
        $this->_setup_form_validations();

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

    function _setup_form_validations()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');
    }

    function _display_create_page($data = array())
    {
        $data['page_title'] = '新しいブログ記事を作成';
        $this->load->view('templates/header', $data);
        $this->load->view('articles/create');
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        //$this->output->enable_profiler(TRUE);
        $id = $this->input->post('id');
        echo 'TODO delete : '.$id;
    }

    public function edit($id)
    {
        echo 'TODO edit : '.$id;
    }
}
/* end of controllers/articles.php */