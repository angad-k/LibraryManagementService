<?php
session_start();
if(!isset($_SESSION['ADuser'])) {
    die("Login kar re baba.");
}
$server = "localhost";
$username = "root";
$password = "kambliSERVER";
$db = "LibMan";

$link = new mysqli($server, $username, $password, $db);
if($link->connect_errno) {
    die("Connection unsuccessful");
}
else {
    $title = $_POST['title'];
    $number = $_POST['number'];
    $sql = "INSERT INTO booklist (title, available, total) VALUES ('".$title."', '".$number."', '".$number."')";
    if ($link->query($sql) === TRUE) {
        header("Location: listings.php"); 
        exit;
    }
    else {
    echo "Arere... Something went wrong. Try again. :(";
    }
}
?>