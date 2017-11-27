<?php
    $no = 1;
    $cekmapel = $data['id_mapel'];
    
    $sql_nilai = "select * from nilai join mapel on (nilai.id_mapel=mapel.id_mapel) join remedi on (nilai.id_remedi=remedi.id_remedi) join siswa on (nilai.id_siswa=siswa.id_siswa) WHERE nilai.id_mapel = '$cekmapel'";
    $query_nilai = $conn->query($sql_nilai);

    $sql_soal = "select * from soal join mapel on (soal.id_mapel=mapel.id_mapel) join remedi on (soal.id_remedi=remedi.id_remedi) WHERE soal.id_mapel = '$cekmapel'";
    $query_soal = $conn->query($sql_soal);

    $sql_siswa = "select * from siswa order by kelas";
    $query_siswa = $conn->query($sql_siswa);

    $sql_remedi = "select * from set_remedi where id_mapel = '$cekmapel'";
    $query_remedi = $conn->query($sql_remedi);
?>