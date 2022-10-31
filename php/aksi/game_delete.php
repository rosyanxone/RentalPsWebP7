<?php
    session_start();

    if(!isset($_SESSION['login'])) {
        print_r($_SESSION);
        header('location: ../auth/login.php');
        exit;
    }
?>

<?php
	include "../connection.php";

	$id = $_GET["id"];
	$sql = "DELETE FROM games WHERE id = '$id'";
	$query = mysqli_query($conn,$sql);
	
    if($query){
        ?>
            <script>
                alert("Data berhasil dihapus!");
                window.location='../game.php';
            </script>
        <?php
    }else {
        ?>
            <script>
                alert("Data gagal dihapus!");
            </script>
        <?php
    }