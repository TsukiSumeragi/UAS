
<?php
include '7koneksi.php';
$query = mysqli_query($conn, ("SELECT tbbarang.kode,tbbarang.namabarang,tbbarang.harga, tbtransaksi.jumlah, tbtransaksi.total FROM tbtransaksi JOIN tbbarang ON tbbarang.kode = tbtransaksi.kode"));
?>
<table border="1">
<tr>
<td>Kode</td>
<td>Nama Barang</td>
<td>Harga</td>
<td>Jumlah</td>
<td>Total</td>
</tr>
<?php
while($data=mysqli_fetch_array($query)){
?>
<tr>
<td><?php echo $data['kode'];?></td>
<td><?php echo $data['namabarang'];?></td>
<td><?php echo $data['harga'];?></td>
<td><?php echo $data['jumlah'];?></td>
<td><?php echo $data['total'];?></td>
</tr>
<?php }
?>
</table>

