<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form BMI</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="card bg-light mt-5">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h2 class="card-title mt-3 text-center">Form Isian Indeks Masa Tubuh (BMI)</h2>
                <form action="data_pasien.php" method="POST" name="form-input-data">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="nama" class="form-control" placeholder="Nama Lengkap" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-anchor"></i> </span>
                        </div>
                        <input name="berat" class="form-control" placeholder="Berat Badan" type="number" min="0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Kg </span>
                        </div>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-child"></i> </span>
                        </div>
                        <input name="tinggi" class="form-control" placeholder="Tinggi Badan" type="number" min="0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Cm </span>
                        </div>
                    </div> <!-- akhir div -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-birthday-cake"></i> </span>
                        </div>
                        <input name="umur" class="form-control" placeholder="Umur" type="number" min="0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Thn </span>
                        </div>
                    </div> <!-- akhir div -->
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-venus-mars"></i> </span>
                        <div class="form-check form-check-inline ml-2 ">
                            <input class="form-check-input" type="radio" name="jk" value="laki-laki">
                            <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" value="perempuan">
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" name="Submit" value="Submit" class="btn btn-primary btn-block">
                    </div> <!-- form-group// -->
                </form>
            </article>
        </div> <!-- card.// -->
    </div>
    <!--container end.//-->
</body>

</html>