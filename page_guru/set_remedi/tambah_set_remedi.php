<?php 
	session_start();
		include ('../../php/connect.php');
		$cek=$_SESSION['user'];
		include ('../body_part/query_body.php');
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="../../css/template.css">
		<link rel="stylesheet" type="text/css" href="../../css/set_remed.css">
		<link rel="stylesheet" type="text/css" href="../../css/font/flaticon.css">
		<link rel="icon" href="../images/logo.png">
	</head>
	<body>
		<header>
			<ul class="navbar">
			  <li><a href="../../php/logout_guru.php">Keluar<i class="flaticon-close"></i></a></li>
			  <li><a href="../profil_guru.php"><?php echo $data['nama_guru']; ?><i class="flaticon-user-3"></i></a></li>
			</ul>
		</header>
		<?php require_once('../body_part/sidebar_edit.php') ?>
		<div class="content">	
			<div class="gambar">
			</div>
			<div class="isijudul">
			SET REMEDI
			</div>
			<div class="isi">
				<div class="yeezy">
					<form action="" method="POST">
						<table class="form">
							<tr>
								<td><span>Mata Pelajaran</span></td>
								<td><input type="text" name="matapelajaran" value="<?php echo $data['id_mapel']?>" ></td>
							</tr>
							<tr>
								<td><span>Jenis Ulangan</span></td>
								<td>
								<select name="remedi">
									<option>-- PILIH REMEDI --</option>
								<?php 
									$sql_remedi = $conn->query('select * from remedi');
									while ($tarik = $sql_remedi->fetch_array()){
										echo '<option value="'.$tarik['id_remedi'].'">'.$tarik['remedi'].'</option>';
									}
								?>
								</select>
								</td>
							</tr>
							<tr>
								<td><span>Kelas</span></td>
								<td>
									<input type="radio" name="kelas" value="10" checked>10
									<input type="radio" name="kelas" value="11">11
									<input type="radio" name="kelas" value="12">12
								</td>
							</tr>
							<tr>
								<td><span>Waktu Mulai</span></td>
								<td class="jams"><input type="text" name="jam"> : <input type="text" name="menit"></td>
							</tr>
							<tr>
								<td><span>Durasi Waktu</span></td>
								<td class="jams"><input type="text" name="durasi"> &nbsp Menit</td>
							</tr>
							<tr>
								<td><span>Tanggal</span></td>
								<td><input type="date" name="tanggal"></td>
							</tr>
							<tr>
								<td><span>Verfikasi</span></td>
								<td><input type="text" name="verifikasi" required placeholder="Kode Remedi"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type = "submit" name="oke" value="SET REMEDI">
								<?php
									if(isset($_POST['oke'])){
										$a_mapel = $_POST['matapelajaran'];
										$a_remedi = $_POST['remedi'];
										$a_kelas = $_POST['kelas'];
										$a_jam = $_POST['jam'];
										$a_menit = $_POST['menit'];
										$a_durasi = $_POST['durasi'];
										$a_verifikasi = $_POST['verifikasi'];
										$a_tanggal = $_POST['tanggal'];
										$insert_set_remedi = $conn->query("insert into set_remedi values('','$a_verifikasi','$a_mapel','$a_remedi','$a_kelas','$a_jam','$a_menit','$a_durasi','$a_tanggal')");
										if ($insert_set_remedi) {
											echo"Berhasil Set Remedi";
										} else {
											echo"Gagal Set Remedi";
										}
									}
								?>
								</td>
							</tr>
						</table>
					</form>
				</div>
				<div>
				</div>
			</div>
		</div>
		<footer>
			<div class="footer">
			Copyright &copy; De-Knappe [ Remedial Online Sistem ] 2017<br> 
			All rights reserved Telkom University - D3 Teknik Informatika<br>
			</div>
		</footer>
	</body>
</html>
<?php
}
	else
	{
  		header("location: ../../login_guru.php");
	}
?>