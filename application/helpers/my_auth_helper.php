<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ユーザーがログインしているかチェックする。
 * ログインしていない場合は強制的にログインページへ移動させる
 */
function varify_session()
{
    if(is_user_logged_in() === FALSE) {
        redirect('users/login');
    }
    return TRUE;
}

function is_user_logged_in()
{
    $CI = &get_instance();
    $user_data_array = array(
        $CI->session->userdata('user_id'),
        $CI->session->userdata('user_name'),
        $CI->session->userdata('blog_name'),
        $CI->session->userdata('blog_title')
    );
    foreach ($user_data_array as $value) {
        if(isset($value) === FALSE || empty($value)) {
            return FALSE;
        }
    }
    return TRUE;
}

/* end of helpers/my_auth_helper.php */