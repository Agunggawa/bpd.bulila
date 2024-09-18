<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$deleteQuery = "DELETE FROM postingan WHERE id_postingan = '$post_id'";

if (mysqli_query($conn, $deleteQuery)) {
    echo "<script>alert('Postingan Berhasil Di Hapus'); window.location='../kelola_postingan.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
