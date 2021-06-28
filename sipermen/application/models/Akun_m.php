<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_m extends CI_Model
{
    public function akunAll(){

            $this->db->select('dokumen,id_user, is_active,nama_depan,email, oauth_provider, nama_belakang, no_hp, nama_perusahaan, is_verif, level')
            // ->where('is_active', 1)
            ->where('is_verif', 0);
            $query = $this->db->get('user')->result();
            return $query;
    }

    public function akunPro($akun){

        $this->db->select('dokumen,id_user, is_active,nama_depan,email, oauth_provider, nama_belakang, no_hp, nama_perusahaan, is_verif, level')
        ->where('is_verif', 0);
        if ($akun != "semua"){
           $this->db->where('oauth_provider', $akun);
        }
        // ->where('is_active', 1)
        $query = $this->db->get('user')->result();
        return $query;
    }
    public function akunpengajuan($akun){

        $this->db->select('dokumen,id_user, is_active,nama_depan,email, oauth_provider, nama_belakang, no_hp, nama_perusahaan, is_verif, level')
        ->where('is_active', 1)
        ->where('is_verif', 2);
        if ($akun != "semua"){
           $this->db->where('oauth_provider', $akun);
        }
        $query = $this->db->get('user')->result();
        return $query;
    }
    public function akuntolak($akun){
        $this->db->select('dokumen,id_user,is_active,oauth_provider, nama_depan,email, nama_belakang, no_hp, nama_perusahaan, is_verif, level')
        // ->where('is_active', 1)
        ->where('is_verif', 3);
        if ($akun != "semua"){
           $this->db->where('oauth_provider', $akun);
        }
        $query = $this->db->get('user')->result();
        return $query;
       
    }
    public function soal(){
        $query = $this->db->query('SELECT tb_soal.id_soal,tb_soal.nama_soal,tb_soal.jenis,tb_file.nama_file,tb_file.is_contoh
        FROM tb_soal 
        LEFT JOIN tb_file
        ON tb_soal.id_soal = tb_file.id_soal GROUP BY id_soal ASC')->result();
        // ->where('is_active', 1)
        return $query;
       
    }
    public function akunaktif($akun){
        $this->db->select('dokumen,id_user,is_active,oauth_provider, nama_depan,email, nama_belakang, no_hp, nama_perusahaan, is_verif, level')
        ->where('is_active', 1)
        ->where('is_verif', 1);
        if ($akun != "semua"){
            $this->db->where('oauth_provider', $akun);
        }
        $query = $this->db->get('user')->result();
        return $query;
       
    }
    public function accVerif($id){
        $this->db->where('id_user', $id);
        $this->db->update('user', array( 'is_verif' => '1'));
    }
    public function tolakVerif($id,$pesan){
        $this->db->where('id_user', $id);
        $this->db->update('user', array( 'is_verif' => '3'));
        $data = array(
            'id_user' => $id,
            'pesan' => $pesan
    );
    
    $this->db->insert('tb_pesan', $data);
    }
    public function getid($id,$where,$where2,$table){
        $this->db->select($id)
            ->where($where, $where2);
        $data = $this->db->get($table)->row_array();
        return $data;
    }
}