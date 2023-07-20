<?php

require_once "../../koneksi.php";

$id_anggota = $_POST["id_anggota"];
$passwordlama = $_POST['passwordlama'];
$passwordbaru = $_POST['passwordbaru'];
$konfirmasipassword = $_POST['konfirmasipassword'];


$cekuser = "SELECT * FROM tb_karyawan WHERE id_anggota = '$id_anggota' and password = '$passwordlama'";

$querycekuser = mysqli_query($conn, $cekuser);

$count = mysqli_num_rows($querycekuser);

if ($count >= 1){
$update_password="UPDATE tb_karyawan SET 
password = '$passwordbaru' 
WHERE id_anggota = $id_anggota"; 

$updatequery = mysqli_query($conn, $update_password);
if($updatequery)

{

"Password telah diganti menjadi $passwordbaru";

}

header("Location:../../index.php");

}

?>