<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?php
        echo "<h1>Nasz system</h1>"; 
        if(isset($_POST["Wyloguj"])){
            $_SESSION["zalogowany"]=0;
        }
    ?>
    <form action="logowanie.php" method="post">
        <fieldset>
            <legend> Logowanie: </legend>
            <label for="Login">Login:</label>
            <input type="text" id="Login" name="Login"><br>
            <label for="Hasło">Hasło:</label>
            <input type="password" id="Hasło" name="Hasło"><br>
            <input type="submit" name="Zaloguj" value="Zaloguj"><br>
        </fieldset>
    </form>
    <br>
    <form action="cookie.php" method="GET">
    <fieldset>
        <legend> SetCookie: </legend>
        <label for="czas">Czas życia ciasteczka:</label>
        <input type="number" id="czas" name="czas"><br>
        <input type="submit" name="utworzCookie" value="Utwórz">
    </fieldset>
    </form>
    <?php
        if(isset($_COOKIE['Ciasteczko'])){
            echo $_COOKIE['Ciasteczko'];
        }
    ?>




    <br><br><a href="user.php"> User </a><br><br>
</body>

</html>