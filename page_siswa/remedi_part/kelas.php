<?php
session_start();
include ('../../php/connect.php');
$cek=$_SESSION['user'];
$qry = mysqli_query($conn, "SELECT * from siswa natural join mapel where id_siswa='$cek'");
$data = mysqli_fetch_array($qry);
if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {

echo'<select name="kelas" onChange="jurusan()">
    <option>-- Pilih Kelas --</option>
    <option value="'.$data['kelas'].'" >'.$data['kelas'].'</option>
</select>';

} else {
  		header("location: ../index.php");
	}
?>
