<?php

class M_jadwal extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	function cek($table, $where){
		return $this->db->get_where($table, $where);
	}
	function cek1($kode_mapel, $id){
		$data = $this->db->query("SELECT * FROM mapel WHERE kode_mapel ='$kode_mapel' AND id != '$id' ");
		return $data->result();
	}
	function cek2($nama_mapel, $id){
		$data = $this->db->query("SELECT * FROM mapel WHERE nama_mapel ='$nama_mapel' AND id != '$id' ");
		return $data->result();
	}
	function tampil_data_jadwal(){
		$this->datatables->select("id, tahun_ajaran, kelas,  hari");
		$this->datatables->from('jadwal');
		$this->datatables->group_by('kelas');
		$this->datatables->group_by('tahun_ajaran');
		return $this->datatables->generate();
	}
	function kelas(){
		$data = $this->db->query("SELECT * FROM kelas");
		return $data->result();
	}
	function jurusan(){
		$data = $this->db->query("SELECT * FROM jurusan");
		return $data->result();
	}
	function mapel(){
		$data = $this->db->query("SELECT * FROM mapel");
		return $data->result();
	}
	function simpan_jadwal($object){
		$this->db->insert('jadwal', $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function get_jadwal($tahun, $kelas){
		$data = $this->db->query("SELECT * FROM jadwal WHERE tahun_ajaran = '$tahun' AND kelas = '$kelas' AND jam != '' ");
		return $data->result();
	}
	function update_jadwal($object, $id){
		$this->db->where("id", $id);
		$this->db->update("jadwal", $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function hapus_jadwal($id){
		$this->db->delete('jadwal', array('id' => $id));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function tampil_data_mapel() {
		$this->datatables->select("id, kode_mapel, nama_mapel");
		$this->datatables->from('mapel');
		$this->datatables->where('nama_mapel !=', 'kosong');
		return $this->datatables->generate();
	}
	function simpan($object){
		$this->db->insert('mapel', $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function hapus($id){
		$this->db->delete('mapel', array('id' => $id));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function getbyid($id){
		$data = $this->db->query("SELECT * FROM mapel WHERE id = '$id' ");
		return $data->result();
	}
	function update($object, $id){
		$this->db->where_in("id", $id);
		$this->db->update("mapel", $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function hapus_data_jadwal($tahun_ajaran, $kelas){
		$this->db->delete('jadwal', array('tahun_ajaran' => $tahun_ajaran, 'kelas' => $kelas));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function total_jam_mengajar(){
		
	}
}