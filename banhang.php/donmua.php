<?php
session_start();
include_once('layouts/header.php');
require_once('db/dbhelper.php');


if(strlen($_SESSION['alogin'])==0)
{   
header('location:check_login.php');
}
else{ 
?>
<!DOCTYPE html>
<html>
<head>
<title>Books Management</title>
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
                <form method="get">
                <!-- <input type="text" name="a" style="display: none"> -->
                <input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo so luong">
				</form>
            </div>
            <div class="panel-body">    
                <table class="table table-bordered">
                    <thead>
                        <tr></tr>
                        <th>ID</th>
                        <th>ORDER_ID</th>
                        <th>PRODUCT_ID</th>
                        <th>NUM</th>
                        <th>PRICE</th>

                        

                        </tr>
                    </thead>
                    <tbody>
<?php
if (isset($_GET['s']) && $_GET['s'] != '') {
	$sql = 'select * from order_details where num like "%'.$_GET['s'].'%"';}
// elseif(isset($_GET['a']) && $_GET['a'] != ''){
//     $sql = 'select * from order_details where id like "%'.$_GET['a'].'%"';}
    else {
	$sql = 'select * from order_details';
}
$booklist=executeResult($sql);
foreach($booklist as $bl){
   echo'
    <tr> 
    <td>'.$bl['id'].'</td>
 <td>    <a href="detail1.php?order_id='.$bl['order_id'].'">'.$bl['order_id'].'</a> </td> 
    <td> <a href="detail2.php?product_id='.$bl['product_id'].'">'.$bl['product_id'].'</a></td>
    <td>'.$bl['num'].'</td>
    <td>'.$bl['price'].'</td>
   
     <td><a href="input1.php?id='.$bl['id'].'"><button class="btn btn-warning">EDIT</button></a></td> 
    <td><button class ="btn btn-danger" onclick="deleteStudent1('.$bl['id'].')">DELETE</button></td>
    </tr>';
}

?>
                    </tbody>
                     
                </table>
               

            </div>


        </div>

    </div>
    <script type="text/javascript">
	function deleteStudent1(id) {
        Option=confirm('Are you sure>')
        if(!Option){return}
		$.post('delete_student1.php', {'id': id}, function(data) {
			 
		
			location.reload()
		})
    }
    </script>
</body>
 <?php 
 include_once('layouts/footer.php');}
 ?>
 
</html>
