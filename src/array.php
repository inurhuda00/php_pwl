<?php

$nilai_matkul = [
    "pwl" => ["Toni" => 80, "Dwi" => 90, "Nina" => 75, 'Reza' => 60],
    "ai" => ["Toni" => 60, "Dwi" => 70, "Nina" => 95, 'Reza' => 50],
    "sbd" => ["Toni" => 75, "Dwi" => 75, "Nina" => 80, 'Reza' => 70]
];

// a. nilai rata-rata per matakuliah
function avarage_matkul()
{
    global $nilai_matkul;
    $average_matkul = [];
    $new_matkul = [];

    foreach ($nilai_matkul as $matkul => $val) {
        // menghitung rata" tiap matkul 
        $total = count($val);
        array_push($average_matkul, array_sum($val) / $total);
        array_push($new_matkul, $matkul);
    }
    // memberikan key tiap value rata-rata
    $average_matkul = array_combine($new_matkul, $average_matkul);


    return array_merge($average_matkul, ['total' => $total]);
}


// b. nilai per anak
function nilai_per_anak()
{
    global $nilai_matkul;

    $nilai_per_anak = [];
    // membuat format array menjadi per anak
    foreach ($nilai_matkul as $val) {
        foreach ($val as $nama => $nilai) {
            isset($nilai_per_anak[$nama])
                ? array_push($nilai_per_anak[$nama], $nilai)
                : ($nilai_per_anak[$nama] =  [$nilai]);
        }
    }
    // menghitung total dan rata-rata nilai
    foreach ($nilai_per_anak as $nama => $nilai) {
        $total = array_sum($nilai);
        $average = $total / count($nilai);

        array_push($nilai_per_anak[$nama], ['total' => $total, 'rata-rata' => number_format((float)$average, 2, '.', '')]);
    }
    return $nilai_per_anak;
}

/**
[
    toni=> 80
    dwi=> 80
    nina=>75
]
 */

// c. menambahkan nilai
function input_nilai(string $nama = null, int $pwl = null, int $ai = null, int $sbd = null)
{
    global $nilai_matkul;

    $args = func_get_args();

    $new_nilai_matkul = [];

    $count = 1;

    $new_matkul = [];

    foreach ($nilai_matkul as $matkul => $val) {
        ksort($val);
        // mengabungkan nilai baru ke array dan push ke variable baru
        array_push($new_nilai_matkul, array_merge($val, [$args[0] => $args[$count]]));
        $count++;
        array_push($new_matkul, $matkul);
    }

    return array_combine($new_matkul, $new_nilai_matkul);
}


// d. menghapus nilai akhir
function remove_last()
{
    global $nilai_matkul;

    $new_nilai_matkul = [];
    $new_matkul = [];

    foreach ($nilai_matkul as $matkul => $val) {
        // splice array dari -1 ke 1
        array_splice($val, -1, 1);
        // push ke variable baru
        array_push($new_nilai_matkul, $val);
        array_push($new_matkul, $matkul);
    }

    return array_combine($new_matkul, $new_nilai_matkul);
}



// nilai per matakuliah
echo "NILAI RATA-RATA PER-MATAKULIAH <br>";
$average = avarage_matkul();
$i = 1;
foreach ($average as $matkul => $rata) {
    echo $i++ . ". " . $matkul . " : " . $rata . "<br>";
}


// nilai rata-rata anak
echo "<br>NILAI RATA-RATA PER-ANAK : <br>";
$nilai_anak = nilai_per_anak();

$i = 1;
foreach ($nilai_anak as $nama => $nilai) {
    echo $i++ . ". " . $nama . " : " . $nilai[0] . "<br>";
}


echo "<br> INPUT NILAI BARU : <br>";


// input nilai baru 
$nilai = [
    'nama' => 'huda',
    'pwl' => 90,
    'ai' => 80,
    'sbd' => 76
];

$nilai_matkul = input_nilai($nilai['nama'], $nilai['pwl'], $nilai['ai'], $nilai['sbd']);
$i = 1;

echo 'nilai baru : ' . '<br>' . 'nama : ' . $nilai['nama'] . "<br>pwl : " . $nilai['pwl'] . '<br>ai : ' . $nilai['ai'] . '<br>sbd : ' . $nilai['sbd'] . '<br>';

echo '<br> nilai per-matakuliah asc <br>';
foreach ($nilai_matkul as $matkul => $anak_anak) {
    echo 'nilai matakuliah : ' . $matkul . '<br>';
    foreach ($anak_anak as $nama => $nilai) {
        echo $i . ". " . $nama . " : " . $nilai . "<br>";
        (count($anak_anak) <= $i)
            ? $i = 1
            : $i += 1;
    }
}


// nilai per matakuliah
echo "<br>Nilai Rata-rata Per matakuliah: <br>";
$average = avarage_matkul();
$i = 1;
foreach ($average as $matkul => $rata) {
    echo $i++ . ". " . $matkul . " : " . $rata . "<br>";
}


echo "<br>MENGHAPUS NILAI TERAHIR 2X <br>";

// menghapus nilai terakhir
$nilai_matkul = remove_last();
$nilai_matkul = remove_last();

$i = 1;

foreach ($nilai_matkul as $matkul => $anak_anak) {
    echo 'nilai matakuliah : ' . $matkul . '<br>';
    foreach ($anak_anak as $nama => $nilai) {
        echo $i . ". " . $nama . " : " . $nilai . "<br>";
        (count($anak_anak) <= $i)
            ? $i = 1
            : $i += 1;
    }
}

// nilai per matakuliah
echo "Nilai Rata-rata Per matakuliah: <br>";
$average = avarage_matkul();
$i = 1;
foreach ($average as $matkul => $rata) {
    echo $i++ . ". " . $matkul . " : " . $rata . "<br>";
}
