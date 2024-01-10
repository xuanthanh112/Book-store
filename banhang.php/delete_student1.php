<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('db/dbhelper.php');
	$sql = 'delete from order_details where id = '.$id;
	execute($sql);
   include_once ('db/dbhelper.php');
	$sqlq = 'delete from orders where id = '.$id;
	execute($sqlq);
  
	echo 'Xoá don thành công';
}



