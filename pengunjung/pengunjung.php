<form method="post" action="?page=pengunjung_proses" name="pengunjung">
	<h1>Halaman Pengunjung</h1>
	<table border="0" width="100%" cellpadding="2" id="table1">
		<tr>
			<td width="35%">Nama (*)</td>
			<td><input type="text" name="nama" required size="32"></td>
		</tr>
		<tr>
			<td width="35%">Jenis Kelamin (*)</td>
			<td><input type="radio" value="Laki-Laki" name="jk"> Laki-Laki &nbsp;&nbsp;
				<input type="radio" value="Perempuan" name="jk"> Perempuan</td>
		</tr>
		<tr>
			<td width="35%">Kelas (*)</td>
			<td><input type="text" name="kelas" required size="32"></td>
		</tr>
		<tr>
			<td width="35%">Keperluan (*)</td>
			<td><textarea rows="2" name="perlu" required cols="25"></textarea></td>
		</tr>
		<tr>
			<td width="35%">Saran-saran</td>
			<td><textarea rows="4" name="saran" cols="25"></textarea></td>
		</tr>
		<tr>
			<td width="35%">&nbsp;</td>
			<td><input type="submit" value="Kirim">
			<input type="reset" value="Batal" onclick="self.history.back()"></td>
		</tr>
		<tr>
			<td colspan="2"><b>Keterangan : (*) Harus diisi</b></td>
		</tr>
	</table>
</form>