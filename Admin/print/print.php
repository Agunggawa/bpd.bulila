<?php
// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memeriksa apakah parameter id_rapat ada dalam URL
if (isset($_GET['id'])) {
    // Membersihkan nilai input dari URL untuk mencegah SQL injection
    $id_rapat = mysqli_real_escape_string($conn, $_GET['id']);

    // Query untuk mengambil data rapat dan anggota berdasarkan id_rapat
    $query = "SELECT rapat.*, anggota.nama, anggota.NIP FROM rapat INNER JOIN anggota ON anggota.id_anggota WHERE rapat.id_rapat = $id_rapat";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Memulai cetak
        echo "<div style='text-align: center;'>";
        echo "<h2>BADAN PERMUSYAWARATAN DESA (BPD)</h2>";
        echo "<h3>DESA BULILA</h3>";
        echo "<h3>Kec. Talaga, Kab. Gorontalo, Gorontalo, Provinsi Gorontalo</h3>";
        echo "<hr>";
        echo "</div>";
        echo "<div style='margin-left: 50px;'>";
        echo "<h4>Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: " . htmlspecialchars($row['nomor_rapat']) . "</h4>";
        echo "<h4>Lampiran &nbsp;&nbsp; " . htmlspecialchars($row['lampiran']) . "</h4>";
        echo "<h4>Perihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Undangan Rapat</h4>";
        echo "<p>Kepada<br>Yth.<br>Di - <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat</p>";
        echo "<p>Dengan Hormat,</p>";
        echo "<p>" . htmlspecialchars($row['topik']) . "</p>";
        echo "<p>Hari / Tanggal &nbsp;&nbsp;&nbsp;&nbsp;: " . htmlspecialchars($row['tanggal']) . "</p>";
        echo "<p>Waktu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: " . date("H:i", strtotime($row['waktu'])) . " WIT</p>";
        echo "<p>Tempat &nbsp;&nbsp;&nbsp;:" . htmlspecialchars($row['tempat_rapat']) . "</p>";
        echo "<p>Demikian Undangan ini kami sampaikan, atas partisipasi Bapak/Ibu kami ucapkan terima kasih.</p>";

        // Pastikan untuk memeriksa ketersediaan variabel sebelum digunakan
        if (isset($row['nama']) && isset($row['NIP'])) {
            echo "<p style='text-align: right; margin-right: 50px;'>Ketua BPD,<br><br><br><br>". htmlspecialchars($row['nama']) . " <br>NIP. ". htmlspecialchars($row['NIP']) . "</p>";
        } else {
            echo "<p style='text-align: right; margin-right: 50px;'>Ketua BPD</p>";
        }

        echo "</div>";

        // Menutup koneksi database
        mysqli_close($conn);

        // Memanggil fungsi JavaScript untuk memulai pencetakan
        echo "<script>window.print()</script>";
    } else {
        echo "Data rapat tidak ditemukan.";
    }
} else {
    echo "Parameter id_rapat tidak ditemukan dalam URL.";
}
?>
