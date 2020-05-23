<?php
class ThreeAnsFileUpload extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Create_model');       
    }
    
    public function index(){
        if($this->input->post('submit')){
           $upload_config['max_size'] = 1000;
           $upload_config['allowed_types'] = 'txt';
           $upload_config['upload_path'] = './uploads/ThreeAns/';
           $upload_config['file_name'] = 'threeAns';
           $upload_config['file_ext_tolowe'] = TRUE;
           $upload_config['overwrite'] = TRUE;
           
           $this->load->library('upload');
           $this->upload->initialize($upload_config);
           if($this->upload->do_upload('ThreeAnsFile')){
               echo 'Sikeres!';
               $this->addToDatabaseThreeAns();
           }else{
               echo 'Sikertelen!';
               $this->upload->display_errors();
           }
        }else{
            $this->load->helper('form');
            $this->load->view('Admin/ThreeAnsFromFile');    
        }
    }
    
    public function getDataFromFileThreeAns(){
        $myfile = fopen("./uploads/ThreeAns/threeAns.txt", "r") or die("Unable to open file!");
        
        $questions = array();
        
        while(!feof($myfile)) {
          $line = fgets($myfile);
          $parts = explode('|', $line);
          $q =[
              'question' => $parts[0],
              'a' => $parts[1],
              'b' => $parts[2],
              'c' => $parts[3],
              'correct' => $parts[4]
          ];
          array_push($questions,$q);
        }
        fclose($myfile);
        return $questions;
    }
    
    public function addToDatabaseThreeAns(){
        $questions = $this->getDataFromFileThreeAns();
        for($i=0; $i<count($questions);$i++){
           $q =$questions[$i];
           $question = $q['question'];
           $a = $q['a'];
           $b = $q['b'];
           $c = $q['c'];
           $correct = $q['correct'];
           $this->Create_model->addThreeAns($question, $a, $b ,$c, $correct);
        }
        
        
    }
}