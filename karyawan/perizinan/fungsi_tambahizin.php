<?php 
session_start();
include '../../koneksi.php';

if (isset($_POST["simpan"])) {
    $id_anggota = $_POST['id_anggota'];
    $nama_izin = $_POST['nama_izin'];
    $awal_izin = $_POST['awal_izin'];
    $selesai_izin = $_POST['selesai_izin'];
    $keterangan_izin = $_POST['keterangan_izin'];
    $status = $_POST['status'];

    $query = mysqli_query($conn,"INSERT into perizinan_karyawan 
    VALUES ('','$id_anggota','$nama_izin', '$awal_izin','$selesai_izin','$keterangan_izin','$status')");
}

$redirect = $config['base_url'] . 'view.php?pesan=input';
header("Location: $redirect");

?>