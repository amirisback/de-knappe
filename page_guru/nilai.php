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
        <style>
        </style>
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
			LIST NILAI
			</div>
			<div class="isi">
				<div class="info-pilihan">
					<span>INFO PENTING</span>
					<ul>
						<li>Guru Dapat Menambahkan Nilai Siswa</li>
						<li>Guru Dapat Mengubah Nilai Siswa</li>
						<li>Guru Dapat Menghapus Nilai Siswa</li>
					</ul>
				</div>
				<div class="insert-data">
					<a href="list_nilai/tambah_nilai.php">Tambah Nilai</a><span>Klik ini untuk menambah nilai siswa</span>
				</div>
				<div class="yeezy">
					<table class="list">
						<tr>
							<th>NO.</th>
							<th>NIS</th>
							<th>KELAS</th>
							<th>JURUSAN</th>
							<th>MAPEL</th>
							<th>JENIS ULANGAN</th>
							<th>NILAI</th>
							<th>KETERANGAN</th>
							<th colspan="2">ACTION</th>
						</tr>
						<?php
						while ($r_nilai = $query_nilai->fetch_array()) {
						?>
							<tr>
							<td><?php echo $no++ ?>.</td>
							<td><?php echo $r_nilai['id_siswa'] ?></td>
							<td><?php echo $r_nilai['kelas'] ?></td>
							<td><?php echo $r_nilai['jurusan'] ?></td>
							<td><?php echo $r_nilai['id_mapel'] ?></td>
							<td><?php echo $r_nilai['remedi'] ?></td>
							<td><?php echo $r_nilai['nilai'] ?></td>
							<?php
								if ($r_nilai['nilai'] < $r_nilai['kkm']) {
								echo '<td class="gagal">Tidak Tuntas</td>';	
								} else {
								echo '<td class="tuntas">Tuntas</td>';
								}
							?>
							<td class="edit"><a href="list_nilai/edit_nilai.php?id_nilai='<?php echo $r_nilai['id_nilai'] ?>'"><i class="flaticon-edit"></i></a></td>
							<td class="hapus"><a href="list_nilai/hapus_nilai.php?id_nilai='<?php echo $r_nilai['id_nilai'] ?>'"><i class="flaticon-garbage"></i></a></td>
							</tr>
							<?php
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