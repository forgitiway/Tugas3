<?php
$mahasiswa = [
    ["nama" => "Andi", "nim" => "101", "uts" => 80, "uas" => 90],
    ["nama" => "Budi", "nim" => "102", "uts" => 60, "uas" => 70],
    ["nama" => "Citra", "nim" => "103", "uts" => 50, "uas" => 55],
    ["nama" => "Dewi", "nim" => "104", "uts" => 90, "uas" => 95],
    ["nama" => "Eka", "nim" => "105", "uts" => 40, "uas" => 50]
];
function hitungNA($uts, $uas) {
    return ($uts * 0.4) + ($uas * 0.6);
}
function getGrade($na) {
    if ($na >= 85) return "A";
    elseif ($na >= 70) return "B";
    elseif ($na >= 60) return "C";
    elseif ($na >= 50) return "D";
    else return "E";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tabel Nilai Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 30px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: lightblue;
        }
        .low {
            background-color: pink;
        }
    </style>
</head>
<body>
<h2 style="text-align:center;">Tabel Nilai Mahasiswa</h2>
<table>
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Nilai Akhir</th>
        <th>Grade</th>
    </tr>
<?php
$total = 0;
$count = count($mahasiswa);
foreach ($mahasiswa as $mhs) {
    $na = hitungNA($mhs["uts"], $mhs["uas"]);
    $grade = getGrade($na);
    $total += $na;
    $class = ($na < 60) ? "low" : "";
    echo "<tr class='$class'>";
    echo "<td>{$mhs['nama']}</td>";
    echo "<td>{$mhs['nim']}</td>";
    echo "<td>{$mhs['uts']}</td>";
    echo "<td>{$mhs['uas']}</td>";
    echo "<td>" . round($na, 2) . "</td>";
    echo "<td>$grade</td>";
    echo "</tr>";
}
$rata = $total / $count;
?>
</table>
<h3 style="text-align:center;">
    Rata-rata kelas: <?= round($rata, 2); ?>
</h3>
</body>
</html>