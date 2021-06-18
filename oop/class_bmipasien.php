<?php
class Pasien
{
    public $nama;
    public $berat;
    public $tinggi;
    public $umur;
    public $jenis_kelamin;

    public function __construct($_nama, $_berat, $_tinggi, $_umur, $jk)
    {
        $this->nama = $_nama;
        $this->berat = $_berat;
        $this->tinggi = $_tinggi;
        $this->umur = $_umur;
        $this->jenis_kelamin = $jk;
    }
    public function hasilBMI()
    {
        return $this->nama;
        $this->berat;
        $this->tinggi;
        $this->umur;
        $this->jenis_kelamin;
    }
}
