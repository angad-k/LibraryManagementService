<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "LibMan";

$link = new mysqli($server, $username, $password, $db);
if($link->connect_errno) {
    die("Connection unsuccessful");
}
else {
    $result = mysqli_fetch_assoc($link->query("SELECT * FROM requests WHERE ID = '".$_POST['ID']."'"));
    $bookid = $result['bookid'];
    $avail = mysqli_fetch_assoc($link->query("SELECT * FROM booklist WHERE ID = '".$bookid."'"))[available];
    $avail--;
    $sql = "UPDATE booklist SET available = '".$avail."' WHERE ID = '".$bookid."'";
    if ($link->query($sql) === TRUE) {
        $sql2 = "DELETE FROM requests WHERE ID = '".$_POST['ID']."'";
        if($link->query($sql2) === TRUE)
        {
            echo "Request successfully approved.";
        }
        else{
            echo "Arere... Something went wrong. Try again. :(";
        }
    } else {
        echo "Arere... Something went wrong. Try again. :(";
    }
    
    
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<br><button type = 'button' onclick = "window.location.href = 'requests.php'">Back</button>
</body>
</html>
