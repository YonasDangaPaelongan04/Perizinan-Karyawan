<?php

include '../../koneksi.php';

if (isset($_POST["ubah_data"])) {

$id_anggota=$_POST["id_anggota"];
$nama_karyawan=$_POST["nama_karyawan"];
$nip=$_POST["nip"];
$jk=$_POST["jk"];
$golongan=$_POST["golongan"];
$jabatan=$_POST["jabatan"];
$ruangan=$_POST["ruangan"];
$keterangan=$_POST["keterangan"];

	$sql=mysqli_query($conn, "UPDATE tb_karyawan SET
		nama_karyawan='$nama_karyawan',
        nip='$nip',
        jk='$jk',
        golongan='$golongan',
        jabatan='$jabatan',
        ruangan='$ruangan',
        keterangan='$keterangan'
		WHERE id_anggota=$id_anggota");
		
	header("Location:view.php");
}
?>