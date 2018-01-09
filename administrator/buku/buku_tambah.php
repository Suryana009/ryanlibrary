<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Tambah Buku</h2>
<form method="post" action="?page=buku_simpan" enctype="multipart/form-data">
<table>
	<tr>
		<td>Judul Buku</td>
		<td> : <input type="text" name="judul" size=60></td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td> : <textarea name="deskripsi" style='width: 600px; height: 350px;'></textarea></td>
	</tr>
	<tr>
		<td>Gambar</td>
		<td> : <input type="file" name="gambar" size=40> <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td> : <select name="id_kategori">
			   <option>Pilih Kategori</option>
			   <?php
			   include "../config/koneksi.php";
			   $query=mysql_query("select*from kategori");
			   while($kategori=mysql_fetch_array($query)){
			   		echo "<option value='$kategori[id_kategori]'>$kategori[kategori]</option>";
					}
			   ?>
			   </select>
			   </td>
	</tr>
	<tr>
		<td>Pengarang</td>
		<td> : <input type="text" name="pengarang" size=50></td>
	</tr>
	<tr>
		<td>Penerbit</td>
		<td> : <input type="text" name="penerbit" size=50></td>
	</tr>
	<tr>
		<td>Tahun Terbit</td>
		<td> : <select name="tahun">
			   <option value="">Pilih Tahun</option>
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
		<td> : <input type="text" name="jumlah" size=10></td>
	</tr>
	<tr>
		<td>Lokasi Buku</td>
		<td> : <select name="lokasi">
			   <option value="">Pilih Lokasi</option>
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