<?php
// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Gagal terhubung: " . mysqli_connect_error());
}

// Memeriksa metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membersihkan input dari karakter yang mungkin berbahaya
    $judul = mysqli_real_escape_string($conn, $_POST['judul_peraturan']);
    $nomor = mysqli_real_escape_string($conn, $_POST['nomor_peraturan']);
    $penetapan = isset($_POST['penetapan']) ? mysqli_real_escape_string($conn, $_POST['penetapan']) : '';
    // Memeriksa apakah file diunggah dan menyimpan nama file
    $file_name = isset($_FILES['isi_peraturan']['name']) ? basename($_FILES['isi_peraturan']['name']) : '';

    // Menentukan direktori tujuan penyimpanan file
    $dirUpload = '../download/';

    // Pastikan direktori tujuan ada atau buat jika tidak ada
    if (!is_dir($dirUpload)) {
        mkdir($dirUpload, 0755, true);
    }

    // Menyiapkan query
    $sql = "INSERT INTO peraturan_desa (judul_peraturan, isi_peraturan, nomor_peraturan, penetapan) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        // Mengikat parameter ke statement
        mysqli_stmt_bind_param($stmt, "ssss", $judul, $file_name, $nomor, $penetapan);

        // Menjalankan statement
        if (mysqli_stmt_execute($stmt)) {
            // Pindahkan file ke direktori yang ditentukan
            move_uploaded_file($_FILES['isi_peraturan']['tmp_name'], $dirUpload . $file_name);
            // Tutup statement
            mysqli_stmt_close($stmt);
            // Tutup koneksi database
            mysqli_close($conn);
            // Redirect ke halaman kelola_peraturan.php
            header("Location: ../kelola_peraturan.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error dalam menyiapkan statement: " . mysqli_error($conn);
    }
} else {
    // Jika metode akses bukan POST, redirect ke halaman form
    header("Location: ../kelola_peraturan.php");
    exit;
}
?>
