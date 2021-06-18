<?php

class m_balance extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function tampildata()
	{
		$sql 	= "SELECT a.id,a.id_users,a.balance,b.name,b.address,b.gender from balance a INNER JOIN users b ON a.id_users = b.id ";
		$query 	= $this->db->query($sql);
		$rows 	= $query->result_array();
		return $rows;
	}
	public function jointable()
	{
		$sql	= "SELECT a.id,a.nik,a.name FROM users a LEFT JOIN balance b ON a.id = b.id_users WHERE b.id_users IS null";
		$query	= $this->db->query($sql);
		$rows	= $query->result_array();
		return $rows;
	}
  public function view($id)
  {
    $sql	= "SELECT a.id,a.id_users,a.balance,b.name,b.address,b.gender from balance a INNER JOIN users b ON a.id_users = b.id where a.id =$id";
    $query	= $this->db->query($sql);
    $rows	= $query->row_array();
    return $rows;
  }

  public function transaksi($id)
  {
    $sql 	= "select * from transaction where id_users = $id";
    $query 	= $this->db->query($sql);
    $rows 	= $query->result_array();
    return $rows;
  }

	public function del_balance($id)
	{
		$this->db->delete('balance',array('id' =>$id ));
	}
	public function add($data)
	{
		//'users' adalah nama database nya
		//$data adalah parameter yang sama dengan controller
		$this->db->insert('balance',$data);
	}
	public function getBal($id)
	{
		$sql	= "SELECT * from balance where id=$id";
		$query	= $this->db->query($sql);
		$rows	= $query->row_array();
		return $rows;
	}
	public function editBal($data,$where)
	{
		$this->db->update('balance', $data, $where);
	}
	public function getBalance($id)
	{
		$sql	= "SELECT * from balance ";
		$query	= $this->db->query($sql);
		$rows	= $query->row_array();
		return $rows;
	}


}
