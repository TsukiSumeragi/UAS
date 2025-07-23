<h1>Input Data Mahasiswa</h1>
<form method="post" action="1insert.php">
<table border="1">
<tr><td><center>NIM</center></td><td><center>Nama</center></td><td><center>Jurusan</center></td></tr>
<?php
$n=$_POST['jum'];
for ($i=1;$i<=$n;$i++)

{
	echo "<tr><td>
		  <input type='text' name='txtnim".$i."'>
		  </td><td>
		  <input type='text' name='txtnama".$i."'>
		  </td><td>
		  <select name='cbjurusan".$i."'>
		  <option value='SI'>SI</option>
		  <option value='TI'>TI</option>
		  <option value='SE'>SE</option>
		  </select>
		  </td></tr>";
}
?>
</table>
<br />
<input type="hidden" name="jum2" value="<?php echo $n; ?>">
<input type="submit" value="Submit">
</form>

