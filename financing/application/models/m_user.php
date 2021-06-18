<?php

/**
 *
 */
class m_user extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function tampilkanuser()
	{
		$sql 	= "select * from users";
		$query 	= $this->db->query($sql);
		$rows 	= $query->result_array();
		return $rows;
	}
	public function jointable()
	{
		$sql	= "SELECT a.name,a.address,b.balance from users a INNER JOIN balance b ON a.id = b.id_users";
		$query	= $this->db->query($sql);
		$rows	= $query->result_array();
		return $rows;
	}
	public function view($id)
	{
		$sql	= "SELECT a.id,a.name,a.address,a.gender,b.balance from users a INNER JOIN balance b ON a.id = b.id_users where a.id=$id";
		$query	= $this->db->query($sql);
		$rows	= $query->row_array();
		return $rows;
	}

	public function transaksi($id)
	{
		$sql 	= "select * from transaction where id_users=$id";
		$query 	= $this->db->query($sql);
		$rows 	= $query->result_array();
		return $rows;
	}
	public function del_transaksi($id)
	{
		$this->db->delete('transaction',array('id' =>$id ));
	}
		public function del_users($id)
	{
		$this->db->delete('users',array('id' =>$id ));
	}
	public function add($data)
	{
		//'users' adalah nama database nya
		//$data adalah parameter yang sama dengan controller
		$this->db->insert('users',$data);
	}
	public function getUser($id)
	{
		$sql	= "SELECT * from users where id=$id";
		$query	= $this->db->query($sql);
		$rows	= $query->row_array();
		return $rows;
	}
	public function edituser($data,$where)
	{
		$this->db->update('users', $data, $where);
	}
}
