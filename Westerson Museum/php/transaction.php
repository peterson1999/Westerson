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
        $sql = "INSERT INTO orderdetails (OrderID, DatePurchased, TotalPrice) 
                VALUES ('$id', '$date', $totalPrice)";
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

        //store billing details for pdf receipt
        $_SESSION['fName']    = $_POST['fName'];
        $_SESSION['lName']    = $_POST['lName'];
        $_SESSION['comName']  = $_POST['comName'];
        $_SESSION['country']  = $_POST['country'];
        $_SESSION['addressL1']= $_POST['addressLine1'];
        $_SESSION['addressL2']= $_POST['addressLine2'];
        $_SESSION['zip']      = $_POST['zip'];
        $_SESSION['town']     = $_POST['town'];
        $_SESSION['email']    = $_POST['email'];
        $_SESSION['phone']    = $_POST['phone'];

        header("Location: after-checkout.php");
        exit();
    }
?>