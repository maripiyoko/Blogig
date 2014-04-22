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

    public function get_article($article_id)
    {
        $query = $this->db->get_where('articles', array('id' => $article_id));
        return $query->row();
    }

    public function get_articles($user_id, $limit, $offset)
    {
        $this->db->from('articles')->where(array('user_id' => $user_id))->order_by('date_created', 'DESC');
        $tmp_db = clone $this->db;
        $count = $tmp_db->count_all_results();
        $query = $this->db->limit($limit, $offset)->get();
        /*foreach ($query->result() as $row)
        {
           echo 'title'.$row->title;
           echo 'content'.$row->content;
           echo 'date'.$row->date_created;
        }*/
        $data['query'] = $query->result();
        $data['count'] = $count;
        return $data;
    }

    public function create($user_id)
    {
        $today = date('Y-m-d H:i:s');

        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'date_created' => $today,
            'user_id' => $user_id
        );

        return $this->db->insert('articles', $data);
    }

    public function update($id)
    {
        $today = date('Y-m-d H:i:s');

        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'date_modified' => $today
        );

        $this->db->where('id', $id);
        return $this->db->update('articles', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('articles', array('id' => $id));
    }
}
/* end of models/article_model.php */