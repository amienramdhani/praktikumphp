<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller
{
  public function __constructor()
	{
		parent::__constructor();
	}
  
	public function index()
	{
		$data['transfer'] = $this->m_transaksi->tampildata();
		$this->load->view('transaction/v_trans',$data);
	}
  public function create()
  {
    if ($this->session->userdata('status') != "login") {
			redirect('login');
		}
    $data['transfer'] = $this->m_user->tampilkanuser();
    $this->load->view('transfer/v_add_tf',$data);

  }
  public function process()
  {
    $data ['id_users_from']	  	   = $this->input->post('id_users_from');
    $data ['id_users_to']	  	     = $this->input->post('id_users_to');
    $data ['amount']			         = $this->input->post('amount');
    $data ['note']				         = $this->input->post('note');

    $amount                        = $this->input->post('amount');

    if ($data['id_users_from'] == $data['id_users_to']) {

			echo "Pengirim Tidak boleh mengirim ke pengirim juga :)";

		}else{
			$saldoto   = $this->m_balance->getBalance($data['id_users_to']);
			$saldofrom = $this->m_balance->getBalance($data['id_users_from']);

			if ($saldofrom['balance'] < $amount) {

				echo "Saldo Pengirim tidak cukup";

			} else {

				$balanceto['balance']   = $saldoto['balance'] + $amount;
				$balancefrom['balance'] = $saldofrom['balance'] - $amount*-1;

				$this->m_transfer->add($data);

				$this->m_balance->editBal($balanceto,array('id_users' =>$data['id_users_to']));
				$this->m_balance->editBal($balancefrom,array('id_users' =>$data['id_users_from']));
        redirect('transfer/create');
		  }
    }
  }
}
