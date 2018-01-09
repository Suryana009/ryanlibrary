<?php
include "../config/koneksi.php";

$id_guru	= $_POST['id_guru'];
$nip		= $_POST['nip'];
$nama		= $_POST['nama'];
$alamat		= $_POST['alamat'];
$telp		= $_POST['telp'];
$password	= $_POST['password'];

$simpan=mysql_query("insert into guru values('$id_guru','$nip','$nama','$alamat','$telp','$password')");

if($simpan) {
echo "<script>alert('Berhasil');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=guru_tampil'>";
} else {
echo "<script>alert('Gagal');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=guru_tambah'>";
}
?>