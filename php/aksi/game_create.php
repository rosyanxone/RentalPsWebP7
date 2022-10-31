<?php
    session_start();

    if(!isset($_SESSION['login'])) {
        print_r($_SESSION);
        header('location: ../auth/login.php');
        exit;
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
<body style="height: 100%;">

    <!-- STRUCK CONTENT -->
    <section id="create-game">
        <div class="form-game" id="formulir">
            <h3>Add New Game</h3>
            <form method="POST" enctype="multipart/form-data">
                <label for="">Name <em>&#x2a;</em></label>
                <input class="inputan" type="text" name="nama" placeholder="Game Name" required>
                    
                <label for="">Year Release <em>&#x2a;</em></label>
                <input class="inputan" type="number" name="year" placeholder="Year" required>
                
                <div class="radio-console">                        
                    <label for="">Choose Platform <em>&#x2a;</em></label>
                    <ul class="console-type">
                        <li class="games-box">
                            <input type="checkbox" name="platform[]" class="" id="check_1"value="Ps 3">
                            <label for="check_1">Ps 3</label>
                        </li>
                        <li class="games-box">
                            <input type="checkbox" name="platform[]" class="" id="check_2"value="Ps 4">
                            <label for="check_2">Ps 4</label>
                        </li>
                        <li class="games-box">
                            <input type="checkbox" name="platform[]" class="" id="check_3"value="Ps 5">
                            <label for="check_3">Ps 5</label>
                        </li>
                        <li class="games-box">
                            <input type="checkbox" name="platform[]" class="" id="check_4"value="Xbox One">
                            <label for="check_4">Xbox One</label>
                        </li>
                        <li class="games-box">
                            <input type="checkbox" name="platform[]" class="" id="check_5"value="Xbox One X">
                            <label for="check_5">Xbox One X</label>
                        </li>
                    </ul>
                </div>

                <div class="radio-console">
                    <label for="">Choose Publisher <em>&#x2a;</em></label>
                    <div class="console-type">
                        <div class="brand">
                            <input type="radio" name="publisher" id="radio_1" value="1">
                            <label for="radio_1">Playstation</label>
                        </div>
                        <div class="brand" for="console">
                            <input type="radio" name="publisher" id="radio_2" value="2">
                            <label for="radio_2">Xbox</label>
                        </div>
                    </div>
                </div>
                
                <div class="game-img">
                    <label>Enter Game Image <em>&#x2a;</em></label>
                    <input class="input-img inputan" name="image" type="file" accept=".jpg,.jpeg,.png" required>
                </div>

                <input type="submit" name="submit" value="Create" class="create-btn">
                <a href="../game.php" class="cancel-btn" style="color: white;">Cancel</a>
            </form>
    <?php
    require('../connection.php');

    if(isset($_POST['submit'])){
        
        $nama = $_POST['nama'];
        $year = $_POST['year'];
        
        $checkboxes = $_POST['platform'];
        $platform = "";
        foreach($checkboxes as $checkbox) {
            $platform .= $checkbox." ";
        }

        $publisher = $_POST['publisher'];


        // Set File Gambar
        $format_file = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $tipe = explode('.',$format_file);
        $tipe2 = $tipe[1];
        
        $rand_num = rand(100, 999);
        $brand = $publisher == '1' ? 'playstation' : 'xbox';
        $rename = $brand . '-game_' . $tipe[0] . '-' . $rand_num . '.' . $tipe2;
        // End Set File Gambar
        
        move_uploaded_file($tmp_name, './../../img/games-visual/' . $rename);
        $sql = "INSERT INTO games VALUES(
            null, 
            '".$nama."', 
            '".$year."', 
            '".$platform."', 
            '".$rename."', 
            '".$publisher."'
        )";
        $query = mysqli_query($conn, $sql);
        
        if($query){
            ?>
                <script>
                    alert("Data berhasil ditambahkan!");
                    window.location='../game.php';
                    </script>
            <?php
        }else {
            ?>
                <script>
                    alert("Data gagal ditambahkan!");
                </script>
            <?php
        }
    } ?>
        </div>
    </section>
    <!-- END STRUCK CONTENT -->


</body>
</html>