<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	function getAll($where="")
	{
		if($where) $this->db->where($where);
		return $this->db->get("user");
	}
	function getUser(){
		return $this->db->get_where('user', array('session_id !=' => $this->session->userdata('id')))->result();
	}
	function getInsert($data){
		$this->db->insert('user', $data);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function getRemove($id, $data){
		// $this->db->where('session_id', $id);
		$this->db->delete('user', array('session_id' => $id));
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function getUpdateuser($id_user, $object){
		$this->db->where('user_1', $id_user);
		$this->db->update('chat', $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function reset($email, $password){
		$this->db->where('email', $email);
		$this->db->update('siswa',array('password' => md5($password)));
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function reset2($email, $password){
		$this->db->where('email', $email);
		$this->db->update('karyawan',array('password' => md5($password)));
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
}
