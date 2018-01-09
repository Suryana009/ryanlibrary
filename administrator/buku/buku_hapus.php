<?php
include "../config/koneksi.php";
$id_buku=$_GET['id_buku'];

$buku=mysql_fetch_array(mysql_query("select gambar from buku where id_buku='$id_buku'"));
unlink('../buku/'.$id_buku['gambar']);

$query = mysql_query("DELETE FROM buku WHERE id_buku='$id_buku'");

If ($query) {
echo "<script>alert('Berhasil')</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=buku_tampil'>";
} else {
echo "<script>alert('Gagal')</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=buku_tampil'>";
}

?>
