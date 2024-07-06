<?php
session_start();
include "../includes/connection.php";

// CHECKING IF USER HAS LOGGED IN
if (isset($_SESSION["lecturer_id"])) {

    // IF Start Attendance was clicked
    if (isset($_GET["start_attendance"])) {
        $class_id = $_GET["start_attendance"];

        $sql = mysqli_query($connect,"UPDATE `class` SET status = 'Active' WHERE class_id = $class_id");

        if ($sql) {
            echo '
                <script>
                    window.location.href="mark-attendance.php";
                </script>
            ';
            die();
        }
    }


    // IF Stop Attendance was clicked
    if (isset($_GET["stop_attendance"])) {
        $class_id = $_GET["stop_attendance"];

        $sql = mysqli_query($connect,"UPDATE `class` SET status = 'Inactive' WHERE class_id = $class_id");

        if ($sql) {
            echo '
                <script>
                    window.location.href="mark-attendance.php";
                </script>
            ';
            die();
        }
    }
}else{
    echo "
        <script>
            alert('You are not logged in!');
            window.location.href='../sign-in.php';
        </script>
    ";
}
?>