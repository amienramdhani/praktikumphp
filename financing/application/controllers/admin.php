<?php

class admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') != "login") {

    redirect('login');
    }
  }

  public function index()
  {
    $this->load->view('v_admin');
  }
}
