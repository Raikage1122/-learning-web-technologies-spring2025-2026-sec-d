<?php
session_start();

$file = "user.txt";

if (!isset($_SESSION['user'])) {
    die("Login required");
}

$id = $_GET['id'];

$lines = file($file);

$info = explode("|", trim($lines[$id]));

if (isset($_POST['update'])) {

    $info[0] = $_POST['username'];
    $info[1] = $_POST['email'];

    if ($_POST['password'] != "") {
        $info[2] = $_POST['password'];
    }

    $lines[$id] = implode("|", $info) . "\n";

    file_put_contents($file, $lines);

    echo "Updated!";
}
?>

<form method="post">
    Username:
    <input type="text" name="username" value="<?php echo $info[0]; ?>"><br><br>

    Email:
    <input type="email" name="email" value="<?php echo $info[1]; ?>"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    <input type="submit" name="update" value="Update">
</form>