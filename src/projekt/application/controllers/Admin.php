<?php
class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('User_model');
        $this->load->model('ShowAll_model');
        $this->load->model('Logout_model');
        $this->load->model('HelperModels/ThreeAnsQuestion_model');
        $this->load->model('HelperModels/YNQuestion_model');
    }
    
    public function show(){
        if($this->User_model->IsLoggedIn()){
            $user_id = $this->User_model->getLoggedInId();
            if($this->User_model->isAdmin($user_id)){
                $this->showAll();
            }
            else{
                show_error("Nem rendelkezel admin jogosultsággal.");
            }
        }
        else{
            redirect(base_url().'Login/login');
        }
        
    }
    
    public function showAll(){
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
   
    public function addThreeAns(){
        if($this->User_model->IsLoggedIn()){
            $user_id = $this->User_model->getLoggedInId();
            if($this->User_model->isAdmin($user_id)){
                $this->addingThreeAns();
            }
            else{
                show_error("Nem rendelkezel admin jogosultsággal.");
            }
        }
        else{
            redirect(base_url().'Login/login');
        }
    }
    
    public function addingThreeAns(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');  
        
        $this->load->view('Admin/AddThreeAns');
        
         if($this->input->post('create')){
           $this->form_validation->set_rules('question', 'Kérdés', 'required');
           $this->form_validation->set_rules('a', 'A) válasz', 'required');
           $this->form_validation->set_rules('b', 'B) válasz', 'required');
           $this->form_validation->set_rules('c', 'C) válasz', 'required');
           $this->form_validation->set_rules('correct', 'Helyes válasz', 'required');
           if ($this->form_validation->run() == TRUE)
           {
               $correct =$this->getCorrect($this->input->post('a'),$this->input->post('b'), $this->input->post('c'),$this->input->post('correct'));
              $this->createThreeAns($this->input->post('question'),$this->input->post('a'),$this->input->post('b'),$this->input->post('c'), $correct);
              $this->load->view('YNQuestion/created');
            }
            else{
                 $this->load->view('User/RegErrors');
            }
        }
    }
    
    public function createThreeAns($question, $a, $b ,$c, $correct){
        return $this->ThreeAnsQuestion_model->create($question, $a, $b ,$c, $correct);
    }
    
    public function getCorrect($a,$b,$c,$correct){
        switch ($correct):
           case 'a':
                return $a;
           case 'b':
                return $b;
           case 'c':
               return $c;
        endswitch;
        
    }

}
