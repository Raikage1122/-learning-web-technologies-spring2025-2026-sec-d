<?php
session_start();

$file = "user.txt";

if (!isset($_SESSION['user'])) {
    die("Login required");
}

$id = $_GET['id'];

$lines = file($file);

unset($lines[$id]);

file_put_contents($file, array_values($lines));

header("Location: index.php");
?>