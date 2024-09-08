<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "food_gallery");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST['nama']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);

    // Mengambil informasi file yang di-upload
    $image = $_FILES['image']['name'];
    $target_dir = "images/";  // Folder tempat gambar disimpan
    $target_file = $target_dir . basename($image);

    // Memindahkan gambar ke folder "images"
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Menyimpan jalur gambar (URL) ke database
        $image_url = $target_file; // Menyimpan path gambar ke dalam database

        // Query untuk menyimpan data makanan ke tabel foods
        $sql = "INSERT INTO foods (nama, description, price, image_url) VALUES ('$nama', '$description', '$price', '$image_url')";

        if ($conn->query($sql) === TRUE) {
            echo "Makanan berhasil di-upload!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan saat meng-upload gambar.";
    }
}

$conn->close();
header("Location: form_upload.php"); // Arahkan kembali ke halaman utama setelah upload
exit();
?>
