<?php
	session_start();
		include ('../../php/connect.php');
		$cek=$_SESSION['user'];
		include ('../body_part/query_body.php');
		$nip = $data['id_guru'];

if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="../../css/template.css">
		<link rel="stylesheet" type="text/css" href="../../css/add.css">
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
			UBAH PROFIL GURU
			</div>
			<div class="isi">
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="form">
					<tr>
                        <td></td>
						<td><?php echo'<img src="../../images/foto_guru/'.$data['foto_guru'].'">'?></td>
					</tr>
					<tr>
                        <td><span>Mata Pelajaran</span></td>
						<td><input type="text" name="mapel" value="<?php echo $data['id_mapel'] ?>" disabled></td>
					</tr>
                    <tr>
						<td><span>NIP</span></td>
						<td><input type="text" name="id_guru" value="<?php echo $data['id_guru'] ?>" disabled></td>
					</tr>
                    <tr>
						<td><span>Password</span></td>
						<td><input type="password" name="password" value="<?php echo $data['password'] ?>"></td>
					</tr>
					<tr>
						<td><span>Nama</span></td>
						<td><input type="text" name="nama" value="<?php echo $data['nama_guru'] ?>"></td>
					</tr>
					<tr>
                        <td><span>Alamat</span></td>
						<td><input type="text" name="alamat" value="<?php echo $data['alamat_guru'] ?>"></td>
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
						<td><input type="text" name="no_telp" value="<?php echo $data['telp_guru'] ?>"></td>
					</tr>
					<tr>
                        <td><span>Email</span></td>
						<td><input type="text" name="email" value="<?php echo $data['email_guru'] ?>"></td>
					</tr>
					<tr>
						<td><span>Upload Foto</span></td>
						<td><input type="file" name="foto"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" class="tombol" name="upload" value="UBAH DATA GURU">
						<?php
					
					if(isset($_POST['upload'])){
						$pw = $_POST['password'];
						$nama = $_POST['nama'];
						$alamat = $_POST['alamat'];
						$gender = $_POST['gender'];
						$telp = $_POST['no_telp'];
						$email = $_POST['email'];

						$nama_file = $_FILES['foto']['name'];
						$ukuran_file = $_FILES['foto']['size'];
						$tipe_file = $_FILES['foto']['type'];
						$tmp_file = $_FILES['foto']['tmp_name'];
								
						$waktu = date('His');
						$nama_file_baru = $waktu.$nama_file;
						$path = "../../images/foto_guru/".$nama_file_baru;
						if($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
						if($ukuran_file <= 2000000) {
							move_uploaded_file($tmp_file, $path);                       
							$sql_update_profil_guru = "UPDATE guru SET password='$pw', nama_guru='$nama', alamat_guru='$alamat', gender_guru='$gender', telp_guru=$telp, email_guru='$email',foto_guru='$nama_file_baru' WHERE id_guru=$nip";
							if($update_profil_guru = $conn->query($sql_update_profil_guru)) {
								echo 'Profil guru berhasil diubah';
							} else {
							echo 'Gagal ubah data guru!';
							}
						} else {
							echo 'Maaf, ukuran filenya terlalu besar';
						}
					} else {
							$sql_update_profil_guru = "UPDATE guru SET password='$pw', nama_guru='$nama', alamat_guru='$alamat', gender_guru='$gender', telp_guru=$telp, email_guru='$email' WHERE id_guru=$nip";
							if($update_profil_guru = $conn->query($sql_update_profil_guru)) {
								echo 'Profil guru berhasil diubah';
							} else {
							echo 'Gagal ubah data guru!';
							}
					}
				}

			?>
						</td>
					</tr>
				</table>
				</form>
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
} else {
  		header("location: ../../php/login_guru.php");
	}
?>