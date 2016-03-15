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
    }
    
    public function index(){
        echo "อยู่ในระหว่างพัฒนา...";
        echo "<br>";
        echo "<a href='http://hr.kanfin.com'>คลิกกลับหน้าหลัก...</a>";
    }
    
    public function audit(){
        /*แสดงรายการที่มี*/
        $selManualList = $this->manual->_sel_manual_list();
        $data = array(
            'selManualList' => $selManualList
        );
        $this->load->view('book_audit_view',$data);
    }
    
    public function add_audit_content(){
       // echo $this->input->post('content');
        
        $data = array(
            'date' => '14/3/2559',
            'title' => $this->input->post('txtTitle'),
            'data' =>  $this->input->post('content'),
            'writer' => $this->session->userdata('em_id'),
            'cate' => '1'
        );
        $insert = $this->manual->_add_content($data);
       
        /*redirect*/      
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
   
    }
    
    /*ลบ manual audit*/
    public function del_audit_content($id){
        
        $delManual = $this->manual->_del_manual_list($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    /*แก้ไข audit content*/
    public function edit_audit(){
        
    }
}