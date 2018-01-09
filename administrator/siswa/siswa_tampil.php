<?php
include "../config/koneksi.php";
$query = mysql_query("select * from siswa order by id_siswa desc");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Data Siswa</h2>
		<input type="button" class='tombol' value='Tambahkan Siswa' onClick="window.location.href='?page=siswa_tambah';">
<table>
	<tr>
		<th>No</th>
		<th>NIP</th>
		<th>Nama Siswa</th>
		<th>Alamat</th>
		<th>No. Telepon</th>
		<th>Aksi</th>
	</tr>
	<?php
	$no=1;
	while ($siswa=mysql_fetch_array($query)) {
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $siswa['nip']; ?></td>
		<td><?php echo $siswa['nama']; ?></td>
		<td><?php echo $siswa['alamat']; ?></td>
		<td><?php echo $siswa['telp']; ?></td>
		<td><a href="?page=siswa_edit&id_siswa=<?php echo $siswa['id_siswa']; ?>"><b>Edit</b></a> | 
			<a href="?page=siswa_hapus&id_siswa=<?php echo $siswa['id_siswa']; ?>"><b>Hapus</b></a></td>
		<?php $no++; } ?>
	</tr>
	</table>

<div id=paging>Hal: <b>1</b> |  </div><br></td>
		<td width="3%">&nbsp;</td>
	</tr>
</table>