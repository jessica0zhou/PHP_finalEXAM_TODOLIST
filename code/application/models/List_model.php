<?php

class List_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_lists($slug = FALSE, $limit = FALSE, $offset = FALSE){
		if($limit){
			$this->db->limit($limit, $offset);
		}

		$user_id = $this->session->userdata('user_id');

		if($slug === FALSE){
			$this->db->order_by('id', 'ASC');
			$query = $this->db->get_where('todos', array('user_id' => $user_id));
			return $query->result_array();
		}
		$query = $this->db->get_where('todos', array('user_id' => $user_id));
		return $query->row_array(); 
	}

	public function create_list(){
		$data = array(
			'name' => $this->input->post('name'),
			'todo' => $this->input->post('todo'),
			'user_id' => $this->session->userdata('user_id'),
			'complete' => '0'
		);

		return $this->db->insert('todos', $data);
	}

	public function delete_list($id){
		$this->db->where('id', $id);
		$this->db->delete('todos');
		return true;
	}

	public function update_list(){

		$data = array(
			'name' => $this->input->post('name'),
			'todo' => $this->input->post('todo'),
			'user_id' => $this->session->userdata('user_id'),
			'complete' => $this->input->post('complete') ? '1' : '0'
		);
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('todos', $data);
	}

	public function change($id, $status){

		$data = array(
			'complete' => $status
		);
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('todos', $data);
	}

	public function get_list($id){
		$query = $this->db->get_where('todos', array('id' => $id));
		return $query->result_array();
	}

	public function get_list_by_status($id){
		$complete = $this->input->post('complete');
		$user_id = $this->session->userdata('user_id');
		if(empty($complete)&& !is_numeric($complete)){
			$sql = "SELECT * FROM `todos` WHERE user_id='$user_id'";
		}else{
			$sql = "SELECT * FROM `todos` WHERE complete='$complete' AND user_id='$user_id'";
		}
		
		$query = $this->db->query($sql);
		// $query = $this->db->get_where('todos', array('user_id' => $user_id));
		
		return $query->result_array();
	}

}