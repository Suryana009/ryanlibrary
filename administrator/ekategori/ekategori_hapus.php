<?php
include '../config/koneksi.php';
$id_ekategori= $_GET['id_ekategori'];
$hapus = mysql_query("DELETE FROM ekategori WHERE id_ekategori='$id_ekategori'");
if ($hapus) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=ekategori_tampil'>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		echo "<meta http-equiv='refresh' content='0; url=?page=ekategori_tampil'>";
	}
?>