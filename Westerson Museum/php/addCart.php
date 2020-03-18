<?php
    $con = mysqli_connect("localhost", "root", "", "westerson_museum") or die(mysqli_connect_error());
    $displayPhoto = "";
    $piece_number = "";

    if (isset($_GET['piece_number'])){
        $piece_number = $_GET['piece_number'];
    }
    else{
        $piece_number = 1;
    }

    $sql = "select * from artpiece where PieceNumber='$piece_number'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);
    
    $displayPhoto.= base64_encode($row['Image']);

    if (isset($_POST['btnAddCart'])){
        $cartQty = $_POST['cartQty'];
        $cartID = 0;
        
        if (isset($_SESSION['cart']))
            $cartID = count($_SESSION['cart']);
        $_SESSION['cart'][]=array(
            $cartID => array(
                'id' => $row['PieceNumber'],
                'photo' => $displayPhoto,
                'price' => $row['Price'],
                'qty' => $cartQty,
                'name' => $row['Name']
            )
        );
        
    }
    
?>