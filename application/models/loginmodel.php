<?php 

class Loginmodel extends CI_Model{

	public function validate_login($query)
	{
		$q= $this->db
					->where(['email'=>$query['email'],'password'=>$query['password']])
					->get('users');		
		if($q->num_rows()){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}

}