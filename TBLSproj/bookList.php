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
    $result = $link->query("SELECT * FROM booklist");
}
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <table>
        <tr>
            <th>Sr. No.</th>
            <th>Title</th>
            <th>Available</th>
            <th>Total</th>
            <th></th>
        </tr>
        <?php
        $i = 1;
        while($row = $result->fetch_array()){
            echo "<tr><td>".$i++."</td><td>".$row['title']."</td><td>".$row['available']."</td><td>".$row['total']."</td><td><button type = 'button' id = '".$row['ID']."' onclick = '";
            if($row['available'] != 0)
            {
                echo ' 
                var checkreq = document.createElement("form");
                var id = '.$row["ID"].';
                var idnode = document.createElement("input");
                idnode.type = "text";
                idnode.name = "ID";
                idnode.value = id;
                checkreq.appendChild(idnode);
                checkreq.method = "POST";
                checkreq.action = "requestCheck.php";
                document.body.appendChild(checkreq);
                checkreq.submit();
                ';
            }
            else
            {
                echo  'alert("The book you are requesting is currently not available :(");';
            }
            echo "'>Request Checkout</button></tr>";
            } 
        ?>
    </table>
</body>
</html>