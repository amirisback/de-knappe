<?php 
	session_start();
		include ('../../php/connect.php');
		$cek=$_SESSION['user'];
		include ('../body_part/query_body.php');
		$sql_remedi = "select * from remedi";
		$query_remedi = $conn->query($sql_remedi);
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
			TAMBAH NILAI
			</div>
			<div class="isi">
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="form">
					<tr>
						<td><span>ID Siswa</span></td>
						<td><input type="text" name="id_siswa"></td>
					</tr>
					<tr>
						<td><span>Mata Pelajaran</span></td>
						<td>
							<?php
                            $cekmapel = $data['id_mapel'];
                            echo'<input type="text" name="id_mapel" value="'.$cekmapel.'" required>';
                            ?>
						</td>
					</tr>
					<tr>
						<td><span>Jenis Ujian</span></td>
						<td>
							<select name="id_remedi">
                                <option>-- PILIH JENIS UJIAN --</option>
                                <?php

                                while ($r_remedi = $query_remedi->fetch_array()) {
                                echo'
                                <option value="'.$r_remedi['id_remedi'].'">'.$r_remedi['remedi'].'</option>
                                ';
                                }
                                ?>
                            </select>
						</td>
					</tr>
					<tr>
						<td><span>Nilai</span></td>
						<td><input type="text" name="nilai"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="oke" value="TAMBAH NILAI">
						<?php
							if(isset($_POST['oke'])){
								$n_siswa = $_POST['id_siswa'];
								$n_mapel = $_POST['id_mapel'];
								$n_remedi = $_POST['id_remedi'];
								$n_nilai = $_POST['nilai'];
								$sql_insert_nilai = "INSERT INTO nilai VALUES('','$n_siswa','$n_mapel','$n_remedi','$n_nilai')";
								$insert_nilai = $conn->query($sql_insert_nilai);
								if ($insert_nilai) {
									echo 'Nilai Berhasil Di Tambah';
								} else {
									echo 'Gagal tambah data nilai!';
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