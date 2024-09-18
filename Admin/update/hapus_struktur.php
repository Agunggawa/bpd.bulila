<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$bagan_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$deleteQuery = "DELETE FROM bagan WHERE id_bagan = ?";

if ($stmt = mysqli_prepare($conn, $deleteQuery)) {
    mysqli_stmt_bind_param($stmt, "i", $bagan_id);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Struktur Berhasil Di Hapus'); window.location='../kelola_bagan.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing statement: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
