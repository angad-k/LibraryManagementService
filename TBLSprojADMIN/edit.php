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
    var_dump($_POST);
    $result = mysqli_fetch_assoc($link->query("SELECT * FROM booklist WHERE ID = '".$_POST['ID']."'"));
    $title = $result['title'];
    $available = $result['available'];
    $total = $result['total'];
    $op = $_POST['op'];
    if($op == "plus")
    {
        $available++;
        $total++;
        $sql = "UPDATE booklist SET available = '".$available."', total = '".$total."' WHERE ID = '".$_POST['ID']."'";
        if ($link->query($sql) === TRUE) {
            header("Location: listings.php"); 
            exit;
        }
        else {
        echo "Arere... Something went wrong. Try again. :(";
        }
    }
    elseif($op == "minus")
    {
        if($available != 0)
        {
            $available--;
        }
        if($total != 0)
        {
            $total--;
        }      
        $sql = "UPDATE booklist SET available = '".$available."', total = '".$total."' WHERE ID = '".$_POST['ID']."'";
        if ($link->query($sql) === TRUE) {
            header("Location: listings.php"); 
            exit;
        }
        else {
        echo "Arere... Something went wrong. Try again. :(";
        }
    }
    elseif($op == "delete")
    {
        $sql = "DELETE FROM booklist WHERE ID = '".$_POST['ID']."'";
        if ($link->query($sql) === TRUE) {
            header("Location: listings.php"); 
            exit;
        }
        else {
        echo "Arere... Something went wrong. Try again. :(";
        }
    }
}
?>