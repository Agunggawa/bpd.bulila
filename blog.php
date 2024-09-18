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
        <header class="masthead" style="background-image: url('assets/img/kantor_desa.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h2>Badan Permusyawaratan Desa</h2>
                            <span class="subheading">Kec. Talaga, Kab. Gorontalo, Gorontalo, Provinsi Gorontalo</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php
include "koneksi.php";
// Mendapatkan id_postingan dari URL
$id_postingan = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = "SELECT * FROM postingan WHERE id_postingan = $id_postingan";
$result = mysqli_query($conn, $query);

echo '<style>
* {
    box-sizing: border-box;
}

.post-content {
    background-color: rgba(255, 255, 255, 0.8);
    margin: 20px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    width: 80%;
    max-width: 1200px;
    overflow: auto; 
}

.post-content h2, .post-content p {
    color: #333;
    font-family: "Arial", sans-serif;
}
</style>';
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<p class='container'>Tanggal : " . htmlspecialchars($row['tanggal']) . "</p>";
    echo "<div class='container px-4 px-lg-5'>";
    echo "<div class='row gx-4 gx-lg-5 justify-content-center'>";
    echo "<div class='col-md-10 col-lg-8 col-xl-7 text-center'>";
    echo "<h2>" . htmlspecialchars($row['judul']) . "</h2>";
    if ($row['gambar']) {
        echo "<div class='text-center'>";
        echo "<img src='Admin/" . htmlspecialchars($row['gambar']) . "' style='width:35%; height:auto;'>";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo '<main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">';
    echo "<p class='post-subtitle'>" . nl2br(htmlspecialchars($row['isi'])) . "</p>";
    echo '</div></div></div></main>';
} else {
    echo "Postingan tidak ditemukan.";
}
mysqli_close($conn);
?>

 <!-- Footer-->
 <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-10">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
