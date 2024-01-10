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
                QUAN LY THONG TIN SACH
                <form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên">
				</form>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr></tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>PRICE</th>
                        <th>CREATED TIME</th>
                        

                        </tr>
                    </thead>
                    <tbody>
<?php
if (isset($_GET['s']) && $_GET['s'] != '') {
	$sql = 'select * from products where title like "%'.$_GET['s'].'%"';
} else {
	$sql = 'select * from products';
}
$booklist=executeResult($sql);
foreach($booklist as $bl){
   echo'
    <tr>    
    <td>'.$bl['id'].'</td>
    <td>'.$bl['title'].'</td>
    <td>'.$bl['price'].'</td>
    <td>'.$bl['created_at'].'</td>
     <td><a href="input.php?id='.$bl['id'].'"><button class="btn btn-warning">EDIT</button></a></td> 
    <td><button class ="btn btn-danger" onclick="deleteStudent('.$bl['id'].')">DELETE</button></td>
    </tr>';
}

?>
                    </tbody>
                     
                </table>
                <a href="input.php"><button class="btn btn-success">INSERT</button></a>

            </div>


        </div>

    </div>
    <script type="text/javascript">
	function deleteStudent(id) {
        Option=confirm('Are you sure>')
        if(!Option){return}
		$.post('delete_student.php', {'id': id}, function(data) {
			 
		
			location.reload()
		})
    }
    </script>
</body>
 <?php 
 include_once('layouts/footer.php');}
 ?>
 
</html>
