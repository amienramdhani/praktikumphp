<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminat_lowongan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = "Peminat Lowongan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Mpeminat_lowongan', 'peminat');
        $data['peminat_lowongan']  = $this->peminat->Selectpeminat();
        $data['prodi']      = $this->db->get('prodi')->result_array();
        $data['lowongan']      = $this->db->get('lowongan')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminat_lowongan/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = "Peminat Lowongan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Mpeminat_lowongan', 'peminat');
        $data['peminat_lowongan']  = $this->peminat->Selectpeminat();
        $data['prodi']      = $this->db->get('prodi')->result_array();
        $data['lowongan']      = $this->db->get('lowongan')->result_array();

        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required');
        $this->form_validation->set_rules('prodi_id', 'Prodi', 'required');
        $this->form_validation->set_rules('lowongan_id', 'Lowongan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peminat_lowongan/index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->db->insert(
                'peminat_lowongan',
                [
                    'nim' => $this->input->post('nim'),
                    'nama' => $this->input->post('nama'),
                    'alasan' => $this->input->post('alasan'),
                    'prodi_id' => $this->input->post('prodi_id'),
                    'lowongan_id' => $this->input->post('lowongan_id'),
                ]
            );

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Peminat Added</div>'
            );
            redirect('Admin/peminat_lowongan');
        }
    }
    public function edit()
    {
        $data['title'] = "Edit Peminat Lowongan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id                           = $this->uri->rsegment(3);
        $data['peminat_lowongan']     = $this->db->get_where('peminat_lowongan', ['id' => $id])->row_array();
        $data['prodi']                = $this->db->get('prodi')->result_array();
        $data['lowongan']             = $this->db->get('lowongan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminat_lowongan/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {

        $id                          = $this->input->post('id');
        $data['nim']               = $this->input->post('nim');
        $data['nama']         = $this->input->post('nama');
        $data['alasan']         = $this->input->post('alasan');
        $data['prodi_id']         = $this->input->post('prodi_id');
        $data['lowongan_id']         = $this->input->post('lowongan_id');
        $this->load->model('Mpeminat_lowongan', 'peminat');
        $this->peminat->editpeminat($data, array('id' => $id));
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Peminat edited</div>'
        );
        redirect('admin/peminat_lowongan');
    }
    public function delete_peminat($id)
    {
        $id                     = $this->uri->rsegment(3);
        $id_users               = $this->uri->rsegment(4);
        $this->load->model('Mpeminat_lowongan', 'peminat');
        $this->peminat->del_peminat($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Peminat Deleted</div>'
        );
        redirect('admin/peminat_lowongan');
    }
}
