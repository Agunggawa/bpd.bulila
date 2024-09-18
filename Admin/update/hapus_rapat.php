<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$rapat_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$deleteQuery = "DELETE FROM rapat WHERE id_rapat = '$rapat_id'";

if (mysqli_query($conn, $deleteQuery)) {
    echo "<script>alert('Rapat Berhasil Di Hapus'); window.location='../kelola_rapat.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
