<?php
include "../config/koneksi.php";
$id_ekategori= $_GET['id_ekategori'];
$query = "select * from ekategori where id_ekategori='$id_ekategori'";
$sql = mysql_query($query);
$row=mysql_fetch_array($sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Edit Kategori Ebook</h2>
		<form method="post" action="?page=ekategori_update&id_ekategori=<?php echo $row['id_ekategori']; ?>">
<table>
	<tr>
		<td>Nama Kategori</td>
		<td>: <input type="text" name="ekategori" value="<?php echo $row['ekategori']; ?>"></td>
	</tr>
	<tr>
		<td colspan=2>
		<input type="submit" name="simpan" class="tombol" value="Simpan">
		<input type="button" class="tombol"  value="Batal" onClick="self.history.back()"></td></tr>
          </table></form></td>
      <td width="3%">&nbsp;</td>
    </tr>
</table>