<?php
include "../config/koneksi.php";

$id_guru	= $_GET['id_guru'];
$nip		= $_POST['nip'];
$nama		= $_POST['nama'];
$alamat		= $_POST['alamat'];
$telp		= $_POST['telp'];
$password	= $_POST['password'];

$simpan=mysql_query("UPDATE guru SET nip = '$nip',
									  nama = '$nama',
									  alamat = '$alamat',
									  telp = '$telp',
									  password = '$password'
									  where id_guru = '$id_guru'");

if($simpan) {
echo "<script>alert('Berhasil');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=guru_tampil'>";
} else {
echo "<script>alert('Gagal');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=guru_edit&id_guru=$id_guru'>";
}
?>