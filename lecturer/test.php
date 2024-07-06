<?php
session_start();
include "../includes/connection.php";

// Selecting all set classes by the logged in Lecturer
$select_classes = mysqli_query($connect,"SELECT * FROM `class`
INNER JOIN `course`
ON class.course_id = course.course_id
INNER JOIN `lecturer`
ON class.lecturer_id = lecturer.lecturer_id
WHERE class.lecturer_id = 1;
");

$row = mysqli_fetch_assoc($select_classes);

$course_date = $row["course_date"];

// Separate date
$date = date("l M d, Y", strtotime($course_date));
$time = date("h:i:sa", strtotime($course_date));

echo $date . "<br>"; // This will output the date part only
echo $time; // This will output the date part only
?>
