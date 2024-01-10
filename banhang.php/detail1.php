<?php
session_start();
include_once('layouts/header.php');
require_once('db/dbhelper.php');
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Nguoi dat hang</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class ="container">
        <div class ="panel panel-primary">
            <div class ="panel heading">
                QUAN LY DON HANG
                
            </div>
            <div class="panel-body">    
                <table class="table table-bordered">
                    <thead>
                        <tr></tr>
                        <th>ID</th>
                        <th>Fullname</th>
                        <th>Phone Number </th>
                        <th>Email</th>
                        <th>address</th>
                        <th>Order Date</th>

                        

                        </tr>
                    </thead>
                    <tbody>
<?php

	$sql = "select * from orders where id ='$order_id'";
// }
$booklist=executeResult($sql);  
foreach($booklist as $bl){
   echo'
    <tr> 
    <td>'.$bl['id'].'</td>
 <td>  '.$bl['fullname'].'   </td> 
    <td>'.$bl['phone_number'].'</td>
    <td>'.$bl['email'].'</td>
    <td>'.$bl['address'].'</td>
    <td>'.$bl['order_date'].'</td>
   </tr>
     ';
}

?>
                    </tbody>
                     
                </table>
               

            </div>


        </div>

    </div>
   
</body>
 <?php 
 include_once('layouts/footer.php');
 ?>
 
</html>
