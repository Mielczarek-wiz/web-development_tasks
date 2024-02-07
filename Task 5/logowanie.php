<?php session_start(); ?>
<?php
        require("funkcje.php");
        if(isset($_POST["Zaloguj"])){
            //echo "Login ".$_POST["Login"]. "<br>Hasło: ". $_POST["Hasło"];
            if($_POST["Login"]==$osoba1->login and $_POST["Hasło"]==$osoba1->haslo){
                $_SESSION["zalogowany"]=1;
                $_SESSION["zalogowanyImie"]=$osoba1->imieNazwisko;
                header("Location: user.php");
            }
            else if($_POST["Login"]==$osoba2->login and $_POST["Hasło"]==$osoba2->haslo){
                $_SESSION["zalogowany"]=1;
                $_SESSION["zalogowanyImie"]=$osoba2->imieNazwisko;
                header("Location: user.php");
            }
            else{
                header("Location: index.php");
            }
        }
    ?>