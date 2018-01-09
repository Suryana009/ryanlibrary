<?php
include "../config/koneksi.php";
include "transaksi_fungsi.php";
$query = mysql_query("select * from transaksi a join siswa b on b.id_siswa=a.id_siswa
												join buku c on c.id_buku=a.id_buku
												order by id_transaksi desc");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Data Transaksi Siswa</h2>
		<input type="button" class='tombol' value='Tambah' onClick="window.location.href='?page=transaksi_siswa_tambah';">
<table>
	<tr>
		<th>No</th>
		<th>Buku</th>
		<th>Nama Siswa</th>
		<th>Tanggal Pesan</th>
		<th>Tanggal Pinjam</th>
		<th>Tanggal Kembali</th>
		<th>Status</th>
		<th>Terlambat</th>
		<th align="center">Aksi</th>
	</tr>
	<?php
	$no=1;
	while ($siswa=mysql_fetch_array($query)) {
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $siswa['judul']; ?></td>
		<td><?php echo $siswa['nama']; ?></td>
		<td><?php echo $siswa['tgl_pesan']; ?></td>
		<td><?php echo $siswa['tgl_pinjam']; ?></td>
		<td><?php echo $siswa['tgl_kembali']; ?></td>
		<td><?php echo $siswa['status']; ?></td>
		<td><?php
					$tgl_dateline=$siswa['tgl_kembali'];
					$tgl_kembali=date('d-m-Y');
					$lambat=terlambat($tgl_dateline, $tgl_kembali);
					$denda1=$lambat*$denda;
					if ($lambat>0) {
						echo "<font color='red'>$lambat hari<br>(Rp $denda1)</font>";
					}
					else {
						echo $lambat." hari";
					}
				?></td>
		<td><a href="?page=transaksi_siswa_pinjam&id_transaksi=<?php echo $siswa['id_transaksi']; ?>"><b>Pinjam</b></a> | 
			<a href="?page=transaksi_siswa_proses_kembali&id_transaksi=<?php echo $siswa['id_transaksi']; ?>"><b>Kembali</b></a> |
			<a href="?page=transaksi_siswa_proses_perpanjang&id_transaksi=<?php echo $siswa['id_transaksi']; ?>&judul=<?php echo $siswa['judul'];?>&tgl_kembali=<?php echo $siswa['tgl_kembali']; ?>&lambat=<?php echo $lambat; ?>"><b>Perpanjang</b></a>
			</td>
		<?php $no++; } ?>
	</tr>
	</table>

<div id=paging>Hal: <b>1</b> |  </div><br></td>
		<td width="3%">&nbsp;</td>
	</tr>
</table>