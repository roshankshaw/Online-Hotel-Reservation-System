<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function index(){
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('role');
		return redirect('login');
	}
}