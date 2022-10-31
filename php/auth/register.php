<?php
    require('../connection.php');
    
    if(isset($_POST['register'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cPassword = $_POST['confirm-password'];

        if($password === $cPassword) {
            $password = password_hash($password, PASSWORD_DEFAULT);

            $hasil = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
            if(mysqli_fetch_assoc($hasil)) {
                echo '<script>
                    alert("Username already registered");
                    document.location.href = "regist.php";
                </script>';
            } else {
                $push_data = mysqli_query($conn, "INSERT INTO user (username, nama, password) VALUES ('$username', '$nama', '$password')");
                
                if(mysqli_affected_rows($conn) > 0) {
                    echo '<script>
                        alert("Registrasi berhasil");
                        document.location.href = "login.php";
                    </script>';
                } else {
                    echo '<script>
                        alert("Registrasi gagal");
                        document.location.href = "regist.php";
                    </script>';
                }
            }
        } else {
            echo '<script>
                alert("Password is incorrect");
                document.location.href = "regist.php";
            </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title & Web Icon -->
    <title>Pixel: Rental Ps</title>
    <link rel="shortcut icon" href="../../img/background/logo-p.png">
    
    <!-- Link Font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/213e56f9ea368890b9d2da0577e49dab?family=Zona+Pro" rel="stylesheet" type="text/css"/>

    <!-- CSS -->
    <link rel="stylesheet" href="../../stylesheet/style.css">
    <link rel="stylesheet" href="../../stylesheet/style-mobile.css">
</head>
<body>
    <section id="register">
        <div class="regis-container">
            <div class="card-body-register">
                <div class="card-regis-img">
                    <img src="../../img/background/consoles-bg-2.jpg" alt="login form"/>
                </div>
                <div class="card-content-regis">
                    <div class="content-regis">
                        <form action="" method="POST">
                            <div class="login-title span">
                                <span class="">SignUp</span>
                            </div>
                            <div class="box-register">
                                <div class="input-wrapper">
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
                                    <label for="nama" class="control-label">Nama</label>
                                </div>
                            </div>

                            <div class="box-register">
                                <div class="input-wrapper">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                                    <label for="username" class="control-label">Username</label>
                                </div>
                            </div>
                            
                            <div class="box-register">
                                <div class="input-wrapper">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                    <label for="password" class="control-label">Password</label>
                                </div>
                            </div>
                            
                            <div class="box-register">
                                <div class="input-wrapper">
                                    <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Konfirmasi Password" required>
                                    <label for="confirm-password" class="control-label">Konfirmasi Password</label>
                                </div>
                            </div>
                            
                            <div class="box-register">
                                <button name="register" type="submit" class="btn-login">Register</button>
                            </div>
                            <p class="text-login regis">Already have an account?
                                <a href="login.php" class="regis">Login here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>