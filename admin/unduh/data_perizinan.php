<?php
		$host="localhost";
        $user="root";
        $pass="";
        $database="skripsi";
        $mysqli= new mysqli ($host,$user,$pass,$database);
        $filename = "Data_Perizinan-(".date('d-m-Y').").xls";

        header("content-disposition: attachment; filename=$filename");
        header("content-type: application/vdn.ms-excel");
?>

<h2> Laporan Perizinan </h2>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Karyawan</th>
        <th>NIP</th>
        <th>Jenis Izin</th>
        <th>Waktu Izin</th>
        <th>Keterangan Izin</th>
    </tr>
    <?php 
        include "../../koneksi.php";
        $sql="SELECT * from perizinan_karyawan order by id_perizinan desc";
        $hasil=mysqli_query($conn,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
        $no++;
    ?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $data['nama_karyawan']; ?></td>
        <td><?php echo $data['nip']; ?></td>
        <td><?php echo $data['waktu_izin']; ?></td>
        <td><?php echo $data['keterangan_izin']; ?></td>
    </tr>
    <?php
        }
    ?>
</table>