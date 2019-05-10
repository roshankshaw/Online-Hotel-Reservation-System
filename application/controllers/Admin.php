<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
 		parent:: __construct();
 		$this->load->model('adminmodel','admin');
		$id=$this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		if(!$id)
			return redirect('login');
		if(!$role)
			return redirect('customer');
 	}
	public function index()
	{
		//CHECKING IF USER IS ALREADY LOGGED IN
		$id=$this->session->userdata('user_id');
		if($id)
			return redirect('admin/dashboard');
	}
	public function dashboard()
	{
		$id=$this->session->userdata('user_id');
		$user_details=$this->admin->get_admin_details($id);
		$hotel_details=$this->admin->get_hotel_details($id);
		$rooms=$this->admin->get_room_details($hotel_details->hotel_id);
		$data=[
				'id'=>$id,
				'user'=>$user_details,
				'hotel'=>$hotel_details,
				'rooms'=>$rooms
			];
		$this->load->view('admin/dashboard.php',$data);
	}

	//For rooms
	public function add_rooms()
	{
		$id=$this->session->userdata('user_id');
		$hotel_details=$this->admin->get_hotel_details($id);
		$data=[
				'id'=>$id,
				'hotel'=>$hotel_details
			];
		$this->load->view('admin/add_rooms.php',$data);
	}
	public function store_room()
	{
		$id=$this->session->userdata('user_id');
		$hotel_details=$this->admin->get_hotel_details($id);
		$post=$this->input->post();
		unset($post['submit']);
		$post['hotel_id']=$hotel_details->hotel_id;
		$this->load->model('roommodel','room');
		//Flashand redirect function checks whether the function in model  is performed properly or not
		$this->flashAndRedirect($this->room->add_room($post),'added','add');
		$this->load->view('admin/add_rooms.php');
	}
	public function edit_room($hotel_id,$room_type,$luxury)
	{
		$id=$this->session->userdata('user_id');
		$hotel_details=$this->admin->get_hotel_details($id);
		$this->load->model('roommodel','room');
		$room_details=$this->room->get_room_details($hotel_id,$room_type,$luxury);
		if($room_details)
			$this->load->view('admin/edit_rooms.php',['room'=>$room_details]);
		else
			return redirect('admin/dashboard');
	}
	public function update_room($hotel_id,$room_type,$luxury)
	{
		$id=$this->session->userdata('user_id');
		$hotel_details=$this->admin->get_hotel_details($id);
		$post=$this->input->post();
		unset($post['submit']);
		$post['hotel_id']=$hotel_details->hotel_id;
		$this->load->model('roommodel','room');
		//Flashand redirect function checks whether the function in model  is performed properly or not
		$this->flashAndRedirect($this->room->update_room($hotel_id,$room_type,$luxury,$post),'updated','update');
		$this->load->view('admin/add_rooms.php');

	}
	public function delete_room()
	{
		$id=$this->session->userdata('user_id');
		$hotel_details=$this->admin->get_hotel_details($id);
		$post=$this->input->post();
		unset($post['submit']);
		$this->load->model('roommodel','room');
		//Flashand redirect function checks whether the function in model  is performed properly or not
		$this->flashAndRedirect($this->room->delete_room($post),'deleted','delete');
		$this->load->view('admin/add_rooms.php');
	}
	private function flashAndRedirect($condition,$successKeyword,$failureKeyword)
	{
		if($condition)
		{
			$this->session->set_flashdata('feedback',"Rooms $successKeyword Successfully");	
			$this->session->set_flashdata('feedback_class','alert-success');	
		}	
		else{
			$this->session->set_flashdata('feedback',"Article Failed to $failureKeyword.Please try Again");	
			$this->session->set_flashdata('feedback_class','alert-danger');	
		}
		return redirect('admin/dashboard');
	}
}