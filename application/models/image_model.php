<?php

class Image_model extends CI_Model
{

    const MAX_SIZE = 5000; // KB
    function __construct()
    {
        $this->load->database();
    }

    public function save_image($user_id, $uploaded_file)
    {
        $file_path = $uploaded_file['full_path'];
        if(! $uploaded_file['is_image']) {
            echo 'ERROR : not image file. "'.$file_path.'"';
            return FALSE;
        }

        if($uploaded_file['file_size'] > Image_model::MAX_SIZE) {
            echo 'ERROR : file size too large. "'.$uploaded_file['file_size'].'"';
            return FALSE;
        }

        $today = get_formatted_today();
        $data = array(
            'name' => $uploaded_file['client_name'],
            'type' => $uploaded_file['image_type'],
            'raw_data' => file_get_contents($file_path),
            'thumb_data' => NULL,
            'owner_id' => $user_id,
            'date_created' => $today);
        return $this->db->insert('images', $data);
    }
}

/* end of models/image_model.php */