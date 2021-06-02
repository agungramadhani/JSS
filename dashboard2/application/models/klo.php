<?php
class klo extends CI_Model
{
    function TampilData()
    {

        // $this->db->select('*');
        // $this->db->from('tb_anggota');
        // $query = $this->db->get();
        $this->db->select('username');
        $this->db->from('operators');
        return $this->db->get('username');
    }
}
