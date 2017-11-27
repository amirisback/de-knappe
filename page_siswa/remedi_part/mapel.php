<?php
include('../../php/connect.php');
$isi = $_GET['jurusan'];
$q_mapel = "select * from mapel where jurusan='$isi' or jurusan='ALL'";
$mapel = $conn->query($q_mapel);
echo'<select name="mapel">
<option>-- Pilih Mapel --</option>';
while ($data = $mapel->fetch_array()) {  
	echo'<option value="'.$data['id_mapel'].'">'.$data['nama_mapel'].'</option> ';
}
	echo'</select>';
?>