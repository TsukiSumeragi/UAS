<?php
$conn = mysqli_connect("localhost", "root", "", "dbbarang3");
if (mysqli_connect_errno()) {
    echo "Koneksi Gagal" . mysqli_connect_error();
}
?>