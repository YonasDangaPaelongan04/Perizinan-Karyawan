<?php 
include '../../koneksi.php';

$id = $_GET["id_izin_list"];
$query = mysqli_query($conn, "DELETE FROM tb_izin_list WHERE id_izin_list = '$id'");
header("location:view.php?hapus=hapus")
?>