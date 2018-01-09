<?php
include '../config/koneksi.php';
$id_siswa= $_GET['id_siswa'];
$hapus = mysql_query("DELETE FROM siswa WHERE id_siswa='$id_siswa'");
if ($hapus) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=siswa_tampil'>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		echo "<meta http-equiv='refresh' content='0; url=?page=siswa_tampil'>";
	}
?>