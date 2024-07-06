<?php
$connect = mysqli_connect("localhost", "root", "1234567890", "atms");
if (!$connect) {
    die(mysqli_connect_error($connect));
}
?>