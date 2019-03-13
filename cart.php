<?php
//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(-1);

session_start();
// session is not set
if (!isset($_SESSION["uid"])) {
header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ONLINE STORE</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
   
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
     integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" 
     crossorigin="anonymous">
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top"> 
    <div class="container-fluid"> 
        <div class="navbar navbar-header"> 
            <a href="index.php" class="navbar-brand"> ONLINE STORE</a>
        </div>
        <ul class="nav navbar-nav">
            <li> <a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li> <a href="#"><i class="fas fa-store"></i>Product</a></li>
        </ul>
        </div>
    </div>
<p><br/></p>
<p><br/></p>
<p><br/></p>
<p><br/></p>

<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8" id="cart_msg">
<!-- cart messages -->
</div>
<div class="col-md-8"></div>
</div>

    <div class="row">
        <div class="col-md-2"> </div>
        <div class="col-md-8"> 
            <div class="panel panel-primary">
                <div class="panel-heading">Cart Checkout</div>
                <div class="panel-body">
                    <div class="row"> 
                    <div class="col-md-2"><b>Action</b></div>
                    <div class="col-md-2"><b>Products Images</b></div>
                    <div class="col-md-2"><b>Product Name</b></div>
                    <div class="col-md-2"><b>Product Price</b></div>
                    <div class="col-md-2"><b>Quantity</b></div>
                    <div class="col-md-2"><b>Price in $</b></div>
                    </div>

                <div id="cart_checkout">
                </div>
                <!--    <div class="row"> 
                    <div class="col-md-2">
                    <div class="btn-group">
                       <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 
                       <a href="#" class="btn btn-primary"><i class="far fa-edit"></i></i></a> 
                    </div>
                    </div>
                    <div class="col-md-2"><img src="product_images/imges.jpg"></div>
                    <div class="col-md-2">Product Name</div>
                    <div class="col-md-2"><input type="text" class="form-control" value="500" disabled ></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="1"  ></div>
                    <div class="col-md-2"><input type="text" class="form-control" value="500" disabled ></div>
                    </div> -->
                </div>
                <!-- <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                    <b>Total:4000</b>
                    </div>
                </div> -->
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-md-2"> </div>
    </div>
</div>

</body>
</html>