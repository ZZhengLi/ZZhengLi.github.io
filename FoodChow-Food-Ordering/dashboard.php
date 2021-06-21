<!DOCTYPE html>
<html lang="en">

<?php
include_once("config.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);

$userid = $_POST['userid'];
$sql = "SELECT * FROM  userinfo
            WHERE userID = '$userid';";
$result = $conn->query($sql);
if (mysqli_num_rows($result) == 0) {
    echo '<script>alert("User does not exist")</script>';
    echo "<script> location.href='index.php'; </script>";
    exit;
}


if (isset($_POST["update"])) {
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql = "UPDATE userinfo 
            SET name = '$name',
            phone = '$phone',
            email = '$email',
            address = '$address'
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
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/red-color.css">
    <link rel="stylesheet" href="assets/css/yellow-color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body itemscope>
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
                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url"><span class="red-clr">FOOD ORDERING</span><?php echo $_POST['userid'] ?></a>
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
                            <a class="red-bg brd-rd4" href="dashboard.php" title="Register" itemprop="url">DASHBOARD</a>
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
                    <h1 itemprop="headline"><a href="index-2.html" title="Home" itemprop="url"><img src="assets/images/logo.png" alt="logo.png" itemprop="image"></a></h1>
                </div>
                <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
            </div>
            <div class="responsive-menu">
                <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
                <div class="menu-lst">
                    <ul>
                        <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url"><span class="yellow-clr">FOOD ORDERING</span>HOMEPAGES</a>
                            <ul class="sub-dropdown">
                                <li><a href="index-2.html" title="HOMEPAGE 1" itemprop="url">HOMEPAGE 1</a></li>
                                <li><a href="index2.html" title="HOMEPAGE 2" itemprop="url">HOMEPAGE 2</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#" title="RESTAURANTS" itemprop="url"><span class="yellow-clr">REAL FOOD</span>RESTAURANTS</a>
                            <ul class="sub-dropdown">
                                <li><a href="restaurant-found.html" title="RESTAURANT 1" itemprop="url">RESTAURANT 1</a></li>
                                <li><a href="restaurant-found2.html" title="RESTAURANT 2" itemprop="url">RESTAURANT 2</a></li>
                                <li><a href="restaurant-detail.html" title="RESTAURANT DETAILS" itemprop="url">RESTAURANT DETAILS</a></li>
                                <li><a href="restaurant-detail.html" title="RESTAURANT DETAILS" itemprop="url">RESTAURANT DETAILS</a></li>
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
                                <li><a href="register-reservation.html" title="REGISTER RESERVATION" itemprop="url">REGISTER RESERVATION</a></li>
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
                    <a class="yellow-bg brd-rd4" href="register-reservation.html" title="Register" itemprop="url">REGISTER RESTAURANT</a>
                </div>
            </div><!-- Responsive Menu -->
        </div><!-- Responsive Header -->

        <section>
            <div class="block">
                <div class="fixed-bg" style="background-image: url(assets/images/topbg.jpg);"></div>
                <div class="page-title-wrapper text-center">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="page-title-inner">
                            <h1 itemprop="headline">Dashboard</h1>
                            <span>A Greate Restaurant Website</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>

        <section>
            <div class="block less-spacing gray-bg top-padd30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="sec-box">
                                <div class="dashboard-tabs-wrapper">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-lg-4">
                                            <div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s">
                                                <div class="profile-sidebar-inner brd-rd5">
                                                    <div class="user-info red-bg">
                                                        <img class="brd-rd50" src="assets/images/resource/user-avatar.jpg" alt="user-avatar.jpg" itemprop="image">
                                                        <div class="user-info-inner">
                                                            <h5 itemprop="headline"><a href="#" title="" itemprop="url">BUYER DEMO</a></h5>
                                                            <span><a href="#" title="" itemprop="url">dum3@chimpgroou.com</a></span>
                                                            <a class="brd-rd3 sign-out-btn yellow-bg" href="#" title="" itemprop="url"><i class="fa fa-sign-out"></i> SIGN OUT</a>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        <!-- <li><a href="#dashboard" data-toggle="tab"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
                                                        <li><a href="#my-bookings" data-toggle="tab"><i class="fa fa-file-text"></i> MY BOOKINGS</a></li>
                                                        <li><a href="#my-reviews" data-toggle="tab"><i class="fa fa-comments"></i> MY REVIEWS</a></li> -->
                                                        <li  class="active"><a href="#my-orders" data-toggle="tab"><i class="fa fa-shopping-basket"></i> MY ORDERS</a></li>
                                                        <!-- <li><a href="#shortlists" data-toggle="tab"><i class="fa fa-heart"></i> SHORTLISTS</a></li>
                                                        <li><a href="#statement" data-toggle="tab"><i class="fa fa-wpforms"></i> STATEMENT</a></li> -->
                                                        <li><a href="#account-settings" data-toggle="tab"><i class="fa fa-cog"></i> ACCOUNT SETTINGS</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 col-lg-8">
                                            <div class="tab-content">
                                                <div class="tab-pane fade" id="dashboard">
                                                    <div class="dashboard-wrapper brd-rd5">
                                                        <div class="welcome-note yellow-bg brd-rd5">
                                                            <h4 itemprop="headline">WELCOME TO YOUR ACCOUNT</h4>
                                                            <p itemprop="description">Things that get tricky are things like burgers and fries, or things that are deep-fried. We do have a couple of burger restaurants that are capable of doing a good</p>
                                                            <img src="assets/images/resource/welcome-note-img.png" alt="welcome-note-img.png" itemprop="image">
                                                            <a class="remove-noti" href="#" title="" itemprop="url"><img src="assets/images/close-icon.png" alt="close-icon.png" itemprop="image"></a>
                                                        </div>
                                                        <div class="dashboard-title">
                                                            <h4 itemprop="headline">SUGGESTED RESTAURANTS</h4>
                                                            <span>Define <a class="red-clr" href="#" title="" itemprop="url">Search criteria</a> to search for specific</span>
                                                        </div>
                                                        <div class="restaurants-list">
                                                            <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp" data-wow-delay="0.2s">
                                                                <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="assets/images/resource/restaurant-logo1-1.png" alt="restaurant-logo1-1.png" itemprop="image"></a></div>
                                                                <div class="featured-restaurant-info">
                                                                    <span class="red-clr">5th Avenue New York 68</span>
                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">Domino's Pizza</a></h4>
                                                                    <ul class="post-meta">
                                                                        <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                                        <li><i class="flaticon-transport"></i> 30min</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="view-menu-liks">
                                                                    <span class="red-bg brd-rd4 post-likes"><i class="fa fa-heart-o"></i> 12</span>
                                                                    <a class="brd-rd3" href="#" title="" itemprop="url">View Menu</a>
                                                                </div>
                                                            </div>
                                                            <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp" data-wow-delay="0.3s">
                                                                <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="assets/images/resource/restaurant-logo1-2.png" alt="restaurant-logo1-2.png" itemprop="image"></a></div>
                                                                <div class="featured-restaurant-info">
                                                                    <span class="red-clr">5th Avenue New York 68</span>
                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">Pizza Hut</a></h4>
                                                                    <ul class="post-meta">
                                                                        <li><i class="fa fa-check-circle-o"></i> Min order $40</li>
                                                                        <li><i class="flaticon-transport"></i> 30min</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="view-menu-liks">
                                                                    <span class="red-bg brd-rd4 post-likes"><i class="fa fa-heart-o"></i> 20</span>
                                                                    <a class="brd-rd3" href="#" title="" itemprop="url">View Menu</a>
                                                                </div>
                                                            </div>
                                                            <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp" data-wow-delay="0.4s">
                                                                <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="assets/images/resource/restaurant-logo1-1.png" alt="restaurant-logo1-1.png" itemprop="image"></a></div>
                                                                <div class="featured-restaurant-info">
                                                                    <span class="red-clr">5th Avenue New York 68</span>
                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">Burger King</a></h4>
                                                                    <ul class="post-meta">
                                                                        <li><i class="fa fa-check-circle-o"></i> Min order $100</li>
                                                                        <li><i class="flaticon-transport"></i> 30min</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="view-menu-liks">
                                                                    <span class="red-bg brd-rd4 post-likes"><i class="fa fa-heart-o"></i> 15</span>
                                                                    <a class="brd-rd3" href="#" title="" itemprop="url">View Menu</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="my-bookings">
                                                    <div class="tabs-wrp brd-rd5">
                                                        <h4 itemprop="headline">MY BOOKINGS</h4>
                                                        <div class="select-wrap-inner">
                                                            <div class="select-wrp2">
                                                                <select>
                                                                    <option>Select Booking Status</option>
                                                                    <option>Select Booking Status</option>
                                                                    <option>Select Booking Status</option>
                                                                </select>
                                                            </div>
                                                            <div class="select-wrp2">
                                                                <select>
                                                                    <option>Select Date Range</option>
                                                                    <option>Select Date Range</option>
                                                                    <option>Select Date Range</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="booking-table">
                                                            <table>
                                                                <thead>
                                                                    <tr>
                                                                        <th>RESTAURANT NAME</th>
                                                                        <th>DATE</th>
                                                                        <th>STATUS</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <h5 itemprop="headline"><a href="#" title="" itemprop="url">Jet's Kitchen ( #8589 )</a></h5>
                                                                        </td>
                                                                        <td>Aug 17,2017</td>
                                                                        <td><span class="brd-rd3 processing">PROCESSING</span> <a class="detail-link brd-rd50" href="#" title="" itemprop="url"><i class="fa fa-chain"></i></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h5 itemprop="headline"><a href="#" title="" itemprop="url">Jet's Kitchen ( #8589 )</a></h5>
                                                                        </td>
                                                                        <td>Aug 17,2017</td>
                                                                        <td><span class="brd-rd3 processing">PROCESSING</span> <a class="detail-link brd-rd50" href="#" title="" itemprop="url"><i class="fa fa-chain"></i></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h5 itemprop="headline"><a href="#" title="" itemprop="url">Jet's Kitchen ( #8589 )</a></h5>
                                                                        </td>
                                                                        <td>Aug 17,2017</td>
                                                                        <td><span class="brd-rd3 completed">COMPLETED</span> <a class="detail-link brd-rd50" href="#" title="" itemprop="url"><i class="fa fa-chain"></i></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h5 itemprop="headline"><a href="#" title="" itemprop="url">Jet's Kitchen ( #8589 )</a></h5>
                                                                        </td>
                                                                        <td>Aug 17,2017</td>
                                                                        <td><span class="brd-rd3 processing">PROCESSING</span> <a class="detail-link brd-rd50" href="#" title="" itemprop="url"><i class="fa fa-chain"></i></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h5 itemprop="headline"><a href="#" title="" itemprop="url">Jet's Kitchen ( #8589 )</a></h5>
                                                                        </td>
                                                                        <td>Aug 17,2017</td>
                                                                        <td><span class="brd-rd3 completed">COMPLETED</span> <a class="detail-link brd-rd50" href="#" title="" itemprop="url"><i class="fa fa-chain"></i></a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="my-reviews">
                                                    <div class="tabs-wrp brd-rd5">
                                                        <h4 itemprop="headline">MY REVIEWS</h4>
                                                        <div class="select-wrap-inner">
                                                            <div class="select-wrp2">
                                                                <select>
                                                                    <option>Newest Reviews</option>
                                                                    <option>Newest Reviews</option>
                                                                    <option>Newest Reviews</option>
                                                                </select>
                                                            </div>
                                                            <div class="select-wrp2">
                                                                <select>
                                                                    <option>Select Date Range</option>
                                                                    <option>Select Date Range</option>
                                                                    <option>Select Date Range</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="review-list">
                                                            <div class="review-box brd-rd5">
                                                                <h4 itemprop="headline"><a href="#" title="" itemprop="url">RESTAURANT DEMO</a></h4>
                                                                <div class="ratings">
                                                                    <i class="fa fa-star on"></i>
                                                                    <i class="fa fa-star on"></i>
                                                                    <i class="fa fa-star on"></i>
                                                                    <i class="fa fa-star off"></i>
                                                                    <i class="fa fa-star off"></i>
                                                                </div>
                                                                <p itemprop="description">FoodBakery order today. So great to be able to order food and not have to talk to anyone.</p>
                                                                <div class="review-info">
                                                                    <img class="brd-rd50" src="assets/images/resource/reviewr-img1.jpg" alt="reviewr-img1.jpg" itemprop="image">
                                                                    <div class="review-info-inner">
                                                                        <h5 itemprop="headline">QLARK JAKSON</h5>
                                                                        <i class="red-clr">2 months Ago</i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="review-box brd-rd5">
                                                                <h4 itemprop="headline"><a href="#" title="" itemprop="url">RESTAURANT DEMO</a></h4>
                                                                <div class="ratings">
                                                                    <i class="fa fa-star on"></i>
                                                                    <i class="fa fa-star on"></i>
                                                                    <i class="fa fa-star on"></i>
                                                                    <i class="fa fa-star on"></i>
                                                                    <i class="fa fa-star off"></i>
                                                                </div>
                                                                <p itemprop="description">FoodBakery order today. So great to be able to order food and not have to talk to anyone.</p>
                                                                <div class="review-info">
                                                                    <img class="brd-rd50" src="assets/images/resource/reviewr-img2.jpg" alt="reviewr-img2.jpg" itemprop="image">
                                                                    <div class="review-info-inner">
                                                                        <h5 itemprop="headline">QLARK JAKSON</h5>
                                                                        <i class="red-clr">2 months Ago</i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="review-box brd-rd5">
                                                                <h4 itemprop="headline"><a href="#" title="" itemprop="url">RESTAURANT DEMO</a></h4>
                                                                <div class="ratings">
                                                                    <i class="fa fa-star on"></i>
                                                                    <i class="fa fa-star on"></i>
                                                                    <i class="fa fa-star on"></i>
                                                                    <i class="fa fa-star on"></i>
                                                                    <i class="fa fa-star on"></i>
                                                                </div>
                                                                <p itemprop="description">FoodBakery order today. So great to be able to order food and not have to talk to anyone.</p>
                                                                <div class="review-info">
                                                                    <img class="brd-rd50" src="assets/images/resource/reviewr-img3.jpg" alt="reviewr-img3.jpg" itemprop="image">
                                                                    <div class="review-info-inner">
                                                                        <h5 itemprop="headline">QLARK JAKSON</h5>
                                                                        <i class="red-clr">2 months Ago</i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- Review List -->
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade in active" id="my-orders">
                                                    <div class="tabs-wrp brd-rd5">
                                                        <h4 itemprop="headline">MY ORDERS</h4>
                                                        <div class="select-wrap-inner">
                                                            <div class="select-wrp2">
                                                                <select>
                                                                    <option>Select Orders Status</option>
                                                                    <option>Select Orders Status</option>
                                                                    <option>Select Orders Status</option>
                                                                </select>
                                                            </div>
                                                            <div class="select-wrp2">
                                                                <select>
                                                                    <option>Select Date Range</option>
                                                                    <option>Select Date Range</option>
                                                                    <option>Select Date Range</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="order-list">
                                                            <?php
                                                            include_once("config.php");
                                                            // Create connection
                                                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                                                            $id = $_POST['userid'];
                                                            $sql = "SELECT * FROM DeliveryInfo WHERE userID = '$id'ORDER BY date ";
                                                            $result = mysqli_query($conn, $sql);

                                                            if (mysqli_num_rows($result) > 0) {
                                                            ?>
                                                                <tbody>
                                                                    <?php
                                                                    // output data of each row
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        $date = $row['date'];
                                                                    ?>
                                                                        <!-- display data from database -->
                                                                        <td class="box">
                                                                            <!-- delete command -->
                                                                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="formUpdate<?php echo $row['date']; ?>">
                                                                                <input type="hidden" name="date" value="<?php echo $row['date']; ?>" />
                                                                                <input type="hidden" name="cmd" value="del" />
                                                                                <div>
                                                                                    <button type="submit">
                                                                                        <img src="assets/images/icon-del.png" width="20" />
                                                                                    </button>
                                                                                    <h3>You ordered <?php echo $row['food']; ?> at <?php echo $row['date']; ?></h3>
                                                                                </div>
                                                                            </form>
                                                                        </td>

                                                                </tbody>
                                                            <?php
                                                                    }
                                                            ?>

                                                        <?php
                                                                // delete data from database
                                                                if (isset($_POST['cmd']) && $_POST['cmd'] == 'del') {
                                                                    $date = $_POST['date'];
                                                                    $sql = "DELETE FROM deliveryInfo WHERE date = '{$date}'";
                                                                    $result = mysqli_query($conn, $sql);

                                                                    if ($conn->query($sql) === TRUE) {
                                                                        echo "Record deleted successfully";
                                                                    } else {
                                                                        echo "Error deleting record: " . $conn->error;
                                                                    }
                                                                }
                                                                mysqli_close($conn);
                                                            } ?>
                                                        
                                                        </div>
                                                        <!-- Pagination Wrapper -->
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="shortlists">
                                                    <div class="tabs-wrp brd-rd5">
                                                        <h4 itemprop="headline">SHORTLISTS</h4>
                                                        <div class="restaurants-list">
                                                            <div class="featured-restaurant-box style3 brd-rd5">
                                                                <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="assets/images/resource/restaurant-logo1-1.png" alt="restaurant-logo1-1.png" itemprop="image"></a></div>
                                                                <div class="featured-restaurant-info">
                                                                    <span class="red-clr">5th Avenue New York 68</span>
                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">Domino's Pizza</a></h4>
                                                                    <ul class="post-meta">
                                                                        <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                                        <li><i class="flaticon-transport"></i> 30min</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="view-menu-liks">
                                                                    <a class="brd-rd3" href="#" title="" itemprop="url">View Menu</a>
                                                                </div>
                                                            </div>
                                                            <div class="featured-restaurant-box style3 brd-rd5">
                                                                <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="assets/images/resource/restaurant-logo1-2.png" alt="restaurant-logo1-2.png" itemprop="image"></a></div>
                                                                <div class="featured-restaurant-info">
                                                                    <span class="red-clr">5th Avenue New York 68</span>
                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">Pizza Hut</a></h4>
                                                                    <ul class="post-meta">
                                                                        <li><i class="fa fa-check-circle-o"></i> Min order $40</li>
                                                                        <li><i class="flaticon-transport"></i> 30min</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="view-menu-liks">
                                                                    <a class="brd-rd3" href="#" title="" itemprop="url">View Menu</a>
                                                                </div>
                                                            </div>
                                                            <div class="featured-restaurant-box style3 brd-rd5">
                                                                <div class="featured-restaurant-thumb"><a href="#" title="" itemprop="url"><img src="assets/images/resource/restaurant-logo1-3.png" alt="restaurant-logo1-3.png" itemprop="image"></a></div>
                                                                <div class="featured-restaurant-info">
                                                                    <span class="red-clr">5th Avenue New York 68</span>
                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">Burger King</a></h4>
                                                                    <ul class="post-meta">
                                                                        <li><i class="fa fa-check-circle-o"></i> Min order $100</li>
                                                                        <li><i class="flaticon-transport"></i> 30min</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="view-menu-liks">
                                                                    <a class="brd-rd3" href="#" title="" itemprop="url">View Menu</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="pagination-wrapper text-center style2">
                                                            <ul class="pagination justify-content-center">
                                                                <li class="page-item prev"><a class="page-link brd-rd2" href="#" itemprop="url">PREV</a></li>
                                                                <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">1</a></li>
                                                                <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">2</a></li>
                                                                <li class="page-item active"><span class="page-link brd-rd2">3</span></li>
                                                                <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">4</a></li>
                                                                <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">5</a></li>
                                                                <li class="page-item">........</li>
                                                                <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">18</a></li>
                                                                <li class="page-item next"><a class="page-link brd-rd2" href="#" itemprop="url">NEXT</a></li>
                                                            </ul>
                                                        </div><!-- Pagination Wrapper -->
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="statement">
                                                    <div class="tabs-wrp brd-rd5">
                                                        <h4 itemprop="headline">STATEMENTS</h4>
                                                        <div class="select-wrap-inner">
                                                            <div class="select-wrp2"></div>
                                                            <div class="select-wrp2">
                                                                <select>
                                                                    <option>Select Date Range</option>
                                                                    <option>Select Date Range</option>
                                                                    <option>Select Date Range</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="statement-table">
                                                            <table>
                                                                <thead>
                                                                    <tr>
                                                                        <th>TRANSACTION ID</th>
                                                                        <th>ORDER ID</th>
                                                                        <th>DATE</th>
                                                                        <th>DETAIL</th>
                                                                        <th>AMOUNT</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>#30737723</td>
                                                                        <td>8720</td>
                                                                        <td>Aug 17,2017</td>
                                                                        <td>Order - Misumisu Thai</td>
                                                                        <td><span class="red-clr">$35.97</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>#30737723</td>
                                                                        <td>8720</td>
                                                                        <td>Aug 17,2017</td>
                                                                        <td>Order - Jet's Kitchen</td>
                                                                        <td><span class="red-clr">$35.97</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>#30737723</td>
                                                                        <td>8720</td>
                                                                        <td>Aug 17,2017</td>
                                                                        <td>Order - Misumisu Thai</td>
                                                                        <td><span class="red-clr">$35.97</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>#30737723</td>
                                                                        <td>8720</td>
                                                                        <td>Aug 17,2017</td>
                                                                        <td>Order - Misumisu Thai</td>
                                                                        <td><span class="red-clr">$35.97</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>#30737723</td>
                                                                        <td>8720</td>
                                                                        <td>Aug 17,2017</td>
                                                                        <td>Order - Misumisu Thai</td>
                                                                        <td><span class="red-clr">$35.97</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div><!-- Statement Table -->
                                                        <div class="pagination-wrapper text-center style2">
                                                            <ul class="pagination justify-content-center">
                                                                <li class="page-item prev"><a class="page-link brd-rd2" href="#" itemprop="url">PREV</a></li>
                                                                <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">1</a></li>
                                                                <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">2</a></li>
                                                                <li class="page-item active"><span class="page-link brd-rd2">3</span></li>
                                                                <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">4</a></li>
                                                                <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">5</a></li>
                                                                <li class="page-item">........</li>
                                                                <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">18</a></li>
                                                                <li class="page-item next"><a class="page-link brd-rd2" href="#" itemprop="url">NEXT</a></li>
                                                            </ul>
                                                        </div><!-- Pagination Wrapper -->
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="account-settings">
                                                    <div class="tabs-wrp account-settings brd-rd5">
                                                        <h4 itemprop="headline">ACCOUNT SETTINGS</h4>
                                                        <div class="account-settings-inner">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                    <div class="profile-info-form-wrap">
                                                                        <form id="profile" class="profile-info-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                                            <div class="row mrg20">
                                                                                <?php
                                                                                include_once("config.php");
                                                                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                                                                                $id = $_POST['userid'];
                                                                                $sql = "SELECT * FROM userinfo WHERE userID = '$id'";
                                                                                $result = $conn->query($sql);
                                                                                $row = $result->fetch_assoc();
                                                                                // $row = mysqli_fetch_array($result);
                                                                                // if (mysqli_num_rows($result) == 0) {
                                                                                //     echo "hello";
                                                                                // }
                                                                                ?>

                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <label>Name</label>
                                                                                    <input class="brd-rd3" type="text" name="name" value="<?php echo $row['name'] ?>" disabled>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <label>Email Address</label>
                                                                                    <input class="brd-rd3" type="text" name="phone" value="<?php echo $row['phone'] ?>" disabled>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <label>Phone No</label>
                                                                                    <input class="brd-rd3" type="text" name="email" value="<?php echo $row['email'] ?>" disabled>
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <label>City</label>
                                                                                    <input class="brd-rd3" type="text" name="address" value="<?php echo $row['address'] ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <input type="text" hidden name="userid" value="<?php echo $_POST['userid'] ?>"/>
                                                                            <input id="update" class="custom2" hidden type="submit" name="update" value="Update" />
                                                                            <input id="cancel" class="custom2" hidden type="button" value="Cancel" />
                                                                            <input id="edit" class="custom2" type="button" value="Edit" />
                                                                        </form>
                                                                            <form class="profile-info-form" method="post" action="index.php">
                                                                                <input type="text" hidden name="userid" value="<?php echo $_POST['userid'] ?>"/>
                                                                            <input class="custom3" type="submit" name="delete" value="Delete Account" />
                                                                            </form>

                                                                            <script>
                                                                                var edit = document.getElementById('edit');
                                                                                var profile = document.getElementById('profile');
                                                                                var update = document.getElementById('update');
                                                                                edit.addEventListener('click', function() {
                                                                                    for (var i = 0; i < profile.length; i++) {
                                                                                        profile.elements[i].disabled = false;

                                                                                    }
                                                                                    profile.elements[0].focus();
                                                                                    update.hidden = false;
                                                                                    cancel.hidden = false;
                                                                                    edit.hidden = true;
                                                                                });
                                                                                
                                                                                cancel.addEventListener('click', function() {
                                                                                    for (var i = 0; i < profile.length; i++) {
                                                                                        profile.elements[i].disabled = true;

                                                                                    }
                                                                                    profile.elements[0].focus();
                                                                                    update.hidden = true;
                                                                                    cancel.hidden = true;
                                                                                    edit.hidden = false;
                                                                                });

                                                                            </script>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Section Box -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

        <div class="log-popup text-center">
            <div class="sign-popup-wrapper brd-rd5">
                <div class="sign-popup-inner brd-rd5">
                    <a class="log-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                    <div class="sign-popup-title text-center">
                        <h4 itemprop="headline">SIGN IN</h4>
                        <span>with your social network</span>
                    </div>
                    <div class="popup-social text-center">
                        <a class="facebook brd-rd3" href="#" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook"></i> Facebook</a>
                        <a class="google brd-rd3" href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i> Google</a>
                        <a class="twitter brd-rd3" href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i> Twitter</a>
                    </div>
                    <span class="popup-seprator text-center"><i class="brd-rd50">or</i></span>
                    <form class="sign-form">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="text" placeholder="Username or Email">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="red-bg brd-rd3" type="submit">SIGN IN</button>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <a class="sign-btn" href="#" title="" itemprop="url">Not a member? Sign up</a>
                                <a class="recover-btn" href="#" title="" itemprop="url">Recover my password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="sign-popup text-center">
            <div class="sign-popup-wrapper brd-rd5">
                <div class="sign-popup-inner brd-rd5">
                    <a class="sign-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                    <div class="sign-popup-title text-center">
                        <h4 itemprop="headline">SIGN UP</h4>
                        <span>with your social network</span>
                    </div>
                    <div class="popup-social text-center">
                        <a class="facebook brd-rd3" href="#" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook"></i> Facebook</a>
                        <a class="google brd-rd3" href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i> Google</a>
                        <a class="twitter brd-rd3" href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i> Twitter</a>
                    </div>
                    <span class="popup-seprator text-center"><i class="brd-rd50">or</i></span>
                    <form class="sign-form">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="text" placeholder="Username">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="email" placeholder="Email">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="red-bg brd-rd3" type="submit">REGISTER NOW</button>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <a class="sign-btn" href="#" title="" itemprop="url">Already Registered? Sign in</a>
                                <a class="recover-btn" href="#" title="" itemprop="url">Recover my password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main><!-- Main Wrapper -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="assets/js/google-map-int.js"></script>
    <script src="../../www.google.com/recaptcha/api.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>