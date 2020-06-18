<?php
//报告运行时错误
error_reporting(E_ERROR | E_WARNING | E_PARSE);

defined('BASEPATH') OR exit('No direct script access allowed');

class Friend extends CI_Controller {

	public function index(){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		$offset = 0;
		// Pagination Config	
		$config['base_url'] = base_url() . 'home';
		$config['total_rows'] = $this->db->count_all('apply');
		$config['per_page'] = 20;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination-link');

		// Init Pagination
		$this->pagination->initialize($config);

		$data['title'] = '好友列表';

		$data['friends'] = $this->friend_model->get_lists(FALSE, $config['per_page'], $offset);

		$this->load->view('common/menu');
		$this->load->view('friend/index', $data);
		$this->load->view('common/bottom');	
	}

	public function find(){
		$data['title'] = '好友列表';
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		$status = intval($this->input->post('status'));
		$data['friends']  = $this->friend_model->get_list_by_status($status);

		$this->load->view('common/menu');
		$this->load->view('friend/index', $data);
		$this->load->view('common/bottom');
	}

	public function add (){
		// POST data
        $id = $this->input->post('id');
		$result = $this->friend_model->create_list($id);
				
		if($result){
			$data = array('code'=>'1' ,'message' => '添加成功');
		}else{
			$data = array('code'=>'0' ,'message' => '添加失败');
		}
        echo json_encode($data);
	}

	public function delfriend (){
		// POST data
        $id = $this->input->post('id');
		$result = $this->friend_model->delete_list($id);
				
		if($result){
			$data = array('code'=>'1' ,'message' => '删除成功');
		}else{
			$data = array('code'=>'0' ,'message' => '删除失败');
		}
        echo json_encode($data);
	}

}