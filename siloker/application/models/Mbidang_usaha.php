<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mbidang_usaha extends CI_Model
{
   public function del_bidang($id)
   {
      $this->db->delete('bidang_usaha', array('id' => $id));
   }
   public function getAhliId($id)
   {
      $sql    = "SELECT * from `mitra` where id=$id";
      $query    = $this->db->query($sql);
      $rows    = $query->row_array();
      return $rows;
   }
   public function editbidang($data, $where)
   {
      $this->db->update('bidang_usaha', $data, $where);
   }
}
