<?php
class Article_model extends CI_Model
{
    var $title = '';
    var $content = '';
    var $date_created = '';
    var $date_modified = '';
    var $user_id = '';

    function __construct()
    {
        $this->load->database();
    }

    public function get_articles($user_id)
    {
        $query = $this->db->from('articles')->where(array('user_id' => $user_id))->order_by('date_created', 'DESC')->get();
        /*foreach ($query->result() as $row)
        {
           echo 'title'.$row->title;
           echo 'content'.$row->content;
           echo 'date'.$row->date_created;
        }*/
        return $query->result();
    }
}
/* end of models/article_model.php */