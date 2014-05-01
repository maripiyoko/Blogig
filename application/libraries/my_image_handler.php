<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_image_handler {

    function __construct()
    {
        $CI = &get_instance();
        $CI->load->model('image_model');
    }

    public function save_image($user_id, $image_id)
    {
        $this->_set_upload_config();
        $CI = &get_instance();

        if ( ! $CI->upload->do_upload()) {
            $data = array('error' => $CI->upload->display_errors());
        } else {
            if($this->_save_uploaded_file($user_id,$image_id, $CI->upload->data()) === FALSE ) {
                $data = array('error' => 'ファイルが保存できませんでした。');
            } else {
                $data = array('success' => 'ファイルを保存しました');
            }
        }
        return $data;
    }

    function _set_upload_config()
    {
        $CI = &get_instance();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $CI->load->library('upload', $config);
    }

    function _save_uploaded_file($user_id, $image_id, $uploaded_file)
    {
        $CI = &get_instance();
        if($uploaded_file['is_image'] ) {
            if($image_id === FALSE) {
                $image_id = $CI->image_model
                    ->save_image_for_users($user_id, $uploaded_file);
            } else {
                $image_id = $CI->image_model
                    ->update_image_for_users($user_id, $image_id, $uploaded_file);
            }

            if($image_id === FALSE) {
                return FALSE;
            }
            if(! unlink($uploaded_file['full_path'])) {
                echo 'ERROR 一時ファイルを削除できませんでした。"'.$uploaded_file['full_path'].'"';
            }
            return TRUE;
        }
        return FALSE;
    }

}

/* end of libraries/my_file_upload.php */