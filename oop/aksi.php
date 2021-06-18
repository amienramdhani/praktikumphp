<?php
//cek button    
if ($_POST['Submit']     == "Submit") {
    $nama                   = $_POST['nama'];
    $berat                  = $_POST['berat'];
    $tinggi                 = $_POST['tinggi'];
    $umur                   = $_POST['umur'];
    $jk                     = $_POST['jk'];

    //validasi data data kosong
    if (empty($_POST['nama']) || empty($_POST['berat']) || empty($_POST['tinggi']) || empty($_POST['umur']) || empty($_POST['jk'])) {
?>
        <script language="JavaScript">
            alert('Data Harap Dilengkapi!');
            document.location = 'formBmi.php';
        </script>
        <?php
    } else {

        //membuka file
        $data = "data.txt";
        $bukafile = fopen($data, "a");
        if (!$bukafile) {
            print("File $data gagal dibuka!");
            exit;
        ?>
            <script language="JavaScript">
                alert('Tambah Data Nilai Gagal');
                document.location = 'formBmi.php';
            </script>
        <?php
        }

        //menulis file
        $data_baru = $nama . ' ' . $berat . ' ' . $tinggi . ' ' . $umur . ' ' . $jk;
        fwrite($bukafile, PHP_EOL . $data_baru);

        //menutup file
        fclose($bukafile);
        ?>
        <script language="JavaScript">
            alert('Tambah Data Nilai Berhasil');
            document.location = 'index.php';
        </script>
<?php
    }
}
?>