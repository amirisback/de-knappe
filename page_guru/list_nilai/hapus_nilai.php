<?php
include('../../php/connect.php');
$ambil = $_GET['id_nilai'];
$sql = "delete from nilai where id_nilai = $ambil";
$query = $conn->query($sql);
if ($query) {
    header ('location:../nilai.php');
}
?>