<?php
class ShowAll extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('ShowAll_model');
    }
    
    public function show(){
        $recordYN = $this->ShowAll_model->showYN();  
        $recordThreeAns = $this->ShowAll_model->showThreeAns();
        if($recordYN == NULL && $recordThreeAns == NULL){
            show_error('Nem található egy kérdés sem!');
        }       
       else{   
           $listYN = $this->makeQuestionListYN($recordYN);
           $listThreeAns = $this->makeQuestionListThreeAns($recordThreeAns);
           $answerListThreeAns = $this->makeAnswerListThreeAns($recordThreeAns);
           $view_params = [
               'q1'    =>  $recordYN,
               'q2' => $recordThreeAns,
               'YNQ' => $listYN,
               'ThreeAns' => $listThreeAns,
               'Answer' => $answerListThreeAns
            ];

            $this->load->helper('form');           
            $this->load->view('Main/ShowAll',$view_params);
    }
    }
    
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
   
    
}