<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lowongan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title']      = "Lowongan kerja";
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['lowongan']   = $this->lowongan_user->dataLowongan();
        $data['mitra']      = $this->db->get('mitra')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('lowongan/index', $data);
        $this->load->view('templates/footer');
    }
    public function addNow()
    {
        $data['title']          = "Form Lamaran Kerja";
        $data['user']           = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lowongan']   = $this->lowongan_user->dataLowongan();
        $data['mitra'] = $this->db->get('mitra')->result_array();

        $this->form_validation->set_rules('deskripsi_pekerjaan', 'Desk', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal', 'required');
        $this->form_validation->set_rules('mitra_id', 'Mitra', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lowongan/index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->db->insert(
                'lowongan',
                [
                    'deskripsi_pekerjaan'  => $this->input->post('deskripsi_pekerjaan'),
                    'tanggal_akhir' => $this->input->post('tanggal_akhir'),
                    'mitra_id' => $this->input->post('mitra_id'),
                    'email' => $this->input->post('email')
                ]
            );

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Lowongan Submitted</div>'
            );
            redirect('admin/lowongan');
        }
    }
    public function edit()
    {
        $data['title'] = "Edit Lowongan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id                           = $this->uri->rsegment(3);
        $data['lowongan']    = $this->db->get_where('lowongan', ['id' => $id])->row_array();
        $data['mitra']             = $this->db->get('mitra')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('lowongan/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {

        $id                          = $this->input->post('id');
        $data['deskripsi_pekerjaan']         = $this->input->post('deskripsi_pekerjaan');
        $data['tanggal_akhir']         = $this->input->post('tanggal_akhir');
        $data['mitra_id']         = $this->input->post('mitra_id');
        $data['email']         = $this->input->post('email');
        $this->lowongan_user->editlowongan($data, array('id' => $id));
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Lowongan edited</div>'
        );
        redirect('admin/lowongan');
    }
}
