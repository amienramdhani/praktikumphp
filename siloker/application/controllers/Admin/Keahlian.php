<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keahlian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = "Lowongan Keahlian";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['lowongan_keahlian']   = $this->keahlian_model->Selectkeahlian();
        $data['keahlian']      = $this->db->get('keahlian')->result_array();
        $data['lowongan']      = $this->db->get('lowongan')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/keahlian', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = "Keahlian";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['lowongan_keahlian']      = $this->keahlian_model->Selectkeahlian();
        $data['keahlian']      = $this->db->get('keahlian')->result_array();
        $data['lowongan']      = $this->db->get('lowongan')->result_array();

        $this->form_validation->set_rules('keahlian_id', 'Keahlian', 'required');
        $this->form_validation->set_rules('lowongan_id', 'Lowongan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/keahlian', $data);
            $this->load->view('templates/footer');
        } else {

            $this->db->insert(
                'lowongan_keahlian',
                [
                    'keahlian_id' => $this->input->post('keahlian_id'),
                    'lowongan_id' => $this->input->post('lowongan_id')
                ]
            );

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Lowongan Keahlian Added</div>'
            );
            redirect('Admin/Keahlian');
        }
    }

    public function edit()
    {
        $data['title'] = "Edit Lowongan Keahlian";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id                           = $this->uri->rsegment(3);
        $data['lowongan_keahlian']    = $this->db->get_where('lowongan_keahlian', ['id' => $id])->row_array();
        $data['keahlian']             = $this->db->get('keahlian')->result_array();
        $data['lowongan']             = $this->db->get('lowongan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editkeahlian', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {

        $id                          = $this->input->post('id');
        $data['keahlian_id']         = $this->input->post('keahlian_id');
        $data['lowongan_id']         = $this->input->post('lowongan_id');
        $this->keahlian_model->editkeahlian($data, array('id' => $id));
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Keahlian edited</div>'
        );
        redirect('admin/keahlian');
    }
    public function delete_keahlian($id)
    {
        $id                     = $this->uri->rsegment(3);
        $id_users               = $this->uri->rsegment(4);
        $this->keahlian_model->del_keahlian($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">keahlian Deleted</div>'
        );
        redirect('admin/keahlian');
    }
}
