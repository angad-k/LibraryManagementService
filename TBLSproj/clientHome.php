<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    Hi, <?php echo $_SESSION['user']; ?><br>
    Welcome to the library service.<br>Select one of the options below to proceed.<br>
    <button type='button' onclick = "window.location.href = 'bookList.php'">View books</button><br>
    <button type='button' onclick = "window.location.href = 'checkedout.php'">Checked-out books</button><br>
    <button type='button' onclick = " 
    if(confirm('Are you sure?'))
    {
        window.location.href = 'logout.php';
    }
    ">Log out</button><br>
</body>
</html>


