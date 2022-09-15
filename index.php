<?php 
session_start();

if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM tbl_mahasiswa");

// jika tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}


 ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Aplikasi Pendataan Mahasiswa</title>

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
                    <a href="tentang.php">Tentang Aplikasi</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                     <button type="button" id="sidebarCollapse" class="btn btn-info text-right">
                        <i class="fas fa-align-right"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <h2 class="text-center">Data Mahasiswa</h2>
                    <button type="button" class="btn btn-danger"><a href="logout.php">Logout</a></button>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <form class="form-inline" action="" method="POST">
                          <div class="form-group mx-sm-3 mb-2">
                            <label for="search" class="sr-only" name="keyword">Search</label>
                            <input type="text" class="search" name="keyword" placeholder="Search" autofocus="" autocomplete="off" id="keyword">
                            <button type="submit" class="btn-primary" name="cari" id="tombol-cari">Cari</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="container" id="container">
                    <div class="row"> 
                        <div class="col-md-12">
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Sekolah Asal</th>
                                        <th>Tindakan</th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($mahasiswa as $row ) : ?>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row["nama"]; ?></td>
                                        <td><?= $row["alamat"]; ?></td>
                                        <td><?= $row['jk']; ?></td>
                                        <td><?= $row["agama"]; ?></td>
                                        <td><?= $row["asal_sekolah"]; ?></td>
                                        <td>
                                        <button type="submit" class="btn btn-primary"><a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a></button>
                                        <button type="submit" class="btn btn-danger mt-1" onclick="return confirm('Yakin ?')"><a href="hapus.php?id=<?= $row["id"]; ?>">Hapus</a></button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
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


            $().on('click', function(){
                e.preventDefault();
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = $(conn).attr('');
                    // Swal.fire(
                    //   'Deleted!',
                    //   'Your file has been deleted.',
                    //   'success'
                    // )
                  }
                })
            })
        });
    </script>

    <script src="js/script.js">
        
    </script>




</body>

</html>