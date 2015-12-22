<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 //public static $session_data = array() ;

 public static $session_data ;

 public static $data =   array()  ;

 public static $_email , $_type , $_id ;

 function __construct()
 {
   parent::__construct();
    $this->load->model('user','',TRUE);
    $this->load->helper('url');
    $this->load->library('session');

    self::$session_data = new stdClass;
    


    self::$session_data->connected = $this->session->userdata('logged_in');
    
    //self::$session_data->disconnected = $this->session->unset_userdata('logged_in');


    self::$_email = self::$session_data->connected['email'];
    self::$_type = self::$session_data->connected['type'];
    self::$_id = self::$session_data->connected['id'];

    self::$data = array('email' => self::$_email,
        'type' => self::$_type,
        'id' => self::$_id,
        );
 }

 function index()
 {

   if($this->session->userdata('logged_in'))
   {
     /*$session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
     $data['type'] = $session_data['type'];
     $data['id'] = $session_data['id'];*/
/*
$this->db->from('yourtable');
[... more active record code ...]
$query = $this->db->get();
$rowcount = $query->num_rows();
*/


      
    $this->session->set_userdata('count', 0);

    self::$data['count'] = $this->session->userdata('count');

    self::$data['count'] = Home::forcounter(self::$_type,self::$_id);



      self::$data['to_do'] = array();
      self::$data['to_do'] = $this->user->get_users();
      //$this->load->view('home_view', $data);
     


    $row = Home::getonerow(self::$_id);
    self::$data['dialog'] = $row;

    self::$data['t_t'] =  $this->user->check_type();
     
      $this->load->view('home_view', self::$data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }



 }

 function forcounter($_type,$_id)
 {
    //$this->db->select('*');
    /*$session_infoc = $this->session->userdata('logged_in');
    $infoc['type'] = $session_infoc['type'];
    $infoc['id'] = $session_infoc['id'];*/
    $type = self::$_type;
    $id = self::$_id;

    switch ($type) {
        case 'a':
            $this->db->from('reports');
            //$this->db->where('reportuserId',$_id);
            $query = $this->db->get();
            return $query->num_rows();
            break;

        case 'u':
            $this->db->from('reply');
            $this->db->where('userSelection',$id);
            $query = $this->db->get();
            return $query->num_rows();
            break;
    }
 }

 function delete_row($user_id)
 {
    $this->load->model('user');
    $this->user->delete_user($user_id);
    redirect("home","refresh");
 }

 function savedata()
 {
    self::$data = array(
                    'email' => $this->input->post('email_e'),
                    'password' => $this->input->post('password_e'),
                    'type' => $this->input->post('type_e'),
                    'username' => $this->input->post('username_e')
      );

    $this->db->insert('users',self::$data);

    redirect('home','refresh');
 }

 function edit($id)
 {
    //$id = $this->input->post('id_e');
    $row = Home::getonerow($id);
    self::$data['r'] = $row;
    $this->load->view('edit',self::$data);
 }
/*
 function passTOnewdoc($id)
 {  
    $row = $this->getonerow($id);
    $data['rw'] = $row;
    $this->load->view('newdoc',$data);
 }

function onlyforadmin()
 {
    echo "new page";
 } 
 */

 function getonerow($id)
 {
    $this->db->where('id',$id);
    $qu = $this->db->get('users');
    return $qu->row();
    //$qu = $this->db->get('users');
    //if ($qu->num_rows() > 0)
    //{
    //$row = $qu->row(); 
    //return $row;
    //}
 }

 

 function update($id)
 {

    $this->db->where('id',$id);  
    self::$data = array(
                    //'id' => $this->input->post('id_e'),
                    'email' => $this->input->post('email_e'),
                    'password' => $this->input->post('password_e'),
                    'type' => $this->input->post('type_e'),
                    'username' => $this->input->post('username_e')
      );
    
    
   
    //$id = $this->input->post('id_e');

    //$this->load->view('edit');
    
    $this->db->update('users',self::$data);
    
    redirect('home','refresh'); 
    // return $id;
 }

 function updateOnDialog($id)
 {
    $this->db->where('id',$id);  
    self::$data = array(
                    //'id' => $this->input->post('id_e'),
                    'email' => $this->input->post('email_e'),
                    'password' => $this->input->post('password_e'),
                    'username' => $this->input->post('username_e')
      );
    
    
   
    //$id = $this->input->post('id_e');

    //$this->load->view('edit');
    
    $this->db->update('users',self::$data);
    
    redirect('home','refresh');
 }


 public function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }



}

?>