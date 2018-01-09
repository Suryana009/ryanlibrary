<?php
session_start();
include "../config/koneksi.php";

$id_transaksi = $_POST['id_transaksi'];	
$id_guru = $_SESSION['id_guru'];
$nip = $_SESSION['nip'];				  
$nama = $_SESSION['nama'];
$alamat	= $_SESSION['alamat'];
$total = $_POST['total'];
							  
echo 'Terima kasih Anda sudah memesan buku di Perpustakaan Online kami. Dan berikut ini adalah data yang anda masukkan.';
echo '<p>Dan buku akan Anda pinjam atas nama:</p>';
echo '<p>NIP : '.$nip.'<br>';
echo '<p>Nama : '.$nama.'<br>';
echo '<p>Alamat : '.$alamat.'<br>';
echo '<p>Dengan Rincian : </p>';
							  
							  
									$i=1;
									foreach($_SESSION as $name => $value)
									{
										if($value > 0)
										{
											if(substr($name, 0, 5) == 'cart_')
											{
												$id = substr($name, 5, (strlen($name)-5));
												$get = mysql_query("SELECT * FROM buku WHERE id_buku='$id'");
												while($get_row = mysql_fetch_array($get)){
													
													
													echo '<p>'.$i.' '.$get_row['judul'].' '.$get_row['lokasi'].' SubTotal : '.$value.' buku</p>								';										  	
													
													
													$i++;	  			
												}
												mysql_query("INSERT INTO transaksi VALUES('$id_transaksi', '$id', '', '$id_guru', now(), '', '', 'Menunggu') ") or die(mysql_error());		
											}
										}
									}
						  ?>
						  <p align="center"><a href="cetak_peminjaman.php">Cetak Struk Peminjaman</a></p>