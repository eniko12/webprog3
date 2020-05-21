<?php
class ShowAllController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('ShowAllModel');
    }
    
    public function show(){
        $recordYN = $this->ShowAllModel->showYN();  
        $recordThreeAns = $this->ShowAllModel->showThreeAns();
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
            array_push($listYN, $this->ShowAllModel->getQByIdYN($q->id));  
        endforeach;
        return $listYN;        
    }
    
    public function makeQuestionListThreeAns($record2){
      $listThreeAns = array();
      foreach ($record2 as $q):
        array_push($listThreeAns, $this->ShowAllModel->getQByIdThreeAns($q->id));  
      endforeach;
      return $listThreeAns;
    }
    
    public function makeAnswerListThreeAns($record2){
      $answerListThreeAns = array();
      foreach ($record2 as $q):
        array_push($answerListThreeAns, $this->ShowAllModel->getAnsById($q->id));  
      endforeach;
      return $answerListThreeAns;
    }
   
    
}