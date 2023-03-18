<?php
require __DIR__ . '/vendor/autoload.php';

use App\db;

$conn = db::connect();
$page = "HOME";


?>
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>OCEAN VIEW International A Luxury Hotel</h1>
                    <p>Here are the best hotel booking sites, including recommendations for international
                        travel and for finding low-priced hotel rooms.</p>
                    <a href="#" class="primary-btn">Discover Now</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                <div class="booking-form">
                    <h3>Booking Your Hotel</h3>
                    <form action="checkrooms.php" method="GET">
                        <div class="check-date">
                            <label for="date-in">Check In:</label>
                            <input type="date" min="<?= date("Y-m-d") ?>" name="checkin" class="" id="date-in" required>
                            <!-- <i class="icon_calendar"></i> -->
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input type="date" name="checkout" class="" id="date-out" required>
                            <!-- <i class="icon_calendar"></i> -->
                        </div>
                        <div class="select-option">
                            <label for="adult">Adults:</label>
                            <select id="adult" name="adult">
                                <option value="1">1 Adults</option>
                                <option value="2">2 Adults</option>
                                <option value="3">3 Adults</option>
                            </select>
                        </div>
                        <div class="select-option">
                            <label for="children">Children:</label>
                            <select id="children" name="children">
                                <option value="0">Choose</option>
                                <option value="1">1 Children</option>
                                <option value="2">2 Children</option>
                            </select>
                        </div>
                        <!-- <div class="select-option">
                            <label for="room">Room:</label>
                            <select id="room" name="room">
                                <option value="">1 Room</option>
                                <option value="">2 Room</option>
                            </select>
                        </div> -->
                        <button type="submit" name="check">Check Availability</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/hero/hero-1.jpg"></div>

        <div class="hs-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/hero/hero-2.jpg"></div>
        <div class="hs-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/hero/hero-3.jpg"></div>
    </div>
</section>
<!-- Hero Section End -->

<!-- About Us Section Begin -->
<section class="aboutus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text">
                    <div class="section-title">
                        <span>About Us</span>
                        <h2>Intercontinental LA <br />Westlake Hotel</h2>
                    </div>
                    <p class="f-para">OCEAN VIEW International is a leading online accommodation site. We’re passionate about
                        travel. Every day, we inspire and reach millions of travelers across 90 local websites in 41
                        languages.</p>
                    <p class="s-para">So when it comes to booking the perfect hotel, vacation rental, resort,
                        apartment, guest house, or tree house, we’ve got you covered.</p>
                    <a href="#" class="primary-btn about-btn">Read More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-pic">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="<?= settings()['homepage'] ?>assets/images/about/about-1.jpg" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img src="<?= settings()['homepage'] ?>assets/images/about/about-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Section End -->

<!-- Services Section End -->
<section class="services-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>What We Do</span>
                    <h2>Discover Our Services</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-036-parking"></i>
                    <h4>Travel Plan</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-033-dinner"></i>
                    <h4>Catering Service</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-026-bed"></i>
                    <h4>Babysitting</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-024-towel"></i>
                    <h4>Laundry</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-044-clock-1"></i>
                    <h4>Hire Driver</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-012-cocktail"></i>
                    <h4>Bar & Drink</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Home Room Section Begin -->
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">

            <div class="row">
                <!-- room php script start -->
                <?php
                $query = "SELECT  rooms.capacity, rooms.id as room_id, rooms.images, rooms.name as room_name, amenities.name as amenity_name, roomtypes.name as roomtype_name, roomtypes.rate FROM rooms INNER JOIN amenities ON rooms.amenities_id = amenities.id INNER JOIN roomtypes ON rooms.roomtype_id = roomtypes.id where 1";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                ?>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="hp-room-item set-bg img-fluid" data-setbg="<?= settings()['homepage'] ?>admin/assets/roomimage/<?= $row['images'] ?>">

                                <div class="hr-text">

                                    <h3><?= $row['roomtype_name'] ?></h3>
                                    <h3></h3>

                                    <h2><?= $row['rate'] ?>$<span>/Pernight</span></h2>
                                    <table>
                                        <tbody>

                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td>Max person <?= $row['capacity'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Room:</td>
                                                <td><?= $row['room_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Services:</td>
                                                <td><?= $row['amenity_name'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="room-details.php?id=<?= $row['room_id'] ?>" class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>
                <!-- room php script end -->

            </div>
        </div>
    </div>
</section>
<!-- Home Room Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Testimonials</span>
                    <h2>What Customers Say?</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="testimonial-slider owl-carousel">
                    <div class="ts-item">
                        <p>After a construction project took longer than expected, my husband, my daughter and I
                            needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                            city, neighborhood and the types of housing options available and absolutely love our
                            vacation at OCEAN VIEW International Hotel.</p>
                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5> - Alexander Vasquez</h5>
                        </div>
                        <img src="<?= settings()['homepage'] ?>assets/images/testimonial-logo.png" alt="">
                    </div>
                    <div class="ts-item">
                        <p>After a construction project took longer than expected, my husband, my daughter and I
                            needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                            city, neighborhood and the types of housing options available and absolutely love our
                            vacation at OCEAN VIEW International Hotel.</p>
                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5> - Alexander Vasquez</h5>
                        </div>
                        <img src="<?= settings()['homepage'] ?>assets/images/testimonial-logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->

<!-- Blog Section Begin -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Hotel News</span>
                    <h2>Our Blog & Event</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-1.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Travel Trip</span>
                        <h4><a href="blog.php">Tremblant In Canada</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-2.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Camping</span>
                        <h4><a href="blog.php">Choosing A Static Caravan</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-3.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Event</span>
                        <h4><a href="blog.php">Copper Canyon</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="blog-item small-size set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-4.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Event</span>
                        <h4><a href="blog.php">Trip To Iqaluit In Nunavut A Canadian Arctic City</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 08th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-item small-size set-bg" data-setbg="<?= settings()['homepage'] ?>assets/images/blog/blog-5.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Travel</span>
                        <h4><a href="blog.php">Traveling To Barcelona</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 12th April, 2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->