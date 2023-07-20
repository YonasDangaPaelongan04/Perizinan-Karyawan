<?php

require_once '../../koneksi.php';

// TOLAK DATA IZIN

if (isset($_GET["tolak_data_izin"])) {
    $tanggal = date("Y-m-d H:i:s");
	$query = mysqli_query($conn, "UPDATE perizinan_karyawan 
    SET status = '3'
	WHERE id_perizinan = '$_GET[id]'");
}

header('location: perizinan_karyawan.php');


// TERIMA DATA IZIN

if (isset($_GET["terima_data_izin"])) {
	$tanggal = date("Y-m-d H:i:s");
	$query = mysqli_query($conn, "UPDATE perizinan_karyawan 
    SET status = '2'
	WHERE id_perizinan = '$_GET[id]'");
}

header('location: perizinan_karyawan.php');
?>