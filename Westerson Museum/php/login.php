<?php
    $con = mysqli_connect("localhost", "root", "", "westerson_museum") or die(mysqli_connect_error());
    $display = "";
    $cssdisp = "";

    if (isset($_POST['btnLogin'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "select *, count(*) as count from User where Username = '$user' and Pass = '$pass'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        if ($row['count']>0){
            $_SESSION['name'] = $row['firstName']." ".$row['lastName'];
            $_SESSION['user'] = $user;
            header("Location: index.html");
        }
        else{
            $sql = "select count(*) as count from User where Username = '$user'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            if ($row[0]>0){
                $display.= '<div class="container">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-12 col-lg-8 bg-danger text-light text-center rounded">
                                        Password incorrect.<br>
                                        Please try again.
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>
                            </div>';
            }
            else{
                $display.= '<div class="container">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-12 col-lg-8 bg-danger text-light text-center rounded">
                                        User does not exist.<br>
                                        Would you like to <a href="register.html">register</a>?
                                    </div>
                                    <div class="col-lg-2"></div>
                                </div>
                            </div>';
            }
        }
    }
    if (isset($_POST['logOut'])){
        $_SESSION['name']=null;
        $_SESSION['user']=null;
        header("Location: index.html");
    }
?>