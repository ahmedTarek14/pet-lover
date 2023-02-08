<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover - Pet Care</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white pr-3" href="">FAQs</a>
                    <span class="text-white">|</span>
                    <a class="text-white px-3" href="">Help</a>
                    <span class="text-white">|</span>
                    <a class="text-white pl-3" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-3" href="https://www.facebook.com/ahmed.aiad.798" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-3" href="https://www.linkedin.com/in/ahmed-tarek-41a74a176/" target="_blank">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-3" href="https://www.instagram.com/ahmed.m_tarek/" target="_blank" >
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>-->
        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.php" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Lover</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                        <h6>Opening Hours</h6>
                        <p class="m-0">8.00AM - 9.00PM</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                        <h6>Email Us</h6>
                        <p class="m-0">ahmedtarek.am@gmail.com</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
                        <h6>Call Us</h6>
                        <p class="m-0">+01142645585</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Safety</span>First</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link <?php if(get_page_name()=="index.php") { ?> active <?php } ?> ">Home</a>
                    <a href="about.php" class="nav-item nav-link <?php if(get_page_name()=="about.php") { ?> active <?php } ?>" >About</a>
                    <a href="service.php" class="nav-item nav-link <?php if(get_page_name()=="service.php") { ?> active <?php } ?>" >Service</a>
                    <!--<a href="price.php" class="nav-item nav-link <?php if(get_page_name()=="price.php") { ?> active <?php } ?>">Price</a>-->
                    <?php if(isset($_SESSION['user_login'])){ ?><a href="requests.php" class="nav-item nav-link <?php if(get_page_name()=="requests.php") { ?> active <?php } ?>">Requests</a><?php } ?>
                    <a href="booking.php" class="nav-item nav-link <?php if(get_page_name()=="booking.php") { ?> active <?php } ?>">Booking</a>
                    <!--<div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
            <div class="dropdown-menu rounded-0 m-0">
                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                <a href="single.html" class="dropdown-item">Blog Detail</a>
            </div>
        </div>-->
                    <a href="contact.php" class="nav-item nav-link <?php if(get_page_name()=="contact.php") { ?> active <?php } ?>">Contact</a>
                    <?php if(isset($_SESSION['user_login'])){ ?><a href="feedback.php" class="nav-item nav-link <?php if(get_page_name()=="feedback.php") { ?> active <?php } ?>">Feedback</a><?php } ?>
                </div>
                <?php
                if(isset($_SESSION['user_login']))
                {
                ?>
                    <!--<a href="logout.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Log Out</a>-->
                    <!-- Split button -->
                    <div class="btn-group">
                      <a href="logout.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Log Out</a>
                      <button type="button" class="btn btn-lg btn-primary px-3 d-none d-lg-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                      <ul class="dropdown-menu rounded-0 m-0">
                        <li><a href="change_username.php" class="dropdown-item">Change Username</a></li>
                        <li><a href="change_pass.php" class="dropdown-item">Change Password</a></li>
                      </ul>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <a href="login.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Log In</a>
                    <?php
                }
                ?>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->