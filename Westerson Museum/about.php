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
    <meta name="description" content="Westerson Museum">
    <meta name="keywords" content="Westerson, museum, creative, art">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us | Westerson Museum</title>

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
    <link rel="stylesheet" href="css/correction.css" type="text/css">
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
            <div class="inner-header py-2">
                <div class="row m-0">
                    <div class="col-12 col-lg-4 col-md-5">
                        <div class="logo">
                            <a href="./index.php" class=" text-dark" style="font-size:20px">
                                <img style="max-height: 61px;"src="img/Logo.jpg" alt="">
                                Westerson Museum
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-5 pt-3">
                        <div class="advanced-search">
                            <div class="input-group searchBar">
                                <form method="POST" class="w-100">
                                    <div class="container h-100">
                                        <div class="row h-100">
                                            <div class="col-10">
                                                <input type="text" placeholder="What do you need?" name="searchBar">
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" style="height: 100%" name="btnSearch"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 text-right col-md-2 pt-3">
                        <ul class="nav-right">
                            <li class="cart-icon" 
                                <?php
                                    if (!isset($_SESSION['user'])){
                                        echo 'style="display:none"';
                                    }
                                ?>>
                                <a href="shopping-cart.php">
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
                                        <a href="shopping-cart.php" class="primary-btn view-card">VIEW CART</a>
                                        <?php
                                            if (isset($_SESSION['cart'])){
                                                if(count($_SESSION['cart'])>0)
                                                    echo '<a href="checkout.php" class="primary-btn checkout-btn">CHECK OUT</a>';
                                                else
                                                    echo '<a href="#" class="primary-btn checkout-btn" style="background:#969a9e" disabled>NOTHING TO CHECK OUT</a>';
                                            }
                                            else
                                                echo '<a href="#" class="primary-btn checkout-btn" style="background:#969a9e" disabled>NOTHING TO CHECK OUT</a>';
                                            
                                        ?>
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
                        <li><a href = "shop.php?category=paintings">Paintings</a></li>
                        <li><a href="shop.php?category=sculptures">Sculptures</a></li>
                        <li><a href="shop.php?category=ceramics">Ceramics</a></li>
                        <li><a href="shop.php?category=mosaic">Mosaic</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./shop.php">Buy</a></li>
                        <li class="active"><a href="./about.php">About Us</a></li>
                        <li><a href="./contact.php">Contact</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li class="active"><a href="./about.php">About Us</a></li>
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

    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title" id= "mission">
                            <h2>Our Mission</h2>
                            <p>Established <span>- May 19, 1909</span></p>
                        </div>
                        <div class="blog-large-pic">
                            <img src="img/blog/museum.jpg" alt="">
                        </div>
                        <div class="blog-detail-desc">
                            <p>The Westerson Museum is an umbrella government organization that oversees a number of national museums in the Philippines including ethnographic, anthropological, archaeological and visual arts collections.</p>
                        </div>
                        <div class="blog-quote">
                            <p>“ Technology is nothing. What's important is that you have a faith in people, that
                                they're basically good and smart, and if you give them tools, they'll do wonderful
                                things with them.” <span>- Steven Jobs</span></p>
                        </div>
                        <div class="blog-more">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="img/blog/interior.jpg" alt="">
                                </div>
                                <div class="col-sm-4">
                                    <img src="img/blog/cer.jpg" alt="">
                                </div>
                                <div class="col-sm-4">
                                    <img src="img/blog/stats.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <p>The Westerson Museum is one of the major museums in the city located within the Bangko Sentral ng Pilipinas Complex along Roxas Boulevard in the Malate district of Manila, the Philippines.  

<br>
<br>
                    <div class="blog-details-inner">
                        <div class="blog-detail-title" id= "vision">
                            <h2>Our Vision</h2>
                          
                        </div>
                        <div class="blog-large-pic">
                            <img src="img/blog/pic.jpg" alt="">
                        </div>
                        <div class="blog-detail-desc">
                            <p>Realizing the full potential of the arts and the internet -- universal access to research and education, full participation in culture -- to drive a new era of development, growth, and productivity.
                            </p>
                        </div>

                        <p>A vision statement describes where the company aspires to be upon achieving its mission. This statement reveals the "where" of a business. Below are some vision statements from well-known companies to give you a sense of how a vision represents a brand.</p>
       
                    </div>
<br>
<br>
                    <div class="blog-details-inner">
                        <div class="blog-detail-title" id= "service">
                            <h2>Our Service</h2>
                  
                        </div>
                        <div class="blog-large-pic">
                            <img src="img/blog/service.jpg" alt="">
                        </div>
                        <div class="blog-detail-desc">
                            <p>The service encounter is defined as all activities involved in the service delivery process. Some service managers use the term "moment of truth" to indicate that point in a service encounter where interactions are most intense.
<br><br>
Many business theorists view service provision as a performance or act (sometimes humorously referred to as dramalurgy, perhaps in reference to dramaturgy). The location of the service delivery is referred to as the stage and the objects that facilitate the service process are called props. A script is a sequence of behaviors followed by those involved, including the client(s). Some service dramas are tightly scripted, others are more ad lib. Role congruence occurs when each actor follows a script that harmonizes with the roles played by the other actors.
<br><br>
In some service industries, especially health care, dispute resolution and social services, a popular concept is the idea of the caseload, which refers to the total number of patients, clients, litigants, or claimants for which a given employee is responsible. Employees must balance the needs of each individual case against the needs of all other current cases as well as their own needs.
   </p>
                        </div>
                        <div class="blog-quote">
                            <p>“No great artist ever sees things as they really are. The essence of all beautiful art, all great art, is gratitude. If you hear a voice within you say 'you cannot paint,' then by all means paint, and that voice will be silenced.” <span>- Thomas Merton</span></p>
                        </div>

                        <div class="tag-share">
                            <div class="details-tag">
                                <ul>
                                    <li><i class="fa fa-tags"></i></li>
                                    <li>Art</li>
                                    <li>Store</li>
                                    <li>Mission</li>
                                </ul>
                            </div>
                            <div class="blog-share">
                 
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


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