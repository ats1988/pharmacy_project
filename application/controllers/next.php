<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Next extends CI_Controller {

 public static $session_data = array() ;

 public static $data =   array()  ;

 public static $_email , $_type , $_id ;

 function __construct()
 {
   parent::__construct();
    $this->load->model('user','',TRUE);
    $this->load->model('documents','',TRUE);
    $this->load->library('user_agent');
   // $this->load->model('home','',TRUE);  

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
    // $this->load->library('../controllers/home');
   /* $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
     $data['type'] = $session_data['type'];
     $data['id'] = $session_data['id']; */

      
      $data['to_do'] = array();
      $data['to_do'] = $this->user->get_users();
 }

 function justforCHECK()
 {  
  
  echo "<script>alert('just checking..');</script>";
 
 }



 function saveDataforuser()
 {

   //$this->load->view("next/passTOnewdoc");

   if($this->input->post('Save_passTOnewdoc'))
   {


    Next::checkingFORSOMEerrors();


   if($this->form_validation->run() == FALSE)
   {
    // redirect($this->agent->referrer());

    Next::incaseitsFALSE();

   }
   else
   {
   
   /*$session_detail = $this->session->userdata('logged_in');
     $detail['id'] = $session_detail['id'];*/

    self::$data = array(
                    //'reportId' => $detail['id'],
                    'reportuserId' => self::$_id,
                    'surname' => $this->input->post('surname'),
                    'address' => $this->input->post('address'),
                    'postcode' => $this->input->post('post_code'),
                    'gender' => $this->input->post('gender'),
                    'height' => $this->input->post('height'),
                    'weight' => $this->input->post('weight'),
                    'smoking' => $this->input->post('smoking'),
                    'beingTreated' => $this->input->post('being_treated'),
                    'receiving' => $this->input->post('receiving')
                    
                              
      );

    $receiving =  $this->input->post('receiving');
    $beingTreated = $this->input->post('being_treated');

    switch($receiving)
    {
        case 'yes':
                if(empty($this->input->post('receiving_if_yes')))
                {
                    is_null($this->input->post('receiving_if_yes'));
                    self::$data['receiving'] = 'yes, left empty'; 
                }else{self::$data['receiving'] = $this->input->post('receiving_if_yes');}
          break;
        case 'no':self::$data['receiving'] = 'no';
          break;
    }

    switch($beingTreated)
    {
        case 'yes':
                if(empty($this->input->post('being_treated_if_yes')))
                {
                    is_null($this->input->post('being_treated_if_yes'));
                    self::$data['beingTreated'] = 'yes, left empty'; 
                }else{self::$data['beingTreated'] = $this->input->post('being_treated_if_yes');}
          break;
        case 'no':self::$data['beingTreated'] = 'no';
          break;
    }    



    $this->db->insert('reports',self::$data);

    redirect('home','refresh');
 
  }
  
    }

}


function passTOnewdoc($id)
 {  
    $row = Next::getonerow($id);
    self::$data['rw'] = $row;
    $this->load->view('newdoc',self::$data);
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

 function onlyforadmin()
 {
    $this->load->view('newreport');
 }

 function incaseitsFALSE()
 {
    /*$session_data_in_use = $this->session->userdata('logged_in');
     $info['email'] = $session_data_in_use['email'];
     $info['type'] = $session_data_in_use['type'];
     $info['id'] = $session_data_in_use['id'];*/

    $row = Next::getonerow(self::$_id);
    self::$data['rw'] = $row;
    $this->load->view('newdoc',self::$data);
 }

 public function checkingFORSOMEerrors()
 {

   //Next::justforCHECK();

   $this->load->library('form_validation');
   
    /*$session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
     $data['type'] = $session_data['type'];*/

   switch (self::$_type) {
   case 'u':
       
   $this->form_validation->set_rules('surname', 'Surname', 'trim|min_length[4]|required|xss_clean');
   $this->form_validation->set_rules('address', 'Address', 'trim|min_length[4]|required|xss_clean');
   $this->form_validation->set_rules('post_code', 'Post Code', 'trim|numeric|required|xss_clean');
   $this->form_validation->set_rules('gender', 'Gender', 'required');
   $this->form_validation->set_rules('height', 'Height', 'trim|numeric|required|min_length[3]|xss_clean');
   $this->form_validation->set_rules('weight', 'Weight', 'trim|numeric|required|min_length[2]|xss_clean');
   $this->form_validation->set_rules('smoking', 'Smoking', 'required');
   $this->form_validation->set_rules('being_treated', 'Being Treated', 'required');
   $this->form_validation->set_rules('receiving', 'Receiving', 'required');
   break;

   case 'a':
       
   $this->form_validation->set_rules('drug_name', 'Drug Name', 'trim|min_length[4]|required|xss_clean');
   $this->form_validation->set_rules('rx_number', 'Rx Number', 'trim|min_length[4]|numeric|required|xss_clean');
   $this->form_validation->set_rules('TreatmentFor', 'Treatment For', 'trim|min_length[4]|required|xss_clean');
   $this->form_validation->set_rules('dosage', 'Dosage', 'trim|min_length[2]|required|xss_clean');
   $this->form_validation->set_rules('refill', 'Refill', 'regex_match[/^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/]');
   $this->form_validation->set_rules('notes', 'Notes', 'trim|min_length[5]|required|xss_clean');
   break;


                     }

 }

 function saveDataforadmin()
 {

    if($this->input->post('Save_passTOnewreport'))
   {


        Next::checkingFORSOMEerrors();


   if($this->form_validation->run() == FALSE)
   {
    // redirect($this->agent->referrer());

        Next::incaseitsFALSEonREPORTpage();

   }
   else
   {
    
    /*$session_detail = $this->session->userdata('logged_in');
     $detail['id'] = $session_detail['id'];*/

    $data = array(
                    'replyuserId' => self::$_id,
                    'userSelection' => $this->input->post('userselect'),
                    'drugName' => $this->input->post('drug_name'),
                    'RxNumber' => $this->input->post('rx_number'),
                    'treatmentFor' => $this->input->post('TreatmentFor'),
                    'dosage' => $this->input->post('dosage'),
                    'PharmacyNameandPhone' => $this->input->post('pharmacyPart'),
                    'refill' => $this->input->post('refill'),
                    'notes' => $this->input->post('notes')
                              
      );

       

    $this->db->insert('reply',$data);

    redirect('home','refresh');
 
  }

   }


 }


 function passTOnewreport($id)
 {  
    $row = Next::getonerow($id);
    self::$data['rw'] = $row;

    self::$data['to_do'] = array();
    self::$data['to_do'] = $this->user->get_users();

    $this->load->view('newreport',self::$data);
 }


 function incaseitsFALSEonREPORTpage()
 {
    /*$session_data_in_use = $this->session->userdata('logged_in');
    $info['email'] = $session_data_in_use['email'];
    $info['type'] = $session_data_in_use['type'];
    $info['id'] = $session_data_in_use['id'];*/

    self::$data['to_do'] = array();
    self::$data['to_do'] = $this->user->get_users();

    $row = Next::getonerow(self::$_id);
    self::$data['rw'] = $row;
    $this->load->view('newreport',self::$data);
 }


}


?>