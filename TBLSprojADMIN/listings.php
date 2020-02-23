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
                var id = '.$row["ID"].';
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "edit.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("ID="+id+"&op=plus");
                location.reload();
                ';
            echo "'> + </button>";
            echo "<td><button type = 'button' onclick = '";
            echo ' 
                var id = '.$row["ID"].';
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "edit.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("ID="+id+"&op=minus");
                location.reload();
                ';
            echo "'> - </button>";
            echo "<td><button type = 'button' onclick = '";
            echo ' 
                var id = '.$row["ID"].';
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "edit.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("ID="+id+"&op=delete");
                location.reload();
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
            <label for = "title" >Title : </label><br>
            <input type = "text" name = "title" id = "title"><br>
            <label for = "number">No. of books : </label><br>
            <input type = "number" name = "number" id = "number" min="0"><br>
            <button type = "button" onclick = '
            var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "add.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("title="+document.getElementById("title").value+"&number="+document.getElementById("number").value);
                location.reload();
            '>Add</button>

</form>
<br><button type = 'button' onclick = "window.location.href = 'adminhome.php'">Back</button>
</body>
</html>


