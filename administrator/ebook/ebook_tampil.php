<?php
include "../config/koneksi.php";
$query = mysql_query("select * from ebook order by id_ebook desc");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Data Ebook</h2>
		<input type="button" class='tombol' value='Tambahkan Ebook' onClick="window.location.href='?page=ebook_tambah';">
<table>
	<tr>
		<th>No</th>
		<th>Judul Ebook</th>
		<th>Cover Ebook</th>
		<th>File Ebook</th>
		<th>Aksi</th>
	</tr>
	<?php
	$no=1;
	while ($ebook=mysql_fetch_array($query)) {
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $ebook['judul']; ?></td>
		<td><a href="../cover/<?php echo $ebook['gambar']; ?>"><?php echo $ebook['gambar']; ?></a></td>
		<td><a href="../files/<?php echo $ebook['file']; ?>"><?php echo $ebook['file']; ?></a></td>
		<td><a href="?page=ebook_edit&id_ebook=<?php echo $ebook['id_ebook']; ?>"><b>Edit</b></a> | 
			<a href="?page=ebook_hapus&id_ebook=<?php echo $ebook['id_ebook']; ?>"><b>Hapus</b></a></td>
		<?php $no++; } ?>
	</tr>
	</table>

<div id=paging>Hal: <b>1</b> |  </div><br></td>
		<td width="3%">&nbsp;</td>
	</tr>
</table>