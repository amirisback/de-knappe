<?php
session_start();
if(isset($_POST['Username']) && isset($_POST['Password'])) {
	$username = $_POST['Username'];
	$password = $_POST['Password'];
	$result = mysqli_query($conn, "select * from siswa where id_siswa = '$username' and password = '$password'") or die("Failed".mysql_error());
	$row = $result->fetch_array();
	if($username == $row['id_siswa'] && $password == $row['password']) {
		session_start();
		$_SESSION['user']=$username;
		$_SESSION['pass']=$password;
		header('location:page_siswa/home.php');
	} else {
		echo 'Username atau Password Salah';	
	}
}
?> 