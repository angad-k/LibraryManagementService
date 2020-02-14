<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$db = "LibMan";
$link = new mysqli($server, $username, $password, $db);
if($link->connect_errno) {
    die("Connection unsuccessful");
}
else {
    $result = mysqli_fetch_assoc($link->query("SELECT * FROM booklist WHERE id = '".$_POST['ID']."'"));
    $sql = "INSERT INTO requests (user, title, bookid) VALUES ('".$_SESSION['user']."', '".$result['title']."', '".$result['ID']."')";
    $result2 = $link->query("SELECT * FROM requests WHERE user = '".$_SESSION['user']."' AND bookid = '".$result['ID']."'");
    $nResults = mysqli_num_rows($result2);
    if($nResults>0)
    {
        echo "You have already requested for the checkout of : ".$result['title'].".";
    }  
    else
    {
        if ($link->query($sql) === TRUE) {
            echo "You have requested the checkout of : ".$result['title'].".";
        } else {
            echo "Arere... Something went wrong. Try again. :(";
        }
    }  
    
    
}
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
<br>
<button type = 'button' onclick = "window.location.href = 'bookList.php'">Back</button>
</body>
