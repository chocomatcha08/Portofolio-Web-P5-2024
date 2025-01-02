<?php
// Menampilkan semua error (untuk debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Konfigurasi koneksi database
$host = 'localhost';
$dbname = 'p5_portofolio';
$username = 'root';
$password = '';

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengecek apakah form sudah dikirim dengan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Mempersiapkan statement untuk mencegah SQL Injection
    $stmt = $conn->prepare("INSERT INTO contact_us (id, name, email, comment) VALUES (null, ?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $comment);

    // Mengeksekusi statement dan menampilkan pesan berdasarkan hasil
    if ($stmt->execute()) {
        echo "Terima kasih! Pesan Anda berhasil dikirim.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup statement dan koneksi
    $stmt->close();
}
$conn->close();
?>