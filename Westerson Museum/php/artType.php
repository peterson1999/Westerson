<?php
    $con = mysqli_connect("localhost", "root", "", "westerson_museum") or die(mysqli_connect_error());
    $display = "";

    
    if(isset($_GET['category'])){
        $category= $_GET['category']; 
    $sql = "SELECT * FROM artpiece WHERE TypeofArt = '$category' ";
    $result = mysqli_query($con,$sql);

   
    while($row = mysqli_fetch_array($result)){
            $display.='                         <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="data:image/jpeg;base64,'.base64_encode( $row['6'] ).'" alt="">
                    <div class="sale pp-sale">Sale</div>
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="product.php?piece_number='.$row[0].'">+ Quick View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">'.$row[2].'</div>
                    <a href="#">
                        <h5>'.$row[1].'</h5>
                    </a>
                    <div class="product-price">
                        $14.00
                        <span>$'.$row[5].'</span>
                    </div>
                </div>
            </div>
        </div>';
        

    }
    $displaycat ="";
    if ($category == "paintings"){
        $displaycat.=            '            <li class="active"><a href = "shop.php?category=paintings">Paintings</a></li>
        <li><a href="shop.php?category=sculptures">Sculptures</a></li>
        <li><a href="shop.php?category=ceramics">Ceramics</a></li>
        <li><a href="shop.php?category=mosaic">Mosaic
        </a></li>';
    }
    else if ($category == "sculptures"){
        $displaycat.=            '            <li><a href = "shop.php?category=paintings">Paintings</a></li>
        <li  class="active"><a href="shop.php?category=sculptures">Sculptures</a></li>
        <li><a href="shop.php?category=ceramics">Ceramics</a></li>
        <li><a href="shop.php?category=mosaic">Mosaic
        </a></li>';
    }
    else if ($category == "ceramics"){
        $displaycat.=            '            <li ><a href = "shop.php?category=paintings">Paintings</a></li>
        <li><a href="shop.php?category=sculptures">Sculptures</a></li>
        <li class="active"><a href="shop.php?category=ceramics">Ceramics</a></li>
        <li><a href="shop.php?category=mosaic">Mosaic
        </a></li>';
    }
    else if ($category == "mosaic"){
        $displaycat.=            '            <li><a href = "shop.php?category=paintings">Paintings</a></li>
        <li><a href="shop.php?category=sculptures">Sculptures</a></li>
        <li><a href="shop.php?category=ceramics">Ceramics</a></li>
        <li class="active"><a href="shop.php?category=mosaic">Mosaic
        </a></li>';
    }
}

else{
    $sql = "SELECT * FROM artpiece";
    $result = mysqli_query($con,$sql);

   
    while($row = mysqli_fetch_array($result)){
            $display.='                         <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="data:image/jpeg;base64,'.base64_encode( $row['6'] ).'" alt="">
                    <div class="sale pp-sale">Sale</div>
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="product.php?piece_number='.$row[0].'">+ Quick View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">'.$row[2].'</div>
                    <a href="#">
                        <h5>'.$row[1].'</h5>
                    </a>
                    <div class="product-price">
                        $14.00
                        <span>$'.$row[5].'</span>
                    </div>
                </div>
            </div>
        </div>';
        

    }
    $displaycat ="";
        $displaycat.=            '            <li><a href = "shop.php?category=paintings">Paintings</a></li>
        <li><a href="shop.php?category=sculptures">Sculptures</a></li>
        <li><a href="shop.php?category=ceramics">Ceramics</a></li>
        <li><a href="shop.php?category=mosaic">Mosaic
        </a></li>';
    
}
  

?>