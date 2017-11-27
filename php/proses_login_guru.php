<?php
session_start();
if (isset($_POST['login'])) {
	$username = $_POST['Username'];
	$password = $_POST['Password'];
	$sql = "select * from guru where id_guru = '$username' and password = '$password'";
	$query = $conn->query($sql);
	$row = $query->fetch_array();
	if($username == $row['id_guru'] && $password == $row['password']) {
		session_start();
		$_SESSION['user']=$username;
		$_SESSION['pass']=$password;
		header('location:page_guru/profil_guru.php');
	} else {
		echo 'Username atau Password Salah';	
	}
}
?> 