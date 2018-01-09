<?php
include "../config/koneksi.php";
$id_ekategori	= $_GET['id_ekategori'];
$ekategori		= $_POST['ekategori'];
$ubah = mysql_query("update ekategori set ekategori='$ekategori' where id_ekategori='$id_ekategori'");

if($ubah){
echo "<script>alert('Berhasil');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=ekategori_tampil'>";
} else {
echo "<script>alert('Gagal');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=ekategori_edit&id_ekategori=$id_ekategori'>";
}
?>