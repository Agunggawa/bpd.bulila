<?php
$conn = mysqli_connect("localhost", "root", "", "bpd");

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan bersihkan dari karakter berbahaya
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $NIK = mysqli_real_escape_string($conn, $_POST['NIK']);

    $gambar = null; // Default value if no file is uploaded

    // Menangani file gambar yang di-upload
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $namaFile = $_FILES['foto']['name'];
        $tmpName = $_FILES['foto']['tmp_name'];
        $dirUpload = "foto_pengaduan/";
        $gambar = $dirUpload . basename($namaFile);

        // Pastikan direktori tujuan ada atau buat jika tidak ada
        if (!is_dir('../' . $dirUpload)) {
            mkdir('../' . $dirUpload, 0755, true);
        }

        // Pindahkan file yang diupload ke folder tujuan
        if (!move_uploaded_file($tmpName, '../' . $gambar)) {
            echo "Failed to upload file.";
            exit;
        }
    }

    // Query untuk memasukkan data
    if ($gambar) {
        $sql = "INSERT INTO pengaduan (nama, NIK, isi, foto) VALUES (?, ?, ?, ?)";
    } else {
        $sql = "INSERT INTO pengaduan (nama, NIK, isi) VALUES (?, ?, ?)";
    }

    // Siapkan statement mysqli
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameter ke statement
    if ($gambar) {
        mysqli_stmt_bind_param($stmt, "ssss", $nama, $NIK, $isi, $gambar);
    } else {
        mysqli_stmt_bind_param($stmt, "sss", $nama, $NIK, $isi);
    }

    // Eksekusi statement
    if (mysqli_stmt_execute($stmt)) {
        // Tutup statement
        mysqli_stmt_close($stmt);

        // Tutup koneksi database
        mysqli_close($conn);

        // Redirect ke halaman pengaduan.php
        header("Location: /si_bpd/pengaduan.php");
        exit;
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
} else {
    // Jika metode akses bukan POST, redirect ke form submission
    header("Location: /si_bpd/pengaduan.php");
    exit;
}
?>
