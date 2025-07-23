<?php
include '5koneksi.php';
$today = date ("Ymd");
$vnopol = $_POST['hiddennopol'];
$vharga = $_POST['hiddenharga'];
$vjumlah = $_POST['txtjumlah'];
$vtotal = (int)$vharga * (int)$vjumlah;
$query = mysqli_query($conn,"SELECT max(idtransaksi) AS last FROM transaksi WHERE idtransaksi LIKE '$today%'");
$data = mysqli_fetch_array($query);
$lastnotransaksi = $data['last'];
$lastnourut = substr($lastnotransaksi,8,4);
$nextnourut = $lastnourut+1;
$nextnotransaksi = $today.sprintf('%04s',$nextnourut);
$query = mysqli_query($conn,"INSERT INTO transaksi(idtransaksi,nopol,lama,total) VALUES ('$nextnotransaksi','$vnopol','$vjumlah','$vtotal')");
if($query)
{
    $query2 = mysqli_query($conn,"SELECT * FROM mobil WHERE nopol = '$vnopol'");
    $data2 = mysqli_fetch_array($query2);
    $vstatus = 'sewa';
    $query3 = mysqli_query($conn,"update mobil set status='$vstatus' WHERE nopol = '$vnopol'");
?>
<p>Transaksi Sukses</p>
Transaksi : <?php echo $nextnotransaksi; ?> <br>
No. Polisi : <?php echo $data2['nopol']; ?> <br>
Mobil : <?php echo $data2['namamobil']; ?><br>
Harga Per Hari : <?php echo $data2['harga']; ?><br>
Lama Sewa : <?php echo $vjumlah; ?> <br>
Total Bayar : <?php echo $vtotal; ?> <br>
<?php
}
else echo "Transaksi Gagal";
?>

