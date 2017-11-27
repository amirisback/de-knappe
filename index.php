<?php include ('php/connect.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>De-Knappe - Remedial Online System</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="icon" href="images/logo.png">
	</head>
	<body>
		<header>
			<ul>
			  <li><a href="login_guru.php">GURU</a></li>
			  <li><a class="active" href="index.php">SISWA</a></li>		  	  
			</ul>
		</header>
			<center>			
				<div class="logos">
					<img src="images/pict1.png">
				</div>
				<div class="login">
					<form action="" method="POST">
						<table>
							<tr><td><center><span>-- Halaman Siswa --</span></center></td></tr>
							<tr>
								<td><input type="text" Name="Username" placeholder="ID Siswa" required></td>
							</tr>
							<tr>
								<td><input type="password" Name="Password" placeholder="Password" required></td>
							</tr>
							<tr>
								<td><input type="submit" Value="LOGIN" name="login"></td>
							</tr>
						</table>											
					</form>
					<div class="cek">
						<?php include ('php/proses_login_siswa.php'); ?>
					</div>
				</div>	
			</center>	
		<footer>
			Copyright &copy; De-Knappe - TELKOM UNIVERSIRTY 2017
		</footer>	
	</body>
</html>