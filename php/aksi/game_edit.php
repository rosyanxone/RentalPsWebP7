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
<body>


    <?php
        require('../connection.php');

		$id = $_GET['id'];
		$sql = "SELECT * FROM games WHERE id ='$id'";
		$query = mysqli_query($conn,$sql);
		$data = mysqli_fetch_array($query);
	?>

    <!-- STRUCK CONTENT -->
    <section id="update-game">
        <div class="form-game" id="formulir">
            <h3>Update Game</h3>
            <form method="POST" enctype="multipart/form-data">
                <label for="">Name <em>&#x2a;</em></label>
                <input class="inputan" type="text" name="nama" value="<?php echo $data['nama'] ?>" required>
                    
                <label for="">Year Release <em>&#x2a;</em></label>
                <input class="inputan" type="number" name="year" value="<?php echo $data['tahun'] ?>" placeholder="day(s)" required>
                
                <div>                        
                    <label for="">Choose Platform <em>&#x2a;</em></label>
                    <ul class="console-type">
                        <li class="games-box">
                            <?php
                                $platform = $data['platform'];
                                $mystr = 'Ps 3';
                                $pos = strpos($platform, $mystr);
                                $result = $pos === false ? '' : 'checked';
                            ?>
                            <input type="checkbox" name="platform[]" class="" id="check_1" value="Ps 3" <?php echo $result ?>>
                            <label for="check_1">Ps 3</label>
                        </li>
                        <li class="games-box">
                            <?php
                                $mystr = 'Ps 4';
                                $pos = strpos($platform, $mystr);
                                $result = $pos === false ? '' : 'checked';
                            ?>
                            <input type="checkbox" name="platform[]" class="" id="check_2" value="Ps 4" <?php echo $result ?>>
                            <label for="check_2">Ps 4</label>
                        </li>
                        <li class="games-box">
                            <?php
                                $mystr = 'Ps 5';
                                $pos = strpos($platform, $mystr);
                                $result = $pos === false ? '' : 'checked';
                            ?>
                            <input type="checkbox" name="platform[]" class="" id="check_3" value="Ps 5" <?php echo $result ?>>
                            <label for="check_3">Ps 5</label>
                        </li>
                        <li class="games-box">
                            <?php
                                $mystr = 'Xbox One';
                                $pos = strpos($platform, $mystr);
                                $result = $pos === false ? '' : 'checked';
                            ?>
                            <input type="checkbox" name="platform[]" class="" id="check_4" value="Xbox One" <?php echo $result ?>>
                            <label for="check_4">Xbox One</label>
                        </li>
                        <li class="games-box">
                            <?php
                                $mystr = 'Xbox One X';
                                $pos = strpos($platform, $mystr);
                                $result = $pos === false ? '' : 'checked';
                            ?>
                            <input type="checkbox" name="platform[]" class="" id="check_5" value="Xbox One X" <?php echo $result ?>>
                            <label for="check_5">Xbox One X</label>
                        </li>
                    </ul>
                </div>

                <div>
                    <label for="">Choose Publisher <em>&#x2a;</em></label>
                    <div class="console-type">
                        <div class="brand">
                            <input type="radio" name="publisher" id="radio_1" value="1" <?php $ischeck = $data['console_id'] == 1 ? 'checked' : ''; echo $ischeck ?>>
                            <label for="radio_1">Playstation</label>
                        </div>
                        <div class="brand" for="console">
                            <input type="radio" name="publisher" id="radio_2" value="2" <?php $ischeck = $data['console_id'] == 2 ? 'checked' : ''; echo $ischeck ?>>
                            <label for="radio_2">Xbox</label>
                        </div>
                    </div>
                </div>
                
                <div class="game-img">
                    <label>Enter Game Image</label>
                    <input class="input-img inputan" name="image" type="file" accept=".jpg,.jpeg,.png">
                </div>
                <div>
                    <label for="">Default Image:</label>
                    <img src="../../img/games-visual/<?php echo $data['gambar'] ?>" alt="game-img" style="width: 120px; margin-bottom: 10px;">
                </div>

                <input type="submit" name="submit" value="Update" class="update-btn">
                <a href="../game.php" class="cancel-btn">Cancel</a>
            </form>
    <?php
        require('../connection.php');

    if(isset($_POST['submit'])){
    
		$id2 = $data['id'];
        $checkboxes = $_POST['platform'];
        $platform = "";
        foreach($checkboxes as $checkbox) {
            $platform .= $checkbox." ";
        }
        
        $nama = $_POST['nama'];
        $year = $_POST['year'];
        $publisher = $_POST['publisher'];
        
        // Set File Gambar
        $rename = $data['gambar'];
        if($_FILES['image']['size'] != 0) {
            $format_file = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
    
            $tipe = explode('.',$format_file);
            $tipe2 = $tipe[1];
            
            $rand_num = rand(100, 999);
            $brand = $publisher == '1' ? 'playstation' : 'xbox';
            $rename = $brand . '-game_' . $tipe[0] . '-' . $rand_num . '.' . $tipe2;
        }
        // End Set File Gambar 
        
        move_uploaded_file($tmp_name, './../../img/games-visual/' . $rename);
        $sql2 = "UPDATE games SET nama = '$nama', tahun = '$year', platform = '$platform', gambar = '$rename', console_id = '$publisher' WHERE id = '$id2'";
        $query2 = mysqli_query($conn, $sql2);
        
        if($query2){
            ?>
                <script>
                    alert("Data berhasil diperbarui!");
                    window.location='../game.php';
                </script>
            <?php
        }else {
            ?>
                <script>
                    alert("Data gagal diperbarui!");
                </script>
            <?php
        }
    }

?>
        </div>
    </section>
    <!-- END STRUCK CONTENT -->

</body>
</html>