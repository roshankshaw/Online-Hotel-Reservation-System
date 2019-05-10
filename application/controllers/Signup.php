<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	public function __construct(){
 		parent:: __construct();
		$id=$this->session->userdata('user_id');
 	}
	public function index()
	{
		$id=$this->session->userdata('user_id');
		$this->load->view('customer/check_signup.php',['id'=>$id]);
	}
	public function add_admin($user_id)
	{
		$id=$this->session->userdata('user_id');
		$this->load->view('customer/admin_signup.php',['user_id'=>$user_id,'id'=>$id]);
	}
	public function add_user($role)
	{
		$id=$this->session->userdata('user_id');
		$this->load->view('customer/customer_signup.php',['role'=>$role,'id'=>$id]);
	}
	public function store_user()
	{
		$id=$this->session->userdata('user_id');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		if($this->form_validation->run('signup_rules')){
			//Validation successful
			$post=$this->input->post();
			$post['password']=md5($post['password']);
			unset($post['submit']);
			unset($post['confirmpassword']);
			$this->load->model('signupmodel','signup');
			if($this->signup->validate_signup($post))
			{
				
				if($post['role']==1)
				{
					$this->session->set_flashdata('register_alert','Now fill the mandatory details to successfully register as an admin');
					$user_id=$this->signup->fetch_userid($post['aadhar_no']);
					if($user_id)
						return redirect('signup/add_admin/'.$user_id);
				}
				else
				{
					$this->session->set_flashdata('register_alert','Your account has been successfully created.Now login to your account');
					return redirect('signup/add_user/0');
				}
			}
			else
			{	
				$this->session->set_flashdata('register_alert','Signup failed');
				return redirect('signup/add_user/0');
			}
			
		}
		else
		{
			$post=$this->input->post();
			$this->load->view('customer/customer_signup.php',['role'=>$post['role'],'id'=>$id]);
		}
	}
	public function store_admin()
	{
		$id=$this->session->userdata('user_id');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		if($this->form_validation->run('admin_signup_rules')){
			//Validation successful
			$post=$this->input->post();
			unset($post['submit']);
			$this->load->model('signupmodel','signup');
			if($this->signup->validate_admin($post))
			{
				$this->session->set_flashdata('admin_register_alert','Your admin account has been successfully created.Now sign in to your account');
				return redirect('signup/add_admin/'.$post['user_id']);
			}
			else
			{	
				$this->session->set_flashdata('admin_register_alert','Signup failed');
				return redirect('signup/add_admin/'.$post['user_id']);
			}
		}
		else
		{
			$post=$this->input->post();
			$this->load->view('customer/admin_signup.php',['user_id'=>$post['user_id'],'id'=>$id]);
		}
	}


}