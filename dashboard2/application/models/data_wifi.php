<?php
class data_wifi extends CI_Model
{
    public function datawifi()
    {
        $querywifi = $this->db->query("SELECT * FROM data_wifi")->result();
        return $querywifi;
    }
    public function graphdatawifi()
    {
        $querywifi = $this->db->query("SELECT count(radacct.radacctid), radacct.acctupdatetime ,data_wifi.nama_lokasi, 
        data_wifi.kemantren, data_wifi.kelurahan, data_wifi.rt, data_wifi.rw, data_wifi.ip
        FROM `radacct` join data_wifi on radacct.nasipaddress = data_wifi.ip 
        GROUP BY data_wifi.ip, DATE(radacct.acctupdatetime)")->result();
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
