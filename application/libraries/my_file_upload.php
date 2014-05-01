<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_file_upload {

    function __construct()
    {
        $CI = &get_instance();
        $CI->load->model('image_model');
    }

    public function do_upload()
    {
        $CI = &get_instance();

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $CI->load->library('upload', $config);

        if ( ! $CI->upload->do_upload()) {
            $data = array('error' => $CI->upload->display_errors());
        } else {
            if($this->_save_uploaded_file($CI->upload->data()) === FALSE ) {
                $data = array('error' => 'ファイルが保存できませんでした。');
            } else {
                $data = array('success' => 'ファイルを保存しました');
            }
        }
        return $data;
    }

    function _save_uploaded_file($uploaded_file)
    {
        $CI = &get_instance();

        $user_id = get_login_user_id();
        if($uploaded_file['is_image'] ) {
            $image_id = $CI->image_model->save_image_for_users($user_id, $uploaded_file);
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