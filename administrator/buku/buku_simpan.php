<?php
include '../config/koneksi.php';

$id_buku 	= $_POST['id_buku'];
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

$input = mysql_query("insert into buku values('$id_buku','$judul','$deskripsi','$gambar','$kategori','$pengarang','$penerbit','$tahun','$jumlah','$lokasi')");
move_uploaded_file($sumber_gambar,"../buku/".$gambar);

if ($input) {
	echo "<script> alert('Berhasil') </script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=buku_tampil'>";	
}
else {
	echo "<script> alert('Gagal') </script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=buku_tambah'>";	
}

?>
