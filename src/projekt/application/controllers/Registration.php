<?php
class Registration extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Registration_model');
        $this->load->library('form_validation');
    }
    
    
      public function startReg(){
        $this->load->view('User/Registration');
    }
    public function register(){
       $this->startReg();
       $this->load->helper(array('form','url'));
       if($this->input->post('register')){
           $this->form_validation->set_rules('username', 'Username', 'required');
           $this->form_validation->set_rules('email', 'Email', 'required');
           $this->form_validation->set_rules('password', 'Password', 'required');
           $this->form_validation->set_rules('password2', 'Password', 'required');
           if ($this->form_validation->run() == FALSE)
           {
             show_error('Hibás form!');
            }
            else
            {
              $this->Registration_model->register($this->input->post('email'),$this->input->post('username'),$this->input->post('password'));
              $this->load->view('User/added');
            }
       }    
     }

  }
 
