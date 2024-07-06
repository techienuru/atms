<?php
session_start();
include "../includes/connection.php";

// CHECKING IF USER HAS LOGGED IN
if (isset($_SESSION["lecturer_id"])) {

    // LOGGED IN USER ID
$lecturer_id = $_SESSION["lecturer_id"]; 


    // Fetching logged in User detail from DB
  $selecting_details = mysqli_query($connect,"SELECT * FROM `lecturer` WHERE lecturer_id = $lecturer_id") ;

  $fetching_details = mysqli_fetch_assoc($selecting_details);

  $fullname = $fetching_details["fullname"];
  $email = $fetching_details["email"];
  $faculty = $fetching_details["faculty"];
  $department = $fetching_details["department"];


    //   If Course is added
    if (isset($_POST["add_course"])) {
        $course_code = $_POST["course_code"];
        $course_title = $_POST["course_title"];
        
        // SQL query
        $add_course_query = "INSERT INTO `course` (course_code, course_title, department) VALUES ('$course_code', '$course_title', '$department')";

        // Execute the query
        $result = mysqli_query($connect, $add_course_query);

        // Check if the query was successful
        if ($result) {
            echo "
            <div class='success-message'>
            <span>&#10003;</span> Course added successfully!
        </div>
        <style>
            .success-message {
                background-color: #dff0d8; /* Green background */
                color: #3c763d; /* White text */
                padding: 10px 20px; /* Padding */
                border-radius: 5px; /* Rounded corners */
                margin-bottom: 20px; /* Margin bottom */
            }

            .success-message span {
                font-size: 20px; /* Checkmark font size */
                margin-right: 10px; /* Spacing between checkmark and text */
            }
        </style>
        <script>
                // Fade out the success message after 3 seconds
                setTimeout(function() {
                    document.querySelector('.success-message').style.display = 'none';
                }, 3000);
        </script>
    ";
        }
    }

    // If course is assign to Lecturer
    if (isset($_POST["assign_course"])) {
        $lecturer = $_POST["lecturer"];
        $course = $_POST["course"];

        $assign_lecturer = mysqli_query($connect,"INSERT INTO `course_allocation`(lecturer_id,course_id,department,allocated_for) VALUES($lecturer,$course,'$department','Lecturer')");

        if ($assign_lecturer) {
            echo "
            <div class='success-message'>
            <span>&#10003;</span> Course assigned successfully!
        </div>
        <style>
            .success-message {
                background-color: #dff0d8; /* Green background */
                color: #3c763d; /* White text */
                padding: 10px 20px; /* Padding */
                border-radius: 5px; /* Rounded corners */
                margin-bottom: 20px; /* Margin bottom */
            }

            .success-message span {
                font-size: 20px; /* Checkmark font size */
                margin-right: 10px; /* Spacing between checkmark and text */
            }
        </style>
        <script>
                // Fade out the success message after 3 seconds
                setTimeout(function() {
                    document.querySelector('.success-message').style.display = 'none';
                }, 3000);
        </script>
    ";      
        }
    }


    // If course is assign to Student
    if (isset($_POST["assign_student_course"])) {
        $course = $_POST["course"];
        $level = $_POST["level"];
        $course_option = $_POST["course_option"];

        $assign_student = mysqli_query($connect,"INSERT INTO `course_allocation`(course_id,level,department,course_option,allocated_for) VALUES($course,'$level','$department','$course_option','Student')");

        if ($assign_student) {
            echo "
                <div class='success-message'>
                    <span>&#10003;</span> Course assigned successfully!
                </div>
                <style>
                    .success-message {
                        background-color: #dff0d8; /* Green background */
                        color: #3c763d; /* White text */
                        padding: 10px 20px; /* Padding */
                        border-radius: 5px; /* Rounded corners */
                        margin-bottom: 20px; /* Margin bottom */
                    }

                    .success-message span {
                        font-size: 20px; /* Checkmark font size */
                        margin-right: 10px; /* Spacing between checkmark and text */
                    }
                </style>
                <script>
                        // Fade out the success message after 3 seconds
                        setTimeout(function() {
                            document.querySelector('.success-message').style.display = 'none';
                        }, 3000);
                </script>
            ";      
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

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard | Attendance Management Sysytem</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        .container {
            padding-top: 50px;
        }
        .attendance-table {
      width: 100%;
      border-collapse: collapse;
    }
    .attendance-table th, .attendance-table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    .attendance-table th {
      background-color: #f2f2f2;
    }
        .dashboard-card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
}

.dashboard-header {
    background-color:white;
    color: white;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    padding: 10px 20px;
}

.dashboard-header h2 {
    margin: 0;
}

.dashboard-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.column {
    flex-basis: calc(50% - 10px);
    margin-bottom: 10px;
}

.column label {
    font-weight: bold;
}

.column p {
    margin: 5px 0;
    font-size: 16px;
}
    </style>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="index.html">
                            <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 img-radius" src="" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details"><?php echo $fullname; ?><i class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                                            <a href="#!"><i class="ti-settings"></i>Settings</a>
                                            <a href="logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 p-b-0">
                                
                            </div>
                            
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="dashboard.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="set-class.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>SC</b></span>
                                        <span class="pcoded-mtext">Set Class</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <?php
                            // Checking if User(Lecturer) is an Exam officer
                            $sql = mysqli_query($connect,"SELECT * FROM `exam_officer` WHERE `lecturer_id` = $lecturer_id");

                            if (mysqli_num_rows($sql) > 0) {
                                echo '
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="active">
                                        <a href="allocate-course.php" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="ti-layers"></i><b></b></span>
                                            <span class="pcoded-mtext">Allocate Course</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>  
                                ';
                            }
                            
                            ?>
                            
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="mark-attendance.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-receipt"></i><b>MA</b></span>
                                        <span class="pcoded-mtext">Mark Attendance</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="attendance-record.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-bar-chart-alt"></i><b>AR</b></span>
                                        <span class="pcoded-mtext">Attendance Record</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="exam-eligibility.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-map-alt"></i><b>CR</b></span>
                                        <span class="pcoded-mtext">Exam Eligibility</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <p class="m-b-0">Welcome to Material Able</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#add-course">Add Course</button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view-course">View Courses</button>
                                    </div>

                                    <!-- ADD COURSE  MODAL -->
                                    <div class="modal" id="add-course">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2>Add Course</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <div class="form-group">
                                                            <label for="lecturerSelect">Course Code:</label>
                                                            <input type="text" class="form-control" name="course_code" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="lecturerSelect">Course Title:</label>
                                                            <input type="text" class="form-control" name="course_title" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary" name="add_course">Add Course</button>            
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- VIEW COURSES  MODAL -->
                                    <div class="modal" id="view-course">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2>Courses</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered attendance-table">
              <thead>
                <tr>
                  <th>Course Code</th>
                  <th>Course title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Fetching Added Courses From Database -->
                <?php
                    $fetching_courses = mysqli_query($connect,"SELECT * FROM `course` WHERE department = '$department'");
                    
                    while ($row = mysqli_fetch_assoc($fetching_courses)) {
                        $course_id = $row["course_id"];
                        $course_code = $row["course_code"];
                        $course_title = $row["course_title"];

                        echo '
                            <tr>
                                <td>'.$course_code.'</td>
                                <td>'.$course_title.'</td>
                                <td>
                                    <a href="remove-course.php?course_id='.$course_id.'" class="btn btn-danger btn-sm">Remove</a>
                                </td>
                            </tr>          
                        ';
                    }
                    ?>
              </tbody>
            </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <!-- ASSIGN COURSE TO LECTURER -->
                                    <div class="container">
                                        <h2>Assign Courses to Lecturers</h2>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="lecturerSelect">Select Lecturer:</label>
                                                <select class="form-control" id="lecturerSelect" name="lecturer" required>
                                                    <option value="">Select Lecturer</option>
                                                    <?php                            
                                                // FETCHING DEPARTMENTAL LECTURERS
                                                $fetching_courses = mysqli_query($connect,"SELECT * FROM `lecturer` WHERE department = '$department'");
                                                    while ($row = mysqli_fetch_assoc($fetching_courses)) {
                                                        $lecturer_id = $row["lecturer_id"];
                                                        $fullname = $row["fullname"];

                                                        echo '
                                                        <option value="'.$lecturer_id.'">'.$fullname.'</option>
                                                        ';
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="courseSelect">Select Course:</label>
                                                <select class="form-control" id="courseSelect" name="course" required>
                                                <option value="">Select Course</option>
                                                <?php                            
                                                // FETCHING ADDED COURSES
                                                $fetching_courses = mysqli_query($connect,"SELECT * FROM `course` WHERE department = '$department'");
                                                    while ($row = mysqli_fetch_assoc($fetching_courses)) {
                                                        $course_id = $row["course_id"];
                                                        $course_code = $row["course_code"];
                                                        $course_title = $row["course_title"];

                                                        echo '
                                                        <option value="'.$course_id.'">'.$course_code.'</option>
                                                        ';
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="assign_course">Assign Course</button>
                                            <button type="button" data-target="#lecturer-course-allocation" data-toggle="modal" class="btn btn-primary">View Allocation</button>
                                        </form>
                                    </div>

                                    <!-- START OF VIEW ALLOCATION MODAL FOR LECTURERS -->
                                    <div class="modal" id="lecturer-course-allocation">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>Course Allocation (Lecturers)</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered attendance-table">
              <thead>
                <tr>
                  <th>Lecturer Name</th>
                  <th>Course Code</th>
                  <th>Course Title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Fetching Allocated Courses From Database -->
                <?php
                    $fetching_allocated_courses = mysqli_query($connect,"SELECT * FROM `course_allocation`
                    INNER JOIN `course`
                    ON `course`.`course_id` = `course_allocation`.`course_id`
                    INNER JOIN `lecturer`
                    ON `lecturer`.`lecturer_id` = `course_allocation`.`lecturer_id`
                    WHERE `course_allocation`.department = '$department' AND `course_allocation`.allocated_for = 'Lecturer'");
                    
                    while ($row = mysqli_fetch_assoc($fetching_allocated_courses)) {
                        $allocation_id = $row["allocation_id"];
                        $fullname = $row["fullname"];
                        $course_code = $row["course_code"];
                        $course_title = $row["course_title"];

                        echo '
                            <tr>
                                <td>'.$fullname.'</td>
                                <td>'.$course_code.'</td>
                                <td>'.$course_title.'</td>
                                <td>
                                    <a href="remove-course.php?allocation_id='.$allocation_id.'" class="btn btn-danger btn-sm">Remove</a>
                                </td>
                            </tr>          
                        ';
                    }
                    ?>
              </tbody>
            </table>    
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF VIEW ALLOCATION MODAL FOR LECTURERS -->



                                    <!-- ASSIGN COURSE TO STUDENTS -->
                                    <div class="container">
                                        <h2>Assign Courses to Students</h2>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="lecturerSelect">Select Course:</label>
                                                <select class="form-control" id="lecturerSelect" name="course" required>
                                                    <option value="">Select Course</option>
                                                    <?php                            
                                                // FETCHING ADDED COURSES
                                                $fetching_courses = mysqli_query($connect,"SELECT * FROM `course` WHERE department = '$department'");
                                                    while ($row = mysqli_fetch_assoc($fetching_courses)) {
                                                        $course_id = $row["course_id"];
                                                        $course_code = $row["course_code"];
                                                        $course_title = $row["course_title"];

                                                        echo '
                                                        <option value="'.$course_id.'">'.$course_code.'</option>
                                                        ';
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="courseSelect">Select Level:</label>
                                                <select class="form-control" id="courseSelect" name="level" required>
                                                    <option value="">Select Level</option>
                                                    <option value="500 Level">500 Level</option>
                                                    <option value="400 Level">400 Level</option>
                                                    <option value="300 Level">300 Level</option>
                                                    <option value="200 Level">200 Level</option>
                                                    <option value="100 Level">100 Level</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="courseSelect">Select Course Option:</label>
                                                <select class="form-control" id="courseSelect" name="course_option" required>
                                                    <option value="">Select Course Option</option>
                                                    <option value="Compulsory">Compulsory</option>
                                                    <option value="Elective">Elective</option>
                                                    
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="assign_student_course">Assign Course</button>
                                            <button type="button" data-target="#student-course-allocation" data-toggle="modal" class="btn btn-primary">View Allocation</button>
                                        </form>

                                        <!-- START OF VIEW ALLOCATION MODAL FOR STUDENTS -->
                                    <div class="modal" id="student-course-allocation">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>Course Allocation (Students)</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered attendance-table">
              <thead>
                <tr>
                  <th>Course Code</th>
                  <th>Course Title</th>
                  <th>Level</th>
                  <th>Course Option</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Fetching Allocated Courses From Database -->
                <?php
                    $fetching_allocated_courses = mysqli_query($connect,"SELECT * FROM `course_allocation`
                    INNER JOIN `course`
                    ON `course`.`course_id` = `course_allocation`.`course_id`
                    WHERE `course_allocation`.department = '$department' AND `course_allocation`.allocated_for = 'Student'");
                    
                    while ($row = mysqli_fetch_assoc($fetching_allocated_courses)) {
                        $allocation_id = $row["allocation_id"];
                        $course_code = $row["course_code"];
                        $course_title = $row["course_title"];
                        $level = $row["level"];
                        $course_option = $row["course_option"];

                        echo '
                            <tr>
                                <td>'.$course_code.'</td>
                                <td>'.$course_title.'</td>
                                <td>'.$level.'</td>
                                <td>'.$course_option.'</td>
                                <td>
                                    <a href="remove-course.php?allocation_id='.$allocation_id.'" class="btn btn-danger btn-sm">Remove</a>
                                </td>
                            </tr>          
                        ';
                    }
                    ?>
              </tbody>
            </table>    
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF VIEW ALLOCATION MODAL FOR STUDENTS -->

                                    </div>


                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js "></script>

    <script type="text/javascript" src="assets/js/script.js "></script>
</body>

</html>
