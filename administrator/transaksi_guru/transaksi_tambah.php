<?php
include 		"../config/koneksi.php";
$pinjam			= date("d-m-Y");
$tuju_hari		= mktime(0,0,0,date("n"),date("j")+7,date("Y"));
$kembali		= date("d-m-Y", $tuju_hari);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="2%">&nbsp;</td>
		<td width="95%"> 
		<h2>Tambah Transaksi Guru</h2>
<form method="post" action="?page=transaksi_guru_simpan">
<table>
	<tr>
		<td>Judul Buku</td>
		<td> :  <select name="id_buku">
				<option>Pilih Judul Buku</option>
				<?php
				$query = "SELECT * FROM buku ORDER by id_buku";
				$sql = mysql_query($query);
				while ($buku=mysql_fetch_array($sql)) {
					echo "<option value='$buku[id_buku]'>$buku[judul]</option>";
				}
				?>
				</select></td>
	</tr>
	<tr>
		<td>Nama Guru</td>
		<td> :  <select name="id_guru">
				<option>Pilih Nama Peminjam</option>
				<?php
				$query = "SELECT * FROM guru ORDER by id_guru";
				$sql = mysql_query($query);
				while ($guru=mysql_fetch_array($sql)) {
					echo "<option value='$guru[id_guru]'>$guru[nama]</option>";
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