<?php
include "../config/koneksi.php";
$query = mysql_query("select * from kategori order by id_kategori desc");
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Kategori Buku</h2>
		<input type=button class='tombol' value='Tambah Kategori' onclick="window.location.href='?page=kategori_tambah';">
<table>
	<tr>
		<th>No</th>
		<th>Nama Kategori</th>
		<th>Aksi</th>
	</tr>
	<?php
	$no=1;
	while($kategori=mysql_fetch_array($query)){
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $kategori['kategori']; ?></td>
		<td><a href="?page=kategori_edit&id_kategori=<?php echo $kategori['id_kategori']; ?>"><b>Edit</b></a> | 
			<a href="?page=kategori_hapus&id_kategori=<?php echo $kategori['id_kategori']; ?>"><b>Hapus</b></a></td>
		<?php $no++; } ?>
	</tr>
</table>
      <td width="3%">&nbsp;</td>
    </tr>
</table>