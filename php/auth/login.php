<?php
    include('../connection.php');
    session_start();

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hasil = mysqli_query($conn, "SELECT username, password FROM user WHERE username = '$username'");

        if(mysqli_num_rows($hasil) === 1) {
            $row = mysqli_fetch_assoc($hasil);
            
            if(password_verify($password, $row['password'])) {
                $_SESSION['login'] = $row;
                header('location: ../../index.php');
                exit;
            } else {
                $error_pass = true;
            }
        } else {
            $error_username = true;
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
    <title>Pixel: Rental Ps - Login</title>
    <link rel="shortcut icon" href="../../img/background/logo-p.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="../../stylesheet/style.css">
    <link rel="stylesheet" href="../../stylesheet/style-mobile.css">
</head>
<body>
    <section id="login">
        <div class="login-container">
            <div class="card-body">
                <div class="card-img">
                    <img src="../../img/background/consoles-bg.jpg" alt="login form"/>
                </div>
                <div class="card-content">
                    <div class="content-login">
                        <?php if(isset($error_pass)){ echo "<p class='error-pass'>Password anda salah!</p>"; }?>
                        <?php if(isset($error_username)){ echo "<p class='error-pass'>Akun tidak ditemukan!</p>"; }?>
                        <form action="" method="post" style="width: auto;">
                            <div class="login-title span">
                                <span class="">Pixel</span>
                            </div>
                            <div class="login-title h5">
                                <h5>Sign into your account</h5>
                            </div>
                            <div class="box-login">
                                <div class="input-wrapper">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                                    <label for="username" class="control-label">Username</label>
                                </div>
                            </div>
                            <div class="box-login">
                                <div class="input-wrapper">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                    <label for="password" class="control-label">Password</label>
                                </div>
                            </div>
                            <div class="box-login">
                                <button name="login" type="submit" class="btn-login">Login</button>
                            </div>
                            <p class="regis text-regis">Don't have an account?
                                <a href="register.php" class="regis btn-regis">Register here</a>
                            </p>
                            <a href="#terms-of-use" class="text-muted">Terms of use.</a>
                            <a href="#privacy-police" class="text-muted">Privacy policy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>