<?php
// Koneksi ke database
$con = new mysqli("localhost", "root", "", "crud_db");
if ($con->connect_error) {
    die("Koneksi gagal:" . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO pendaftar (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($con->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect ke halaman utama setelah berhasil
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="styles/style_create.css">
</head>
<body>
    <nav>
    <h2>Tambah Pengguna Baru</h2>
    </nav>
    <div  class="container">
    <form method="post">
        <label>Nama:</label>
        <input type="text" name="name" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Telepon:</label>
        <input type="text" name="phone" required>
        <br>
        <button type="submit">Tambah</button>
    </form>
    </div>
</body>
</html>