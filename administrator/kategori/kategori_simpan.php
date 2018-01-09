<?php
include "../config/koneksi.php";
$id_kategori	= $_POST['id_kategori'];
$kategori		= $_POST['kategori'];
$perintah="insert into kategori values('$id_kategori','$kategori')";
$simpan=mysql_query($perintah);

if($simpan) {
echo "<script>alert('Berhasil');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=kategori_tampil'>";
} else {
echo "<script>alert('Gagal');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=kategori_tambah'>";
}
?>