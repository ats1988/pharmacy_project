<?php 

class User extends CI_Model {

	
	function login($email,$password,$type)
	{
		$this->db->select('id, email, password, type');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$this->db->where('type',$type);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}


 	function get_users()
 	{
  		/*$this->db->select('*');
		$this->db->from('users');

		$q = $this->db->get();

	    if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}*/
		//return $q->result();
		$this->load->database();
		$q = $this->db->query("SELECT * FROM users");
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}

 	}

 	function check_type()
 	{
 			$this->db->select('type');
            $this->db->from('users');
           	return $this->db->get()->result();
 	}

 	function delete_user($Uid)
 	{
 		$this->db->where('id',$Uid);
 		$this->db->delete('users');	
 	}
	
	function register_user()
	{
		/*$data['email'] = $this->input->post('email');
		$this->db->insert('users',$data);*/
		


	$data=array(
    'email'=>$this->input->post('email2'),
    'username'=>$this->input->post('username'),
    'password'=>$this->input->post('password2'),
    'type'=>$this->input->post('type')
  	);


		$eml = $data['email'];


		$splt = explode('@', $eml);
   		$nme = $splt[0];

   		$data['username'] = $nme;

   		/*if($data['password'] == null || $data['password'] == 0)
   		{
   			$str = 654987;
			$shuffled = str_shuffle($str);
   			$data['password'] = $shuffled;
   		}*/






  		$this->db->insert('users',$data);
  		return true;

	}

	function search($email)
	{
		$this->db->like('email',$email,'both');
		return $this->db->get('users')->result();
	}

}





?>