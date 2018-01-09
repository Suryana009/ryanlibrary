<?php
session_start();
include "../config/fungsi_indotgl.php";
include "../config/koneksi.php";
$id_admin=$_SESSION['id_admin'];



if(empty($_SESSION['nama_lengkap'])){
	echo "<script>alert('Silahkan login terlebih dahulu')</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="2%">&nbsp;</td>
      <td width="95%"> 
	  <h2>Selamat Datang</h2>
          <p>Hai <b><?php echo $_SESSION['nama_lengkap']; ?></b>, selamat datang di halaman Administrator.<br> Silahkan klik menu pilihan yang berada 
          di sebelah kiri untuk mengelola konten website anda. </p>
          <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
          <p align=right>Login : <?php echo tgl_indo(date("Y m d")); ?></p></td>
      <td width="3%">&nbsp;</td>
    </tr>
  </table>
<?php } ?>