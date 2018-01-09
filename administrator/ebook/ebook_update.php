<?php
include "../config/koneksi.php";
$id_ebook 		= $_GET['id_ebook'];
$judul			= $_POST['judul'];
$gambar			= $_FILES['gambar']['name'];
$sumber_gambar	= $_FILES['gambar']['tmp_name'];
$deskripsi		= $_POST['deskripsi'];
$ekategori		= $_POST['id_ekategori'];
$uFile 			= $_FILES['file']['tmp_name'];
$fileName		= $_FILES["file"]["name"];
$splitName		= explode(".", $fileName);
$fileExt		= end($splitName);
$newFileName	= strtolower(substr($judul,0, 2000).'.'.$fileExt);

if(empty($uFile)){

$update = mysql_query("update ebook set judul = '$judul', deskripsi = '$deskripsi' where id_ebook = '$id_ebook'");

} else {

$ebook=mysql_fetch_array(mysql_query("select file from ebook where id_ebook='$id_ebook'"));
unlink('../files/'.$ebook['file']);

$update = mysql_query("update ebook set judul = '$judul', deskripsi = '$deskripsi', file = '$newFileName' where id_ebook = '$id_ebook'");

move_uploaded_file($uFile,"../files/".$newFileName);
}

if(empty($gambar)){

$update = mysql_query("update ebook set judul = '$judul', deskripsi = '$deskripsi', id_ekategori = '$ekategori' where id_ebook = '$id_ebook'");

} else {

$pict=mysql_fetch_array(mysql_query("select gambar from ebook where id_ebook='$id_ebook'"));
unlink('../cover/'.$pict['gambar']);

$update = mysql_query("update ebook set judul = '$judul', gambar = '$gambar', deskripsi = '$deskripsi', id_ekategori = '$ekategori' where id_ebook = '$id_ebook'");

move_uploaded_file($sumber_gambar,"../cover/".$gambar);
}

if ($update) {
	echo "<script> alert('Berhasil') </script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=ebook_tampil'>";	
}
else {
	echo "<script> alert('Gagal') </script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=ebook_edit&id_ebook=$id_ebook'>";
}
?>
