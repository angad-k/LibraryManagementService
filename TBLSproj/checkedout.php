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
<div id = "response"></div>
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
            var id = '.$row["ID"].'; 
            var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("response").innerHTML =
                        this.responseText;
                        document.getElementById(id).disabled = true;
                   }
                };
                xhttp.open("POST", "checkin.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("ID="+id);
                
            ';
            echo "'>Check-in</button></td></tr>";
            } 
        ?>
    </table>
    <button type = 'button' onclick = "window.location.href = 'clientHome.php'">Back</button>
</body>
</html>