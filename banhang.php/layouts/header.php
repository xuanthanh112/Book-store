<!DOCTYPE html>
<html>
<head>
	<title>Products Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.container .row {
			min-height: 1000px;
		}
	</style>
</head>
<body>
	<!-- header -->
	<!-- Grey with black text -->
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
	  <div class="container">
	  	<ul class="navbar-nav">
		    <li class="nav-item active">
		      <a class="nav-link" href="products.php">Home</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="index.php">Shop</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="donmua.php">Track Order</a>
		    </li>
		    
		  </ul>
		   

			<ul class="navbar-nav ml-auto">
			
			<li class="nav-item">
				<?php
$cart = [];
if(isset($_SESSION['cart'])) {
	$cart = $_SESSION['cart'];
}
$count = 0;
foreach ($cart as $item) {
	$count += $item['num'];
}
?>
			<a href="cart.php">
				<button type="button" class="btn btn-primary">
					Cart <span class="badge badge-light"><?=$count?></span>
				</button>
			</a>
				</a>
			</li>
			 
			<li class="nav-item">
				<a href="logout.php">
					<button type="button" class="btn btn-danger">
						Log out <span class="badge badge-light"></span>
					</button>
				</a>
			</li>
          </ul>
	  </div>
	</nav>