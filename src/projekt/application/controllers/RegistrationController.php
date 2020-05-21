<?php
class RegistrationController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('RegistrationModel');
    }
    
    
    public function createThreeAns($question, $a, $b ,$c, $correct){
        $this->CreateModel->addThreeAns($question, $a, $b ,$c, $correct);        
    }
    
    public function createYN($q, $ans){
        $this->CreateModel->addYN($q, $ans);       
    }
    
    
    public function register(){
        $this->load->view('User/Registration');
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name','Felhasználónéc','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('passw','Jelszó','required');
            $this->form_validation->set_rules('photo_path','Kép elérési útja','required');
            
            if($this->form_validation->run() == TRUE){
                // a validáció ok, mehet a beszúrás
                $this->RegistrationModel->register($this->input->post('name'),
                                               $this->input->post('email'),
                                               $this->input->post('passw')
                                               #$this->input->post('photo_path')
                                               );
                
                // irányítsuk az oldalt listázó nézetre
                $this->load->helper('url');
                // redirect -> átirányítás
                redirect(base_url('Main/ShowAll'));
            }
        }

    }
 }
