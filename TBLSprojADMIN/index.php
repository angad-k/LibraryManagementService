<?php

$server = "localhost";
$username = "root";
$password = "kambliSERVER";
$db = "LibMan";

$link = new mysqli($server, $username, $password, $db);
if($link->connect_errno) {
    die("Connection unsuccessful");
}
else {
    if((isset($_POST['user']))&&(isset($_POST['pass'])))
    {
        $user = $_POST['user'];
        $pass = md5($_POST['pass']);
        $query = $link->query("SELECT * FROM admindeets WHERE user = '".$user."';");
        $result = mysqli_fetch_assoc($query);
        if($result[pass] != $pass)
        {
            echo "Wrong username or password";
        }
        else 
        {
            echo "Baba Lagin Dhinchang Dhichang";
            session_start();
            $_SESSION['ADuser'] = $user;
            header("Location: adminhome.php"); 
            exit;
        }
    }
    else
    {
        echo "Please enter your credentials to login to the Library.";
    } 
}


echo "

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form method = 'POST' action = 'index.php'>
        <label for = 'user'>Username :</label><br>
        <input type = 'text' name = 'user'><br>
        <label for = 'pass'>Password :</label><br>
        <input type = 'password' name = 'pass'><br>
        <input type = 'submit' value = 'Submit'>
    </form>    
</body>
</html>

";
?>