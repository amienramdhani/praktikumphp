<?php
require_once "class_bmipasien.php";
$pasien = new Pasien($_POST['nama'], $_POST['berat'], $_POST['tinggi'], $_POST['umur'], $_POST['jk']);
$ar_pasien = array();
array_push($ar_pasien, $pasien);

?>

<!-- <h3>Output Form</h3>
<table>
    <h4>Hasil Evaluasi BMI</h4>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $pasien->nama ?></td>
    </tr>
    <tr>
        <td>Berat</td>
        <td>:</td>
        <td><?= $pasien->berat ?></td>
    </tr>
    <tr>
        <td>Tinggi</td>
        <td>:</td>
        <td><?= $pasien->tinggi ?></td>
    </tr>
    <tr>
        <td>Umur</td>
        <td>:</td>
        <td><?= $pasien->umur ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?= $pasien->jenis_kelamin ?></td>
    </tr>
</table> -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data BMI</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1 align="center">Tabel Data BMI</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Berat Badan</th>
                    <th scope="col">Tinggi Badan</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">BMI</th>
                    <th scope="col">Hasil</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                foreach ($ar_pasien as $data) {
                ?>
                    <tr>
                        <td><?= $nomor++; ?></td>
                        <td><?= $data->nama; ?></td>
                        <td><?= $data->berat; ?></td>
                        <td><?= $data->tinggi; ?></td>
                        <td><?= $data->umur; ?></td>
                        <td><?= $data->jenis_kelamin; ?></td>
                        <td><?= $data->hasilBMI() ?></td>
                        <td><?= $data->StatusBMI() ?></td>
                    </tr>
                <?php
                }
                ?>
                <tr><a href="formBmi.php">Isi Form lagi</a></tr>
            </tbody>