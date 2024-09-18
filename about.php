<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BPD Bulila</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Desa Bulila</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="daftar_anggota.php">Daftar Anggota</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="Peraturan_desa.php">Peraturran Desa</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="pengaduan.php">Pengaduan</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Login admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Login Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <style>
      body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;

        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* .login-form {
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        } */

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }

        .login-form input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form input[type="submit"]:hover {
            background-color: #111;
        }

        .login-form p {
            text-align: center;
            margin-top: 20px;
        }

        .login-form a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-form a:hover {
            color: #111;
        }
        </style>
        <!-- Modal Login Admin -->
        <form class="login-form" action="login.php" method="post">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" required placeholder="Enter username">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required placeholder="Enter password">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/bpdbulila-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h2>Tentang Badan Permusyawaratan Desa</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Badan Permusyawaratan Desa (BPD) merupakan lembaga desa sebagai perujudan demokrasi dalam penyelenggaraan pemerintahan. Status kewenangan BPD pada tingkat desa diibaratkan sebagai lembaga parlemen desa. Fungsi utama BPD pada tingkat desa yaitu menyalurkan aspirasi, merencanakan APBDes, dan mengawasi pemerintahan desa. Sementara wewenang BPD yaitu membahas rancangan peraturan desa bersama Kepala Desa, melaksanakan pengawasan terhadap pelaksanaan peraturan mengusulkan desa, pengangkatan dan pemberhentian Kepala Desa, membentuk panitia pemilihan Kepala Desa, serta menggali, menampung, menghimpun, dan merumuskan aspirasi masayrakat. Pembentukan, kewenangan, dan fungsi BPD ini diatur dalam Undang-Undang desa Nomor 6 tahun 2014 dan Perda Kabupaten Gorontalo Nomor 14 Tahun 2007 Anggota BPD di Desa Bulila merupakan perwakilan dari penduduk desa berdasarkan keterwakilan wilayah yang ditetapkan secara musyawarah dan mufakat. Anggota BPD di Desa Bulila berasal dari perwakilan ketua Rukun Warga, pemangku adat, golongan profesi, pemuka agama dan tokoh masyarakat lainnya. Masa jabatan anggota BPD di Desa Bulila yaitu selama 6 tahun dan dapat diangkat/ diusulkan kembali untuk 3 kali masa jabatan berikutnya. Peraturan mengenai anggota BPD diatur menyeluruh dalam Ketentuan Undang-Undang Desa Pasal 56.</p>
                        <p>BPD memiliki beberapa fungsi dan tugas utama, antara lain:</p>
                        <p>1. Pembentukan Peraturan Desa: 
                           BPD berperan dalam proses pembuatan peraturan desa bersama dengan kepala desa. BPD membahas dan menyetujui rancangan peraturan desa yang diajukan oleh kepala desa atau yang diinisiasi oleh BPD sendiri.</p>
                        <p>2. Pengawasan: BPD mengawasi pelaksanaan peraturan desa serta kebijakan kepala desa lainnya. Pengawasan ini penting untuk memastikan bahwa semua kegiatan pemerintahan desa berjalan sesuai dengan aturan yang berlaku dan kepentingan masyarakat desa terpenuhi.</p>
                        <p>3. Musyawarah Desa: BPD berperan aktif dalam pelaksanaan musyawarah desa, yang merupakan forum untuk mendiskusikan dan memutuskan hal-hal penting terkait dengan kebijakan desa.</p>
                        <p>4. Konsultasi: BPD berfungsi sebagai lembaga konsultasi bagi kepala desa dalam berbagai aspek pemerintahan, pembangunan, dan kemasyarakatan desa.</p>
                        <h5>Peran Penting</h5>
                        <p>BPD memainkan peran kunci dalam memastikan pemerintahan desa yang demokratis dan partisipatif. Dengan adanya BPD, suara masyarakat desa dapat terwakili secara lebih baik dalam pengambilan keputusan di tingkat desa. BPD juga berperan dalam meningkatkan transparansi dan akuntabilitas dalam pemerintahan desa.</p>

                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/bulila.telaga">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.instagram.com/desabulila.official?igsh=MW8ycWloMW85Znl1Ng==">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Badan Permusyawaratan Desa Bulila</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
