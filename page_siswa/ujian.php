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
		<link rel="stylesheet" type="text/css" href="../css/ujian_siswa.css">
		<link rel="stylesheet" type="text/css" href="../css/font/flaticon.css">
		<script src="remedi_part/js/jQuery.js" type="text/javascript"></script>
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
				<center>Remedi</center>
				</div>
				<div class="output-soal">
                    <div class="out">
						<?php
						if (isset($_POST['mulai'])){
						$remedi = $_POST['remedi'];
						$mapel = $_POST['mapel'];
						$kelas = $_POST['kelas'];
						$kode = $_POST['kode'];
						$sql_setremed = "SELECT * from set_remedi join remedi on (set_remedi.id_remedi=remedi.id_remedi) join mapel on (set_remedi.id_mapel=mapel.id_mapel) where kode_remedi='$kode' and set_remedi.id_remedi='$remedi' and set_remedi.id_mapel = '$mapel' and kelas=$kelas ";
						$cek_set = $conn->query($sql_setremed);

						if ($tarik = $cek_set->fetch_array()) {
							$sql_soal = "SELECT * from soal join remedi on (soal.id_remedi=remedi.id_remedi) join mapel on (soal.id_mapel=mapel.id_mapel) where soal.id_remedi='$remedi' AND soal.id_mapel='$mapel' AND kelas='$kelas'";
							$query_soal = $conn->query($sql_soal);
							$jumlah = mysqli_num_rows($query_soal);
							$no = 1;
							$jam = $tarik['durasi'] / 60;
							$jams = explode('.',$jam);
							$menits = $tarik['durasi'] % 60; 
								?>
						<div class="soal">
							<div class="countdown">
								<table>
									<tr>
										<th><span>Remedi</span></th>
										<th><span>: &nbsp <?php echo $tarik['remedi']?></span></th>
										<td rowspan="3">
											<center>
											<div id="timer">
												<?php require_once('body_part/timer_ujian.php') ?>
											</div>
											</center>
										</td>
									</tr>
									<tr>
										<th><span>Mata Pelajaran</span></th>
										<th><span>: &nbsp <?php echo $tarik['nama_mapel']?></span></th>
									</tr>
									<tr>
										<th><span>Kelas</span></th>
										<th><span>: &nbsp <?php echo $tarik['kelas']?></span></th>
									</tr>
								</table>
							</div>
								<form action="jawaban.php" method="POST">
								<?php
									while ($row = $query_soal->fetch_array()) {
									$id = $row["no_soal"];
									$soal = $row["soal"];
									$a = $row["pil_a"];
									$b = $row["pil_b"];
									$c = $row["pil_c"];
									$d = $row["pil_d"];
									echo'
									<input type="hidden" name="id[]" value="'.$id.'">
									<input type="hidden" name="jumlah" value="'.$jumlah.'">
									<input type="hidden" name="t_remedi" value="'.$remedi.'">
									<input type="hidden" name="t_mapel" value="'.$mapel.'">
									<input type="hidden" name="t_kelas" value="'.$kelas.'">
									<div class="ini-soal">
										<table>
											<tr>
												<td>'.$no++.'.</td>
												<td>'.$soal.'</td>
											</tr>
											<tr>
												<td></td>
												<td><input type="radio" name="pilihan['.$id.']" value="a">'.$a.'</td>
											</tr>
											<tr>
												<td></td>
												<td><input type="radio" name="pilihan['.$id.']" value="b">'.$b.'</td>
											</tr>
											<tr>
												<td></td>
												<td><input type="radio" name="pilihan['.$id.']" value="c">'.$c.'</td>
											</tr>
											<tr>
												<td></td>
												<td><input type="radio" name="pilihan['.$id.']" value="d">'.$d.'</td>
											</tr>
										</table> 
									</div>                     
									';
									}
								?>
									<div class="submit">
										<input type="submit" name="oke" value="FINISH">
									</div>
								</form>
							</div>
							<?php
                    } else {
						echo "<center><span style='color:red; font-size:23px'><i>ANDA TIDAK BISA MENGIKUTI REMEDI INI</i></span>
							<br><br><span>Hubungi Guru Anda Untuk Melakukan Remedi</span></center>";
					}

					}	
				?>
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