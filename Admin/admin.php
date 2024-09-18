<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>ADMIN</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="../assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        /* Style umum untuk link di sidebar */
        .nav-link {
            color: #333; /* Warna teks gelap umum */
            background-color: transparent; /* Latar belakang transparan */
            transition: color 0.3s, background-color 0.3s; /* Transisi yang halus */
        }

        /* Style untuk link aktif khusus 'Menambah Post' */
        #postLink.active {
            color: #007bff; /* Warna biru */
            background-color: #e7f1ff; /* Latar belakang biru muda */
        }

        .nav-link.active i {
            color: #007bff; /* Menyelaraskan warna ikon dengan teks */
        }

        .nav-link:hover {
            color: #0056b3; /* Warna biru yang lebih gelap saat hover */
            background-color: #e0e0e0; /* Latar belakang saat hover */
        }

        .info-box-icon {
            font-size: 40px; /* Ukuran ikon diperbesar */
            color: #fff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 80px; /* Lebar ikon diperbesar */
            height: 80px; /* Tinggi ikon diperbesar */
            margin-right: 20px;
        }
    </style>
</head>
<body>
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="../assets/img/bpd.jpg" alt="">
            <span class="d-none d-lg-block">Admin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li>
                <a class="dropdown-item d-flex align-items-center" href="../index.php">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                </a>
            </li>
        </ul>
    </nav>
</header>
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="admin.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="kelola_postingan.php" class="nav-link collapsed">
                <i class="bi bi-file-earmark-text"></i><span>Postingan</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="kelola_anggota.php" class="nav-link collapsed">
                <i class="bi bi-people"></i><span>Kelola Anggota</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="kelola_peraturan.php" class="nav-link collapsed">
                <i class="bi bi-file-earmark-ruled"></i><span>Kelola Peraturan Desa</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="kelola_rapat.php" class="nav-link collapsed">
                <i class="bi bi-calendar-event"></i><span>Rapat</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="kelola_pengaduan.php" class="nav-link collapsed">
                <i class="bi bi-exclamation-circle"></i><span>Pengaduan</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="kelola_bagan.php" class="nav-link collapsed">
                <i class="bi bi-image"></i><span>Foto Struktur</span>
            </a>
        </li>
    </ul>
</aside>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>

    <?php
    // Membuat koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "bpd");
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk menghitung jumlah postingan
    $query_postingan = "SELECT COUNT(*) AS total_postingan FROM postingan";
    $result_postingan = mysqli_query($conn, $query_postingan);
    $row_postingan = mysqli_fetch_assoc($result_postingan);
    $total_postingan = $row_postingan['total_postingan'];

    // Query untuk menghitung jumlah anggota
    $query_anggota = "SELECT COUNT(*) AS total_anggota FROM anggota";
    $result_anggota = mysqli_query($conn, $query_anggota);
    $row_anggota = mysqli_fetch_assoc($result_anggota);
    $total_anggota = $row_anggota['total_anggota'];

    // Query untuk menghitung jumlah peraturan
    $query_peraturan = "SELECT COUNT(*) AS total_peraturan FROM peraturan_desa";
    $result_peraturan = mysqli_query($conn, $query_peraturan);
    $row_peraturan = mysqli_fetch_assoc($result_peraturan);
    $total_peraturan = $row_peraturan['total_peraturan'];

    // Query untuk menghitung jumlah rapat
    $query_rapat = "SELECT COUNT(*) AS total_rapat FROM rapat";
    $result_rapat = mysqli_query($conn, $query_rapat);
    $row_rapat = mysqli_fetch_assoc($result_rapat);
    $total_rapat = $row_rapat['total_rapat'];

    // Query untuk menghitung jumlah pengaduan
    $query_pengaduan = "SELECT COUNT(*) AS total_pengaduan FROM pengaduan";
    $result_pengaduan = mysqli_query($conn, $query_pengaduan);
    $row_pengaduan = mysqli_fetch_assoc($result_pengaduan);
    $total_pengaduan = $row_pengaduan['total_pengaduan'];

    // Menutup koneksi database
    mysqli_close($conn);
    ?>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="bi bi-file-earmark-text"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Postingan</span>
                        <span class="info-box-number"><?php echo $total_postingan; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="bi bi-people"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Anggota</span>
                        <span class="info-box-number"><?php echo $total_anggota; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="bi bi-file-earmark-ruled"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Peraturan</span>
                        <span class="info-box-number"><?php echo $total_peraturan; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="bi bi-calendar-event"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Rapat</span>
                        <span class="info-box-number"><?php echo $total_rapat; ?></span>
                    </div>
                </div>
            <div class="col-lg-3 col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="bi bi-exclamation-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pengaduan</span>
                        <span class="info-box-number"><?php echo $total_pengaduan; ?></span>
                    </div>
                </div>
            </div>
        </div>
  </div>
    </section>
</main>

<footer id="footer" class="footer"></footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
