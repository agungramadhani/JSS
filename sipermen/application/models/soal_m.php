<?php
defined('BASEPATH') or exit('No direct script access allowed');

class soal_m extends CI_Model
{
    public function listsoal()
    {
        // $this->db->query('SELECT tb_soal.id_soal,tb_file.id_file,tb_soal.nama_soal,tb_file.nama_file FROM tb_soal LEFT JOIN tb_file ON tb_soal.id_soal = tb_file.id_soal');
        $this->db
            ->select('tb_soal.id_soal,tb_soal.nama_soal,tb_soal.jenis')
            ->from('tb_soal')
            ->order_by('id_soal', 'ASC');
        $query = $this->db->get();
        return $query;
    }
    public function listfile()
    {
        // $this->db->query('SELECT tb_soal.id_soal,tb_file.id_file,tb_soal.nama_soal,tb_file.nama_file FROM tb_soal LEFT JOIN tb_file ON tb_soal.id_soal = tb_file.id_soal');
        $this->db
            ->select('tb_file.id_file,tb_file.nama_file,')
            ->from('tb_file');
        $query = $this->db->get();
        return $query;
    }
}
?>
