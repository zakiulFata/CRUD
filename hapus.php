<?php
// Koneksi ke database
$con = new mysqli("localhost", "root", "", "crud_db");
if ($con->connect_error) {
    die("Koneksi gagal:" . $con->connect_error);
}

$id = $_GET["id"];

$sql = "DELETE FROM pendaftar WHERE id='$id'";
if ($con->query($sql) === TRUE) {
    header("Location: index.php"); // Redirect ke halaman utama setelah berhasil
    exit();
} else {
    echo "Error: " . $con->error;
}
?>
