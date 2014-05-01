<?php

class Image_model extends CI_Model
{

    const MAX_SIZE = 5000; // KB
    function __construct()
    {
        $this->load->database();
    }

    /**
     * @return id (int) 保存に成功した場合
     * @return FALSE    保存に失敗した場合
     */
    public function save_image_for_users($user_id, $uploaded_file)
    {
        $image_id = $this->_create_new_image($user_id, $uploaded_file);
        if($image_id === FALSE) {
            return FALSE;
        }
        return $this->_save_iamge_user_relation($user_id, $image_id);
    }

    public function update_image_for_users($user_id, $image_id, $uploaded_file)
    {
        if($this->_update_image($image_id, $uploaded_file) === FALSE) {
            return FALSE;
        }
        return $this->_save_iamge_user_relation($user_id, $image_id);
    }

    function _save_iamge_user_relation($user_id, $image_id)
    {
        $query = $this->db->get_where('images_users', array('user_id' => $user_id));
        $data = $query->row_array();
        if(empty($data)) {
            // insert relation
            $data = array(
                'image_id' => $image_id,
                'user_id' => $user_id);
            return $this->db->insert('images_users', $data);
        } else {
            // update
            $this->db->where('user_id', $user_id);
            $data = array(
                'image_id' => $image_id);
            return $this->db->update('images_users', $data);
        }
    }

    function _create_new_image($user_id, $uploaded_file)
    {
        if(! $this->_uploaded_file_error_check($uploaded_file)) {
            return FALSE;
        }

        $today = get_formatted_today();
        $data = array(
            'name' => $uploaded_file['client_name'],
            'type' => $uploaded_file['image_type'],
            'raw_data' => file_get_contents($uploaded_file['full_path']),
            'thumb_data' => NULL,
            'owner_id' => $user_id,
            'date_created' => $today);
        if($this->db->insert('images', $data)) {
            return mysql_insert_id();
        }
        return FALSE;
    }

    function _update_image($image_id, $uploaded_file)
    {
        if(! $this->_uploaded_file_error_check($uploaded_file)) {
            return FALSE;
        }

        $data = array(
            'name' => $uploaded_file['client_name'],
            'type' => $uploaded_file['image_type'],
            'raw_data' => file_get_contents($uploaded_file['full_path']),
            'thumb_data' => NULL);
        $this->db->where('id', $image_id);
        return $this->db->update('images', $data);
    }

    function _uploaded_file_error_check($uploaded_file)
    {
        if(! $uploaded_file['is_image']) {
            echo 'ERROR : not image file. "'.$uploaded_file['full_path'].'"';
            return FALSE;
        }

        if($uploaded_file['file_size'] > Image_model::MAX_SIZE) {
            echo 'ERROR : file size too large. "'.$uploaded_file['file_size'].'"';
            return FALSE;
        }
        return TRUE;
    }

    public function get_user_profile_image_id($user_id)
    {
        $query = $this->db->get_where('images_users', array('user_id' => $user_id));
        $data = $query->row_array();
        if(! empty($data)) {
            return $query->row()->image_id;
        }
        return FALSE;
    }

    public function get_user_profile_image_as_base64($user_id)
    {
        $query = $this->db->select('*')
            ->from('images')
            ->join('images_users', 'images.id = images_users.image_id')
            ->where('user_id', $user_id)
            ->get();
        $data = $query->row_array();
        if(empty($data)) {
            return '';
        }
        $image_content = $data['raw_data'];
        $image_type = $data['type'];
        $encoded = base64_encode($image_content);
        return 'data:image/'.$image_type.';base64,'.$encoded;
    }
}

/* end of models/image_model.php */