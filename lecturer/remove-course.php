<?php
session_start();
include "../includes/connection.php";


// CHECKING IF USER HAS LOGGED IN
if (isset($_SESSION["lecturer_id"])) {

    // CHECKING IF COURSE_ID IS PASSED
    if (isset($_GET["course_id"])) {
        $course_id = $_GET["course_id"];
        
        $sql = mysqli_query($connect,"DELETE FROM `course` WHERE course_id = $course_id");

        if ($sql) {
            echo "
                <script>
                    alert('Course removed!');
                    window.location.href='allocate-course.php';
                </script>
            ";
        }
    }

    // DELETING ALLOCATED COURSE FOR BOTH LECTURER & STUDENTS
    if (isset($_GET["allocation_id"])) {
        $allocation_id = $_GET["allocation_id"];
        
        $sql = mysqli_query($connect,"DELETE FROM `course_allocation` WHERE allocation_id = $allocation_id");

        if ($sql) {
            echo "
                <script>
                    alert('Course Allocation removed!');
                    window.location.href='allocate-course.php';
                </script>
            ";
        }
    }

}else {
    echo "
    <script>
        alert('You are not logged in!');
        window.location.href='../sign-in.php';
    </script>
";

}

?>