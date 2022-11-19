<?php

class M_kelas extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	function cek($table, $where){
		return $this->db->get_where($table, $where);
	}
	function cek1($kelas, $id){
		$data = $this->db->query("SELECT * FROM kelas WHERE kelas ='$kelas' AND id != '$id' ");
		return $data->result();
	}
	function cek2($jurusan, $id){
		$data = $this->db->query("SELECT * FROM jurusan WHERE jurusan ='$jurusan' AND id != '$id' ");
		return $data->result();
	}
	function data_kelas(){
		$data = $this->db->query("SELECT * FROM kelas ");
		return $data->result();
	}
	function tampil_data_kelas() {
		$this->datatables->select("id, kelas");
		$this->datatables->from('kelas');
		return $this->datatables->generate();
	}
	function simpan($object){
		$this->db->insert('kelas', $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function hapus($id){
		$this->db->delete('kelas', array('id' => $id));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function getbyid($id){
		$data = $this->db->query("SELECT * FROM kelas WHERE id = '$id' ");
		return $data->result();
	}
	function update($object, $id){
		$this->db->where_in("id", $id);
		$this->db->update("kelas", $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}

	function tampil_data_jurusan() {
		$this->datatables->select("id, jurusan");
		$this->datatables->from('jurusan');
		return $this->datatables->generate();
	}
	function simpan_jurusan($object){
		$this->db->insert('jurusan', $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function hapus_jurusan($id){
		$this->db->delete('jurusan', array('id' => $id));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function getbyid_jurusan($id){
		$data = $this->db->query("SELECT * FROM jurusan WHERE id = '$id' ");
		return $data->result();
	}
	function update_jurusan($object, $id){
		$this->db->where_in("id", $id);
		$this->db->update("jurusan", $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
}