<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manual_model
 *
 * @author Administrator
 */
class Manual_model extends CI_Model {

    public function _add_content($data) {
        $this->db->insert('manual_list', $data);
    }

    public function _sel_manual_list() {
        $this->db->join('employee', 'employee.em_id = manual_list.writer');
        $this->db->where('cate', '1');
        $this->db->order_by('manual_list_id', 'DESC');
        $query = $this->db->get('manual_list')->result();
        return $query;
    }

    /* ลบไฟล์คู่มือ */

    public function _del_manual_list($id) {
        $this->db->where('manual_list_id', $id);
        $this->db->delete('manual_list');
    }

    public function _update_content($data, $id) {
        $this->db->where('manual_list_id', $id);
        $this->db->update('manual_list', $data);
    }

    public function _sel_max_id_content() {
        $this->db->select_max('manual_list_id');
        $query = $this->db->get('manual_list')->resut();
        foreach ($query as $row):
            return $row->manual_list_id;
        endforeach;
    }

    public function _insert_file_manual($id, $name) {
        $data = array(
            'path' => $name,
            'manual_list_id' => $id
        );
        $this->db->insert('manual_file', $id);
    }
    
    /*ส่วนคู่มือ com*/
     public function _sel_manual_list_com() {
        $this->db->join('employee', 'employee.em_id = manual_list.writer');
        $this->db->where('cate', '2');
        $this->db->order_by('manual_list_id', 'DESC');
        $query = $this->db->get('manual_list')->result();
        return $query;
    }
    
     public function _add_content_com($data) {
        $this->db->insert('manual_list', $data);
    }

}
