<?php
include "../config/koneksi.php";

$id_buku		= $_POST['id_buku'];
$id_siswa		= $_POST['id_siswa'];
$tgl_pinjam		= $_POST['tgl_pinjam'];
$tgl_kembali	= $_POST['tgl_kembali'];

$qt = mysql_query("insert into transaksi values (null,'$id_buku','$id_siswa','','now()','$tgl_pinjam','$tgl_kembali','Pinjam')");
					
if ($qt) {
	echo "<script>alert('Transaksi Sukses');</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=transaksi_siswa'>";
} else {
	echo "<script>alert('Transaksi Gagal');</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=transaksi_siswa_tambah'>";
}

?>
