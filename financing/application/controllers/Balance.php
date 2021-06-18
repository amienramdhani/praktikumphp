<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Balance extends CI_Controller {

	public function __constructor()
	{
		parent::__constructor();
	}

	public function index()
	{
		if ($this->session->userdata('status') != "login") {
		redirect('login');
		}
		$data['balance'] = $this->m_balance->tampildata();
		$this->load->view('balance/v_balance',$data);
	}

	// public function join()
	// {
	// 	$data['balance'] = $this->m_user->jointable();
	// 	$this->load->view('user/v_join',$data);
	// }
  public function view()
	{
		$id 				               = $this->uri->rsegment(3);
		$data['view_balance']    	 = $this->m_balance->view($id) ;
		$data['list_transaksi']    = $this->m_balance->transaksi($id);
		$this->load->view('balance/v_view_balance',$data);
	}

	public function delete_balance($id)
	{
		$id 				    = $this->uri->rsegment(3);
		$id_users			    = $this->uri->rsegment(4);
		$this->m_balance->del_balance($id);
		redirect('balance/index/'.$id);
	}
	public function create()
	{
		$data['balance'] = $this->m_balance->jointable();
		$this->load->view('balance/v_create_balance',$data);
	}
	public function process()
	{
		$data['id_users'] 			= $this->input->post('id_users');
		$data['balance'] 				= $this->input->post('balance');

		$this->m_balance->add($data);
		redirect('balance');
	}
	public function edit()
	{
		$id 			= $this->uri->rsegment(3);
		$data['balance'] 	= $this->m_balance->getBal($id);
		$this->load->view('balance/v_edit_balance',$data);
	}
	public function process_edit()
	{
		$id  									= $this->input->post('id');
		$data['id_users'] 		= $this->input->post('id_users');
		$data['balance'] 			= $this->input->post('balance');
		$this->load->model('m_balance');
		$this->m_balance->editBal($data,array('id' =>$id));
		redirect('balance');
	}
}
