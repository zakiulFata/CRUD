
<?php
    include "../koneksi.php";

    session_start();
    if ($_server["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $username = $_POST['pasword'];

        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0){
            $user = $result->fetch_assoc();

            if ($pasword == $user ['pasword']){
                $_SESSION['username'] = $username;
                echo "Login Berhasil";
                exit;
            }else{
                echo "Pasword Salah";
            }
        }else{
            echo "Username tidak ditemukan";
        }

        $stmt->close();
    }

    $conn->close();
?>