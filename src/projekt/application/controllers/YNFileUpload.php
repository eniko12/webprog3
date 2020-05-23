<?php
class YNFileUpload extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Create_model');       
    }
    
    public function index(){
        if($this->input->post('submit')){
           $upload_config['max_size'] = 1000;
           $upload_config['allowed_types'] = 'txt';
           $upload_config['upload_path'] = './uploads/YN/';
           $upload_config['file_name'] = 'YN';
           $upload_config['file_ext_tolowe'] = TRUE;
           $upload_config['overwrite'] = TRUE;
           
           $this->load->library('upload');
           $this->upload->initialize($upload_config);
           if($this->upload->do_upload('YN')){
               echo 'Sikeres!';
               $this->addToDatabaseThreeAns();
           }else{
               echo 'Sikertelen!';
               $this->upload->display_errors();
           }
        }else{
            $this->load->helper('form');
            $this->load->view('Admin/YNFromFile');    
        }
    }
    
    public function getDataFromFileYN(){
        $myfile = fopen("./uploads/YN/YN.txt", "r") or die("Unable to open file!");
        
        $questions = array();
        
        while(!feof($myfile)) {
          $line = fgets($myfile);
          $parts = explode('|', $line);
          $q =[
              'question' => $parts[0],
              'answer' => $parts[1]
          ];
          array_push($questions,$q);
        }
        fclose($myfile);
        return $questions;
    }
    
    public function addToDatabaseThreeAns(){
        $questions = $this->getDataFromFileYN();
        for($i=0; $i<count($questions);$i++){
           $q =$questions[$i];
           $question = $q['question'];
           $ans = $q['answer'];
           $this->Create_model->addYN($question, $ans);
        }
        
        
    }
}