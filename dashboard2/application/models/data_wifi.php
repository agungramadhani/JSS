<?php
class data_wifi extends CI_Model
{
    public function datawifi()
    {
        $querywifi = $this->db->query("SELECT * FROM data_wifi")->result();
        return $querywifi;
    }
    public function tambah_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_wifi($where, $table)
    {

        return $this->db->get_where($table, $where);
    }

    public function hapus_data($whare, $table)
    {
        $this->db->where($whare);
        $this->db->delete($table);
    }
    public function update_data($whare, $data, $table)
    {
        $this->db->where($whare);
        $this->db->update($table, $data);
    }
}
