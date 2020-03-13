<?php
    $con = mysqli_connect("localhost", "root", "", "westerson_museum") or die(mysqli_connect_error());
    $display = "";

    if (isset($_POST['btnRegister'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "select count(*) as count from User where Username = '$user'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        if ($row[0]>0){
            $display.= '<div class="container mb-3">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-12 col-lg-8 py-2 bg-danger text-light text-center rounded">
                                    Username already exists.
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </div>';
        }
        else{
            $fname = $_POST['FName'];
            $lname = $_POST['LName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $mailAdd = $_POST['mailAdd1']."\n".$_POST['mailAdd2'];
            $fullName = $fname." ".$lname;
            
            $sql =  "insert into User(Username, Pass, firstName, lastName) values ('$user', '$pass', 
                    '$fname', '$lname')";
            mysqli_query($con, $sql);

            $sql =  "select UserID from User where Username = '$user'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $id = $row['UserID'];

            $sql =  "insert into Buyer(BuyerID, Name, Phone_number, Email, Mailing_address) 
                    values ($id, '$fullName', '$phone', '$email', '$mailAdd')";
            mysqli_query($con, $sql);

            $sql =  "insert into Seller(SellerID, Name, Phone_number, Email, Mailing_address) 
                    values ($id, '$fullName', '$phone', '$email', '$mailAdd')";
            mysqli_query($con, $sql);
        }
    }
?>