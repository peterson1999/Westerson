<?php
    $con = mysqli_connect("localhost", "root", "", "westerson_museum") or die(mysqli_connect_error());
    $displayOrder="";
    
    if (isset($_SESSION['email'])){
        $displayEmail=$_SESSION['email'];
    }
    
    if (isset($_SESSION['orderID'])){
        $orderID = $_SESSION['orderID'];
        $sql = "SELECT * FROM orderdetails as o JOIN transaction as t ON o.OrderID=t.OrderID WHERE o.OrderID='$orderID'";
        $res = mysqli_query($con, $sql);
        if (!$res) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $total = 0.0;
        while($row = mysqli_fetch_array($res)){
            $pieceNo = $row['PieceNumber'];
            //search each piece in transaction, get name and price
            $sqlSearchPiece = "SELECT Name, Price FROM artpiece WHERE PieceNumber='$pieceNo'";
            $resultPiece = mysqli_query($con, $sqlSearchPiece);
            $rowPiece = mysqli_fetch_array($resultPiece);

            $displayOrder.='<li class="fw-normal">'.$rowPiece["Name"].' x '.$row["Qty"].' <span>'.'$'.number_format($rowPiece["Price"]*$row["Qty"], 2).'</span></li>';
            $total += $rowPiece["Price"] * $row["Qty"];
        }
        $totalPrice = $total + 50 + ($total * 0.03);
        foreach($_SESSION as $key => $val){
            if ($key !== 'user' || $key !== 'orderID'){
                unset($_SESSION[$key]);
            }
        }
    }
?>