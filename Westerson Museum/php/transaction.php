<?php
    $con = mysqli_connect("localhost", "root", "", "westerson_museum") or die(mysqli_connect_error());
    $cartItems="";
    if (isset($_SESSION['cart'])){
        $total=0.0;
        foreach($_SESSION['cart'] as $cart){
            $cartItems.='<li class="fw-normal">'.$cart->name.' x '.$cart->qty.' <span>'.'$'.number_format($cart->price*$cart->qty, 2).'</span></li>';
            $total+=$cart->price*$cart->qty;
        }
        $_SESSION['total-price'] = $total + 50 + ($total*0.03);
    }
    
    if (isset($_POST['orderCheckout'])){
        $date = date('Y-m-d H:i:s');
        $shortDate = date("d",strtotime($date)).date("m",strtotime($date)).date("Y",strtotime($date));
        $time = date("H",strtotime($date)).date("i",strtotime($date)).date("s",strtotime($date));
        $id = $shortDate.$time; //for orderID, formatted date
        //necessary variables for later
        $user = $_SESSION['user'];
        $code = $_POST['coupon-code'];
        $totalPrice = $_SESSION['total-price'];
        $transactType = $_POST['transact-type'];
        //get buyer
        $sql = "SELECT UserID FROM user WHERE Username='$user'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);
        $buyer = $row[0];
        //orderid = buyerid + datetime format, saved to session for after-checkout.php
        $id = $buyer.$id;
        $_SESSION['orderID'] = $id;
        //add order to orderdetails, this one first since orderID is foreign key in transaction
        $sql = "INSERT INTO orderdetails (OrderID, DatePurchased, VoucherCode, TotalPrice) 
                VALUES ('$id', '$date', '$code', $totalPrice)";
        mysqli_query($con, $sql);
        //add each item in cart to transaction
        foreach($_SESSION['cart'] as $cart){
            $pieceNo = $cart->id;
            $sql = "INSERT INTO transaction (OrderID, Price, Type, Qty, BuyerID, PieceNumber) 
                    VALUES ('$id', $cart->price, '$transactType', $cart->qty, $buyer, $pieceNo)";
            $res = mysqli_query($con, $sql);
        }
        //free session cart
        unset($_SESSION['cart']);
        header("Location: after-checkout.php");
        exit();
    }
?>