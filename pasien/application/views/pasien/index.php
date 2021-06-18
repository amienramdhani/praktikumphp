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
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Tinggi</th>
                    <th scope="col">BMI</th>
                    <th scope="col">Hasil BMI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                foreach ($list_bmipasien as $bmipasien) {
                ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $bmipasien->tanggal ?></td>
                        <td><?= $bmipasien->pasien[0]; ?></td>
                        <td><?= $bmipasien->pasien[1]; ?></td>
                        <td><?= $bmipasien->pasien[2]; ?></td>
                        <td><?= $bmipasien->bmi[0]; ?></td>
                        <td><?= $bmipasien->bmi[1]; ?></td>
                        <td><?= $bmipasien->bmi[2]; ?></td>
                        <td><?= $bmipasien->bmi[3]; ?></td>
                    <?php
                    $nomor++;
                }
                    ?>
                    </tr>
            </tbody>
        </table>
    </div>