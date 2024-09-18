<?php
// Memastikan file yang diminta ada dalam folder 'download'
$file = '../download/' . basename($_GET['file']);

// Memeriksa apakah file ada atau tidak
if (file_exists($file)) {
    // Mengirimkan header untuk mengunduh file
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
} else {
    echo 'File tidak ditemukan.';
}
?>