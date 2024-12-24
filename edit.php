<?php
// Koneksi ke database
$con = new mysqli("localhost", "root", "", "crud_db");
if ($con->connect_error) {
    die("Koneksi gagal:" . $con->connect_error);
}

$id = $_GET["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "UPDATE pendaftar SET name='$name', email='$email', phone='$phone' WHERE id='$id'";
    if ($con->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect ke halaman utama setelah berhasil
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    $sql = "SELECT * FROM user WHERE id='$id'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="styles/style_edite.css">
</head>
<body>
    <div class="container">
        <h2>Edit Pengguna</h2>
        <form method="post">
            <label>Nama:</label>
            <input type="text" name="name" value="<?= $row["name"] ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?= $row["email"] ?>" required>
            <label>Telepon:</label>
            <input type="text" name="phone" value="<?= $row["phone"] ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>