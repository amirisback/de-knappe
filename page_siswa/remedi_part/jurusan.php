<?php
session_start();
include ('../../php/connect.php');
$cek=$_SESSION['user'];
$qry = mysqli_query($conn, "SELECT * from siswa natural join mapel where id_siswa='$cek'");
$data = mysqli_fetch_array($qry);
if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
echo'<select name="Jurusan" onChange="mapel(this.value)">
	<option>-- Pilih Jurusan --</option>
    <option value="'.$data['jurusan'].'" >'.$data['jurusan'].'</option>
</select>';

} else {
  		header("location: ../index.php");
	}
?>