<?php 
	session_start();
		include ('../../php/connect.php');
		$cek=$_SESSION['user'];
		include ('../body_part/query_body.php');
		$ambil = $_GET['id_nilai'];
		$sql_nis = "select * from nilai join remedi on nilai.id_remedi = remedi.id_remedi where id_nilai=$ambil";
		$query_nis = $conn->query($sql_nis);
		$r_nis = $query_nis->fetch_array();
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
			UBAH NILAI
			</div>
			<div class="isi">
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="form">
					<tr>
						<td><span>ID Siswa</span></td>
						<td><input type="text" name="id_siswa" value="<?php echo $r_nis['id_siswa'] ?>" disabled></td>
					</tr>
					<tr>
						<td><span>Mata Pelajaran</span></td>
						<td>
							<?php
                            $cekmapel = $data['nama_mapel'];
                            echo'<input type="text" name="id_mapel" value="'.$cekmapel.'"  disabled>';
                            ?>
						</td>
					</tr>
					<tr>
						<td><span>Remedi</span></td>
						<td><input type="text" name="id_siswa" value="<?php echo $r_nis['remedi'] ?>" disabled></td>
					</tr>
					<tr>
						<td><span>Nilai</span></td>
						<td><input type="text" name="nilai" value="<?php echo $r_nis['nilai'] ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="oke" value="UBAH NILAI">
						<?php
							if(isset($_POST['oke'])){
								$n_nilai = $_POST['nilai'];
								$sql_update_nilai = "UPDATE nilai SET nilai='$n_nilai' WHERE id_nilai = $ambil";
								$update_nilai = $conn->query($sql_update_nilai);
								if ($update_nilai) {
									echo 'Nilai Berhasil Di Ubah';
								} else {
									echo 'Gagal ubah data nilai!';
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


}
	else
	{
  		header("location: ../../login_guru.php");
	}
?>