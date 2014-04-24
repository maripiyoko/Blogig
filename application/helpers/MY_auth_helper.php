<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ユーザーがログインしているかチェックする。
 * ログインしていない場合は強制的にログインページへ移動させる
 */
function varify_session()
{
    $CI = &get_instance();
    $user_data_array = array(
        $CI->session->userdata('user_id'),
        $CI->session->userdata('user_name'),
        $CI->session->userdata('blog_name')
    );
    foreach ($user_data_array as $value) {
        if(isset($value) === FALSE || empty($value)) {
            redirect('users/login');
        }
    }
    return TRUE;
}

/* end of helpers/My_session_manager.php */