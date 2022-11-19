<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model("m_karyawan");
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login-admin"));
		}
	}
	public function index()
	{
		$a['jabatan'] = $this->m_karyawan->jabatan();
		$this->load->view('header');
		$this->load->view('admin/data_karyawan', $a);
		$this->load->view('footer');
	}
	public function tampil_karyawan() {
		header('Content-Type: application/json');
		echo $this->m_karyawan->tampil_data_karyawan();
	}
	public function tambah_karyawan(){
		$output = array('error' => false);

		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$tmp_lahir = $this->input->post('tmp_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$jk = $this->input->post('jk');
		$no_hp = $this->input->post('telp');
		$email = $this->input->post('email');
		$pendidikan = $this->input->post('pendidikan');
		$status = $this->input->post('status');
		$jabatan = $this->input->post('jabatan');
		$password = $this->input->post('password');

		if(substr($no_hp, 0, 1) == "0"){
			$telp = "62".substr($no_hp,1);
		}else{
			$telp = $no_hp;
		}

		if($jabatan == 'guru'){
			$kode_guru = substr($nama, 0, 2);
		}else{
			$kode_guru = "";
		}

		$object = array(
			'nip' => $nip,
			'nama' => $nama,
			'tmp_lahir' => $tmp_lahir,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'jk' => $jk,
			'telp' => $telp,
			'email' => $email,
			'jabatan' => $jabatan,
			'status' => $status,
			'pendidikan' => $pendidikan,
			'kode_guru' => $kode_guru,
			'password' => md5($password)
		);
		$where = array(
			'telp' => $telp
		);
		$where1 = array(
			'email' => $email
		);
		$where2 = array(
			'nip' => $nip
		);
		$cek = $this->m_karyawan->cek("data_user",$where);
		$cek1 = $this->m_karyawan->cek("data_user",$where1);
		$cek2 = $this->m_karyawan->cek("data_user",$where2);
		if($cek->num_rows() == 1){
			$output['error'] = true;
			$output['massage'] = 'Maaf telpon sudah digunakan';
		}else if($cek1->num_rows() == 1){
			$output['error'] = true;
			$output['massage'] = 'Maaf email sudah digunakan';
		}else if($cek2->num_rows() == 1){
			$output['error'] = true;
			$output['massage'] = 'Maaf nip sudah digunakan';
		}else{
			$data = $this->m_karyawan->simpan($object);
			if($data == TRUE){
				$output['error'] = false;
				$output['massage'] = 'Data berhasil di simpan';
			}else{
				$output['error'] = true;
				$output['massage'] = 'Maaf gagal menyimpan data silakan coba beberapa saat lagi';
			}
		}
		
		
		echo json_encode($output);
	}
	function hapus_karyawan(){
		$output = array('error' => false);

		$id = $this->input->post('id');
		$data = $this->m_karyawan->hapus($id);
		if($data == TRUE){
			$output['error'] = false;
			$output['massage'] = 'Data berhasil di hapus';
		}else{
			$output['error'] = true;
			$output['massage'] = 'Maaf gagal menghapus data silakan coba beberapa saat lagi';
		}
		echo json_encode($output);
	}
	function get_karyawan(){
		$id = $this->input->post('id');
		$data = $this->m_karyawan->getbyid($id);
		echo json_encode($data);
	}
	function ubah_karyawan(){
		$output = array('error' => false);
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$tmp_lahir = $this->input->post('tmp_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$jk = $this->input->post('jk');
		$no_hp = $this->input->post('telp');
		$email = $this->input->post('email');
		$pendidikan = $this->input->post('pendidikan');
		$status = $this->input->post('status');
		$jabatan = $this->input->post('jabatan');

		if(substr($no_hp, 0, 1) == "0"){
			$telp = "62".substr($no_hp,1);
		}else{
			$telp = $no_hp;
		}

		if($jabatan == 'guru'){
			$kode_guru = substr($nama, 0, 2);
		}else{
			$kode_guru = "";
		}

		$object = array(
			'nip' => $nip,
			'nama' => $nama,
			'tmp_lahir' => $tmp_lahir,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'jk' => $jk,
			'telp' => $telp,
			'email' => $email,
			'jabatan' => $jabatan,
			'status' => $status,
			'pendidikan' => $pendidikan,
		);
		
		$cek = $this->m_karyawan->cek1($nip, $id);
		$cek1 = $this->m_karyawan->cek2($email, $id);
		$cek2 = $this->m_karyawan->cek3($telp, $id);
		if(count($cek) > 0){
			$output['error'] = true;
			$output['massage'] = 'Maaf nip sudah digunakan';
		}else if(count($cek1) > 0){
			$output['error'] = true;
			$output['massage'] = 'Maaf email sudah digunakan';
		}else if(count($cek2) > 0){
			$output['error'] = true;
			$output['massage'] = 'Maaf telpon sudah digunakan';
		}else{
			$data = $this->m_karyawan->update($object, $id);
			if($data == TRUE){
				$output['error'] = false;
				$output['massage'] = 'Data berhasil di simpan';
			}else{
				$output['error'] = true;
				$output['massage'] = 'Maaf gagal menyimpan data silakan coba beberapa saat lagi';
			}
		}
		
		echo json_encode($output);
	}

	public function index_jabatan()
	{
		$this->load->view('header');
		$this->load->view('admin/jabatan');
		$this->load->view('footer');
	}
	public function tampil_jabatan() {
		header('Content-Type: application/json');
		echo $this->m_karyawan->tampil_data_jabatan();
	}
	public function tambah_jabatan(){
		$output = array('error' => false);

		$kelas = $this->input->post('kelas');

		$object = array(
			'jabatan' => $kelas,
		);
		$where = array(
			'jabatan' => $kelas
		);
		$cek = $this->m_karyawan->cek("jabatan",$where);
		if($cek->num_rows() == 1){
			$output['error'] = true;
			$output['massage'] = 'Maaf kelas sudah ada';
		}else{
			$data = $this->m_karyawan->simpan_jabatan($object);
			if($data == TRUE){
				$output['error'] = false;
				$output['massage'] = 'Data berhasil di simpan';
			}else{
				$output['error'] = true;
				$output['massage'] = 'Maaf gagal menyimpan data silakan coba beberapa saat lagi';
			}
		}
		
		
		echo json_encode($output);
	}
	function hapus_jabatan(){
		$output = array('error' => false);

		$id = $this->input->post('id');
		$data = $this->m_karyawan->hapus_jabatan($id);
		if($data == TRUE){
			$output['error'] = false;
			$output['massage'] = 'Data berhasil di hapus';
		}else{
			$output['error'] = true;
			$output['massage'] = 'Maaf gagal menghapus data silakan coba beberapa saat lagi';
		}
		echo json_encode($output);
	}
	function get_jabatan(){
		$id = $this->input->post('id');
		$data = $this->m_karyawan->getbyid_jabatan($id);
		echo json_encode($data);
	}
	function ubah_jabatan(){
		$output = array('error' => false);
		$id = $this->input->post('id');
		$kelas = $this->input->post('kelas');

		$object = array(
			'jabatan' => $kelas,
		);
		
		$cek = $this->m_karyawan->cek4($kelas, $id);
		if(count($cek) > 0){
			$output['error'] = true;
			$output['massage'] = 'Maaf jabatan sudah ada';
		}else{
			$data = $this->m_karyawan->update_jabatan($object, $id);
			if($data == TRUE){
				$output['error'] = false;
				$output['massage'] = 'Data berhasil di simpan';
			}else{
				$output['error'] = true;
				$output['massage'] = 'Maaf gagal menyimpan data silakan coba beberapa saat lagi';
			}
		}
		
		echo json_encode($output);
	}
}