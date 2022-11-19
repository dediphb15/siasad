<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

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
		$this->load->model("m_jadwal");
		$this->load->helper(array('form', 'url'));
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("login-admin"));
		// }
	}
	public function index()
	{
		
		$this->load->view('header');
		$this->load->view('jadwal/data_jadwal');
		$this->load->view('footer');
	}
	public function tampil_jadwal() {
		header('Content-Type: application/json');
		echo $this->m_jadwal->tampil_data_jadwal();
	}
	public function buat_jadwal()
	{
		$a['guru'] = $this->m_karyawan->guru();
		$a['kelas'] = $this->m_jadwal->kelas();
		// $a['jurusan'] = $this->m_jadwal->jurusan();
		$a['mapel'] = $this->m_jadwal->mapel();
		$this->load->view('header');
		$this->load->view('jadwal/buat_jadwal2', $a);
		$this->load->view('footer');
	}
	
	function tambah_jadwal(){
		$output = array('error' => false);

		$tahun1 = $this->input->post('tahun1');
		$tahun2 = $this->input->post('tahun2');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$guru = $this->input->post('guru');
		$mapel = $this->input->post('mapel');
		$hari = $this->input->post('hari');
		$jam1 = $this->input->post('jam1');
		$jam2 = $this->input->post('jam2');

		$tahun = $tahun1.'/'.$tahun2;

		$where = array(
			'hari' => $hari,
			'kode_guru' => $guru,
			'jam' => $jam1,
			'jam_selesai' => $jam2,
		);

		$cek = $this->m_jadwal->cek('jadwal', $where)->result();

		$object = array(
			'tahun_ajaran' => $tahun,
			'kelas' => $kelas,
			'hari' => $hari,
			'kode_mapel' => $mapel,
			'kode_guru' => $guru,
			'jam' => $jam1,
			'jam_selesai' => $jam2,
		);
		if(count($cek) > 0){
			$output['error'] = true;
			$output['massage'] = 'Maaf sudah ada';
		}else{
			$data = $this->m_jadwal->simpan_jadwal($object);
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
	function ubah_jadwal(){
		$output = array('error' => false);

		$tahun1 = $this->input->post('tahun1');
		$tahun2 = $this->input->post('tahun2');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$guru = $this->input->post('guru');
		$mapel = $this->input->post('mapel');
		$hari = $this->input->post('hari');
		$jam1 = $this->input->post('jam1');
		$jam2 = $this->input->post('jam2');
		$id = $this->input->post('id');

		$tahun = $tahun1.'/'.$tahun2;

		$object = array(
			'tahun_ajaran' => $tahun,
			'kelas' => $kelas,
			'hari' => $hari,
			'kode_mapel' => $mapel,
			'kode_guru' => $guru,
			'jam' => $jam1,
			'jam_selesai' => $jam2,
		);
		$data = $this->m_jadwal->update_jadwal($object, $id);
		if($data == TRUE){
			$output['error'] = false;
			$output['massage'] = 'Data berhasil di simpan';
		}else{
			$output['error'] = true;
			$output['massage'] = 'Maaf gagal menyimpan data silakan coba beberapa saat lagi';
		}
		echo json_encode($output);
	}
	function get_jadwal(){
		$tahun1 = $this->input->post('tahun1');
		$tahun2 = $this->input->post('tahun2');
		$kelas = $this->input->post('kelas');
		$tahun = $tahun1.'/'.$tahun2;

		$data = $this->m_jadwal->get_jadwal($tahun, $kelas);
		echo json_encode($data);
	}

	function edit_jadwal($tahun1, $tahun2, $kelas){
		$a['guru'] = $this->m_karyawan->guru();
		$a['kelas'] = $this->m_jadwal->kelas();
		// $a['jurusan'] = $this->m_jadwal->jurusan();
		$a['mapel'] = $this->m_jadwal->mapel();
		$a['tahun1'] = $tahun1;
		$a['tahun2'] = $tahun2;
		$a['kelas1'] = urldecode($kelas);
		// $a['jurusan1'] = $jurusan;
		$this->load->view('header');
		$this->load->view('jadwal/edit_jadwal', $a);
		$this->load->view('footer');
	}
	function hapus(){
		$output = array('error' => false);

		$id = $this->input->post('id');
		$data = $this->m_jadwal->hapus_jadwal($id);
		if($data == TRUE){
			$output['error'] = false;
			$output['massage'] = 'Data berhasil di hapus';
		}else{
			$output['error'] = true;
			$output['massage'] = 'Maaf gagal menghapus data silakan coba beberapa saat lagi';
		}
		echo json_encode($output);
	}
	function hapus_data_jadwal(){
		$output = array('error' => false);

		$tahun_ajaran = $this->input->post('tahun_ajaran');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');
		$data = $this->m_jadwal->hapus_data_jadwal($tahun_ajaran, $kelas, $jurusan);
		if($data == TRUE){
			$output['error'] = false;
			$output['massage'] = 'Data berhasil di hapus';
		}else{
			$output['error'] = true;
			$output['massage'] = 'Maaf gagal menghapus data silakan coba beberapa saat lagi';
		}
		echo json_encode($output);
	}
}