<?php
session_start();
if (!$_SESSION["login"]) {
    header("Location: login.php");
    exit();
}
require_once "connection.php";
$peternakan = query("SELECT * FROM peternakan ORDER BY id DESC");

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $lokasi = $_POST['lokasi'];
    $jumlah = $_POST['jumlah'];
    $jenis = $_POST['jenis'];
    $status = $_POST['status'];


    $updatedata = mysqli_query($conn, "update peternakan set lokasi = '$lokasi',jumlah=$jumlah,  status='$status',jenis='$jenis' where id='$id'");

    //cek apakah berhasil
    if ($updatedata) {

        echo " <meta http-equiv='refresh' content='1; url= peternakan.php'/>  ";
    } else {
        echo "<meta http-equiv='refresh' content='1; url= peternakan.php'/> ";
    }
};
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $delete = mysqli_query($conn, "delete from peternakan where id='$id'");
    //hapus juga semua data barang ini di tabel keluar-masuk

    //cek apakah berhasil
    if ($delete) {

        echo "
            <meta http-equiv='refresh' content='1; url= peternakan.php'/>  ";
    } else {
        echo "
             <meta http-equiv='refresh' content='1; url= peternakan.php'/> ";
    }
};
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Potensi Desa</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">

    <link rel="stylesheet" href="assets/css/style.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" style="width:50px; height:50px;" href="./"><img src="images/p.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/p.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="pariwisata.php"> <i class="menu-icon fa fa-tasks"></i>Pariwisata </a>
                    </li>
                    <li>
                        <a href="perikanan.php"> <i class="menu-icon fa fa-tasks"></i>Perikanan </a>
                    </li>
                    <li>
                        <a href="pertanian.php"> <i class="menu-icon fa fa-tasks"></i>Pertanian </a>

                    </li>
                    </li>
                    <li class="active">
                        <a href="peternakan.php"> <i class="menu-icon fa fa-tasks"></i>Peternakan </a>

                    </li>


                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">

                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>



                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <!-- TAMBAH DATA -->
        <!-- modal input -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Masukkan Data</h4>
                    </div>
                    <div class="modal-body">
                        <form action="tambah_peternakan.php" method="post">

                            <div class="form-group">
                                <label>Lokasi</label>
                                <input name="lokasi" type="text" class="form-control" placeholder="lokasi" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input name="jumlah" type="number" class="form-control" placeholder="jumlah" required>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <input name="status" type="number" class="form-control" placeholder="status" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <input name="jenis" type="text" class="form-control" placeholder="jenis" required>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Peternakan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Peternakan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card demo-icons">
                        <div class="card-header">
                            <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
                        </div>

                        <div class="card-body all-icons">
                            <table class="table table-responsive-sm" id="pariwisata-table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($peternakan as $row) :  ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row["lokasi"]; ?></td>
                                            <td><?= $row["jumlah"]; ?></td>
                                            <td><?= $row["jenis"]; ?></td>
                                            <td><?= $row["status"]; ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#edit<?= $row['id']; ?>" class="btn btn-warning">Ubah</button>
                                                <button data-toggle="modal" data-target="#del<?= $row['id']; ?>" class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>

                                        <!-- HAPOUS -->
                                        <div class="modal fade" id="del<?= $row['id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Data <?php echo $row['lokasi'] ?> - <?php echo $row['jenis'] ?> </h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data ini dari daftar?
                                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success" name="hapus">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- EDIT -->
                                        <!-- The Modal -->
                                        <div class="modal fade" id="edit<?= $row['id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Ubah Data <?php echo $row['lokasi'] ?>-<?php echo $row['jenis'] ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label>Lokasi</label>
                                                                <input name="lokasi" type="text" class="form-control" placeholder="lokasi" required value="<?php echo $row['lokasi'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jumlah</label>
                                                                <input name="jumlah" type="number" class="form-control" placeholder="jumlah" required value="<?php echo $row['jumlah'] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <input name="status" type="number" class="form-control" placeholder="status" required value="<?php echo $row['status'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jenis</label>
                                                                <input name="jenis" type="text" class="form-control" placeholder="jenis" required value="<?php echo $row['jenis'] ?>">
                                                            </div>

                                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">


                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-success" name="update">Ubah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END EDIt -->

                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                            <a class="btn btn-primary text-white" href="export_peternakan.php" role="button">Export Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDIT -->


    </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#pariwisata-table').DataTable();
        });
    </script>
</body>

</html>
