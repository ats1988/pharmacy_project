<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

  public static $validation ;

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
   
   self::$validation = new stdClass;

   self::$validation->email = $this->form_validation->set_rules('email', 'Username', 'trim|required|xss_clean');
   self::$validation->password = $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   /*
   $this->form_validation->set_rules('email', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
   */

   self::$validation;
    
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
   }
   else
   {
     //Go to private area
         redirect('home', 'refresh');

   }

 }

 function check_database($password)
 {
  sleep(1);
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('email');
   $type= $this->input->post('type');
   //query the database
   $result = $this->user->login($username, $password, $type);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'email' => $row->email,
         'type' => $row->type
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;

   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid email or password');
     return false;
   }
 }
}
?>