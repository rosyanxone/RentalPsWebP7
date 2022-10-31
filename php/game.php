<?php
    session_start();

    if(!isset($_SESSION['login'])) {
        print_r($_SESSION);
        header('location: auth/login.php');
        exit;
    }

    require('connection.php');
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
    <link href="http://fonts.cdnfonts.com/css/segoe-ui-4?styles=18006,18004" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../stylesheet/style.css">
    <link rel="stylesheet" href="../stylesheet/style-mobile.css">

</head>
<body>
    <!-- HEADER -->
    <header id="home">
        <!-- navbar -->
        <nav class="mode-bg">
            <div class="logo">
                <a href="../index.php" class="mode-text">
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

    <section>
        <div class="daftar-table">
            <h3>Game List</h3>
            <div class="games-table">
                <div class="feature">
                    <a class="add-game" href="aksi/game_create.php">+ Add New Game</a>
                    <form method="GET" class="search-container">
                        <input type="text" name="keyword" id="keyword" class="inp-search search">
                        <button type="submit" name="search" class="btn-search search"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <table class="table games">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Release Year</th>
                        <th>Platform</th>
                        <th>Publisher</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        if(isset($_GET['search'])) {
                            $keyword = $_GET['keyword'];
                            $read = mysqli_query($conn, "SELECT * FROM games WHERE nama LIKE '%$keyword%' OR tahun LIKE '%$keyword%' OR platform LIKE '%$keyword%'");
                        } else {
                            $read = mysqli_query($conn, "SELECT * FROM games");
                        }

                        if(mysqli_num_rows($read) > 0){
                            while($row = mysqli_fetch_array($read)){
                        ?>
                            <tr class="games-content">
                                <td val><?php echo $row['id']?></td>
                                <td><img src="../img/games-visual/<?php echo $row['gambar'] ?>" alt="game-img" style="width: 120px;"></td>
                                <td><?php echo $row['nama']?></td>
                                <td><?php echo $row['tahun']?></td>
                                <td><?php echo $row['platform']?></td>
                        <?php 
                            $read2 = mysqli_query($conn, "SELECT consoles.brand FROM consoles INNER JOIN games on consoles.console_id = ".$row['console_id'].";");
                            $row2 = mysqli_fetch_array($read2);

                            if(mysqli_num_rows($read2) > 0){
                        ?>
                            <td><?php echo $row2['brand']?></td>
                        <?php } ?>
                            <td>
                                <div class="action">
                                    <a class="btn-action edit-action" href="aksi/game_edit.php?id=<?php echo $row['id']; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i> Update
                                    </a>
                                    <a class="btn-action del-action" href="aksi/game_delete.php?id=<?php echo $row['id']; ?>">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php }} else { ?>
                        <tr>
                            <td colspan="7" align="center">-- data tidak ditemukan --</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            
            <h3 style="margin-top: 50px;">Console List</h3>
            <div class="consoles-table">
                <table class="table consoles">
                    <tr>
                        <th>No</th>
                        <th>Brand</th>
                        <th>Company</th>
                        <th>Product</th>
                    </tr>
                    <?php 
                        $read = mysqli_query($conn, "SELECT * FROM consoles");
                        if(mysqli_num_rows($read) > 0){
                            while($row = mysqli_fetch_array($read)){
                    ?>
                        <tr>
                            <td><?php echo $row['console_id']?></td>
                            <td><?php echo $row['brand']?></td>
                            <td><?php echo $row['perusahaan']?></td>
                            <td><?php echo $row['produk']?></td>
                        </tr>
                    <?php }} ?>
                </table>
            </div>
        </div>
    </section>
    
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
    <script src="https://kit.fontawesome.com/a374d5ed26.js" crossorigin="anonymous"></script>
</body>
</html>