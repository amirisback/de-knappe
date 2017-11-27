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
		<link rel="stylesheet" type="text/css" href="../css/update_nilai.css">
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
                    <?php
                        $nis = $_GET['id_siswa'];
                        $mapel = $_GET['id_mapel'];
                        $remedi = $_GET['id_remedi'];
						$h_remedi = $_GET['nilai'];
                        $sql_mapel = "select * from mapel where id_mapel = '$mapel'";
                        $q_mapel = $conn->query($sql_mapel);
                        $cari = $q_mapel->fetch_array();
                        $kkm = $cari['kkm'];

						if ($h_remedi <= $kkm ) {
							$newNilai =  $h_remedi;
						} else {
							$newNilai = $kkm;
						}

						$s_desc = "SELECT nama_mapel, remedi from soal join mapel on soal.id_mapel = mapel.id_mapel join remedi on soal.id_remedi=remedi.id_remedi where soal.id_remedi = '$remedi' and soal.id_mapel = '$mapel' ";
						$q_desc = $conn->query($s_desc);
						$desc = $q_desc->fetch_array();
                        $sql_update = "UPDATE nilai set nilai = $newNilai where id_siswa = $nis and id_mapel ='$mapel' and id_remedi='$remedi' ";
                        $q_update = $conn->query($sql_update);
					?>
					<div class="page-hasil">
						<div class="border-hasil">
							<?php
							
							if ($q_update) {
								echo '<b><i><center>SELAMAT NILAI ANDA BERHASIL DI PERBAIKI</center></i></b><br>';
								if ($newNilai <= $kkm) {
									?>
									<div class="nilai-baru">
										<center>
											<table>
												<tr>
													<td><span>Jenis Ulangan</span></td>
													<td>: <?php echo $desc['remedi']?></td>
												</tr>
												<tr>
													<td><span>Mata Pelajaran</span></td>
													<td>: <?php echo $desc['nama_mapel']?></td>
												</tr>
												<tr>
													<td><span>Nilai Remedi</span></td>
													<td>: <?php echo $h_remedi ?></td>
												</tr>
												<tr>
													<td><span>Nilai Perbaikan</span></td>
													<td>: <span class="merah"><?php echo $newNilai ?></span></td>
												</tr>
											</table>
										</center>	
									</div>
									<?php
								} else {
									?>
									<div class="nilai-baru">
										<center>
											<table>
												<tr>
													<td><span>Jenis Ulangan</span></td>
													<td>: <?php echo $desc['remedi']?></td>
												</tr>
												<tr>
													<td><span>Mata Pelajaran</span></td>
													<td>: <?php echo $desc['nama_mapel']?></td>
												</tr>
												<tr>
													<td><span>Nilai Remedi</span></td>
													<td>: <?php echo $h_remedi ?></td>
												</tr>
												<tr>
													<td><span>Nilai Perbaikan</span></td>
													<td>: <span class="hijau"><?php echo $newNilai ?></span></td>
												</tr>
											</table>
										</center>	
									</div>
									<?php
								}
								?>
									<div class="button">
										<center>
											<span>Untuk melihat nilai yang telah di perbaiki</span><br><br>
											<a href="nilai.php">LIHAT NILAI</a>
										</center>
									</div>
								<?php
							}
							?>
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