<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Exel_import extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
    }

    function index()
    {
        $this->load->view('home/data_wifi');
    }

    function fetch()
    {
        $fileName = time() . $_FILES['file']['name'];

        $config['upload_path'] = './uploads/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 8000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
        } else {
            $media = $this->upload->data();
            $inputFileName = './uploads/' . $media['file_name'];

            try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }


            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray(
                    'A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE
                );


                //Sesuaikan sama nama kolom tabel di database                                
                $dataex[$row - 1] = array(
                    "nama_lokasi" => $rowData[0][1],
                    "kemantren" => $rowData[0][2],
                    "kelurahan" => $rowData[0][3],
                    "rt" => $rowData[0][4],
                    "rw" => $rowData[0][5],
                    "status" => $rowData[0][6],
                    "id_lifemedia" => $rowData[0][7],
                    "ip" => $rowData[0][8],
                    "hasil_survey" => $rowData[0][9],
                    "alamat" => $rowData[0][10],
                    "pic" => $rowData[0][11],
                    "foto_stiker" => $rowData[0][12],
                    "lat" => $rowData[0][13],
                    "lng" => $rowData[0][14]
                );
                delete_files($media['file_path']);
            }
            $file = $this->db->insert_batch('data_wifi', $dataex);
            if ($file) {
                redirect('home/data_wifi');
            } else {
                echo 'gagal';
            }
        }
        //sesuaikan nama dengan nama tabel
        //  
    }
}
