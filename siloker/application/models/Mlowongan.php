<?php
class Mlowongan extends CI_Model
{
   // ... kode sebelumnya
   public function getAll()
   {
      // select * from pasien
      $query = $this->db->get('lowongan');
      return $query;
   }
   public function getLowongan()
   {
      $query = "SELECT `lowongan`.*,`mitra`.`nama`
       FROM `lowongan` JOIN `mitra` ON `lowongan`.`mitra_id` = `mitra`.`id`";
      return $this->db->query($query)->result_array();
   }
   public function findById($id)
   {
      // select * from pasien where id=$id
      $query = $this->db->get_where('lowongan', ['id' => $id]);
      return $query->row();
   }

   public function simpan($data)
   {

      $sql = "INSERT INTO lowongan (deskripsi_pekerjaan, tanggal_akhir, mitra_id, email) VALUES (?,?,?,?)";
      $this->db->query($sql, $data);
   }
   public function update($data)
   {

      $sql = "UPDATE lowongan SET deskripsi_pekerjaan=?, tanggal_akhir=?, mitra_id=?, email=? WHERE id=?";
      $this->db->query($sql, $data);
   }

   public function delete($data)
   {

      $sql = "DELETE FROM lowongan WHERE id=?";
      $this->db->query($sql, $data);
   }
}
