<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra_model extends CI_Model
{
    public function Selectmitra()
    {
        $sql     = "SELECT `mitra`.*,`bidang_usaha`.`nama` AS `Bidang_usaha`,`sektor_usaha`.`nama` AS `Sektor_usaha`
                    FROM `mitra` INNER JOIN `bidang_usaha` ON `mitra`.`bidang_usaha_id` = `bidang_usaha`.`id` 
                    INNER JOIN  `sektor_usaha` ON `mitra`.`sektor_usaha_id` = `sektor_usaha`.`id` ORDER BY `mitra`.`id`";
        $query     = $this->db->query($sql);
        $rows     = $query->result_array();
        return $rows;
    }
    public function del_mitra($id)
    {
        $this->db->delete('mitra', array('id' => $id));
    }
    public function getAhliId($id)
    {
        $sql    = "SELECT * from `mitra` where id=$id";
        $query    = $this->db->query($sql);
        $rows    = $query->row_array();
        return $rows;
    }
    public function editmitra($data, $where)
    {
        $this->db->update('mitra', $data, $where);
    }
}
