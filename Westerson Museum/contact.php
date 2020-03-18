<?php
    include_once 'php/cartItem.php';
    session_start();
    include 'php/cart.php';
    include 'php/headerDisplay.php';
    $_SESSION['current-page-url'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <?php
                    if (isset($display)){
                        echo $display;
                    }
                ?>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <form action="#" class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon"
                                <?php
                                    if (!isset($_SESSION['user'])){
                                        echo 'style="display:none"';
                                    }
                                ?>>
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span><?php
                                        if (isset($_SESSION['cart']))
                                            echo count($_SESSION['cart']);
                                        else   
                                            echo 0;
                                    ?></span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <?php
                                                    if (isset($displayCart)){
                                                        echo $displayCart;
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5><?php
                                            if (isset($total) and $total>0){
                                                echo "\$", number_format($total, 2);
                                            }
                                            else{
                                                echo "-";
                                            }
                                        ?></h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="checkout.php" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All Artpieces</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Paintings</a></li>
                            <li><a href="#">Sculptures</a></li>
                            <li><a href="#">Ceramics</a></li>
                            <li><a href="#">Mosaic
                            </a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="./index.php">Home</a></li>
                        <li><a href="./shop.php">Buy</a></li>
                        <li><a href="#">Sell</a>

                        </li>
                        <li><a href="./about.php">About Us</a></li>
                        <li><a href="./contact.php">Contact</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./about.php">About Us</a></li>
                                <li><a href="./shopping-cart.php">Shopping Cart</a></li>
                                <li><a href="./checkout.php">Checkout</a></li>
                                <li><a href="./register.php">Register</a></li>
                                <li><a href="./login.php">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Map Section Begin -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe
                    src="https://maps.google.com/maps?q=cebu%20institute%20of%20technology&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    height="610" style="border:0" allowfullscreen="">
                </iframe>
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contacts Us</h4>
                        <p>Contrary to popular belief, Lorem Ipsum is simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, maki years old.</p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Address:</span>
                                <p>60-49 Road 11378 New York</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p>+65 11.188.888</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>hellocolorlib@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <p>Our staff will call back later and answer your questions.</p>
                            <form action="#" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Your name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Your email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Your message"></textarea>
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="index.php"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Natalio B. Bacalso Ave, Cebu City, 6000 Cebu</li>
                            <li>Phone: (032) 261 7741</li>
                            <li>Email: westerson.museum@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-3">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="checkout.php">Checkout</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="faq.php">Frequently Asked Questions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="shopping-cart.php">Shopping Cart</a></li>
                            <li><a href="shop.php">Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Westerson Museum and National Treasury of Art. All rights reserved. 
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>