<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model('user','',TRUE);
	}
	
	public function index()
	{
		$this->load->helper(array('form'));
		$this->load->view('login_view');
	}

	function search()
 	{
 		if(isset($_GET['term']))
 		{
 			$result = $this->user->search($_GET['term']);
    		if(count($result) > 0)
    		{
        	foreach($result as $pr)
        	{
            	$arr_result[] = $pr->email;
        	}
        	echo json_encode($arr_result);
    		}
		}
 	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */