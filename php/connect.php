<?php
$severname = "localhost";
$user = "root";
$pass = "";
$db = "deknappe";
$conn = new mysqli("$severname","$user","$pass","$db");
if (!$conn) {
    echo 'Database Tidak Ada';
}
?>