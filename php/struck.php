<?php
    if(isset($_POST['rental'])) {
        $nama = $_POST['nama'];
        $console = $_POST['console'];
        $type;
        if($console == "Xbox") {
            $type = $_POST['xbox'];
        } else {
            $type = $_POST['ps'];
        }

        $duration = $_POST['duration'];
        $address = $_POST['address'];
        $days = $duration;
        $tagihan;

        switch($type) {
            case "Ps 3":
                if($duration >= 7) {
                    $duration /= 7;
                    $tagihan = (int) round((39900 * $duration), 0);
                } else {
                    $tagihan = 7000 * $duration;
                }
                break;
            case "Ps 4":
                if($duration >= 7) {
                    $duration /= 7;
                    $tagihan = (int) round((64900 * $duration), 0);
                } else {
                    $tagihan = 10000 * $duration;
                }
                break;
            case "Ps 5":
                if($duration >= 7) {
                    $duration /= 7;
                    $tagihan = (int) round((79900 * $duration), 0);
                } else {
                    $tagihan = 12000 * $duration;
                }
                break;
            case "Xbox One":
                if($duration >= 7) {
                    $duration /= 7;
                    $tagihan = (int) round((59900 * $duration), 0);
                } else {
                    $tagihan = 9000 * $duration;
                }
                break;
            case "Xbox One X":
                if($duration >= 7) {
                    $duration /= 7;
                    $tagihan = (int) round((69900 * $duration), 0);
                } else {
                    $tagihan = 11000 * $duration;
                }
                break;
        }
        
        $rentdate = $_POST['rental_date'];
        $renttime = $_POST['rental_time'];
        
    } else {
    ?>
        <script type="text/javascript">
            window.location = "rent.php#formulir";
        </script>   
    <?php  
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
    <link rel="shortcut icon" href="../img/background/logo-p.png">
    
    <!-- Link Font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/213e56f9ea368890b9d2da0577e49dab?family=Zona+Pro" rel="stylesheet" type="text/css"/>

    <!-- CSS -->
    <link rel="stylesheet" href="../stylesheet/style.css">
    <link rel="stylesheet" href="../stylesheet/style-mobile.css">
</head>
<body>
    <!-- HEADER -->
    <header class="main" id="home">
        <!-- navbar -->
        <nav class="mode-bg">
            <div class="logo">
                <a href="../index.html" class="mode-text">
                    PIXEL
                </a>
            </div>

            <ul>
                <li><a class="mode-text" href="../index.php">Home</a></li>
                <li><a class="mode-text" href="rent.php">Rent</a></li>
                <li><a class="mode-text" href="game.php">Games</a></li>
            </ul>
            <div class="logout-btn">
                <a href="auth/logout.php">Logout</a>
            </div>
            <div>
                <input type="checkbox" class="checkbox" id="chk"/>
                <label class="label" for="chk">
                    <i class="fas fa-moon"></i>
                    <i class="fas fa-sun"></i>
                    <div class="ball"></div>
                </label>
            </div>

            <div class="menu-toggle">
                <input type="checkbox" id="menTog"/>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <!-- end navbar -->
    </header>
    <!-- END HEADER -->


    <!-- STRUCK CONTENT -->
    <section>
        <div class="struk-container">
            <div class="bills">
                <h3>Payments Detail</h3>
                <div class="bills-text">
                    <p>Name: </p><p><?php echo $nama; ?></p>
                </div>
                <div class="bills-text">
                    <p>Console type: </p><p><?php echo $type; ?></p>
                </div>
                <div class="bills-text">
                    <p>Rental duration: </p><p><?php echo $days; ?> day(s)</p>
                </div>
                <div class="bills-text">
                    <p>Address: </p><p><?php echo $address; ?></p>
                </div>
                <div class="bills-text">
                    <p>Payment Total: </p><p>Rp.<?php echo $tagihan; ?></p>
                </div>
                <!-- Menampilkan Tanggal & Waktu -->
                <div class="bills-text">
                    <p>Time Transaction: </p><p><?php echo $renttime ?> WITA</p>
                </div>
                <div class="bills-text">
                    <p>Date Transaction: </p><p><?php echo $rentdate ?></p>
                </div>
                <!-- END Menampilkan Tanggal & Waktu -->
                <label for="" style="padding: 15px 0;">Choose Payment Method <em>&#x2a;</em></label>
                <div class="payment-method">
                    <label class="method">
                        <input type="radio" name="test" value="small" checked>
                        <img src="../img/partners/dana.png" alt="Method 1">
                    </label>
                    <label class="method">
                        <input type="radio" name="test" value="small">
                        <img src="../img/partners/gopay.png" alt="Method 2">
                    </label>
                    <label class="method">
                        <input type="radio" name="test" value="small">
                        <img src="../img/partners/ovo.png" alt="Method 3">
                    </label>
                </div>
                <div class="success-btn">
                    <a class="btn" href="../index.html" onclick="alert('Payment Success!');">Confirm</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END STRUCK CONTENT -->


    <!-- FOOTER -->
    <footer class="mode-bg">
        <div class="footer-container">
            <div class="footer-title" id="contact">
                <h2>CONTACT US</h2>
            </div>
            <div class="footer-contact-item">
                <div class="footer-item">
                    <h4>Location</h4>
                    <p>28 Jackson Blvd Ste 1020 Chicago<br>IL 60604-2340<br>Phone: +628 135 158 0524</p>
                </div>
                <div class="footer-item">
                    <h4>Find Us On</h4>
                    <div class="circle-container">
                        <!-- salah satu fitur pop up box (confirm) -->
                        <div class="circle ig">
                            <a href="https://www.instagram.com/pixel" onclick="return confirm('You will be redirected to other website.');"><img src="../img/media-social/instagram.png" alt=""></a>
                        </div>
                        <div class="circle fb">
                            <a href="https://www.facebook.com/pixel" onclick="return confirm('You will be redirected to other website.');"><img src="../img/media-social/facebook.png" alt=""></a>
                        </div>
                        <div class="circle wa">
                            <a href="https://www.whatsapp.com/pixel" onclick="return confirm('You will be redirected to other website.');"><img src="../img/media-social/whatsapp.png" alt=""></a>
                        </div>
                        <div class="circle tw">
                            <a href="https://www.twitter.com/pixel" onclick="return confirm('You will be redirected to other website.');"><img src="../img/media-social/twitter.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="copyright">© 2022 <a href="https://instagram.com/rosyanxone/">rosyanxone</a>. All rights reserved.</div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="../js/dark-mode.js"></script>
    <script src="../js/navbar-mobile.js"></script>
    <script src="../js/pop-up-box.js"></script>
    <script src="https://kit.fontawesome.com/a374d5ed26.js" crossorigin="anonymous"></script>
</body>
</html>
