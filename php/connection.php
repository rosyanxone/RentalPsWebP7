<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'rentalps-web';

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if(!$conn){
        die("Koneksi Gagal: ".mysqli_connect_error());
    }