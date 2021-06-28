<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Akun_m');
    }

    public function accverif($page = ""){
        $this->Akun_m->accVerif($page);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function rejekverif(){
        $id = $this->input->post('id_user');
        $pesan = $this->input->post('pesan');
        $this->Akun_m->tolakVerif($id,$pesan);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function notifTolak(){
        $email = $this->input->post('email');
        
        $this->db->select('level,id_user')->where('email', $email);
        $data = $this->db->get('user')->row_array();

        if($data['level'] == "2"){
            $form = $this->db->get_where('tb_form_menara', array('status_notif' => 0))->result();
            if($form){
                foreach($form as $f){ ?>
                    <a href="<?= base_url() ?>home/aksiverif/<?= $f->id_form ?>" onclick="clickNotif('<?= $f->id_form ?>')" class="dropdown-item media">
                    	<div class="media-left">
                    		<i class="fas fa-file-upload media-object bg-silver-darker"></i>
                    	</div>
                    	<div class="media-body">
                    		<h6 class="media-heading">Pengajuan Baru <i
                    				class="fa fa-exclamation-circle text-danger"></i></h6>
                    		<p><?= $f->id_form ?></p>
                    	</div>
                    </a>
                <?php }
            }
        }else{
            $this->db->select('pesan')
                ->where('id_user', $data['id_user']);
            $pesan = $this->db->get('tb_pesan')->result();

            if($pesan){
                foreach($pesan as $p){
                    $no =1;
                echo '<a href="pengajuanulang" class="dropdown-item media">
                <div class="media-left">
                    <i class="fa fa-envelope media-object bg-silver-darker"></i>
                    <i class="fab fa-google text-warning media-object-icon f-s-14"></i>
                </div>
                <div class="media-body">
                    <h6 class="media-heading">Pengajuan Akun Ditolak <i class="fa fa-exclamation-circle text-danger"></i></h6>
                    <p>'.$p->pesan.'</p>
                </div>
            </a>';
            $no++;
                }
            }
        }
        // $jumlahnotif = $this->session->set_flashdata('notifjml',$no);
    }

    public function jumlahnotif(){
        $email = $this->input->post('email'); 

        $this->db->select('level,id_user')->where('email', $email);
        $data = $this->db->get('user')->row_array();

        if($data['level'] == "2"){
            $this->db->select('id_form')
            ->where('status_notif', 0);
            $pesan = $this->db->get('tb_form_menara')->num_rows();

        }else{
            $this->db->select('pesan')
            ->where('id_user', $data['id_user'])    
            ->where('status', 0);
            $pesan = $this->db->get('tb_pesan')->num_rows();
        }

        echo $pesan;

    }
    public function kliknotif($page=""){
        $email = $this->input->post('email'); 
        $this->db->select('level,id_user')->where('email', $email);
        $data = $this->db->get('user')->row_array();
        if(strpos($page, 'FR') !== false){
            $this->db->set('status_notif', '1', FALSE);
            $this->db->where('id_form', $page);
            $this->db->update('tb_form_menara');
        }else{
            $this->db->where('id_user', $data['id_user']);
            $this->db->update('tb_pesan',array('status' => '1'));
        }
    }
    public function useronline(){
        $this->db->select('id_user')
        ->where('is_online', '1');
        $data = $this->db->get('user')->num_rows();

        echo $data;
    }
    public function cektolak(){
        // $email = $this->input->post('email'); 
        $email = $this->session->userdata('email');
        $query = $this->db->query('SELECT is_verif FROM user WHERE email ="'.$email.'"')->row_array();

        echo $query['is_verif'];
    }
    public function skulang(){
        if(isset($_FILES['skulang']['name'])){
            $email = $this->input->post('email');

            /* Getting file name */
            $filename = $_FILES['skulang']['name'];
         
            /* Location */
            $location = "upload/pengajuan_ulang/".$filename;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);

            /*Change name into Random */
            $randomname = date('y-m-d').'_'.substr(md5(rand()), 0, 10).'.'.$imageFileType;
            $uploadpath = "upload/pengajuan_ulang/".$randomname;
         
            /* Valid extensions */
            $valid_extensions = array("pdf");
         
            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
               /* Upload file */
               if(move_uploaded_file($_FILES['skulang']['tmp_name'],$uploadpath)){
                  $response = $location;

                  $file = [
                        'dokumen' => $randomname,
                        'is_verif' => 2,
                        ];
                  
                  $this->db->where('email', $email);
                  $this->db->update('user', $data);

                  if($this->db->affected_rows() > 0){
                      $response = "berhasil";
                  }else{
                    $e = $this->db->error(); // Gets the last error that has occured
                    $response = $e['message'];
                  }
               }
            }
         
            echo $response;
            exit;
         }
    }

}