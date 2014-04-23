<?php
class Comments extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('comment_model');
        $this->load->library('session');
    }

    public function create()
    {
        $article_id = $this->input->post('article_id');
        $user_id = $this->session->userdata('user_id');
        $comment = $this->input->post('comment');
        if(! empty($comment) && $this->comment_model->create($article_id, $user_id, $comment)) {
            $data['success'] = 'コメントを追加しました。';
        } else {
            $data['error'] = '保存できませんでした。';
        }
        redirect('articles/show/'.$article_id, $data);
    }

    public function edit()
    {
        $article_id = $this->input->post('article_id');
        $comment_id = $this->input->post('comment_id');
        $comment = $this->input->post('comment');
        if(! empty($comment) && $this->comment_model->edit($comment_id, $comment)) {
            $data['success'] = 'コメントを変更しました。';
        } else {
            $data['error'] = '保存できませんでした。';
        }
        redirect('articles/show/'.$article_id, $data);
    }
}

/* end of controllers/comments.php */