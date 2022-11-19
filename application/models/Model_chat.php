<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_chat extends CI_Model {

	function getAll($where="")
	{
		if($where) $this->db->where($where);
		$this->db->order_by("created_at","ASC");
		return $this->db->get("chat");
	}
	function getAll2($where="")
	{
		if($where) $this->db->where($where);
		$this->db->order_by("created_at","ASC");
		$this->db->limit(1);
		return $this->db->get("chat");
	}

	function getBaca(){
		// $this->db->select('*');
		$this->db->where('baca', 0);
		$this->db->where('user_1 ', $this->session->userdata('id'));
		$this->db->where('user_2 ', $this->session->userdata('id'));
		return $this->db->get("chat")->result();
	}
	function getBaca2($id){
		// $this->db->select('*');
		// $this->db->where('user_1', $id);
		$this->db->where('baca', 0);
		$this->db->where('user_1 ', $this->session->userdata('id'));
		$this->db->where('user_2 ', $this->session->userdata('id'));
		return $this->db->get("chat")->result();
	}

	function getChat2($id){
		return $this->db->where('user_1', $id)->order_by("id_chat","DESC")->limit(1)->get("chat")->row_array();
	}
	function getInsert($data){
		$this->db->insert('chat', $data);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	
	function getLastId($where){
		return $this->db->where($where)->order_by("id_chat","DESC")->limit(1)->get("chat")->row_array();
	}
	function getUser(){
		$data = $this->db->query("SELECT karyawan.*, siswa.* FROM karyawan, siswa");
		return $data->result();
	
	}
}
