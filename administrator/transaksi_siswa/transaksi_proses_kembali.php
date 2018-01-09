<?php
include "../config/koneksi.php";

$id_transaksi	= $_GET['id_transaksi'];
$judul			= $_GET['judul'];

$us=mysql_query("UPDATE transaksi SET status='Kembali' WHERE id_transaksi='$id_transaksi'");


	if ($us) {
		echo "<script>alert('Berhasil Dikembalikan')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi_siswa'>";
	} else {
		echo "<script>alert('Gagal Dikembalikan')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi_siswa'>";
	}
?>