<?php 

    include "../../koneksi.php";
    
    session_start();
   
    $id_anggota = $_SESSION['id_anggota'];

    $query = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_anggota = '$id_anggota'");
    $data = mysqli_fetch_array($query);

    function status($id)
                            {

                                switch ($id) {
                                    case '1':
                                        return "Menunggu";
                                    case '2':
                                        return "Disetujui";
                                        case '3':
                                            return "Ditolak";
                                    default:
                                        return "-";
                                }
                            }

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
                <a class="nav-link" href="../data_pribadi/view.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Data Pribadi</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="view.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Informasi Izin</span></a>
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

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span <?php 
                                    include "../../koneksi.php";
                                    $query=mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_anggota = $id_anggota");
                                    $data=mysqli_fetch_array($query);
                                    ?>
                                    class="mr-2 d-none d-lg-inline text-gray-800 small"><?php echo $data['nama_karyawan']; ?></span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    <div class="container-fluid">

                        <h1 class="h3 mb-2 text-gray-800">Buat Data Perizinan</h1>

                        <div class="card shadow mb-4">

                            <form action="fungsi_tambahizin.php" method="POST">
                                <?php 
                                    $id_anggota = $_SESSION['id_anggota'];
                                    $query = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_anggota = '$id_anggota'");
                                    $data = mysqli_fetch_array($query);
                                ?>
                                <div class="ml-5 mb-3 mr-5 mt-5">
                                    <input type="hidden" class="form-control" name="id_anggota" id="id_anggota"
                                        value="<?php echo $data['id_anggota']; ?>">

                                    </input>
                                </div>
                                <div class="ml-5 mb-3 mr-5 mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Jenis Izin</label>
                                    <select type="text" class="form-control" id="nama_izin" name="nama_izin" required>
                                        <option></option>
                                        <?php 
                                        $sql="SELECT * from tb_izin_list order by id_izin_list desc";
                                       
                                        $hasil=mysqli_query($conn,$sql);
                                        while ($data = mysqli_fetch_array($hasil)) {
                                    ?>

                                        <option><?php echo $data['nama_izin']; ?></option>

                                        <?php
                                            
                                        }
                                                 
                                        ?>
                                    </select>
                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Awal Izin</label>
                                    <input type="date" class="form-control" name="awal_izin" id="awal_izin">
                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Selesai Izin</label>
                                    <input type="date" class="form-control" name="selesai_izin" id="selesai_izin">
                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-2">
                                    <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                                    <textarea cols="30" rows="10" class="form-control" name="keterangan_izin"
                                        id="keterangan_izin"></textarea>
                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-2">
                                    <input type=hidden class="form-control" name="status" id="status" value="1">
                                </div>

                                <div class="ml-5 mb-3 mr-5 mt-4 mb-5">
                                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

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