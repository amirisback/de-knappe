<?php
include('../../php/connect.php');
$ambil = $_GET['no_soal'];
$sql = "delete from soal where no_soal = $ambil";
$query = $conn->query($sql);
if ($query) {
    header ('location:../soal.php');
}
?>