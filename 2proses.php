<?php
include '2koneksi.php';
?>
<h1>Transaksi Pembayaran</h1>
<p><a href="2bayar.php">Form Bayar</a></p>
<hr>
<?php
$id = $_POST['id'];
$query = mysqli_query($conn,"SELECT * FROM member WHERE idmember = '$id'");
if (mysqli_num_rows($query)>0)
{
$data = mysqli_fetch_array($query);
?>
	<form method="post" action ="2.1proses.php">
	Id Member : <?php echo $id; ?><br>
	Nama : <?php echo $data['nama'];?><br>
	Alamat : <?php echo $data['alamat']?><br>
	Jumlah Bayar : Rp. <input type="text" name="jumlah">
	<input type="hidden" name="id" value="<?php echo $id?>">
	<input type="submit" name="submit" value="Submit">
	</form>
	<?php
}
else echo "Nomor ID tidak ditemukan";
?>
