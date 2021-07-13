<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = "Mitra";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['mitra']         = $this->mitra_model->Selectmitra();
        $data['bidang_usaha']      = $this->db->get('bidang_usaha')->result_array();
        $data['sektor_usaha']      = $this->db->get('sektor_usaha')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/mitra', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = "Mitra";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['mitra']         = $this->mitra_model->Selectmitra();
        $data['bidang_usaha']      = $this->db->get('bidang_usaha')->result_array();
        $data['sektor_usaha']      = $this->db->get('sektor_usaha')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required');
        $this->form_validation->set_rules('telpon', 'Telpon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('web', 'Web', 'required');
        $this->form_validation->set_rules('bidang_usaha_id', 'Bidang', 'required');
        $this->form_validation->set_rules('sektor_usaha_id', 'Sektor', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/mitra', $data);
            $this->load->view('templates/footer');
        } else {

            $this->db->insert(
                'mitra',
                [
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'kontak' => $this->input->post('kontak'),
                    'telpon' => $this->input->post('telpon'),
                    'email' => $this->input->post('email'),
                    'web' => $this->input->post('web'),
                    'bidang_usaha_id' => $this->input->post('bidang_usaha_id'),
                    'sektor_usaha_id' => $this->input->post('sektor_usaha_id')
                ]
            );

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Mitra Added</div>'
            );
            redirect('Admin/mitra');
        }
    }
    public function edit()
    {
        $data['title'] = "Edit Mitra";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id                           = $this->uri->rsegment(3);
        $data['mitra']                = $this->db->get_where('mitra', ['id' => $id])->row_array();
        $data['bidang_usaha']         = $this->db->get('bidang_usaha')->result_array();
        $data['sektor_usaha']         = $this->db->get('sektor_usaha')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editmitra', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {

        $id                          = $this->input->post('id');
        $data['nama']               = $this->input->post('nama');
        $data['alamat']         = $this->input->post('alamat');
        $data['kontak']         = $this->input->post('kontak');
        $data['telpon']         = $this->input->post('telpon');
        $data['email']         = $this->input->post('email');
        $data['web']         = $this->input->post('web');
        $data['bidang_usaha_id']         = $this->input->post('bidang_usaha_id');
        $data['sektor_usaha_id']         = $this->input->post('sektor_usaha_id');
        $this->mitra_model->editmitra($data, array('id' => $id));
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Mitra edited</div>'
        );
        redirect('admin/mitra');
    }
    public function delete_mitra($id)
    {
        $id                     = $this->uri->rsegment(3);
        $id_users               = $this->uri->rsegment(4);
        $this->mitra_model->del_mitra($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Mitra Deleted</div>'
        );
        redirect('admin/mitra');
    }
}
