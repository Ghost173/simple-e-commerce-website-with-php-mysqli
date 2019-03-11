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


// get_product
if(isset($_POST["getproduct"]) ) {
    $product_query = "SELECT * FROM products ORDER BY RAND () LIMIT 0,9";
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
    echo "product is added";
}
}
}
?>