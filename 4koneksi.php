<?php
$conn = mysqli_connect("localhost", "root", "", "dbtransaksi4");
if (mysqli_connect_errno()) {
    echo "Koneksi Gagal" . mysqli_connect_error();
}
?>