<?php
$conn = mysqli_connect("localhost", "root", "", "bpd");

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangani file gambar yang di-upload
    $namaFile = $_FILES['foto_bagan']['name'];
    $tmpName = $_FILES['foto_bagan']['tmp_name'];
    $dirUpload = "STRUKTUR/";
    $gambar = $dirUpload . basename($namaFile);

    // Pastikan direktori tujuan ada atau buat jika tidak ada
    if (!is_dir('../' . $dirUpload)) {
        mkdir('../' . $dirUpload, 0755, true);
    }

    // Pindahkan file yang diupload ke folder tujuan
    if (move_uploaded_file($tmpName, '../' . $gambar)) {
        // Query untuk memasukkan data
        $sql = "INSERT INTO bagan (foto_bagan) VALUES (?)";

        // Siapkan statement mysqli
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameter ke statement
        mysqli_stmt_bind_param($stmt, "s", $gambar);

        // Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            // Tutup statement
            mysqli_stmt_close($stmt);

            // Tutup koneksi database
            mysqli_close($conn);

            // Redirect ke halaman kelola_bagan.php
            header("Location: ../kelola_bagan.php");
            exit;
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    } else {
        echo "Gagal mengupload gambar.";
    }
} else {
    // Jika metode akses bukan POST, redirect ke form submission
    header("Location: ../kelola_bagan.php");
    exit;
}
?>
