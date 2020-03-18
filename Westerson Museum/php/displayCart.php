<?php  
    $con = mysqli_connect("localhost", "root", "", "westerson_museum") or die(mysqli_connect_error());
    $displayCart ='';

    $total=0.0;
    if (isset($_SESSION['cart']) and !empty($_SESSION['cart'])){
        $i=0;
        echo $i;
        foreach($_SESSION['cart'] as $cart){
            
            $displayCart.=' 
                                <tr>
                                    <td class="si-pic"><img src="data:image/jpeg;base64,'.$cart[$i]['photo'].'" alt=""></td>
                                    <td class="si-text">
                                        <div class="product-selected">
                                            <p>$'.$cart[$i]['price'].' x '.$cart[$i]['qty'].'</p>
                                            <h6>'.$cart[$i]['name'].'</h6>
                                        </div>
                                    </td>
                                    <td class="si-close">
                                    <form method="GET">
                                        <button type="submit" name="removeItem" value='.$i.' style="background:none;border:none">
                                        <i class="ti-close"></i>
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                            ';
            $total+=$cart[$i]['price'] * $cart[$i]['qty'];
            $i++;
        }
    }
    else{
        // if (isset($_SESSION['cart']))
        //     echo "Hello";
        // if (empty($_SESSION['cart']))
        //     echo count($_SESSION['cart']);
        echo "nothing";
        $displayCart.='<tr><td>No items in your cart.</td></tr>';
    }

    
    if (isset($_GET['removeItem'])){
        // $id = $_GET['removeItem'];
        // echo $id;
        // if (!empty($_SESSION['cart'])){
        //     unset($_SESSION['cart'][$id]);
        // }
        // else
        //     $_SESSION['cart']=null;
        session_destroy();
    }
?>