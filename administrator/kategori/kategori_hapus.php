<?php
include '../config/koneksi.php';
$id_kategori= $_GET['id_kategori'];
$hapus = mysql_query("DELETE FROM kategori WHERE id_kategori='$id_kategori'");
if ($hapus) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=kategori_tampil'>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		echo "<meta http-equiv='refresh' content='0; url=?page=kategori_tampil'>";
	}
?>