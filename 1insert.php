<?php
//koneksi ke mysql
$conn = mysqli_connect("localhost", "root", "", "multiinput1");
if (mysqli_connect_errno()) {
    echo "Koneksi Gagal: " . mysqli_connect_error();
}

$n = $_POST['jum2'];
for ($i = 1; $i <= $n; $i++) {
    $vnim = $_POST['txtnim' . $i];
    $vnama = $_POST['txtnama' . $i];
    $vjurusan = $_POST['cbjurusan' . $i];

    if ((!empty($vnim)) && (!empty($vnama)) && (!empty($vjurusan))) {
        $query = mysqli_query($conn, "INSERT INTO mhs (nim, nama, jurusan) VALUES ('$vnim', '$vnama', '$vjurusan')");
        if ($query)
            echo "Input Data Sukses<br>";
        else
            echo "Input Data Gagal: " . mysqli_error($conn) . "<br>";
    }
}
?>