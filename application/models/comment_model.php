<?php
class Comment_model extends CI_Model
{
    var $id = '';
    var $comment = '';
    var $date_created = '';
    var $date_modified = '';
    var $user_id = ''; // コメントした人のID
    var $article_id = '';

    function __construct()
    {
        $this->load->database();
    }

    public function create($article_id, $user_id)
    {
        $today = date('Y-m-d H:i:s');

        $data = array(
            'comment' => $this->input->post('comment'),
            'user_id' => $user_id,
            'date_created' => $today,
            'article_id' => $article_id
        );
        return $this->db->insert('comments', $data);
    }

    public function get_comments($article_id)
    {
        $this->db->from('comments')->where(array('article_id' => $article_id))->order_by('date_created', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
/* end of models/comment_article.php */