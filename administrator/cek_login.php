<?php
error_reporting(0);
session_start();
include "../config/koneksi.php";
$username	= $_POST['username'];
$password	= $_POST['password'];

$cek=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
$jumlahdata=mysql_num_rows($cek);
$admin=mysql_fetch_array($cek);
if($jumlahdata>0) //apabila datanya diketemukan
{
session_start(); //skrip memulai sesi
$_SESSION['id_admin']=$admin['id_admin']; //memasukan nilai sesi dari nilai di tabel member
$_SESSION['nama_lengkap']=$admin['nama_lengkap'];
$_SESSION['loginadmin']=1;

echo "<script>alert('Anda berhasil Log In.');</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else {	
echo "<meta http-equiv='refresh' content='0; url=login.php'>";
echo "<script>alert('Anda Gagal Log In');</script>";
}
?>