<?php
    $sql = "SELECT * from guru join mapel on guru.id_mapel = mapel.id_mapel where id_guru='$cek'";
    $qry = $conn->query($sql);
    $data = $qry->fetch_array();
?>