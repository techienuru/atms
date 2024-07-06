<?php
include "./includes/connection.php";

// Null Variables
$email_err = null;
$password_err = null;
$secret_id_err = null;

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $secret_id = $_POST['secret_id'];

    // validate user inputs
    $fullname = htmlspecialchars($fullname);
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($password);
    $cpassword = htmlspecialchars($cpassword);
    $secret_id = htmlspecialchars($secret_id);

    // FETCHING registered 'email' from DB
    $fetch_email = mysqli_query($connect,"SELECT * FROM `lecturer` WHERE email = '$email'");

    //FETCHING 'secret ID' FROM DATABASE
    $select_secret_id = mysqli_query($connect,"SELECT * FROM `information`");
    $fetch_secret_id = mysqli_fetch_assoc($select_secret_id);
    $db_secret_id = $fetch_secret_id["secret_id"];


    // check for matching values
    if (!filter_var($email,FILTER_VALIDATE_EMAIL) || mysqli_num_rows($fetch_email) > 0 || $password != $cpassword || !password_verify($secret_id,$db_secret_id)){
        // For Email
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_err = "Incorrect Email format";
        }

        // For Email Match
        if (mysqli_num_rows($fetch_email) > 0) {
            $email_err = "Email already registered";
        }

        // For Password match
        if ($password != $cpassword) {
            $password_err = "Password Mismatch";
        }

        // For secret_id
        if (!password_verify($secret_id,$db_secret_id)) {
            $secret_id_err = "Wrong secret_id";
        }
    } else {

        // Hashing Password
        $password = password_hash($password,PASSWORD_DEFAULT);

        //INSERTING INTO DB
        $sql = mysqli_query($connect,"INSERT INTO `lecturer` (fullname,email,faculty,department,password) VALUES('$fullname','$email','$faculty','$department','$password')");

        if($sql){
            echo '
            <div id="overlay"></div>
            <div class="success-message-container" id="success-message-container">
                <div class="success-message">Sign up successful. Redirecting to sign-in page...</div>
            </div>
            ';
    
            echo '
            <script>
                // Function to show success message and overlay
                function showSuccessMessage() {
                    var overlay = document.getElementById("overlay");
                    var successMessageContainer = document.getElementById("success-message-container");
                    document.body.classList.add("success-message-visible"); // Disable scrolling
    
                    overlay.style.display = "block";
                    successMessageContainer.style.display = "block";
                }
    
                // Function to hide success message and overlay
                function hideSuccessMessage() {
                    var overlay = document.getElementById("overlay");
                    var successMessageContainer = document.getElementById("success-message-container");
                    document.body.classList.remove("success-message-visible"); // Enable scrolling
    
                    overlay.style.display = "none";
                    successMessageContainer.style.display = "none";
                }
    
                // Show success message and redirect after delay
                showSuccessMessage();
                setTimeout(function() {
                    window.location.href = "sign-in.php";
                }, 3000); // Redirect after 3 seconds
    
            </script>
            '; // Redirect after 3 seconds
        }else {
            die("ERROR WHILE INSERTING:" . mysqli_error($connect));
        }
    }
    



}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Material Able bootstrap admin template by Codedthemes</title>
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
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <style>
        .password-toggle-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            width: 24px;
            height: 24px;
            background-repeat: repeat;
            background-position: center;
            cursor: pointer;
        }

        .password-hide {
            content: "HIDE";
        }

        .password-show {
            content: "SHOW";
        }
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
            z-index: 999;
            display: none; /* Initially hidden */
        }

        .success-message-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000; /* Higher z-index to appear over overlay */
            display: none; /* Initially hidden */
        }

        .success-message {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }

        body.success-message-visible {
            overflow: hidden; /* Prevent scrolling when overlay is visible */
        }
        </style>
  </head>

  <body themebg-pattern="theme1">
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
  <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="text-center">
                            <img src="assets/images/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Sign up</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" pattern="^[a-zA-Z\s]+$" name="fullname" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Full Name</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="email" name="email" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Email Address</label>
                                    <p class="text-danger"><?php echo "$email_err"?></p>
                                </div>

                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <select name="faculty" id="" class="form-control" required>
                                                <option value="">--Select Faculty--</option>
                                                <option value="FNAS">Natural and Applied Science</option>
                                                <option value="Law">Law</option>
                                                <option value="Social Science">Social Science</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <select name="department" id="" class="form-control" required>
                                                <option value="">--Select Department--</option>
                                                <option value="Computer Science">Computer Science</option>
                                                <option value="Geo Mining">Geo Mining</option>
                                                <option value="Biochemistry">Biochemistry</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Password</label>
                                            <p class="text-danger"><?php echo "$password_err"?></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="cpassword" class="form-control" required>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Confirm Password</label>
                                            <p class="text-danger"><?php echo "$password_err"?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-primary">
                                <input type="password" name="secret_id" id="secret_id" class="form-control" required >
                                    <span class="form-bar"></span>
                                    <label class="float-label">Secret ID</label>
                                    <p class="text-danger"><?php echo $secret_id_err?></p>
                                    <div class="password-toggle-icon" id="secret-id-toggle-icon" onclick="togglePasswordVisibility('secret_id', 'secret_id-error', 'secret-id-toggle-icon')">
                                        <p class="text-nowrap js-show-text">SHOW</p>
                                    </div>
                                </div>

                                <div class="row m-b-20">
                                    <div class="col-md-4">
                                        <p class="text-left">Have an account? 
                                            <a href="./sign-in.php" class="text-danger">Sign in</a>
                                        </p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-right">Not a Lecturer? 
                                            <a href="./sign-up.php" class="text-danger">Sign up as a student</a>
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
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
<script type="text/javascript" src="assets/js/common-pages.js"></script>
<script>
    function togglePasswordVisibility(inputId, errorId, iconId) {
    var passwordInput = document.getElementById(inputId);
    var passwordError = document.getElementById(errorId);
    var icon = document.getElementById(iconId);

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove('password-show');
        icon.classList.add('password-hide');
        document.querySelector(".js-show-text").innerHTML = "HIDE";
    } else {
        passwordInput.type = "password";
        icon.classList.remove('password-hide');
        icon.classList.add('password-show');
        document.querySelector(".js-show-text").innerHTML = "SHOW";
    }

    // Clear password error when toggling visibility
    passwordError.textContent = "";
}

</script>
</body>

</html>
