<?php

class M_testimoni extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	function cek($table, $where){
		return $this->db->get_where($table, $where);
	}
	function simpan($object){
		$this->db->insert('testimoni', $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function tampil_data_gallery() {
		$this->datatables->select("testimoni.id, testimoni.judul, testimoni.deskripsi, testimoni.date, testimoni.id_siswa, siswa.nama");
		$this->datatables->from('testimoni');
		$this->datatables->join('siswa', 'siswa.id = testimoni.id_siswa');
		return $this->datatables->generate();
	}
	function getbyid($id){
		$data = $this->db->query("SELECT * FROM testimoni WHERE id = '$id' ");
		return $data->result();
	}
	function tampil_data(){
		$data = $this->db->query("SELECT testimoni.id, testimoni.judul, testimoni.deskripsi, testimoni.date, testimoni.id_siswa, siswa.nama, siswa.foto, siswa.angkatan FROM testimoni JOIN siswa ON siswa.id = testimoni.id_siswa WHERE setujui = 1 ");
		return $data->result();
	}
	function update($object, $id){
		$this->db->where_in("id", $id);
		$this->db->update("testimoni", $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function hapus($id){
		$this->db->delete('testimoni', array('id' => $id));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}