<?php
class Images extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        varify_session();
    }

    public function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload()) {
            $data = array('error' => $this->upload->display_errors());
        } else {
            if($this->_save_uploaded_file($this->upload->data()) === FALSE ) {
                $data = array('error' => 'ファイルが保存できませんでした。');
            }
        }
        $this->load->view('upload_form', $data);
    }

    function _save_uploaded_file($uploaded_file)
    {
        if($uploaded_file['is_image'] ) {
            echo 'TODO save file '.$uploaded_file['file_name'];
        }
        return FALSE;
    }
}
/* end of controllers/images.php */