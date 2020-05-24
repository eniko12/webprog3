<?php
class Check_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('HelperModels/YNQuestion_model');
            $this->load->model('HelperModels/ThreeAnsQuestion_model');
            $this->load->model('HelperModels/Answer_model');
            $this->load->helper('file');
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
              $time = strval(date("Y-M-D H:i:s"));
              $data = $time." kitöltöttek egy kvízt. Az eredmény: ".strval($correctThreeAns)."db három-választós kérdés és ".strval($correctYN)."db igaz-hamis kérdés helyes. "."\n";
              $this->writeToResult('./Results/resultFile.txt', $data);
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


    public function writeToResult($file_path,$data){
        if(file_exists($file_path))
        {
            write_file($file_path, $data, 'a');
        }
        else
        {
            write_file($file_path, $data);
        }
    }
}
