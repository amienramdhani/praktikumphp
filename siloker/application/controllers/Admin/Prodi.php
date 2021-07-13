<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = "Prodi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['prodi']      = $this->db->get('prodi')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('prodi/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = "Prodi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['prodi']      = $this->db->get('prodi')->result_array();

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('prodi/index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->db->insert(
                'prodi',
                [
                    'kode' => $this->input->post('kode'),
                    'nama' => $this->input->post('nama')
                ]
            );

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Prodi Added</div>'
            );
            redirect('Admin/prodi');
        }
    }


    public function edit()
    {
        $data['title'] = "Edit Prodi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id                           = $this->uri->rsegment(3);
        $data['prodi']    = $this->db->get_where('prodi', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('prodi/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {

        $id                          = $this->input->post('id');
        $data['kode']               = $this->input->post('kode');
        $data['nama']               = $this->input->post('nama');

        $this->load->model('Mprodi', 'prodi');
        $this->prodi->editprodi($data, array('id' => $id));
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Prodi edited</div>'
        );
        redirect('admin/prodi');
    }

    public function delete_prodi($id)
    {
        $id                     = $this->uri->rsegment(3);
        $id_users               = $this->uri->rsegment(4);
        $this->load->model('Mprodi', 'prodi');
        $this->prodi->del_prodi($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Prodi Deleted</div>'
        );
        redirect('admin/prodi');
    }
}
