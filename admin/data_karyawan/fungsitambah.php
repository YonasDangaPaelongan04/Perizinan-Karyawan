<?php 

include '../../koneksi.php';
 
$nama_karyawan = $_POST['nama_karyawan'];
$password = $_POST['password'];
$nip = $_POST['nip'];
$jk = $_POST['jk'];
$golongan = $_POST['golongan'];
$jabatan = $_POST['jabatan'];
$ruangan = $_POST['ruangan'];
$keterangan = $_POST['keterangan'];
$id_jenis_user = $_POST['id_jenis_user'];
 
mysqli_query($conn,"INSERT into tb_karyawan values('','$nama_karyawan','$password','$nip','$jk',
'$golongan','$jabatan','$ruangan','$keterangan','$id_jenis_user')");

$redirect = $config['base_url'] . 'view.php?message=valid';
header("Location: $redirect");
 
?>