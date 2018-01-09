<?php
include "config/koneksi.php";
include "config/fungsi_kalender.php";
?>
<html>
<head>
	<title>Selamat datang di E-Library SMK Boedi Luhur Tambun Selatan</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
		function myFunction() {
		    $(".sembunyikan").hide();
		}
	</script>
	<script>
		$(document).ready(function(){
			$(".tombol").click(function(){
				$("#hide").toggle(1000);
			});
		});

		$(document).ready(function(){
			$(".tombol1").click(function(){
				$("#hide1").toggle(1000);
			});
		});
	</script>
	
</head>
<body onLoad="myFunction()">
<div id='container'>
	<div id='header'>
		<img class='header' width='1080' height="138" src='images/header.jpg'>
		<ul id='menu'>
			<li><a href='index.php'>Home </a></li>
			<li><a href='index.php?page=buku'>Buku</a>
				<ul class="sub-menu">
				<?php
				$kategori=mysql_query("select kategori, kategori.id_kategori, count(buku.id_buku) as jml from kategori left join buku on buku.id_kategori=kategori.id_kategori group by kategori");
				$no=1;
					while($k=mysql_fetch_array($kategori)){
				?>		
				<li><a href='index.php?page=kategori&id_kategori=<?php echo $k['id_kategori']; ?>'><?php echo $k['kategori']; ?> (<?php echo $k['jml']; ?>)</a></li>
				<?php $no++; } ?>
				</ul>
			</li>
			<li><a href='index.php?page=ebook'>Ebook</a>
				<ul class="sub-menu">
				<?php
				$ekategori=mysql_query("select ekategori, ekategori.id_ekategori, count(ebook.id_ebook) as jml from ekategori left join ebook on ebook.id_ekategori=ekategori.id_ekategori group by ekategori");
				$no=1;
				while($e=mysql_fetch_array($ekategori)){
				?>		
				<li><a href='index.php?page=ekategori&id_ekategori=<?php echo $e['id_ekategori']; ?>'><?php echo $e['ekategori']; ?> (<?php echo $e['jml']; ?>)</a></li>
				<?php $no++; } ?>
				</ul>
			</li>
			<li><a href='index.php?page=pengunjung'>Pengunjung</a></li>
			<li><a href='index.php?page=panduan'>Panduan</a></li>
			<li><a href='index.php?page=login'>Login</a></li>
		</ul>
	</div>
	
	<div id="contentt">
		<div class="artikel">
			<?php
			error_reporting(0);
			switch($_GET['page'])
			{
				default:
				include "konten.php";
				break;
				
				case "ebook";
				include "pengunjung/ebook.php";
				break;
				
				case "pengunjung";
				include "pengunjung/pengunjung.php";
				break;
				
				case "pengunjung_proses";
				include "pengunjung/pengunjung_proses.php";
				break;
				
				case "buku";
				include "pengunjung/buku.php";
				break;
				
				case "panduan";
				include "pengunjung/panduan.php";
				break;
				
				case "login";
				include "login.php";
				break;
				
				case "kategori";
				include "pengunjung/kategori.php";
				break;
				
				case "ekategori";
				include "pengunjung/ekategori.php";
				break;
				
				case "404";
				include "pengunjung/404.php";
				break;
			}
			?>
		</div>
	</div>

	<div id='sidebar'>
		<div class='sidebar'>
			<div class='sidebar'>	
			<div style='clear:both'></div>
				<h2>Apa itu E-Library?</h2>
					  <div style='padding:10px'>	
					  	E-library merupakan singkatan dari Elektronic Library, merupakan cara baru dalam proses peminjaman buku dan membaca buku dengan e-book yang menggunakan media elektronik khususnya internet sebagai sistem peminjaman. 
					  </div>
				<h2>Kalender</h2>
				<?php
				$tgl_skrg=date("d");
				$bln_skrg=date("n");
				$thn_skrg=date("Y");
				echo buatkalender($tgl_skrg,$bln_skrg,$thn_skrg); 
				?>
		</div> 
		</div>
	</div>
	<div style='clear:both'></div><br>
	<div id='footer'>
	<center style='margin-top:10px'>
	  Copyright 2017
	</center>
	</div>
</div>
</body>
</html>