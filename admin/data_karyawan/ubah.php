<?php 

    include '../../koneksi.php';
    
    session_start();
    $id_anggota = $_SESSION['id_anggota'];
    $request = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_anggota = '$id_anggota'");
    $data = mysqli_fetch_array($request);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Skripsi</title>

    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-0">
                    <img src="../../img/Logo.png" alt="" style="width:30px">
                </div>
                <div class="sidebar-brand-text mx-3">Dinas Sosial</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="../../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Data Pribadi</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="view.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Karyawan</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="../jenis_perizinan/view.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jenis Perizinan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../data_perizinan/view.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Perizinan Karyawan</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Unduh Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../unduh/data_karyawan.php">Laporan Data Karyawan</a>
                        <a class="collapse-item" href="../unduh/data_perizinan.php">Laporan Data Perizinan</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="../../logout.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Keluar</span></a>
            </li>

            <hr class="sidebar-divider my-0">

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span <?php 
                                    include "../../koneksi.php";
                                    $query=mysqli_query($conn, "SELECT * FROM tb_karyawan");
                                    $data=mysqli_fetch_array($query);
                                    ?>
                                    class="mr-2 d-none d-lg-inline text-gray-800 small"><?php echo $data['nama_karyawan']; ?></span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php 
                    $id = $_GET["id"];
                    $query = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_anggota =$id");
                    $data = mysqli_fetch_array($query);
                ?>
                <div class="container-fluid">

                    <div class="container-fluid">

                        <h1 class="h3 mb-2 text-gray-800">Ubah Data Karyawan</h1>

                        <div class="card shadow mb-4">

                            <form action="fungsiubah.php" method="POST">

                                <div class="ml-5 mb-3 mr-5 mt-5">
                                    <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>">
                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-5">
                                    <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $data['nama_karyawan']; ?>" name="nama_karyawan" required>
                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-2">
                                    <label for="exampleInputEmail1" class="form-label">NIP</label>
                                    <input type="text" class="form-control" value="<?php echo $data['nip']; ?>"
                                        name="nip" required>
                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                    <select name="jk" class="form-control" id="jk" name="jk" required>
                                        <option value="<?= $data["jk"]; ?>"><?= $data["jk"]; ?></option>
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                    </select>

                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Golongan</label>
                                    <input type="text" class="form-control" value="<?php echo $data['golongan']; ?>"
                                        name="golongan" required>
                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" value="<?php echo $data['jabatan']; ?>"
                                        name="jabatan" required>
                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Ruangan</label>
                                    <input type="text" class="form-control" value="<?php echo $data['ruangan']; ?>"
                                        name="ruangan" required>
                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                                    <select name="keterangan" class="form-control" id="keterangan" name="keterangan"
                                        required>
                                        <option value="<?= $data["keterangan"]; ?>"><?= $data["keterangan"]; ?></option>
                                        <option>PNS</option>
                                        <option>CPNS</option>
                                    </select>

                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-4 mb-5">
                                    <button type="submit" name="ubah_data" class="btn btn-primary">Simpan</button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>


            <!-- Bootstrap core JavaScript-->
            <script src="../../vendor/jquery/jquery.min.js"></script>
            <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="../../js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="../../vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="../../js/demo/chart-area-demo.js"></script>
            <script src="../../js/demo/chart-pie-demo.js"></script>

            <!-- Page level plugins -->
            <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>