<?php
include "../config/koneksi.php";
$query = mysql_query("select * from ekategori order by id_ekategori desc");
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Kategori Ebook</h2>
		<input type=button class='tombol' value='Tambah EKategori' onclick="window.location.href='?page=ekategori_tambah';">
<table>
	<tr>
		<th>No</th>
		<th>Nama Kategori Ebook</th>
		<th>Aksi</th>
	</tr>
	<?php
	$no=1;
	while($ekategori=mysql_fetch_array($query)){
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $ekategori['ekategori']; ?></td>
		<td><a href="?page=ekategori_edit&amp;id_ekategori=<?php echo $ekategori['id_ekategori']; ?>"><b>Edit</b></a> | 
			<a href="?page=ekategori_hapus&amp;id_ekategori=<?php echo $ekategori['id_ekategori']; ?>"><b>Hapus</b></a></td>
		<?php $no++; } ?>
	</tr>
</table>
      <td width="3%">&nbsp;</td>
    </tr>
</table>