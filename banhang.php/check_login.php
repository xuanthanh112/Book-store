<?php
session_start();
error_reporting(0);

// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','123456');
define('DB_NAME','banhang');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{


$username=$_POST['email'];
$password=$_POST['password'];

$sql ="SELECT EMAIL,PASSWORD FROM admin WHERE EMAIL=:username and PASSWORD=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['email'];
var_dump($_SESSION['alogin']);
echo "<script type='text/javascript'> document.location ='products.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
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
    <form method="post">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Signin Form </h2>
			</div>
			<div class="panel-body">
				<div class="form-group">
				  <label for="email">Email:</label>
				  <input required="true" type="email" class="form-control" id="email" name="email" placeholder="nhap vao email cua ban">
				</div>
				
				<div class="form-group">
				  <label for="password">Password:</label>
				  <input required="true" type="password" class="form-control" id="passworde" name="password" placeholder="nhap vao mat khau cua ban">
				</div>
				
				<button class="btn btn-success" name="login">Dang nhap </button>
			</div>
		</div>
	</div>
    </form> 
</body>
</html>