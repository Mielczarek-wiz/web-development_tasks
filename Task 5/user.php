<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
<a href="index.php"> Index </a><br><br>
<?php
    require_once("funkcje.php");
    if (!isset($_SESSION["zalogowany"])) {
        header("Location: index.php");
    }
    if ($_SESSION["zalogowany"] == 0) {
        header("Location: index.php");
    }
    echo "Zalogowano: " . $_SESSION["zalogowanyImie"];
?>
    
    <form action="index.php" method="post">
        <input type="submit" name="Wyloguj" value="Wyloguj">
    </form> 
    <br><br>
    <form action='user.php' method='POST' enctype='multipart/form-data'>
    <fieldset>
        <legend> Tutaj możesz wysłać swoje pliki: </legend>
        <label for="file">Wybierz plik:</label>
        <input type="file" id="file" name="myfile"><br>
        <input type="submit" name="Wyślij" value="Wyślij">
    </fieldset>
    </form>
<?php
    $currentDir = getcwd();
    if (isset($_POST['Wyślij'])) {
        $fileName = $_FILES['myfile']['name'];
        $uploadPath = $currentDir ."\\". $fileName;
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadPath)) {
            echo "<img src=$fileName width='100%' height=100% alt='Algorytm na przetwarzanie rozproszone!'";
        }
    } else {
        echo "Algorytm na przetwarzanie rozproszone!";
    }
?>
</body>

</html>