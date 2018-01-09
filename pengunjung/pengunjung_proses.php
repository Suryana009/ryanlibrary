<?php
include "config/koneksi.php";
$id_pengunjung	= $_POST['id_pengunjung'];
$nama			= $_POST['nama'];
$jk				= $_POST['jk'];
$kelas			= $_POST['kelas'];
$perlu			= $_POST['perlu'];
$saran			= $_POST['saran'];

if(empty($nama)) {
	echo "<script>alert('Nama belum diisi !')</script>";
    echo "<meta http-equiv='refresh' content='0 url=?page=pengunjung'>";
}elseif(empty($jk)) {
	echo "<script>alert('Jenis Kelamin belum diisi !')</script>";
    echo "<meta http-equiv='refresh' content='0 url=?page=pengunjung'>";
}elseif(empty($kelas)) {
	echo "<script>alert('Kelas belum diisi !')</script>";
    echo "<meta http-equiv='refresh' content='0 url=?page=pengunjung'>";
}elseif(empty($perlu)) {
	echo "<script>alert('Keperluan belum diisi !')</script>";
    echo "<meta http-equiv='refresh' content='0 url=?page=pengunjung'>";
}elseif(empty($saran)) {
	echo "<script>alert('Saran belum diisi !')</script>";
    echo "<meta http-equiv='refresh' content='0 url=?page=pengunjung'>";
}else {


$query	= mysql_query("INSERT INTO pengunjung VALUES ('$id_pengunjung', '$nama', '$jk', '$kelas', '$perlu', '$saran', now())");

if ($query) {
echo "<script>alert('Berhasil')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else {
echo "<script>alert('Gagal')</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=pengunjung'>";
}
}
?>