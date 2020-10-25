<?php

define('phi', 3.14);

function hitung_volume_tabung(float $diameter, float $tinggi): int
{
    return phi * pow($diameter / 2, 2) * $tinggi;
}


function hitung_luas_selimut_tabung(float $diameter, float $tinggi): int
{
    return (2 * phi) * ($diameter / 2) * $tinggi;
}

$harga_bakso = 12.000;
$harga_soto = 9000;
$harga_teh = 2000;
$harga_jeruk = 3000;

function total_pembelian(int $bakso = 0, int $soto = 0, int $teh = 0, int $jeruk = 0): float
{
    global $harga_bakso;
    global $harga_soto;
    global $harga_teh;
    global $harga_jeruk;

    $total = ($bakso * $harga_bakso) + ($soto * $harga_soto) + ($teh * $harga_teh) + ($jeruk * $harga_jeruk);

    return $total;
}


echo hitung_volume_tabung(10, 10) . "<br>";
echo hitung_luas_selimut_tabung(10, 10) . "<br>";
echo total_pembelian(10, 10, 10, 10,);
