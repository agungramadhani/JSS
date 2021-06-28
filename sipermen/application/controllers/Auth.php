<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kode');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }

    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Harap Masukkan Data Dengan Benar!</div>');
           redirect('home');
        } else {
            $this->_login();
        }
    }

    public function step()
    {
        $this->load->view('step');
    }

    private function _login()
    {
        $this->session->unset_userdata('message');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {

            if ($user['is_active'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        if ($user['level'] == 3 || $user['level'] == 4) {
                            $data = [
                                'email' => $user['email'],
                                'nama_depan' => $user['nama_depan'],
                                'id_user' => $user['id_user'],
                                'nama_belakang' => $user['nama_belakang'],
                                'level' => $user['level'],
                                'is_verif' => $user['is_verif'],
                                'nama_perusahaan' => $user['nama_perusahaan'],
                            ];
                            $this->session->set_userdata($data);
                            $this->db->set('is_online', '1');
                            $this->db->where('email', $user['email']);
                            $this->db->update('user');
                            $this->session->set_userdata('login', 'telah login');
                                redirect('home/dashboard');
                        }else{
                            $data = [
                                'email' => $user['email'],
                                'nama_depan' => $user['nama_depan'],
                                'nama_belakang' => $user['nama_belakang'],
                                'level' => $user['level'],
                                'id_user' => $user['id_user'],
                                'is_verif' => $user['is_verif'],
                            ];
                            $this->session->set_userdata($data);
                            $this->db->set('is_online', '1');
                            $this->db->where('email', $user['email']);
                            $this->db->update('user');
                            $this->session->set_userdata('login', 'telah login');
                                redirect('home/dashboard');
                        }

                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong passsword!</div>');
                        redirect('home');
                    }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('home');
        }
    }


    public function registration($page = "")
    {
        $d = $_POST;
        $f = $_FILES;
        if($page != ""){
            $level = $this->input->post('level');
            $email = $page.'@gmail.com';
            $this->db->where('email', $email);
            $a = $this->db->update('user', array('level' => $level));
            if($a){
                redirect('home/dashboard');
            }else{
                echo 'tolol';
            }

        }else{
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
             $this->load->view('register');
        } else {
            $namap = htmlspecialchars($this->input->post('nama_perusahaan', true));
            $alamatp = htmlspecialchars($this->input->post('alamat_perusahaan', true));
            if($namap == '' && $alamatp == ''){
                $namap = htmlspecialchars($this->input->post('nama_mitra', true));
                $alamatp = htmlspecialchars($this->input->post('alamat_mitra', true));
            }
            $Kode=$this->Kode->buatkode('id_user','user','USR','4');
            $email = $this->input->post('email', true);
            $username = htmlspecialchars($this->input->post('username', true));
            $data = [
                'id_user' => $Kode,
                'email' => htmlspecialchars($email),
                'nama_depan' => htmlspecialchars($this->input->post('nama_depan', true)),
                'nama_belakang' => htmlspecialchars($this->input->post('nama_belakang', true)),
                'username' => $username,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'is_active' => 0,
                'is_verif' => 0,
                'nama_perusahaan' => $namap,
                'alamat_perusahaan' =>$alamatp,
                'level' => htmlspecialchars($this->input->post('level', true)),
                'oauth_provider' => 'common',
            ];
            
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 13; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $user_token = [
                'id_user' => $email,
                'hint' => $randomString,
            ];
            
            $config['upload_path'] = './upload/surat_kuasa/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 8000;
            $config['file_name']		= date('y-m-d').'_'. $username.'_'.substr(md5(rand()), 0, 10);
            $file_ext = pathinfo($_FILES['sk']['name'], PATHINFO_EXTENSION);
            
            $this->load->library('upload', $config);
            $ktp = "";
            if ($this->upload->do_upload('sk')) {
                $ktp = $config['file_name'].'.'.$file_ext;
                $data['dokumen'] = $ktp;
                $q = $this->db->insert("user", $data);
                    if($q){
                        echo "<script>alert('data sudah terkirimkan, data masih di proses dibagian admin');</script>";
                     }
    }else{
        $error = array('error' => $this->upload->display_errors());
        echo $error['error'];
        echo"<script>alert('$error');</script>";
        // echo "<script>alert('gagal');</script>";
    }

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);
            $this->send_mail($randomString, 'verify', $email);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
             redirect('home');
        }
    }
  
    echo $_FILES['sk']['name'] ;
    
    } 

    public function send_mail($token,$type,$email) {
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'info.sipermen@gmail.com';
        $config['smtp_pass'] = 'Zxcasdqwe123';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';

        $this->email->initialize($config); 
        $this->email->set_newline("\r\n"); 
        $this->load->library('email', $config);   

        $from = "Jogja Medianet";
        $subject = "This The Te";
        $data = array();
        $message = $this->load->view('register', $data, true);
        $this->email->from($from. 'Jogja Medianet');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($type == 'verify') {

                        $this->email->subject('Account Verification');
                        $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&hint=' . substr($token,0,12) . '">Activate</a>');
                    } else if ($type == 'forgot') {
                        $this->email->subject('Reset Password');
                        $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&hint=' . substr($token,0,12) . '">Reset Password</a>');
                    }
            
                    if ($this->email->send()) {
                        $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
                        echo "email_sent";
                    } else {
                        echo "email_not_sent";
                        echo $this->email->print_debugger();  // If any error come, its run
                    }
        
        
                }

    public function tambahSoal(){
        $soal = $this->input->post('soal');
        $tipe = $this->input->post('tipe_soal');
        $Kode = $this->Kode->buatkode('id_soal','tb_soal','SOL','4');
            if($soal == null || $tipe == null){
                $this->session->set_flashdata('soal', '<div class="alert alert-danger" role="alert">Harap Lengkapi Form</div>');
            }else{
                $data = [
                    'id_soal' => $Kode,
                    'jenis' => $tipe,
                    'nama_soal' => $soal
                ];
                $count = count($_FILES['contoh']['name']);

                for($i=0;$i<$count;$i++){

                  if(!empty($_FILES['contoh']['name'][$i])){

                    $_FILES['file']['name'] = $_FILES['contoh']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['contoh']['type'][$i];      
                    $_FILES['file']['tmp_name'] = $_FILES['contoh']['tmp_name'][$i];          
                    $_FILES['file']['error'] = $_FILES['contoh']['error'][$i];          
                    $_FILES['file']['size'] = $_FILES['contoh']['size'][$i]; 
                    $kodeplus = $this->Kode->kodeplus('id_file','tb_file','FL','4',$i+1);                    
          
                    $config['upload_path'] = 'upload/contoh_soal';          
                    $config['allowed_types'] = 'pdf|xls|xlsm|xlsx|xltx|xltm';         
                    $config['max_size'] = '10000';        
                    $config['file_name'] = date('y-m-d').'_Contoh'.$i.'_'.substr(md5(rand()), 0, 10);;
                    $file_ext = pathinfo($_FILES['contoh']['name'][$i], PATHINFO_EXTENSION);
                    $nama_file = $config['file_name'];
                 
                    $this->load->library('upload',$config); 
        
                    if($this->upload->do_upload('file')){
          
                    $uploadData = $this->upload->data();         
                    $filename = $uploadData['file_name'];

                    $file[$i] = [
                        'id_file' => $kodeplus,
                        'is_contoh' => 1,
                        'date'  => date('Y-m-d'),
                        'id_soal' => $Kode,
                        'nama_file' => $filename
                    ];
        
                      //$data['totalFiles'][] = $filename;
          
                    }         
                  }        
                }
                $insfile = $this->db->insert_batch('tb_file',$file);
                $masukan = $this->db->insert('tb_soal', $data);
                if(!$masukan && !$insfile){
                    $this->session->set_flashdata('soal', '<div class="alert alert-danger" role="alert">Terjadi Masalah</div>');   
                }else{
                    $this->session->set_flashdata('soal', '<div class="alert alert-success" role="success">Data Berhasil DItambahkan!</div>');
                }
                
       redirect('home/tambahsoal');
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('hint');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['hint' => $token])->row_array();
            $my_date_time = date("Y-m-d H:i:s", strtotime("+2 hours"));

            if ($user_token) {
                if ($my_date_time > $user_token['date_created'] ) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    $this->db->delete('user_token', ['id_user' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please Login</div>');
                    redirect('Auth');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('Auth');
                echo $token;
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('Auth');
        }
        echo $this->session->flashdata('message');
    }

    public function logout(){
        $this->db->set('is_online', '0');
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->update('user');
        $this->_keluar();
    }
    private function _logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged</div>');
        redirect('welcome');
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->send_mail($token, 'forgot', $email);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password! </div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function  resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email</div>');
            redirect('Auth');
        }
    }
    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('Auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[8]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed!Please login</div>');
            redirect('Auth');
        }
    }

    public function cekemail()
    {
        if($this->input->post('email_check') == 1){
            $email = $this->input->post('email');
            $cek = $this->db->get_where('user', array('email' => $email))->num_rows();
            if($cek > 0){
                echo 'taken';
            }else{
                echo 'not_taken';
            }
        }
    }
    private function _keluar(){
        $this->session->unset_userdata('login');
         $this->session->unset_userdata('nama_depan');
         $this->session->unset_userdata('nama_belakang');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('is_verif');
        redirect('home');
    }
    public function inputform(){
        $name_file = $_FILES['upload']['name'];
        $id_soal= $this->input->post('idsoal');
        $id_user= $this->input->post('id_user');
        $no_surat= $this->input->post('no_surat');
        $tgl_surat = $this->input->post('tgl_surat');
        $kodefo = $this->Kode->buatkode('id_form','tb_form_menara','FR','4');
        for($i=0;$i<sizeof($name_file);$i++)
        {
            if(!empty($_FILES['upload']['name'][$i])){

                $_FILES['file']['name'] = $_FILES['upload']['name'][$i];
                $_FILES['file']['type'] = $_FILES['upload']['type'][$i];      
                $_FILES['file']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];          
                $_FILES['file']['error'] = $_FILES['upload']['error'][$i];          
                $_FILES['file']['size'] = $_FILES['upload']['size'][$i];                    
      
                $config['upload_path'] = 'upload/upload_soal';          
                $config['allowed_types'] = 'pdf|xls|xlsx';         
                $config['max_size'] = '10000';  
                $filename = date('y-m-d').'_upload'.$i.'_'.substr(md5(rand()), 0, 10);
                $upload[] = $filename;      
                $config['file_name'] =$filename; 
                $file_ext = pathinfo($_FILES['upload']['name'][$i], PATHINFO_EXTENSION);

                $this->load->library('upload',$config); 
    
                if($this->upload->do_upload('file')){
                    $media = $this->upload->data('');
                    $inputFileName = 'upload/upload_soal/'.$media['file_name'];
                   
                    if(pathinfo($media['file_name'], PATHINFO_EXTENSION) != "pdf"){
                        try {
                            $inputFileType = IOFactory::identify($inputFileName);
                            $objReader = IOFactory::createReader($inputFileType);
                            $objPHPExcel = $objReader->load($inputFileName);
                            
                        } catch(Exception $e) {
                            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
                        }
                        
                        
                        $sheet = $objPHPExcel->getSheet(0);
                        $highestRow = $sheet->getHighestRow();
                        $highestColumn = $sheet->getHighestColumn();
                         
                        for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                            NULL,
                                                            TRUE,
                                                            FALSE);
                                                            
                            $kodetemp = $this->Kode->kodeplus('id_tempat','tb_tempat_menara','TP','4',$row-1);
                                                             
                            //Sesuaikan sama nama kolom tabel di database                                
                             $dataex[$row-1] = array(
                                "id_tempat" => $kodetemp,
                                "id_form" => $kodefo,
                                "status_tempat" => "berkas_diterima", 
                                "nomor"=> $rowData[0][0],
                                "site_id"=> $rowData[0][1],
                                "alamat"=> $rowData[0][2],
                                "kelurahan"=> $rowData[0][3],
                                "kecamatan"=> $rowData[0][4],
                                "lat"=> $rowData[0][5],
                                "lng"=> $rowData[0][6],
                                "tipe_menara"=> $rowData[0][7],
                                "tinggi"=> $rowData[0][8]
                            );
                             
                            //sesuaikan nama dengan nama tabel
                            //  
                            delete_files($media['file_path']);
                            
                            // if ($dexcel){
                            //     echo'berhasil';
                            // }else{
                                
                            // }
                            // echo'aa';
                            
                                 
                        }
                    }else{
                        $uploadData = $this->upload->data();         
                        $filename = $uploadData['file_name'];
                        $kodef = $this->Kode->kodeplus('id_file','tb_file','FL','4',$i+1);
                        $datafile[$i] = array ('id_soal' => $id_soal[$i], 'id_file' => $kodef,'nama_file' => $filename, 'id_form' => $kodefo, 'is_contoh' => 0, );
                        
                    }
                  //$data['totalFiles'][] = $filename;
      
                }else{
                    $error = $this->upload->display_errors();
                    echo $error;
                }        
              }        
        }
       
        if(!empty($datafile)){
            $file = $this->db->insert_batch('tb_file', $datafile);
        }
        if(!empty($dataex)){
            $dexcel = $this->db->insert_batch("tb_tempat_menara",$dataex);
        }
        // echo json_encode($datafile);
        echo $kodefo;
        $datamenara = [
            'id_form' => $kodefo,
            'id_user' => $id_user,
            'tgl_pengajuan' => date('Y-m-d'),
            'status_form' => 'pemeriksaan',
            'no_surat' => $no_surat,
            'tgl_surat' => $tgl_surat
        ];
        $form = $this->db->insert('tb_form_menara', $datamenara);
        if ($form && ($file || $dexcel)){
            $this->session->set_flashdata('form','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
        }else{
            $this->session->set_flashdata('form','<div class="alert alert-danger" role="alert">Telah Terjadi Error, Harap Hubungi ADMIN</div>');
        }
        redirect('home/riwayatmenara');
       
    }

    public function aksiberkas(){
        $ada = $this->input->post('ada');
        $id_soal = $this->input->post('soal');
        $kodef = $this->input->post('kodef');
        for($i=0;$i<sizeof($ada);$i++)
        {
            $datafile[$i] = array (
                'status'   => $ada[$i],
                );
            echo json_encode($datafile[$i]);
            $this->db->where('id_form', $kodef);
            $this->db->where('id_soal', $id_soal[$i]);
            $this->db->update('tb_file', $datafile[$i]);
        }
        $query = $this->db->query('SELECT * FROM tb_file WHERE id_form = "'.$kodef.'" AND status LIKE "%[0]%"')->num_rows();
        if($query > 0){
            $status = 'tidak lengkap';
        }else{
            $status = 'lengkap';
            $this->db->where('id_form', $kodef);
            $this->db->update('tb_tempat_menara', array('status_tempat' => "pengajuan"));
        }
        $this->db->where('id_form', $kodef);
        $this->db->update('tb_form_menara', array('status_form' => $status));
        redirect('home/verifberkas');
        // $this->update_batch('tb_file',$datafile,$id_soal);
        // echo json_encode($datafile);
    }
    public function tolakpengajuan(){
        $id_tempat = $this->input->post('id_tempat');
        $alasan = $this->input->post('alasan');

        $this->db->where('id_tempat', $id_tempat);
        $query =  $this->db->update('tb_tempat_menara', array('status_tempat' => "revisi",'alasan' => $alasan));
        if($query){
            $this->session->set_flashdata('verifm','<div class="alert alert-success" role="alert">Data Berhasil DiUpdate</div>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('verifm','<div class="alert alert-danger" role="alert">Telah Terjadi Error, Harap Hubungi ADMIN</div>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }    
    }
    public function tolaksurvey($page=""){
        // $id_form = $this->input->post('id_form');
        $status = $this->input->get('status');

        $this->db->where('id_tempat', $page);
        $query =  $this->db->update('tb_tempat_menara', array('status_menara' => "revisi"));
        if($query){
            $this->session->set_flashdata('verifm','<div class="alert alert-success" role="alert">Data Berhasil DiUpdate</div>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('verifm','<div class="alert alert-danger" role="alert">Telah Terjadi Error, Harap Hubungi ADMIN</div>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }    
    }
    public function accpengajuan($page=""){
        $id_form = $this->input->post('id_form');
        // $alasan = $this->input->post('alasan');

        $this->db->where('id_tempat', $page);
        $query =  $this->db->update('tb_tempat_menara', array('status_tempat' => "proses_survey"));
        if($query){
            $this->session->set_flashdata('verifm','<div class="alert alert-success" role="alert">Data Berhasil DiUpdate</div>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('verifm','<div class="alert alert-danger" role="alert">Telah Terjadi Error, Harap Hubungi ADMIN</div>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } 
    } 
    public function editpengajuan(){
        $id_tempat = $this->input->post('id_tempat');
        $alamat = $this->input->post('alamat');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        $tipe_menara = $this->input->post('tipe_menara');
        // $alasan = $this->input->post('alasan');

        $this->db->where('id_tempat', $id_tempat);
        $query =  $this->db->update('tb_tempat_menara', array('status_tempat' => "pengajuan", 'alamat' => $alamat, 'lat' => $lat, 'lng' => $lng, 'tipe_menara'=> $tipe_menara));
        if($query){
            $this->session->set_flashdata('verifm','<div class="alert alert-success" role="alert">Data Berhasil DiUpdate</div>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('verifm','<div class="alert alert-danger" role="alert">Telah Terjadi Error, Harap Hubungi ADMIN</div>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } 
    } 
    public function aksisurvey(){
        $id_tempat = $this->input->post('id_tempat');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        $ket = $this->input->post('ket');
        $status = $this->input->post('status');
        $asetmenara = $this->input->post('asetmenara');
        // $alasan = $this->input->post('alasan');

        $this->db->where('id_tempat', $id_tempat);
        $query =  $this->db->update('tb_tempat_menara', array('status_menara' => $status, 'lat_hasil' => $lat ,'lng_hasil' => $lng,'keterangan' => $ket, 'aset_lokasi' => $asetmenara,'status_tempat' => 'proses_rekom'));
        if($query){
            $this->session->set_flashdata('verifm','<div class="alert alert-success" role="alert">Data Berhasil DiUpdate</div>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('verifm','<div class="alert alert-danger" role="alert">Telah Terjadi Error, Harap Hubungi ADMIN</div>');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } 
    }
        public function aksiprint($page=""){
            // $id_tempat = $this->input->post('id_tempat');
            // $lat = $this->input->post('lat');
            // $lng = $this->input->post('lng');
            // $ket = $this->input->post('ket');
            // $status = $this->input->post('status');
            // $asetmenara = $this->input->post('asetmenara');
            // $alasan = $this->input->post('alasan');
    
            $this->db->where('id_form', $page);
            $query =  $this->db->update('tb_tempat_menara', array('status_tempat' => 'cetak_rekom'));
            if($query){
                $this->session->set_flashdata('verifm','<div class="alert alert-success" role="alert">Data Berhasil DiUpdate</div>');
                echo 'berhasil';
                redirect('home/prosessurvey');
            }else{
                $this->session->set_flashdata('verifm','<div class="alert alert-danger" role="alert">Telah Terjadi Error, Harap Hubungi ADMIN</div>');
                echo 'gagal';
                redirect('home/prosessurvey');
            } 
    }


/* End of file Controllername.php */
}