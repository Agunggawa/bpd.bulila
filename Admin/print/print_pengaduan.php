<?php
// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil semua data anggota
$query = "SELECT * FROM pengaduan";
$result = mysqli_query($conn, $query);

echo "<div style='text-align: center;'>";
echo "<h2>PENGADUAN ASPIRASIMASYARAKAT</h2>";
echo "<h3>Desa Bulila Kec. Talaga, Kab. Gorontalo, Gorontalo, Provinsi Gorontalo</h3>";
echo "<hr>";
echo "</div>";
echo "<br>";
// Memulai tabel dengan gaya CSS untuk memposisikan dan memperbesar
echo "<table border='1' style='margin: 0 auto; width: 80%; font-size: 16px;'>"; // Tabel akan di tengah dengan lebar 80% dan ukuran font 16px
echo "<thead>";
echo "<tr>";
echo "<th>NIK</th>";
echo "<th>Nama</th>";
echo "<th>Isi</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

// Memeriksa apakah terdapat data anggota
if (mysqli_num_rows($result) > 0) {
    // Mengambil setiap baris data dan menampilkannya dalam tabel
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['NIK']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
        echo "<td>" . htmlspecialchars($row['isi']) . "</td>";
        echo "</tr>";
    }
} else {
    // Jika tidak ada data anggota
    echo "<tr><td colspan='5'>Tidak ada data pengaduan</td></tr>";
}

// Menutup tabel
echo "</tbody>";
echo "</table>";

// Menutup koneksi database
mysqli_close($conn);
?>
