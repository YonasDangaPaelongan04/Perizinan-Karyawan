<?php

include '../../koneksi.php';
 
$id_izin_list = $_POST['id_izin_list'];
$nama_izin = $_POST['nama_izin'];
$keterangan_izin = $_POST['keterangan_izin'];
 
$sql=mysqli_query($conn, "UPDATE tb_izin_list SET
        nama_izin = '$nama_izin',
        keterangan_izin = '$keterangan_izin'
        WHERE id_izin_list = $id_izin_list");
 
$redirect = $config['base_url'] . 'view.php?message=valid';
header("Location: $redirect");

?>