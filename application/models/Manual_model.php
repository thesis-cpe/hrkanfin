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
    public function _add_content($data){
        $this->db->insert('manual_list',$data);
    }
}
