<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyRegister extends CI_Controller {


 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }



 function index()
 {
    
     //$this->load->view('login_view');
 
   
     //Go to private area
    


 }
   
 function pass_to_email()
 {

    



 }


 function do_register()
 {
  
  if($this->input->post('register'))
  {

    $this->load->library('form_validation');

   $this->form_validation->set_rules('email2', 'Email', 'trim|required|valid_email|xss_clean');
   $this->form_validation->set_rules('password2', 'Password', 'trim|required|xss_clean');
   
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
   }
   else
   {

      $this->load->model('user');
      if($this->user->register_user())
      {

      /*$to      = $this->input->post("email2",true);
      $subject = 'registeration confirmation';
      $message = 'hello,'.'<br />'.' your new password' .':'.$this->input->post("password2",true);
      $headers = 'From: webmaster@gmail.com' . "\r\n" ;

      if(mail($to, $subject, $message, $headers)) {
        $this->load->view('success');
      } else {
      //die('Failure: Email was not sent!');
      print "<script>alert('mail stop,has not sent');</script>";
      $this->load->view('success');
      }*/
      $data['for_succ'] = 
      array('user_email'=>$this->input->post("email2"),
            'user_password'=>$this->input->post("password2")
           );
      echo "<script>alert('Registration has completed successfully');</script>";
      $this->load->view('success',$data);


      }else{

        echo "Registred failed";

      }




   }
  }
 }
}

?>