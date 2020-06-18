<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {

	/**
	 * List Page for this controller.
	 *
	 */
	public function home()
	{
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		$offset = 0;
		// Pagination Config	
		$config['base_url'] = base_url() . 'home';
		$config['total_rows'] = $this->db->count_all('todos');
		$config['per_page'] = 20;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination-link');

		// Init Pagination
		$this->pagination->initialize($config);

		$data['title'] = '待办列表';

		$data['todos'] = $this->list_model->get_lists(FALSE, $config['per_page'], $offset);

		$this->load->view('common/menu');
		$this->load->view('lists/home', $data);
		$this->load->view('common/bottom');
	}

	public function email(){

		$this->form_validation->set_rules('toemail', 'Toemail', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');

		$data['title'] = '发送邮件';
		if($this->form_validation->run() === FALSE){	
			$this->load->view('common/menu');
			$this->load->view('lists/email', $data);
			$this->load->view('common/bottom');
		}else {
			$this->email->from($this->session->userdata('email'));
			$this->email->to($this->input->post('toemail'));
			$this->email->subject($this->input->post('subject'));
			$this->email->message($this->input->post('content'));
			$result = $this->email->send();
			//发邮件
			redirect('home');
		}
	}

	public function send(){

		$this->email->from('发件人邮箱', '显示名称(可选)');
		$this->email->to('收件人邮箱');
		$this->email->cc('抄送人邮箱');
		$this->email->bcc('密送人邮箱');

		$this->email->subject('邮件主题');
		$this->email->message('邮件正文，支持html');
		$this->email->set_alt_message('如果使用html格式，对方不支持html时，显示的内容，如果不填写，会CI会自动将html标签去掉显示');

		$result = $this->email->send();
		if($result){
		    $data ['result'] = 'send success';
		}else{
		    $data ['result'] = 'send failed';
		}
		echo json_encode($data);exit;
	}

	public function search()
	{
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		$complete = intval($this->input->post('complete'));
		$data['todos']  = $this->list_model->get_list_by_status($complete);

		$this->load->view('common/menu');
		$this->load->view('lists/home', $data);
		$this->load->view('common/bottom');
	}

	public function create()
	{
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['title'] = '创建待办';

		// $data['categories'] = $this->list_model->get_categories();

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('todo', 'Todo', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('common/menu');
			$this->load->view('lists/create', $data);
			$this->load->view('common/bottom');
		} else {
			$this->list_model->create_list();
			// Set message
			$this->session->set_flashdata('post_created', '待办已创建');

			redirect('home');
		}
	}

	public function edit($id){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['title'] = '更新待办';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('todo', 'Todo', 'required');
		$data['post'] = $this->list_model->get_list($id);

		if($this->form_validation->run() === FALSE){
			$this->load->view('common/menu');
			$this->load->view('lists/update', $data);
			$this->load->view('common/bottom');
		}
		
	}

	public function update (){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$this->list_model->update_list();

		// Set message
		$this->session->set_flashdata('post_updated', '待办已更新');

		redirect('home');
	}

	public function delete (){
		// POST data
        $id = $this->input->post('id');
		$result = $this->list_model->delete_list($id);
				
		if($result){
			$data = array('code'=>'1' ,'message' => '删除成功');
		}else{
			$data = array('code'=>'0' ,'message' => '删除失败');
		}
        echo json_encode($data);
	}

	public function change (){
		$id = $this->input->post('id');
		$complete = $this->input->post('status') == '1' ? '0' : '1';

		$result = $this->list_model->change($id, $complete);
				
		if($result){
			$data = array('code'=>'1' ,'message' => '更改成功', 'complete' => $complete);
		}else{
			$data = array('code'=>'0' ,'message' => '更改失败');
		}
        echo json_encode($data);exit;
	}

}