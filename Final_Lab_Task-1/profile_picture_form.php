<?php
$fileErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["photo"])) {

        $fileName = $_FILES["photo"]["name"];
        $fileSize = $_FILES["photo"]["size"];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if ($fileExt != "jpg" && $fileExt != "jpeg" && $fileExt != "png") {
            $fileErr = "Only jpg, jpeg, png allowed";
        } elseif ($fileSize > 4*1024*1024) {
            $fileErr = "File size must not exceed 4MB";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<fieldset>
<legend>PROFILE PICTURE</legend>

<form method="post" enctype="multipart/form-data">
<input type="file" name="photo">
<span style="color:red"><?php echo $fileErr; ?></span>
<br><br>

<input type="submit" value="Submit">
</form>
</fieldset>

</body>
</html>