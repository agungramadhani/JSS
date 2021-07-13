<?php
class data_wifi extends CI_Model
{
    public function datawifi()
    {
        $querywifi = $this->db->query("SELECT * FROM data_wifi")->result();
        return $querywifi;
    }
    public function detail($no = null)
    {
        $query = $this->db->get_where('data_wifi', array('no' => $no))->row();
        return $query;
    }
    public function graphdatawifi()
    {
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

    public function ranking_wifi($hariawal,$hariakhir)
    {
        $ranking = $this->db->query('SELECT count(radacct.radacctid), DAYNAME(DATE(radacct.acctupdatetime)) as hari, 
        sum(radacct.acctinputoctets)/1073741824 as upload, sum(radacct.acctoutputoctets)/1073741824 as download ,
        data_wifi.nama_lokasi, data_wifi.kemantren, data_wifi.kelurahan, data_wifi.rt, data_wifi.rw, data_wifi.ip 
        FROM `radacct` join data_wifi on radacct.nasipaddress = data_wifi.ip 
        where radacct.acctupdatetime >= NOW() + INTERVAL '.$hariawal.' DAY AND radacct.acctupdatetime < NOW() + INTERVAL '.$hariakhir.' DAY 
        GROUP BY data_wifi.ip, DAYNAME(DATE(radacct.acctupdatetime)) order by upload desc, download limit 10')->result();

        return $ranking;
    }
}
