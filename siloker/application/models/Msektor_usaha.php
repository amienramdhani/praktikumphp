<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Msektor_usaha extends CI_Model
{
   public function del_sektor($id)
   {
      $this->db->delete('sektor_usaha', array('id' => $id));
   }
   public function getAhliId($id)
   {
      $sql    = "SELECT * from `mitra` where id=$id";
      $query    = $this->db->query($sql);
      $rows    = $query->row_array();
      return $rows;
   }
   public function editsektor($data, $where)
   {
      $this->db->update('sektor_usaha', $data, $where);
   }
}
