<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct(){
 		parent:: __construct();
 		$this->load->model('adminmodel','admin');
		$id=$this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		if(!$id)
			return redirect('login');
		if($role)
			return redirect('admin');
 	}
 	public function index()
	{
		return redirect('customer/dashboard');
	}
 	public function dashboard()
 	{
 		$id=$this->session->userdata('user_id');
		$this->load->model('customermodel','customer');
 		$bookings=$this->customer->get_my_bookings($id);
 		$user=$this->customer->get_customer_details($id);
 		foreach($bookings as $booking)
 		{
 			$booking->hotel_name=$this->customer->get_hotel_details_by_hotel_id($booking->hotel_id)->hotel_name;
 		}
		$data=[
				'id'=>$id,
				'bookings'=>$bookings,
				'user'=>$user
			];
		$this->load->view('customer/customer_dashboard.php',$data);
 	}
	
	public function search_hotels(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('query','Query','required');
		if(!$this->form_validation->run())
			return $this->index();
		$query=$this->input->post('query');
		return redirect("customer/search_results/$query");
		// $this->load->model('Articlesmodel','articles');
		// $articles=$this->articles->search($query);

	}
	public function search_results ( $query )
	{

		$this->load->model('customermodel','customer');

		$this->load->library('pagination');
		$config=[
			'base_url'	=>	base_url('index.php/customer/search_results/$query'),
			'per_page'	=>	5,
			'total_rows'=> $this->customer->count_search_results($query),
			'full_tag_open' => "<ul class ='pagination'>",
			'full_tag_close'=> "</ul>",
			'uri_segment' => 4,
			'first_tag_open' => "<li class ='page-item'>",
			'first_tag_close'=> "</li>",
			'last_tag_open' => "<li class ='page-item'>",
			'last_tag_close'=> "</li>",
			'next_tag_open' => "<li class ='page-item'>",
			'next_tag_close'=> "</li>",
			'prev_tag_open' => "<li class ='page-item'>",
			'prev_tag_close'=> "</li>",
			'num_tag_open' => "<li class ='page-item'>",
			'num_tag_close'=> "</a></li>",
			'cur_tag_open' => "<li class ='page-item active'>",
			'cur_tag_close'=> "</li>"
		];
		$this->pagination->initialize($config);
		$hotels = $this->customer->search( $query, $config['per_page'],$this->uri->segment(4));
		$id=$this->session->userdata('user_id');
		$data=[
				'id'=>$id,
				'hotels'=>$hotels
			  ];
		$this->load->view('customer/search_hotels',$data);
	}
	public function view_hotel_details($hotel_id)
	{
		$this->load->model('customermodel');
		$id=$this->session->userdata('user_id');
		$hotel=$this->customermodel->get_hotel_details_by_hotel_id($hotel_id);
		$rooms=$this->customermodel->get_room_details($hotel_id);
		$data=[
				'id'=>$id,
				'hotel'=>$hotel,
				'rooms'=>$rooms,
			  ];
		$this->load->view('customer/view_hotel',$data);
	}
	public function add_booking($user_id,$hotel_id,$room_type,$luxury)
	{
		$id=$this->session->userdata('user_id');
		$this->load->model('customermodel','customer');
		$hotel=$this->customer->get_hotel_details_by_hotel_id($hotel_id);
		$room=$this->customer->get_room_for_booking($hotel_id,$room_type,$luxury);
		$user=$this->customer->get_customer_details($id);
		$data=[
				'room'=>$room,
				'hotel'=>$hotel,
				'id'=>$id,
				'user'=>$user
			  ];
		$this->load->view('customer/add_booking',$data);
	}
	public function book_room()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('day_no','day_no','greater_than[0]');
		$this->form_validation->set_rules('check_in_date','check_in_date','required');
		$this->form_validation->set_message('compareDate', 'Check-in Date should be greater than current date');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		if($this->form_validation->run())
		{
			if($post=$this->input->post())
			{
				unset($post['submit']);
				$total_cost=$post['cost']*$post['day_no']*$post['no_of_rooms'];
				$post['cost']=$total_cost;
				$this->load->model('customermodel','customer');
				if($this->customer->add_booking($post))
				{
					$room_details=$this->customer->get_room_for_booking($post['hotel_id'],$post['room_type'],$post['luxury']);
					$room_details->availability-=$post['no_of_rooms'];//decrement
					$this->customer->decrement_room_availability($post['hotel_id'],$post['room_type'],$post['luxury'],$room_details);
					$booking_id=$this->customer->get_booking_id($post['user_id'],$post['hotel_id'],$post['booking_date'],$post['room_type'],$post['no_of_rooms']);
					return redirect("customer/view_transcript/$booking_id");
				}
				else
				{
					$this->session->set_flashdata('booking_alert','Booking failed');
					return redirect('customer/dashboard');
				}
			}
			else
			{
				return redirect('customer/dashboard/');
			}
		}
		else
		{
			$post=$this->input->post();
			$id=$this->session->userdata('user_id');
			$this->load->model('customermodel','customer');
			$hotel=$this->customer->get_hotel_details_by_hotel_id($post['hotel_id']);
			$room=$this->customer->get_room_for_booking($post['hotel_id'],$post['room_type'],$post['luxury']);
			$user=$this->customer->get_customer_details($id);
			$data=[
					'room'=>$room,
					'hotel'=>$hotel,
					'id'=>$id,
					'user'=>$user
				  ];
			$this->load->view('customer/add_booking',$data);
		}
	}
	public function view_transcript($query)
	{
		$id=$this->session->userdata('user_id');
		$this->load->model('customermodel','customer');
		$booking_details=$this->customer->get_booking_details($query);
		$hotel=$this->customer->get_hotel_details_by_hotel_id($booking_details->hotel_id);
		$room=$this->customer->get_room_for_booking($booking_details->hotel_id,$booking_details->room_type,$booking_details->luxury);
		$user=$this->customer->get_customer_details($booking_details->user_id);
		$data=[
					'room'=>$room,
					'hotel'=>$hotel,
					'id'=>$id,
					'user'=>$user,
					'booking'=>$booking_details
			  ];
		$this->load->view('customer/booking_transcript.php',$data);
	}
}
