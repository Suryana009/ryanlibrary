<?php
include "config/koneksi.php";
$id_kategori	= $_GET['id_kategori'];
$per_halaman	=3;
$hal			= isset($_GET['hal']) ? $_GET['hal'] : "";


if ($hal==""||$hal==1) {
	$awal=0;
} else {
	$awal=($hal*$per_halaman)-$per_halaman;
}
$batas=$per_halaman;
//$batas=($hal*2)+$per_halaman;

$query=mysql_query("SELECT * FROM buku ORDER BY id_buku desc LIMIT $awal,$batas");
$query2=mysql_query("SELECT * FROM buku where id_kategori='$id_kategori'");
$jumlah_buku=mysql_num_rows($query2);
$jum_halaman=ceil($jumlah_buku/$per_halaman);
//echo $jum_halaman;
?>
<h1>Halaman Buku</h1>
<table border=0px cellpadding='10' cellspacing="2" bgcolor="" bordercolor="">
	<tr>
     
<?php
	$kolom=3;
	$x = 0;
	if($jumlah_buku > 0){
	while($data=mysql_fetch_array($query2))
		{
		    if ($x >= $kolom) 
			    {
			      echo "</tr><tr>";
			      $x = 0;
				}
	$x++;
?>

<td align=center>			 
	<div>
    	<?php echo $data['judul']; ?><br /><br />
    </div>
    
    <div>
		<img width='125' height='150' src='../buku/<?php echo $data['gambar']; ?>'><br /><br />
	</div>		 
	
    <div>
        <a href="">Detail</a> <a href="?page=keranjang&add=<?php echo $data['id_buku']; ?>">Pinjam</a>
	</div>

</td>
            
<?php
	}
	}
?>

</tr>
</table>
<?php
echo "<center><font size='3px'>Page : </font>";
for ($i=1; $i<=$jum_halaman; $i++) {
	if ($i==$hal) {
	echo "<font size='4px' color='green'>[<a href='?page=buku&hal=$i'><b>$i</b></a>]  </font>";
	} else {
	echo "<font size='2px' color='red'><a href='?page=buku&hal=$i'><b>$i</b></a> </font>";
	}
}
echo "</center>";
?>