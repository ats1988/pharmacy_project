<?php 

class Documents extends CI_Model {

 function __construct()
 {
    parent::__construct();
    $this->load->model('user','',TRUE);
 }

 function index()
 {
 	
 }

 function delete_from_reports($Rid)
 {
 		$this->db->where('reportId',$Rid);
 		$this->db->delete('reports');	
 }

 function delete_from_reply($Rid)
 {
 		$this->db->where('replyId',$Rid);
 		$this->db->delete('reply');	
 }





}

?>