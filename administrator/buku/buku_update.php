<?php
include "../config/koneksi.php";

$id_buku 	= $_GET['id_buku'];
$judul		= $_POST ['judul'];
$gambar		= $_FILES['gambar']['name'];
$sumber_gambar = $_FILES['gambar']['tmp_name'];
$deskripsi	= $_POST['deskripsi'];
$pengarang 	= $_POST['pengarang'];
$penerbit 	= $_POST['penerbit'];
$tahun 		= $_POST['tahun'];
$kategori	= $_POST['id_kategori'];
$jumlah 	= $_POST['jumlah'];
$lokasi 	= $_POST['lokasi'];

if(empty($gambar)){

$update = mysql_query(" update buku set judul='$judul',
										deskripsi='$deskripsi',
										id_kategori='$kategori',
										pengarang='$pengarang',
										penerbit='$penerbit',
										tahun='$tahun',
										jumlah='$jumlah',
										lokasi='$lokasi'
										where id_buku='$id_buku'
										 ");

} else {

$buku=mysql_fetch_array(mysql_query("select gambar from buku where id_buku='$id_buku'"));
unlink('../buku/'.$buku['gambar']);

$update = mysql_query(" update buku set judul='$judul',
										deskripsi='$deskripsi',
										gambar='$gambar',
										id_kategori='$kategori',
										pengarang='$pengarang',
										penerbit='$penerbit',
										tahun='$tahun',
										jumlah='$jumlah',
										lokasi='$lokasi'
										where id_buku='$id_buku'
										 ");

move_uploaded_file($sumber_gambar,"../buku/".$gambar);
}
 
if ($update) {
	echo "<script> alert('Berhasil') </script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=buku_tampil'>";	
}
else {
	echo "<script> alert('Gagal') </script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=buku_edit&id_buku=$id_buku'>";
}

?>
