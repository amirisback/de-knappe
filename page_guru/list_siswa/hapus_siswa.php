<?php
include('../../php/connect.php');
$ambil = $_GET['id_siswa'];
$sql = "delete from siswa where id_siswa = $ambil";
$query = $conn->query($sql);
if ($query) {
    header ('location:../siswa.php');
}
?>