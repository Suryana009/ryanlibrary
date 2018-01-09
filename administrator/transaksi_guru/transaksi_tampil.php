<?php
include "../config/koneksi.php";
include "transaksi_fungsi.php";
$query = mysql_query("select * from transaksi a join guru b on b.id_guru=a.id_guru
												join buku c on c.id_buku=a.id_buku
												order by id_transaksi desc");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Data Transaksi Guru</h2>
		<input type="button" class='tombol' value='Tambah' onClick="window.location.href='?page=transaksi_guru_tambah';">
<table>
	<tr>
		<th>No</th>
		<th>Buku</th>
		<th>Nama Guru</th>
		<th>Tanggal Pesan</th>
		<th>Tanggal Pinjam</th>
		<th>Tanggal Kembali</th>
		<th>Status</th>
		<th>Terlambat</th>
		<th align="center">Aksi</th>
	</tr>
	<?php
	$no=1;
	while ($guru=mysql_fetch_array($query)) {
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $guru['judul']; ?></td>
		<td><?php echo $guru['nama']; ?></td>
		<td><?php echo $guru['tgl_pesan']; ?></td>
		<td><?php echo $guru['tgl_pinjam']; ?></td>
		<td><?php echo $guru['tgl_kembali']; ?></td>
		<td><?php echo $guru['status']; ?></td>
		<td><?php
					$tgl_dateline=$guru['tgl_kembali'];
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
		<td><a href="?page=transaksi_guru_pinjam&id_transaksi=<?php echo $guru['id_transaksi']; ?>"><b>Pinjam</b></a> | 
			<a href="?page=transaksi_guru_proses_kembali&id_transaksi=<?php echo $guru['id_transaksi']; ?>"><b>Kembali</b></a> |
			<a href="?page=transaksi_guru_proses_perpanjang&id_transaksi=<?php echo $guru['id_transaksi']; ?>&judul=<?php echo $guru['judul'];?>&tgl_kembali=<?php echo $guru['tgl_kembali']; ?>&lambat=<?php echo $lambat; ?>"><b>Perpanjang</b></a>
			</td>
		<?php $no++; } ?>
	</tr>
	</table>

<div id=paging>Hal: <b>1</b> |  </div><br></td>
		<td width="3%">&nbsp;</td>
	</tr>
</table>