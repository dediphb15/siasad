<?php

class M_siswa extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	function cek($table, $where){
		return $this->db->get_where($table, $where);
	}
	function cek1($nis, $id){
		$data = $this->db->query("SELECT * FROM siswa WHERE nis ='$nis' AND id != '$id' ");
		return $data->result();
	}
	function cek2($telp_ortu, $id){
		$data = $this->db->query("SELECT * FROM siswa WHERE telp_ortu = '$telp_ortu' AND id != '$id' ");
		return $data->result();
	}
	function tampil_data_siswa($angkatan, $tahun_lulus) {
		$this->datatables->select("id, nis, nama, kelas, alamat, angkatan, tahun_lulus ,foto, jns_kelamin");
		$this->datatables->from('siswa');
		if($angkatan){
			$this->datatables->where('angkatan' , $angkatan);
		}
		if($tahun_lulus){
			$this->datatables->where('tahun_lulus', $tahun_lulus);
		}
		
		return $this->datatables->generate();
	}
	function getbyid($id){
		$data = $this->db->query("SELECT * FROM siswa WHERE id = '$id' ");
		return $data->result();
	}
	function simpan($object){
		$this->db->insert('siswa', $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function update($object, $id){
		$this->db->where("id", $id);
		$this->db->update("siswa", $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function hapus($id){
		$this->db->delete('siswa', array('id' => $id));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function getdatalulusan(){
		$data = $this->db->query("SELECT count(tahun_lulus) as jumlah, tahun_lulus FROM siswa GROUP BY tahun_lulus");
		return $data->result();
	}
	function getdatasiswa(){
		$data = $this->db->query("SELECT count(nama) as jumlah FROM siswa");
		return $data->result();
	}
	function getdatasma(){
		$data = $this->db->query("SELECT count(sma) as jumlah_sma FROM siswa WHERE sma != ''");
		return $data->result();
	}
	function getdatakuliah(){
		$data = $this->db->query("SELECT count(nama_kampus) as jumlah_kuliah FROM siswa WHERE nama_kampus != ''");
		return $data->result();
	}
	function getdatabekerja(){
		$data = $this->db->query("SELECT count(nama_perusahaan) as jumlah_bekerja FROM siswa WHERE nama_perusahaan != ''");
		return $data->result();
	}
}