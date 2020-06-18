<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function setting(){

		$this->load->view('common/menu');
		$this->load->view('user/setting');
		$this->load->view('common/bottom');	
	}

	// Log user out
	public function logout(){
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		// Set message
		$this->session->set_flashdata('user_loggedout', '你已登出');

		redirect('login');
	}

	// Check if username exists
	public function check_username_exists($username){
		$this->form_validation->set_message('check_username_exists', '用户名已存在');
		if($this->user_model->check_username_exists($username)){
			return true;
		} else {
			return false;
		}
	}

	// Check if email exists
	public function check_email_exists($email){
		$this->form_validation->set_message('check_email_exists', '邮件已存在');
		if($this->user_model->check_email_exists($email)){
			return true;
		} else {
			return false;
		}
	}

}