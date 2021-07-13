<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpeminat_lowongan extends CI_Model
{
   public function Selectpeminat()
   {
      $sql     = "SELECT `peminat_lowongan`.*,`prodi`.`nama` AS `prodi`,`lowongan`.`deskripsi_pekerjaan`
                    FROM `peminat_lowongan` INNER JOIN `prodi` ON `peminat_lowongan`.`prodi_id` = `prodi`.`id` 
                    INNER JOIN  `lowongan` ON `peminat_lowongan`.`lowongan_id` = `lowongan`.`id` 
                    ORDER BY `peminat_lowongan`.`id`";
      $query     = $this->db->query($sql);
      $rows     = $query->result_array();
      return $rows;
   }
   public function del_peminat($id)
   {
      $this->db->delete('peminat_lowongan', array('id' => $id));
   }
   public function getAhliId($id)
   {
      $sql    = "SELECT * from `peminat_lowongan` where id=$id";
      $query    = $this->db->query($sql);
      $rows    = $query->row_array();
      return $rows;
   }
   public function editpeminat($data, $where)
   {
      $this->db->update('peminat_lowongan', $data, $where);
   }
}
