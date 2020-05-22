<?php
class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }
    
    
      public function startLogin(){
        $this->load->view('User/Login');
    }
    public function login(){
       $this->startLogin();
       $this->load->helper(array('form','url'));
       if($this->input->post('login')){
           $this->form_validation->set_rules('username', 'Username', 'required');
           $this->form_validation->set_rules('password', 'Password', 'required');
           if ($this->form_validation->run() == FALSE)
           {
             show_error('Hibás form!');
            }
            else
            {
                $this->checkUserAndLogin();            
       }}}

    public function checkUserAndLogin(){
             $ChangedRow=$this->Login_model->login($this->input->post('username'),$this->input->post('password'));
              if($ChangedRow>0){
              $this->load->view('User/RegSuccess');
              }
    }}

 