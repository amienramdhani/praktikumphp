<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <form method="post" action="form_post.php">
            <h3>Belanja Online</h3>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label style="font-weight: bolder;" for="customer">Customer</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Customer" value="" />
                    </div>

                    <label style="font-weight: bolder; padding-right: 20px;" for="customer">Pilih Produk</label>
                    <div class="form-check-inline px-5">
                        <input type="radio" name="produk" class="form-check-input mr-3" value="tv"> TV
                        <input type="radio" name="produk" class="form-check-input mr-3" value="kulkas"> Kulkas
                        <input type="radio" name="produk" class="form-check-input mr-3" value="mesin"> Mesin Cuci

                    </div>
                    <div class="form-group mt-2">
                        <label style="font-weight: bolder;" for="customer">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="jumlah" value="" />
                    </div>
                    <div class="form-group mt-4">
                        <input type="submit" name="submit" class="btn btn-success" value="submit" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container">
                        <table class="table">
                            <tr class="bg-primary">
                                <th style="color: white;">Daftar harga</th>
                            </tr>
                            <tr>
                                <td>TV : 4.200.000</td>
                            </tr>
                            <tr>
                                <td>Kulkas : 3.100.000</td>
                            </tr>
                            <tr>
                                <td>Mesin Cuci : 3.800.000</td>
                            </tr>
                            <tr class="bg-primary">
                                <th style="color: white;">Harga Dapat Berubah Setiap Saat</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    $submit = $_POST['submit'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    if (isset($_POST['produk'])) {

        $produk = $_POST['produk'];
        if ($produk == 'tv') {
            $harga = 4200000 * $jumlah;
        } elseif ($produk == 'kulkas') {
            $harga = 3100000 * $jumlah;
        } elseif ($produk == 'mesin') {
            $harga = 3800000 * $jumlah;
        }
    }
    ?>
    <div class="container">
        <table>
            <tr>
                <th>Nama Customer : </th>
                <td><?= $nama; ?></td>
            </tr>
            <tr>
                <th>Produk Pilihan : </th>
                <td><?= $produk; ?></td>
            </tr>
            <tr>
                <th>Jumlah Beli : </th>
                <td><?= $jumlah; ?></td>
            </tr>
            <tr>
                <th>Total Belanja : </th>
                <td>Rp.<?= number_format($harga, 2, ',', '.'); ?></td>
            </tr>
        </table>
    </div>
</body>

</html>