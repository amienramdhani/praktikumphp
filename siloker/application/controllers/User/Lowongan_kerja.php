<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lowongan_kerja extends CI_Controller
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
        $this->load->view('user/lowongan', $data);
        $this->load->view('templates/footer');
    }
    public function addNow()
    {
        $data['title']      = "Form Lamaran Kerja";
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['lowongan']   = $this->lowongan_user->dataLowongan();
        $data['mitra'] = $this->db->get('mitra')->result_array();
        $data['prodi'] = $this->db->get('prodi')->result_array();

        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('prodi_id', 'Prodi_id', 'required');
        $this->form_validation->set_rules('lowongan_id', 'Lowongan_id', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/add_lowongan', $data);
            $this->load->view('templates/footer');
        } else {

            $this->db->insert(
                'peminat_lowongan',
                [
                    'nim'  => $this->input->post('nim'),
                    'nama' => $this->input->post('nama'),
                    'alasan' => $this->input->post('alasan'),
                    'prodi_id' => $this->input->post('prodi_id'),
                    'lowongan_id' => $this->input->post('lowongan_id')
                ]
            );

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Lowongan Submitted</div>'
            );
            redirect('User/lowongan_kerja');
        }
    }
}
