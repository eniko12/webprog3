<?php
class ShowAllController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('ShowAllModel');
    }
    
    public function show(){
        $record1 = $this->ShowAllModel->showYN();  
        $record2 = $this->ShowAllModel->showThreeAns();
        if($record1 == NULL && $record2 == NULL){
            show_error('Nem található egy kérdés sem!');
        }       
       else{   
           $listYN = array();
           foreach ($record1 as $q):
               array_push($listYN, $this->ShowAllModel->getQByIdYN($q->id));  
           endforeach;
           $listThreeAns = array();
           foreach ($record2 as $q):
               array_push($listThreeAns, $this->ShowAllModel->getQByIdThreeAns($q->id));  
           endforeach;
           $view_params = [
               'q1'    =>  $record1,
               'q2' => $record2,
               'YNQ' => $listYN,
               'ThreeAns' => $listThreeAns
            ];

            $this->load->helper('form');           
            $this->load->view('Main/ShowAll',$view_params);
    }
    }
    
   
    
}