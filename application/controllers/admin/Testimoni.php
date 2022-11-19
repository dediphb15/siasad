<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

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
		$this->load->model('m_testimoni');
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('status') != "login"){
		 redirect(base_url("login-admin"));
		}
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('admin/testimoni');
		$this->load->view('footer');
	}
	public function tampil_gallery() {
		header('Content-Type: application/json');
		echo $this->m_testimoni->tampil_data_gallery();
	}
	function get_gallery(){
		$id = $this->input->post('id');
		$data = $this->m_testimoni->getbyid($id);
		echo json_encode($data);
	}
	function tambah_testimoni(){
		$output = array('error' => false);

		$judul = trim(strtolower($this->input->post('judul')));
		$out = explode(" ",$judul);
		$slug = implode("-",$out);
		$deskripsi = $this->input->post('deskripsi');
	
	    
		$object = array(
			'deskripsi' => $deskripsi,
			'slug' => $slug,
			'judul' => $judul
		);
		
		$where = array(
			'judul' => $judul
		);
		$cek = $this->m_testimoni->cek("testimoni",$where);
		if($cek->num_rows() == 1){
			$output['error'] = true;
			$output['massage'] = 'judul sudah digunakan';
		}else{
			$data = $this->m_testimoni->simpan($object);
			if($data == TRUE){
				$output['error'] = false;
				$output['massage'] = 'Data berhasil di simpan';
			}else{
				$output['error'] = true;
				$output['massage'] = 'Gagal menyimpan data silakan coba beberapa saat lagi';
			}
		}
		echo json_encode($output);
	}
	function update_testimoni(){
		$output = array('error' => false);

		$judul = trim(strtolower($this->input->post('judul')));
		$out = explode(" ",$judul);
		$slug = implode("-",$out);
		$deskripsi = $this->input->post('deskripsi');
		$id = $this->input->post('id');
	
	    
		$object = array(
			'deskripsi' => $deskripsi,
			'slug' => $slug,
			'judul' => $judul
		);
		
		// $where = array(
		// 	'judul' => $judul
		// );
		// $cek = $this->m_gallery->cek("gallery",$where);
		// if($cek->num_rows() == 1){
		// 	$output['error'] = true;
		// 	$output['massage'] = 'judul sudah digunakan';
		// }else{
			$data = $this->m_testimoni->update($object, $id);
			if($data == TRUE){
				$output['error'] = false;
				$output['massage'] = 'Data berhasil di simpan';
			}else{
				$output['error'] = true;
				$output['massage'] = 'Gagal menyimpan data silakan coba beberapa saat lagi';
			}
		// }
		echo json_encode($output);
	}
	function hapus_testimoni(){
		$output = array('error' => false);

		$id = $this->input->post('id');
		$data = $this->m_testimoni->hapus($id);
		if($data == TRUE){
			$output['error'] = false;
			$output['massage'] = 'Data berhasil di hapus';
		}else{
			$output['error'] = true;
			$output['massage'] = 'Maaf gagal menghapus data silakan coba beberapa saat lagi';
		}
		echo json_encode($output);
	}
	function setuju(){
		$output = array('error' => false);
		$id = $this->input->post('id');
	
	    
		$object = array(
			'setujui' => 1,
		);
		
			$data = $this->m_testimoni->update($object, $id);
			if($data == TRUE){
				$output['error'] = false;
				$output['massage'] = 'Data berhasil di publish';
			}else{
				$output['error'] = true;
				$output['massage'] = 'Gagal menyimpan data silakan coba beberapa saat lagi';
			}
		// }
		echo json_encode($output);
	}
	//Upload image summernote
	function upload_image(){
		if(isset($_FILES["image"]["name"])){
			$config['upload_path'] = './assets/artikel/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('image')){
				$this->upload->display_errors();
				return FALSE;
			}else{
				$data = $this->upload->data();
		        //Compress Image
		        $config['image_library']='gd2';
		        $config['source_image']='./assets/artikel/'.$data['file_name'];
		        $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= TRUE;
	            $config['quality']= '60%';
	            $config['width']= 712;
	            $config['height']= 480;
	            $config['new_image']= './assets/artikel/'.$data['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
				echo base_url().'assets/artikel/'.$data['file_name'];
			}
		}
	}

	//Delete image summernote
	function delete_image(){
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if(unlink($file_name)){
	        echo 'File Delete Successfully';
	    }
	}
}