<?php 
include '../../koneksi.php';

$id = $_GET["id_anggota"];
$query = mysqli_query($conn, "DELETE FROM tb_karyawan WHERE id_anggota = '$id'");
header("location:view.php?hapus=hapus")
?>