<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Register Page for this controller.
	 *
	 */
	public function index()
	{
		$data['title'] = '注册';

		$this->form_validation->set_rules('username', 'Username', 'required');
		// $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_confirmation', 'Confirm Password', 'matches[password]');
		// print_r($this->input->post('password'));exit;
		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('user/register', $data);
			$this->load->view('templates/footer');
		} else {
			// Encrypt password
			$enc_password = md5($this->input->post('password'));
			$this->user_model->register($enc_password);

			// Set message
			$this->session->set_flashdata('user_registered', '注册成功请登录');

			redirect('home');
		}
	}
}
