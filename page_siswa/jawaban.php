<?php
	session_start();
		include ('../php/connect.php');
		$cek=$_SESSION['user'];
		include ('body_part/query_body.php');
		$nis = $data['id_siswa'];
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="../css/body_siswa.css">
		<link rel="stylesheet" type="text/css" href="../css/font/flaticon.css">
		<link rel="stylesheet" type="text/css" href="../css/jawaban_siswa.css">
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
				<center>Hasil</center>
                 <?php
                    if (isset($_POST['oke'])){
                        $pilihan = $_POST['pilihan'];
                        $id = $_POST['id'];
                        $jumlah = $_POST['jumlah'];

						$remedi = $_POST['t_remedi'];
                        $mapel = $_POST['t_mapel'];
                        $kelas = $_POST['t_kelas'];

						$lulus1 = "SELAMAT ANDA LULUS DALAM REMEDI";
						$lulus2 = "Silahkan Submit Nilai Untuk Memperbaiki Nilai";

						$gagal1 = "MOHON MAAF NILAI ANDA MASIH BELUM MEMENUHI";
						$gagal2 = "Silahkan Menghubungi Guru Untuk Remedial Ulang";

                       	$sql_soal = "select * from soal join remedi on (soal.id_remedi=remedi.id_remedi) join mapel on (soal.id_mapel=mapel.id_mapel) where soal.id_remedi='$remedi' AND soal.id_mapel='$mapel' AND kelas='$kelas'";
                        $qsoal = $conn->query($sql_soal);
						$cari = $qsoal->fetch_array();
						$kkm = $cari['kkm'];
						
                    ?>
				</div>
				<div class="menu">
                    <div class="out">
                    <?php
						$score=0;
						$benar=0;
						$salah=0;
						$kosong=0;
						for ($i=0; $i < $jumlah ; $i++){
							$nomor = $id[$i];
							if (empty($pilihan[$nomor])) {
								$kosong++;
							} else {
								$jawaban = $pilihan[$nomor];
								$query = mysqli_query($conn, "select * from soal where no_soal = '$nomor' and jawaban='$jawaban'");
								$cek=mysqli_num_rows($query);
								if ($cek) {
									$benar++;
								} else {
									$salah++;
								}
							}
							$nilai = $benar * (1/$jumlah*100);
							$score = explode(".",$nilai);

						}
					?>

					
					<div class="informasi">
						<span>INFO PENTING</span>
							<ul>
								<li>Remedial hanya bisa di lakukan setelah mendapat persetujuan oleh guru</li>
								<li>Remedial hanya bisa di lakukan maksimal 2 kali</li>
								<li>Nilai yang disubmit saat ini adalah nilai yang akan di ubah pada nilai asli</li>
								<li>Nilai yang digunakan adalah nilai yang paling baru</li>
								<li>Nilai dari remedi maksimal adalah KKM</li>
							</ul>
					</div>

					<div class="scoreboard">
						<div>
							<div class="hasil">
								<table>
									<tr class="desc">
										<td rowspan="2"><span>Hasil dari Remedi <span><?php echo $cari['remedi'] ?></span> dengan mata pelajaran <span><?php echo $cari['nama_mapel'] ?></span></span></td>
										<td class="desc1">Kosong</td>
										<td class="desc1">Salah</td>
										<td class="desc1">Benar</td>
										<td class="desc1">Nilai</td>
									</tr>
									<tr>
										<td><?php echo $kosong ?></td>
										<td><?php echo $salah ?></td>
										<td><?php echo $benar ?></td>
										<?php
										if ($kkm > $nilai) {
											echo'<td style="background: red; color: white">'.$score[0].'</td>';
										} else {
											echo'<td style="background: green; color: white">'.$score[0].'</td>';
										}
										?>

									</tr>
								</table>
							</div>
						</div>
					</div>

					<div class="pengumuman">
						<center>
						<?php
							if ($kkm > $nilai) {

								echo '<font color="red"><b>'.$gagal1.'</b></font><br><br>';
								echo '<font size="2">'.$gagal2.'</font><br>';
							} else {
								echo '<font color="green"><b>'.$lulus1.'</b></font><br><br>';
								echo '<font size="2">'.$lulus2.'</font><br>';
							}

					
						?>
						<hr>
						<br>
						<div class="submits">
							<a href="home.php">BATAL</a>
							<a class="submite" href="update_nilai.php?<?php echo'id_siswa='.$nis?>&<?php echo'id_remedi='.$remedi?>&<?php echo'id_mapel='.$mapel?>&<?php echo'id_remedi='.$remedi?>&<?php echo'nilai='.$score[0]?>">SUBMIT</a>
						</div>
						
						</center>
					</div>
					

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
}
	else
	{
  		header("location: ../index.php");
	}
?>