<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kode');
	}

	public function index()
	{
		
		if($this->session->userdata('login') == true){
			redirect('welcome/profile');
		}
		
		
			
		$contents['login_url'] = $this->googleplus->loginURL();
		$this->load->view('welcome_message',$contents);
		
	}
	public function callback(){
		if (isset($_GET['code'])) {
			
			$this->googleplus->getAuthenticate($_GET['code']);
			$_SESSION['token'] = $this->googleplus->getAccessToken(); 
			//header('Location: ' . filter_var('http://localhost/google-login-ci3-master/', FILTER_SANITIZE_URL)); 
		}
			
		
		if(isset($_SESSION['token'])){ 
			$this->googleplus->setAccessToken($_SESSION['token']); 
		} 
		if($this->googleplus->getAccessToken()){ 
			$_SESSION['login'] = 'true';
			$_SESSION['user_data'] = $this->googleplus->getUserInfo();
			
			//redirect('welcome/profile');
			// $aa = $_GET['code'];

			$gp = $_SESSION['user_data'];
			$email = $gp['email'];
			$cek = $this->db->get_where('user', ['email' => $email])->num_rows();
			if($cek > 0){
				$this->profile($_SESSION['login'], $gp);
			}else{
				$kode = $this->Kode->buatkode('id_user','user', 'USR', '4');
				$this->db->insert('user',array(
				'id_user' => $kode,
				'email' => $gp['email'],
				'nama_depan' => $gp['given_name'],
				'nama_belakang' => $gp['family_name'],
				'is_active' => '1',
				'level' => '0',
				'oauth_provider' => 'google',
				'oauth_uid' => $gp['id']
			));
			$this->profile($_SESSION['login'], $gp);
			}
		}
	}
	public function profile($login,$data=array()){
		
		if($login != "true"){
			redirect('');
		}
		
		$user = $this->db->get_where('user', ['email' => $data['email']])->row_array();
		if($user){
			if($user['level'] == '0'){
				$this->session->set_userdata('message','<div class="alert alert-success" role="alert">Harap Isi Field Dibawah Sebelum Login!</div>');
				redirect('home/register/?email='.$user['email'].''); 
			}else{
				$data = [
					'email' => $user['email'],
					'nama_depan' => $user['nama_depan'],
					'nama_belakang' => $user['nama_belakang'],
					'level' => $user['level'],
					'is_verif' => $user['is_verif'],
				];
				$this->session->set_userdata($data);
				redirect('home/dashboard');
			}
		}
		$contents['user_profile'] = $data;
		$this->load->view('profile',$contents);
		
	}
	
	public function logout(){
		
		$this->session->sess_destroy();
		$this->googleplus->revokeToken();
		redirect('');
		
	}
	
}
