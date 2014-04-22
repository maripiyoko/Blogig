<?php
class Articles extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->library('session');
        $this->load->library('md');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index($offset = 0, $data = array())
    {
        if($this->_is_user_logged_in()) {
            $blog_name = $this->session->userdata('blog_name');
            $user_id = $this->session->userdata('user_id');
            $limit = 5;
            $result = $this->article_model->get_articles($user_id, $limit, $offset);
            $data['articles'] = $result['query'];

            $this->_init_pagination($limit, $result['count']);

            $data['page_title'] = $blog_name;
            $this->load->view('templates/header', $data);
            $this->load->view('home', $data);
            $this->load->view('articles/index', $data);
            $this->load->view('templates/footer');
        } else {
            // redirect to login page
            redirect('users/login');
        }
    }

    function _is_user_logged_in()
    {
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
        return TRUE;
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
            'next_link' => '»',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'prev_link' => '«',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>');
        $this->pagination->initialize($config);
    }

    public function create()
    {
        if($this->_setup_form_validations() === FALSE)
        {
            $this->_display_create_page();
        } else {
            echo 'else';
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
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');
        return $this->form_validation->run();
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
        $article = $this->article_model->get_article($id);
        $data['id'] = $id;
        $data['title'] = $article->title;
        $data['content'] = $article->content;

        $data['page_title'] = 'ブログ記事を編集';
        $this->load->view('templates/header', $data);
        $this->load->view('articles/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        if( $this->_setup_form_validations() === FALSE ) {
            $this->edit($id);
        } else {
            if($this->article_model->update($id)) {
                $data['success'] = '保存しました';
                $this->index(0, $data);
            } else {
                $data['error'] = '保存に失敗しました';
                $this->edit();
            }
        }
    }
}
/* end of controllers/articles.php */