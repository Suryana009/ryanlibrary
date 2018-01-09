<?php
include "../config/koneksi.php";
$id_siswa= $_GET['id_siswa'];
$query = "select * from siswa where id_siswa='$id_siswa'";
$sql = mysql_query($query);
$row=mysql_fetch_array($sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Edit Siswa</h2>
<form method="post" action="?page=siswa_update&id_siswa=<?php echo $row['id_siswa']; ?>">
<table>
	<tr>
		<td>NIP Siswa</td>
		<td> : <input type="text" name="nip" value="<?php echo $row['nip']; ?>" size=50></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td> : <input type="text" name="nama" value="<?php echo $row['nama']; ?>" size=50></td>
	</tr>
	<tr>
		<td>Alamat Siswa</td>
		<td> : <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" size=50></td>
	</tr>
	<tr>
		<td>No Handphone</td>
		<td> : <input type="text" name="telp" value="<?php echo $row['telp']; ?>" size=50></td>
	</tr>
	<tr>
		<td>Password</td>
		<td> : <input type="password" name="password" value="<?php echo $row['password']; ?>" size=50></td>
	</tr>
	<tr>
		<td colspan=2>
		<input type="submit" class='tombol' value="Simpan">
		<input type="button" class='tombol' value="Batal" onclick="self.history.back()"></td>
	</tr>
</table>
</form>
</td>
		<td width="3%">&nbsp;</td>
	</tr>
</table>