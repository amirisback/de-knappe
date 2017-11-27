<?php 
	session_start();
		include ('../php/connect.php');
		$cek=$_SESSION['user'];
		include ('body_part/query_body.php');
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/font/flaticon.css">	
		<link rel="stylesheet" type="text/css" href="../css/body_siswa.css">
		<link rel="stylesheet" type="text/css" href="../css/home_siswa.css">
		<link rel="icon" href="../images/logo.png">
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
				<div class="desc">
					<div>
					Aplikasi De-Knappe yaitu aplikasi remedial berbasis online yang di buat untuk mempermudahkan siswa SMA / SMK / MAN untuk melakukan remedial tanpa harus bertatapan langsung dengan guru.
					</div>
				</div>
				<div class="twh">
					<?php require_once('body_part/sidebar.php') ?>
				</div>
			</div>
			<div class="isi">
				<div class="judul">
				<center>De-Knappe - Remedial Online System</center>
				</div>
				<div class="menu">
					<center>
						<div class="option">
							<table>
								<tr class="ico">
									<td><a href="profil_siswa.php"><img src="../images/Profil.png"></a></td>
									<td><a href="remedi.php"><img src="../images/Remedi.png"></a></td>
									<td><a href="nilai.php"><img src="../images/Nilai.png"></a></td>
								</tr>
								<tr class="sub">
									<td>
										<div>
											<span>PROFIL SISWA</span>
										</div>
									</td>
									<td>
										<div>
											<span>MULAI REMEDI</span>
										</div>
									</td>
									<td>
										<div>
											<span>NILAI SISWA</span>
										</div>
									</td>
								</tr>
							</table>
						</div>
						<div class="penjelasan">
							<table>
								<tr>
									<th>Profil Menu</th>
									<td>Menu ini untuk melihat profil dari siswa secara lengkap</td>
								</tr>
								<tr>
									<th>Mulai Remedi</th>
									<td>Menu ini untuk memulai remedi siswa</td>
								</tr>
								<tr>
									<th>Nilai Siswa</th>
									<td>Menu ini untuk melihat nilai siswa yang harus di remedi</td>
								</tr>
							</table>
							<img src="../images/twh.png">
						</div>
					</center>
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