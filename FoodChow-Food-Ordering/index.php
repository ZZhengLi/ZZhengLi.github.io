<!DOCTYPE html>
<html lang="en">
<?php
include_once("config.php");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["delete"])) {
    $userid = $_POST['userid'];
    $sql = "DELETE FROM userinfo
            WHERE userID = '$userid';";
    $conn->query($sql);
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Food Ordering HTML Template</title>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">


    <link rel="stylesheet" href="assets/css/icons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/red-color.css">
    <link rel="stylesheet" href="assets/css/yellow-color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body itemscope>
<div class="log-popup text-center">
        <div class="newsletter-popup-inner" style="background-image: url(assets/images/newsletter-bg.jpg);">
            <a class="close-btn brd-rd50" href="#" title="Close Button" itemprop="url"><i class="fa fa-close"></i></a>
            <h3 itemprop="headline"><i class="fa fa-info red-clr"></i> ENTER YOUR USERID</h3>
            <!-- <p itemprop="description">Join our Subscribers list to get the latest news, updates and special offers delivered directly in your inbox.</p> -->
            <form method="post" action="dashboard.php" class="newsletter-frm brd-rd30">
                <input class="brd-rd30" name="userid" placeholder="ENTER YOUR ID">
                <button name="userid_submit" class="brd-rd30 red-bg" type="submit">SUBMIT</button>
                <!-- <input name="userid_submit" class="brd-rd30 red-bg" type="submit" value="submit"/> -->
            </form>
            <!-- <span class="red-clr"><i class="fa fa-check"></i> Thanks, your address has been added.</span> -->
        </div>
    </div>
    <main>
        <div class="preloader">
            <div id="cooking">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div id="area">
                    <div id="sides">
                        <div id="pan"></div>
                        <div id="handle"></div>
                    </div>
                    <div id="pancake">
                        <div id="pastry"></div>
                    </div>
                </div>
            </div>
        </div>

        <header class="stick">
            <div class="logo-menu-sec">
                <div class="container">
                    <div class="logo">
                        <h1 itemprop="headline"><a href="index.php" title="Home" itemprop="url"><img src="assets/images/logo2.png" alt="logo.png" itemprop="image"></a></h1>
                    </div>
                    <nav>
                        <div class="menu-sec">
                            <ul>
                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url"><span class="red-clr">FOOD ORDERING</span>HOMEPAGES</a>
                                    <ul class="sub-dropdown">
                                        <li><a href="index.php" title="HOMEPAGE 1" itemprop="url">HOMEPAGE 1</a></li>
                                        <li><a href="index.php" title="HOMEPAGE 2" itemprop="url">HOMEPAGE 2</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#" title="RESTAURANTS" itemprop="url"><span class="red-clr">REAL FOOD</span>RESTAURANTS</a>
                                    <ul class="sub-dropdown">
                                        <li><a href="restaurant-found.html" title="RESTAURANT 1" itemprop="url">RESTAURANT 1</a></li>
                                        <li><a href="restaurant-found2.html" title="RESTAURANT 2" itemprop="url">RESTAURANT 2</a></li>
                                        <li><a href="restaurant-detail.html" title="RESTAURANT DETAILS" itemprop="url">RESTAURANT DETAILS</a></li>
                                        <li><a href="food-recipes.html" title="RESTAURANT DETAILS" itemprop="url">FOOD RECIPES</a></li>
                                        <li><a href="our-articles.html" title="RESTAURANT DETAILS" itemprop="url">OUR ARTICLES</a></li>
                                        <li><a href="our-menu.html" title="RESTAURANT DETAILS" itemprop="url">OUR MENU</a></li>
                                        <li><a href="our-services.html" title="RESTAURANT DETAILS" itemprop="url">OUR SERVICES</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#" title="PAGES" itemprop="url"><span class="red-clr">REAL FOOD</span>PAGES</a>
                                    <ul class="sub-dropdown">
                                        <li class="menu-item-has-children"><a href="#" title="BLOG" itemprop="url">BLOG</a>
                                            <ul class="sub-dropdown">
                                                <li class="menu-item-has-children"><a href="#" title="BLOG LAYOUTS" itemprop="url">BLOG LAYOUTS</a>
                                                    <ul class="sub-dropdown">
                                                        <li><a href="blog-right-sidebar.html" title="BLOG WITH RIGHT SIDEBAR" itemprop="url">BLOG (W.R.S)</a></li>
                                                        <li><a href="blog-left-sidebar.html" title="BLOG WITH LEFT SIDEBAR" itemprop="url">BLOG (W.L.S)</a></li>
                                                        <li><a href="blog.html" title="BLOG WITH NO SIDEBAR" itemprop="url">BLOG</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children"><a href="#" title="BLOG DETAIL" itemprop="url">BLOG DETAIL</a>
                                                    <ul class="sub-dropdown">
                                                        <li><a href="blog-detail-right-sidebar.html" title="BLOG DETAIL WITH RIGHT SIDEBAR" itemprop="url">BLOG DETAIL (W.R.S)</a></li>
                                                        <li><a href="blog-detail-left-sidebar.html" title="BLOG DETAIL WITH LEFT SIDEBAR" itemprop="url">BLOG DETAIL (W.L.S)</a></li>
                                                        <li><a href="blog-detail.html" title="BLOG DETAIL WITH NO SIDEBAR" itemprop="url">BLOG DETAIL</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children"><a href="#" title="BLOG FORMATES" itemprop="url">BLOG FORMATES</a>
                                                    <ul class="sub-dropdown">
                                                        <li><a href="blog-detail-video.html" title="BLOG DETAIL WITH VIDEO" itemprop="url">BLOG DETAIL (VIDEO)</a></li>
                                                        <li><a href="blog-detail-audio.html" title="BLOG DETAIL WITH AUDIO" itemprop="url">BLOG DETAIL (AUDIO)</a></li>
                                                        <li><a href="blog-detail-carousel.html" title="BLOG DETAIL WITH CAROUSEL" itemprop="url">BLOG DETAIL (CAROUSEL)</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#" title="SPECIAL PAGES" itemprop="url">SPECIAL PAGES</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="404.html" title="404 ERROR" itemprop="url">404 ERROR</a></li>
                                                <li><a href="search-found.html" title="SEARCH FOUND" itemprop="url">SEARCH FOUND</a></li>
                                                <li><a href="search-not-found.html" title="SEARCH NOT FOUND" itemprop="url">SEARCH NOT FOUND</a></li>
                                                <li><a href="coming-soon.html" title="COMING SOON" itemprop="url">COMING SOON</a></li>
                                                <li><a href="login-register.html" title="LOGIN & REGISTER" itemprop="url">LOGIN & REGISTER</a></li>
                                                <li><a href="price-table.html" title="PRICE TABLE" itemprop="url">PRICE TABLE</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#" title="GALLERY" itemprop="url">GALLERY</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="gallery.html" title="FOOD GALLERY" itemprop="url">FOOD GALLERY</a></li>
                                                <li><a href="gallery-detail.html" title="GALLERY DETAIL" itemprop="url">GALLERY DETAIL</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="register-reservation.php" title="REGISTER RESERVATION" itemprop="url">REGISTER RESERVATION</a></li>
                                        <li><a href="how-it-works.html" title="HOW IT WORKS" itemprop="url">HOW IT WORKS</a></li>
                                        <li><a href="dashboard.html" title="USER PROFILE" itemprop="url">USER PROFILE</a></li>
                                        <li><a href="about-us.html" title="ABOUT US" itemprop="url">ABOUT US</a></li>
                                        <li><a href="food-detail.html" title="FOOD DETAIL" itemprop="url">FOOD DETAIL</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html" title="CONTACT US" itemprop="url"><span class="red-clr">REAL FOOD</span>CONTACT US</a></li>
                            </ul>
                            <a class="red-bg brd-rd4 log-popup-btn" href="dashboard.php" title="Register" itemprop="url">DASHBOARD</a>
                        </div>
                    </nav><!-- Navigation -->
                </div>
            </div><!-- Logo Menu Section -->
        </header><!-- Header -->
        
        <div class="responsive-header">
            <div class="responsive-topbar">
                <div class="select-wrp">
                    <select data-placeholder="Feel Like Eating">
                        <option>FEEL LIKE EATING</option>
                        <option>Burger</option>
                        <option>Pizza</option>
                        <option>Fried Rice</option>
                        <option>Chicken Shots</option>
                    </select>
                </div>
                <div class="select-wrp">
                    <select data-placeholder="Choose Location">
                        <option>CHOOSE LOCATION</option>
                        <option>New york</option>
                        <option>Washington</option>
                        <option>Chicago</option>
                        <option>Los Angeles</option>
                    </select>
                </div>
            </div>
            <div class="responsive-logomenu">
                <div class="logo">
                    <h1 itemprop="headline"><a href="index.php" title="Home" itemprop="url"><img src="assets/images/logo.png" alt="logo.png" itemprop="image"></a></h1>
                </div>
                <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
            </div>
            <div class="responsive-menu">
                <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
                <div class="menu-lst">
                    <ul>
                        <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url"><span class="yellow-clr">FOOD ORDERING</span>HOMEPAGES</a>
                            <ul class="sub-dropdown">
                                <li><a href="index.php" title="HOMEPAGE 1" itemprop="url">HOMEPAGE 1</a></li>
                                <li><a href="index2.html" title="HOMEPAGE 2" itemprop="url">HOMEPAGE 2</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#" title="RESTAURANTS" itemprop="url"><span class="yellow-clr">REAL FOOD</span>RESTAURANTS</a>
                            <ul class="sub-dropdown">
                                <li><a href="restaurant-found.html" title="RESTAURANT 1" itemprop="url">RESTAURANT 1</a></li>
                                <li><a href="restaurant-found2.html" title="RESTAURANT 2" itemprop="url">RESTAURANT 2</a></li>
                                <li><a href="restaurant-detail.php" title="RESTAURANT DETAILS" itemprop="url">RESTAURANT DETAILS</a></li>
                                <li><a href="restaurant-detail.php" title="RESTAURANT DETAILS" itemprop="url">RESTAURANT DETAILS</a></li>
                                <li><a href="food-recipes.html" title="RESTAURANT DETAILS" itemprop="url">FOOD RECIPES</a></li>
                                <li><a href="our-articles.html" title="RESTAURANT DETAILS" itemprop="url">OUR ARTICLES</a></li>
                                <li><a href="our-menu.html" title="RESTAURANT DETAILS" itemprop="url">OUR MENU</a></li>
                                <li><a href="our-services.html" title="RESTAURANT DETAILS" itemprop="url">OUR SERVICES</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#" title="PAGES" itemprop="url"><span class="yellow-clr">REAL FOOD</span>PAGES</a>
                            <ul class="sub-dropdown">
                                <li class="menu-item-has-children"><a href="#" title="BLOG" itemprop="url">BLOG</a>
                                    <ul class="sub-dropdown">
                                        <li class="menu-item-has-children"><a href="#" title="BLOG LAYOUTS" itemprop="url">BLOG LAYOUTS</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="blog-right-sidebar.html" title="BLOG WITH RIGHT SIDEBAR" itemprop="url">BLOG (W.R.S)</a></li>
                                                <li><a href="blog-left-sidebar.html" title="BLOG WITH LEFT SIDEBAR" itemprop="url">BLOG (W.L.S)</a></li>
                                                <li><a href="blog.html" title="BLOG WITH NO SIDEBAR" itemprop="url">BLOG</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#" title="BLOG DETAIL" itemprop="url">BLOG DETAIL</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="blog-detail-right-sidebar.html" title="BLOG DETAIL WITH RIGHT SIDEBAR" itemprop="url">BLOG DETAIL (W.R.S)</a></li>
                                                <li><a href="blog-detail-left-sidebar.html" title="BLOG DETAIL WITH LEFT SIDEBAR" itemprop="url">BLOG DETAIL (W.L.S)</a></li>
                                                <li><a href="blog-detail.html" title="BLOG DETAIL WITH NO SIDEBAR" itemprop="url">BLOG DETAIL</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#" title="BLOG FORMATES" itemprop="url">BLOG FORMATES</a>
                                            <ul class="sub-dropdown">
                                                <li><a href="blog-detail-video.html" title="BLOG DETAIL WITH VIDEO" itemprop="url">BLOG DETAIL (VIDEO)</a></li>
                                                <li><a href="blog-detail-audio.html" title="BLOG DETAIL WITH AUDIO" itemprop="url">BLOG DETAIL (AUDIO)</a></li>
                                                <li><a href="blog-detail-carousel.html" title="BLOG DETAIL WITH CAROUSEL" itemprop="url">BLOG DETAIL (CAROUSEL)</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#" title="SPECIAL PAGES" itemprop="url">SPECIAL PAGES</a>
                                    <ul class="sub-dropdown">
                                        <li><a href="404.html" title="404 ERROR" itemprop="url">404 ERROR</a></li>
                                        <li><a href="search-found.html" title="SEARCH FOUND" itemprop="url">SEARCH FOUND</a></li>
                                        <li><a href="search-not-found.html" title="SEARCH NOT FOUND" itemprop="url">SEARCH NOT FOUND</a></li>
                                        <li><a href="coming-soon.html" title="COMING SOON" itemprop="url">COMING SOON</a></li>
                                        <li><a href="login-register.html" title="LOGIN & REGISTER" itemprop="url">LOGIN & REGISTER</a></li>
                                        <li><a href="price-table.html" title="PRICE TABLE" itemprop="url">PRICE TABLE</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#" title="GALLERY" itemprop="url">GALLERY</a>
                                    <ul class="sub-dropdown">
                                        <li><a href="gallery.html" title="FOOD GALLERY" itemprop="url">FOOD GALLERY</a></li>
                                        <li><a href="gallery-detail.html" title="GALLERY DETAIL" itemprop="url">GALLERY DETAIL</a></li>
                                    </ul>
                                </li>
                                <li><a href="register-reservation.php" title="REGISTER RESERVATION" itemprop="url">REGISTER RESERVATION</a></li>
                                <li><a href="how-it-works.html" title="HOW IT WORKS" itemprop="url">HOW IT WORKS</a></li>
                                <li><a href="dashboard.html" title="USER PROFILE" itemprop="url">USER PROFILE</a></li>
                                <li><a href="about-us.html" title="ABOUT US" itemprop="url">ABOUT US</a></li>
                                <li><a href="food-detail.html" title="FOOD DETAIL" itemprop="url">FOOD DETAIL</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html" title="CONTACT US" itemprop="url"><span class="yellow-clr">REAL FOOD</span>CONTACT US</a></li>
                    </ul>
                </div>
                <div class="topbar-register">
                    <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a class="sign-popup-btn" href="#" title="Register" itemprop="url">REGISTER</a>
                </div>
                <div class="social1">
                    <a href="#" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook-square"></i></a>
                    <a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
                </div>
                <div class="register-btn">
                    <a class="yellow-bg brd-rd4" href="register-reservation.php" title="Register" itemprop="url">REGISTER RESTAURANT</a>
                </div>
            </div><!-- Responsive Menu -->
        </div><!-- Responsive Header -->

        <section>
            <div class="block">
                <div style="background-image: url(assets/images/topbg.jpg);" class="fixed-bg"></div>
                <div class="restaurant-searching text-center">
                    <div class="restaurant-searching-inner">
                        <h2 itemprop="headline">Order <span>Food Online From</span> the Best Restaurants</h2>

                        <div class="funfacts">
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="fact-box">
                                    <i class="brd-rd50"><img src="assets/images/resource/fact-icon1.png" alt="fact-icon1" itemprop="image"></i>
                                    <div class="fact-inner">
                                        <strong><span class="counter">137</span></strong>
                                        <h5>Restaurant</h5>
                                    </div>
                                </div><!-- Fact Box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="fact-box">
                                    <i class="brd-rd50"><img src="assets/images/resource/fact-icon2.png" alt="fact-icon2" itemprop="image"></i>
                                    <div class="fact-inner">
                                        <strong><span class="counter">158</span></strong>
                                        <h5>People Served</h5>
                                    </div>
                                </div><!-- Fact Box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="fact-box">
                                    <i class="brd-rd50"><img src="assets/images/resource/fact-icon3.png" alt="fact-icon3" itemprop="image"></i>
                                    <div class="fact-inner">
                                        <strong><span class="counter">659</span>K</strong>
                                        <h5>Happy Service</h5>
                                    </div>
                                </div><!-- Fact Box -->
                            </div>
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="fact-box">
                                    <i class="brd-rd50"><img src="assets/images/resource/fact-icon4.png" alt="fact-icon4" itemprop="image"></i>
                                    <div class="fact-inner">
                                        <strong><span class="counter">235</span></strong>
                                        <h5>Regular users</h5>
                                    </div>
                                </div><!-- Fact Box -->
                            </div>
                        </div><!-- Fun Facts -->
                    </div>
                    <img class="left-scooty-mockup" src="assets/images/resource/restaurant-mockup1.png" alt="restaurant-mockup1.png" itemprop="image">
                    <img class="bottom-clouds-mockup" src="assets/images/resource/clouds.png" alt="clouds.png" itemprop="image">
                </div><!-- Restaurant Searching -->
            </div>
        </section>

        <section>
            <div class="block blackish low-opacity">
                <div class="fixed-bg" style="background-image: url(assets/images/parallax1.jpg);"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="title1-wrapper text-center">
                                <div class="title1-inner">
                                    <span>Website for Restaurant and Cafe</span>
                                    <h2 class="text-white" itemprop="headline">easy order in 3 steps</h2>
                                </div>
                            </div>
                            <div class="remove-ext text-center">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-lg-4">
                                        <div class="step-box wow fadeIn" data-wow-delay="0.2s">
                                            <i><img src="assets/images/resource/setp-img1.png" alt="setp-img1.png" itemprop="image"> <span class="brd-rd50 red-bg">1</span></i>
                                            <div class="setp-box-inner">
                                                <h4 itemprop="headline">Explore Restaurants</h4>
                                                <p itemprop="description">First pick up a restaurant</p>
                                            </div>
                                        </div><!-- Step Box -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-lg-4">
                                        <div class="step-box wow fadeIn" data-wow-delay="0.4s">
                                            <i><img src="assets/images/resource/setp-img2.png" alt="setp-img2.png" itemprop="image"> <span class="brd-rd50 red-bg">2</span></i>
                                            <div class="setp-box-inner">
                                                <h4 itemprop="headline">Choose a Tasty Dish</h4>
                                                <p itemprop="description">Second choose the food you like</p>
                                            </div>
                                        </div><!-- Step Box -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-lg-4">
                                        <div class="step-box wow fadeIn" data-wow-delay="0.6s">
                                            <i><img src="assets/images/resource/setp-img3.png" alt="setp-img3.png" itemprop="image"> <span class="brd-rd50 red-bg">3</span></i>
                                            <div class="setp-box-inner">
                                                <h4 itemprop="headline">Confirm Order</h4>
                                                <p itemprop="description">Confirm your order and wait for food to deliver to your place</p>
                                            </div>
                                        </div><!-- Step Box -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="block grayish low-opacity ">
                <div class="fixed-bg" style="background-image: url(assets/images/pattern.png)"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="filters-wrapper">
                                <div class="title1-wrapper text-center">
                                    <div class="title1-inner">
                                        <span>Your Favourite Food</span>
                                        <h2 itemprop="headline">choose your food</h2>
                                    </div>
                                </div>
                                <ul class="filter-buttons center ext-btm20">
                                    <li class="active"><a class="brd-rd30" data-filter="*" href="#" itemprop="url">All</a></li>
                                    <li><a class="brd-rd30" data-filter=".filter-item1" href="#" itemprop="url">Beverages</a></li>
                                    <li><a class="brd-rd30" data-filter=".filter-item2" href="#" itemprop="url">Burgers</a></li>
                                    <li><a class="brd-rd30" data-filter=".filter-item3" href="#" itemprop="url">Pasta</a></li>
                                </ul><!-- Filter Buttons -->
                                <div class="filters-inner">
                                    <div class="row">
                                        <div class="masonry">
                                            <div class="col-md-6 col-sm-6 col-lg-6 filter-item filter-item1">
                                                <div class="featured-restaurant-box style2 brd-rd12 wow fadeIn" data-wow-delay="0.1s">
                                                    <div class="featured-restaurant-thumb">
                                                        <a href="restaurant-detail.php" title="" itemprop="url"><img src="assets/images/resource/most-popular-img1-1.png" alt="most-popular-img1-1.png" itemprop="image"></a>
                                                    </div>
                                                    <div class="featured-restaurant-info">
                                                        <span class="red-clr">5th Avenue New York 68</span>
                                                        <h4 itemprop="headline"><a href="restaurant-detail.php" title="" itemprop="url">Domino's Pizza</a></h4>
                                                        <span class="food-types">Type of food: <a href="#" title="" itemprop="url">Apple Juice</a>, <a href="#" title="" itemprop="url">BB.Q</a>, <a href="#" title="" itemprop="url">Beef Roast</a></span>
                                                        <ul class="post-meta">
                                                            <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                            <li><i class="flaticon-transport"></i> 30min</li>
                                                            <li><i class="flaticon-money"></i> Accepts cash & online payments</li>
                                                        </ul>
                                                        <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> 4.25</span>
                                                        <span class="post-likes style2 red-clr"><i class="fa fa-heart-o"></i> 12</span>
                                                        <a class="brd-rd5" href="restaurant-detail.php" title="Order Online">Order Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6 filter-item filter-item2">
                                                <div class="featured-restaurant-box style2 brd-rd12 wow fadeIn" data-wow-delay="0.2s">
                                                    <div class="featured-restaurant-thumb">
                                                        <a href="restaurant-detail.php" title="" itemprop="url"><img src="assets/images/resource/most-popular-img1-2.png" alt="most-popular-img1-2.png" itemprop="image"></a>
                                                    </div>
                                                    <div class="featured-restaurant-info">
                                                        <span class="red-clr">5th Avenue New York 68</span>
                                                        <h4 itemprop="headline"><a href="restaurant-detail.php" title="" itemprop="url">Burger King</a></h4>
                                                        <span class="food-types">Type of food: <a href="#" title="" itemprop="url">Apple Juice</a>, <a href="#" title="" itemprop="url">BB.Q</a>, <a href="#" title="" itemprop="url">Beef Roast</a></span>
                                                        <ul class="post-meta">
                                                            <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                            <li><i class="flaticon-transport"></i> 30min</li>
                                                            <li><i class="flaticon-money"></i> Accepts cash & online payments</li>
                                                        </ul>
                                                        <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> 4.25</span>
                                                        <span class="post-likes style2 red-clr"><i class="fa fa-heart-o"></i> 12</span>
                                                        <a class="brd-rd5" href="restaurant-detail.php" title="Order Online">Order Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6 filter-item filter-item3">
                                                <div class="featured-restaurant-box style2 brd-rd12 wow fadeIn" data-wow-delay="0.3s">
                                                    <div class="featured-restaurant-thumb">
                                                        <a href="restaurant-detail.php" title="" itemprop="url"><img src="assets/images/resource/most-popular-img1-3.png" alt="most-popular-img1-3.png" itemprop="image"></a>
                                                    </div>
                                                    <div class="featured-restaurant-info">
                                                        <span class="red-clr">5th Avenue New York 68</span>
                                                        <h4 itemprop="headline"><a href="restaurant-detail.php" title="" itemprop="url">Wendy's Cafe</a></h4>
                                                        <span class="food-types">Type of food: <a href="#" title="" itemprop="url">Apple Juice</a>, <a href="#" title="" itemprop="url">BB.Q</a>, <a href="#" title="" itemprop="url">Beef Roast</a></span>
                                                        <ul class="post-meta">
                                                            <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                            <li><i class="flaticon-transport"></i> 30min</li>
                                                            <li><i class="flaticon-money"></i> Accepts cash & online payments</li>
                                                        </ul>
                                                        <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> 4.25</span>
                                                        <span class="post-likes style2 red-clr"><i class="fa fa-heart-o"></i> 12</span>
                                                        <a class="brd-rd5" href="restaurant-detail.php" title="Order Online">Order Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6 filter-item filter-item1 filter-item2 filter-item3">
                                                <div class="featured-restaurant-box style2 brd-rd12 wow fadeIn" data-wow-delay="0.4s">
                                                    <div class="featured-restaurant-thumb">
                                                        <a href="restaurant-detail.php" title="" itemprop="url"><img src="assets/images/resource/most-popular-img1-4.png" alt="most-popular-img1-4.png" itemprop="image"></a>
                                                    </div>
                                                    <div class="featured-restaurant-info">
                                                        <span class="red-clr">5th Avenue New York 68</span>
                                                        <h4 itemprop="headline"><a href="restaurant-detail.php" title="" itemprop="url">Restaurant</a></h4>
                                                        <span class="food-types">Type of food: <a href="#" title="" itemprop="url">Apple Juice</a>, <a href="#" title="" itemprop="url">BB.Q</a>, <a href="#" title="" itemprop="url">Beef Roast</a></span>
                                                        <ul class="post-meta">
                                                            <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                            <li><i class="flaticon-transport"></i> 30min</li>
                                                            <li><i class="flaticon-money"></i> Accepts cash & online payments</li>
                                                        </ul>
                                                        <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> 4.25</span>
                                                        <span class="post-likes style2 red-clr"><i class="fa fa-heart-o"></i> 12</span>
                                                        <a class="brd-rd5" href="restaurant-detail.php" title="Order Online">Order Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Filters Wrapper -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="block bottom-padd210">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title1-wrapper text-center">
                                <div class="title1-inner">
                                    <span>Website for Restaurant and Cafe</span>
                                    <h2 itemprop="headline">Featured resturents</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-4">
                            <div class="article-dev wow fadeIn" data-wow-delay="0.2s">
                                <figure>
                                    <img src="assets/images/resource/article1.jpg" alt="">
                                </figure>
                                <div class="article-data">
                                    <div class="article-info-meta">
                                        <span>thu</span>
                                        <a href="#" title="">15 dec 2018</a>
                                        <a href="#" title="">By webinane</a>
                                    </div>
                                    <div class="article-meta">
                                        <h3><a href="#" title="">
                                                Special Food Recipes For DpecialOccasions.
                                            </a>
                                        </h3>
                                        <div class="like-meta">
                                            <span><i class="fa fa-heart-o"></i> 12</span>
                                            <span><i class="fa fa-comment-o"></i> 7</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-4">
                            <div class="article-dev wow fadeIn" data-wow-delay="0.4s">
                                <figure>
                                    <img src="assets/images/resource/article2.jpg" alt="">
                                </figure>
                                <div class="article-data">
                                    <div class="article-info-meta">
                                        <span>Mon</span>
                                        <a href="#" title="">25 Sep 2018</a>
                                        <a href="#" title="">By webinane</a>
                                    </div>
                                    <div class="article-meta">
                                        <h3><a href="#" title="">
                                                Candy Canes Wafer Sweet Roll 2
                                            </a>
                                        </h3>
                                        <div class="like-meta">
                                            <span><i class="fa fa-heart-o"></i> 12</span>
                                            <span><i class="fa fa-comment-o"></i> 7</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-4">
                            <div class="article-dev wow fadeIn" data-wow-delay="0.6s">
                                <figure>
                                    <img src="assets/images/resource/article3.jpg" alt="">
                                </figure>
                                <div class="article-data">
                                    <div class="article-info-meta">
                                        <span>Wed</span>
                                        <a href="#" title="">11 july 2018</a>
                                        <a href="#" title="">By webinane</a>
                                    </div>
                                    <div class="article-meta">
                                        <h3><a href="#" title="">
                                                Cheesecake Pastry Marshmallow
                                            </a>
                                        </h3>
                                        <div class="like-meta">
                                            <span><i class="fa fa-heart-o"></i> 12</span>
                                            <span><i class="fa fa-comment-o"></i> 7</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="block no-padding red-bg">
                <img class="bottom-clouds-mockup" src="assets/images/resource/clouds2.png" alt="clouds2.png" itemprop="image">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="app-sec">
                                <div class="row">
                                    <div class="col-md-4 hidden-sm col-md-offset-1 col-sm-4 col-sm-offset-0 col-lg-4 col-lg-offset-1">
                                        <div class="app-mockup text-right overlape-110 wow fadeInUp" data-wow-delay="0.2s"><img src="assets/images/resource/app-mockup.png" alt="app-mockup.png" itemprop="image"></div>
                                    </div>
                                    <div class="col-md-6 col-md-offset-1 col-sm-12 col-sm-offset-0 col-lg-6 col-lg-offset-1">
                                        <div class="app-info">
                                            <h4 itemprop="headline">The Best Food Delivery App</h4>
                                            <p itemprop="description">We have a launch team that focuses on one city at a time. At the end of the day, we're a marketplace. In order to make an effective marketplace, you need critical mass. We need enough restaurants that quality and variety</p>
                                            <div class="app-download-btns">
                                                <a class="" href="#" title="Google Play Store" itemprop="url" target="_blank"><img src="assets/images/resource/app-download-btn1.png" alt="app-download-btn1.png" itemprop="image"></a>
                                                <a class="" href="#" title="Apple App Store" itemprop="url" target="_blank"><img src="assets/images/resource/app-download-btn2.png" alt="app-download-btn2.png" itemprop="image"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- App Section -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- red section -->

        <footer>
            <div class="block top-padd80 bottom-padd80 dark-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="footer-data">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget about_widget wow fadeIn" data-wow-delay="0.1s">
                                            <div class="logo">
                                                <h1 itemprop="headline"><a href="#" title="Home" itemprop="url"><img src="assets/images/logo.png" alt="logo.png" itemprop="image"></a></h1>
                                            </div>
                                            <p itemprop="description">Food Ordering is a Premium HTML Template. Best choice for your online store. Let purchase it to enjoy now</p>
                                            <div class="social2">
                                                <a class="brd-rd50" href="#" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook"></i></a>
                                                <a class="brd-rd50" href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
                                                <a class="brd-rd50" href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                                                <a class="brd-rd50" href="#" title="Pinterest" itemprop="url" target="_blank"><i class="fa fa-pinterest"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget information_links wow fadeIn" data-wow-delay="0.2s">
                                            <h4 class="widget-title" itemprop="headline">INFORMATION</h4>
                                            <ul>
                                                <li><a href="#" title="" itemprop="url">Careers</a></li>
                                                <li><a href="#" title="" itemprop="url">Investor Relations</a></li>
                                                <li><a href="#" title="" itemprop="url">Press Releases</a></li>
                                                <li><a href="#" title="" itemprop="url">Shop with Points</a></li>
                                                <li><a href="#" title="" itemprop="url">More Branches</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget customer_care wow fadeIn" data-wow-delay="0.3s">
                                            <h4 class="widget-title" itemprop="headline">CUSTOMER CARE</h4>
                                            <ul>
                                                <li><a href="#" title="" itemprop="url">Returns</a></li>
                                                <li><a href="#" title="" itemprop="url">Shipping Info</a></li>
                                                <li><a href="#" title="" itemprop="url">Gift Cards</a></li>
                                                <li><a href="#" title="" itemprop="url">Size Guide</a></li>
                                                <li><a href="#" title="" itemprop="url">Money Back</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s">
                                            <h4 class="widget-title" itemprop="headline">GET IN TOUCH</h4>
                                            <ul>
                                                <li><i class="fa fa-map-marker"></i> 123 New Design Str, ABC Building, melbourne, Australia.</li>
                                                <li><i class="fa fa-phone"></i> (0044) 8647 1234 587</li>
                                                <li><i class="fa fa-envelope"></i> <a href="#" title="" itemprop="url">hello@yourdomain.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Footer Data -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="bottom-bar dark-bg text-center">
            <div class="container">
                <p itemprop="description"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
            </div>
        </div><!-- Bottom Bar -->
    </main><!-- Main Wrapper -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>