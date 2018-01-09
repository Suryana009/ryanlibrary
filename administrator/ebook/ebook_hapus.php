<?php
include '../koneksi.php';

$id_ebook	= $_GET['id_ebook'];
$gambar=mysql_fetch_array(mysql_query("select gambar from ebook where id_ebook='$id_ebook'"));
unlink('../cover/'.$gambar['gambar']);
$file=mysql_fetch_array(mysql_query("select file from ebook where id_ebook='$id_ebook'"));
unlink('../files/'.$file['file']);

$query = mysql_query("DELETE FROM ebook WHERE id_ebook='$id_ebook'");

if ($query) {
		echo "<script>alert('Berhasil')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=ebook_tampil'>";
	} else {
		echo "<script>alert('Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=ebook_tampil'>";
	}


?>