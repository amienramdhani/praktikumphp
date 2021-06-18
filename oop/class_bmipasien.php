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
    public function StatusBMI()
    {
        $jumlah =  $this->berat / ($this->tinggi / 100);
        if ($jumlah < 18.5) {
            return 'Kekurangan Berat Badan';
        } elseif ($jumlah < 24.9) {
            return 'Normal (ideal)';
        } elseif ($jumlah < 29.9) {
            return 'Kelebihan Berat Badan';
        } elseif ($jumlah > 30) {
            return 'Kegemukan(Obesitas)';
        }
    }
    public function hasilBMI()
    {
        $jumlah =  $this->berat / ($this->tinggi / 100);
        return $jumlah;
    }
}
