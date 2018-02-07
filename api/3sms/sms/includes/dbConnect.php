<?php
$con = mysqli_connect("localhost", "root",'usbw', "my_db");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
