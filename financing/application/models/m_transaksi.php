<?php

class m_transaksi extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function tampildata()
	{
		$sql 	= "SELECT a.id,a.id_users,a.status,a.amount,a.created_date,a.updated_date,b.name from transaction a INNER JOIN users b ON a.id_users = b.id ";
		$query 	= $this->db->query($sql);
		$rows 	= $query->result_array();
		return $rows;
	}
	// public function jointable()
	// {
	// 	$sql	= "SELECT a.name,a.id from users a";
	// 	$query	= $this->db->query($sql);
	// 	$rows	= $query->result_array();
	// 	return $rows;
	// }
	public function view($id)
	{
		$sql	= "SELECT a.id_users,a.status,a.amount,a.created_date,a.updated_date,
						b.id,b.name,b.address,b.gender from transaction a INNER JOIN users b ON a.id_users = b.id where a.id=$id";
		$query	= $this->db->query($sql);
		$rows	= $query->row_array();
		return $rows;
	}
	public function balance()
	{
		$sql	= "SELECT a.balance from balance a ";
		$query	= $this->db->query($sql);
		$rows	= $query->row_array();
		return $rows;
	}

	public function del_transaksi($id)
	{
		$this->db->delete('transaction',array('id' =>$id ));
	}
	public function add($data)
	{
		//'users' adalah nama database nya
		//$data adalah parameter yang sama dengan controller
		$this->db->insert('transaction',$data);
	}
	public function getTrans($id)
	{
		$sql	= "SELECT * from transaction where id=$id";
		$query	= $this->db->query($sql);
		$rows	= $query->row_array();
		return $rows;
	}
	public function editTrans($data,$where)
	{
		$this->db->UPDATE('transaction', $data, $where);
	}

}
