<?php require __DIR__ . '/vendor/autoload.php';
$page = "Blog";
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
                        <h2>Blog</h2>
                        <div class="bt-option">
                            <a href="index.php">Home</a>
                            <span>Blog Grid</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-1.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="blog-details.php">Tremblant In Canada</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-2.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="blog-details.php">Choosing A Static Caravan</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-3.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="blog-details.php">Copper Canyon</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-4.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Trivago</span>
                            <h4><a href="blog-details.php">A Time Travel Postcard</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 22th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-5.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="blog-details.php">A Time Travel Postcard</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 25th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-6.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="blog-details.php">Virginia Travel For Kids</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 28th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-7.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="blog-details.php">Bryce Canyon A Stunning</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 29th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-8.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event & Travel</span>
                            <h4><a href="./blog-details.php">Motorhome Or Trailer</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 30th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-9.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="./blog-details.php">Lost In Lagos Portugal</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 30th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="load-more">
                        <a href="#" class="primary-btn">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <?php require __DIR__ . "/components/footer.php"; ?>