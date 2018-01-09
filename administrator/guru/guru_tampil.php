<?php
include "../config/koneksi.php";
$query = mysql_query("select * from guru order by id_guru desc");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Data Guru</h2>
		<input type="button" class='tombol' value='Tambahkan Guru' onClick="window.location.href='?page=guru_tambah';">
<table>
	<tr>
		<th>No</th>
		<th>NIP</th>
		<th>Nama Guru</th>
		<th>Alamat</th>
		<th>No. Telepon</th>
		<th>Aksi</th>
	</tr>
	<?php
	$no=1;
	while ($guru=mysql_fetch_array($query)) {
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $guru['nip']; ?></td>
		<td><?php echo $guru['nama']; ?></td>
		<td><?php echo $guru['alamat']; ?></td>
		<td><?php echo $guru['telp']; ?></td>
		<td><a href="?page=guru_edit&id_guru=<?php echo $guru['id_guru']; ?>"><b>Edit</b></a> | 
			<a href="?page=guru_hapus&id_guru=<?php echo $guru['id_guru']; ?>"><b>Hapus</b></a></td>
		<?php $no++; } ?>
	</tr>
	</table>

<div id=paging>Hal: <b>1</b> |  </div><br></td>
		<td width="3%">&nbsp;</td>
	</tr>
</table>