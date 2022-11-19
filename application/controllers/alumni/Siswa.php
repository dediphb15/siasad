<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

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
		$this->load->model("m_kelas");
		$this->load->model("m_siswa");
		$this->load->model("m_karyawan");
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login-admin"));
		}
	}
	public function index()
	{
		// $a['kelas'] = $this->m_kelas->data_kelas();
	
        $a['angkatan'] = $this->db->query("SELECT * FROM siswa group by angkatan")->result();
        $a['tahun'] = $this->db->query("SELECT * FROM siswa group by tahun_lulus")->result();
		$this->load->view('header2');
		$this->load->view('alumni/data_siswa', $a);
		$this->load->view('footer2');
	}
	function tampil_siswa() {
		$this->load->model("m_siswa");
		header('Content-Type: application/json');
		echo $this->m_siswa->tampil_data_siswa();
	}
	function get_siswa(){
		$id = $this->session->userdata('id');
		$data = $this->m_siswa->getbyid($id);
		echo json_encode($data);
	}
	function tambah_siswa(){
		$output = array('error' => false);

		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$tmp_lahir = $this->input->post('tempat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$jk = $this->input->post('jk');
		$kelas = $this->input->post('kelas');
		$agama = $this->input->post('agama');
		$asal_sekolah = $this->input->post('asal_sekolah');


		$telp_ortu = $this->input->post('telp_ortu');
		$nama_ortu = $this->input->post('nama_ortu');
		$pekerjaan_ortu = $this->input->post('pekerjaan_ortu');
		$alamat_ortu = $this->input->post('alamat_ortu');

		$telp_wali = $this->input->post('telp_wali');
		$nama_wali = $this->input->post('nama_wali');
		$pekerjaan_wali = $this->input->post('pekerjaan_wali');
		$alamat_wali = $this->input->post('alamat_wali');
		$hubungan_wali = $this->input->post('hub_wali');


		$config['max_size']= 10000;
		$config['allowed_types']="png|jpg|jpeg|gif";
		$config['remove_spaces']=TRUE;
		$config['overwrite']=TRUE;
		$config['upload_path']=FCPATH.'assets/profile/';
		// $config['max_width'] = 1024;
		// $config['max_height'] = 768;

		$this->load->library('upload');
		//ambil data image

		$this->upload->initialize($config);
		if(!$this->upload->do_upload('photo')){
			$photo = "default.jpg";
		} else {
			$photo = $this->upload->data('file_name');
		}

		if(substr($telp_ortu, 0, 1) == "0" && substr($telp_wali, 0, 1) == "0" ){
			$telp1 = "62".substr($telp_ortu,1);
			$telp2 = "62".substr($telp_wali,1);
		}else{
			$telp1 = $telp_ortu;
			$telp2 = $telp_wali;
		}

		$object = array(
			'nis' => $nis,
			'nama_lengkap' => $nama,
			'tempat' => $tmp_lahir,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'jns_kelamin' => $jk,
			'kelas' => $kelas,
			'agama' => $agama,
			'sekolah_asal' => $asal_sekolah,
			'foto' => $photo,

			'telp_ortu' => $telp1,
			'pekerjaan_ortu' => $pekerjaan_ortu,
			'alamat_ortu' => $alamat_ortu,
			'nama_ortu' => $nama_ortu,

			'sma' => $this->input->post('sma'),
			'thn_masuk_sma' => $this->input->post('tahun_masuk1'),
			'thn_lulus_sma' => $this->input->post('tahun_lulus1'),
			'nama_kampus' => $this->input->post('nama_perguruan'),
			'jurusan_kampus' => $this->input->post('program_studi'),

			'jenjang_pendidikan' =>  $this->input->post('jenjang_pendidikan'),
			'thn_masuk_kampus' => $this->input->post('tahun_masuk2'),
			'thn_lulus_kampus' => $this->input->post('tahun_lulus2'),
			'nama_perusahaan' => $this->input->post('pekerjaan'),
			'posisi' => $this->input->post('posisi'),

			'telp_wali' => $telp2,
			'pekerjaan_wali' => $pekerjaan_wali,
			'alamat_wali' => $alamat_wali,
			'nama_wali' => $nama_wali,
			'hubungan_wali' => $hubungan_wali,
			'password' => md5($nis)
		);
		$where = array(
			'nis' => $nis
		);
		$where1 = array(
			'telp_ortu' => $telp1
		);
		$cek = $this->m_siswa->cek("siswa",$where);
		$cek1 = $this->m_siswa->cek("siswa",$where1);
		if($cek->num_rows() == 1){
			$output['error'] = true;
			$output['massage'] = 'Nis sudah digunakan';
		}else if($cek1->num_rows() == 1){
			$output['error'] = true;
			$output['massage'] = 'Telp sudah digunakan';
		}else{
			$data = $this->m_siswa->simpan($object);
			if($data == TRUE){
				$output['error'] = false;
				$output['massage'] = 'Data berhasil di simpan';
			}
			// // else{
			// 	$output['error'] = true;
			// 	$output['massage'] = 'Gagal menyimpan data silakan coba beberapa saat lagi';
			// }
		}
		echo json_encode($output);
	}

	function ubah_siswa(){
		$output = array('error' => false);
		$id = $this->input->post('id');
		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$tmp_lahir = $this->input->post('tempat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$alamat = $this->input->post('alamat');
		$jk = $this->input->post('jk');
		$kelas = $this->input->post('kelas');
		$agama = $this->input->post('agama');
		$asal_sekolah = $this->input->post('asal_sekolah');


		$telp_ortu = $this->input->post('telp_ortu');
		$nama_ortu = $this->input->post('nama_ortu');
		$pekerjaan_ortu = $this->input->post('pekerjaan_ortu');
		$alamat_ortu = $this->input->post('alamat_ortu');

		$telp_wali = $this->input->post('telp_wali');
		$nama_wali = $this->input->post('nama_wali');
		$pekerjaan_wali = $this->input->post('pekerjaan_wali');
		$alamat_wali = $this->input->post('alamat_wali');
		$hubungan_wali = $this->input->post('hub_wali');

		$angkatan = $this->input->post('angkatan');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$email = $this->input->post('email');


		$photo2 = $this->input->post('photo2');

		if(substr($telp_ortu, 0, 1) == "0" && substr($telp_ortu, 0, 1) == "0" ){
			$telp1 = "62".substr($telp_ortu,1);
			$telp2 = "62".substr($telp_wali,1);
		}else{
			$telp1 = $telp_ortu;
			$telp2 = $telp_wali;
		}

		$config['max_size']= 10000;
		$config['allowed_types']="png|jpg|jpeg|gif";
		$config['remove_spaces']=TRUE;
		$config['overwrite']=TRUE;
		$config['upload_path']=FCPATH.'assets/profile/';
		// $config['max_width'] = 1024;
		// $config['max_height'] = 768;

		$this->load->library('upload');
		//ambil data image

		$this->upload->initialize($config);
		if(!$this->upload->do_upload('photo')){
			$photo = $photo2;
		} else {
			$photo = $this->upload->data('file_name');
		}

		$object = array(
			'nis' => $nis,
			'nama' => $nama,
			'tempat' => $tmp_lahir,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'jns_kelamin' => $jk,
			'kelas' => $kelas,
			'agama' => $agama,
			'sekolah_asal' => $asal_sekolah,
			'foto' => $photo,

			'telp_ortu' => $telp1,
			'pekerjaan_ortu' => $pekerjaan_ortu,
			'alamat_ortu' => $alamat_ortu,
			'nama_ortu' => $nama_ortu,

			'telp_wali' => $telp2,
			'pekerjaan_wali' => $pekerjaan_wali,
			'alamat_wali' => $alamat_wali,
			'nama_wali' => $nama_wali,
			'hubungan_wali' => $hubungan_wali,

			'angkatan' => $angkatan,
			'tahun_lulus' => $tahun_lulus,
			'email' => $email,

			'sma' => $this->input->post('sma'),
			'thn_masuk_sma' => $this->input->post('tahun_masuk1'),
			'thn_lulus_sma' => $this->input->post('tahun_lulus1'),
			'nama_kampus' => $this->input->post('nama_perguruan'),
			'jurusan_kampus' => $this->input->post('program_studi'),

			'jenjang_pendidikan' =>  $this->input->post('jenjang_pendidikan'),
			'thn_masuk_kampus' => $this->input->post('tahun_masuk2'),
			'thn_lulus_kampus' => $this->input->post('tahun_lulus2'),
			'nama_perusahaan' => $this->input->post('pekerjaan'),
			'posisi' => $this->input->post('posisi'),

			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
		);
		$object2 = array(
			'nama' => $nama,
			'tmp_lahir' => $tmp_lahir,
			'tgl_lahir' => $tgl_lahir,
			'alamat' => $alamat,
			'jk' => $jk,
			'email' => $email,
		);
		
		$cek = $this->m_siswa->cek1($nis, $id);
		$cek1 = $this->m_siswa->cek2($telp_ortu, $id);
		// if(count($cek) > 0){
		// 	$output['error'] = true;
		// 	$output['massage'] = 'Nis sudah digunakan';
		// }else if(count($cek1) > 0){
		// 	$output['error'] = true;
		// 	$output['massage'] = 'Telp sudah digunakan';
		// }else{
			$data = $this->m_siswa->update($object, $id);

			$data = $this->m_karyawan->update2($object2, $nis);
			if($data == TRUE){
				$output['error'] = false;
				$output['massage'] = 'Data berhasil di simpan';

				$sess_data['nama'] = $nama;
				$sess_data['foto'] = $photo;

				$this->session->set_userdata($sess_data);
			}
			// else{
			// 	$output['error'] = true;
			// 	$output['massage'] = 'Gagal menyimpan data silakan coba beberapa saat lagi';
			// }
		// }
		echo json_encode($output);
	}



	function hapus_siswa(){
		$output = array('error' => false);

		$id = $this->input->post('id');
		$data = $this->m_siswa->hapus($id);
		if($data == TRUE){
			$output['error'] = false;
			$output['massage'] = 'Data berhasil di hapus';
		}else{
			$output['error'] = true;
			$output['massage'] = 'Maaf gagal menghapus data silakan coba beberapa saat lagi';
		}
		echo json_encode($output);
	}
	function data_alumni(){
		// $this->load->model('m_testimoni');
		// $a['data'] = $this->m_testimoni->tampil_data();

        $a['angkatan1'] = $this->db->query("SELECT * FROM siswa group by angkatan")->result();
        $a['tahun'] = $this->db->query("SELECT * FROM siswa group by tahun_lulus")->result();
		$a['tahun_lulus'] = $this->input->get('tahun_lulus_cari') ? $this->input->get('tahun_lulus_cari') : NULL;
        $a['angkatan'] = $this->input->get('angkatan_cari') ? $this->input->get('angkatan_cari') : NULL;
		$this->load->view('header2');
		$this->load->view('alumni/data_alumni', $a);
		$this->load->view('footer2');
	}
	function tampil_alumni() {
		$this->load->model("m_siswa");
		$tahun_lulus = $this->input->get('tahun_lulus') ? $this->input->get('tahun_lulus') : NULL;
        $angkatan = $this->input->get('angkatan') ? $this->input->get('angkatan') : NULL;
		header('Content-Type: application/json');
		echo $this->m_siswa->tampil_data_siswa($angkatan, $tahun_lulus);
	}
}