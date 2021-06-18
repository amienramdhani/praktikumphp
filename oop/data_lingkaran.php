<?php
require_once "class_lingkaran.php";
echo "Nilai PHI" . Lingkaran::PHI;
$Lingkar1 = new Lingkaran(10);
$Lingkar2 = new Lingkaran(4);

echo "<br/>Luas Lingkaran I  " . $Lingkar1->getLuas();
echo "<br>Luas Lingkaran II  " . $Lingkar2->getLuas();
echo "<br>Keliling Lingkaran I  " . $Lingkar1->getKeliling();
echo "<br>Keliling Lingkaran II  " . $Lingkar2->getKeliling();
