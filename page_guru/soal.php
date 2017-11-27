<?php 
	session_start();
		include ('../php/connect.php');
		$cek=$_SESSION['user'];
		include ('body_part/query_body.php');
		include ('body_part/query_content.php');
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="../css/template.css">
		<link rel="stylesheet" type="text/css" href="../css/view_guru.css">
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
			LIST SOAL
			</div>
			<div class="isi">
				<div class="info-pilihan">
					<span>INFO PENTING</span>
					<ul>
						<li>Guru Dapat Menambahkan Soal</li>
						<li>Guru Dapat Mengubah Soal</li>
						<li>Guru Dapat Menghapus Soal</li>
					</ul>
				</div>
				<div class="insert-data">
					<a href="list_soal/tambah_soal.php">Tambah Soal</a><span>Klik ini untuk menambah soal remedi</span>
				</div>
				<div class="yeezy">				
					<table class="list">
						<tr>
							<th>NO.</th>
							<th>MATA PELAJARAN</th>
							<th>JENIS ULANGAN</th>
							<th>KELAS</th>
							<th>SOAL</th>
							<th>JAWABAN</th>
							<th colspan="2">ACTION</th>
						</tr>
						<?php
						while ($r_soal = $query_soal->fetch_array()) {
							echo'
							<tr>
							<td>'.$no++.'.</td>
							<td>'.$r_soal['nama_mapel'].'</td>
							<td>'.$r_soal['remedi'].'</td>
							<td>'.$r_soal['kelas'].'</td>
							<td>'.$r_soal['soal'].'</td>
							<td>'.$r_soal['jawaban'].'</td>
							<td class="edit"><a href="list_soal/edit_soal.php?no_soal='.$r_soal['no_soal'].'"><i class="flaticon-edit"></i></a></td>
							<td class="hapus"><a href="list_soal/hapus_soal.php?no_soal='.$r_soal['no_soal'].'"><i class="flaticon-garbage"></i></a></td>
							</tr>
							';
						}
						?>
					</table>
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