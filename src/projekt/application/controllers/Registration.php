<?php
class Registration extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Registration_model');
        
    }
    
    
    public function startReg(){
        $this->load->view('User/Registration');
    }
    public function register(){
       $this->load->library('form_validation');
       $this->startReg();
       $this->load->helper(array('form','url'));
       if($this->input->post('register')){
           $this->form_validation->set_rules('username', 'Felhasználónév', 'required|is_unique[user.username]', array('is_unique'=>'Ez a felhasználónév már foglalt'));
           $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]',array('valid_email'=>'Érvényes email címet adjon meg! (pl. minta@gmail.com)', 'is_unique'=>'Ezzel az email címmel már regisztráltak!'));
           $this->form_validation->set_rules('password', 'Jelszó','required');
           $this->form_validation->set_rules('password2', 'Jelszó megerősítése', 'required|matches[password]',array('matches'=>'A két jelszó nem egyezik!'));
           if ($this->form_validation->run() == TRUE)
           {
              $this->Registration_model->register($this->input->post('email'),$this->input->post('username'),  password_hash($this->input->post('password'), PASSWORD_DEFAULT));
              $this->load->view('User/RegSuccess');
            }
            else{
                 $this->load->view('User/RegErrors');
            }            
       }    
     }
     
     
   
    public function registerAdmin(){
       $this->load->library('form_validation');
       $this->startRegForAdmin();
       $this->load->helper(array('form','url'));
       if($this->input->post('register')){
           $this->form_validation->set_rules('username', 'Felhasználónév', 'required|is_unique[user.username]', array('is_unique'=>'Ez a felhasználónév már foglalt'));
           $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]',array('valid_email'=>'Érvényes email címet adjon meg! (pl. minta@gmail.com)', 'is_unique'=>'Ezzel az email címmel már regisztráltak!'));
           $this->form_validation->set_rules('password', 'Jelszó','required');
           $this->form_validation->set_rules('password2', 'Jelszó megerősítése', 'required|matches[password]',array('matches'=>'A két jelszó nem egyezik!'));
           if ($this->form_validation->run() == TRUE)
           {
              $this->Registration_model->registerAdmin($this->input->post('email'),$this->input->post('username'),  password_hash($this->input->post('password'), PASSWORD_DEFAULT));
              $this->load->view('User/RegSuccess');
            }
            else{
                 $this->load->view('User/RegErrors');
            }            
       }    
     } 
     
    

  }
 
