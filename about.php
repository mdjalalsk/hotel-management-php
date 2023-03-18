<?php require __DIR__ . '/vendor/autoload.php';

$page = "About";
?>
<?php require __DIR__ . "/components/header.php"; ?>
</head>

<body>

    <?php require __DIR__ . "/components/menubar.php"; ?>
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>About Us</h2>
                        <div class="bt-option">
                            <a href="index.php">Home</a>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- About Us Page Section Begin -->
    <section class="aboutus-page-section spad">
        <div class="container">
            <div class="about-page-text">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ap-title">
                            <h2>Welcome To OCEAN VIEW.</h2>
                            <p>Built in 1910 during the Belle Epoque period, this hotel is located in the center of
                                Paris, with easy access to the city’s tourist attractions. It offers tastefully
                                decorated rooms.</p>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <ul class="ap-services">
                            <li><i class="icon_check"></i> 20% Off On Accommodation.</li>
                            <li><i class="icon_check"></i> Complimentary Daily Breakfast</li>
                            <li><i class="icon_check"></i> 3 Pcs Laundry Per Day</li>
                            <li><i class="icon_check"></i> Free Wifi.</li>
                            <li><i class="icon_check"></i> Discount 20% On F&B</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="about-page-services">
                <div class="row">
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/about/about-p1.jpg">
                            <div class="api-text">
                                <h3>Restaurants Services</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/about/about-p2.jpg">
                            <div class="api-text">
                                <h3>Travel & Camping</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/about/about-p3.jpg">
                            <div class="api-text">
                                <h3>Event & Party</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Page Section End -->

    <!-- Video Section Begin -->
    <section class="video-section set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/video-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-text">
                        <h2>Discover Our Hotel & Services.</h2>
                        <p>It S Hurricane Season But We Are Visiting Hilton Head Island</p>
                        <a href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="play-btn video-popup"><img src="<?= settings()['homepage'] ?>assets/images/play.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Section End -->

    <!-- Gallery Section Begin -->
    <section class="gallery-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Gallery</span>
                        <h2>Discover Our Work</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="gallery-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/gallery/gallery-1.jpg"">
                        <div class=" gi-text">
                        <h3>Room Luxury</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="gallery-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/gallery/gallery-3.jpg">
                            <div class="gi-text">
                                <h3>Room Luxury</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="gallery-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/gallery/gallery-4.jpg">
                            <div class="gi-text">
                                <h3>Room Luxury</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="gallery-item large-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/gallery/gallery-2.jpg">
                    <div class="gi-text">
                        <h3>Room Luxury</h3>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Gallery Section End -->

    <!-- Footer Section Begin -->
    <?php require __DIR__ . "/components/footer.php"; ?>