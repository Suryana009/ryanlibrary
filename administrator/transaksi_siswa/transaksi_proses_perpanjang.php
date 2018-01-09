<?php
$id_transaksi = $_GET['id_transaksi'];
$judul = $_GET['judul'];
$tgl_kembali = $_GET['tgl_kembali'];
$lambat = $_GET['lambat'];

if($lambat > 7) {
	echo "<script>alert('Buku yang dipinjam tidak dapat diperpanjang, karena sudah terlambat lebih dari 7 hari. Kembalikan dahulu, kemudian pinjam kembali !');</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=transaksi_siswa'>";
	
	} else {
	include "../koneksi.php"; 

	$pecah			= explode("-",$tgl_kembali);
	$next_7_hari	= mktime(0,0,0,$pecah[1],$pecah[0]+7,$pecah[2]);
	$hari_next		= date("d-m-Y", $next_7_hari);


	$update_tgl_kembali=mysql_query("UPDATE transaksi SET tgl_kembali='$hari_next' WHERE id_transaksi='$id_transaksi'");

	if ($update_tgl_kembali) {
		echo "<script>alert('Berhasil Diperpanjang');</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi_siswa'>";
	} else {
		echo "<script>alert('Gagal Diperpanjang');</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi_siswa'>";
	}
}
?>