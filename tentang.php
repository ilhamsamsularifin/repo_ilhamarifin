<?php


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Input Data Mahasiswa</title>

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
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <h2 class="text-center">Tentang Aplikasi</h2>
                    <button type="button" class="btn btn-danger"><a href="logout.php">Logout</a></button>

                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="img-fluid text-center">
                            <img src="img/ilham2.jpg" alt="ilham" width="200" class="rounded-circle">
                        </div>
                        <form action="" method="post" class="form-control mt-5">
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>Ilham Samsul Arifin</td>
                                </tr>
                                <tr>
                                    <td>NPM</td>
                                    <td>:</td>
                                    <td>D1A200029</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td>2 Reguler A</td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="col-md-9 mt-3">
                        <div class="img-fluid text-center">
                            <img src="img/unsub.png" alt="unsub" width="150">
                        </div>
                        <p class="mt-4"><strong>
                                Aplikasi di buat untuk memenuhi tugas Ujian Akhir Semester 2 mata kuliah Developing WEB Application PHP Dosen Pak Bagus Ali Akbar S.SI.,M.Kom. Di buat dengan sungguh-sungguh agar mendapatkan nilai yang memuaskan. Referensi pembuatan Aplikasi ini dari Modul yang dikasih oleh Dosen dan dari Channel Youtube WEB Programming UNPAS
                            </strong></p>
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
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>