<?php 
	session_start();
		include ('../php/connect.php');
		$cek=$_SESSION['user'];
		include ('body_part/query_body.php');
		$NIS = $data['id_siswa'];
		if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="../css/body_siswa.css">
		<link rel="stylesheet" type="text/css" href="../css/update_profil_siswa.css">
		<link rel="stylesheet" type="text/css" href="../css/font/flaticon.css">
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
				<div class="judul"><center>Ubah Profil Siswa</center></div>
				<div class="set-profil">
					<form action="" method="POST" enctype="multipart/form-data">
					<div class="bio-profil">
						<table class="form">
							<tr>
								<td></td>
								<td><?php echo'<img src="../images/foto_siswa/'.$data['foto_siswa'].'">'?></td>
							</tr>
							<tr>
								<td><span>Id Siswa</span></td>
								<td><input type="text" name="id_siswa" value="<?php echo $data['id_siswa'] ?>" disabled></td>
							</tr>
							<tr>
								<td><span>Password</span></td>
								<td><input type="password" name="password" value="<?php echo $data['password'] ?>"></td>
							</tr>
							<tr>
								<td><span>Nama</span></td>
								<td><input type="text" name="nama" value="<?php echo $data['nama_siswa'] ?>"></td>
							</tr>
							<tr>
								<td><span>Jurusan</span></td>
								<td><input type="text" name="jurusan" value="<?php echo $data['jurusan'] ?>"disabled></td>
							</tr>
							<tr>
								<td><span>Kelas</span></td>
								<td><input type="text" name="kelas" value="<?php echo $data['kelas'] ?>" disabled></td>
							</tr>
							<tr>
								<td><span>Tempat Lahir</span></td>
								<td><input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir'] ?>"></td>
							</tr>
							<tr>
								<td><span>Tanggal Lahir</span></td>
								<td><input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir'] ?>"></td>
							</tr>
							<tr>
								<td><span>Alamat</span></td>
								<td><input type="text" name="alamat" value="<?php echo $data['alamat_siswa'] ?>"></td>
							</tr>
							<tr>
								<td><span>Jenis Kelamin</span></td>
								<td>
									<input type="radio" name="gender" value="Laki-Laki" checked>Laki-Laki
									<input type="radio" name="gender" value="Perempuan">Perempuan
								</td>
							</tr>
							<tr>
								<td><span>No. Telepon</span></td>
								<td><input type="text" name="no_telp" value="<?php echo $data['no_telp'] ?>"></td>
							</tr>
							<tr>
								<td><span>Upload Foto</span></td>
								<td><input type="file" name="foto"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" class="tombol" name="upload" value="UBAH DATA SISWA">
									<?php
										if(isset($_POST['upload'])){
											$pw = $_POST['password'];
											$nama = $_POST['nama'];
											$tempat_lahir = $_POST['tempat_lahir'];
											$tanggal_lahir = $_POST['tanggal_lahir'];
											$alamat = $_POST['alamat'];
											$gender = $_POST['gender'];
											$telp = $_POST['no_telp'];

											$nama_file = $_FILES['foto']['name'];
											$ukuran_file = $_FILES['foto']['size'];
											$tipe_file = $_FILES['foto']['type'];
											$tmp_file = $_FILES['foto']['tmp_name'];
													
											$waktu = date('His');
											$nama_file_baru = $waktu.$nama_file;
											$path = "../images/foto_siswa/".$nama_file_baru;
											if($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
											if($ukuran_file <= 2000000) {
												move_uploaded_file($tmp_file, $path);                       
												$query = "UPDATE siswa SET password='$pw', nama_siswa='$nama', alamat_siswa='$alamat', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', gender_siswa='$gender', no_telp=$telp, foto_siswa='$nama_file_baru' WHERE id_siswa=$NIS";
												if($ins = $conn->query($query)) {
													echo 'Profil siswa berhasil diubah';
												} else {
												echo 'Gagal ubah data siswa!';
												}
											} else {
												echo 'Maaf, ukuran filenya terlalu besar';
											}
										} else {
												$query = "UPDATE siswa SET password='$pw', nama_siswa='$nama', alamat_siswa='$alamat', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', gender_siswa='$gender', no_telp=$telp WHERE id_siswa=$NIS";
												if($ins = $conn->query($query)) {
													echo 'Profil siswa berhasil diubah';
												} else {
												echo 'Gagal ubah data siswa!';
												}
											}
										}
									?>
								</td>
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
	else {
  		header("location: ../index.php");
	}
?>