<?php
class online extends CI_Model
{
    public function useronline()
    {
        $query = $this->db->query("SELECT radacct.username, radacct.FramedIPAddress,
        radacct.CallingStationId, radacct.AcctStartTime,
        radacct.AcctSessionTime, radacct.NASIPAddress, 
        radacct.CalledStationId, radacct.AcctSessionId, 
        radacct.acctinputoctets AS Upload,
        radacct.acctoutputoctets AS Download,
        hotspots.name AS hotspot, 
        nas.shortname AS NASshortname, 
        userinfo.Firstname AS Firstname, 
        userinfo.Lastname AS Lastname FROM radacct 
        LEFT JOIN hotspots ON (mac = CalledStationId) 
        LEFT JOIN nas ON (nasname = NASIPAddress) 
        LEFT JOIN userinfo ON (radacct.username = userinfo.username) 
        WHERE (AcctStopTime IS NULL OR AcctStopTime = '2021-02-06 11:28:50')")->result();
        return $query;
    }
}
