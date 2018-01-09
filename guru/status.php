	<div class="panel-body">
		<?php
		error_reporting(0);
		session_start();
		include "../config/koneksi.php";
		include "status_fungsi.php";
		$id_guru = $_SESSION['id_guru'];
		?>
		<div class="table-responsive">
		<h1 class="title"><span class="text"><strong>Status</strong> Peminjaman</span></h1>
		<table class="table table-condensed table-bordered table-hover table-responsive" border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul Buku</th>
					<th>Tanggal Pesan</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Status</th>
				</tr>
			</thead>
			<?php
			$query = "SELECT * FROM transaksi a join buku b ON a.id_buku=b.id_buku
													join guru c ON a.id_guru=c.id_guru
													where a.id_guru='$id_guru'";
			$sql = mysql_query($query);
			$total = mysql_num_rows($sql);
			$no = 1;
				
			while ($data=mysql_fetch_array($sql)) {
			?>
			<tbody>
   	          	<tr>
   	            	<td align="center"><?php echo $no; ?></td>
   	            	<td><?php echo $data['judul']; ?></td>
					<td><?php echo $data['tgl_pesan']; ?></td>
   	            	<td align="center"><?php echo $data['tgl_pinjam']; ?></td>
   	            	<td align="center"><?php echo $data['tgl_kembali']; ?></td>
					<td align="center"><strong><?php echo $data['status']; ?></strong></td>
				</tr>   
			</tbody>
			<?php $no++; } ?>          
		</table> 
		</div>
	</div>
