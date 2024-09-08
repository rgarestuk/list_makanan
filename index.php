<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Makanan</title>
</head>
<body>
    <h2>Form Upload Makanan</h2>
    <form action="upload_food.php" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama Makanan:</label><br>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="description">Deskripsi:</label><br>
        <textarea name="description" id="description" required></textarea><br><br>

        <label for="price">Harga:</label><br>
        <input type="number" step="0.01" name="price" id="price" required><br><br>

        <label for="image">Pilih Gambar:</label><br>
        <input type="file" name="image" id="image" accept="image/*" required><br><br>

        <input type="submit" value="Upload Makanan">
    </form>

    <h2>Daftar Makanan</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Gambar</th>
        </tr>

        <?php
        // Tampilkan semua error
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Koneksi ke database
        $conn = new mysqli("localhost", "root", "", "food_gallery");

        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Query untuk mengambil data makanan
        $sql = "SELECT nama, description, price, image_url FROM foods";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                echo "<td>Rp " . number_format($row['price'], 0, ',', '.') . "</td>";
                echo "<td><img src='" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['nama']) . "' width='100'></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data makanan.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
