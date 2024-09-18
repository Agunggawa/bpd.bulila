<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bpd";

// Membuat koneksi
$conn =mysqli_connect("localhost", "root", "", "bpd");

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
