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
    .class-details {
      margin-bottom: 20px;
    }
    .modal-content {
      max-width: 600px;
      margin: 30px auto;
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
                                <li class="active">
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
    <!-- Class Details -->
    <div class="class-details">
      <h5>Class Details:</h5>
      <p><strong>Course:</strong> Course 1</p>
      <p><strong>Date and Time:</strong> March 19, 2024 14:30</p>
    </div>

    <!-- View List Button -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#attendanceListModal">View List</button>

    <!-- Attendance List Modal -->
    <div class="modal fade" id="attendanceListModal" tabindex="-1" role="dialog" aria-labelledby="attendanceListModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="attendanceListModalLabel">Attendance List</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Attendance Records Table -->
            <table class="table table-bordered attendance-table">
              <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Matric No</th>
                  <th>Attendance Percentage</th>
                </tr>
              </thead>
              <tbody>
                <!-- Sample attendance records -->
                <tr>
                  <td>John Doe</td>
                  <td>ABC123456</td>
                  <td>85%</td>
                </tr>
                <tr>
                  <td>Jane Smith</td>
                  <td>DEF789012</td>
                  <td>72%</td>
                </tr>
                <!-- Add more rows for additional students -->
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <!-- Print Button -->
            <button class="btn btn-primary" onclick="printAttendanceList()">Print</button>
            <!-- Download PDF Button -->
            <button class="btn btn-success" onclick="downloadPDF();">Download PDF</button>
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
        // Function to download PDF using jsPDF
        function downloadPDF() {
            const doc = new jsPDF();
            doc.text("Attendance List", 10, 10);

            // Select the attendance table and get its HTML content
            const table = document.querySelector('.attendance-table');
            const tableHtml = table.outerHTML;

            // Add the table HTML to the PDF
            doc.fromHTML(tableHtml, 10, 20);

            // Save the PDF with a filename
            doc.save('attendance_list.pdf');
        }

        // Function to print the attendance list
        function printAttendanceList() {
            // Create a new window with the attendance list content
            const printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Attendance List</title></head><body>');
            printWindow.document.write('<h2>Attendance List</h2>');
            printWindow.document.write('<table border="1">');
            printWindow.document.write('<tr><th>Student Name</th><th>Matric No</th><th>Attendance Percentage</th></tr>');
            // Iterate through each row in the attendance table and copy it to the new window
            const rows = document.querySelectorAll('.attendance-table tbody tr');
            rows.forEach(row => {
                const columns = row.querySelectorAll('td');
                printWindow.document.write('<tr>');
                columns.forEach(column => {
                    printWindow.document.write(`<td>${column.textContent}</td>`);
                });
                printWindow.document.write('</tr>');
            });
            printWindow.document.write('</table>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            // Print the window
            printWindow.print();
        }
    </script>
</body>

</html>
