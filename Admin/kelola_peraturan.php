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
      <a class="nav-link collapsed" href="admin.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="kelola_postingan.php" class="nav-link collapsed">
        <i class="bi bi-file-earmark-text"></i><span>Postingan</span><i class=""></i>
      </a>
    </li>
    <li class="nav-item">
      <a href="kelola_anggota.php" class="nav-link collapsed">
        <i class="bi bi-people"></i><span>Kelola Anggota</span><i class=""></i>
      </a>
    </li>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-earmark-ruled"></i><span>Kelola Peraturan Desa</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="kelola_rapat.php" class="nav-link collapsed" >
        <i class="bi bi-calendar-event"></i><span>Rapat</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="kelola_pengaduan.php" class="nav-link collapsed" >
        <i class="bi bi-exclamation-circle"></i><span>Pengaduan</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="kelola_bagan.php" class="nav-link collapsed" >
        <i class="bi bi-image"></i><span>Foto Sttruktur</span>
      </a>
    </li>
  </ul>
</aside>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Peraturan</h1>
        <nav>
            <a href="tambah_peraturan.php" class="btn btn-primary">Tambah</a>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Tabel untuk menampilkan data postingan -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Pasal</th>
                                    <th>Penetapan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$query = "SELECT * FROM peraturan_desa WHERE judul_peraturan LIKE '%$keyword%' OR isi_peraturan LIKE '%$keyword%'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['judul_peraturan']) . "</td>";
    $isi_peraturan = $row['isi_peraturan'];
    $words = explode(' ', $isi_peraturan);
    if (count($words) > 15) {
        $truncated_isi = implode(' ', array_slice($words, 0, 15)) . '...';
    } else {
        $truncated_isi = $isi_peraturan;
    }
    echo "<td>" . htmlspecialchars($truncated_isi) . "</td>";
    echo "<td>" . htmlspecialchars($row['nomor_peraturan']) . "</td>";
    echo "<td>" . htmlspecialchars($row['penetapan']) . "</td>";
    echo "<td><a href='update/edit_peraturan.php?id=" . $row['id_peraturan'] . "' class='btn btn-sm btn-primary'>Edit</a> | <a href='update/hapus_peraturan.php?id=" . $row['id_peraturan'] . "' onclick='return confirm(\"Apa anda yakin ingin menghapus peraturan ?\");' class='btn btn-sm btn-danger'>Hapus</a></td>";
    echo "</tr>";
}
mysqli_close($conn);
?>
                            </tbody>
                        </table>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Periksa jika link 'Kelola Peraturan' memiliki class 'active'
    if ($('#tables-nav').find('.active').length > 0) {
        // Jika ada, buka submenu ini
        $('#tables-nav').addClass('show');
    }
});
</script>

</body>
</html>