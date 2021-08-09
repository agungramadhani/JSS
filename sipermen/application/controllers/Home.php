<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kode');
        $this->load->library('googleplus');
        $this->load->model('Akun_m');
        $this->load->model('soal_m');
	}

    public function index()
    {
        $contents['login_url'] = $this->googleplus->loginURL();
		$this->load->view('login',$contents);
    }

    public function register()
    {
        $this->load->view('register');
    }
    public function printba($page="")
    {
        $sql = $this->db->query('SELECT menara.id_form, menara.site_id, menara.alamat, menara.kelurahan, menara.kecamatan ,menara.aset_lokasi,  menara.lat, menara.lng, menara.lat_hasil, menara.lng_hasil, form.tgl_pengajuan, form.no_surat, form.tgl_surat, form.id_user,
        user.nama_perusahaan
        FROM `tb_tempat_menara` as menara
        JOIN tb_form_menara as form ON menara.id_form = form.id_form
        JOIN user ON form.id_user = user.id_user
        WHERE form.id_form = "'.$page.'"');
        $sql2 = $this->db->query('SELECT site_id, alamat, kecamatan, kelurahan, lat, lng, lat_hasil, lng_hasil, keterangan FROM tb_tempat_menara Where id_form ="'.$page.'" and aset_lokasi="persil warga" and status_menara = "tidakbersinggungan"');
        $sql3 = $this->db->query('SELECT site_id, alamat, kecamatan, kelurahan, lat, lng, lat_hasil, lng_hasil, keterangan FROM tb_tempat_menara Where id_form ="'.$page.'" and aset_lokasi="Aset Pemkot Yogyakarta" and status_menara = "tidakbersinggungan"');

        $data['asetolak'] = $this->db->query('SELECT site_id, alamat, kecamatan, kelurahan, lat, lng, lat_hasil, lng_hasil, keterangan FROM tb_tempat_menara Where id_form ="'.$page.'" and aset_lokasi="persil warga" and status_menara != "tidakbersinggungan"');
        $data['persiltolak'] = $this->db->query('SELECT site_id, alamat, kecamatan, kelurahan, lat, lng, lat_hasil, lng_hasil, keterangan FROM tb_tempat_menara Where id_form ="'.$page.'" and aset_lokasi="Aset Pemkot Yogyakarta" and status_menara != "tidakbersinggungan"');
        $data['query'] =$sql->row_array();
        $data['jumlah'] =$sql->num_rows();
        $data['persil'] =$sql2;
        $data['aset'] =$sql3;
        $data['page'] = $page;
        $this->load->view('admin/menara/print',$data);
    }
    public function dashboard()
    {  
        if($this->session->userdata('login') == null){
            redirect('home');
        }
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('admin/index');
        $this->load->view('admin/addons/sidebar');
        $this->load->view('admin/addons/footer');
    }
    public function cetak($page ="")
    {  
        $sql = $this->db->query('SELECT menara.id_form, menara.site_id, menara.alamat, menara.kelurahan, menara.kecamatan ,menara.aset_lokasi,  menara.lat, menara.lng, menara.lat_hasil, menara.lng_hasil, form.tgl_pengajuan, form.no_surat, form.tgl_surat, form.id_user,
        user.nama_perusahaan
        FROM `tb_tempat_menara` as menara
        JOIN tb_form_menara as form ON menara.id_form = form.id_form
        JOIN user ON form.id_user = user.id_user
        WHERE form.id_form = "'.$page.'"');
        $sql2 = $this->db->query('SELECT site_id, alamat, kecamatan, kelurahan, lat, lng, lat_hasil, lng_hasil, keterangan FROM tb_tempat_menara Where id_form ="'.$page.'" and aset_lokasi="persil warga" and status_menara = "tidakbersinggungan"');
        $sql3 = $this->db->query('SELECT site_id, alamat, kecamatan, kelurahan, lat, lng, lat_hasil, lng_hasil, keterangan FROM tb_tempat_menara Where id_form ="'.$page.'" and aset_lokasi="Aset Pemkot Yogyakarta" and status_menara = "tidakbersinggungan"');

        $data['asetolak'] = $this->db->query('SELECT site_id, alamat, kecamatan, kelurahan, lat, lng, lat_hasil, lng_hasil, keterangan FROM tb_tempat_menara Where id_form ="'.$page.'" and aset_lokasi="persil warga" and status_menara != "tidakbersinggungan"');
        $data['persiltolak'] = $this->db->query('SELECT site_id, alamat, kecamatan, kelurahan, lat, lng, lat_hasil, lng_hasil, keterangan FROM tb_tempat_menara Where id_form ="'.$page.'" and aset_lokasi="Aset Pemkot Yogyakarta" and status_menara != "tidakbersinggungan"');
        $data['query'] =$sql->row_array();
        $data['persil'] =$sql2;
        $data['aset'] =$sql3;
        $data['page'] = $page;
        $this->load->view('admin/menara/aksiprint',$data);
    }
    public function riwayatmenara()
    {  
        if($this->session->userdata('login') == null){
            redirect('home');
        }
        $datamenara = $this->db->query('SELECT tgl_pengajuan, status_form, tgl_surat, id_user,id_form,no_surat FROM tb_form_menara Where id_user="'.$this->session->userdata("id_user").'" AND status_form !="lengkap"');
        $query['pengajuan'] = $this->db->query('SELECT tb_tempat_menara.id_tempat,tb_tempat_menara.alasan, tb_tempat_menara.site_id, tb_tempat_menara.alamat, tb_tempat_menara.kelurahan, 
        tb_tempat_menara.kecamatan, tb_tempat_menara.nomor, tb_tempat_menara.lat, tb_tempat_menara.lng, tb_tempat_menara.tipe_menara, tb_tempat_menara.id_form,tb_tempat_menara.status_tempat 
        FROM tb_tempat_menara 
        JOIN tb_form_menara ON tb_tempat_menara.id_form = tb_form_menara.id_form
        where tb_tempat_menara.status_tempat ="pengajuan" OR tb_tempat_menara.status_tempat ="revisi" OR tb_tempat_menara.status_tempat ="proses_survey" and tb_form_menara.id_user="'.$this->session->userdata('id_user').'"')->result();
        $query['survey'] = $this->db->query('SELECT tb_tempat_menara.id_tempat, tb_tempat_menara.status_menara, tb_tempat_menara.lat_hasil,tb_tempat_menara.lng_hasil,tb_tempat_menara.keterangan, tb_tempat_menara.site_id, tb_tempat_menara.alamat, tb_tempat_menara.kelurahan, 
        tb_tempat_menara.kecamatan, tb_tempat_menara.nomor, tb_tempat_menara.lat, tb_tempat_menara.lng, tb_tempat_menara.tipe_menara, tb_tempat_menara.id_form,tb_tempat_menara.status_tempat 
        FROM tb_tempat_menara 
        JOIN tb_form_menara ON tb_tempat_menara.id_form = tb_form_menara.id_form
        where tb_tempat_menara.keterangan <> "" and tb_form_menara.id_user="'.$this->session->userdata('id_user').'"')->result();
        $query['menara'] = $datamenara->result();
        $query['jmlmenara']=  $datamenara = $this->db->query('SELECT tgl_pengajuan, status_form, tgl_surat, id_user,id_form,no_surat FROM tb_form_menara Where id_user="'.$this->session->userdata("id_user").'"')->num_rows();
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('user/menara_v',$query);
    }
    public function tambahmenara()
    {  
        if($this->session->userdata('login') == null){
            redirect('home');
        }
        $data['listsoal'] = $this->soal_m->listsoal();
        $data['listfile'] = $this->soal_m->listsoal();
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('user/tmbh_menara_v',$data);

    }
    public function akun($page = "")
    {
        $filter= "semua";
        if(isset($_GET['filter'])){
            $filter = $_GET['filter'];
        
        }
        
        if($page == 'ditolak'){
            $data['akuns'] = $this->Akun_m->akuntolak($filter);
            $data['filter'] = $page;
        }elseif($page == 'akunbaru'){
            $data['akuns'] = $this->Akun_m->akunAll($filter);
            $data['filter'] = $page;
        }elseif($page == 'akunaktif'){
            $data['akuns'] = $this->Akun_m->akunaktif($filter);
            $data['filter'] = $page;
        }elseif($page == 'pengajuanulang'){
            $data['akuns'] = $this->Akun_m->akunpengajuan($filter);
            $data['filter'] = $page;
        }else{
            $data['akuns'] = $this->Akun_m->akunPro($page);
            $data['filter'] = $page;
        }


        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('admin/akun/akun',$data);
        $this->load->view('admin/addons/footer');

    }
    public function pengajuanulang()
    {
        $email = $this->session->userdata('email');
        $data = $this->Akun_m->getid('id_user','email',$email,'user');

        $this->db->select('pesan')
            ->where('id_user', $data['id_user']);
        $pesan = $this->db->get('tb_pesan')->row_array();
        $data['pesantolak'] = $pesan['pesan'];
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('user/pengajuan_v',$data);
        $this->load->view('admin/addons/footer');
    }
    public function manajemen()
    {
        if($this->session->userdata('login') == null){
            redirect('home');
        }
        $data['soal'] = $this->Akun_m->soal();
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('admin/soal/soal_v',$data);
        $this->load->view('admin/addons/footer');
    }
    public function tambahsoal()
    {
        if($this->session->userdata('login') == null){
            redirect('home');
        }
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('admin/soal/tambahsoal_v');
        $this->load->view('admin/addons/footer');
    }
    public function aksipengajuan($page="")
    {
        if($this->session->userdata('login') == null){
            redirect('home');
        }
        $data['aksipl'] = $this->db->query('SELECT id_tempat, site_id, alamat, kelurahan, kecamatan, nomor, lat, lng, tipe_menara, id_form FROM tb_tempat_menara where status_tempat="pengajuan" and id_form="'.$page.'"')->result();
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('admin/menara/v_aksipengajuan',$data);
        $this->load->view('admin/addons/sidebar');
        $this->load->view('admin/addons/footer',$data);
    }
    public function aksisurvey($page="")
    {
        if($this->session->userdata('login') == null){
            redirect('home');
        }
        $data['aksipl'] = $this->db->query('SELECT id_tempat, site_id, alamat, kelurahan, kecamatan, nomor, lat, lng, tipe_menara, id_form FROM tb_tempat_menara where status_tempat="proses_survey" and id_form="'.$page.'"')->result();
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('admin/menara/v_aksisurvey',$data);
        $this->load->view('admin/addons/sidebar');
        $this->load->view('admin/addons/footer',$data);
    }
    public function verifberkas()
    {
        if($this->session->userdata('login') == null){
            redirect('home');
        }
        $data['veriflist'] = $this->db->query('SELECT tb_form_menara.tgl_pengajuan, user.nama_depan, 
        user.nama_belakang, user.nama_perusahaan, 
        tb_form_menara.id_form, user.id_user, tb_form_menara.status_form
        FROM `tb_form_menara` 
        JOIN user ON user.id_user =tb_form_menara.id_user
        WHERE tb_form_menara.status_form = "pemeriksaan"')->result();
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('admin/menara/v_verifberkas',$data);
        $this->load->view('admin/addons/footer');
    }
    public function pengajuanberkas()
    {
        if($this->session->userdata('login') == null){
            redirect('home');
        }
        $data['pengajuanlist'] = $this->db->query('SELECT tb_tempat_menara.id_form,tb_tempat_menara.alamat,tb_tempat_menara.kelurahan,tb_tempat_menara.site_id,
        tb_tempat_menara.kecamatan,tb_tempat_menara.lat,tb_tempat_menara.lng,tb_tempat_menara.tipe_menara,tb_tempat_menara.tinggi,
        tb_form_menara.id_user, user.nama_depan,user.nama_belakang, user.nama_perusahaan
        FROM tb_tempat_menara
        JOIN tb_form_menara ON tb_tempat_menara.id_form = tb_tempat_menara.id_form
        JOIN user ON tb_form_menara.id_user = user.id_user
        Where tb_tempat_menara.status_tempat="pengajuan" and tb_form_menara.status_form ="lengkap" group by id_form')->result();
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('admin/menara/v_pengajuan',$data);
        $this->load->view('admin/addons/footer');
    }
    public function prosessurvey()
    {
        if($this->session->userdata('login') == null){
            redirect('home');
        }
        $data['pengajuanlist'] = $this->db->query('SELECT tb_tempat_menara.id_form,tb_tempat_menara.alamat,tb_tempat_menara.kelurahan,tb_tempat_menara.site_id,
        tb_tempat_menara.kecamatan,tb_tempat_menara.lat,tb_tempat_menara.lng,tb_tempat_menara.tipe_menara,tb_tempat_menara.tinggi,
        tb_form_menara.id_user, user.nama_depan,user.nama_belakang, user.nama_perusahaan
        FROM tb_tempat_menara
        JOIN tb_form_menara ON tb_tempat_menara.id_form = tb_tempat_menara.id_form
        JOIN user ON tb_form_menara.id_user = user.id_user
        Where tb_tempat_menara.status_tempat="proses_survey" group by id_form')->result();
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('admin/menara/v_prosurvey',$data);
        $this->load->view('admin/addons/footer');
    }
    public function prosesrekom()
    {
        if($this->session->userdata('login') == null){
            redirect('home');
        }
        $data['pengajuanlist'] = $this->db->query('SELECT tb_tempat_menara.id_form,tb_tempat_menara.alamat,tb_tempat_menara.kelurahan,tb_tempat_menara.site_id,
        tb_tempat_menara.kecamatan,tb_tempat_menara.lat,tb_tempat_menara.lng,tb_tempat_menara.tipe_menara,tb_tempat_menara.tinggi,
        tb_form_menara.id_user, user.nama_depan,user.nama_belakang, user.nama_perusahaan
        FROM tb_tempat_menara
        JOIN tb_form_menara ON tb_tempat_menara.id_form = tb_tempat_menara.id_form
        JOIN user ON tb_form_menara.id_user = user.id_user
        Where tb_tempat_menara.status_tempat="proses_rekom" group by id_form')->result();
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('admin/menara/v_prorekom',$data);
        $this->load->view('admin/addons/footer');
    }
    public function aksiverif($page = "")
    {

        if($this->session->userdata('login') == null){
            redirect('home');
        }
        if(!empty($page)){
        $data['veriflist'] = $this->db->query('SELECT tb_file.id_file,tb_file.nama_file,tb_form_menara.id_form,tb_form_menara.id_user,tb_form_menara.tgl_pengajuan,tb_form_menara.no_surat,
        tb_form_menara.tgl_surat, tb_soal.nama_soal, tb_soal.jenis,tb_soal.id_soal, tb_form_menara.status_form
        FROM `tb_file` 
        join tb_form_menara on tb_form_menara.id_form = tb_file.id_form 
        right join tb_soal on tb_file.id_soal = tb_soal.id_soal WHERE tb_form_menara.id_form = "'.$page.'" GROUP BY tb_soal.id_soal')->result();
        $data['idform'] = $page;    
        }else{
\           redirect('home/verifberkas');
        }
        $this->load->view('admin/addons/header');
        $this->load->view('admin/addons/navbar');
        $this->load->view('admin/menara/v_aksiberkas',$data);
        $this->load->view('admin/addons/footer');
    }
}