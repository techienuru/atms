<?php
session_start();
include "../includes/connection.php";


// If user is logged in
if (isset($_SESSION["lecturer_id"])) {

    //If class_id is passed 
    if (isset($_GET["class_id"])){
        $class_id = $_GET["class_id"];

        $sql = mysqli_query($connect,"DELETE FROM `class` WHERE class_id = $class_id");

        if ($sql) {
            echo '
                <script>
                    alert("Class deleted!");
                    window.location.href="set-class.php";
                </script>
            ';
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