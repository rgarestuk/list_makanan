<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "food_gallery");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data makanan
$sql = "SELECT nama, description, price, image_url FROM foods";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>Rp " . number_format($row['price'], 0, ',', '.') . "</td>";
        echo "<td><img src='" . $row['image_url'] . "' alt='" . $row['nama'] . "' width='100'></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada data makanan.</td></tr>";
}

$conn->close();
?>
