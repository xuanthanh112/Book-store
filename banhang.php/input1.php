<?php
session_start();
 $order_id=$product_id=$num=$price='';    
if(!empty($_POST )){
    
    if(isset($_POST['order_id'])){
        $order_id=$_POST['order_id'];

    }
    if(isset($_POST['product_id'])){
        $product_id=$_POST['product_id'];
        
    }
    if(isset($_POST['num'])){
        $num=$_POST['num'];
        
    } 
    if(isset($_POST['price'])){
        $price=$_POST['price'];
        
    }
   
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        
    }

    
require_once('db/dbhelper.php');

    $sql="update order_details set order_id='$order_id', product_id='$product_id', num='$num', price='$price' where id ='$id'";



execute($sql);
header('Location:donmua.php');
}
$id='';

require_once('db/dbhelper.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from order_details where id='$id'";
    $booklist= executeResult($sql,true);
    if($booklist != null && count($booklist)>0){
        $bl= $booklist;
        $order_id=$bl['order_id'];
        $product_id=$bl['product_id'];
        $num=$bl['num'];
        $price=$bl['price'];
        
    
    }
    else{
        $id='';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sua thong tin don hang </h2>
			</div>
			<div class="panel-body">
                <form method="post">
				<div class="form-group">
				  <label for="order_id">Order_id:</label>
                  <input type="number" name ="id" value ="<?=$id?>" style="display: none">
				  <input required="true" type="number" class="form-control" id="order_id" name="order_id" value="<?=$order_id?>">
				</div>
				
				<div class="form-group">
				  <label for="product_id">Product_id:</label>
				  <input type="text" class="form-control" id="product_id"name="product_id"value="<?=$product_id?>">
				</div>
                <div class="form-group">
				  <label for="num">Num:</label>
				  <input type="text" class="form-control" id="num"name="num"value="<?=$num?>">
				</div>
                <div class="form-group">
				  <label for="price">Price:</label>
				  <input type="text" class="form-control" id="price"name="price"value="<?=$price?>">
				</div>
				
				
				<a href="donmua.php"><button class="btn btn-success">Save</button></a>
                </form>

            </div>
		</div>
	</div>
</body>
</html> 