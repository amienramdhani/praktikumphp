<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __constructor()
	{
		parent::__constructor();
}

	public function index()
	{
		if ($this->session->userdata('status') != "login") {
			redirect('login');
		}
		$data['user'] = $this->m_user->tampilkanuser();
		$this->load->view('user/v_user',$data);
	}


	public function join()
	{
		$data['balance'] = $this->m_user->jointable();
		$this->load->view('user/v_join',$data);
	}
	public function view()
	{
		$id 				    = $this->uri->rsegment(3);
		$data['view_user']   	= $this->m_user->view($id) ;
		$data['list_transaksi'] = $this->m_user->transaksi($id);
		$this->load->view('user/v_view_user',$data);
	}

	public function delete_transaksi($id)
	{
		$id 				    = $this->uri->rsegment(3);
		$id_users			    = $this->uri->rsegment(4);
		$this->m_user->del_transaksi($id);
		redirect('user/view/'.$id_users);
	}
	public function delete_user($id)
	{
		$id 				    = $this->uri->rsegment(3);
		$id_users			    = $this->uri->rsegment(4);
		$this->m_user->del_users($id);
		redirect('user/index/'.$id);
	}
	public function create()
	{
		$this->load->view('user/v_create_view');
	}
	public function process()
	{
		$data['name'] 		= $this->input->post('name');
		$data['nik'] 		= $this->input->post('nik');
		$data['address'] 	= $this->input->post('address');
		$data['gender'] 	= $this->input->post('gender');
		$data['role'] 		= $this->input->post('role');

		$this->m_user->add($data);
		redirect('user');
	}
	public function edit()
	{
		$id 			= $this->uri->rsegment(3);
		$data['user'] 	= $this->m_user->getUser($id);
		$this->load->view('user/v_edit_user',$data);
	}
	public function process_edit()
	{
		$id  				= $this->input->post('id');
		$data['name'] 		= $this->input->post('name');
		$data['nik'] 		= $this->input->post('nik');
		$data['address'] 	= $this->input->post('address');
		$data['gender'] 	= $this->input->post('gender');
		$data['role'] 		= $this->input->post('role');

		$this->m_user->edituser($data,array('id' =>$id));
		redirect('user');
	}
}
