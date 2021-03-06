<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Help
 *
 * @author Veriton
 */
class Manual extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('manual_model', 'manual');
        $this->load->helper('file');
    }

    public function index() {
        echo "อยู่ในระหว่างพัฒนา...";
        echo "<br>";
        echo "<a href='http://hr.kanfin.com'>คลิกกลับหน้าหลัก...</a>";
    }

    public function audit() {
        /* แสดงรายการที่มี */
        $selManualList = $this->manual->_sel_manual_list();
        $data = array(
            'selManualList' => $selManualList
        );
        $this->load->view('book_audit_view', $data);
    }
    


    public function add_audit_content() {
        
        /* วันที่ ปัจจุบัน */
        $today = date("d-m-Y ");
        $todayExplode = explode("-", $today);
        $yearThaiBank = $todayExplode[2] + 543; //ได้เป็นปีพ.ศ.
        $curentDay = date("d/m") . "/" . $yearThaiBank; //วันที่ปัจจุบัน

        /* .วันที่ */

         /* .แนบไฟล์ */

        $data = array(
            'date' => $curentDay,
            'title' => $this->input->post('txtTitle'),
            'data' => $this->input->post('content'),
            'writer' => $this->session->userdata('em_id'),
            'cate' => '1'
        );
        $insert = $this->manual->_add_content($data); //เอาลง manual_list

        /* แนบไฟล์ 
        $config['upload_path'] = './uploads/';
       
        $config['allowed_types'] = '*';
        $config['max_width'] = 10240;
        $config['max_height'] = 10000;
        $config['max_size'] = 20000; 

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!empty($_FILES['fileManual']['name'])) {
            $maxContenId = $this->manual->_sel_max_id_content();
            if (!$this->upload->do_upload('fileManual')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $uploadFileDoc = $this->upload->data();
                $uploadFileDocName = $uploadFileDoc['file_name'];
               
                $manualFileInsert = $this->manual->_insert_file_manual($maxContenId,$uploadFileDocName);
            }
            
        } */
        
        /* redirect */
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    /* ลบ manual audit */

    public function del_audit_content($id) {

        $delManual = $this->manual->_del_manual_list($id);
        
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    /* แก้ไข audit content */

    public function edit_audit() {
        /* วันที่ ปัจจุบัน */
        $today = date("d-m-Y ");
        $todayExplode = explode("-", $today);
        $yearThaiBank = $todayExplode[2] + 543; //ได้เป็นปีพ.ศ.
        $curentDay = date("d/m") . "/" . $yearThaiBank; //วันที่ปัจจุบัน

        /* .วันที่ */

        $data = array(
            'date' => $curentDay,
            'title' => $this->input->post('txtTitle'),
            'data' => $this->input->post('content'),
            'writer' => $this->session->userdata('em_id'),
            'cate' => '1'
        );
        $id = $this->input->post('hdf');
        $update = $this->manual->_update_content($data, $id);

        /* redirect */
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    /*ส่วนคู่มือ com*/
     public function computer() {
        /* แสดงรายการที่มี */
        $selManualList = $this->manual->_sel_manual_list_com();
        $data = array(
            'selManualList' => $selManualList
        );
        $this->load->view('book_com_view', $data);
    }
    
    public function add_com_content() {
        
        /* วันที่ ปัจจุบัน */
        $today = date("d-m-Y ");
        $todayExplode = explode("-", $today);
        $yearThaiBank = $todayExplode[2] + 543; //ได้เป็นปีพ.ศ.
        $curentDay = date("d/m") . "/" . $yearThaiBank; //วันที่ปัจจุบัน

        /* .วันที่ */

         /* .แนบไฟล์ */

        $data = array(
            'date' => $curentDay,
            'title' => $this->input->post('txtTitle'),
            'data' => $this->input->post('content'),
            'writer' => $this->session->userdata('em_id'),
            'cate' => '2'
        );
        $insert = $this->manual->_add_content_com($data); //เอาลง manual_list

         /* redirect */
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    public function edit_com() {
        /* วันที่ ปัจจุบัน */
        $today = date("d-m-Y ");
        $todayExplode = explode("-", $today);
        $yearThaiBank = $todayExplode[2] + 543; //ได้เป็นปีพ.ศ.
        $curentDay = date("d/m") . "/" . $yearThaiBank; //วันที่ปัจจุบัน

        /* .วันที่ */

        $data = array(
            'date' => $curentDay,
            'title' => $this->input->post('txtTitle'),
            'data' => $this->input->post('content'),
            'writer' => $this->session->userdata('em_id'),
            'cate' => '2'
        );
        $id = $this->input->post('hdf');
        $update = $this->manual->_update_content($data, $id);

        /* redirect */
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    

}
