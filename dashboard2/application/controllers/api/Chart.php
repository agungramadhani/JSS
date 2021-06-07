<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * Keys Controller
 * This is a basic Key Management REST controller to make and delete keys
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Chart extends REST_Controller {

    public function index_get(){
        date_default_timezone_set('Asia/Jakarta');
        $tahun = date("Y");
        $start = $this->get('start_date');
        $end   = $this->get('end_date');
        $bagi = $this->get('bagi');
        $now = strtotime($end); // or your date as well
        $your_date = strtotime($start);
        $datediff = $now - $your_date;

        $selisih =  round($datediff / (60 * 60 * 24));

        
        if($start == "" && $end == ""){
            
            $query = $this->db->query("SELECT SUM(acctinputoctets)/$bagi as 'upload' , SUM(acctoutputoctets)/$bagi as 'download' ,month(acctstoptime) as bulan FROM `radacct` WHERE  year(acctstoptime) = '" . $tahun . "' AND (radacct.Username LIKE '%jss%') GROUP BY month(acctstoptime)");

        }elseif($this->get('default') == "yes"){
            $query = $this->db->query("SELECT SUM(acctinputoctets)/$bagi as 'upload' , SUM(acctoutputoctets)/$bagi as 'download' ,month(acctstoptime) as bulan FROM `radacct` WHERE (radacct.Username LIKE '%jss%') GROUP BY month(acctstoptime)");
        }elseif($selisih <= 30){
            $query = $this->db->query("SELECT SUM(acctinputoctets)/$bagi as 'upload' , SUM(acctoutputoctets)/$bagi as 'download' ,DAYNAME(acctstoptime) as hari FROM `radacct` WHERE (acctstoptime BETWEEN '".$start."' AND '".$end."') AND (radacct.Username LIKE '%jss%') group by day(acctstoptime) ");
        }else{
            $query = $this->db->query("SELECT SUM(acctinputoctets)/$bagi as 'upload' , SUM(acctoutputoctets)/$bagi as 'download' ,month(acctstoptime) as bulan FROM `radacct` WHERE (acctstoptime BETWEEN '".$start."' AND '".$end."') AND (radacct.Username LIKE '%jss%') GROUP BY month(acctstoptime)");
        }
        
        if($query->num_rows() > 0){
            $data = [
                'status' => true,
                'data'   => $query->result(),
                'test'   => $selisih 
            ];
        }else{
            $data = [
                'status' => false,
                'message'   => 'error'
            ];
        }

        $this->response($data, 200);
    }
    public function uo_get(){
        date_default_timezone_set('Asia/Jakarta');
        $tahun = date("Y");
        $start = $this->get('start_date');
        $end   = $this->get('end_date');
        $bagi = $this->get('bagi');
        $now = strtotime($end); // or your date as well
        $your_date = strtotime($start);
        $datediff = $now - $your_date;

        $selisih =  round($datediff / (60 * 60 * 24));

        
        if($start == "" && $end == ""){
            
            $query = $this->db->query("SELECT count(username) as jumlah ,month(acctupdatetime) as bulan FROM `radacct` WHERE  year(acctupdatetime) = '" . $tahun . "' AND (radacct.Username LIKE '%jss%') GROUP BY month(acctupdatetime)");

        }elseif($this->get('default') == "yes"){
            $query = $this->db->query("SELECT count(username) as jumlah ,month(acctupdatetime) as bulan FROM `radacct` WHERE (radacct.Username LIKE '%jss%') GROUP BY month(acctupdatetime)");
        }elseif($selisih <= 30){
            $query = $this->db->query("SELECT count(username) as jumlah ,DAYNAME(acctupdatetime) as hari FROM `radacct` WHERE (acctupdatetime BETWEEN '".$start."' AND '".$end."') AND (radacct.Username LIKE '%jss%') group by day(acctupdatetime) ");
        }else{
            $query = $this->db->query("SELECT count(username) as jumlah ,month(acctupdatetime) as bulan FROM `radacct` WHERE (acctupdatetime BETWEEN '".$start."' AND '".$end."') AND (radacct.Username LIKE '%jss%') GROUP BY month(acctupdatetime)");
        }
        
        if($query->num_rows() > 0){
            $data = [
                'status' => true,
                'data'   => $query->result(),
                'test'   => $selisih 
            ];
        }else{
            $data = [
                'status' => false,
                'message'   => 'error'
            ];
        }

        $this->response($data, 200);
    }

}
?>