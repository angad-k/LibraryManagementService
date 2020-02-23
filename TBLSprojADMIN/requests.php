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
    $result = $link->query("SELECT * FROM requests");
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <table>
    <tr>
    <th>Sr. no.</th>
    <th>User</th>
    <th>Book name</th>
    <th></th>
    </tr>
    <?php
        $i = 1;
        while($row = $result->fetch_array()){
            
            echo "<tr><td>".$i++."</td><td>".$row['user']."</td><td>".$row['title']."</td><td><button type = 'button' id = '".$row['ID']."' onclick = '";
            echo ' 
            
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "requestapprove.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("ID="+id);
            location.reload();


            ';
            echo "'>Approve request</button></td></tr>";
        }
        ?>
    </table>
    <br><button type = 'button' onclick = "window.location.href = 'adminhome.php'">Back</button>
</body>
</html>
    