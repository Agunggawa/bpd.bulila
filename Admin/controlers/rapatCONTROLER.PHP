<?php
// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Gagal terhubung: " . mysqli_connect_error());
}

// Memeriksa metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membersihkan input dari karakter yang mungkin berbahaya
    $nomor_rapat = mysqli_real_escape_string($conn, $_POST['nomor_rapat']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $topik = mysqli_real_escape_string($conn, $_POST['topik']);
    $lampiran = mysqli_real_escape_string($conn, $_POST['lampiran']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $waktu = $_POST['waktu']; // Mengambil input waktu langsung dari form
    $hasil = mysqli_real_escape_string($conn, $_POST['hasil_rapat']);
    $tempat = mysqli_real_escape_string($conn, $_POST['tempat_rapat']); // Menambah kolom tempat
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Menyiapkan query
    $sql = "INSERT INTO rapat (nomor_rapat, nama, topik, tanggal, hasil_rapat, waktu, tempat_rapat, lampiran, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        // Mengikat parameter ke statement dengan urutan yang benar
        mysqli_stmt_bind_param($stmt, "sssssssss", $nomor_rapat, $nama, $topik, $tanggal, $hasil, $waktu, $tempat, $lampiran, $status);

        // Menjalankan statement
        if (mysqli_stmt_execute($stmt)) {
            // Tutup statement
            mysqli_stmt_close($stmt);
            // Tutup koneksi database
            mysqli_close($conn);
            // Redirect ke halaman kelola_rapat.php
            header("Location: ../kelola_rapat.php");
            exit;
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    } else {
        echo "Error dalam menyiapkan statement: " . mysqli_error($conn);
    }
} else {
    // Jika metode akses bukan POST, redirect ke halaman form
    header("Location: ../kelola_rapat.php");
    exit;
}
?>
