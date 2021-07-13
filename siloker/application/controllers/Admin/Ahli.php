<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ahli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = "Keahlian";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['keahlian']      = $this->db->get('keahlian')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('keahlian/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = "Keahlian";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['keahlian']      = $this->db->get('keahlian')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keahlian/index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->db->insert(
                'keahlian',
                [
                    'nama' => $this->input->post('nama')
                ]
            );

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Bidang Usahas Added</div>'
            );
            redirect('Admin/ahli');
        }
    }


    public function edit()
    {
        $data['title'] = "Edit Keahlian";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id                           = $this->uri->rsegment(3);
        $data['keahlian']    = $this->db->get_where('keahlian', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('keahlian/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {

        $id                          = $this->input->post('id');
        $data['nama']               = $this->input->post('nama');
        $this->load->model('Mkeahlian', 'ahli');
        $this->ahli->editahli($data, array('id' => $id));
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Keahlian edited</div>'
        );
        redirect('admin/ahli');
    }

    public function delete_ahli($id)
    {
        $id                     = $this->uri->rsegment(3);
        $id_users               = $this->uri->rsegment(4);
        $this->load->model('Mkeahlian', 'ahli');
        $this->ahli->del_ahli($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Keahlian Deleted</div>'
        );
        redirect('admin/ahli');
    }
}
