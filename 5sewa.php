<?php
include '5koneksi.php';
$query = mysqli_query($conn,"select * from mobil");
?>
<table border="2">
<tr><td>Nopol</td><td>Nama Mobil</td><td>Foto</td><td>Harga</td><td>Status</td><td>Aksi</td></tr>
<?php
while ($baris=mysqli_fetch_array($query))
{
echo "<tr>";
echo "<td>".$baris["nopol"]."</td>";
echo "<td>".$baris["namamobil"]."</td>";
echo "<td><img width=50 height=50 src=".$baris["foto"]."></td>";
echo "<td>".$baris["harga"]."</td>";
echo "<td>".$baris["status"]."</td>";
echo "<td><a href=5sewaproses.php?vnopol=".$baris["nopol"].">Sewa</td>";
echo "</tr>";
}
?>
</table>

