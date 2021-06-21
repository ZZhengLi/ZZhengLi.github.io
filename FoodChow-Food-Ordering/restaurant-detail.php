<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once("config.php");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["add_to_cart"])) {
    //insert
    //as
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    // $sql = "INSERT INTO shopping_cart (id, name, price, quantity) 
    //         VALUES ('$id','$name','$price','$quantity')";

    $sql = "INSERT IGNORE INTO shopping_cart
            SET id = '$id',
            name = '$name',
            price = '$price',
            quantity = '$quantity';";

    $conn->query($sql);

    //myordersession
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_POST["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'            =>    $_POST["id"],
                'item_name'            =>    $_POST["name"],
                'item_price'        =>    $_POST["price"],
                'item_quantity'        =>    $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(
            'item_id'            =>    $_POST["id"],
            'item_name'            =>    $_POST["name"],
            'item_price'        =>    $_POST["price"],
            'item_quantity'        =>    $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["operation"])) {
    if ($_GET["operation"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                // echo '<script>alert("Item Removed")</script>';
                // echo '<script>window.location="restaurant-detail.php"</script>';
            }
        }
        $id = $_GET["id"];
        $sql = "DELETE FROM shopping_cart WHERE id = '$id';";
        $conn->query($sql);
    }
}


if (isset($_POST["update"])) {
    for ($x = 0; $x < count($_SESSION["shopping_cart"]); $x++) {
        if ($_SESSION["shopping_cart"][$x]['item_id'] == $_POST["id2"]) {
            $replacement = array('item_quantity' => $_POST["new_quantity"]);
            $_SESSION["shopping_cart"][$x] = array_replace($_SESSION["shopping_cart"][$x], $replacement);
        }
    }

    $new_quantity = $_POST['new_quantity'];
    $id = $_POST['id2'];
    $sql = "UPDATE shopping_cart 
            SET quantity = '$new_quantity' 
            WHERE id = '$id';";
    $conn->query($sql);
}



if (isset($_POST['cmd']) && $_POST['cmd'] == 'add') {
    $sql1 = "SELECT * FROM shopping_cart ORDER BY id";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $food = $food . $row['name'] . " x" . $row['quantity'] . "; ";
        }
        $sql2 = "truncate table shopping_cart";
        $userID = $_POST['userID'];
        $note = $_POST['note'];
        $total = $_POST['total'];
        $payment = $_POST['payment'];
        $sql = "INSERT INTO DeliveryInfo (deliveryID, userID, food, total, payment, note, date)
                VALUES ('$userID'+now(), '$userID', '$food', '$total', '$payment', '$note', now())";
        if ($conn->query($sql) === TRUE) {
            echo "Address saved successfully<br/>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->query($sql2);
        unset($_SESSION["shopping_cart"]);
    }
}

if (isset($_POST['adduser']) && $_POST['adduser'] == 'adduser') {
    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql = "INSERT INTO userInfo (userID, name, phone, email, address)
      VALUES ('$userID', '$name', '$phone', '$email', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "Address saved successfully<br/>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
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
    <div class="log-popup text-center">
        <div class="newsletter-popup-inner" style="background-image: url(assets/images/newsletter-bg.jpg);">
            <a class="close-btn brd-rd50" href="#" title="Close Button" itemprop="url"><i class="fa fa-close"></i></a>
            <h3 itemprop="headline"><i class="fa fa-info red-clr"></i> ENTER YOUR USERID</h3>
            <!-- <p itemprop="description">Join our Subscribers list to get the latest news, updates and special offers delivered directly in your inbox.</p> -->
            <form method="post" action="dashboard.php" class="newsletter-frm brd-rd30">
                <input class="brd-rd30" name="userid" placeholder="ENTER YOUR ID">
                <button name="userid_submit" class="brd-rd30 red-bg" type="submit">SUBMIT</button>
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
                            <a class="red-bg brd-rd4 log-popup-btn" href="#" title="Dashboard" itemprop="url">DASHBOARD</a>
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

        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Restaurant</a></li>
                    <li class="breadcrumb-item active">Restaurant Details</li>
                </ol>
            </div>
        </div>

        <section>
            <div class="block gray-bg top-padd30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="sec-box">
                                <div class="sec-wrapper">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-lg-8">
                                            <div class="restaurant-detail-wrapper">
                                                <div class="restaurant-detail-info">
                                                    <div class="restaurant-detail-thumb">
                                                        <ul class="restaurant-detail-img-carousel">
                                                            <li><img class="brd-rd3" src="assets/images/resource/restaurant-detail-big-img1-1.jpg" alt="restaurant-detail-big-img1-1.jpg" itemprop="image"></li>
                                                            <li><img class="brd-rd3" src="assets/images/resource/restaurant-detail-big-img1-2.jpg" alt="restaurant-detail-big-img1-2.jpg" itemprop="image"></li>
                                                            <li><img class="brd-rd3" src="assets/images/resource/restaurant-detail-big-img1-3.jpg" alt="restaurant-detail-big-img1-3.jpg" itemprop="image"></li>
                                                            <li><img class="brd-rd3" src="assets/images/resource/restaurant-detail-big-img1-4.jpg" alt="restaurant-detail-big-img1-4.jpg" itemprop="image"></li>
                                                        </ul>
                                                        <ul class="restaurant-detail-thumb-carousel">
                                                            <li><img class="brd-rd3" src="assets/images/resource/restaurant-detail-small-img1-1.jpg" alt="restaurant-detail-small-img1-1.jpg" itemprop="image"></li>
                                                            <li><img class="brd-rd3" src="assets/images/resource/restaurant-detail-small-img1-2.jpg" alt="restaurant-detail-small-img1-2.jpg" itemprop="image"></li>
                                                            <li><img class="brd-rd3" src="assets/images/resource/restaurant-detail-small-img1-3.jpg" alt="restaurant-detail-small-img1-3.jpg" itemprop="image"></li>
                                                            <li><img class="brd-rd3" src="assets/images/resource/restaurant-detail-small-img1-4.jpg" alt="restaurant-detail-small-img1-4.jpg" itemprop="image"></li>
                                                        </ul>
                                                    </div>
                                                    <div class="restaurant-detail-title">
                                                        <h1 itemprop="headline">Nik Baker's</h1>
                                                        <div class="info-meta">
                                                            <span>Greater Kailash (GK) 2</span>
                                                            <span><a href="#" title="" itemprop="url">Bakery</a>, <a href="#" title="" itemprop="url">Cafe</a></span>
                                                        </div>
                                                        <div class="rating-wrapper">
                                                            <a class="gradient-brd brd-rd2" href="#" title="" itemprop="url"><i class="fa fa-star"></i> Rate <i>4.0</i></a>
                                                            <div class="rate-share brd-rd5">
                                                                <div class="rating-box-wrapper">
                                                                    <span>Rate</span>
                                                                    <div class="rating-box">
                                                                        <span class="brd-rd2 clr1 on"></span>
                                                                        <span class="brd-rd2 clr2 on"></span>
                                                                        <span class="brd-rd2 clr3 on"></span>
                                                                        <span class="brd-rd2 clr4 on"></span>
                                                                        <span class="brd-rd2 clr5 on"></span>
                                                                        <span class="brd-rd2 clr6 on"></span>
                                                                        <span class="brd-rd2 clr7 off"></span>
                                                                        <span class="brd-rd2 clr8 off"></span>
                                                                        <i>4.0</i>
                                                                    </div>
                                                                </div>
                                                                <div class="share-wrapper">
                                                                    <div class="fb-share">
                                                                        <label class="switch">
                                                                            <input type="checkbox">
                                                                            <span class="switch-slider brd-rd30"></span>
                                                                        </label>
                                                                        <a class="facebook brd-rd2" href="#" title="" itemprop="url"><i class="fa fa-facebook-square"></i> Share on Facebook</a>
                                                                    </div>
                                                                    <div class="fb-share">
                                                                        <label class="switch">
                                                                            <input type="checkbox">
                                                                            <span class="switch-slider brd-rd30"></span>
                                                                        </label>
                                                                        <a class="twitter brd-rd2" href="#" title="" itemprop="url"><i class="fa fa-twitter"></i> Share on Twitter</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="restaurant-detail-tabs">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-cutlery"></i> Menu</a></li>
                                                            <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-picture-o"></i> Gallery</a></li>
                                                            <li><a href="#tab1-3" data-toggle="tab"><i class="fa fa-star"></i> Reviews</a></li>
                                                            <li><a href="#tab1-4" data-toggle="tab"><i class="fa fa-book"></i> Book A Table</a></li>
                                                            <li><a href="#tab1-5" data-toggle="tab"><i class="fa fa-info"></i> Restaurant Info</a></li>
                                                            <li><a href="#tab1-6" data-toggle="tab"><i class="fa fa-info"></i> Order History</a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active" id="tab1-1">
                                                                <form class="search-dish">
                                                                    <input type="text" placeholder="Search here">
                                                                    <button type="submit"><i class="fa fa-search"></i></button>
                                                                </form>
                                                                <div class="dishes-list-wrapper">
                                                                    <h4 class="title3" itemprop="headline"><span class="sudo-bottom sudo-bg-red">Menu</span></h4>
                                                                    <!-- <span class="post-rate red-bg brd-rd2"><i class="fa fa-star-o"></i> 4.25</span> -->
                                                                    <?php
                                                                    $query = "SELECT * FROM restaurant1 ORDER BY id ASC";
                                                                    $result = mysqli_query($conn, $query);
                                                                    if (mysqli_num_rows($result) > 0) {
                                                                        while ($row = mysqli_fetch_array($result)) {
                                                                    ?>
                                                                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                                                                                <ul class="dishes-list">
                                                                                    <li class="wow fadeInUp" data-wow-delay="0.1s">
                                                                                        <div class="featured-restaurant-box">
                                                                                            <div class="featured-restaurant-thumb">
                                                                                                <a href="#" title="" itemprop="url"><img src="assets/pictures/<?php echo $row["image"]; ?>" alt="dish-img1-1.jpg" itemprop="image"></a>
                                                                                            </div>
                                                                                            <div class="featured-restaurant-info">
                                                                                                <h4 itemprop="headline"><a href="#" title="" itemprop="url"><?php echo $row["name"]; ?></a></h4>
                                                                                                <p itemprop="description">Lorem Ipsum is simply dummy text of the printing industry</p>
                                                                                                <ul class="post-meta">
                                                                                                    <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                                                                    <li><i class="flaticon-transport"></i> 303min</li>
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div class="ord-btn">
                                                                                                <span class="price">$<?php echo $row["price"]; ?></span>
                                                                                                <select name="quantity" class="form-control input-sm" value="1">
                                                                                                    <?php
                                                                                                    for ($i = 1; $i <= 100; $i++) {
                                                                                                    ?>
                                                                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </select>
                                                                                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                                                                                                <input type="hidden" name="name" value="<?php echo $row["name"]; ?>" />
                                                                                                <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />
                                                                                                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-danger" value="Add to Cart" />

                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </form>

                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <!-- <div class="dishes-list-wrapper">
                                                                    <h4 class="title3" itemprop="headline"><span class="sudo-bottom sudo-bg-red">Burgers</span></h4>
                                                                    <span class="post-rate red-bg brd-rd2"><i class="fa fa-star-o"></i> 4.25</span>
                                                                    <ul class="dishes-list">
                                                                        <li class="wow fadeInUp" data-wow-delay="0.2s">
                                                                            <div class="featured-restaurant-box">
                                                                                <div class="featured-restaurant-thumb">
                                                                                    <a href="#" title="" itemprop="url"><img src="assets/images/resource/dish-img2-1.jpg" alt="dish-img2-1.jpg" itemprop="image"></a>
                                                                                </div>
                                                                                <div class="featured-restaurant-info">
                                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">Bacon Gouda Burger</a></h4>
                                                                                    <span class="price">$85.00</span>
                                                                                    <p itemprop="description">Lorem Ipsum is simply dummy text of the printing industry</p>
                                                                                    <ul class="post-meta">
                                                                                        <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                                                        <li><i class="flaticon-transport"></i> 30min</li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="ord-btn">
                                                                                    <a class="brd-rd2" href="#" title="Order Now" itemprop="url">Order Now</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="wow fadeInUp" data-wow-delay="0.3s">
                                                                            <div class="featured-restaurant-box">
                                                                                <div class="featured-restaurant-thumb">
                                                                                    <a href="#" title="" itemprop="url"><img src="assets/images/resource/dish-img2-2.jpg" alt="dish-img2-2.jpg" itemprop="image"></a>
                                                                                </div>
                                                                                <div class="featured-restaurant-info">
                                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">Tribeca Chicken Burger</a></h4>
                                                                                    <span class="price">$85.00</span>
                                                                                    <p itemprop="description">Lorem Ipsum is simply dummy text of the printing industry</p>
                                                                                    <ul class="post-meta">
                                                                                        <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                                                        <li><i class="flaticon-transport"></i> 30min</li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="ord-btn">
                                                                                    <a class="brd-rd2" href="#" title="Order Now" itemprop="url">Order Now</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="wow fadeInUp" data-wow-delay="0.4s">
                                                                            <div class="featured-restaurant-box">
                                                                                <div class="featured-restaurant-thumb">
                                                                                    <a href="#" title="" itemprop="url"><img src="assets/images/resource/dish-img2-3.jpg" alt="dish-img2-3.jpg" itemprop="image"></a>
                                                                                </div>
                                                                                <div class="featured-restaurant-info">
                                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">Charburger</a></h4>
                                                                                    <span class="price">$85.00</span>
                                                                                    <p itemprop="description">Lorem Ipsum is simply dummy text of the printing industry</p>
                                                                                    <ul class="post-meta">
                                                                                        <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                                                        <li><i class="flaticon-transport"></i> 30min</li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="ord-btn">
                                                                                    <a class="brd-rd2" href="#" title="Order Now" itemprop="url">Order Now</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="wow fadeInUp" data-wow-delay="0.5s">
                                                                            <div class="featured-restaurant-box">
                                                                                <div class="featured-restaurant-thumb">
                                                                                    <a href="#" title="" itemprop="url"><img src="assets/images/resource/dish-img2-4.jpg" alt="dish-img2-4.jpg" itemprop="image"></a>
                                                                                </div>
                                                                                <div class="featured-restaurant-info">
                                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">Salads & Veggies Burger</a></h4>
                                                                                    <span class="price">$85.00</span>
                                                                                    <p itemprop="description">Lorem Ipsum is simply dummy text of the printing industry</p>
                                                                                    <ul class="post-meta">
                                                                                        <li><i class="fa fa-check-circle-o"></i> Min order $50</li>
                                                                                        <li><i class="flaticon-transport"></i> 30min</li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="ord-btn">
                                                                                    <a class="brd-rd2" href="#" title="Order Now" itemprop="url">Order Now</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div> -->
                                                            </div>
                                                            <div class="tab-pane fade" id="tab1-2">
                                                                <div class="restaurant-gallery">
                                                                    <h4 class="title3" itemprop="headline"><span class="sudo-bottom sudo-bg-red">Nik B</span>aker's Gallery</h4>
                                                                    <div class="remove-ext">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="restaurant-gallery-img"><a href="assets/images/resource/restaurant-gallery-img1.jpg" data-fancybox="gallery" title="" itemprop="url"><img src="assets/images/resource/restaurant-gallery-img1.jpg" alt="restaurant-gallery-img1.jpg" itemprop="image"></a></div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="restaurant-gallery-img"><a href="assets/images/resource/restaurant-gallery-img2.jpg" data-fancybox="gallery" title="" itemprop="url"><img src="assets/images/resource/restaurant-gallery-img2.jpg" alt="restaurant-gallery-img2.jpg" itemprop="image"></a></div>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="restaurant-gallery-img"><a href="assets/images/resource/restaurant-gallery-img3.jpg" data-fancybox="gallery" title="" itemprop="url"><img src="assets/images/resource/restaurant-gallery-img3.jpg" alt="restaurant-gallery-img3.jpg" itemprop="image"></a></div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="restaurant-gallery-img"><a href="assets/images/resource/restaurant-gallery-img4.jpg" data-fancybox="gallery" title="" itemprop="url"><img src="assets/images/resource/restaurant-gallery-img4.jpg" alt="restaurant-gallery-img4.jpg" itemprop="image"></a></div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="restaurant-gallery-img"><a href="assets/images/resource/restaurant-gallery-img5.jpg" data-fancybox="gallery" title="" itemprop="url"><img src="assets/images/resource/restaurant-gallery-img5.jpg" alt="restaurant-gallery-img5.jpg" itemprop="image"></a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="tab1-3">
                                                                <div class="customer-review-wrapper">
                                                                    <h4 class="title3" itemprop="headline"><span class="sudo-bottom sudo-bg-red">Custo</span>mer Reviews</h4>
                                                                    <ul class="comments-thread customer-reviews">
                                                                        <li>
                                                                            <div class="comment">
                                                                                <img class="brd-rd50" src="assets/images/resource/review-img1.jpg" alt="review-img1.jpg" itemprop="image">
                                                                                <div class="comment-info">
                                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">John Mathur</a></h4>
                                                                                    <p itemprop="description">Lorem ipsum dolor sit amet, pri nusquam petentium at. In mutat omnes homero mea, pro delenit accusam eu</p>
                                                                                    <span class="customer-rating">
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <span>(4)</span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="comment">
                                                                                <img class="brd-rd50" src="assets/images/resource/review-img2.jpg" alt="review-img2.jpg" itemprop="image">
                                                                                <div class="comment-info">
                                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">John Mathur</a></h4>
                                                                                    <p itemprop="description">Lorem ipsum dolor sit amet, pri nusquam petentium at. In mutat omnes homero mea, pro delenit accusam eu</p>
                                                                                    <span class="customer-rating">
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <span>(4)</span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="comment">
                                                                                <img class="brd-rd50" src="assets/images/resource/review-img3.jpg" alt="review-img3.jpg" itemprop="image">
                                                                                <div class="comment-info">
                                                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">John Mathur</a></h4>
                                                                                    <p itemprop="description">Lorem ipsum dolor sit amet, pri nusquam petentium at. In mutat omnes homero mea, pro delenit accusam eu</p>
                                                                                    <span class="customer-rating">
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star-o"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <span>(4)</span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="your-review">
                                                                        <h4 class="title3" itemprop="headline"><span class="sudo-bottom sudo-bg-red">Write</span> Review Here</h4>
                                                                        <form class="review-form">
                                                                            <textarea class="brd-rd5">Lorem ipsum dolor sit amet, pri nusquam petentium at. In mutatomnes homero mea, pro delenit accusam eu</textarea>
                                                                            <button class="brd-rd2 red-bg" type="submit">POST REVIEW</button>
                                                                            <div class="rate-box">
                                                                                <span>RATE US</span>
                                                                                <div class="rating-box">
                                                                                    <span class="brd-rd2 clr1 on"></span>
                                                                                    <span class="brd-rd2 clr2 on"></span>
                                                                                    <span class="brd-rd2 clr3 on"></span>
                                                                                    <span class="brd-rd2 clr4 on"></span>
                                                                                    <span class="brd-rd2 clr5 on"></span>
                                                                                    <span class="brd-rd2 clr6 on"></span>
                                                                                    <span class="brd-rd2 clr7 off"></span>
                                                                                    <span class="brd-rd2 clr8 off"></span>
                                                                                    <i>4.0</i>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="tab1-4">
                                                                <div class="book-table">
                                                                    <h4 class="title3" itemprop="headline"><span class="sudo-bottom sudo-bg-red">Book</span> This Restaurant Table</h4>
                                                                    <form>
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="input-field brd-rd2"><i class="fa fa-user"></i> <input type="text" placeholder="NAME"></div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="input-field brd-rd2"><i class="fa fa-phone"></i> <input type="text" placeholder="PHONE"></div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="select-wrp2">
                                                                                    <select>
                                                                                        <option>Questions</option>
                                                                                        <option>Questions No 1</option>
                                                                                        <option>Questions No 2</option>
                                                                                        <option>Questions No 3</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="input-field brd-rd2"><i class="fa fa-envelope"></i> <input type="email" placeholder="EMAIL"></div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="input-field brd-rd2"><i class="fa fa-calendar"></i> <input class="datepicker" type="text" placeholder="SELECT DATE"></div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                                                <div class="input-field brd-rd2"><i class="fa fa-clock-o"></i> <input class="timepicker" type="text" placeholder="SELECT Time"></div>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <div class="textarea-field brd-rd2"><i class="fa fa-pencil"></i> <textarea placeholder="Your Instruction"></textarea></div>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                <button class="brd-rd2 red-bg" type="submit">POST PREVIEW</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="tab1-5">
                                                                <div class="restaurant-info-wrapper">
                                                                    <h3 class="title3" itemprop="headline"><span class="sudo-bottom sudo-bg-red">Info</span> of This Restaurant</h3>
                                                                    <div class="loc-map" id="loc-map"></div>
                                                                    <ul class="restaurant-info-list">
                                                                        <li>
                                                                            <i class="fa fa-map-marker red-clr"></i>
                                                                            <strong>Address :</strong>
                                                                            <span>2nd Street, East-West Mansion Flat A2 231 Newyork NY 10003</span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-phone red-clr"></i>
                                                                            <strong>Call us & Hire us</strong>
                                                                            <span>+32 (0) 598 65 8968</span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-envelope-o red-clr"></i>
                                                                            <strong>Have any questions?</strong>
                                                                            <span>Support@webinane.com</span>
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-fax red-clr"></i>
                                                                            <strong>Fax</strong>
                                                                            <span>+652 235 89658965</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="tab1-6">
                                                                <div class="container">
                                                                    <?php
                                                                    $sql = "SELECT * FROM DeliveryInfo ORDER BY date";
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
                                                                                            <h3><?php echo $row['userID']; ?> odered <?php echo $row['food']; ?> at <?php echo $row['date']; ?></h3>
                                                                                        </div>
                                                                                    </form>
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                </div>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-lg-4">
                                            <div class="order-wrapper right wow fadeIn" data-wow-delay="0.2s">
                                                <div class="order-inner gradient-brd">
                                                    <h4 itemprop="headline">Your Order</h4>
                                                    <div class="order-list-wrapper">
                                                        <ul class="order-list-inner">
                                                            <?php
                                                            $subtotal = 0;
                                                            $deliveryfee = 0;
                                                            $tax = 0;
                                                            if (!empty($_SESSION["shopping_cart"])) {
                                                                $subtotal = 0;
                                                                $counter = 1;
                                                                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                                            ?>
                                                                    <li>
                                                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                                            <!-- <form method="post" action="restaurant-detail.php?action=update&id=1"> -->
                                                                            <div class="dish-name">
                                                                                <i><?php echo $counter;
                                                                                    $counter++ ?>.</i>
                                                                                <h6 itemprop="headline"><?php echo $values["item_name"]; ?></h6>
                                                                                <span class="price">$<?php echo $values["item_price"]; ?> x <?php echo $values["item_quantity"]; ?></span>
                                                                                <select name="new_quantity" class="form-control input-sm">
                                                                                    <option selected="selected">
                                                                                        <?php echo $values["item_quantity"]; ?>
                                                                                    </option>
                                                                                    <?php
                                                                                    for ($i = 1; $i <= 100; $i++) {
                                                                                    ?>
                                                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                                <input type="hidden" name="id2" value="<?php echo $values["item_id"]; ?>" />
                                                                            </div>
                                                                            <!-- <div class="dish-ingredients">
                                                                                    <span class="check-box"><input type="checkbox" id="checkbox1-1"><label for="checkbox1-1"><span>Drink</span> <i>$12</i></label></span>
                                                                                    <span class="check-box"><input type="checkbox" id="checkbox1-2"><label for="checkbox1-2"><span>Butter</span> <i>$12</i></label></span>
                                                                                </div> -->
                                                                            <!-- <div class="mor-ingredients"> -->
                                                                            <!-- <input type="submit" name="update" style="margin-top:5px;" class="btn btn-danger" value="Add to Cart" /> -->

                                                                            <input class="btn btn-default" style="float:left" type="submit" name="update" value="Update" />
                                                                            <a class="btn btn-default" role="button" style="float:right" href="<?php echo $_SERVER['PHP_SELF']; ?>?operation=delete&id=<?php echo $values["item_id"]; ?>">Remove</a>
                                                                            <!-- </div> -->
                                                                        </form>
                                                                    </li>
                                                            <?php
                                                                    $subtotal = $subtotal + ($values["item_quantity"] * $values["item_price"]);
                                                                    $deliveryfee = $values["item_quantity"] * 20;
                                                                    $tax = $subtotal * 0.07;
                                                                }
                                                            }
                                                            ?>


                                                        </ul>
                                                        <ul class="order-total">
                                                            <li><span>SubTotal</span> <i>$<?php echo $subtotal ?></i></li>
                                                            <li><span>Delivery fee</span> <i>$<?php echo $deliveryfee ?></i></li>
                                                            <li><span>Tax (7%)</span> <i>$<?php echo $tax ?></i></li>
                                                        </ul>
                                                        <ul class="order-method brd-rd2 red-bg">
                                                            <li><span>Total</span> <span class="price">$<?php echo $subtotal + $deliveryfee + $tax ?></span></li>
                                                            <li><span class="radio-box cash-popup-btn"><input type="radio" name="method" id="pay1-1"><label for="pay1-1"><i class="fa fa-money"></i> Pay</label></span> <span class="radio-box card-popup-btn"><input type="radio" name="method" id="pay1-2"><label for="pay1-2"><i class="fa fa-credit-card-alt"></i> Register</label></span></li>
                                                        </ul>
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
        </footer><!-- footer -->
        <div class="bottom-bar dark-bg text-center">
            <div class="container">
                <p itemprop="description"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
            </div>
        </div><!-- Bottom Bar -->

        <div class="payment-popup-wrapper cash-method text-center">
            <div class="payment-popup-inner" style="background-image: url(assets/images/payment-popup-bg.jpg);">
                <a class="payment-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                <h4 class="payment-popup-title" itemprop="headline"><i class="fa fa-money red-clr"></i> Cash Payment</h4>
                <form class="payment-popup-info-inner" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="payment-popup-info">
                        <h5 itemprop="headline">Payment Details</h5>
                        <p>*Please register first if you haven't register</p>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <ul class="payment-info-list">
                                    <input type="hidden" name="cmd" value="add" />
                                    <table>
                                        <tr>
                                            <th>User ID: </th>
                                            <td><input type="text" name="userID"></td>
                                        </tr>
                                        <tr hidden>
                                            <th>Total: </th>
                                            <td><input type="number" name="total" value="<?php echo $subtotal + $deliveryfee + $tax ?>"></td>
                                        </tr>
                                    </table>
                                    <h5 itemprop="headline">Payment Method</h5>
                                    <ul class="payment-method">
                                        <li>
                                            <div class="radio-box">
                                                <input type="radio" name="payment" id="mthd2-1" value="Cash">
                                                <label for="mthd2-1">Cash</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="radio-box">
                                                <input type="radio" name="payment" id="mthd2-2" value="Credit Card">
                                                <label for="mthd2-2">Credit Card</label>
                                            </div>
                                        </li>
                                    </ul>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <label>Order Note<sup>*</sup></label>
                                <textarea class="brd-rd3" placeholder="Description..." name="note"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="confrm-order red-bg">
                        <ul class="order-total">
                            <li><span>Total</span><i>$<?php echo $subtotal + $deliveryfee + $tax ?></i></li>
                            <li><span>SubTotal</span> <i>$<?php echo $subtotal ?></i></li>
                            <li><span>Delivery fee</span> <i>$<?php echo $deliveryfee ?></i></li>
                            <li><span>Tax (7%)</span> <i>$<?php echo $tax ?></i></li>
                        </ul>
                        <div class="confrm-order-btn">
                            <input type="submit" class="custom" value="CONFIRM ORDER" />
                            <!-- <a class="brd-rd3" href="#" title="" itemprop="url">CONFIRM ORDER</a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="payment-popup-wrapper card-method text-center">
            <div class="payment-popup-inner" style="background-image: url(assets/images/payment-popup-bg.jpg);">
                <a class="payment-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                <h4 class="payment-popup-title" itemprop="headline"><i class="fa fa-money red-clr"></i> Register</h4>
                <div class="payment-popup-info">
                    <h5 itemprop="headline">UserInfo</h5>
                    <form class="payment-popup-info-inner" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <ul class="payment-info-list">
                                    <input type="hidden" name="adduser" value="adduser" />
                                    <table>
                                        <tr>
                                            <th>User ID: </th>
                                            <td><input type="text" name="userID"></td>
                                        </tr>
                                        <tr>
                                            <th>Name: </th>
                                            <td><input type="text" name="name"></td>
                                        </tr>
                                        <tr>
                                            <th>Phone: </th>
                                            <td><input type="text" name="phone"></td>
                                        </tr>
                                        <tr>
                                            <th>Email: </th>
                                            <td><input type="text" name="email"></td>
                                        </tr>
                                    </table>
                                </ul>

                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <label>Address <sup>*</sup></label>
                                <textarea class="brd-rd3" placeholder="Address..." name="address"></textarea>
                            </div>
                        </div>
                        <input type="submit" value="Register" />
                    </form>
                </div>
            </div>
        </div>

        <div class="payment-popup-wrapper thanks-message text-center">
            <div class="payment-popup-inner red-bg">
                <a class="thanks-close" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                <i><img src="assets/images/tick-icon.png" alt="tick-icon.png" itemprop="image"></i>
                <h3 itemprop="headline">Thanks For Your Order</h3>
                <p itemprop="description">You Will Receive an email Confirmation Shortly at <a href="#" title="" itemprop="url">info@domain.com</a></p>
                <img class="thanks-message-mockup right" src="assets/images/resource/thanks-message-mockup.png" alt="thanks-message-mockup.png" itemprop="image">
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