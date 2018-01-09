<?php
include('../config/koneksi.php');
session_start();
if(!isset($_SESSION['nama'])){
	echo "<script>alert('Silahkan login terlebih dahulu')</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=login'>";
} else {

//Tambah Barang//
if(isset($_GET['add'])){
	$id_buku = $_GET['add'];
	$qt = mysql_query("SELECT id_buku, jumlah FROM buku WHERE id_buku='$id_buku'");
	while($qt_row = mysql_fetch_array($qt)){
		if($qt_row['jumlah'] != $_SESSION['cart_'.$_GET['add']] && $qt_row['jumlah'] > 0){
			$_SESSION['cart_'.$_GET['add']]+='1';
			header("Location: ?page=keranjang");
		} else {
			echo '<script language="javascript">alert("Stok produk tidak mencukupi!"); document.location="modul.php";</script>';
		}
	}
}

//Hapus 1 Barang//
if(isset($_GET['remove'])){
	$_SESSION['cart_'.$_GET['remove']]--;
	header("Location: ?page=keranjang");
}

//Hapus Barang//
if(isset($_GET['delete'])){
	$_SESSION['cart_'.$_GET['delete']]='0';
	header("Location: ?page=keranjang");
}
?>

					<div class="content" align="center">	
						<div class="table-responsive">				
						<h1>Keranjang Pesanan</h1>
						<table class="table table-striped table-bordered table-hover table-responsive" border="1">
							<thead>
								<tr>
									<th>No</th>
									<th>Gambar</th>
									<th>Judul Buku</th>
									<th>Jumlah</th>
									<th>Lokasi Buku</th>
                                    <th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								
                                <?php 
								$i=1;
								foreach($_SESSION as $judul => $value){
									if($value > 0)
									{
										if(substr($judul, 0, 5) == 'cart_')
										{
											$buku = substr($judul, 5, (strlen($judul)-5));
											$get = mysql_query("SELECT * FROM buku WHERE id_buku='$buku'");
											while($get_row = mysql_fetch_array($get)){
												$id_buku = $get_row['id_buku'];
												echo '
												<tr>
												<td>'.$i.'</td>
												<td><img alt="" src="../buku/'.$get_row['gambar'].'" width="115" height="150" ></td>
												<td>'.$get_row['judul'].'</td>
												<td>'.$value.'</td>
												<td>'.$get_row['lokasi'].'</td>

												<td>
													<a href="?page=keranjang&remove='.$id_buku.'">Kurang</a> | 
													<a href="?page=keranjang&add='.$id_buku.'">Tambah</a> | 
													<a href="?page=keranjang&delete='.$id_buku.'">Hapus</a>
												</td>
												<br>
												</tr>';
												$i++;
											$total += $value;
											}		
										}
									}
								}
								/*
								if(@$total == 0){
									echo 'Keranjang Belanja Kosong!';
									echo '<br>
											<a href="index.php">Kembali Belanja</a>
										  </br>
										  <br>';
								} else {
									echo '<a href="detail.php">&raquo; Detail &laquo;</a>';
									echo '<strong>Total Belanja</strong>: '.@$total.'<br>';
								}
								*/
								
								?>
											  		  
							</tbody>
					  </table>
						
						
						<hr/>
						<p class="buttons center">	
                        <?php 
							if($total == 0){
									echo 'Keranjang Pesanan Kosong!';
									echo '<br>
											<a href="index.php">Kembali Memesan</a>
											
										  </br>
										  <br>';
								} else {
									//echo '<div style="text-align:right; font-size:11px;"><a href="detail.php">&raquo; Detail &laquo;</a></div>';
									echo '<strong>Total Pinjam Buku</strong>: '.$total.'<br>';
									echo '<a href="?page=buku" class="btn" type="button">Kembali Memesan</a> ';
									echo '<a href="?page=selesai&total='.$total.'" class="btn btn-inverse" type="submit">Checkout</a>';
								}
						?>			
						</p>
						</div>					
					</div>
					<?php } ?>