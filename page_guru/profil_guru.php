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
		<link rel="stylesheet" type="text/css" href="../css/template.css">
		<link rel="stylesheet" type="text/css" href="../css/profil_guru.css">
		<link rel="stylesheet" type="text/css" href="../css/font/flaticon.css">
		<link rel="icon" href="../images/logo.png">
	</head>
	<body>
		<header>
			<ul class="navbar">
			  <li><a href="../php/logout_guru.php">Keluar<i class="flaticon-close"></i></a></li>
			  <li><a href="profil_guru.php"><?php echo $data['nama_guru']; ?><i class="flaticon-user-3"></i></a></li>
			</ul>
		</header>
		<?php require_once('body_part/sidebar.php') ?>
		<div class="content">	
			<div class="gambar">
			</div>
			<div class="isijudul">
			PROFIL GURU
			</div>
			<div class="isi">
				<div class="profil_guru">
					<?php echo'<img src="../images/foto_guru/'.$data['foto_guru'].'">'?>
					<div class="underfoto">
						<?php echo $data['nama_guru']; ?>
					</div>
					<table class="table">
						<tr>
							<td>Nama</td>
							<td>: <?php echo $data['nama_guru']; ?></td>
						</tr>
						<tr>
							<td>NIP</td>
							<td>: <?php echo $data['id_guru']; ?></td>
						</tr>
						<tr>
							<td>Mata Pelajaran</td>
							<td>: <?php echo $data['nama_mapel']; ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>: <?php echo $data['alamat_guru']; ?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>: <?php echo $data['gender_guru']; ?></td>
						</tr>
						<tr>
							<td>No. Telepon</td>
							<td>: <?php echo $data['telp_guru']; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>: <?php echo $data['email_guru']; ?></td>
						</tr>
					</table>
					<div class="edit">
						<a href="profil/edit_profil_guru.php">UBAH PROFIL</a>
					</div>
				</div>
				<div class="penjelasan">
					<table>
						<tr>
							<th>Set Remedi</th>
							<td>Menu ini untuk men set waktu dari remedi</td>
						</tr>
						<tr>
							<th>Siswa</th>
							<td>Menu ini untuk menambah, mengubah, menghapus data siswa</td>
						</tr>
						<tr>
							<th>Soal</th>
							<td>Menu ini untuk menambah, mengubah, menghapus data soal</td>
						</tr>
						<tr>
							<th>Nilai</th>
							<td>Menu ini untuk menambah, mengubah, menghapus data nilai siswa</td>
						</tr>
					</table>
					<img src="../images/twh.png">
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
  		header("location: ../login_guru.php");
	}
?>