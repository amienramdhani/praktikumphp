<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Mahasiswa</title>
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
                <h2 class="card-title mt-3 text-center">Form Nilai Mahasiswa</h2>
                <form action="aksi.php" method="POST" name="form-input-data">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="nama" class="form-control" placeholder="Nama Lengkap" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-book"></i> </span>
                        </div>
                        <select class="form-control" name="matkul">
                            <option> -- Mata Kuliah --</option>
                            <option value="DDP">Dasar-Dasar Pemograman</option>
                            <option value="BDI">Basis Data 1</option>
                            <option value="WEB1">Pemograman Web</option>
                        </select>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <b>Nilai UTS</b> </span>
                        </div>
                        <input name="nilai_uts" class="form-control" type="number" min="0" max="100">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <b>Nilai UAS</b> </span>
                        </div>
                        <input name="nilai_uas" class="form-control" type="number" min="0" max="100">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <b>Nilai Tugas</b> </span>
                        </div>
                        <input name="nilai_tugas" class="form-control" type="number" min="0" max="100">
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <input type="submit" name="Submit" value="Submit" class="btn btn-primary btn-block">
                        <a href="index.php" class="btn btn-warning btn-block mt-3">Lihat Nilai</a>
                        <a href="form_post.php" class="btn btn-success btn-block mt-3">Belanja Kuy</a>
                    </div> <!-- form-group// -->
                </form>
            </article>
        </div> <!-- card.// -->

    </div>
    <!--container end.//-->
</body>

</html>