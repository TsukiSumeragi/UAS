<h2>Transaksi Pengembalian</h2>
<form action="6kembaliproses.php" method="post">
Nomor Polisi : <select name="cbmobil">
<?php
include '6koneksi.php';
$query = mysqli_query($conn,"select * from tbmobil");
while($baris=mysqli_fetch_array($query))
{
echo "<option value='$baris[0]'>$baris[0]</option>";
}
?>
</select>
<input type="submit" value="Submit">
</form>
