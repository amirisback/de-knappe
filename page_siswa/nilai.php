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
		<link rel="stylesheet" type="text/css" href="../css/body_siswa.css">
		<link rel="stylesheet" type="text/css" href="../css/nilai_siswa.css">
		<link rel="stylesheet" type="text/css" href="../css/font/flaticon.css">
		<link rel="stylesheet" type="text/css" href="#">
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
					<center>Nilai Siswa</center>
				</div>
				<div class="nilai">
					<div class="isi_nilai">
						<div class="info">
						<b>INFO PENTING</b>
							<ul>
							<li>Daftar seluruh nilai siswa</li>
							<li>Nilai yang di bawah KKM adalah tidak tuntas</li>
							<li>Untuk melakukan perbaikan nilai harap menghubungi guru</li>
							</ul>
						</div>
						<div class="nilaix">						
							<?php
								$no=1;
								$jurusansiswa = $data['jurusan'];
								$siswa = $cek;
								$sql_nilai = $conn->query("select * from nilai join mapel on nilai.id_mapel = mapel.id_mapel join remedi on nilai.id_remedi = remedi.id_remedi where id_siswa = '$siswa' order by nilai.id_mapel ASC");
							?>
							<table class="nilais">
								<tr>
									<th>No.</th>
									<th>Kode Mapel</th>
									<th>Mata Pelajaran</th>
									<th>Kode Ulangan</th>
									<th>Jenis Ulangan</th>
									<th>KKM</th>
									<th>Nilai</th>
									<th>Keterangan</th>
								</tr>
									<?php
										while ($nilai = $sql_nilai->fetch_array()) {
									?>
								<tr>
									<td><?php echo $no++ . '.'?></td>
									<td><?php echo $nilai['id_mapel']?></td>
									<td class="left"><?php echo $nilai['nama_mapel']?></td>
									<td><?php echo $nilai['id_remedi']?></td>
									<td class="left"><?php echo $nilai['remedi']?></td>
									<td><?php echo $nilai['kkm']?></td>
									<td class="nilai"><?php echo $nilai['nilai']?></td>
									<?php
										if ($nilai['nilai'] < $nilai['kkm']) {
											echo '<td class="gagal">Tidak Tuntas</td>';	
											} else {
												echo '<td class="tuntas">Tuntas</td>';
											}
									?>
								</tr>
									<?php
											}
									?>
							</table>
						</div>
					</div>
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