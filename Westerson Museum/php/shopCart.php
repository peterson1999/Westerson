<?php
    $con = mysqli_connect("localhost", "root", "", "westerson_museum") or die(mysqli_connect_error());
    $displayShopCart="";
    if (isset($_SESSION['cart'])){
        $rowCount=0;
        $total=0.0;
        foreach($_SESSION['cart'] as $cart){
            $total += $cart->price * $cart->qty;
            if ($rowCount==0)
                $displayShopCart.= '
                                    <tr id='.$cart->cartID.'>
                                        <td class="cart-pic first-row"><img src="data:image/jpeg;base64,'.$cart->photo.'" alt="" style="width: 170px; height: 170px;"></td>
                                        <td class="cart-title first-row">
                                            <h5>'.$cart->name.'</h5>
                                        </td>
                                        <td class="p-price first-row">'.'$'.number_format($cart->price, 2).'</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" class="changeQty" value="'.$cart->qty.'" id='.$cart->cartID.' name='.$cart->cartID.'>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">'.'$'.number_format($cart->price*$cart->qty, 2).'</td>
                                        <td class="close-td first-row"><i class="ti-close"></i></td>
                                    </tr>
                                    ';
            else
                $displayShopCart.= '
                                    <tr id='.$cart->cartID.'>
                                        <td class="cart-pic"><img src="data:image/jpeg;base64,'.$cart->photo.'" alt="" style="width: 170px; height: 170px;"></td>
                                        <td class="cart-title">
                                            <h5>'.$cart->name.'</h5>
                                        </td>
                                        <td class="p-price">'.'$'.number_format($cart->price, 2).'</td>
                                        <td class="qua-col">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" class="changeQty" value="'.$cart->qty.'" id='.$cart->cartID.' name='.$cart->cartID.'>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price">'.'$'.number_format($cart->price*$cart->qty, 2).'</td>
                                        <td class="close-td"><i class="ti-close"></i></td>
                                    </tr>
                                    ';
            $rowCount++;
        }
    }
    else{
        $displayShopCart.='<tr><td colspan=6>Nothing to show here.</td></tr>';
    }
    if (isset($_POST['cartUpdateBtn'])){
        foreach($_SESSION['cart'] as $cart){
            if (isset($_POST[''.$cart->cartID])){
                $cart->qty = $_POST[''.$cart->cartID];
            }
        }
        header("Location: shopping-cart.php");
        exit();
    }
    if (isset($_POST['toCheckoutBtn'])){
        foreach($_SESSION['cart'] as $cart){
            if (isset($_POST[''.$cart->cartID])){
                $cart->qty = $_POST[''.$cart->cartID];
            }
        }
        header("Location: checkout.php");
        exit();
    }
?>