<?php
session_start();
$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if (
    isset($_POST['id_prac']) &&
    is_numeric($_POST['id_prac']) &&
    is_string($_POST['nazwisko']) &&
    strlen($_POST['nazwisko']>0)
) {
    $sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
    try{
        $result=$stmt->execute();
        $_SESSION['comm']=1;
        header("Location: form06_get.php");
        exit();
    }
    catch( Exception $e){
        $_SESSION['comm']=$e->getMessage();
        header("Location: form06_post.php");
        exit();
    }
    if (!$result) {
        $_SESSION["comm"]=mysqli_error($link);
        header("Location: form06_post.php");
    }
    $stmt->close();
}
else{
    $_SESSION['comm']="Nazwisko nie może być puste lub składać się tylko z białych znaków!";
    header("Location: form06_post.php");
    exit();
}
$result->free();
$link->close();
?>