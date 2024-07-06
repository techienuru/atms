<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Attendance managment System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary">ATMS</h2>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="#home-section" class="nav-item nav-link active">Home</a>
                <a href="#about-section" class="nav-item nav-link">About</a>
                <a href="./sign-up.php" class="nav-item nav-link">Signup</a>
                <a href="./sign-in.php" class="nav-item nav-link">Signin</a>
                <a href="#features-section" class="nav-item nav-link">App Features</a>
                <a href="#contact-section" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5" id="home-section">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/hero-1.jpg"
                        alt="">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">An improved and better Attendance system</h1>
                    <p class="animated slideInDown">Never miss a class again! Our user-friendly attendance application helps you stay organized and on track with your studies.</p>
                    <a href="sign-in.php" class="btn btn-primary py-3 px-4 animated slideInDown">Explore more</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5" id="about-section">
        <div class="container">
            <div class="row g-5 align-items-center">
                
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-6">Who We Are</h1>
                        <p class="text-primary fs-5 mb-4">We are reliable</p>
                        <p>Welcome to ATMS, where we simplify attendance tracking for students. Our app automates record-keeping and sends automatic alerts for upcoming classes, ensuring you stay organized and focused on your education.
                        </p>
                        <a class="btn btn-primary py-3 px-4" href="">Get started</a>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="./img/who are.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-xxl bg-light py-5 my-5" id="features-section">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Discover the Benefits</h1>
                <p class="text-primary fs-5 mb-5">Automate record-keeping, save time.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-7.png" alt="">
                        <h5 class="mb-3">Receive Class notification</h5>
                        <p>Get reminders for upcoming classes so you're always prepared</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-3.png" alt="">
                        <h5 class="mb-3">Mark Attendance</h5>
                        <p>Track location for precise attendance</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-9.png" alt="">
                        <h5 class="mb-3">View Attendance History</h5>
                        <p>Monitor attendance and track progress</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-5.png" alt="">
                        <h5 class="mb-3">View Attendance Percentage</h5>
                        <p>See your attendance percentage calculated automatically by the app.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-2.png" alt="">
                        <h5 class="mb-3">Location-Based Authentication</h5>
                        <p>Attendance marking requires being in class for accurate records.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white p-5">
                        <img class="img-fluid mb-4" src="img/icon-8.png" alt="">
                        <h5 class="mb-3">IP Address Verification</h5>
                        <p>IP verification ensures only present students can mark attendance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    
    <!-- Footer Start -->
    <div class="container-fluid bg-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s" id="contact-section">
        <div class="container py-5">
            <div class="row g-5">
                
                <div class="col-md-8">
                    <h5 class="mb-4">Contact form</h5>
                    <p>Have something in mind? Reach out to the developer's team for support .</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-4" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="#home-section">Home</a>
                    <a class="btn btn-link" href="#about-section">About Us</a>
                    <a class="btn btn-link" href="./sign-in.php">Signin</a>
                    <a class="btn btn-link" href="./sign-up.php">Signup</a>
                    <a class="btn btn-link" href="#features-section">Our Features</a>
                    <a class="btn btn-link" href="#contact-section">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">ATMS</a>, All Right Reserved.
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>