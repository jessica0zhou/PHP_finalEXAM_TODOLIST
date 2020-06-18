<?php

class Friend_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function get_lists($slug = FALSE, $limit = FALSE, $offset = FALSE){
		if($limit){
			$this->db->limit($limit, $offset);
		}

		$user_id = $this->session->userdata('user_id');

		if($slug === FALSE){
			$sql = "select  a.id as id, sid as uid, name, email, status from apply a LEFT JOIN users u on a.sid = u.id where a.uid='$user_id'";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		$query = $this->db->get_where('friend', array('user_id' => $user_id));
		return $query->row_array(); 
	}

	public function create_list(){
		$data = array(
			'sid' => $this->input->post('id'),
			'status' => '1',
			'uid' => $this->session->userdata('user_id')
		);

		return $this->db->insert('apply', $data);
	}

	public function delete_list($id){
		$this->db->where('id', $id);
		$this->db->delete('apply');
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
		return $this->db->update('friend', $data);
	}

	public function get_list($id){
		$query = $this->db->get_where('friend', array('id' => $id));
		return $query->result_array();
	}

	public function get_list_by_status($id){
		$name = $this->input->post('name');
		$user_id = $this->session->userdata('user_id');
		
		if(empty($name)){
			$sql = "SELECT * FROM `users` WHERE users.id <> $user_id";
		}else{
			$sql = "SELECT * FROM `users` WHERE name='$name'";
		}
		
		$query = $this->db->query($sql);
		// $query = $this->db->get_where('todos', array('user_id' => $user_id));
		
		return $query->result_array();
	}

}