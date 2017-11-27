<?php
    $sql = "SELECT * from siswa where id_siswa='$cek'";
    $qry = $conn->query($sql);
    $data = $qry->fetch_array();
?>