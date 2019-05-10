<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct(){
 		parent:: __construct();
 		$this->load->model('adminmodel','admin');
		$id=$this->session->userdata('user_id');
		$role=$this->session->userdata('role');
		if($id&&$role)
			return redirect('admin');
		if($id&&!$role)
			return redirect('customer');
 	}
	public function index()
	{
		//CHECKING IF USER IS ALREADY LOGGED IN
		//if($this->session->userdata('user_id'))
			//return redirect('admin/dashboard');
		$id=$this->session->userdata('user_id');

		$this->load->view('customer/public_login.php',['id'=>$id]);
	}
	public function user_login()
	{
		if($this->session->userdata('user_id'))
			return redirect('admin/dashboard');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('login_rules')){
			//validation success
			$post=$this->input->post();
			$password=md5($post['password']);
			$post['password']=$password;
			$this->load->model('loginmodel','login');
			$data=$this->login->validate_login($post);
			$login_id=$data->user_id;
			$role=$data->role;
			if($login_id){
				$this->load->library('session');
				$this->session->set_userdata('user_id',$login_id);
				$this->session->set_userdata('role',$role);
				return redirect('admin/dashboard');

			}else{
				// authentication failed.
				$this->session->set_flashdata('login_failed','Invalid Username/Password');
				return redirect('login');
			}	
		}
		else{
			$id=$this->session->userdata('user_id');
			$this->load->view('customer/public_login.php',['id'=>$id]);

		}
	}
}
