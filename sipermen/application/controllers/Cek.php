<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kode');
    }

    public function index(){
        $this->load->view('admin/menara/print');
    }

    public function cekkode(){
        $Kode=$this->Kode->kodeplus('id_file','tb_file','FL','4','2');
        echo $Kode;
    }
}