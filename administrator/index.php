<?php
error_reporting(0);
session_start();
include "../config/koneksi.php";
$id_admin=$_SESSION['id_admin'];

if(empty($_SESSION['nama_lengkap'])){
	echo "<meta http-equiv='refresh' content='0; url=login.php'>";
} else {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Halaman Administrator Perpustakaan Ryan Library</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/screen.css" type="text/css"/>
<link rel="stylesheet" href="css/fancybox.css" type="text/css"/>
<link rel="stylesheet" href="css/jquery.wysiwyg.css" type="text/css"/>
<link rel="stylesheet" href="css/jquery.ui.css" type="text/css"/>
<link rel="stylesheet" href="css/visualize.css" type="text/css"/>
<link rel="stylesheet" href="css/visualize-light.css" type="text/css"/>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.visualize.js"></script>
<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/jquery.idtabs.js"></script>
<script type="text/javascript" src="js/jquery.datatables.js"></script>
<script type="text/javascript" src="js/jquery.jeditable.js"></script>
<script type="text/javascript" src="js/jquery.ui.js"></script>

<script type="text/javascript" src="js/excanvas.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>
<script type="text/javascript" src="js/Geometr231_Hv_BT_400.font.js"></script>

<script language="javascript" type="text/javascript">
    tinyMCE_GZ.init({
    plugins : 'style,layer,table,save,advhr,advimage, ...',
		themes  : 'simple,advanced',
		languages : 'en',
		disk_cache : true,
		debug : false
});
</script>
<script language="javascript" type="text/javascript"
src="../tinymcpuk/tiny_mce_src.js"></script>
<script type="text/javascript">
tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,preview,zoom,separator,forecolor,backcolor,liststyle",
		theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
		theme_advanced_buttons3_add : "emotions,flash",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		extended_valid_elements : "hr[class|width|size|noshade]",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		apply_source_formatting : true
});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
		var enableAutoTypeSelection = true;
		
		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;
		
		switch (type) {
			case "image":
				cType = "Image";
				break;
			case "flash":
				cType = "Flash";
				break;
			case "file":
				cType = "File";
				break;
		}
		
		if (enableAutoTypeSelection && cType) {
			connector += "&Type=" + cType;
		}
		
		window.open(connector, "tinymcpuk", "modal,width=600,height=400");
	}
</script>

<style type="text/css">
<!--
.style3 {
	color: #62A621;
	font-weight: bold;
}
-->
</style>
</head>

<body>
	
	<div class="sidebar">
		<div class="logo clear"></div>
		
		<div class="menu">
		  <ul><li><a href="#">MENU UTAMA</a>
			  <ul>
				  <li><a href='?page=siswa_tampil'><b>Data Siswa</b></a></li>
				  <li><a href='?page=guru_tampil'><b>Data Guru</b></a></li>
				  <li><a href='?page=buku_tampil'><b>Data Buku</b></a></li>
				  <li><a href='?page=ebook_tampil'><b>Data Ebook</b></a></li>
				  <li><a href='?page=kategori_tampil'><b>Data Kategori Buku</b></a></li>
				  <li><a href='?page=ekategori_tampil'><b>Data Kategori Ebook</b></a></li>
				  <li><a href='?page=transaksi_siswa'><b>Data Transaksi Siswa</b></a></li>
				  <li><a href='?page=transaksi_guru'><b>Data Transaksi Guru</b></a></li>
				  <li><a href=''><b>Lihat Laporan Transaksi</b></a></li>
				  <li><a href='?page=backup'><b>Backup Data</b></a></li>
			  </ul>
			</ul>
	  </div>
	</div>
	
	
	<div class="main"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="header clear">
			<ul class="links clear">
			<li>:::: <strong>Selamat Datang <?php echo $_SESSION['nama_lengkap']; ?></strong>&nbsp;::::&nbsp;</li>
			<li><a href="modul.php"><img src="images/home.png" alt="" class="icon" /> <span class="text">Beranda</span></a></li>
			<li><a href="logout.php" onClick="return confirm('Anda yakin ingin Keluar ?')"><img src="images/ico_logout_24.png" alt="" class="icon" /> <span class="text">Keluar</span></a></li>
			</ul>
		</div>
		
		<div class="page clear">			
			<!-- MODAL WINDOW -->
			<div id="modal" class="modal-window">
				<!-- <div class="modal-head clear"><a onclick="$.fancybox.close();" href="javascript:;" class="close-modal">Close</a></div> -->
				
				
			</div>
			
			<!-- CONTENT BOXES -->
			<!-- end of content-box -->
<div class="notification note-success">
	<?php
	error_reporting(0);
	switch($_GET['page'])
	{
		default:
		include "konten.php";
		break;
		
		case "backup";
		include "../administrator/utility/backup.php";
		break;
		
		case "kategori_tampil";
		include "../administrator/kategori/kategori_tampil.php";
		break;
		case "kategori_tambah";
		include "../administrator/kategori/kategori_tambah.php";
		break;
		case "kategori_simpan";
		include "../administrator/kategori/kategori_simpan.php";
		break;
		case "kategori_edit";
		include "../administrator/kategori/kategori_edit.php";
		break;
		case "kategori_update";
		include "../administrator/kategori/kategori_update.php";
		break;
		case "kategori_hapus";
		include "../administrator/kategori/kategori_hapus.php";
		break;
		
		case "ekategori_tampil";
		include "../administrator/ekategori/ekategori_tampil.php";
		break;
		case "ekategori_tambah";
		include "../administrator/ekategori/ekategori_tambah.php";
		break;
		case "ekategori_simpan";
		include "../administrator/ekategori/ekategori_simpan.php";
		break;
		case "ekategori_edit";
		include "../administrator/ekategori/ekategori_edit.php";
		break;
		case "ekategori_update";
		include "../administrator/ekategori/ekategori_update.php";
		break;
		case "ekategori_hapus";
		include "../administrator/ekategori/ekategori_hapus.php";
		break;
		
		case "buku_tampil";
		include "../administrator/buku/buku_tampil.php";
		break;
		case "buku_tambah";
		include "../administrator/buku/buku_tambah.php";
		break;
		case "buku_simpan";
		include "../administrator/buku/buku_simpan.php";
		break;
		case "buku_edit";
		include "../administrator/buku/buku_edit.php";
		break;
		case "buku_update";
		include "../administrator/buku/buku_update.php";
		break;
		case "buku_hapus";
		include "../administrator/buku/buku_hapus.php";
		break;
		
		case "ebook_tampil";
		include "../administrator/ebook/ebook_tampil.php";
		break;
		case "ebook_tambah";
		include "../administrator/ebook/ebook_tambah.php";
		break;
		case "ebook_simpan";
		include "../administrator/ebook/ebook_simpan.php";
		break;
		case "ebook_edit";
		include "../administrator/ebook/ebook_edit.php";
		break;
		case "ebook_update";
		include "../administrator/ebook/ebook_update.php";
		break;
		case "ebook_hapus";
		include "../administrator/ebook/ebook_hapus.php";
		break;
		
		case "siswa_tampil";
		include "../administrator/siswa/siswa_tampil.php";
		break;
		case "siswa_tambah";
		include "../administrator/siswa/siswa_tambah.php";
		break;
		case "siswa_simpan";
		include "../administrator/siswa/siswa_simpan.php";
		break;
		case "siswa_edit";
		include "../administrator/siswa/siswa_edit.php";
		break;
		case "siswa_update";
		include "../administrator/siswa/siswa_update.php";
		break;
		case "siswa_hapus";
		include "../administrator/siswa/siswa_hapus.php";
		break;
		
		case "guru_tampil";
		include "../administrator/guru/guru_tampil.php";
		break;
		case "guru_tambah";
		include "../administrator/guru/guru_tambah.php";
		break;
		case "guru_simpan";
		include "../administrator/guru/guru_simpan.php";
		break;
		case "guru_edit";
		include "../administrator/guru/guru_edit.php";
		break;
		case "guru_update";
		include "../administrator/guru/guru_update.php";
		break;
		case "guru_hapus";
		include "../administrator/guru/guru_hapus.php";
		break;
		
		case "transaksi_siswa";
		include "../administrator/transaksi_siswa/transaksi_tampil.php";
		break;
		case "transaksi_siswa_tambah";
		include "../administrator/transaksi_siswa/transaksi_tambah.php";
		break;
		case "transaksi_siswa_simpan";
		include "../administrator/transaksi_siswa/transaksi_simpan.php";
		break;
		case "transaksi_siswa_pinjam";
		include "../administrator/transaksi_siswa/transaksi_pinjam.php";
		break;
		case "transaksi_siswa_proses_pinjam";
		include "../administrator/transaksi_siswa/transaksi_proses_pinjam.php";
		break;
		case "transaksi_siswa_proses_perpanjang";
		include "../administrator/transaksi_siswa/transaksi_proses_perpanjang.php";
		break;
		case "transaksi_siswa_proses_kembali";
		include "../administrator/transaksi_siswa/transaksi_proses_kembali.php";
		break;
		
		case "transaksi_guru";
		include "../administrator/transaksi_guru/transaksi_tampil.php";
		break;
		case "transaksi_guru_tambah";
		include "../administrator/transaksi_guru/transaksi_tambah.php";
		break;
		case "transaksi_guru_simpan";
		include "../administrator/transaksi_guru/transaksi_simpan.php";
		break;
		case "transaksi_guru_pinjam";
		include "../administrator/transaksi_guru/transaksi_pinjam.php";
		break;
		case "transaksi_guru_proses_pinjam";
		include "../administrator/transaksi_guru/transaksi_proses_pinjam.php";
		break;
		case "transaksi_guru_proses_perpanjang";
		include "../administrator/transaksi_guru/transaksi_proses_perpanjang.php";
		break;
		case "transaksi_guru_proses_kembali";
		include "../administrator/transaksi_guru/transaksi_proses_kembali.php";
		break;
	}					
	?>
</div>
			<div class="clear">
				<!-- end of content-box -->
			
		</div><!-- end of page -->
		
		<div class="footer clear"></div>
	</div>
	</div>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-12958851-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>

<meta http-equiv="content-type" content="text/html;charset=UTF-8">
</html>

<?php } ?>