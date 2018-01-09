<?php
include "../config/koneksi.php";
$id_kategori= $_GET['id_kategori'];
$query = "select * from kategori where id_kategori='$id_kategori'";
$sql = mysql_query($query);
$row=mysql_fetch_array($sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Tambah Kategori</h2>
		<form method="post" action="?page=kategori_update&id_kategori=<?php echo $row['id_kategori']; ?>">
<table>
	<tr>
		<td>Nama Kategori</td>
		<td>: <input type="text" name="kategori" value="<?php echo $row['kategori']; ?>"></td>
	</tr>
	<tr>
		<td colspan=2>
		<input type="submit" name="simpan" class="tombol" value="Simpan">
		<input type="button" class="tombol"  value="Batal" onClick="self.history.back()"></td></tr>
          </table></form></td>
      <td width="3%">&nbsp;</td>
    </tr>
</table>