<?php
class Article_model extends CI_Model
{
    var $title = '';
    var $content = '';
    var $digest = '';
    var $date_created = '';
    var $date_modified = '';
    var $user_id = '';
    var $published = 0; // 0: 非公開 1: 公開

    function __construct()
    {
        $this->load->database();
    }

    public function get_article($article_id)
    {
        $query = $this->db->get_where('articles', array('id' => $article_id));
        return $query->row();
    }

    public function get_article_by_digest($digest)
    {
        $query = $this->db->get_where('articles', array('digest' => $digest));
        return $query->row();
    }

    public function get_articles($user_id, $limit, $offset)
    {
        $this->db->from('articles')
            ->where(array('user_id' => $user_id))
            ->order_by('date_created', 'DESC');
        $tmp_db = clone $this->db;
        $count = $tmp_db->count_all_results();
        $query = $this->db->limit($limit, $offset)->get();
/*        foreach ($query->result() as $row)
        {
           echo 'title'.$row->title;
           echo 'content'.$row->content;
           echo 'date'.$row->date_created;
           echo 'published'.$row->published;
        }*/
        $data['query'] = $query->result();
        $data['count'] = $count;
        return $data;
    }

    public function get_published_articles($blog_name)
    {
        $query = $this->db->from('articles')
            ->where(array('published' => 1))
            ->order_by('date_published', 'DESC')
            ->get();
        return $query->result();
    }

    public function get_recent_published_articles($blog_name, $num = 10)
    {
        $query = $this->db->from('articles')
            ->where(array('published' => 1))
            ->order_by('date_created', 'DESC')
            ->limit($num)
            ->get();
        return $query->result();
    }

    public function create($user_id)
    {
        $today = get_formatted_today();
        $title = $this->input->post('title');

        $data = array(
            'title' => $title,
            'content' => $this->input->post('content'),
            'digest' => md5($title.time()),
            'date_created' => $today,
            'user_id' => $user_id
        );

        return $this->db->insert('articles', $data);
    }

    public function update($id)
    {
        $today = get_formatted_today();

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

    /**
     * 最初の公開日のみ保存
     */
    public function toggle_published($id)
    {
        $query = $this->db->select('published, date_published')
            ->where('id', $id)
            ->get('articles');
        $current_state = $query->row()->published;
        $current_date_published = $query->row()->date_published;

        $to = ($current_state == 1) ? 0 : 1;

        $update_array = array('published' => $to);
        if(is_valid_date_range($current_date_published) === FALSE) {
            $update_array['date_published'] = get_formatted_today();
        }

        $this->db->where('id', $id);
        return $this->db->update('articles', $update_array);
    }


    public function get_open_blogs()
    {
        $query = $this->db->select('blog_name, blog_title, published')
            ->from('users')
            ->join('articles', 'users.id = articles.user_id')
            ->having('published >= 1')
            ->get();

        return $query->result();
    }
}
/* end of models/article_model.php */