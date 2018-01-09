<?php
include "../config/koneksi.php";
$id_buku	= $_GET['id_buku'];
$tampil="select * from buku where id_buku='$id_buku'";
$query=mysql_query($tampil);
$row=mysql_fetch_array($query);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Edit Buku</h2>
<form method="post" action="?page=buku_update&id_buku=<?php echo $row['id_buku']; ?>" enctype="multipart/form-data">
<table>
	<tr>
		<td>Judul Buku</td>
		<td> : <input type="text" name="judul" value="<?php echo $row['judul']; ?>" size=60></td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td> : <textarea name="deskripsi" style='width: 600px; height: 350px;'><?php echo $row['deskripsi']; ?></textarea></td>
	</tr>
	<tr>
		<td>Gambar</td>
		<td> : <input type="file" name="gambar" size=40><a href="../buku/<?php echo $row['gambar']; ?>">Lihat Cover Buku</a></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td> : <select name="id_kategori">
			   <option>Pilih</option>
			   <?php
			   include "../config/koneksi.php";
			   $kquery=mysql_query("select*from kategori");
			   while($kategori=mysql_fetch_array($kquery)){
			   		if($kategori['id_kategori'] == $row['id_kategori']){
						echo "<option value='$kategori[id_kategori]' selected>$kategori[kategori]</option>";
					} else {
						echo "<option value='$kategori[id_kategori]'>$kategori[kategori]</option>";
					}
			   }
			   ?>
			   </select>
			   </td>
	</tr>
	<tr>
		<td>Pengarang</td>
		<td> : <input type="text" name="pengarang" value="<?php echo $row['pengarang']; ?>" size=50></td>
	</tr>
	<tr>
		<td>Penerbit</td>
		<td> : <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>" size=50></td>
	</tr>
	<tr>
		<td>Tahun Terbit</td>
		<td> : <select name="tahun">
			   <option value=""><?php echo $row['tahun']; ?></option>
			   <option value="2015">2015</option>
			   <option value="2014">2014</option>
			   <option value="2013">2013</option>
			   <option value="2012">2012</option>
			   <option value="2011">2011</option>
			   <option value="2010">2010</option>
			   <option value="2009">2009</option>
			   <option value="2008">2008</option>
			   <option value="2007">2007</option>
			   <option value="2006">2006</option>
			   <option value="2005">2005</option>
			   <option value="2004">2004</option>
			   <option value="2003">2003</option>
			   <option value="2002">2002</option>
			   <option value="2001">2001</option>
			   <option value="2000">2000</option>
			   </select></td>
	</tr>
	<tr>
		<td>Jumlah</td>
		<td> : <input type="text" name="jumlah" value="<?php echo $row['jumlah']; ?>" size=10></td>
	</tr>
	<tr>
		<td>Lokasi Buku</td>
		<td> : <select name="lokasi">
			   <option value=""><?php echo $row['lokasi']; ?></option>
			   <option value="Rak 1">Rak 1</option>
			   <option value="Rak 2">Rak 2</option> 
			   <option value="Rak 3">Rak 3</option>
			   <option value="Rak 4">Rak 4</option>
			   <option value="Rak 5">Rak 5</option>
			   <option value="Rak 6">Rak 6</option>
			   <option value="Rak 7">Rak 7</option> 
			   <option value="Rak 8">Rak 8</option>
			   <option value="Rak 9">Rak 9</option>
			   <option value="Rak 10">Rak 10</option>
			   </select></td>
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