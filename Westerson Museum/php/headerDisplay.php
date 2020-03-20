<?php
    $con = mysqli_connect("localhost", "root", "", "westerson_museum") or die(mysqli_connect_error());
    $display="";
    if (isset($_SESSION['user'])){
        $name = $_SESSION['user'];
        if (strlen($name)>10){
            $name = substr($name, 0, 6);
            $name.="...";
        }
        $display.=' <div class="row">
                        <div class="ht-left d-md-none d-lg-block col-lg-5">
                            <div class="mail-service">
                                <i class=" fa fa-envelope"></i>
                                hello.colorlib@gmail.com
                            </div>
                            <div class="phone-service">
                                <i class=" fa fa-phone"></i>
                                +65 11.188.888
                            </div>
                        </div>
                        <div class="col-4 col-md-6 col-lg-2"></div>
                        <div class="ht-right col-4 col-lg-3 pt-1 pt-lg-0">
                            <div class="lan-selector">
                                <select class="language_drop" name="countries" id="countries" style="width:300px;">
                                    <option value="yt" data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                        data-title="English">English</option>
                                </select>
                            </div>
                        </div>
                        <div class="btn-group py-2 col-4 col-md-2 col-lg-2">
                            <button type="button" class="btn btn-dark"><i class="fa fa-user"></i> '.$name.'</button>
                            <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">My Profile</a>
                                <a class="dropdown-item" href="shopping-cart.php">Your Cart</a>
                                <div class="dropdown-divider"></div>
                                <form method = "POST">
                                <button type="submit" class="dropdown-item" href="index.php" name="btnLogout">Log Out</button>
                                </form>
                            </div>
                        </div>
                    </div>';
    }
    else{
        $display.=' <div class="ht-left">
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
                        <a href="login.php" class="login-panel"><i class="fa fa-user"></i>Login</a>
                        <div class="lan-selector">
                            <select class="language_drop" name="countries" id="countries" style="width:300px;">
                                <option value="yt" data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                    data-title="English">English</option>
                            </select>
                        </div>
                    </div>';
    }
    if (isset($_POST['btnLogout'])){
        $_SESSION['user']=null;
        foreach($_SESSION as $key => $val){
            unset($_SESSION[$key]);
        }
        header("Location: ".$_SERVER['REQUEST_URI']);
    }
    if (isset($_SESSION['checkout-finished']) and $_SESSION['checkout-finished']==true){
        foreach($_SESSION as $key => $val){
            if ($key !== 'user'){
                unset($_SESSION[$key]);
            }
        }
    }
?>