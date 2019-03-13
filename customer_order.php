<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

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

     <style>
     table tr td {padding:10px;}
     </style>
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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <h1>Customer  Details</h1>
                <hr/>
                <div class="row">
                    <div class="col-md-6">
                    <img style="float:right" src="product_images/camera.jpg" class="img-thumbnail"/>
                    </div>
                    <div class="col-md-6">
                    <table>
                    <tr><td>Product Name</td><td><b>Sonay camera</b> </td></tr>
					<tr><td>Product Price</td><td><b>500</b></td></tr>
					<tr><td>Quantity</td><td><b>3</b></td></tr>
                    <tr><td>payment</td><td><b>Complete</b></td></tr>
					<tr><td>Transaction Id</td><td><b>RGHSUSY445S<tr></tr></b></td></tr>
                    </table>
                    </div>
                </div>
            </div>
            <div class="panel-headifooter"></div>
        </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>


</body>
</html>