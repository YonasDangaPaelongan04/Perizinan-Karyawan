<?php 

include '../../koneksi.php';
 
$nama = $_POST['nama_izin'];
$keterangan = $_POST['keterangan_izin'];
 
mysqli_query($conn,"INSERT into tb_izin_list values('','$nama','$keterangan')");
 
$redirect = $config['base_url'] . 'view.php?message=valid';
header("Location: $redirect");
 
?>