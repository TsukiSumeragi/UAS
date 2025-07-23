<?php
include '5koneksi.php';
$query = mysqli_query($conn,"select * from mobil where nopol ='$_GET[vnopol]'");
$data = mysqli_fetch_array ($query);
$vstatus = $data['status'];
if($vstatus=='Disewa')
{
echo "Mobil tidak ada <a href='5sewa.php'>Kembali</a>";
}
else
{
?>
<form method="post" action="5sewaproses2.php">
Nopol : <?php echo $data['nopol']; ?> <br>
Mobil : <?php echo $data['namamobil']; ?> <br>
Harga per Hari : <?php echo $data['harga']; ?> <br>
Lama Sewa (Hari) : <input type ="text" name="txtjumlah"><br>
<?php $vnopol=$data['nopol']; ?>
<?php $vharga=$data['harga']; ?>
<input type="hidden" name="hiddennopol" value="<?php echo $vnopol ?>">
<input type="hidden" name="hiddenharga" value="<?php echo $vharga ?>">
<input type="submit" value="Submit">
</form>
<?php
}
?>

