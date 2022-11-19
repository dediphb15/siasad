<?php

class M_berita extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	function cek($table, $where){
		return $this->db->get_where($table, $where);
	}
	function simpan($object){
		$this->db->insert('berita', $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function tampil_data_berita() {
		$this->datatables->select("id, judul, deskripsi, date");
		$this->datatables->from('berita');
		return $this->datatables->generate();
	}
	function  tampil_berita($slug){
		$data = $this->db->query("SELECT * FROM berita WHERE slug = '$slug'");
		return $data->result();
	}
	function  tampil_data_berita2(){
		$data = $this->db->query("SELECT * FROM berita order by date DESC");
		return $data->result();
	}
	function getbyid($id){
		$data = $this->db->query("SELECT * FROM berita WHERE id = '$id' ");
		return $data->result();
	}
	function update($object, $id){
		$this->db->where_in("id", $id);
		$this->db->update("berita", $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function hapus($id){
		$this->db->delete('berita', array('id' => $id));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}