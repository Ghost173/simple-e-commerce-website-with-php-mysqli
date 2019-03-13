<?php
//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(-1);
session_start();
include "db.php";
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}


// brand
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='selectbrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}
// pagenation
// if(isset($_POST["page"])){
//     $sql = "SELECT * FROM products";
//     $run_query = mysqli_query($con,$sql);
//     $count = mysqli_num_rows($run_query);
//     //echo $count ;
//      $pageno = ceil($count / 9);
//      for ($i=1; $i<=$pageno;$i++) {
//         echo " <li><a href='#' page='$i' id='page'>1</a></li>";
//      }
//     }
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
    $pageno = ceil($count/9);
    
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
// get_product ORDER BY RAND ()
if(isset($_POST["getproduct"])) {
    $limit = 9;
    if(isset($_POST["setpage"])) {
       $pageno = $_POST["pageno"];
       $start  = ($pageno * $limit) - $limit ;
    }else { $start = 0;}

    $product_query = "SELECT * FROM products  LIMIT $start,$limit";
    $run_query = mysqli_query($con,$product_query);

    if(mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
            $pro_image = $row['product_image'];
            echo "
            <div class='col-md-4'>
                    <div class='panel panel-info'>
                        <div class='panel-heading'>$pro_title</div>
                        <div class='panel-body'> <img src='product_images/$pro_image' style='width:160px; height:250px;/></div>
                        <div class='panel-heading'>$.$pro_price.00
                        <button pid='$pro_id' id='product' style='float:right;' class='btn btn-danger btn-xs'>AddToCart</button>
                    </div>
                    </div>
                    </div>
            
            ";
        }
    }
}


//

if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectbrand"])  || isset($_POST["search"])){
    
    if(isset($_POST["get_seleted_Category"])){
        $id = $_POST["cat_id"];
        $sql = "SELECT * from products WHERE product_cat = '$id'";

    }else if(isset($_POST["selectbrand"])){
        $id = $_POST["brand_id"];
        $sql = "SELECT * from products WHERE product_brand = '$id'";
    } else {
        $keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
    }

   
    $run_query = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($run_query)){
            $pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
            $pro_image = $row['product_image'];
            echo "
            <div class='col-md-4'>
                    <div class='panel panel-info'>
                        <div class='panel-heading'>$pro_title</div>
                        <div class='panel-body'> <img src='product_images/$pro_image' style='width:160px; height:250px;/></div>
                        <div class='panel-heading'>$.$pro_price.00
                        <button pid='$pro_id' id='product' style='float:right;' class='btn btn-danger btn-xs'>AddToCart</button>
                    </div>
                    </div>
                    </div>
            
            ";
    }
}

if(isset($_POST["addProduct"])){
    if (isset($_SESSION["uid"])) {
        $p_id = $_POST["proId"];
        $user_id = $_SESSION["uid"];
        $sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id' ";
        $run_query = mysqli_query($con,$sql);
        $count = mysqli_num_rows($run_query);
        if ($count   > 0) {
            echo "product is a;ready added";
        }else {
            $sql = "SELECT * FROM products WHERE product_id='$p_id'";
            $run_query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($run_query);
        
            $id=  $row["product_id"];
            $pro_name=$row["product_title"];
            $pro_image=$row["product_image"];
            $pro_price=$row["product_price"];
            
        $sql="INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`, `product_title`, `product_image`, `price`, `total_amt`) 
        VALUES (NULL, '$p_id', '0', '$user_id', '1', '$pro_name', '$pro_image', '$pro_price', '$pro_price');";
        
        if(mysqli_query($con,$sql)) {
            echo "
            <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Product added to cert :)</b>
            </div>
            ";
        }
        }

    }else {
       echo "
       <div class='alert alert-danger'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <b>please SIGN in or register to add to cart</b>
       </div>   
       ";
    }

}


//cart product from data base
if (isset($_POST["get_cart_product"]) || isset($_POST["car_checkout"])){
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE user_id='$uid'";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    if ($count > 0 ) {
        $no =1;
        $total_amt =0;
        while ($row = mysqli_fetch_array($run_query)) {
            $id = $row["id"];
            $pro_id =$row["p_id"];
            $pro_name=$row["product_title"]; 
            $pro_image=$row["product_image"];
            $pro_price=$row["price"];
            $qty = $row["qty"];
            $total = $row["total_amt"];
            $price_array = array($total);
            $total_sum = array_sum($price_array);
            $total_amt = $total_amt +$total_sum ;

            if (isset($_POST["get_cart_product"])) {
                echo "
                <div class='row'>
                    <div class='col-md-3'>$no</div>
                    <div class='col-md-3'><img src='product_images/$pro_image' width='60px' height='50px'></div>
                    <div class='col-md-3'>$pro_name</div>
                    <div class='col-md-3'>$$pro_price.00</div>
                </div>
                
                ";
                $no = $no + 1 ;
            }else {
                echo "
                <div class='row'> 
                    <div class='col-md-2'>
                    <div class='btn-group'>
                       <a href='#' remove_id='$pro_id' class='btn btn-danger remove'><i class='fa fa-trash' aria-hidden='true'></i></a> 
                       <a href='#' update_id='$pro_id' class='btn btn-primary update'><i class='far fa-edit'></i></i></a> 
                    </div>
                    </div>
                    <div class='col-md-2'><img src='product_images/$pro_image' width='60px' height='50px'></div>
                    <div class='col-md-2'>$pro_name</div>
                    <div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled ></div>
                    <div class='col-md-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty'  ></div>
                    <div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled ></div>
                    </div>
                
                ";
            }

          
        }
if (isset($_POST["car_checkout"])) {
            echo "
            <div class='row'>
            <div class='col-md-8'></div>
            <div class='col-md-4'>
            <b>Total:$total_amt</b>
            </div>
        </div>";
        }
        echo '
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="business" value="jpshadow007@gmail.com">
            <input type="hidden" name="upload" value="1">';

            $x=0;
            $uid =$_SESSION["uid"];
            $sql = "SELECT * FROM cart WHERE user_id='$uid'";
            $run_query = mysqli_query($con,$sql);
            

            while($row=mysqli_fetch_array($run_query)) {
                $x++;
                echo'
            
            <input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
            <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
            <input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
            <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">
            
            ';
            
            }

        echo '    
            <input type="hidden" name="return" value="http://127.0.0.1/onlinestore/payment_success.php">
            <input type="hidden" name="cancel_return" value="http://127.0.0.1/onlinestore/cancel.php">
            <input type="hidden" name="currency_code" value="USD"/>
            <input type="hidden" name="custom" value="'.$uid.'"/>
            <input style="float:right;margin-top:10px;" type="image" name="submit"
            src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png"
              alt="PayPal - The safer, easier way to pay online">
          </form>
        ';
    }
}
// cart count 
if (isset($_POST["cart_count"])) {
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE user_id='$uid'";
    $run_query = mysqli_query($con,$sql);
    echo mysqli_num_rows($run_query);
}
//cart delete
if(isset($_POST["removefromcart"])) {
$pid = $_POST["removeid"];
$uid = $_SESSION["uid"];
$sql = "DELETE FROM cart WHERE user_id = '$uid' AND p_id ='$pid' ";
$run_quey = mysqli_query($con,$sql);
if($run_quey) {
    echo "
    <div class='alert alert-primary'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>iteam remove from cart</b>
    </div>
    ";
}
}

//update cart qty
if (isset($_POST["updatproduct"])){
    $uid = $_SESSION["uid"];
    $pid = $_POST["updateid"];
    $qty = $_POST["qty"];
    $price = $_POST["price"];
    $total = $_POST["total"];

    $sql = "UPDATE cart SET qty = '$qty',price='$price', total_amt='$total' 
    WHERE user_id = '$uid' AND p_id='$pid'";
    
    $run_query = mysqli_query($con,$sql);

    if ($run_query) {
        echo "
        <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>iteam update success</b>
        </div>  
        ";
    }
}

//pagenination


?>