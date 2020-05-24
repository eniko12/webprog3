<?php
class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Login_model');
         $this->load->model('Registration_model');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $this->login();
    }
    public function startLogin(){
        $this->Registration_model->addFirstAdmin('admin@gmail.com', 'admin','admin');
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
        if($this->Login_model->login($this->input->post('username'),  $this->input->post('password'))){
            return $this->load->view('User/LoginSuccess');
        }
        else{
            return $this->load->view('User/LoginFailed');
        }
                     
    }}

 