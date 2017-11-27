<?php
include('../../php/connect.php');
$ambil = $_GET['id_set_remedi'];
$sql = "delete from set_remedi where id_set_remedi = $ambil";
$query = $conn->query($sql);
if ($query) {
    header ('location:../set_remedi.php');
}
?>