<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$pengaduan_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$deleteQuery = "DELETE FROM pengaduan WHERE id_pengaduan = '$pengaduan_id'";

if (mysqli_query($conn, $deleteQuery)) {
    echo "<script>alert('pengaduan Berhasil Di Hapus'); window.location='../kelola_pengaduan.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
