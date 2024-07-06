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

//   IF 'set class' button is clicked
if (isset($_POST["set_class"])) {
    $course = $_POST["course"];
    $date_time = $_POST["date_time"];
    $date_time = date("Y-m-d h:i:s");

    
    $inserting = mysqli_query($connect,"INSERT INTO `class` (course_id,course_date,status,lecturer_id) VALUES($course,'$date_time','Not set',$lecturer_id)");

    if ($inserting) {
        echo "
            <div class='success-message'>
            <span>&#10003;</span> Course set successfully!
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
    }else {
        echo "
            <div class='success-message'>
            <span>&#10003;</span> Error while setting Course!
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
            /* Add your custom styles here */
            .modal-content {
            animation: fadeInUp 0.5s ease;
            }

            @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
            }

    /* Style the custom scrollbar */
    .modal-body {
        max-height: 400px; /* Set max height for scrollbar */
        overflow-y: auto; /* Enable vertical scrollbar */
        scrollbar-width: thin; /* Set width of the scrollbar */
        scrollbar-color: #888888 #f5f5f5; /* Set color for scrollbar */
    }

    /* Track */
    ::-webkit-scrollbar {
        width: 8px; /* Set width of scrollbar */
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888888; /* Set color for scrollbar handle */
        border-radius: 10px; /* Set border radius */
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555; /* Set color for scrollbar handle on hover */
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
                                <li class="active">
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
                                    <li class="">
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
                                    <div class="page-body">
                                        <div class="row">
                                        
                                                <div class="container mt-5">
            <!-- Set Class Form -->
            <form action="" method="post">
            <div class="form-group">
                <label for="courseSelect">Select Course:</label>
                <select class="form-control" id="courseSelect" name="course" required>
                    <option value="">Select Course</option>
                    <?php 
                    // Fetching Courses allocated for the logged in Lecturer
                    $fetch_courses = mysqli_query($connect,"SELECT * FROM `course_allocation`
                    INNER JOIN lecturer
                    ON course_allocation.lecturer_id = lecturer.lecturer_id
                    INNER JOIN course
                    ON course_allocation.course_id = course.course_id
                    WHERE course_allocation.lecturer_id = $lecturer_id AND course_allocation.allocated_for = 'lecturer'");

                    while ($row = mysqli_fetch_assoc($fetch_courses)) {
                        $course_id = $row["course_id"];
                        $course_code = $row["course_code"];
                        echo '
                            <option value="'.$course_id.'">'.$course_code.'</option>
                        ';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="dateTime">Date and Time:</label>
                <input type="datetime-local" class="form-control" id="dateTime" name="date_time" required>
            </div>
            <button type="submit" class="btn btn-primary" name="set_class">Set Class</button>
            </form>

            <!-- View Details Button -->
            <button type="button" class="btn btn-success mt-3" data-target="#viewDetailsModal" data-toggle="modal">View Details</button>

            <!-- View Details Modal -->
            <div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewDetailsModalLabel">Class Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                            // Selecting all set classes by the logged in Lecturer
                            $select_classes = mysqli_query($connect,"SELECT * FROM `class`
                            INNER JOIN `course`
                            ON class.course_id = course.course_id
                            INNER JOIN `lecturer`
                            ON class.lecturer_id = lecturer.lecturer_id
                            WHERE class.lecturer_id = $lecturer_id;
                            ");

                            
                            while ($row = mysqli_fetch_assoc($select_classes)) {
                                $class_id = $row["class_id"];
                                $course_code = $row["course_code"];
                                $course_date = $row["course_date"];

                                $date = date("l M d, Y", strtotime($course_date));
                                $time = date("h:i:sa", strtotime($course_date));
                                

                                echo '
                                <div class="border p-3 mb-3">
                                    <p>
                                        <strong>Course: </strong> 
                                        <span id="courseName">'.$course_code.'</span>
                                    </p>
                                    <p>
                                        <strong>Date: </strong> 
                                        <span id="dateTimeDetails">'.$date.'</span>
                                    </p>
                                    <p>
                                        <strong>Time: </strong> 
                                        <span id="dateTimeDetails">'.$time.'</span>
                                    </p>
                                    <a href="delete-class.php?class_id='.$class_id.'" class="btn btn-danger" id="deleteClassBtn">Delete</a>
                                </div>
                                ';
                            }
                            ?>

                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                                            
                                        </div>
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
    <!-- Custom JS -->
    <script>
    // Handle form submission
    document.getElementById('setClassForm').addEventListener('submit', function(event) {
      event.preventDefault();
      // Get selected course and date/time
      var course = document.getElementById('courseSelect').value;
      var dateTime = document.getElementById('dateTime').value;

      // Store data in localStorage
      localStorage.setItem('course', course);
      localStorage.setItem('dateTime', dateTime);
    });

    // Handle View Details button click
    document.getElementById('viewDetailsBtn').addEventListener('click', function() {
      // Retrieve data from localStorage
      var course = localStorage.getItem('course');
      var dateTime = localStorage.getItem('dateTime');

      // Display details in modal
      document.getElementById('courseName').innerText = course;
      document.getElementById('dateTimeDetails').innerText = new Date(dateTime).toLocaleString();

      // Show modal
      $('#viewDetailsModal').modal('show');
    });

    // Handle delete button click
    document.getElementById('deleteClassBtn').addEventListener('click', function() {
      // Add your delete functionality here
      // For example, make an AJAX request to delete the class from the database
      // After successful deletion, you can close the modal or show a confirmation message
      $('#viewDetailsModal').modal('hide');
      alert('Class deleted successfully!');
    });
  </script>
</body>

</html>
