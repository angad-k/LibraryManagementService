<?php 

session_start();
if(!isset($_SESSION['ADuser'])) {
    die("Login kar re baba.");
}
echo "
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    Hi, ".$_SESSION['ADuser']." <br>
    Select one of the options below to proceed.<br>
    <button type = 'button' onclick = ".'"'."window.location.href = 'requests.php';".'"'.">Checkout requests.</button><br>
    <button type = 'button' onclick = ".'"'."window.location.href = 'listings.php';".'"'.">Change listings.</button><br>
    <button type='button' onclick = ".'"'." 
    if(confirm('Are you sure?'))
    {
        window.location.href = 'logout.php';
    }
    ".'"'.">Log out</button><br>
</body>
"
?>
