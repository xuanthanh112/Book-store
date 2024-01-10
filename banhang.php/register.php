<?php
require_once('header1.php');  


if (!empty($_POST)) {
	if (isset($_POST['Fullname'])) {
		$F= $_POST['Fullname'];
	}
	if (isset($_POST['email'])) {
		$e = $_POST['email'];
	}
	
	if (isset($_POST['password1'])) {
		$p1 = $_POST['password1'];
	}
	if (isset($_POST['password2'])) {
		$p2 = $_POST['password2'];
	}
    if ($p1 == $p2){
        $connect = new mysqli("localhost","root","123456","banhang");
     
    if($connect->connect_error){
        var_dump(   $connect->connect_error);
        die();
    }
    $query="INSERT INTO users(FULL_NAME,EMAIL, PASSWORD)
    VALUES ('".$F."','".$e."','".$p1."')";
    mysqli_query($connect, $query);
    $connect->close();
        header('Location:check_login.php?'     );
       
    }
   

   
   
      
 
    
    
  

}
?>
<!DOCTYPE html>
<html>
<head>
<title>thanh</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <form action="" method="POST">
        <div class="form-group">
            <label for="Fullname">Fullname:</label>
            <input type="text" class="form-control" name="Fullname" placeholder="Ho Va Ten" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
        </div>
        <div class="form-group">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" class="form-control" name="password1" placeholder="Nhập mật khẩu" required>
        </div>
        <div class="form-group">
            <label for="pwd">Nhap lai Mật khẩu:</label>
            <input type="password" class="form-control" name="password2" placeholder="Nhập lai mật khẩu" required>
        </div>
        <button type="submit" class="btn btn-default">Gửi</button>
</form>
</body>
</html>
