<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Login extends CI_Controller {

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
		 require APPPATH.'vendor/PHPMailer/src/Exception.php';
	    require APPPATH.'vendor/PHPMailer/src/PHPMailer.php';
	    require APPPATH.'vendor/PHPMailer/src/SMTP.php';
	    require APPPATH.'vendor/autoload.php';
		$this->load->library('datatables');
		$this->load->model('m_login');
		$this->load->helper(array('form', 'url'));
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url("login-admin"));
		// }
	}
	public function index()
	{
		if($this->session->userdata('status') != "login"){
			$this->load->view('admin/login');
		}else{
			redirect(base_url("dashboard"));
		}
	}
	function aksi_login(){
		$email = $this->input->post('email');
		// $username = $this->input->post('username');
		$pass = $this->input->post('password');
		$where = array(
			'email' => $email,
			// 'username' => $username,
			'password' => md5($pass)
		);
		$cek = $this->m_login->cek_login("data_user", $where);
		  
		if($cek->num_rows() == 1){
			foreach ($cek->result() as $login) {
			    $sess_data['id'] = $login->id;
			    $sess_data['status'] = "login";
			    $sess_data['nama'] = $login->nama;
			    $sess_data['nip'] = $login->nip;
			    $sess_data['email'] = $login->email;
			    $sess_data['jabatan'] = $login->jabatan;
			$this->session->set_userdata($sess_data);
			}
			redirect(base_url("dashboard"));
 
		} else {
			$this->session->set_flashdata('pesan', 'Username dan Password salah');    
       		redirect(base_url("login-admin"));
		}
	}
	function logout(){
		$this->session->sess_destroy();
		$this->load->model("model_user");
		
		$id		= $this->session->userdata('id');
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
		redirect('login-admin');
	}
	public function lupa_password(){
     $this->load->view('admin/lupa_password');
   }

   public function reset_password(){
    // $this->load->library('encryption');
    $email = $this->input->get('b');
    $a["b"] = $email;
    $a["email"] = $email;
    $this->load->view('admin/reset_password', $a);
  }
  function cek_email(){

      $output =  array('error' => false);
      $email = $this->input->post('email');
    // $email = "purwajibagas@gmail.com";
      $rand = mt_rand(100000, 999999);
      // $a =  $this->encryption->encrypt($email);
    $link = "http://192.168.1.5/sekolah3/admin/login/reset_password?b=".$email; //ip laptop
    $where = array('email' => $email );
    $cek = $this->db->get_where('data_user', $where);
    if ($cek->num_rows() == 1) {
      $mail = new PHPMailer(true);
      $isiEmail = "<html><head><style>.uk-button-primary {background-color: #1e87f0;color: #fff;border: 1px solid transparent;}.uk-button {margin: 0;
        border: none;
        overflow: visible;
        font: inherit;
        color: inherit;
        text-transform: none;
        display: inline-block;
        box-sizing: border-box;
        padding: 0 30px;
        vertical-align: middle;
        font-size: .875rem;
        line-height: 38px;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        transition: .1s ease-in-out;
        transition-property: color,background-color,border-color;
        }</style></head><body> Silakan kunjungi link berikut untuk melakukan reset password <br/><br/>
        ".$link."
        </body></html> ";

        try {
        // $mail->SMTPDebug =2 ;
          $mail->isSMTP();
          $mail->Host       = ' rodra.iixcp.rumahweb.com';//'smtp.googlemail.com';
          $mail->SMTPAuth   = true;
              $mail->Username   = 'admin@tapoltek2022.my.id'; // ubah dengan alamat email Anda
              $mail->Password   = 'admin@!123'; // ubah dengan password email Anda
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
              // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
              $mail->Port       = 587;
              // $mail->Port       = 465;

              $mail->setFrom('admin@tapoltek2022.my.id', 'Reset Password'); // ubah dengan alamat email Anda
              $mail->addAddress($email);
              $mail->addReplyTo('admin@tapoltek2022.my.id', 'Reset Password'); // ubah dengan alamat email Anda

          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'Reset Password';
          $mail->Body    = $isiEmail;
          // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          // $object = array('otp' => $rand);
          // $this->m_android->ganti_password($object, $email);
          // $output['error'] = false;
          // $output['pesan'] ='Message has been sent';
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Silakan cek email anda!</div>');
          redirect('admin/login/lupa_password');
        } catch (Exception $e) {
        // $output['error']= true;
        // $output['pesan']=  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Message could not be sent. Mailer Error: {$mail->ErrorInfo}!</div>');
          redirect('admin/login/lupa_password');
        }


      }else{
      // $output['error'] = true;
      // $output['pesan'] = "Email tidak terdaftar";
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar!</div>');
        redirect('admin/login/lupa_password');
      }
    }
     public function reset(){

		$this->load->model("model_user");
	    $email = $this->input->post('email');
	    $password = $this->input->post('password');
	    $b = $this->input->get('b');

	    $data = $this->model_user->reset2($email, $password);
	    if($data == TRUE){
	      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password berhasil di reset!</div>');
	      redirect('admin/login');
	    }else{
	      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password tidak boleh sama dengan password sebelumnya!</div>');
	      
	      redirect('admin/login/reset_password?b='.$b);
	    }
	  }
}