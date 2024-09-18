<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$anggota_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$deleteQuery = "DELETE FROM anggota WHERE id_anggota = '$anggota_id'";

if (mysqli_query($conn, $deleteQuery)) {
    echo "<script>alert('Anggota Berhasil Di Hapus'); window.location='../kelola_anggota.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
