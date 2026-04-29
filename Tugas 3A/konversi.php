<?php
function cToF($c) {
    return ($c * 9/5) + 32;
}
function fToC($f) {
    return ($f - 32) * 5/9;
}
function cToK($c) {
    return $c + 273.15;
}
$hasil = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $suhu = $_POST["suhu"];
    $jenis = $_POST["jenis"];
    if (!is_numeric($suhu)) {
        $error = "Input harus angka!";
    } else {
        if ($jenis == "c_to_f") {
            $hasil = cToF($suhu) . " °F";
        } elseif ($jenis == "f_to_c") {
            $hasil = fToC($suhu) . " °C";
        } elseif ($jenis == "c_to_k") {
            $hasil = cToK($suhu) . " K";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Konversi Suhu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Konversi Suhu</h2>
    <form method="POST" action="">
        <label>Masukkan Suhu:</label>
        <input type="text" name="suhu" required>
        <label>Pilih Konversi:</label>
        <select name="jenis">
            <option value="c_to_f">Celsius → Fahrenheit</option>
            <option value="f_to_c">Fahrenheit → Celsius</option>
            <option value="c_to_k">Celsius → Kelvin</option>
        </select>
        <button type="submit">Konversi</button>
    </form>
    <?php if ($error != ""): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <?php if ($hasil != ""): ?>
        <p class="hasil">Hasil: <?= $hasil ?></p>
    <?php endif; ?>
</div>
</body>
</html>