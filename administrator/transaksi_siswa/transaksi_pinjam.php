<?php
include 		"../config/koneksi.php";
$pinjam			= date("d-m-Y");
$tuju_hari		= mktime(0,0,0,date("n"),date("j")+7,date("Y"));
$kembali		= date("d-m-Y", $tuju_hari);
$id_transaksi	= $_GET['id_transaksi'];
$query = "SELECT * FROM transaksi inner join siswa where id_transaksi='$id_transaksi'";
$sql = mysql_query($query);
$data = mysql_fetch_array($sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Tambah Transaksi Siswa</h2>
<form method="post" action="?page=transaksi_siswa_proses_pinjam&id_transaksi=<?php echo $data['id_transaksi']; ?>">
<table>
	<tr>
		<td>Judul Buku</td>
		<td> :  <select name="id_buku" class="form-control">
				<?php 
				$bquery = "SELECT * FROM buku";
				$bsql = mysql_query($bquery);
					while ($buku=mysql_fetch_array($bsql)) {
						if($buku['id_buku'] == $data['id_buku']) {
							echo "<option value='$buku[id_buku]' selected>$buku[judul]</option>";
						} else {
							echo "<option value='$buku[id_buku]'>$buku[judul]</option>";
						}
					}
				?>
				</select></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td> :  <select name="id_siswa" class="form-control">
				<?php 
				$aquery = "SELECT * FROM siswa";
				$asql = mysql_query($aquery);
					while ($siswa=mysql_fetch_array($asql)) {
						if($siswa['id_siswa'] == $data['id_siswa']) {
							echo "<option value='$siswa[id_siswa]' selected>$siswa[nama]</option>";
						} else {
							echo "<option value='$siswa[id_siswa]'>$siswa[nama]</option>";
						}
					}
				?>
				</select></td>
	</tr>
	<tr>
		<td>Tanggal Pinjam</td>
		<td> : <input type="text" name="tgl_pinjam" class="form-control" value="<?php echo $pinjam; ?>" readonly="readonly"></td>
	</tr>
	<tr>
		<td>Tanggal Kembali</td>
		<td> : <input type="text" name="tgl_kembali" class="form-control" value="<?php echo $kembali; ?>" readonly="readonly"></td>
	</tr>
	<tr>
		<td colspan=2>
		<input type="submit" class='tombol' value="Simpan">
		<input type="button" class='tombol' value="Batal" onClick="self.history.back()"></td>
	</tr>
</table>
</form>
</td>
		<td width="3%">&nbsp;</td>
	</tr>
</table>