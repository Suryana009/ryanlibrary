<?php
include "../config/koneksi.php";
$query = mysql_query("select * from buku order by id_buku desc");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Data Buku</h2>
		<input type="button" class='tombol' value='Tambahkan Buku' onClick="window.location.href='?page=buku_tambah';">
<table>
	<tr>
		<th>No</th>
		<th>Judul Buku</th>
		<th>Jumlah Buku</th>
		<th>Lokasi Buku</th>
		<th>Aksi</th>
	</tr>
	<?php
	$no=1;
	while ($buku=mysql_fetch_array($query)) {
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $buku['judul']; ?></td>
		<td><?php echo $buku['jumlah']; ?></td>
		<td><?php echo $buku['lokasi']; ?></td>
		<td><a href="?page=buku_edit&id_buku=<?php echo $buku['id_buku']; ?>"><b>Edit</b></a> | 
			<a href="?page=buku_hapus&id_buku=<?php echo $buku['id_buku']; ?>"><b>Hapus</b></a></td>
		<?php $no++; } ?>
	</tr>
	</table>

<div id=paging>Hal: <b>1</b> |  </div><br></td>
		<td width="3%">&nbsp;</td>
	</tr>
</table>