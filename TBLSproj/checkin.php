<?php
session_start();
if(!isset($_SESSION['user'])) {
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
    $result = mysqli_fetch_assoc($link->query("SELECT * FROM checkouts WHERE ID = '".$_POST['ID']."'"));
    $bookid = $result['bookid'];
    $avail = mysqli_fetch_assoc($link->query("SELECT * FROM booklist WHERE ID = '".$bookid."'"))[available];
    $avail++;
    $sql = "UPDATE booklist SET available = '".$avail."' WHERE ID = '".$bookid."'";
    if ($link->query($sql) === TRUE) {
        $sql2 = "DELETE FROM checkouts WHERE ID = '".$_POST['ID']."'";
        if($link->query($sql2) === TRUE)
        {
            echo "Book successfully checked in.";
        }
        else{
            echo "Arere... Something went wrong. Try again. :(";
        }
    } else {
        echo "Arere... Something went wrong. Try again. :(";
    }
}
?>
