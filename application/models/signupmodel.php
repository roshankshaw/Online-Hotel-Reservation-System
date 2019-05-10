<?php

class Signupmodel extends CI_Model{
	public function validate_signup($array){
		return $this->db->insert('users',$array);
	}
	public function fetch_userid($data)
	{
		$query=$this->db
						->where(['aadhar_no'=>$data])
						->get('users');
			if($query->num_rows())
			{
				return $query->row('user_id');
			}
			else{
				return FALSE;
			}
	}
	public function validate_admin($array){
		return $this->db->insert('hotel',$array);
	}
}