<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Tables extends CI_Controller {

 public $Url = 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css';

 public static $session_data = array() ;

 public static $data =   array()  ;

 public static $_email , $_type , $_id ;


 function __construct()
 {
   parent::__construct();
    $this->load->model('user','',TRUE);
    $this->load->model('documents','',TRUE);
    $this->load->library('user_agent');
    $this->load->library('../controllers/home'); 
    self::$session_data = $this->session->userdata('logged_in');
    
    self::$_email = self::$session_data['email'];
    self::$_type = self::$session_data['type'];
    self::$_id = self::$session_data['id'];

    self::$data = array('email' => self::$_email,
        'type' => self::$_type,
        'id' => self::$_id,
        );
 }

 function index()
 {
     //self::$session_data = $this->session->userdata('logged_in');
     /*$data['email'] = $session_data['email'];
     $data['type'] = $session_data['type'];
     $data['id'] = $session_data['id'];*/

      
      $data['do_this'] = array();
      $data['do_this'] = $this->user->get_users();


     //$ci = & get_instance();
     $this->session->set_userdata('count', 0);

 }

 

 function convertTOpdf($parameter='')
 {
    /*
    $this->load->helper('../mpdf574/mpdf.php'); 

    $mpdf = new mPDF();

    $stylesheet = file_get_contents($this->Url);
    $mpdf->WriteHtml($stylesheet,1);
    $mpdf->WriteHtml($parameter);
    $mpdf->Output();

    exit;
    */
 }

 public function passTOsolo()
 {
    //$session_data = $this->session->userdata('logged_in');
     /*   $data['email'] = self::$session_data['email'];
     $data['type'] = self::$session_data['type'];
     $data['id'] = self::$session_data['id'];   */


    $this->load->view('solo',self::$data);
 }

 function delete_row($type,$id)
 {
    $this->load->model('documents');

    switch($type)
    {
    case 'a':
    $this->documents->delete_from_reports($id);
    redirect("home","refresh");
        break;
    case 'u':
    $this->documents->delete_from_reply($id);
    redirect("home","refresh");
        break;
    }
    
 }

 public function reportsTABLEpage($id)
 {  

     /*$data['email'] = self::$session_data['email'];
     $data['type'] = self::$session_data['type'];
     $data['id'] = self::$session_data['id'];*/

    /*$_type = $data['type'];
    $_id = $data['id'];*/
    
    //self::$data['count'];
    self::$data['count'] = $this->session->userdata('count');//

    $home = new home();
    self::$data['count'] = $home->forcounter(self::$_type,self::$_id);

    
    
    Tables::getonerow($id);
    
    $row  = Tables::getTableReports(self::$_type);
    //$data['rw'] = $row;
    self::$data['rw']  = $row ;

   switch(self::$_type)
   {
    case 'a':
    $this->load->view('reportstable',self::$data);
        break;
    case 'u':
    $this->load->view('replytable',self::$data);
        break;
   }
 }


 function getonerow($id)
 {
    $this->db->where('id',$id);
    $qu = $this->db->get('users');
    return $qu->row();
    /*$qu = $this->db->get('users');
    if ($qu->num_rows() > 0)
    {
    $row = $qu->row(); 
    return $row;
    }*/
 }

 function getTableReports($type)
 {
    /*$session_infoc = $this->session->userdata('logged_in');
    $infoc['type'] = $session_infoc['type'];
    $infoc['id'] = $session_infoc['id'];*/
    $type = self::$_type;
    $id = self::$_id;

    switch ($type) {
        case 'a':
            $this->db->select('*');
            $this->db->from('reports');
            //$this->db->where('reportId',$id);
            $this->db->join('users', 'users.id = reports.reportuserId', 'left');
            $query = $this->db->get();
            return $query->result();
            break;

        case 'u':
            $this->db->select("*");
            $this->db->from('reply');
            $this->db->where('userSelection', $id);
            $this->db->join('users', 'users.id = reply.replyuserId', 'left');
            $query = $this->db->get();
            return $query->result();
            break;
    }
    
 }


 function passTOsolo2()
 {
    /*$session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
     $data['type'] = $session_data['type'];
     $data['id'] = $session_data['id'];*/

    
    $this->load->view('solo2',self::$data);
 }

 

}


?>