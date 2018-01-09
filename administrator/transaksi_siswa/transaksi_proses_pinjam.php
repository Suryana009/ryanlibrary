<?php
include "../config/koneksi.php";

$id_transaksi	= $_GET['id_transaksi'];
$tgl_pinjam		= isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : "";
$tgl_kembali	= isset($_POST['tgl_kembali']) ? $_POST['tgl_kembali'] : "";

$us=mysql_query("UPDATE transaksi SET status='Pinjam', tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali' WHERE id_transaksi='$id_transaksi'");

	if ($us) {
		echo "<script>alert('Berhasil Diupdate')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi_siswa'>";
	} else {
		echo "<script>alert('Gagal Dikembalikan')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi_siswa_pinjam&id_transaksi=$id_transaksi'>";
	}
?>