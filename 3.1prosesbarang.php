<?php
include '3koneksi.php';
$today=date("Ymd");
?>
<h1>Transaksi Pembayaran Barang</h1>
<p><a href="3bayarbarang.php">Form Bayar Barang</a></p>
<hr>
<?php
$kode = $_POST['kode'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$total = $jumlah*$harga;
$query = mysqli_query($conn,"SELECT max(idtransaksi) AS last FROM tbtransaksi WHERE idtransaksi LIKE '$today%'");
$data = mysqli_fetch_array($query);
$lastnotransaksi = $data['last'];
if ($lastnotransaksi === null) $lastnotransaksi = '';
$lastnourut = substr($lastnotransaksi, 8, 4);
$nextnourut = intval($lastnourut) + 1;
$nextnotransaksi = $today.sprintf('%04s',$nextnourut);

$query = mysqli_query($conn,"INSERT INTO tbtransaksi(idtransaksi,kode,jumlah,total) VALUES ('$nextnotransaksi','$kode','$jumlah','$total')");
if($query)
{
$query2 = mysqli_query($conn,"SELECT * FROM tbmasterbarang WHERE kode = '$kode'");
	$data2 = mysqli_fetch_array($query2);
?>
<p>Transaksi Pembayaran Barang Sukses</p>
Id Transaksi : <?php echo $nextnotransaksi;?><br>
Kode Barang : <?php echo $kode;?><br>
Nama Barang : <?php echo $data2['namabarang'];?><br>
Harga : <?php echo $data2['harga'];?><br>
Jumlah Barang : <?php echo $jumlah;?><br>
Total Bayar : Rp. <?php echo $total;?><br>
<?php
}
else echo "Transaksi Gagal";
?>
