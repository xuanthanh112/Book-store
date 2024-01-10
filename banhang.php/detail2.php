<?php
session_start();
include_once('layouts/header.php');
require_once('db/dbhelper.php');
if(isset($_GET['product_id'])){
    $product_id=$_GET['product_id'];
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
                        <th>Title</th>
                        <th>Thumbnail </th>
                    

                        

                        </tr>
                    </thead>
                    <tbody>
<?php

	$sql = "select * from products where id ='$product_id'";
// }
$booklist=executeResult($sql);  
foreach($booklist as $bl){
   echo'
    <tr> 
    <td>'.$bl['id'].'</td>
 <td>  '.$bl['title'].'   </td> 
    <td><img src="'.$bl['thumbnail'].'" style="width: 100px"></td>
    
  
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
