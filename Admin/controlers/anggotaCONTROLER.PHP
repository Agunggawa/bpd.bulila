<?php
// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Gagal terhubung: " . mysqli_connect_error());
}

// Memeriksa metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membersihkan input dari karakter yang mungkin berbahaya
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
    $masaJabatan = mysqli_real_escape_string($conn, $_POST['masa_jabatan']);
    // Perbaikan nama input untuk nomor telpon
    $telp = mysqli_real_escape_string($conn, $_POST['nomor_telpon']);
    $NIP = mysqli_real_escape_string($conn, $_POST['NIP']);

    // Menyiapkan query dengan jumlah kolom yang sesuai
    $sql = "INSERT INTO anggota (nama, jabatan, masa_jabatan, nomor_telpon, NIP) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        // Mengikat parameter ke statement
        mysqli_stmt_bind_param($stmt, "sssss", $nama, $jabatan, $masaJabatan, $telp, $NIP);

        // Menjalankan statement
        if (mysqli_stmt_execute($stmt)) {
            // Tutup statement
            mysqli_stmt_close($stmt);
            // Tutup koneksi database
            mysqli_close($conn);
            // Redirect ke halaman kelola_anggota.php
            header("Location: ../kelola_anggota.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error dalam menyiapkan statement: " . mysqli_error($conn);
    }
} else {
    // Jika metode akses bukan POST, redirect ke halaman form
    header("Location: ../kelola_anggota.php");
    exit;
}
?>
