<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "Please login first!";
    exit;
}

echo "Welcome: " . $_SESSION['user'];

$file = "user.txt";
$lines = file($file);

echo "<h2>User List</h2>";

foreach ($lines as $i => $line) {

    $info = explode("|", trim($line));

    echo $info[0] . " | " . $info[1];

    echo " 
    <a href='edit_user.php?id=$i'>Edit</a>
    <a href='delete.php?id=$i'>Delete</a>
    <br><br>";
}
?>