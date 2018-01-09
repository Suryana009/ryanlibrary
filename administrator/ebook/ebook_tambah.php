<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Tambah Ebook</h2>
<form method="post" action="?page=ebook_simpan" enctype="multipart/form-data">
<table>
	<tr>
		<td>Judul Ebook</td>
		<td> : <input type="text" name="judul" size=60></td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td>  <textarea name="deskripsi" style='width: 600px; height: 350px;'></textarea></td>
	</tr>
	<tr>
		<td>Kategori Ebook</td>
		<td> : <select name="id_ekategori">
			   <option>Pilih Kategori</option>
			   <?php
			   include "../config/koneksi.php";
			   $query=mysql_query("select*from ekategori");
			   while($ekategori=mysql_fetch_array($query)){
			   		echo "<option value='$ekategori[id_ekategori]'>$ekategori[ekategori]</option>";
					}
			   ?>
			   </select>
			   </td>
	</tr>
	<tr>
		<td>Gambar</td>
		<td> : <input type="file" name="gambar" size=40> <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td>
	</tr>
	<tr>
		<td>File</td>
		<td> : <input type="file" name="file" size=40></td>
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