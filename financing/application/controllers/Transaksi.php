<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __constructor()
	{
		parent::__constructor();
	}

	public function index()
	{
		if ($this->session->userdata('status') != "login") {
			redirect('login');
		}
		$data['transaksi'] = $this->m_transaksi->tampildata();
		$this->load->view('transaction/v_trans',$data);
	}

	// public function join()
	// {
	// 	$data['balance'] = $this->m_user->jointable();
	// 	$this->load->view('user/v_join',$data);
	// }
	public function view()
	{
		$id 				    						= $this->uri->rsegment(3);
		$data['view_transaksi']   	= $this->m_transaksi->view($id);
		$data['balance']  				 	= $this->m_transaksi->balance();
		$this->load->view('transaction/v_view_transaction',$data);
	}

	public function delete_transaksi($id)
	{
		$id 				    = $this->uri->rsegment(3);
		$id_users			    = $this->uri->rsegment(4);
		$this->m_user->del_transaksi($id);
		redirect('transaksi/index/'.$id);
	}
	public function create()
	{
		$data['transaksi'] = $this->m_user->tampilkanuser();
		$this->load->view('transaction/v_create_trans',$data);

	}
	public function process()
	{
		$data['id_users'] 			= $this->input->post('id_users');
		$data['status'] 				= $this->input->post('status');

		if ($data['status'] =='OUT') {
			$amount = $this->input->post('amount')*-1;
		}else {
			$amount = $this->input->post('amount');
		}
		$data['amount'] 		= $amount;
		$saldo = $this->m_balance->getBalance($data['id_users']);
		$balance['balance'] = $saldo['balance'] + $amount;

		if ($balance['balance'] < 0) {
			echo"Saldo Anda Tidak Cukup";

		}else{
		$this->m_transaksi->add($data);

		//cek saldo saat ini

		$saldo = $this->m_balance->getBalance($data['id_users']);
		$balance['balance'] = $saldo['balance'] + $amount;
		$balance['updated_date'] = date('Y-m-d H:i:s');
		$this->m_balance->editBal($balance,array('id_users'=>$data['id_users']));
		redirect('transaksi');
		}
	}
	function edit(){
		$id 		  = $this->uri->rsegment(3);
		$this->load->model('m_transaksi');
		$data['trans'] = $this->m_transaksi->getTrans($id);
		$this->load->view('transaction/v_edit_transaksi', $data);
	}
	function process_edit()
	{
		$id  									= $this->input->post('id');
		$data['id_users'] 		= $this->input->post('id_users');
		$data['status'] 			= $this->input->post('status');
		$data['amount'] 			= $this->input->post('amount');
		$data ['updated_date'] = $this->input->post('updated_date');
		// $this->load->model('m_transaksi');
		$this->m_transaksi->editTrans($data,array('id' =>$id));
		redirect('transaksi');
	}
}
