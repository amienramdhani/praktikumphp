<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bmi extends CI_Controller
{
    public function index()
    {
        $this->load->model('pasien_model', 'pasien1');
        $this->pasien1->id = 1;
        $this->pasien1->kode = '010001';
        $this->pasien1->nama = 'Faiz Fikri';
        $this->pasien1->tmp_lahir = 'Jakarta';
        $this->pasien1->tgl_lahir = '02 Agustus 2001';
        $this->pasien1->gender = 'L';

        $this->load->model('pasien_model', 'pasien2');
        $this->pasien2->id = 2;
        $this->pasien2->kode = '020001';
        $this->pasien2->nama = 'Pandan Wangi';
        $this->pasien2->tmp_lahir = 'Cirebon';
        $this->pasien2->tgl_lahir = '02 Juli 2001';
        $this->pasien2->gender = 'P';

        $this->load->model('pasien_model', 'pasien3');
        $this->pasien3->id = 3;
        $this->pasien3->kode = '030001';
        $this->pasien3->nama = 'Wahyu gunawan';
        $this->pasien3->tmp_lahir = 'Riau';
        $this->pasien3->tgl_lahir = '09 Juli 2001';
        $this->pasien3->gender = 'L ';

        $this->load->model('bmi_model', 'bmi1');
        $this->bmi1->berat  = 37;
        $this->bmi1->tinggi = 150;
        $this->bmi1->nilaiBMI();
        $this->bmi1->statusBMI();

        $this->load->model('bmi_model', 'bmi2');
        $this->bmi2->berat  = 47;
        $this->bmi2->tinggi = 155;
        $this->bmi2->nilaiBMI();
        $this->bmi2->statusBMI();

        $this->load->model('bmi_model', 'bmi3');
        $this->bmi3->berat  = 47;
        $this->bmi3->tinggi = 160;
        $this->bmi3->nilaiBMI();
        $this->bmi3->statusBMI();

        $this->load->model('bmipasien_model', 'bmipasien1');
        $this->bmipasien1->id = 1;
        $this->bmipasien1->tanggal = '2021-05-12';
        $this->bmipasien1->pasien = [
            $this->pasien1->kode,
            $this->pasien1->nama, $this->pasien1->gender
        ];
        $this->bmipasien1->bmi = [
            $this->bmi1->berat,
            $this->bmi1->tinggi,
            $this->bmi1->nilaiBMI(),
            $this->bmi1->statusBMI()
        ];

        $this->load->model('bmipasien_model', 'bmipasien2');
        $this->bmipasien2->id = 2;
        $this->bmipasien2->tanggal = '2021-05-12';
        $this->bmipasien2->pasien = [
            $this->pasien2->kode,
            $this->pasien2->nama, $this->pasien2->gender
        ];
        $this->bmipasien2->bmi = [
            $this->bmi2->berat,
            $this->bmi2->tinggi,
            $this->bmi2->nilaiBMI(),
            $this->bmi2->statusBMI()
        ];

        // $list_pasien = [$this->pasien1, $this->pasien2, $this->pasien3];
        // $data['list_pasien'] = $list_pasien;
        // $list_bmi = [$this->bmi1, $this->bmi2, $this->bmi3];
        // $data['list_bmi'] = $list_bmi;
        $list_bmipasien = [$this->bmipasien1, $this->bmipasien2];
        $data['list_bmipasien'] = $list_bmipasien;

        // $this->load->view('header');
        $this->load->view('pasien/index', $data);
        // $this->load->view('footer');
    }
}
