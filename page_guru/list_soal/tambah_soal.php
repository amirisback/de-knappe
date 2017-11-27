<?php 
    session_start();
        include ('../../php/connect.php');
        $cek=$_SESSION['user'];
        include ('../body_part/query_body.php');
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
			TAMBAH SOAL
			</div>
			<div class="isi">
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="form">
                    <tr>
                        <td><span>Mata Pelajaran</span></td>
                        <td>
                            <?php
                            $cekmapel = $data['id_mapel'];
                            echo'
                            <input type="text" name="mapel" value="'.$cekmapel.'" required>
                            ';
                            ?>
                        </td>
                    <tr>
                        <td><span>Kelas</span></td>
                        <td>
                            <input type="radio" name="kelas" value="10" checked>10
                            <input type="radio" name="kelas" value="11">11
                            <input type="radio" name="kelas" value="12">12
                        </td>            
                    </tr>            
                    </tr>
                    <tr>
                        <td><span>Jenis Remedi</span></td>
                        <td>
                            <select name="remedi">
                                <option>-- PILIH REMEDI --</option>
                                <?php
                                $jremedi = "select * from remedi";
                                $qremedi = $conn->query($jremedi);
                                while ($t_remedi = $qremedi->fetch_array()) {
                                $ridremedi = $t_remedi['id_remedi'];
                                $remedi = $t_remedi['remedi'];
                                echo'
                                <option value="'.$ridremedi.'">'.$remedi.'</option>
                                ';
                                }
                                ?>
                            </select>
                        </td>            
                    </tr>
                    <tr>
                        <td><span>Soal</span></td>
                        <td><input type="text" name="soal" required></td>            
                    </tr>
                    <tr>
                        <td><span>Jawaban Benar</span></td>
                        <td>
                        <input type="radio" name="jawaban" value="a" checked>A
                        <input type="radio" name="jawaban" value="b">B
                        <input type="radio" name="jawaban" value="c">C
                        <input type="radio" name="jawaban" value="d">D
                        </td>            
                    </tr>
                    <tr>
                        <td><span>Pilihan A</span></td>
                        <td><input type="text" name="a" required></td>            
                    </tr>
                    <tr>
                        <td><span>Pilihan B</span></td>
                        <td><input type="text" name="b" required></td>            
                    </tr>
                    <tr>
                        <td><span>Pilihan C</span></td>
                        <td><input type="text" name="c" required></td>            
                    </tr>
                    <tr>
                        <td><span>Pilihan D</span></td>
                        <td><input type="text" name="d" required></td>            
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="tombol" name="upload" value="TAMBAH SOAL">
                            <?php
                            if(isset($_POST['upload'])) {
                            $t_mapel = $_POST['mapel'];
                            $kelas = $_POST['kelas'];
                            $remedi = $_POST['remedi'];
                            $soal = $_POST['soal'];
                            $jawaban = $_POST['jawaban'];
                            $pil_a = $_POST['a'];
                            $pil_b = $_POST['b'];
                            $pil_c = $_POST['c'];
                            $pil_d = $_POST['d'];

                            $sql_insert_soal = "insert into soal values('','$t_mapel','$kelas','$remedi','$soal','$pil_a','$pil_b','$pil_c','$pil_d','$jawaban')";
                            $insert_soal = $conn->query($sql_insert_soal);
                                if($insert_soal) {
                                    echo 'Soal berhasil ditambah';
                                } else {
                                    echo 'Gagal tambah soal!';
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