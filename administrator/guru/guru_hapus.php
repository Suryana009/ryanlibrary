<?php
include '../config/koneksi.php';
$id_guru= $_GET['id_guru'];
$hapus = mysql_query("DELETE FROM guru WHERE id_guru='$id_guru'");
if ($hapus) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=guru_tampil'>";
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		echo "<meta http-equiv='refresh' content='0; url=?page=guru_tampil'>";
	}
?>