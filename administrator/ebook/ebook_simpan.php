<?php
session_start();
include "../config/koneksi.php";
$id_ebook 		= $_POST['id_ebook'];
$judul			= $_POST['judul'];
$gambar			= $_FILES['gambar']['name'];
$sumber_gambar	= $_FILES['gambar']['tmp_name'];
$deskripsi		= $_POST['deskripsi'];
$ekategori		= $_POST['id_ekategori'];
$id_admin		= $_SESSION['id_admin'];
$uFile 			= $_FILES['file']['tmp_name'];
$fileName		= $_FILES["file"]["name"];
$splitName		= explode(".", $fileName);
$fileExt		= end($splitName);
$newFileName	= strtolower(substr($judul,0, 2000).'.'.$fileExt);

move_uploaded_file($sumber_gambar,"../cover/".$gambar);
move_uploaded_file($uFile,"../files/".$newFileName);

$simpan = mysql_query("insert into ebook values ('$id_ebook','$judul','$deskripsi','$ekategori','$gambar','$newFileName','$id_admin')");

move_uploaded_file($sumber_gambar,"../cover/".$gambar);
move_uploaded_file($uFile,"../files/".$newFileName);

if ($simpan) {
	echo "<script> alert('Berhasil') </script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=ebook_tampil'>";	
}
else {
	echo "<script> alert('Gagal') </script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=ebook_tambah'>";
}

?>