<?php

$ext = ".txt";

if (isset($_POST['update'])) {

    $info[0] = $_POST['username'];
    $info[1] = $_POST['email'];

    if ($_POST['password'] != "") {
        $info[2] = $_POST['password'];
    }

    $newData = implode("|", $info);

    $file = fopen("user" . $ext, "w");
    fwrite($file, $newData);
    fclose($file);

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