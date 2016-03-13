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
    }
    
    public function index(){
        echo "อยู่ในระหว่างพัฒนา...";
        echo "<br>";
        echo "<a href='http://hr.kanfin.com'>คลิกกลับหน้าหลัก...</a>";
    }
    
    public function audit(){
        $this->load->view('book_audit_view');
    }
    
    public function add_audit_content(){
     echo   $this->input->post('txtSumerNote');
    }
}
