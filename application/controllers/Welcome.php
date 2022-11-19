<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$this->load->view('user/header');
		$this->load->view('user/home');
		$this->load->view('user/footer');
	}
	function sendMessage(){
		$this->load->model("model_chat");
		if($this->session->userdata('id') == ""){
			$session = [
				'id' => rand(0000000000,9999999999),
			];

			$this->session->set_userdata($session);
		}

		// $id_user	= $this->input->post("id_user",true); //tujuan/user_2/admin
		$id			= $this->session->userdata('id'); //dari/user_1
		$pesan		= addslashes($this->input->post("pesan",true));
		
		$get = $this->model_chat->getChat2($id);
		if($get['user_2'] == NULL){
			$id_user = "";
		}else{
			$id_user = $get['user_2'];
		}
		$data	= array(
			'user_1' => $id,
			'user_2' => $id_user,
			'pesan' => $pesan,
		);
		
		$query	=	$this->model_chat->getInsert($data);
		if($query == TRUE){
			require_once(APPPATH.'vendor2/autoload.php');
				$options = array(
					'cluster' => 'ap1',
				 	'useTLS' => true
				);
				$pusher = new Pusher\Pusher(
					'd7ba73c0cdae705ec5b7', //ganti dengan App_key pusher Anda
					'0710ea1af63829d54938', //ganti dengan App_secret pusher Anda
					'1412195', //ganti dengan App_key pusher Anda
					$options
				);
				$output['error'] = false;
				$output['massage'] = $pesan;
				$output['id'] = $id;
				$pusher->trigger('my-channel', 'my-event', $output);
		}else{
			$output['error'] = true;
			$output['massage'] = 'Maaf gagal mengirim pesan silakan coba beberapa saat lagi';
		}
		echo json_encode($output);
		
	}
	function getUser(){
		$data = $this->model_user->getUser();
		echo json_encode($data);
	}
	function getChat(){
		$this->load->model("model_user");
		$this->load->model("model_chat");
		
		// $id_user	= $this->input->post("id_user",true); //tujuan
		// $id_user = "2";
		$id			= $this->session->userdata('id'); //dari
		$id_max		= $this->input->post('id_max'); //dari

		$get = $this->model_chat->getChat2($id);
		$id2 = $get['user_2'];
		$where	= "user_1 = '$id' AND user_2 = '$id2' OR user_1 = '$id2' AND user_2 = '$id'";
		$chat	= $this->model_chat->getAll($where)->result();
		// $data['id_max']		= $id_max;
		// $data['id_user']	= $id_user;
		// $data['chat'] 		= $chat;
		// $this->load->view("vwChatBox",$data);
		echo json_encode($chat);
	}
	function masuk(){
		$this->load->model("model_user");
		$id		= $this->session->userdata('id');
		$nama		= $this->session->userdata('nama');
		$status = 1;
		$data = array("session_id" => $id, 'status' => $status, 'nama' => $nama);
		$cek = $this->db->get_where('user', array('session_id' => $id))->num_rows();
		if($cek > 0){
			
		}else{
			$this->model_user->getInsert($data);
			$session = array("status_online" => 'online');
			$this->session->set_userdata($session);

			require_once(APPPATH.'vendor2/autoload.php');
				$options = array(
					'cluster' => 'ap1',
				 	'useTLS' => true
				);
				$pusher = new Pusher\Pusher(
					'd7ba73c0cdae705ec5b7', //ganti dengan App_key pusher Anda
					'0710ea1af63829d54938', //ganti dengan App_secret pusher Anda
					'1412195', //ganti dengan App_key pusher Anda
					$options
				);
				$output['error'] = false;
				$pusher->trigger('my-channel', 'my-event', $output);
		}
	}
	function offline(){
		$this->load->model("model_user");
		
		$id		= $this->input->post("id",true);
		$status = 0;
		$data = array('status' => $status);
		$this->model_user->getRemove($id, $data);
		$this->session->sess_destroy();
		require_once(APPPATH.'vendor2/autoload.php');
		$options = array(
			'cluster' => 'ap1',
			'useTLS' => true
		);
		$pusher = new Pusher\Pusher(
					'd7ba73c0cdae705ec5b7', //ganti dengan App_key pusher Anda
					'0710ea1af63829d54938', //ganti dengan App_secret pusher Anda
					'1412195', //ganti dengan App_key pusher Anda
					$options
				);
		$output['error'] = false;
		$pusher->trigger('my-channel', 'my-event', $output);
	}
	function informasi(){
		$this->load->model('m_berita');
		$a['data'] = $this->m_berita->tampil_data_berita2();
		$this->load->view('user/header');
		$this->load->view('user/informasi', $a);
		$this->load->view('user/footer');
	}
	function testimoni(){
		$this->load->model('m_testimoni');
		$a['data'] = $this->m_testimoni->tampil_data();
		$this->load->view('user/header');
		$this->load->view('user/testimoni', $a);
		$this->load->view('user/footer');
	}
	function kontak(){
		// $this->load->model('m_testimoni');
		// $a['data'] = $this->m_testimoni->tampil_data();
		$this->load->view('user/header');
		$this->load->view('user/kontak');
		$this->load->view('user/footer');
	}
	function data_alumni(){
		// $this->load->model('m_testimoni');
		// $a['data'] = $this->m_testimoni->tampil_data();
		$this->load->view('user/header2');
		$this->load->view('user/alumni');
		$this->load->view('user/footer2');
	}
	function single_berita($slug){
		$this->load->model('m_berita');
		// $this->load->model('m_testimoni');
		$a['data'] = $this->m_berita->tampil_berita($slug);
		$this->load->view('user/header');
		$this->load->view('user/single_blog', $a);
		$this->load->view('user/footer');
	}
	function tampil_alumni() {
		$this->load->model("m_siswa");
		header('Content-Type: application/json');
		echo $this->m_siswa->tampil_data_siswa();
	}
}
