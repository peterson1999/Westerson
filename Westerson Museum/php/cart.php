<?php
    $con = mysqli_connect("localhost", "root", "", "westerson_museum") or die(mysqli_connect_error());
    $url = "";
    
    $displayCart = ""; //for cart popup
    $total = 0.0;
    $i=0;
    //display cart
    if (isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $cart){
            $displayCart.=' 
                            <tr>
                                <td class="si-pic"><img src="data:image/jpeg;base64,'.$cart->photo.'" alt="" style="width: 70px; height: 70px;"></td>
                                <td class="si-text">
                                    <div class="product-selected">
                                        <p>$'.$cart->price.' x '.$cart->qty.'</p>
                                        <h6>'.$cart->name.'</h6>
                                    </div>
                                </td>
                                <td class="si-close">
                                <form method="GET">
                                    <button type="submit" name="removeItem" value='.$cart->cartID.' style="background:none;border:none">
                                    <i class="ti-close"></i>
                                    </button>
                                </form>
                                </td>
                            </tr>
                        ';
            $total+= ($cart->price * $cart->qty);
            $i++;
        }
    }
    else{
        $displayCart.='<tr><td>No items in your cart.</td></tr>';
    }

    if ($_SERVER['PHP_SELF']=='/product.php'){  //when in products page
        $url = '/product.php?piece_number=';    //for redirect
        
        //gets value of url, for example, "product.php?piece_number=1" -> gets 1
        if (isset($_GET['piece_number'])){
            $piece_number = $_GET['piece_number'];
            $_SESSION['prev_piece_number'] = $piece_number;
        }
        else if (substr($_SERVER['REQUEST_URI'],13,6)=='remove'){   //show previously accessed artpiece if recently removed
            $piece_number = $_SESSION['prev_piece_number'];
        }
        else{   //goes to shop.php if no value in url
            header("Location: shop.php");
            exit();
        }

        $sql = "select * from artpiece where PieceNumber='$piece_number'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);
        
        $displayPhoto = base64_encode($row['Image']);
    }
    else{   //any other page
        $url = $_SERVER['PHP_SELF'];
    }

    //add to cart
    if (isset($_POST['btnAddCart'])){
        $cartQty = $_POST['cartQty'];
        $cartID = 0;
        
        if (!empty($_SESSION['cart'])){
            $cartID = count($_SESSION['cart']);
        }
        $item = new cartItem($row['PieceNumber'], $row['Name'], $row['Price'], $cartQty, $displayPhoto, $cartID);
        $itemArray = array($item);
        
        if(!empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array_merge($_SESSION['cart'],$itemArray);
        } 
        else {
            $_SESSION['cart'] = $itemArray;
        }
        
        header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
    }

    //remove item from cart
    if (isset($_GET['removeItem'])){
        $id = $_GET['removeItem'];
		if(!empty($_SESSION['cart'])) {
			foreach($_SESSION['cart'] as $cart => $cartItem) {
                if($cartItem->cartID == $id){
                    unset($_SESSION['cart'][$cart]);
                    if(empty($_SESSION['cart'])) 
                        unset($_SESSION['cart']);
                    break;
                }
			}
        }
        if ($_SERVER['PHP_SELF']=='/product.php'){
            header('Location:'.$url.$piece_number);
            exit();
        }
        else{
            header('Location:'.$url);
            exit();
        }
    }
?>