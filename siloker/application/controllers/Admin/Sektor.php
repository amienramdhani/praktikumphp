<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sektor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = "Sektor Usaha";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['sektor_usaha']      = $this->db->get('sektor_usaha')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sektor/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = "Sektor Usaha";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['sektor_usaha']      = $this->db->get('sektor_usaha')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sektor/index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->db->insert(
                'sektor_usaha',
                [
                    'nama' => $this->input->post('nama')
                ]
            );

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Sektor Added</div>'
            );
            redirect('Admin/sektor');
        }
    }


    public function edit()
    {
        $data['title'] = "Edit Sektor Usaha";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id                           = $this->uri->rsegment(3);
        $data['sektor_usaha']    = $this->db->get_where('sektor_usaha', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sektor/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {

        $id                          = $this->input->post('id');
        $data['nama']               = $this->input->post('nama');

        $this->load->model('Msektor_usaha', 'sektor');
        $this->sektor->editsektor($data, array('id' => $id));
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Sektor edited</div>'
        );
        redirect('admin/sektor');
    }

    public function delete_sektor($id)
    {
        $id                     = $this->uri->rsegment(3);
        $id_users               = $this->uri->rsegment(4);
        $this->load->model('Msektor_usaha', 'sektor');
        $this->sektor->del_sektor($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Sektor Usaha Deleted</div>'
        );
        redirect('admin/sektor');
    }
}
