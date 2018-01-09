<?php
ob_start();
session_start();
include "../config/koneksi.php";
$id_siswa = $_SESSION['id_siswa'];
$tanggal = date('d M Y');
$n=1;
foreach($_SESSION as $name => $value){
	if($value > 0){
		if(substr($name, 0, 5) == 'cart_'){
			$id = substr($name, 5, (strlen($name)-5));
			$get = mysql_query("SELECT * FROM buku WHERE id_buku='$id'");
			while($get_row = mysql_fetch_array($get)){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<head>
<title>Cetak Struk Peminjaman</title>
</head>
<body>

<img src="../images/header.jpg" width="750" height="130">
<div class="formulir-header" align="center">
<strong>Struk Peminjaman Buku</strong><br />
<u>Dicetak Tanggal&nbsp;&nbsp;&nbsp;&nbsp;  : <?php echo $tanggal; ?></u>
</div>
  
<table width="700" align="center">
	<tr>
    	<td width="113">NIP Peminjam</td>
    	<td width="9">:</td>
    	<td width="556"><?php echo $_SESSION['nip']; ?></td>
	</tr>
	<tr>
    	<td width="113">Nama Peminjam</td>
    	<td width="9">:</td>
    	<td width="556"><?php echo $_SESSION['nama']; ?></td>
	</tr>
	<tr>
    	<td width="113">Alamat Peminjam</td>
    	<td width="9">:</td>
    	<td width="556"><?php echo $_SESSION['alamat']; ?></td>
	</tr>
	<tr>
    	<td width="113">No Telepon</td>
    	<td width="9">:</td>
    	<td width="556"><?php echo $_SESSION['telp']; ?></td>
	</tr>
</table>

<table width="700" border="1" align="center">
	<tr>
		<td width="416" align="center">Judul Buku</td>
		<td width="125" align="center">Lokasi Buku </td>
		<td width="137" align="center">Jumlah Buku</td>
	</tr>

	<tr>
		<th><?php echo $get_row['judul']; ?></th>
		<th><?php echo $get_row['lokasi']; ?></th>
		<th><?php echo $value; ?> buah buku</th>
	</tr>
<?php $n++; } } } } ?>
</table>

<table width="700" align="center">
	<tr>
		<td width="72"><strong>Keterangan</strong></td>
		<td width="10">:</td>
		<td width="602"></td>
	</tr>
	<tr>
		<td width="72"></td>
		<td width="10">1.</td>
		<td width="602">Struk Peminjaman Buku tidak boleh hilang dan rusak.</td>
	</tr>
	<tr>
		<td width="72"></td>
		<td width="10">2.</td>
		<td width="602">Batas pengambilan buku dari tanggal pesan durasi 3 hari, lewat dari 3 hari transaksi peminjaman dibatalkan.</td>
	</tr>
	<tr>
		<td width="72"></td>
		<td width="10">3.</td>
		<td width="602">Jika ada yang memesan buku pada hari Kamis, maka pengambilan buku akan di ambil hari Senin.</td>
	</tr>
</table>

</body>
</html>

<?php
session_destroy();
?>

<?php
$filename="Struk_Peminjaman_".$_SESSION['nama'].".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya  
//==========================================================================================================  
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF  
//==========================================================================================================  
$content = ob_get_clean();   
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'../../html2pdf/html2pdf.class.php');  
 try  
 {  
  $html2pdf = new HTML2PDF('P','A4','en',false, 'ISO-8859-1',array(5, 5, 5, 0));  
  $html2pdf->setDefaultFont('Arial');  
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));  
  $html2pdf->Output($filename);  
 }  
 catch(HTML2PDF_exception $e) { echo $e; }  
?>