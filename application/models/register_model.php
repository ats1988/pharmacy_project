<?php 

class Register_model extends CI_Model {

	function register_user()
	{
		$data['email'] = $this->input->post('email');
		$this->db->insert('users',$data);
	  $data=array(
    'username'=>$this->input->post('username'),
    'email'=>$this->input->post('email'),
    'password'=>md5($this->input->post('password')),
    'type'=>$this->input->post('type')
  	);
  		$insert = $this->db->insert('users',$data);
  		return $insert;
	}
}





?>