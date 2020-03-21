<?php
    require 'FPDF/fpdf17/fpdf.php';
    session_start();
    $con = mysqli_connect("localhost", "root", "", "westerson_museum") or die(mysqli_connect_error());
    
    if (isset($_SESSION['orderID'])){
        $orderID = $_SESSION['orderID'];
        $sql = "SELECT * FROM orderdetails as o JOIN transaction as t ON o.OrderID=t.OrderID WHERE o.OrderID='$orderID'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);
        
        //A4 width : 219mm
        //default margin : 10mm each side
        //writable horizontal : 219-(10*2)=189mm
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();

        //set font to arial, bold, 14pt
        $pdf->SetFont('Arial','B',14);

        //Cell(width , height , text , border , end line , [align] )
        $logo = '../img/Logo.jpg';
        $pdf->Cell(10	,10,$pdf->Image($logo, $pdf->GetX(), $pdf->GetY(),10), 0, 0, 'L', false );
        $pdf->Cell(105	,10,'Westerson Museum',0,0);
        $pdf->Cell(74	,10,'INVOICE',0,1);//end of line

        //set font to arial, regular, 12pt
        $pdf->SetFont('Arial','',12);

        $pdf->Cell(115	,5,'N.Bacalso Ave. Cebu City',0,0);
        $pdf->Cell(74	,5,'',0,1);//end of line
        $pdf->Cell(115	,5,'Cebu, Philippines, 6000',0,0);
        $pdf->Cell(30	,5,'Date',0,0);
        $pdf->Cell(44	,5,$row['DatePurchased'],0,1);//end of line
        $pdf->Cell(115	,5,'Phone +63 32 146 8888',0,0);
        $pdf->Cell(30	,5,'Invoice #',0,0);
        $pdf->Cell(44	,5,$row['OrderID'],0,1);//end of line
        $pdf->Cell(115	,5,'Fax +63 32 272 1888',0,0);
        $pdf->Cell(30	,5,'Customer ID',0,0);
        $pdf->Cell(44	,5,$row['BuyerID'],0,1);//end of line
        //spacing
        $pdf->Cell(189	,10,'',0,1);//end of line

        //billing address
        $pdf->Cell(100	,5,'Bill to:',0,1);//end of line
        //add dummy cell at beginning of each line for indentation
        $pdf->Cell(10	,5,'',0,0);
        $pdf->Cell(90	,5,$_SESSION['fName']." ".$_SESSION['lName'],0,1);//end of line
        
        if (!empty($_SESSION['comName'])){
            $pdf->Cell(10	,5,'',0,0);
            $pdf->Cell(90	,5,$_SESSION['comName'],0,1);//endl
        }

        $pdf->Cell(10	,5,'',0,0);
        $pdf->Cell(90	,5,$_SESSION['addressL1'],0,1);//endl
        if (!empty($_SESSION['addressL2'])){
            $pdf->Cell(10	,5,'',0,0);
            $pdf->Cell(90	,5,$_SESSION['addressL2'],0,1);//endl
        }

        $pdf->Cell(10	,5,'',0,0);
        $pdf->Cell(90	,5,$_SESSION['country'],0,1);//endl
        
        $pdf->Cell(10	,5,'',0,0);
        $pdf->Cell(90	,5,$_SESSION['phone'],0,1);//endl
        //spacing
        $pdf->Cell(189	,10,'',0,1);//end of line

        //invoice contents
        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(81	,5,'Description',1,0,'C');
        $pdf->Cell(44	,5,'Unit Price',1,0,'C');
        $pdf->Cell(15	,5,'Qty',1,0,'C');
        $pdf->Cell(49	,5,'Amount',1,1,'C');//end of line

        $pdf->SetFont('Arial','',12);
        $subtotal=0.0;
        do{
            $pieceNo = $row['PieceNumber'];
            //search each piece in transaction, get name and price
            $sqlSearchPiece = "SELECT Name, Price FROM artpiece WHERE PieceNumber='$pieceNo'";
            $resultPiece = mysqli_query($con, $sqlSearchPiece);
            $rowPiece = mysqli_fetch_array($resultPiece);

            $amt = number_format($rowPiece["Price"]*$row["Qty"], 2);
            $price = number_format($rowPiece["Price"], 2);
            $pdf->Cell(81	,5,$rowPiece['Name'],1,0,'C');
            $pdf->Cell(44	,5,$price,           1,0,'R');
            $pdf->Cell(15	,5,$row['Qty'],      1,0,'C');
            $pdf->Cell(49	,5,$amt,             1,1,'R');
            
            $subtotal += $rowPiece["Price"] * $row["Qty"];
        } while($row = mysqli_fetch_array($res));
        $totalPrice = $subtotal + 50 + ($subtotal * 0.03);
        
        // summary
        $pdf->Cell(70	,5,'',0,0);
        $pdf->Cell(70	,5,'Subtotal',0,0,'R');
        $pdf->Cell(4	,5,'$',0,0);
        $pdf->Cell(45	,5,number_format($subtotal,2),0,1,'R');//endl

        $pdf->Cell(70	,5,'',0,0);
        $pdf->Cell(70	,5,'Shipment Fee',0,0,'R');
        $pdf->Cell(4	,5,'$',0,0);
        $pdf->Cell(45	,5,number_format(50,2),0,1,'R');//endl

        $pdf->Cell(70	,5,'',0,0);
        $pdf->Cell(70	,5,'Web Services/Commission (3%)',0,0,'R');
        $pdf->Cell(4	,5,'$',0,0);
        $pdf->Cell(45	,5,number_format($subtotal*0.03,2),0,1,'R');//endl
        
        $pdf->Cell(140	,5,'',0,0);
        $pdf->Cell(49   ,5,'____________________',0,1);//endl

        $pdf->Cell(70	,5,'',0,0);
        $pdf->Cell(70	,5,'Total Due',0,0,'R');
        $pdf->Cell(4	,5,'$',0,0);
        $pdf->Cell(45	,5,number_format($totalPrice,2),0,1,'R');//endl

        $pdf->Output('OrderInvoice.pdf', 'I');

    }
    
?>