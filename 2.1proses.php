<?php
include '2koneksi.php';
$today=date("Ymd");
?>
<h1>Transaksi Pembayaran</h1>
<p><a href="2bayar.php">Form Bayar</a></p>
<hr>
<?php
$id = $_POST['id'];
$jumlah = $_POST['jumlah'];
$query = mysqli_query($conn,"SELECT max(idtransaksi) AS last FROM transaksi WHERE idtransaksi LIKE '$today%'");
$data = mysqli_fetch_array($query);
$lastnotransaksi = $data['last'];
$lastnourut = substr($lastnotransaksi, 8, 4);
$nextnourut = intval($lastnourut) + 1;
$nextnotransaksi = $today.sprintf('%04s', $nextnourut);

$query = mysqli_query($conn,"INSERT into transaksi(idtransaksi,idmember,jumlah) VALUES ('$nextnotransaksi','$id','$jumlah')");
if($query)
{
	$query2 = mysqli_query($conn,"SELECT * FROM member WHERE idmember = '$id'");
	$data2 = mysqli_fetch_array($query2);
?>
<p>Transaksi Pembayaran Sukses</p>
Id Transaksi : <?php echo $nextnotransaksi;?><br>
Id Member : <?php echo $id;?><br>
Nama : <?php echo $data2['nama'];?><br>
Alamat : <?php echo $data2['alamat'];?><br>
Jumlah Bayar : Rp. <?php echo $jumlah;?><br>
<?php
}
else echo "Transaksi Gagal";
?>
