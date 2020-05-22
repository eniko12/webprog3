<?php
class Random extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Random_model');
        $this->load->model('ShowAll_model');
        $this->load->model('HelperModels/YNQuestion_model');
        $this->load->model('HelperModels/ThreeAnsQuestion_model');
        $this->load->model('HelperModels/Answer_model');
    }
    
    public function play(){
        $YNQuestions = $this->Random_model->getRandomYNQ();
        $ThreeAnsQuestions = $this->Random_model->getRandomThreeAnsQ();        
        if($YNQuestions == NULL && $ThreeAnsQuestions == NULL){
            show_error('Nem található egy kérdés sem!');
        }       
       else{   
           $listYN = $this->makeQuestionListYN($YNQuestions);
           $listThreeAns = $this->makeQuestionListThreeAns($ThreeAnsQuestions);
           $answerListThreeAns = $this->makeAnswerListThreeAns($ThreeAnsQuestions);
           $view_params = [
               'q1'    =>  $YNQuestions,
               'q2' => $ThreeAnsQuestions,
               'YNQ' => $listYN,
               'ThreeAns' => $listThreeAns,
               'Answer' => $answerListThreeAns
            ];

            $this->load->helper('form');           
            $this->load->view('Main/Quiz',$view_params);
    }}
    
    
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
       $db = 3;
       $this->load->helper(array('form','url'));
       $this->load->library('form_validation');            
       if($this->input->post('send')){
           $this->setValidationRules($db);           
           if ($this->form_validation->run() == TRUE)
           {
              $correctThreeAns = $this->checkAllThreeAnsCorrect($db);  
              $correctYN = $this->checkAllYNCorrect($db);
              $view_params=[
                  'all'=>$db+$db,
                  'correctYN'=>$correctYN,
                  'correctThreeAns'=>$correctThreeAns
              ];
              $this->load->view('Main/QuizResult',$view_params);
            }
            else{
                 $this->load->view('User/RegErrors');
            }
         } 
    }
    
   public function setValidationRules($db){
         for($i=0; $i<$db; $i++):
              $this->form_validation->set_rules($i.'ThreeAns', ($i+1).'. három-választós kérdés', 'required'); 
              $this->form_validation->set_rules($i.'YN', ($i+1).'. eldöntendő kérdés', 'required'); 
          endfor;
   }
    
    public function checkAnswerYN($givenAns,$questionId){
        $questionData = $this->YNQuestion_model->getById($questionId);
        $correct = $questionData[0]->answer;
        if($givenAns == $correct)
        {
            return true;
        }
        else{
            return false;
        }
    }
    
    public function checkThreeAns($givenAns,$questionId){
        $questionData = $this->ThreeAnsQuestion_model->getById($questionId);
        $question=$questionData[0];
        $aId = $question->ans_id;
        $answers=$this->Answer_model->getAnswerById($aId);
        $answer_correct=$answers[0];
        $correct = $answer_correct->correct;
        if($givenAns == $correct)
        {
            return true;
        }
        else{
            return false;
        }
    }
    
    public function checkAllThreeAnsCorrect($db){
        $correct =0;
        for($i=0; $i<$db; $i++):
                if($this->checkThreeAns($this->input->post($i.'ThreeAns'), $this->input->post($i.'hiddenThreeAnsId'))){
                   $correct= $correct+1;   
                }
        endfor;
        return $correct;
    }
    
      public function checkAllYNCorrect($db){
        $correct =0;
        for($i=0; $i<$db; $i++):
                 if($this->checkAnswerYN($this->input->post($i.'YN'), $this->input->post($i.'hiddenYNId'))){
                     $correct= $correct+1;
                 }
        endfor;
        return $correct;
    }
    
    
 }

