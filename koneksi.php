<?php
//Koneksi database
    $con = new mysqli("localhost", "root", "", "crud_db");
    if ($con->connect_error) {
        die("Koneksi gagal:" . $con->connect_error);
    }

?>