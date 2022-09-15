<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// ambil data di url

$id = $_GET["id"];
// query data mahasiswa berdasarkan id

$mhs = query("SELECT * FROM tbl_mahasiswa WHERE id = $id")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {

	// var_dump(ubah($_POST)); die();
// cek apakah data berhasil diubah atau tidak
    // ubah($_POST)
 if ( ubah($_POST) > 0) {
 	echo "
 	<script>
 	alert('Data berhasil diubah!');
 	document.location.href = 'index.php'
 	</script>

 	";
 }else {
 	echo "<script>
 	alert('Data gagal diubah!');
 	document.location.href = 'index.php'
 	</script>";
 }





}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Ubah Data Mahasiswa</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Aplikasi Pendataan Mahasiswa</h3>
                <small>Fakultas Ilmu Komputer | Sistem Informasi</small>
            </div>

            <ul class="list-unstyled components">
                
                <li class="active">
                    <a href="index.php">Beranda</a>
                </li>
                <li>
                    <a href="tambah.php">Input Data</a>
                </li>
                <li>
                    <a href="#">Tentang Aplikasi</a>
                </li>
            </ul>

            
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info text-right">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <h2 class="text-center">Ubah Data Mahasiswa</h2>
                    <button type="button" class="btn btn-danger"><a href="logout.php">Logout</a></button>

                    
                </div>
            </nav>
            <div class="container">
                <h2 class="text-center mt-3">Form Ubah Data</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Tulis Nama Lengkap" required="" value="<?= $mhs["nama"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Tulis Alamat Lengkap" required="" value="<?= $mhs["alamat"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="jk" required="">
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" name="agama" id="agama" required="">
                            <option>Islam</option>
                            <option>Kristen</option>
                            <option>Budha</option>
                            <option>Konghucu</option>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="asal_sekolah">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" placeholder="Tulis Asal Sekolah" required="" value="<?= $mhs["asal_sekolah"]; ?>">
                    </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

     <footer class="page-footer font-small btn-primary">
        <div class="footer-copyright text-center py-3">© 2021 Copyright: D1A200029 | 
            <a href="https://www.instagram.com/ilham_.26/"> Ilham Samsul Arifin</a>
        </div>
    </footer>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>