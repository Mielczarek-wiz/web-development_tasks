<?php
session_start();
$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql = "SELECT * FROM pracownicy";
$result = $link->query($sql);
foreach ($result as $v) {
    echo $v["ID_PRAC"] . " " . $v["NAZWISKO"] . "<br/>";
}
$result->free();
$link->close();
if (isset($_SESSION['comm'])) {
    $comm = $_SESSION['comm'];
    if ($comm == 1) {
        echo "Wstawienie danych powiodło się";
        $_SESSION['comm'] = 0;
    }
}
print <<<KONIEC
    <a href="form06_post.php">POST</a><br>
KONIEC;
?>