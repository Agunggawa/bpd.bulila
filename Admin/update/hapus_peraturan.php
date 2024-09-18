<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$peraturan_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$deleteQuery = "DELETE FROM peraturan_desa WHERE id_peraturan = '$peraturan_id'";

if (mysqli_query($conn, $deleteQuery)) {
    echo "<script>alert('Peraturan Berhasil Di Hapus'); window.location='../kelola_peraturan.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
