<?php 

class Roommodel extends CI_Model{
	public function add_room($query)
	{
		return $this->db->insert('rooms',$query);
	}
	public function get_room_details($hotel_id,$room_type,$luxury)
	{
		$query=$this->db
				->where(['hotel_id'=>$hotel_id,'room_type'=>$room_type,'luxury'=>$luxury])
				->get('rooms');
		if($query->num_rows())
			return $query->row();
		else
			return false;
	}
	public function update_room($hotel_id,$room_type,$luxury,$query)
	{
		return $this->db
						->where(['hotel_id'=>$hotel_id,'room_type'=>$room_type,'luxury'=>$luxury])
						->update('rooms',$query);
	}
	public function delete_room($query)
	{
		return $this
					->db->delete('rooms',['hotel_id'=>$query['hotel_id'],'room_type'=>$query['room_type'],'luxury'=>$query['luxury']]);
	}
}
