<?php
session_start();
include "config/koneksi.php";
$nip		= $_POST['nip'];
$password	= $_POST['password'];
$akses		= $_POST['akses'];

if($akses == ""){
session_destroy();
echo "<script> alert('Anda Belum Memilih Hak Akses') </script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?page=login'>";

} elseif($akses == "guru"){
$query  = mysql_query("select * from guru where nip='$nip' and password='$password'");
$jumlahdata = mysql_num_rows($query);
$guru  = mysql_fetch_array($query);
	if ($jumlahdata > 0){
	
	$_SESSION['id_guru']	= $guru['id_guru'];
	$_SESSION['nip']		= $guru['nip'];
	$_SESSION['nama'] 		= $guru['nama'];
	$_SESSION['alamat']		= $guru['alamat'];
	$_SESSION['telp']		= $guru['telp'];
	$_SESSION['loginguru']=1;
	mysql_close();
	header("location: guru/index.php");
	} else {
	mysql_close();
	session_destroy();
	echo "<script> alert('Maaf, Login Gagal !!!') </script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=login'>";
	
	}
} elseif($akses == "siswa"){
$query  = mysql_query("select * from siswa where nip='$nip' and password='$password'");
$jumlahdata = mysql_num_rows($query);
$siswa  = mysql_fetch_array($query);
	if ($jumlahdata > 0){
	
	$_SESSION['id_siswa']	= $siswa['id_siswa'];
	$_SESSION['nip']		= $siswa['nip'];
	$_SESSION['nama']		= $siswa['nama'];
	$_SESSION['alamat']		= $siswa['alamat'];
	$_SESSION['telp']		= $siswa['telp'];
	$_SESSION['loginsiswa']=1;
	mysql_close();
	header("location: siswa/index.php");
	} else {
	mysql_close();
	session_destroy();
	echo "<script> alert('Maaf, Login Gagal !!!') </script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=login'>";
	}
	
} else {
session_destroy();
echo "<script> alert('Maaf, Login Gagal !!!') </script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?page=login'>";
}

?>