<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keahlian_model extends CI_Model
{
    public function Selectkeahlian()
    {
        $sql     = "SELECT `lowongan_keahlian`.*,`keahlian`.`nama`,`lowongan`.`email`
                    FROM `lowongan_keahlian` INNER JOIN `keahlian` ON `lowongan_keahlian`.`keahlian_id` = `keahlian`.`id` 
                    INNER JOIN  `lowongan` ON `lowongan_keahlian`.`lowongan_id` = `lowongan`.`id` ORDER BY `lowongan_keahlian`.`id`";
        $query     = $this->db->query($sql);
        $rows     = $query->result_array();
        return $rows;
    }
    public function del_keahlian($id)
    {
        $this->db->delete('lowongan_keahlian', array('id' => $id));
    }
    public function getAhliId($id)
    {
        $sql    = "SELECT * from `lowongan_keahlian` where id=$id";
        $query    = $this->db->query($sql);
        $rows    = $query->row_array();
        return $rows;
    }
    public function editkeahlian($data, $where)
    {
        $this->db->update('lowongan_keahlian', $data, $where);
    }
}
