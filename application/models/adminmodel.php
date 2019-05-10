<?php 

class Adminmodel extends CI_Model{
	public function get_admin_details($id)
	{
		$q=$this->db
					->where(['user_id'=>$id])
					->get('users');
		if($q->num_rows())
		{
			return $q->row();
		}
		else 
			return FALSE;
	}
	public function get_hotel_details($id)
	{
		$q=$this->db
					->where(['user_id'=>$id])
					->get('hotel');
		if($q->num_rows())
		{
			return $q->row();
		}
		else 
			return FALSE;
	}
	
	public function get_room_details($id)
	{
		$q=$this->db
					->where(['hotel_id'=>$id])
					->get('rooms');
			return $q->result();
	}

}