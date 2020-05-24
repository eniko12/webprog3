<?php
class YNFileUpload extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('YNFileUpload_model'); 
        $this->load->model('User_model');
    }
    
    public function upload(){
        if($this->input->post('submit')){
           $upload_config['max_size'] = 5000;
           $upload_config['allowed_types'] = 'txt';
           $upload_config['upload_path'] = './uploads/YN/';
           $upload_config['file_name'] = 'YN';
           $upload_config['file_ext_tolowe'] = TRUE;
           $upload_config['overwrite'] = TRUE;
           
           $this->load->library('upload');
           $this->upload->initialize($upload_config);
           if($this->upload->do_upload('YN')){
               $this->YNFileUpload_model->addToDatabaseThreeAns();
               $this->load->view('Admin/UploadDone');
           }else{
               $this->load->view('Admin/UploadFailed');
           }
        }else{
            $this->load->helper('form');
            $this->load->view('Admin/YNFromFile');    
        }
    }
    
    public function index(){
        if($this->User_model->IsLoggedIn()){
            $user_id = $this->User_model->getLoggedInId();
            if($this->User_model->isAdmin($user_id)){
                $this->upload();
            }
            else{
                show_error("Nem rendelkezel admin jogosultsággal.");
            }
        }
        else{
            redirect(base_url().'Login/login');
        }
        
    }
    
   
}