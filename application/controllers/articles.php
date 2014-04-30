<?php
class Articles extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('comment_model');
        $this->load->library(array('form_validation', 'md'));
        $this->load->helper('form');

        varify_session();
    }

    public function index($offset = 0, $data = array())
    {
        //$this->output->enable_profiler(TRUE);
        $blog_name = $this->session->userdata('blog_name');
        $blog_title = $this->session->userdata('blog_title');
        $user_id = $this->session->userdata('user_id');
        $limit = 5;
        $result = $this->article_model->get_articles($user_id, $limit, $offset);
        foreach ($result['query'] as $article) {
            $num_comments = $this->comment_model->get_num_comments($article->id);
            $article->num_comments = $num_comments;
        }
        $data['articles'] = $result['query'];

        $this->_init_pagination($limit, $result['count']);

        $data['page_title'] = $blog_title;
        $data['blog_name'] = $blog_name;
        $data['article_hash'] = '';
        $this->load->view('articles/index', $data);
    }

    function _init_pagination($limit, $max_rows)
    {
        // pagination settings
        $this->load->library('pagination');
        $config = array(
            'base_url' => site_url("articles/index"),
            'total_rows' => $max_rows,
            'per_page' => $limit,
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'cur_tag_open' => '<li class="active"><a href="#">',
            'cur_tag_close' => '</a></li>',
            'next_link' => '<span class="glyphicon glyphicon-chevron-right"></span>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'prev_link' => '<span class="glyphicon glyphicon-chevron-left"></span>',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'first_link' => '最初へ',
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'last_link' => '最後へ',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>');
        $this->pagination->initialize($config);
    }

    public function create()
    {
        if($this->_setup_form_validations() === FALSE)
        {
            $this->_display_create_page();
        } else {
            // save article
            $result = $this->article_model->create($this->session->userdata('user_id'));
            if($result) {
                $this->index();
            } else {
                $data['error'] = '保存できませんでした。';
                $this->_display_create_page();
            }
        }
    }

    function _setup_form_validations()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');
        return $this->form_validation->run();
    }

    function _display_create_page($data = array())
    {
        $data['page_title'] = '新しいブログ記事を作成';
        $this->load->view('articles/create', $data);
    }

    public function show($id, $data = array())
    {
        $data = $this->_get_article_data($id);
        $data['comments'] = $this->comment_model->get_comments($id);

        $data['page_title'] = 'ブログ記事の閲覧';
        $data['show_edit_link'] = TRUE;
        $this->load->view('articles/show', $data);
    }

    public function delete()
    {
        //$this->output->enable_profiler(TRUE);
        $id = $this->input->post('id');
        if($this->article_model->delete($id)) {
            $data['success'] = '削除しました';
        }
        $this->index(0, $data);
    }

    public function edit($id, $data = array())
    {
        $data = $this->_get_article_data($id);

        $data['page_title'] = 'ブログ記事を編集';
        $this->load->view('articles/edit', $data);
    }

    function _get_article_data($id)
    {
        $article = $this->article_model->get_article($id);
        $data['id'] = $id;
        $data['title'] = $article->title;
        $data['content'] = $article->content;
        $data['date_created'] = $article->date_created;
        if(is_valid_date_range($article->date_modified)) {
            $data['date_modified'] = $article->date_modified;
        }
        $data['published'] = $article->published;
        return $data;
    }

    public function update()
    {
        $id = $this->input->post('id');
        if( $this->_setup_form_validations() === FALSE ) {
            $this->edit($id);
        } else {
            if($this->article_model->update($id)) {
                $data['success'] = '保存しました';
                $this->show($id, $data);
            } else {
                $data['error'] = '保存に失敗しました';
                $this->edit($id, $data);
            }
        }
    }

    public function publish($id)
    {
        $this->article_model->toggle_published($id);
        $this->index();
    }
}
/* end of controllers/articles.php */