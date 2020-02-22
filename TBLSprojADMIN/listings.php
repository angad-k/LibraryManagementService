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
            <th></th>
            <th></th>
        </tr>
        <?php
        $i = 1;
        while($row = $result->fetch_array()){
            echo "<tr><td>".$i++."</td><td>".$row['title']."</td><td>".$row['available']."</td><td>".$row['total']."</td><td><button type = 'button' onclick = '";
            echo ' 
                var checkreq = document.createElement("form");
                var id = '.$row["ID"].';
                var idnode = document.createElement("input");
                idnode.type = "text";
                idnode.name = "ID";
                idnode.value = id;
                checkreq.appendChild(idnode);
                var op = document.createElement("input");
                op.type = "text";
                op.name = "op";
                op.value = "plus";
                checkreq.appendChild(op);
                checkreq.method = "POST";
                checkreq.action = "edit.php";
                document.body.appendChild(checkreq);
                checkreq.submit();
                ';
            echo "'> + </button>";
            echo "<td><button type = 'button' onclick = '";
            echo ' 
                var checkreq = document.createElement("form");
                var id = '.$row["ID"].';
                var idnode = document.createElement("input");
                idnode.type = "text";
                idnode.name = "ID";
                idnode.value = id;
                checkreq.appendChild(idnode);
                var op = document.createElement("input");
                op.type = "text";
                op.name = "op";
                op.value = "minus";
                checkreq.appendChild(op);
                checkreq.method = "POST";
                checkreq.action = "edit.php";
                document.body.appendChild(checkreq);
                checkreq.submit();
                ';
            echo "'> - </button>";
            echo "<td><button type = 'button' onclick = '";
            echo ' 
                var checkreq = document.createElement("form");
                var id = '.$row["ID"].';
                var idnode = document.createElement("input");
                idnode.type = "text";
                idnode.name = "ID";
                idnode.value = id;
                checkreq.appendChild(idnode);
                var op = document.createElement("input");
                op.type = "text";
                op.name = "op";
                op.value = "delete";
                checkreq.appendChild(op);
                checkreq.method = "POST";
                checkreq.action = "edit.php";
                document.body.appendChild(checkreq);
                checkreq.submit();
                ';
            echo "'> Delete </button>";
            echo "</tr>";
            } 
        ?>
    </table>
<br>
Use the form below to add new books to the listings.
<br>
<form method = "POST" action = "add.php">
            <label for = "title">Title : </label><br>
            <input type = "text" name = "title"><br>
            <label for = "title">No. of books : </label><br>
            <input type = "number" name = "number" min="0"><br>
            <input type = "submit" name = "submit">

</form>
<br><button type = 'button' onclick = "window.location.href = 'adminhome.php'">Back</button>
</body>
</html>