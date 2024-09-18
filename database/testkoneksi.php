<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bpd";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// Menjalankan SQL query
$sql = "SELECT username, role, password FROM admin";
$result = $conn->query($sql);

// Mengecek dan menampilkan hasil
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Username: " . $row["username"] . " - Role: " . $row["role"] . " - Password: " . $row["password"] . "<br>";
    }
} else {
    echo "0 results";
}

// Menutup koneksi
$conn->close();
?>
