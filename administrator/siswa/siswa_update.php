<?php
include "../config/koneksi.php";

$id_siswa	= $_GET['id_siswa'];
$nip		= $_POST['nip'];
$nama		= $_POST['nama'];
$alamat		= $_POST['alamat'];
$telp		= $_POST['telp'];
$password	= $_POST['password'];

$simpan=mysql_query("UPDATE siswa SET nip = '$nip',
									  nama = '$nama',
									  alamat = '$alamat',
									  telp = '$telp',
									  password = '$password'
									  where id_siswa = '$id_siswa'");

if($simpan) {
echo "<script>alert('Berhasil');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=siswa_tampil'>";
} else {
echo "<script>alert('Gagal');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=siswa_edit&id_siswa=$id_siswa'>";
}
?>