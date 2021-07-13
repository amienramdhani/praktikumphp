<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mkeahlian extends CI_Model
{
   public function del_ahli($id)
   {
      $this->db->delete('keahlian', array('id' => $id));
   }
   public function editahli($data, $where)
   {
      $this->db->update('keahlian', $data, $where);
   }
}
