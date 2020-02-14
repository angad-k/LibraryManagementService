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
            var checkreq = document.createElement("form");
            var id = '.$row["ID"].';
            var idnode = document.createElement("input");
            idnode.type = "text";
            idnode.name = "ID";
            idnode.value = id;
            checkreq.appendChild(idnode);
            checkreq.method = "POST";
            checkreq.action = "requestapprove.php";
            document.body.appendChild(checkreq);
            checkreq.submit();
            ';
            echo "'>Approve request</button></td></tr>";
        }
        ?>
    </table>
    <br><button type = 'button' onclick = "window.location.href = 'adminhome.php'">Back</button>
</body>
</html>
    
