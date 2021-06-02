<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('formatBytes_helper');
    }
    public function login2()
    {
        if ($this->session->userdata('masuk') == null) {
            redirect('Auth');
        }

        date_default_timezone_set('Asia/Jakarta');
        $tahun = date("Y");
        $hihi1 = $this->db->query("SELECT SUM(acctinputoctets) as 'upload' , SUM(acctoutputoctets) as 'download' ,month(acctstoptime) as bulan FROM `radacct` WHERE  year(acctstoptime) = '" . $tahun . "' AND (radacct.Username LIKE '%jss%') GROUP BY month(acctstoptime)")->result_array();
        $upload = '';
        $download = '';
        foreach ($hihi1 as $h) {
            $upload .= ",'" . $h['upload'] . "'";
            $download .= ",'" . $h['download'] . "'";
        }

        $datas['download'] = substr($download, 1);
        $datas['upload'] = substr($upload, 1);
        $this->load->model('data_wifi');
        $datas["wifi"] = $this->data_wifi->datawifi();

        $this->load->view('_partials/head');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar');
        $this->load->view('index', $datas);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function data_wifi()
    {
        $this->load->model('data_wifi');
        $querywifi["wifi"] = $this->data_wifi->datawifi();
        if ($this->session->userdata('masuk') == null) {
            redirect('Auth');
        }
        $this->load->view('_partials/head');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar');
        $this->load->view('v_datawifi', $querywifi);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function input_wifi()
    {

        if ($this->session->userdata('masuk') == null) {
            redirect('Auth');
        }
        $this->load->view('_partials/head');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar');
        $this->load->view('v_inputwifi');
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function v_editwifi($id)
    {
        $this->load->model('data_wifi');
        $where = array('no' => $id);
        $data['wifi'] = $this->data_wifi->edit_wifi($where, 'data_wifi')->result();

        if ($this->session->userdata('masuk') == null) {
            redirect('Auth');
        }
        $this->load->view('_partials/head');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar');
        $this->load->view('v_editwifi', $data);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function online_users()
    {
        $this->load->model('online');
        $query["yyy"] = $this->online->useronline();

        if ($this->session->userdata('masuk') == null) {
            redirect('Auth');
        }
        $this->load->view('_partials/head');
        $this->load->view('_partials/navbar');
        $this->load->view('_partials/sidebar');
        $this->load->view('online_user', $query);
        $this->load->view('_partials/footer');
        $this->load->view('_partials/js');
    }

    public function tambah_aksi()
    {
        $this->load->model('data_wifi');
        $lokasi         = $this->input->post('nama_lokasi');
        $kecamatan      = $this->input->post('kemantren');
        $kelurahan      = $this->input->post('kelurahan');
        $rt             = $this->input->post('rt');
        $rw             = $this->input->post('rw');
        $status         = $this->input->post('status');
        $id_lifemedia   = $this->input->post('id_lifemedia');
        $ip             = $this->input->post('ip');
        $hasil_survey   = $this->input->post('hasil_survey');
        $alamat         = $this->input->post('alamat');
        $pic            = $this->input->post('pic');
        $lat            = $this->input->post('lat');
        $lng            = $this->input->post('lng');
        $file_laporan         = $_FILES['foto_stiker']['name'];

        if ($file_laporan = '') {
            echo "gagal";
            die;
        } else {
            $config['upload_path']  = './uploads';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_stiker')) {
                echo "upload Gagal";
            } else {
                echo $file_laporan = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nama_lokasi'          => $lokasi,
            'kemantren'            => $kecamatan,
            'kelurahan'            => $kelurahan,
            'rt'                   => $rt,
            'rw'                   => $rw,
            'status'               => $status,
            'id_lifemedia'         => $id_lifemedia,
            'ip'                   => $ip,
            'hasil_survey'         => $hasil_survey,
            'alamat'               => $alamat,
            'pic'                  => $pic,
            'foto_stiker'          => $file_laporan,
            'lat'                  => $lat,
            'lng'                  => $lng
        );

        $this->data_wifi->tambah_data($data, 'data_wifi');
        redirect('home/data_wifi');
    }

    public function update()
    {
        $this->load->model('data_wifi', 'mlap');
        $id = $this->input->post('no');
        $nama_lokasi = $this->input->post('nama_lokasi');
        $kemantren   = $this->input->post('kemantren');
        $kelurahan = $this->input->post('kelurahan');
        $rt   = $this->input->post('rt');
        $rw   = $this->input->post('rw');
        $status  = $this->input->post('status');
        $id_lifemedia   = $this->input->post('id_lifemedia');
        $ip   = $this->input->post('ip');
        $hasil_survey  = $this->input->post('hasil_survey');
        $alamat   = $this->input->post('alamat');
        $pic   = $this->input->post('pic');
        $lat   = $this->input->post('lat');
        $lng   = $this->input->post('lng');

        $file_laporan         = $_FILES['foto_stiker']['name'];

        if ($file_laporan = '') {
            echo "gagal";
            die;
        } else {
            $config['upload_path']  = './uploads';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_stiker')) {
                echo "upload Gagal";
            } else {
                echo $file_laporan = $this->upload->data('file_name');
            }
        }
        if ($id == true) {
            $data = array(
                'nama_lokasi'    => $nama_lokasi,
                'kemantren'      => $kemantren,
                'kelurahan'      => $kelurahan,
                'rt'             => $rt,
                'rw'             => $rw,
                'status'         => $status,
                'id_lifemedia'   => $id_lifemedia,
                'ip'             => $ip,
                'hasil_survey'   => $hasil_survey,
                'alamat'         => $alamat,
                'pic'            => $pic,
                'foto_stiker'    => $file_laporan,
                'lat'            => $lat,
                'lng'            => $lng
            );
            $where = array(
                'no' => $id
            );
            $this->mlap->update_data($where, $data, 'data_wifi');
            redirect('home/data_wifi');
        } else {
            redirect('home/v_editwifi');
        }
    }

    public function hapus($id)
    {
        $this->load->model('data_wifi', 'mlap');
        $whare = array('no' => $id);
        $this->mlap->hapus_data($whare, 'data_wifi');
        redirect('home/data_wifi');
    }
}