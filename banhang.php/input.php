<?php
session_start();
 $title=$thumbnail=$content=$price=$created_at=$updated_at='';    
if(!empty($_POST )){
    
    if(isset($_POST['title'])){
        $title=$_POST['title'];

    }
    if(isset($_POST['thumbnail'])){
        $thumbnail=$_POST['thumbnail'];
        
    }
    if(isset($_POST['content'])){
        $content=$_POST['content'];
        
    } 
    if(isset($_POST['price'])){
        $price=$_POST['price'];
        
    }
    if(isset($_POST['created_at'])){
        $created_at=$_POST['created_at'];
        
    } 
    if(isset($_POST['updated_at'])){
        $updated_at=$_POST['updated_at'];
        
    } 
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        
    }
require_once('db/dbhelper.php');
    
    if ($id != '') {
		//update
		$sql = "update products set title = '$title', thumbnail = '$thumbnail', content = '$content' , price = '$price', created_at = '$created_at', updated_at = '$updated_at'where id = " .$id;
	} else {
		//insert
		$sql = "insert into products(title, thumbnail, content,price, created_at, updated_at) value ('$title', '$thumbnail', '$content', '$price', '$created_at', '$updated_at')";
	}

	// echo $sql;

	execute($sql);

	header('Location: index.php');
	die();
}

$id='';

require_once('db/dbhelper.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from products where id='$id'";
    $booklist= executeResult($sql,true);
    if($booklist != null && count($booklist)>0){
        $bl= $booklist;
        $title=$bl['title'];
        $thumbnail=$bl['thumbnail'];
        $content=$bl['content'];
        $price=$bl['price'];
        $created_at=$bl['created_at'];
        $updated_at=$bl['updated_at'];
    
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
				<h2 class="text-center">ADD BOOK</h2>
			</div>
			<div class="panel-body">
                <form method="post">
				<div class="form-group">
				  <label for="title">Title:</label>
                  <input type="number" name ="id" value ="<?=$id?>" style="display: none">
				  <input required="true" type="text" class="form-control" id="title" name="title" value="<?=$title?>">
				</div>
				
				<div class="form-group">
				  <label for="thumbnail">Thumbnail:</label>
				  <input type="text" class="form-control" id="thumbnail"name="thumbnail"value="<?=$thumbnail?>">
				</div>
                <div class="form-group">
				  <label for="content">Content:</label>
				  <input type="text" class="form-control" id="content"name="content"value="<?=$content?>">
				</div>
                <div class="form-group">
				  <label for="price">Price:</label>
				  <input type="text" class="form-control" id="price"name="price"value="<?=$price?>">
				</div>
				
				
				<div class="form-group">
				  <label for="created_at">Created_at:</label>
				  <input type="text" class="form-control" id="created_at"name="created_at"value="<?=$created_at?>">
				</div>
                <div class="form-group">
				  <label for="updated_at">Updated_at:</label>
				  <input type="text" class="form-control" id="updated_at"name="updated_at"value="<?=$updated_at?>">
				</div>
				<button class="btn btn-success">Save</button>
                </form>

            </div>
		</div>
	</div>
</body>
</html>