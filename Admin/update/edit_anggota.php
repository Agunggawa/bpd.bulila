<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get post ID from GET request
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM anggota WHERE id_anggota = '$id'";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
    $masajabatan = mysqli_real_escape_string($conn, $_POST['masa_jabatan']);
    $nomor_telpon = mysqli_real_escape_string($conn, $_POST['nomor_telpon']); // Tambahkan ini
    $NIP = mysqli_real_escape_string($conn, $_POST['NIP']); // Tambahkan ini

    // Update query
    $updateQuery = "UPDATE anggota SET nama='$nama', jabatan='$jabatan', masa_jabatan='$masajabatan', nomor_telpon='$nomor_telpon', NIP='$NIP' WHERE id_anggota='$id'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Anggota berhasil diperbarui'); window.location='../kelola_anggota.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>
    <!-- Include any necessary CSS stylesheets -->
    <style>
        /* CSS styles */
        <>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }
        button[type="submit"] {
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Anggota</h2>
        <form method="post" action="">
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($post['nama']); ?>"><br>
            <label for="jabatan">Jabatan :</label>
            <input type="text" name="jabatan" id="jabatan" value="<?= htmlspecialchars($post['jabatan']); ?>"><br>
            <label for="masa_jabatan">Masa Jabatan :</label>
            <input type="text" name="masa_jabatan" id="masa_jabatan" value="<?= htmlspecialchars($post['masa_jabatan']); ?>"><br>
            <label for="nomor_telpon">Nomor Telephone :</label>
            <input type="text" name="nomor_telpon" id="nomor_telpon" value="<?= htmlspecialchars($post['nomor_telpon']); ?>"><br> <!-- Tambahkan ini -->
            <label for="NIP">NIP :</label>
            <input type="text" name="NIP" id="NIP" value="<?= htmlspecialchars($post['NIP']); ?>"><br> <!-- Tambahkan ini -->
            <button type="submit">Update Anggota</button>
        </form>
    </div>
</body>
</html>
