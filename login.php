<h1>Silahkan Login melalui Form Berikut</h1>
<div style='width:300px; margin : 0 auto;'>								
<form style='padding:15px' action="proses_login.php" method='POST'>	
	<input type='text' style='width:100%; padding:4px;' name="nip" placeholder='NIP....'>
	<input style='width:100%; padding:4px;' type='password' name="password" placeholder='Password....'>
	<select  style='padding:4px; margin:4px 0px 4px 0px; width:90%' name='akses'>
		<option value='0' selected>- Pilih Level -</option>
		<option value="siswa">Siswa</option>
		<option value="guru">Guru</option>
	</select>
	<input type='submit' name='login' value='Masuk'>
</form>
</div>