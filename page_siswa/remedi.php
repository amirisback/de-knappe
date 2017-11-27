<?php
	session_start();
		include ("../php/connect.php");
		$cek=$_SESSION['user'];
		include ('body_part/query_body.php');
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="../css/body_siswa.css">
		<link rel="stylesheet" type="text/css" href="../css/remedi_siswa.css">
		<link rel="stylesheet" type="text/css" href="../css/font/flaticon.css">
		<link rel="icon" href="../images/logo.png">
		<script src="remedi_part/js/mapel.js"></script>
		<script src="remedi_part/js/kelas.js"></script>
		<script src="remedi_part/js/jurusan.js"></script>
	</head>
	<body>
		<header>
			<ul class="navbar">
			  <li class="keluar"><a href="../php/logout_siswa.php">Keluar<i class="flaticon-close"></i></a></li>
			  <li><a href="profil_siswa.php"><?php echo $data['nama_siswa']?><i class="flaticon-user-3"></i></a></li>
			</ul>
		</header>
		<div class="content">
			<div class="samping">
				<div class="dkp">
					<img src="../images/pict1.png">
				</div>
				<div class="sidebar">
					<div>
						<ul>
							<li><a href="home.php"><i class="flaticon-home"></i> &nbsp Home</a></li>
							<li><a href="profil_siswa.php"><i class="flaticon-user"></i> &nbsp Profil Siswa</a></li>
							<li><a href="remedi.php"><i class="flaticon-edit"></i> &nbsp Mulai Remedi</a></li>
							<li><a href="nilai.php"><i class="flaticon-list-1"></i> &nbsp Nilai Siswa</a></li>
						</ul>
					</div>
				</div>
				<div class="twh">
					<?php require_once('body_part/sidebar.php') ?>
				</div>
			</div>
			<div class="isi">
				<div class="judul">
				<center>Remedi</center>
				</div>
				<div class="isiremedi">
					<div class="info">
					<b>INFO PENTING</b>
						<ul>
						<li>Siswa hanya bisa melakukan remedial maksimal 2x</li>
						<li>Untuk melakukan remedial harus mendapat persetujuan guru</li>
						<li>Remedi hanya bisa di mulai ketika mendapatkan kode verifikasi dari guru</li>
						</ul>
					</div>
					<form action="ujian.php" method="POST">
						<div class="remed">
							<table>
								<tr>
									<td>Remedi</td>
										<td><select name="remedi" onChange="kelas()">
											<option>-- Pilih Remedi --</option>
											<?php
											$sql_remedi = "SELECT * from remedi";
											$query_remedi = $conn->query($sql_remedi);
											while ($r_remedi = $query_remedi->fetch_array()) {
												echo'
												<option value="'.$r_remedi['id_remedi'].'">'.$r_remedi['remedi'].'</option>
												';
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Kelas</td>
									<td id="kelas">Pilih Remedi Dulu</td>
								</tr>
								<tr>
									<td>Jurusan</td>
									<td id="jurusan">Pilh Kelas Dulu</td>
								</tr>
								<tr>
									<td>Mata Pelajaran</td>
									<td id="mapel">Piilh Jurusan Dulu</td>
								</tr>
									<td>Verifikasi</td>
									<td><input type="text" name="kode" placeholder="Kode Remidi" required></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" Value="MULAI REMEDI" name="mulai"></td>
								</tr>
							</table>
						</div>
					</form>
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
  		header("location: ../index.php");
	}
?>