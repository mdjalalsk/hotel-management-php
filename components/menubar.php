 <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 ?>
 <!-- Page Preloder -->
 <div id="preloder">
     <div class="loader"></div>
 </div>

 <!-- Offcanvas Menu Section Begin -->
 <div class="offcanvas-menu-overlay"></div>
 <div class="canvas-open">
     <i class="icon_menu"></i>
 </div>
 <div class="offcanvas-menu-wrapper">
     <div class="canvas-close">
         <i class="icon_close"></i>
     </div>
     <div class="search-icon  search-switch">
         <i class="icon_search"></i>
     </div>
     <div class="header-configure-area">
         <div class="language-option">
         <i class="fa fa-user"></i>
             <span><?= $_SESSION['username']?? "";?> </span>
             
         </div>
         <a href="#" class="bk-btn">Booking Now</a>
     </div>
     <nav class="mainmenu mobile-menu">
         <ul>
             <li class="active"><a href="./index.html">Home</a></li>
             <li><a href="./rooms.html">Rooms</a></li>
             <li><a href="./about-us.html">About Us</a></li>
             <li><a href="./pages.html">Pages</a>
                 <ul class="dropdown">
                     <li><a href="./room-details.html">Room Details</a></li>
                     <li><a href="#">Deluxe Room</a></li>
                     <li><a href="#">Family Room</a></li>
                     <li><a href="#">Premium Room</a></li>
                 </ul>
             </li>
             <li><a href="./blog.html">News</a></li>
             <li><a href="./contact.html">Contact</a></li>
         </ul>
     </nav>
     <div id="mobile-menu-wrap"></div>
     <div class="top-social">
         <a href="#"><i class="fa fa-facebook"></i></a>
         <a href="#"><i class="fa fa-twitter"></i></a>
         <a href="#"><i class="fa fa-tripadvisor"></i></a>
         <a href="#"><i class="fa fa-instagram"></i></a>
     </div>
     <ul class="top-widget">
         <li><i class="fa fa-phone"></i> 01838357303</li>
         <li><i class="fa fa-envelope"></i> admin@gmail.com</li>
     </ul>
 </div>
 <!-- Offcanvas Menu Section End -->

 <!-- Header Section Begin -->
 <header class="header-section">
     <div class="top-nav">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6">
                     <ul class="tn-left">
                         <li><i class="fa fa-phone"></i> 01838357303</li>
                         <li><i class="fa fa-envelope"></i> admin@gmail.com</li>
                     </ul>
                 </div>
                 <div class="col-lg-6">
                     <div class="tn-right">
                         <div class="top-social">
                             <a href="#"><i class="fa fa-facebook"></i></a>
                             <a href="#"><i class="fa fa-twitter"></i></a>
                             <a href="#"><i class="fa fa-tripadvisor"></i></a>
                             <a href="#"><i class="fa fa-instagram"></i></a>
                         </div>
                         <a href="guests.php" class="bk-btn">Booking Now</a>
                         <div class="language-option">
                         <i class="fa fa-user"></i>
                             <span><?= $_SESSION['username']?? "";?> </span>
                             
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid">
             <a href="index.php" style="font-size: 35px; font-weight: bold; color: #000;" class="h-font fs-3">OCEAN VIEW</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link" aria-current="page" href="rooms.php">Rooms</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" aria-current="page" href="about.php">About</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" aria-current="page" href="contact.php">Contact</a>

                     </li>
                     <li class="nav-item">
                         <a class="nav-link" aria-current="page" href="blog.php">Blog</a>

                     </li>
                     <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                        ?>
                         <li class="nav-item">
                             <a class="nav-link" href="logout.php">Logout</a>
                         </li>
                     <?php
                        } else {
                        ?>
                         <li class="nav-item">
                             <a class="nav-link" href="registration.php">Registration</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="login.php">Login</a>
                         </li>
                     <?php

                        }
                        ?>



                 </ul>
                 <form class="d-flex">
                     <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                     <button class="btn btn-outline-success" type="submit">Search</button>
                 </form>
             </div>
         </div>
     </nav>


 </header>