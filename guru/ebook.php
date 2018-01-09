<?php
include "config/koneksi.php";
$per_halaman	=3;
$hal			= isset($_GET['hal']) ? $_GET['hal'] : "";


if ($hal==""||$hal==1) {
	$awal=0;
} else {
	$awal=($hal*$per_halaman)-$per_halaman;
}
$batas=$per_halaman;
//$batas=($hal*2)+$per_halaman;

$query=mysql_query("SELECT * FROM ebook ORDER BY id_ebook desc LIMIT $awal,$batas");
$query2=mysql_query("SELECT * FROM ebook");
$jumlah_ebook=mysql_num_rows($query2);
$jum_halaman=ceil($jumlah_ebook/$per_halaman);
//echo $jum_halaman;
?>
<h1>Halaman Ebook</h1>
<table border=0px cellpadding='10' cellspacing="2" bgcolor="" bordercolor="">
	<tr>
     
<?php
	$kolom=3;
	$x = 0;
	if($jumlah_ebook > 0){
	while($data=mysql_fetch_array($query))
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
		<img width='125' height='150' src='../cover/<?php echo $data['gambar']; ?>'><br /><br />
	</div>		 
	
    <div>
        <a href="../files/<?php echo $data['file']; ?>"><img width="90" height="30" src="../images/download_button.png" /></a>
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
	echo "<font size='4px' color='green'>[<a href='?page=ebook&hal=$i'><b>$i</b></a>]  </font>";
	} else {
	echo "<font size='2px' color='red'><a href='?page=ebook&hal=$i'><b>$i</b></a> </font>";
	}
}
echo "</center>";
?>