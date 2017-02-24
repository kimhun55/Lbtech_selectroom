<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->helper('file');
        }

        public function index()
        {
                $this->load->view('upload/upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './upload/';
                $config['allowed_types']        = 'csv|txt';
                $config['max_size']             = 1000;
          

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload/upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $data['data']= read_file($data['upload_data']['full_path']);
                        $controllers = get_filenames('./upload/');
                        var_dump($controllers);

                        $this->load->view('upload/upload_success', $data);
                }
        }
}
?>