<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?php
        if(isset($_GET['utworzCookie'])){
            $czas=$_GET['czas'];
            setcookie("Ciasteczko", "Ciasteczko", time() + $czas, "/");
            echo "Status ciasteczka: dodaned!<br>";
        }
    ?>
    <a href="index.php"> Index </a><br>
</body>

</html>