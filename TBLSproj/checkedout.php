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
    $result = $link->query("SELECT * FROM checkouts");
}
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
    Checked out books :
    <table>
        <tr>
            <th>Sr. No.</th>
            <th>Title</th>
            <th></th>
        </tr>
        <?php
        $i = 1;
        while($row = $result->fetch_array()){
            echo "<tr><td>".$i++."</td><td>".$row['title']."</td><td><button type = 'button' id = '".$row['ID']."' onclick = '";
            echo ' 
            var checkreq = document.createElement("form");
            var id = '.$row["ID"].';
            var idnode = document.createElement("input");
            idnode.type = "text";
            idnode.name = "ID";
            idnode.value = id;
            checkreq.appendChild(idnode);
            checkreq.method = "POST";
            checkreq.action = "checkin.php";
            document.body.appendChild(checkreq);
            checkreq.submit();   
            ';
            echo "'>Check-in</button></td></tr>";
            } 
        ?>
    </table>
    <button type = 'button' onclick = "window.location.href = 'clientHome.php'">Back</button>
</body>
</html>