<?php 

class Customermodel extends CI_Model{
	public function search($query, $limit, $offset){
		$q = $this->db->from('hotel')
						->like('location',$query)
						->limit($limit,$offset)
						->get();
		return $q->result();
	}
	public function count_search_results($query){
		$q = $this->db->from('hotel')
						->like('location',$query)
						->get();
		return $q->num_rows();
	}
	public function get_hotel_details_by_hotel_id($id)
	{
		$q=$this->db
					->where(['hotel_id'=>$id])
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
					->where(['hotel_id'=>$id,'availability !='=>'0'])
					->get('rooms');
			return $q->result();
	}
	public function get_room_for_booking($hotel_id,$room_type,$luxury)
	{
		$q=$this->db
					->where(['hotel_id'=>$hotel_id,'room_type'=>$room_type,'luxury'=>$luxury])
					->get('rooms');
		if($q->num_rows())
		{
			return $q->row();
		}
		else 
			return FALSE;
	}
	public function get_customer_details($user_id)
	{
		$q= $this->db
					->where(['user_id'=>$user_id])
					->get('users');		
		if($q->num_rows()){
			return $q->row();
		}
		else{
			return FALSE;
		}
	}
	public function add_booking($query)
	{
		return $this->db->insert('tbooking',$query);
	}
	public function decrement_room_availability($hotel_id,$room_type,$luxury,$query)
	{
		return $this->db
						->where(['hotel_id'=>$hotel_id,'room_type'=>$room_type,'luxury'=>$luxury])
						->update('rooms',$query);
	}
	public function get_booking_id($user_id,$hotel_id,$booking_date,$room_type,$room_no)
	{
		$q=$this->db
					->where(['hotel_id'=>$hotel_id,'user_id'=>$user_id,'room_type'=>$room_type,'booking_date'=>$booking_date,'no_of_rooms'=>$room_no])
					->get('tbooking');
			return $q->row()->booking_id;
	}
	public function get_booking_details($id)
	{
		$q=$this->db
					->where(['booking_id'=>$id])
					->get('tbooking');
			if($q->num_rows()){
				return $q->row();
			}
			else{
				return FALSE;
			}
	}
	public function get_my_bookings($user_id)
	{
		$q=$this->db
					->where(['user_id'=>$user_id])
					->get('tbooking');
		return $q->result();
	}
}