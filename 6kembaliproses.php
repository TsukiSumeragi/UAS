<?php
include '6koneksi.php';
$vnopol=$_POST['cbmobil'];
$query = mysqli_query($conn,"SELECT * FROM tbmobil WHERE nopol = '$vnopol'");
$data = mysqli_fetch_array($query);
?>
	<form method="post" action ="6kembaliproses2.php">
	No Polisi : <?php echo $vnopol ?><br>
	Nama Mobil : <?php echo $data['namamobil'];?><br>
	Denda : Rp. <input type="text" name="txtdenda"><br>
	<?php $vnopol=$data['nopol']; ?>
	<?php $vharga=$data['harga']; ?>
	<input type="hidden" name="hiddennopol" value="<?php echo $vnopol?>">
	<input type="submit" value="Submit">
	</form>

