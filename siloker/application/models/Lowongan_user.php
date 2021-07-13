<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lowongan_user extends CI_Model
{
    public function dataLowongan()
    {
        $sql     = "SELECT `lowongan`.*,`mitra`.`nama`
                    FROM `lowongan` JOIN `mitra` ON `lowongan`.`mitra_id` = `mitra`.`id`";
        $query     = $this->db->query($sql);
        $rows     = $query->result_array();
        return $rows;
    }
    public function del_lowongan($id)
    {
        $this->db->delete('lowongan', array('id' => $id));
    }
    public function getAhliId($id)
    {
        $sql    = "SELECT * from `lowongan` where id=$id";
        $query    = $this->db->query($sql);
        $rows    = $query->row_array();
        return $rows;
    }
    public function editlowongan($data, $where)
    {
        $this->db->update('lowongan', $data, $where);
    }
}
