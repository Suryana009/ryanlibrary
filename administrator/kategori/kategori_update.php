<?php
include "../config/koneksi.php";
$id_kategori	= $_GET['id_kategori'];
$kategori		= $_POST['kategori'];
$ubah = mysql_query("update kategori set kategori='$kategori' where id_kategori='$id_kategori'");

if($ubah){
echo "<script>alert('Berhasil');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=kategori_tampil'>";
} else {
echo "<script>alert('Gagal');</script>";
echo "<meta http-equiv='refresh' content='0 url=?page=kategori_edit&id_kategori=$id_kategori'>";
}
?>