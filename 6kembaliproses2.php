<?php
include '6koneksi.php';
$today=date("Ymd");
?>
<h1>Transaksi Sewa Mobil</h1>
<p><a href="6kembali.php">Form Sewa Mobil</a></p>
<hr>
<?php
$vnopol = $_POST['hiddennopol'];
$vdenda = $_POST['txtdenda'];
$query = mysqli_query($conn,"SELECT max(idtransaksi) AS last FROM transaksimobil WHERE idtransaksi LIKE '$today%'");
$data = mysqli_fetch_array($query);
$lastnotransaksi = $data['last'];
$lastnourut = substr($lastnotransaksi, 8, 4);
$nextnourut = intval($lastnourut)+1;
$nextnotransaksi = $today.sprintf('%04s',$nextnourut);
$query = mysqli_query($conn,"INSERT INTO transaksimobil(idtransaksi,nopol,denda) VALUES ('$nextnotransaksi','$vnopol','$vdenda')");
if($query)
{
	$query2 = mysqli_query($conn,"SELECT * FROM tbmobil WHERE nopol = '$vnopol'");
	$data2 = mysqli_fetch_array($query2);
	$vstatus='Ada';
	$query3 = mysqli_query($conn,"update tbmobil set status='$vstatus' WHERE nopol = '$vnopol'");
?>
<p>Transaksi Pengembalian Mobil Sukses</p>
Id Transaksi : <?php echo $nextnotransaksi;?><br>
No Polisi : <?php echo $vnopol;?><br>
Nama Mobil : <?php echo $data2['namamobil'];?><br>
Denda : <?php echo $vdenda;?><br>
<?php
}
else echo "Transaksi Gagal";
?>
<a href="6kembali.php">Kembali</a>

