<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Project
 *
 * @author Administrator
 */
class Project extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Project_model', 'projects');
        $this->load->model('Customer_model', 'customers');
        $this->load->model('users_model', 'users');
    }

    public function index() {
        if ($this->session->userdata('logged')) {//ผ่านการลงชื่อเข้าใช้
            $dataProject['listCustomer'] = $this->customers->_sel_customer_details();
            $this->load->view('project_view', $dataProject);
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function add_project($customer_id, $customer_tax_id, $customer_name) {
        //เจนรหัสใหม่
        $curentYear = date("Y") + 543; //ปีปัจจุบัน พ.ศ.   
        $curentYearSub = substr($curentYear, 2);
        $newProNumber = $this->projects->_add_project($curentYearSub, $customer_id, $customer_tax_id);
        /* เลือก Em Name */
        $emname = $this->users->_sel_employee_details();

        /* เอา Data ไปยัด */
        $dataOpenPro = array(
            'newProNumber' => $newProNumber,
            'taxId' => $customer_tax_id,
            'customerName' => $customer_name,
            'customer_id' => $customer_id,
            'em_name' => $emname
        );

        $this->load->view('add_project_view', $dataOpenPro);
    }

    public function project_customer($customer_id, $customer_name, $tax_id) {

        $dataProCus['details'] = $this->projects->_sel_project($customer_id);
        $dataProCus['customer_name'] = $customer_name;
        $dataProCus['tax_id'] = $tax_id;
        $this->load->view('project_customer_view', $dataProCus);
    }

    public function insert_project() { //เอาลงฐานข้อมูล
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|docx|pdf|xl|xls';
        $config['max_size'] = 10000; //10 mb

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $projectData = array(
            'hdfCustomerId' => $this->input->post('hdfCustomerId'),
            'txtIdWorkCustomer' => $this->input->post('txtIdWorkCustomer'),
            'txtAssetProject' => $this->input->post('txtAssetProject'),
            'txtCoastOffice' => $this->input->post('txtCoastOffice'),
            'txtMarkProject' => $this->input->post('txtMarkProject'),
            /* team */
            'selEmRole' => $this->input->post('selEmRole[]'),
            'selEmName' => $this->input->post('selEmName[]'),
            'txtCountWorkHour' => $this->input->post('txtCountWorkHour[]'),
            'txtBathTime' => $this->input->post('txtBathTime[]'),
            /* Project ต่อ */
            'datIntWork' => $this->input->post('datIntWork'),
            'datFinalWork' => $this->input->post('datFinalWork'),
            'datAcepeWork' => $this->input->post('datAcepeWork'),
            'selRateCoast' => $this->input->post('selRateCoast'),
            'txtRevenueAudit' => $this->input->post('txtRevenueAudit'),
            'txtInstallment' => $this->input->post('txtInstallment'),
            /* Project_doc */
            'datOffers' => $this->input->post('datOffers'), //ใบเสนอราคา
            'txtSumMoney' => $this->input->post('txtSumMoney'),
            'txtNoOffer' => $this->input->post('txtNoOffer'),
            'datOffersEmploy' => $this->input->post('datOffersEmploy'), //สัญญาจ้าง
            'txtSumMoneyEmploy' => $this->input->post('txtSumMoneyEmploy'),
            'txtNoEmploy' => $this->input->post('txtNoEmploy'),
            /* ปี */
            'selYear' => $this->input->post('selYear'),
            'txtWorkTitle' => $this->input->post('txtWorkTitle')
        );
        $insertToProject = $this->projects->_insert_project($projectData);  //insert ลง project
        $proNumber = $this->input->post('txtIdWorkCustomer');  //รับค่ารหัสงานใหม่
        $cusIdFromproNumber = $this->projects->_proid_from_pro_number($proNumber);  //ได้ pro_id ทีมีการ insert ลง project ด้วยรหัสงานใหม่
        //insert ลง team
        $selEmTeam = $projectData['selEmName'];  //นับจำนวนพนักงานลงทีม
        $countEm = count($selEmTeam);
        $insertToteam = $this->projects->_insert_team($cusIdFromproNumber, $projectData, $countEm); //insert ลง ทีมเรียบร้อย
        //ลง tb doc pro
        if ($projectData['datOffers'] != "" || $projectData['datOffersEmploy'] != "") {  //ถ้ามีการกรอกใบเสนอราคาหรือจ้างอย่างใดอย่างหนึ่ง
            if (!empty($_FILES['fileDocOfffer']['name']) || !empty($_FILES['fileDocEmploy']['name'])) {//มีไฟล์อย่างใดอย่างหนึ่ง
                if (!empty($_FILES['fileDocOfffer']['name'])) {
                    if (!$this->upload->do_upload('fileDocOfffer')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    } else {
                        $upload_dataOffer = $this->upload->data();
                        $fileDocOfffer = $upload_dataOffer['file_name'];
                        $insertToDocPro = $this->projects->_insert_prodoc($projectData['datOffers'], $projectData['txtSumMoney'], $projectData['txtNoOffer'], $fileDocOfffer, $cusIdFromproNumber, 'ใบเสนอราคา');
                    }
                }
                if (!empty($_FILES['fileDocEmploy']['name'])) {
                    if (!$this->upload->do_upload('fileDocEmploy')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    } else {
                        $upload_dataEmploy = $this->upload->data();
                        $fileDocEmploy = $upload_dataEmploy['file_name'];
                        //$insertToDocPro = $this->projects->_insert_prodoc($projectData, $cusIdFromproNumber, 'สัญญาจ้าง');
                        $insertToDocPro = $this->projects->_insert_prodoc($projectData['datOffersEmploy'], $projectData['txtSumMoneyEmploy'], $projectData['txtNoEmploy'], $fileDocEmploy, $cusIdFromproNumber, 'สัญญาจ้าง');
                    }
                }
            } else {  //ถ้าไม่มีไฟล์
                if ($projectData['datOffers'] != "") {
                    $fileDocOfffer = "";
                    $insertToDocPro = $this->projects->_insert_prodoc($projectData['datOffers'], $projectData['txtSumMoney'], $projectData['txtNoOffer'], $fileDocOfffer, $cusIdFromproNumber, 'ใบเสนอราคา');
                }
                if ($projectData['datOffersEmploy'] != "") {
                    $fileDocEmploy = "";
                    $insertToDocPro = $this->projects->_insert_prodoc($projectData['datOffersEmploy'], $projectData['txtSumMoneyEmploy'], $projectData['txtNoEmploy'], $fileDocEmploy, $cusIdFromproNumber, 'สัญญาจ้าง');
                }
            }
        }

        $this->load->view('project_view_load');
    }

    public function close_open($command, $id) {
        $this->projects->_close_open($command, $id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function edit_project($tax_id, $name, $project_id) {

        $projectDetail = $this->projects->_sel_pro_details($project_id); //รายละเอียดโปรเจค
        $employeeDetail = $this->users->_sel_employee_details(); //รายละเอียดพนักงาน
        $teamDetail = $this->projects->_sel_team_details($project_id); //รายละเอียดทีม
        $proDocDetail = $this->projects->_sel_pro_doc($project_id);
        //print_r($proDocDetail);
        $data = array(
            'taxId' => $tax_id,
            'projectId' => $project_id,
            'customerName' => $name,
            'project_detail' => $projectDetail,
            'employeeDetail' => $employeeDetail,
            'teamDetail' => $teamDetail,
            'prodoc' => $proDocDetail,
        );
        //echo $data['teamDetail'][0]['team_role'];


        $this->load->view('edit_project_view', $data);
    }

    public function update_project() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|docx|pdf|xl|xls';
        $config['max_size'] = 10000; //10 mb

        $this->upload->initialize($config);
        $this->load->library('upload', $config);


        $projectData = array(
            'hdfProId' => $this->input->post('hdfProId'),
            'txtIdWorkCustomer' => $this->input->post('txtIdWorkCustomer'),
            'txtAssetProject' => $this->input->post('txtAssetProject'),
            'txtCoastOffice' => $this->input->post('txtCoastOffice'),
            'txtMarkProject' => $this->input->post('txtMarkProject'),
            /* team */
            'selEmRole' => $this->input->post('selEmRole[]'),
            'selEmName' => $this->input->post('selEmName[]'),
            'txtCountWorkHour' => $this->input->post('txtCountWorkHour[]'),
            'txtBathTime' => $this->input->post('txtBathTime[]'),
            /* Project ต่อ */
            'datIntWork' => $this->input->post('datIntWork'),
            'datFinalWork' => $this->input->post('datFinalWork'),
            'datAcepeWork' => $this->input->post('datAcepeWork'),
            'selRateCoast' => $this->input->post('selRateCoast'),
            'txtRevenueAudit' => $this->input->post('txtRevenueAudit'),
            'txtInstallment' => $this->input->post('txtInstallment'),
            /* Project_doc */
            'datOffers' => $this->input->post('datOffers'), //ใบเสนอราคา
            'txtSumMoney' => $this->input->post('txtSumMoney'),
            'txtNoOffer' => $this->input->post('txtNoOffer'),
            'datOffersEmploy' => $this->input->post('datOffersEmploy'), //สัญญาจ้าง
            'txtSumMoneyEmploy' => $this->input->post('txtSumMoneyEmploy'),
            'txtNoEmploy' => $this->input->post('txtNoEmploy'),
            'prodocOfferId' => $this->input->post('hdf1'), //id ใบเสนอราคา
            'prodocEmployId' => $this->input->post('hdf2'), // id สัญญาจ้าง

            /* หัวข้องาน */
            'txtWorkTitle' => $this->input->post('txtWorkTitle')
        );

        /* อัตเดตตัวโปรเจค */ $upPro = $this->projects->_update_project($projectData);
        /* update team */
        /* ลบของเก่า */ $delOldTeam = $this->projects->_delteam($projectData['hdfProId']);
        $countEm = 0;
        $countEm = count($projectData['selEmName']);
        /* เพิ่มของใหม่ */ $insertNewTeam = $this->projects->_insert_team($projectData['hdfProId'], $projectData, $countEm);
        $countEm = 0;


        /* อัพเดตไฟล์ */
        if ($projectData['datOffers'] != "" || $projectData['datOffersEmploy'] != "") {  //ถ้ามีการกรอกใบเสนอราคาหรือจ้างอย่างใดอย่างหนึ่ง
            if (!empty($_FILES['fileDocOfffer']['name']) || !empty($_FILES['fileDocEmploy']['name'])) {//มีไฟล์อย่างใดอย่างหนึ่ง
                if (!empty($_FILES['fileDocOfffer']['name'])) {
                    if (!$this->upload->do_upload('fileDocOfffer')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    } else {
                        $upload_dataOffer = $this->upload->data();
                        $fileDocOfffer = $upload_dataOffer['file_name'];
                        /* ลบของเก่าออกก่อน */$this->projects->_del_old_prodoc_id_file($projectData['prodocOfferId']);
                        $insertToDocPro = $this->projects->_update_prodoc($projectData['datOffers'], $projectData['txtSumMoney'], $projectData['txtNoOffer'], $fileDocOfffer, $projectData['prodocOfferId'], 'ใบเสนอราคา');
                    }
                }
                if (!empty($_FILES['fileDocEmploy']['name'])) {
                    if (!$this->upload->do_upload('fileDocEmploy')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    } else {
                        $upload_dataEmploy = $this->upload->data();
                        $fileDocEmploy = $upload_dataEmploy['file_name'];
                        //$insertToDocPro = $this->projects->_insert_prodoc($projectData, $cusIdFromproNumber, 'สัญญาจ้าง');
                        /* ลบของเก่าออกก่อน */$this->projects->_del_old_prodoc_id_file($projectData['prodocEmployId']);
                        $insertToDocPro = $this->projects->_update_prodoc($projectData['datOffersEmploy'], $projectData['txtSumMoneyEmploy'], $projectData['txtNoEmploy'], $fileDocEmploy, $projectData['prodocEmployId'], 'สัญญาจ้าง');
                    }
                }
            } else {  //ถ้าไม่มีไฟล์
                if ($projectData['datOffers'] != "") {
                    $fileDocOfffer = "";
                    $insertToDocPro = $this->projects->_update_prodoc($projectData['datOffers'], $projectData['txtSumMoney'], $projectData['txtNoOffer'], $fileDocOfffer, $projectData['prodocOfferId'], 'ใบเสนอราคา');
                }
                if ($projectData['datOffersEmploy'] != "") {
                    $fileDocEmploy = "";
                    $insertToDocPro = $this->projects->_update_prodoc($projectData['datOffersEmploy'], $projectData['txtSumMoneyEmploy'], $projectData['txtNoEmploy'], $fileDocEmploy, $projectData['prodocEmployId'], 'สัญญาจ้าง');
                }
            }
        }
        /* .อัพเดตไฟล์ */

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function del_project($proId) {
        $delPro = $this->projects->_delpro_cascade($proId);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function add_project2() {
        //เจนรหัสใหม่
        $customer_id = $this->input->post('hdf1');
        $curentYearSub1 = $this->input->post('selYear');
        $curentYearSub = substr($curentYearSub1, 2);
        $customer_tax_id = $this->input->post('hdf2');
        $customer_name = $this->input->post('hdf3');
        $selCatetagory = $this->input->post('selCate');


        $newProNumber = $this->projects->_add_project($curentYearSub, $customer_id, $customer_tax_id, $selCatetagory); //ได้รหัสงานใหม่
        /* เลือก Em Name */
        $emname = $this->users->_sel_employee_details();




        /* เอา Data ไปยัด */
        $dataOpenPro = array(
            'newProNumber' => $newProNumber,
            'taxId' => $customer_tax_id,
            'customerName' => $customer_name,
            'customer_id' => $customer_id,
            'em_name' => $emname,
            'sel_year' => $curentYearSub1
        );

        $this->load->view('add_project_view', $dataOpenPro);
    }

    public function add_details($emId , $teamId, $projectId) {  //เพิ่มรายละเอียดพร้อมทำแชท
        //echo $emId." ".$teamId;
        $selDocPath = $this->projects->_sel_team_doc($projectId);
        if (empty($selDocPath)) {

            //$path = base_url('uploads/pdf-sample.pdf');
            $path = "pdf-sample.pdf";
        } elseif (!empty($selDocPath)) {
            $path = $selDocPath;
        }
        
        /*ดึงข้อความออกมาแสดง*/
        $dataMsn = $this->projects->_sel_msn($emId,$teamId , $projectId);
        
        /*ดึงข้อมูลโปรเจค*/
        $projectDetail = $this->projects->_sel_pro_details($projectId);
        
        /*ข้อมูลลง วิว*/
        $data = array(
            'emId' => $emId,
            'teamId' => $teamId,
            'docPath' => $path,
            'arrDataMsn' => $dataMsn,
            'projectId' => $projectId,
            'projectDetail' => $projectDetail
        );
       
        $this->load->view('team_details_view', $data);
    }

    public function insert_doc_team() { //อัพโหลดไฟล์และบันทึกลง db
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|docx|pdf|xl|xls';
        $config['max_size'] = 10000; //10 mb

        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        
        /*เช็คไฟล์เก่าว่ามีหรือไม่*/
        if($this->input->post('docPath') != ""){
            $docOldPath = $this->input->post('docPath');
            if(file_exists("uploads/$docOldPath")){
                unlink("uploads/$docOldPath");
                $deleteOldFile = $this->projects->_del_old_file_team_doc($docOldPath);
            }
        }

        if (!empty($_FILES['fileDoc']['name'])) {
            if (!$this->upload->do_upload('fileDoc')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $uploadFileDoc = $this->upload->data();
                $uploadFileDocName = $uploadFileDoc['file_name'];
                $insertDb = $this->projects->_insert_team_doc($this->input->post('hdf1'), $this->input->post('hdf2'), $uploadFileDocName, $this->input->post('hdfpro'));
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function del_doc_team($emId, $teamId, $file, $projectId) {
        $delDocTeam = $this->projects->_del_doc_team($emId, $teamId, $file, $projectId);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function sent_msn() {
        /*ไฟล์*/
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|docx|pdf|xl|xls|jpg|jpeg|png|gif';
        $config['max_width'] = 10240;
        $config['max_height'] = 10000;
        $config['max_size'] = 10000; //10 mb

        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        
        if(!empty($_FILES['fileMsn']['name'])){
            if (!$this->upload->do_upload('fileMsn')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $uploadFileDoc = $this->upload->data();
                $uploadFileDocName = $uploadFileDoc['file_name'];
                //$insertDb = $this->projects->_insert_team_doc($this->input->post('hdf1'), $this->input->post('hdf2'), $uploadFileDocName);
            }
        }else{
            $uploadFileDocName = ""; //ถ้าไม่มีการอัพไฟล์ให้เท่ากัับว่าง
        }
        
        
        echo $dateSent = $this->session->userdata('date_curent');  //วันที่ล๊อคอิน
        echo "<br>";
        echo $timeSent = date('G:i:s');
        echo "<br>";
        echo $text = $this->input->post('message');
        echo "<br>";
        echo $sender = $this->session->userdata('em_id');
        echo "<br>";
        echo $receipter = $this->input->post('hdf3');
        echo "<br>";
       echo  $teamId = $this->input->post('hdf4');
       $projectID = $this->input->post('hdf5');
        
       
       
        $dataToInsert = array(
            'dateSent' => $dateSent,
            'timeSent' => $timeSent,
            'text' => $text,
            'sender' => $sender,
            'receipter' => $receipter,
            'teamId' => $teamId,   //
            'fk_project_id' => $projectID,
            'uploadFileDocName' => $uploadFileDocName
                
        );
        
        $dataMsnInsert = $this->projects->_insert_msn($dataToInsert);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    /*ทดสอบ*/
    public function chat($emId, $teamId){
       
        
        /*ดึงข้อความออกมาแสดง*/
        $dataMsn = $this->projects->_sel_msn($emId, $teamId);
        $path = "";
        $data = array(
            'emId' => $emId,
            'teamId' => $teamId,
            'docPath' => $path,
            'arrDataMsn' => $dataMsn
        );
        
        $this->load->view('team_details_view_ref',$data);
    }
    
    public function del_msn($msnId){
        $this->db->where('msn_id',$msnId);
        $query = $this->db->get('msn')->result();
        foreach ($query as $row){
            $filePath = $row->msn_file;
        }
        if(!empty($filePath)){
            if(file_exists("uploads/$filePath")){
                unlink("uploads/$filePath");
            }
        }
        
        $delMsn = $this->projects->_del_msn($msnId);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    
      public function insert_doc_team2() { //อัพโหลดไฟล์และบันทึกลง db
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|docx|pdf|xl|xls';
        $config['max_size'] = 10000; //10 mb

        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        
        /*เช็คไฟล์เก่าว่ามีหรือไม่*/
        if($this->input->post('docPath') != ""){
            $docOldPath = $this->input->post('docPath');
            if(file_exists("uploads/$docOldPath")){
                unlink("uploads/$docOldPath");
                $deleteOldFile = $this->projects->_del_old_file_team_doc($docOldPath);
            }
        }

        if (!empty($_FILES['fileDoc']['name'])) {
            if (!$this->upload->do_upload('fileDoc')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $uploadFileDoc = $this->upload->data();
                $uploadFileDocName = $uploadFileDoc['file_name'];
                $insertDb = $this->projects->_insert_team_doc($this->input->post('hdf1'), $this->input->post('hdf2'), $uploadFileDocName, $this->input->post('hdfpro'));
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    
    public function ems($project_id,$command){
     
        $commnadEms = $this->projects->_ems($project_id,$command);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit; 
    }
    
    
    
    
    
    

}
