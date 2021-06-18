<?php

class m_transfer extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function tampildata()
	{
		$sql 	= "SELECT a.id,a.id_users_from,a.id_users_from,a.amount,a.note,b.name,b.id_users,b.id from transfer a INNER JOIN users b ON a.id_users = b.id ";
		$query 	= $this->db->query($sql);
		$rows 	= $query->result_array();
		return $rows;
	}
	public function add($data)
	{
		//'users' adalah nama database nya
		//$data adalah parameter yang sama dengan controller
		$this->db->insert('transfer',$data);
	}
	public function getBalance($id)
	{
		$sql	= "SELECT * from balance ";
		$query	= $this->db->query($sql);
		$rows	= $query->row_array();
		return $rows;
	}
}
