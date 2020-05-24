<?php
class Random extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Random_model');
        $this->load->model('ShowAll_model');
        $this->load->model('Check_model');
        $this->load->model('User_model');
    }
    
    public function index(){
        $this->play();
    }
    public function play(){
    if($this->User_model->IsLoggedIn()){
        $YNQuestions = $this->Random_model->getRandomYNQ();
        $ThreeAnsQuestions = $this->Random_model->getRandomThreeAnsQ();        
        if($YNQuestions == NULL && $ThreeAnsQuestions == NULL){
            show_error('Nem található egy kérdés sem!');
        }       
       else{   
           $listYN = $this->makeQuestionListYN($YNQuestions);
           $listThreeAns = $this->makeQuestionListThreeAns($ThreeAnsQuestions);
           $answerListThreeAns = $this->makeAnswerListThreeAns($ThreeAnsQuestions);
           $view_params = ['q1'    =>  $YNQuestions, 'q2' => $ThreeAnsQuestions,
               'YNQ' => $listYN, 'ThreeAns' => $listThreeAns,
               'Answer' => $answerListThreeAns
            ];
            $this->load->helper('form');           
            $this->load->view('Main/Quiz',$view_params);
        }
    }
    else{
         redirect(base_url().'Login/login');
    }    }
    
    
    public function makeQuestionListYN($record1){
        $listYN = array();
        foreach ($record1 as $q):
            array_push($listYN, $this->ShowAll_model->getQByIdYN($q->id));  
        endforeach;
        return $listYN;        
    }
    
    public function makeQuestionListThreeAns($record2){
      $listThreeAns = array();
      foreach ($record2 as $q):
        array_push($listThreeAns, $this->ShowAll_model->getQByIdThreeAns($q->id));  
      endforeach;
      return $listThreeAns;
    }
    
    public function makeAnswerListThreeAns($record2){
      $answerListThreeAns = array();
      foreach ($record2 as $q):
        array_push($answerListThreeAns, $this->ShowAll_model->getAnsById($q->id));  
      endforeach;
      return $answerListThreeAns;
    }
    
     public function check(){
         $this->Check_model->check();
     }   

 }

