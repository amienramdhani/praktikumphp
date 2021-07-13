<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mprodi extends CI_Model
{
   public function del_prodi($id)
   {
      $this->db->delete('prodi', array('id' => $id));
   }
   public function getAhliId($id)
   {
      $sql    = "SELECT * from `mitra` where id=$id";
      $query    = $this->db->query($sql);
      $rows    = $query->row_array();
      return $rows;
   }
   public function editprodi($data, $where)
   {
      $this->db->update('prodi', $data, $where);
   }
}
