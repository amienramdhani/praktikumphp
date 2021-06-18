<?php
require_once "class_persegiPanjang.php";

$persegi1 = new PersegiPanjang(9, 5);
$persegi2 = new PersegiPanjang(10, 7);

echo "<br> Luas Persegi I adalah " . $persegi1->getLuas();
echo "<br> Luas Persegi 2 adalah " . $persegi2->getLuas();

echo "<br> Luas Persegi I adalah " . $persegi1->getKeliling();
echo "<br> Luas Persegi 2 adalah " . $persegi2->getKeliling();
