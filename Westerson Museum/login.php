<?php
    include_once 'php/cartItem.php';
    session_start();
    include 'php/cart.php';
    include 'php/checkLogin.php';
    if (isset($_SESSION['user'])){
        if (isset($_SESSION['current-page-url'])){
            header("Location: ".$_SESSION['current-page-url']);
            exit();
        }
        else{
            header("Location: index.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Westerson Museum">
    <meta name="keywords" content="Westerson, museum, creative, art">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Westerson Museum</title>

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
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        hello.colorlib@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div>
                </div>
                <div class="ht-right">
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                        </select>
                    </div>
                </div>
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
                        <li><a href="./about.php">About Us</a></li>
                        <li><a href="./contact.php">Contact</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./about.php">About Us</a></li>
                                <li><a href="./shopping-cart.php">Shopping Cart</a></li>
                                <li><a href="./checkout.php">Checkout</a></li>
                                <li><a href="./register.php">Register</a></li>
                                <li class="active"><a href="./login.php">Login</a></li>
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
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <?php
                            if(isset($display)){
                                echo $display;
                            }
                        ?>
                        <form method="POST">
                            <div class="group-input">
                                <label for="username">Username or email address *</label>
                                <input type="text" id="username" name="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="password">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn" name="btnLogin">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="./register.php" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

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