<?php
include "../config/koneksi.php";

$id_siswa	= $_POST['id_siswa'];
$nip		= $_POST['nip'];
$nama		= $_POST['nama'];
$alamat		= $_POST['alamat'];
$telp		= $_POST['telp'];
$password	= $_POST['password'];

$simpan=mysql_query("insert into siswa values('$id_siswa','$nip','$nama','$alamat','$telp','$password')");

if($simpan) {
echo "<script>alert('Berhasil');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=siswa_tampil'>";
} else {
echo "<script>alert('Gagal');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=siswa_tambah'>";
}
?>