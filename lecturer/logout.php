<?php
session_start();
include "../includes/connection.php";


// CHECKING IF USER HAS LOGGED IN
if (isset($_SESSION["lecturer_id"])) {
    session_unset();
    session_destroy();

    header("location:../sign-in.php");

}else{
    echo "
        <script>
            alert('You are not logged in!');
            window.location.href='../sign-in.php';
        </script>
    ";
}
?>