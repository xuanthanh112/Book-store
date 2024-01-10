<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('db/dbhelper.php');
	$sql = 'delete from products where id = '.$id;
	execute($sql);

	echo 'Xoá sach thành công';
}