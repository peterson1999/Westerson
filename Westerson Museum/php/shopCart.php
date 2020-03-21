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
                                        <td class="close-td first-row">
                                            <button type="button" class="btn bg-transparent" data-toggle="modal" data-target="#modal'.$cart->cartID.'"><i class="ti-close"></i></button>
                                            <div class="modal fade" id="modal'.$cart->cartID.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content" style="text-transform:none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font" id="exampleModalLabel">Are you sure?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to remove '.$cart->name.' from the cart?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="GET">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger" name="removeItem" value='.$cart->cartID.'>Remove</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
                                        <td class="close-td">
                                            <button type="button" class="btn bg-transparent" data-toggle="modal" data-target="#modal'.$cart->cartID.'"><i class="ti-close"></i></button>
                                            <div class="modal fade" id="modal'.$cart->cartID.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content" style="text-transform:none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font" id="exampleModalLabel">Are you sure?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to remove '.$cart->name.' from the cart?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="GET">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger" name="removeItem" value='.$cart->cartID.'>Remove</button>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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