<?php
include '4koneksi.php';
?>
<h1>Transaksi Pembayaran</h1>
<p><a href="4stok.php">Form Bayar Barang</a></p>
<hr>
<?php
if (isset($_POST['kode'])) {
    $kode = $_POST['kode'];
    $query = mysqli_query($conn, "SELECT * FROM masterbarang WHERE kode = '$kode'");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
?>
<form method="post" action="4prosesstok2.php">
    Kode Barang : <?php echo $kode; ?><br>
    Nama Barang : <?php echo $data['namabarang']; ?><br>
    Harga : <?php echo $data['harga']; ?><br>
    Stok : <?php echo $data['stok']; ?><br>
    Jumlah Barang : <input type="text" name="jumlah"><br>
    <input type="hidden" name="kode" value="<?php echo $kode; ?>">
    <input type="hidden" name="harga" value="<?php echo $data['harga']; ?>">
    <input type="hidden" name="stok" value="<?php echo $data['stok']; ?>">
    <input type="submit" name="submit" value="Submit">
</form>
<?php
    } else {
        echo "Kode tidak ditemukan";
    }
    
} 
   else { echo "Akses form ini harus lewat form input kode barang!";
}
?>
