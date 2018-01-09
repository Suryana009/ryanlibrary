<?php
$username="root";
$password="";
$host="localhost";
$database="ryanlibrary";
$konek=mysql_connect($host,$username,$password,$database) or die ("koneksi server gagal");
mysql_select_db($database,$konek) or die ("koneksi database gagal");

$denda=1000;
?>