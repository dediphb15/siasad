<?php

class M_karyawan extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	function cek($table, $where){
		return $this->db->get_where($table, $where);
	}
	function get_karyawan(){
		$data = $this->db->query("SELECT * FROM data_user");
		return $data->result();
	}
	function cek1($nip, $id){
		$data = $this->db->query("SELECT * FROM data_user WHERE nip ='$nip' AND id != '$id' ");
		return $data->result();
	}
	function cek2($email, $id){
		$data = $this->db->query("SELECT * FROM data_user WHERE email ='$email' AND id != '$id' ");
		return $data->result();
	}
	function cek3($telp, $id){
		$data = $this->db->query("SELECT * FROM data_user WHERE telp ='$telp' AND id != '$id' ");
		return $data->result();
	}
	function cek4($kelas, $id){
		$data = $this->db->query("SELECT * FROM jabatan WHERE jabatan ='$kelas' AND id != '$id' ");
		return $data->result();
	}
	function tampil_data_karyawan() {
		$this->datatables->select("id, nip, nama, tmp_lahir, tgl_lahir, alamat, telp, email, jabatan, kode_guru, pendidikan, status");
		$this->datatables->from('data_user');
		return $this->datatables->generate();
	}
	function guru(){
		$data = $this->db->query("SELECT * FROM data_user WHERE jabatan = 'guru' ");
		return $data->result();
	}
	function jabatan(){
		$data = $this->db->query("SELECT * FROM jabatan");
		return $data->result();
	}
	
	function simpan($object){
		$this->db->insert('data_user', $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function simpan2($object2){
		$this->db->insert('data_user', $object2);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function hapus($id){
		$this->db->delete('data_user', array('id' => $id));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function getbyid($id){
		$data = $this->db->query("SELECT * FROM data_user WHERE id = '$id' ");
		return $data->result();
	}
	function update($object, $id){
		$this->db->where_in("id", $id);
		$this->db->update("data_user", $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function update2($object2, $nis){
		$this->db->where_in("nip", $nis);
		$this->db->update("data_user", $object2);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}

	function tampil_data_jabatan() {
		$this->datatables->select("id, jabatan");
		$this->datatables->from('jabatan');
		return $this->datatables->generate();
	}
	function simpan_jabatan($object){
		$this->db->insert('jabatan', $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
	function hapus_jabatan($id){
		$this->db->delete('jabatan', array('id' => $id));
		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function getbyid_jabatan($id){
		$data = $this->db->query("SELECT * FROM jabatan WHERE id = '$id' ");
		return $data->result();
	}
	function update_jabatan($object, $id){
		$this->db->where_in("id", $id);
		$this->db->update("jabatan", $object);
		return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
	}
}