<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model("model_chat");
		$this->load->model("model_user");
		$this->load->model("m_siswa");
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('status') != "login"){
		 redirect(base_url("login-admin"));
		}
	}
	public function index()
	{
		$a['data']= $this->m_siswa->getdatalulusan();
		
		$this->load->view('header2');
		$this->load->view('alumni/dashboard', $a);
		$this->load->view('footer2');
	}
	// function sendMessage(){
	// 	if($this->session->userdata('id') == ""){
	// 		$session = [
	// 			'id' => rand(0000000000,9999999999),
	// 		];

	// 		$this->session->set_userdata($session);
	// 	}

	// 	$id_user	= $this->input->post("id_user2",true); //tujuan/user_2/admin
	// 	$id			= $this->session->userdata('id'); //dari/user_1
	// 	$pesan		= addslashes($this->input->post("pesan",true));
		
	// 	$data	= array(
	// 		'user_1' => $id,
	// 		'user_2' => $id_user,
	// 		'pesan' => $pesan,
	// 	);
		
	// 	$query	=	$this->model_chat->getInsert($data);
	// 	if($query == TRUE){
	// 		require_once(APPPATH.'vendor/autoload.php');
	// 			$options = array(
	// 				'cluster' => 'ap1',
	// 			 	'useTLS' => true
	// 			);
	// 			$pusher = new Pusher\Pusher(
	// 				'd7ba73c0cdae705ec5b7', //ganti dengan App_key pusher Anda
	// 				'0710ea1af63829d54938', //ganti dengan App_secret pusher Anda
	// 				'1412195', //ganti dengan App_key pusher Anda
	// 				$options
	// 			);
	// 			$output['error'] = false;
	// 			$output['massage'] = $pesan;
	// 			$output['id'] = $id;
	// 			$pusher->trigger('my-channel', 'my-event', $output);
	// 	}else{
	// 		$output['error'] = true;
	// 		$output['massage'] = 'Maaf gagal mengirim pesan silakan coba beberapa saat lagi';
	// 	}
	// 	echo json_encode($output);
		
	// }
	// function getChat(){
		
	// 	// $id_user	= $this->input->post("id_user",true); //tujuan
	// 	$id_user = "2";
	// 	$id			= $this->session->userdata('id'); //dari
	// 	$id_max		= $this->input->post('id_max'); //dari

	// 	$where	= "((user_1 = '$id_user' AND user_2 = '$id') OR (user_1 = '$id'))";
	// 	$chat	= $this->model_chat->getAll($where)->result();
	// 	// $data['id_max']		= $id_max;
	// 	// $data['id_user']	= $id_user;
	// 	// $data['chat'] 		= $chat;
	// 	// $this->load->view("vwChatBox",$data);
	// 	echo json_encode($chat);
	// }
	// function getUser(){
	// 	$data = $this->model_user->getUser();
	// 	echo json_encode($data);
	// }
	// function gabung(){
	// 	$id			= $this->session->userdata('id'); //dari
	// 	$id_user	= $this->input->post('id_user'); //dari
	// 	$object = array(
	// 		'user_2' => $id
	// 	);
	// 	$data = $this->model_user->getUpdateuser($id_user, $object);
	// 	echo json_encode($data);
	// }
	// function tampil_chat(){
	// 	$id  = $this->input->post('id');
	// 	$id_admin	=  $this->session->userdata('id');
	// 	$where	= "user_1 = '$id' AND user_2 = '$id_admin' OR user_1 = '$id_admin' AND user_2 = '$id'";

	// 	$chat	= $this->model_chat->getAll($where)->result();
	// 	$object = array(
	// 		'baca' => 1,
	// 	);

	// 	$this->db->where($where);
	// 	$this->db->update('chat', $object);

	// 	echo json_encode($chat);
	// }

	// function baca(){
	// 	$data = $this->model_chat->getBaca();
	// 	$data2 = count($data);
	// 	echo json_encode($data2);
	// }
	// function baca2(){
	// 	$id = $this->input->post('id');
	// 	$data = $this->model_chat->getBaca2($id);
	// 	$data2 = count($data);
	// 	echo json_encode($data2);
	// }
}