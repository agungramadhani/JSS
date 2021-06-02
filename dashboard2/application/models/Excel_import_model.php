<?php
class Excel_import_model extends CI_Model
{
    function select()
    {
        $this->db->order_by('nama_lokasi');
        $query = $this->db->get('data_wifi');
        return $query;
    }

    function insert($data)
    {
        $this->db->insert_batch('data_wifi', $data);
    }
}
