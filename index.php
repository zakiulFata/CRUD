<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>CRUD SYSTEM</title>
</head>
<body>
    <div class="container">
        <h2>DAFTAR PENGGUNA</h2>
        
        <!-- Container untuk tombol tambah dan form pencarian -->
        <div class="header">
            <a href="create.php" class="btn">Tambah Pengguna Baru</a>
            
            <!-- Form Pencarian -->
            <div class="cari">
                <form method="GET" action="index.php" style="margin-top: 10px;">
                    <input type="text" name="search" placeholder="Cari nama..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                    <button type="submit">Cari</button>
                </form>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $con = new mysqli("localhost", "root", "", "crud_db");
                    if ($con->connect_error) {
                        die("Koneksi gagal:" . $con->connect_error);
                    }

                    // Proses pencarian
                    $search = isset($_GET['search']) ? $con->real_escape_string($_GET['search']) : '';
                    $sql = "SELECT * FROM pendaftar";
                    if ($search) {
                        $sql .= " WHERE name LIKE '%$search%'";
                    }
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $row["id"] ?></td>
                                <td><?= $row["name"] ?></td>
                                <td><?= $row["email"] ?></td>
                                <td><?= $row["phone"] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row["id"] ?>" class="btn-edit">Edit</a>
                                    <a href="hapus.php?id=<?= $row["id"] ?>" class="btn-delete">Hapus</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>