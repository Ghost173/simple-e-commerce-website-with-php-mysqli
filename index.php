<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
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
            <a href="#" class="navbar-brand"> ONLINE STORE</a>
        </div>
        <ul class="nav navbar-nav">
            <li> <a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li> <a href="#"><i class="fas fa-store"></i>Product</a></li>
            <li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
            <li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-cart-plus"></i>Cart <span class="badge">0</span></a>
            <div class="dropdown-menu" style="width:400px;">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3">SL.NO</div>
                            <div class="col-md-3">product image</div>
                            <div class="col-md-3">produc name</div>
                            <div class="col-md-3"> prices in $</div>
                        </div>
                    </div>
                    <div class="panel-body"></div>
                    <div class="panel-footer"></div>
                </div>
            </div>
            </li>

            <li> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-sign-in-alt"></i>SignIn</a>
            <!--signin dropdown -->
            <ul class="dropdown-menu">
            <div style="width:300px;">
                <div class="panel panel-primary">
                <div class="panel-heading">Login</div>
                <div class="panel-heading">
                <form onsubmit="return false" id="login">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required/>
                <label for="email">Password</label>
                <input type="password" class="form-control" name="password" id="password" required/>
                <p><br/></p>
                <a href="#" style="color:white; list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" id = "Login" value="login" style="float:right ; >
                </form>
                </div>
                <div class="panel-footer" id="e_msg"></div>
                </div>
                </div>       
            </ul>
            </li>
            <li> <a href="customer_registration.php"><i class="fas fa-user-plus"></i>SignUp</a></li>
        </ul>
    </div>
</div>

<!-- side-->
<p><br/></p>
<p><br/></p>
<p><br/></p>


<div class="container-fluid"> 
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">

         <div id="get_category">

         </div>   

          <!--  <div class="nav nav-pills nav-stacked"> 
                <li class="active"><a href="#"><h4>Categories</h4></a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
            </div> -->
            <div id="get_brand">

            </div>  
           <!-- <div class="nav nav-pills nav-stacked"> 
                <li class="active"><a href="#"><h4>BRANDS</h4></a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Categories</a></li>
            </div> -->
        </div>

        <div class="col-md-8">
            <div class="panel panel-info">
            <div class="panel-heading">Products</div>
            <div class="panel-body">
            <div id="get_product">
            <!--here we get product details from ajax -->

            </div>
              <!--  <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">Samsung Glaxy</div>
                        <div class="panel-body"> <img src="product_images/images.jpg"/></div>
                        <div class="panel-heading">$500.00
                            <button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
                        </div>
                        </div>
                    </div> -->
                
            </div>
            <div class="panel-footer">&copy;2017</div>
        </div>
</div>  
        <div class="col-md-1"></div>
    </div>
    </div>

</body>
</html>