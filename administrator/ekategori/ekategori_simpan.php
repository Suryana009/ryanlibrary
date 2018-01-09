<?php
include "../config/koneksi.php";
$id_ekategori	= $_POST['id_ekategori'];
$ekategori		= $_POST['ekategori'];
$perintah="insert into ekategori values('$id_ekategori','$ekategori')";
$simpan=mysql_query($perintah);

if($simpan) {
echo "<script>alert('Berhasil');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=ekategori_tampil'>";
} else {
echo "<script>alert('Gagal');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=ekategori_tambah'>";
}
?>