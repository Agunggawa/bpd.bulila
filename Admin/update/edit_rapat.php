<?php
// Start the session and connect to the database
session_start();
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get rapat ID from GET request
$rapat_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM rapat WHERE id_rapat = '$rapat_id'";
$result = mysqli_query($conn, $query);
$rapat = mysqli_fetch_assoc($result);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $topik = mysqli_real_escape_string($conn, $_POST['topik']);
    $lampiran = mysqli_real_escape_string($conn, $_POST['lampiran']);
    $nomor_rapat = mysqli_real_escape_string($conn, $_POST['nomor_rapat']);
    $tempat_rapat = mysqli_real_escape_string($conn, $_POST['tempat_rapat']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Update query
    $updateQuery = "UPDATE rapat SET nama='$nama', tanggal='$tanggal', topik='$topik', nomor_rapat='$nomor_rapat',lampiran='$lampiran' , tempat_rapat='$tempat_rapat', status='$status' WHERE id_rapat='$rapat_id'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Rapat berhasil diperbarui'); window.location='../kelola_rapat.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rapat</title>
    <!-- Include any necessary CSS stylesheets -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            width: 100%;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        textarea {
            resize: vertical;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Rapat</h2>
        <form method="post" action="">
            <label for="nama">Nama Rapat:</label>
            <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($rapat['nama']); ?>">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" value="<?= htmlspecialchars($rapat['tanggal']); ?>">
            <label for="topik">Topik:</label>
            <textarea name="topik" id="topik" rows="6"><?= htmlspecialchars($rapat['topik']); ?></textarea>
            <label for="nomor_rapat">Nomor Rapat:</label>
            <input type="text" name="nomor_rapat" id="nomor_rapat" value="<?= htmlspecialchars($rapat['nomor_rapat']); ?>">
            <label for="nama">Lampiran :</label>
            <input type="text" name="lampiran" id="lampiran" value="<?= htmlspecialchars($rapat['lampiran']); ?>">
            <label for="tempat_rapat">Tempat Rapat:</label>
            <input type="text" name="tempat_rapat" id="tempat_rapat" value="<?= htmlspecialchars($rapat['tempat_rapat']); ?>">
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="Selesai" <?= ($rapat['status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                <option value="Belum Selesai" <?= ($rapat['status'] == 'Belum Selesai') ? 'selected' : ''; ?>>Belum Selesai</option>
            </select>
            <button type="submit">Update Rapat</button>
        </form>
    </div>
</body>
</html>
