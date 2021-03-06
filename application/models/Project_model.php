<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Project_model
 *
 * @author Administrator
 */
class Project_model extends CI_Model {

    public function _sel_project($customer_id) {
        $query = $this->db->where('customer_id', $customer_id)
                ->get('project')
                ->result();
        return $query;
    }

    public function _add_project($curentYearSub, $customer_id, $customer_tax_id, $selCatetagory) {
        //สร้างรหัสงานใหม่
        //$sql = "SELECT MAX(project_number) AS max_project_id FROM project WHERE customer_id = '$customer_id' AND project_year LIKE '%$curentYearSub'";
        $sql = "SELECT count(project_number) AS max_project_id FROM project WHERE customer_id = '$customer_id' AND project_year LIKE '%$curentYearSub'";

        $query = $this->db->query($sql)->result();
        foreach ($query as $row) {
            $maxProId = $row->max_project_id; //จะได้หมายเลขโปรเจคของลูกค้าที่ล่าสุด
        }
        $maxProIdExPlode = (explode("-", $maxProId));
        $sizemaxProIdExPlode = sizeof($maxProIdExPlode) - 1; //เอาอาเรย์ตัวสุดท้าย
        $maxOfProIdExPlode = $maxProIdExPlode[$sizemaxProIdExPlode];
        $maxOfProIdExPlodeAdd1 = $maxOfProIdExPlode + 1;


        //return $newProNumber = $curentYearSub . "-" . $customer_tax_id . "-" . $maxOfProIdExPlodeAdd1;
        /* แก้รหัสงานใหม่ */


        return $newProNumber = $curentYearSub . "-" . $customer_tax_id . "-" . $selCatetagory . "-" . $maxOfProIdExPlodeAdd1;
        /* .แก้รหัสงานใหม่ */
    }

    public function _insert_project($projectData) {
        //$curentYear = date("Y") + 543;
        $projectDataInsert = array(
            'project_number' => $projectData['txtIdWorkCustomer'],
            'project_income' => $projectData['txtAssetProject'],
            'project_coast' => $projectData['txtCoastOffice'],
            'project_note' => $projectData['txtMarkProject'],
            'prject_start' => $projectData['datIntWork'],
            'project_end' => $projectData['datFinalWork'],
            'project_receip' => $projectData['datAcepeWork'],
            'project_rate' => $projectData['selRateCoast'],
            'project_coasts' => $projectData['txtRevenueAudit'],
            'project_period' => $projectData['txtInstallment'],
            'project_status' => 'เปิดโครงการ',
            //'project_year' => $curentYear, //อาจมีการเปลี่ยนแปลง
            'project_year' => $projectData['selYear'],
            'customer_id' => $projectData['hdfCustomerId'],
            'project_title' => $projectData['txtWorkTitle']
        );

        $this->db->insert('project', $projectDataInsert);
    }

    public function _proid_from_pro_number($pronumber) {
        $query = $this->db->where('project_number', $pronumber)
                ->get('project')
                ->result();
        foreach ($query as $row) {
            return $row->project_id;
        }
    }

    public function _insert_team($projec_id, $projectData, $countEm) {
        /* insert ลงทีม */
        $dataTeam = array(
            'team_role' => $projectData['selEmRole'],
            'team_hour' => $projectData['txtCountWorkHour'],
            'team_salary' => $projectData['txtBathTime'],
            'em_id' => $projectData['selEmName'], //ค่า em_id
        );

        /* วนเอาข้อมูลเข้า DB */
        for ($i = 0; $i < $countEm; $i++) {

            $query = $this->db->set('team_role', $dataTeam['team_role'][$i])
                    ->set('team_hour', $dataTeam['team_hour'][$i])
                    ->set('team_salary', $dataTeam['team_salary'][$i])
                    ->set('em_id', $dataTeam['em_id'][$i])
                    ->set('project_id', $projec_id)
                    ->insert('team');
        }
    }

    public function _insert_prodoc($docDate, $docCoast, $docNo, $filePath, $proId, $fileName) {
        $dataInsertFile = array(
            'project_doc_name' => $fileName,
            'project_doc_qua_dat' => $docDate,
            'project_doc_money' => $docCoast,
            'project_doc_no' => $docNo,
            'project_doc_path' => $filePath,
            'project_id' => $proId
        );

        $query = $this->db->set('project_doc_name', $dataInsertFile['project_doc_name'])
                ->set('project_doc_qua_dat', $dataInsertFile['project_doc_qua_dat'])
                ->set('project_doc_money', $dataInsertFile['project_doc_money'])
                ->set('project_doc_no', $dataInsertFile['project_doc_no'])
                ->set('project_doc_path', $dataInsertFile['project_doc_path'])
                ->set('project_id', $dataInsertFile['project_id'])
                ->insert('project_doc');
    }

    public function _close_open($command, $id) {
        if ($command == "open") {
            $this->db->set('project_status', 'เปิดโครงการ');
        } elseif ($command == "close") {
            $this->db->set('project_status', '');
        }

        $this->db->where('project_id', $id);
        $this->db->update('project');
    }

    public function _sel_pro_details($proId) {
        $query = $this->db->where('project_id', $proId)
                        ->get('project')->result();

        foreach ($query as $row) {
            $dataRe = array(
                'project_number' => $row->project_number,
                'project_income' => $row->project_income,
                'project_coast' => $row->project_coast,
                'project_note' => $row->project_note,
                'prject_start' => $row->prject_start,
                'project_end' => $row->project_end,
                'project_receip' => $row->project_receip,
                'project_rate' => $row->project_rate,
                'project_coasts' => $row->project_coasts,
                'project_period' => $row->project_period,
                'project_status' => $row->project_status,
                'project_year' => $row->project_year,
                'customer_id' => $row->customer_id,
                'project_title' => $row->project_title,
                'project_ems' => $row->project_ems
            );
        }
        return $dataRe;
    }

    public function _sel_team_details($proId) {
        $query = $this->db->where('project_id', $proId)
                        ->get('team')->result();


        foreach ($query as $row) {
            $daRe[] = array(
                'team_role' => $row->team_role,
                'team_hour' => $row->team_hour,
                'team_salary' => $row->team_salary,
                'em_id' => $row->em_id,
                'project_id' => $row->project_id,
                'team_id' => $row->team_id
            );
        }

        return @$daRe; //ใส่ @ กันฟ้องเออเร่อ ในกรณีไม่มีทีม
    }

    public function _sel_pro_doc($proId) {
        $query = $this->db->where('project_id', $proId)
                        ->get('project_doc')->result();
        foreach ($query as $row) {
            $dataRe[] = array(
                'project_doc_name' => $row->project_doc_name,
                'project_doc_qua_dat' => $row->project_doc_qua_dat,
                'project_doc_money' => $row->project_doc_money,
                'project_doc_no' => $row->project_doc_no,
                'project_doc_path' => $row->project_doc_path,
                'project_doc_id' => $row->project_doc_id
            );
        }
        return @$dataRe;
    }

    public function _selProjectCustomer($customer_id) {
        $query = $this->db->where('customer_id', $customer_id)
                        ->get('project')->result();
        foreach ($query as $row) {
            return $row->project_id;
        }
    }

    public function _selProjectDocCustomer($selProject) {
        $query = $this->db->where('project_id', $selProject)
                        ->get('project_doc')->result();
        if (!empty($query)) {

            foreach ($query as $row) {
                $path[] = $row->project_doc_path;
            }return $path;
        }
    }

    public function _delProjectDocCustomer($selProject) {
        $this->db->where('project_id', $selProject);
        $this->db->delete('project_doc');
    }

    public function _delteam($selProject) {
        $query = $this->db->where('project_id', $selProject)
                        ->get('team')->result();
        if (!empty($query)) {
            $this->db->where('project_id', $selProject)
                    ->delete('team');
        }
    }

    public function _del_project($customerId) {
        $this->db->where('customer_id', $customerId);
        $this->db->delete('project');
    }

    public function _update_project($projectData) {
        $projectDataUpdate = array(
            'project_number' => $projectData['txtIdWorkCustomer'],
            'project_income' => $projectData['txtAssetProject'],
            'project_coast' => $projectData['txtCoastOffice'],
            'project_note' => $projectData['txtMarkProject'],
            'prject_start' => $projectData['datIntWork'],
            'project_end' => $projectData['datFinalWork'],
            'project_receip' => $projectData['datAcepeWork'],
            'project_rate' => $projectData['selRateCoast'],
            'project_coasts' => $projectData['txtRevenueAudit'],
            'project_period' => $projectData['txtInstallment'],
            'project_title' => $projectData['txtWorkTitle']
        );
        $this->db->where('project_id', $projectData['hdfProId']);
        $this->db->update('project', $projectDataUpdate);
    }

    public function _update_prodoc($docDate, $docCoast, $docNo, $filePath, $proDocId, $fileName) {
        if (empty($filePath)) {
            $dataInsertFile = array(
                'project_doc_name' => $fileName,
                'project_doc_qua_dat' => $docDate,
                'project_doc_money' => $docCoast,
                'project_doc_no' => $docNo,
            );
        } else {
            $dataInsertFile = array(
                'project_doc_name' => $fileName,
                'project_doc_qua_dat' => $docDate,
                'project_doc_money' => $docCoast,
                'project_doc_no' => $docNo,
                'project_doc_path' => $filePath,
            );
        }

        $this->db->where('project_doc_id', $proDocId);
        $this->db->update('project_doc', $dataInsertFile);
    }

    public function _del_old_prodoc_id_file($prodocID) {
        $query = $this->db->where('project_doc_id', $prodocID)
                        ->get('project_doc')->result();
        foreach ($query as $row) {
            $file = $row->project_doc_path;
        }
        if (file_exists("uploads/$file")) {
            unlink("uploads/$file");
        }
    }

    public function _delpro_cascade($proId) {
        $this->db->where('project_id', $proId);
        $this->db->delete('project');
    }

    public function _insert_team_doc($emId, $teamId, $uploadFileDocName, $proId) {
        $dataInsert = array(
            'team_doc_path' => $uploadFileDocName,
            'team_id' => $teamId, //ต้องเปลี่ยนเป็น project_id  หรือเพิ่ม project_id โยงไป
            'em_id' => $emId,
            'pro_id' => $proId
        );
        $this->db->insert('team_doc', $dataInsert);
    }

    public function _sel_team_doc($projectId) {
        $sel = $this->db->where('pro_id', $projectId)
                        ->get('team_doc')->result();
        foreach ($sel as $row) {
            $res = $row->team_doc_path;
        }
        return @$res;
    }

    public function _del_doc_team($emId, $teamId, $file, $projectId) {
        //$this->db->where('pro_id', $projectId);
        $this->db->where('team_doc_path', $file);
        $this->db->delete('team_doc');
        //$filePath = base_url("uploads/$file");
        if (file_exists("uploads/$file")) {
            unlink("uploads/$file");
        }
    }

    public function _insert_msn($data) {
        $dataInsert = array(
            'msn_date' => $data['dateSent'],
            'msn_time' => $data['timeSent'],
            'msn_text' => $data['text'],
            'msn_file' => $data['uploadFileDocName'],
            'msn_sent' => $data['sender'],
            'msn_receip' => $data['receipter'],
            'team_id' => $data['teamId'],
            'fk_project_id' => $data['fk_project_id']
        );

        $this->db->insert('msn', $dataInsert);
    }

    public function _sel_msn($emId, $teamId, $projectId) {
        /* $query = $this->db->where('team_id', $teamId)
          ->get('msn')->result(); */
        /* $this->db->select('*');
          $this->db->from('msn');
          $this->db->join('employee','employee.em_id = msn.msn_sent');
          $query = $this->db->get()->result(); */
        /* $this->db->select('*');
          $this->db->from('msn');
          $this->db->join('employee', 'employee.em_id = msn.msn_sent');
          $this->db->join('file', 'file.em_id = msn.msn_sent');
          $query = $this->db->get()->result(); */

        $this->db->join('employee', 'employee.em_id = msn.msn_sent');
        $this->db->join('file', 'file.em_id = msn.msn_sent');
        //$this->db->where('team_id', $teamId);
        $this->db->where('fk_project_id', $projectId);
        $this->db->order_by('msn_id', 'DESC');
        $query = $this->db->get('msn')->result();


        return $query;
    }

    public function _del_msn($msnId) {
        $this->db->where('msn_id', $msnId);
        $this->db->delete('msn');
    }

    public function _del_old_file_team_doc($docOldPath) {
        $this->db->where('team_doc_path', $docOldPath);
        $this->db->delete('team_doc');
    }

    public function _ems($project_id, $command) {

        $data = array(
            'project_ems' => $command
        );
        $this->db->where('project_id', $project_id);
        $this->db->update('project', $data);
    }

    public function _sel_team_doc_sms($projectId) {
        $query = $this->db->join('employee', 'employee.em_id = team_doc.em_id')
                        ->where('pro_id', $projectId)
                        ->get('team_doc')->result();
        return $query;
    }

    /* update เลือกไฟล์ที่นำแสดงใน sms2 */

    public function _set_show_teamdoc($teamDocId, $proid) {

        $data = array(
            'show' => NULL
        );

        $this->db->where('pro_id', $proid);
        $this->db->update('team_doc', $data);

        $data = array(
            'show' => "แสดง"
        );

        $this->db->where('team_doc_id', $teamDocId);
        $this->db->update('team_doc', $data);
    }

    /* selTeamDoc สำหรับ MSN V2 */

    public function _sel_team_doc2($projectId) {
        $sel = $this->db->where('pro_id', $projectId)
                        ->where('show', 'แสดง')
                        ->get('team_doc')->result();
        foreach ($sel as $row) {
            $res = $row->team_doc_path;
        }
        return @$res;
    }
    
     public function _insert_team_docV2($emId, $teamId, $uploadFileDocName, $proId, $note, $date) {
        $dataInsert = array(
            'team_doc_path' => $uploadFileDocName,
            'team_id' => $teamId, //ต้องเปลี่ยนเป็น project_id  หรือเพิ่ม project_id โยงไป
            'em_id' => $emId,
            'pro_id' => $proId,
            'note' => $note,
            'date' => $date
        );
        $this->db->insert('team_doc', $dataInsert);
    }

}
