<?php
// Start the session and connect to the database
session_start();
$conn = mysqli_connect("localhost", "root", "", "bpd");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get post ID from GET request
$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM postingan WHERE id_postingan = '$post_id'";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $tanggal = date('Y-m-d');  // Assume posting date is today's date

    // Update query
    $updateQuery = "UPDATE postingan SET judul='$judul', isi='$isi', tanggal='$tanggal' WHERE id_postingan='$post_id'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Postingan berhasil di perbarui'); window.location='../kelola_postingan.php';</script>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <!-- Include any necessary CSS stylesheets -->
    <style>
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
        input[type="text"],
        textarea {
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
        <h2>Edit Post</h2>
        <form method="post" action="">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" value="<?= htmlspecialchars($post['judul']); ?>"><br>
            <label for="isi">Isi:</label>
            <textarea name="isi" id="isi" rows="8"><?= htmlspecialchars($post['isi']); ?></textarea><br>
            <input type="hidden" name="tanggal" value="<?= date('Y-m-d'); ?>">
            <button type="submit">Update Post</button>
        </form>
    </div>
</body>
</html>
