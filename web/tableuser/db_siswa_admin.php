<?php
include 'config/controller.php';
$stokDataPerhalaman = 36;
$stokData = count(select("SELECT * FROM siswa"));
$stokHalaman = ceil($stokData / $stokDataPerhalaman);
$halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1);
$awalData = ($stokDataPerhalaman * $halamanAktif) - $stokDataPerhalaman;

$data_siswa = select("SELECT * FROM siswa ORDER BY nama ASC LIMIT $awalData, $stokDataPerhalaman");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PIJARAYA - Artikel</title>
</head>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<!--link bootstrap-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

<!-- bootstrap ikon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

<!-- link css -->
<link rel="stylesheet" href="../CSS/style_artikel.css" />

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap"
    rel="stylesheet" />

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

<!-- Libraries Stylesheet -->
<link href="lib/animate/animate.min.css" rel="stylesheet" />
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" />

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="./css/styles_article.css" />

<body>
    <?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"> PIJARAYA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link"
                            href="http://localhost/xirpl/portofolio/web/index.html#portfolio">Portfolio</a>
                    <li class="nav-item"><a class="nav-link"
                            href="http://localhost/xirpl/portofolio/web/index.html#about">about</a>
                    <li class="nav-item"><a class="nav-link"
                            href="http://localhost/xirpl/portofolio/web/index.html#team">teacher</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" target="_self"
                            role="botton" aria-expanded="false">More</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="http://localhost/xirpl/portofolio/login/login.php"
                                    target="_self">Data Siswa XI RPL</a></li>
                            <li><a class="dropdown-item"
                                    href="http://localhost/xirpl/portofolio/web/article/article.html"
                                    target="_self">Article</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                            href="http://localhost/xirpl/portofolio/web/contactus/index.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--end navigation-->

    <div class="container mt-5">
        <h1>Data Siswa</h1>
        <br>
        <a href="tambahsiswa.php" class="btn btn-success">Tambah Data</a>
        <br>
        <br>



        <table class="table table-bordered table-responsive table-hover">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>NO HP</th>
                    <th>Agama</th>
                    <th>Tempat lahir</th>
                    <th>Tanggal lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_siswa as $siswa) : ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $siswa['NISN']; ?></td>
                    <td><?= $siswa['Nama']; ?></td>
                    <td><?= $siswa['Alamat']; ?></td>
                    <td class="text-center"><?= $siswa['Jenis_Kelamin']; ?></td>
                    <td><?= $siswa['No_Hp']; ?></td>
                    <td><?= $siswa['Agama']; ?></td>
                    <td><?= $siswa['Tempat_lahir']; ?></td>
                    <td><?= $siswa['Tanggal_Lahir']; ?></td>
                    <td width="20%" class="text-center">
                        <a href="ubahsiswa.php" class="btn btn-outline-primary">Edit</a>
                        <a href="hapussiswa.php" class="btn btn-outline-primary">Hapus</a>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-2 justify-content-end d-flex">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if($halamanAktif > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $stokHalaman; $i++) : ?>
                    <?php if ($i == $halamanAktif) : ?>
                    <li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php else : ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>
                    <?php endfor; ?>

                    <?php if($halamanAktif < $stokHalaman) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>

    </div>

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; PIJARAYA WEB</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!--end footer-->

    <!--link javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <!--akhir link javascript-->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>