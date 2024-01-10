<?php
require_once('config.php');

// /**
// * Su dung cho cac lenh: insert, update, delete
// */
function execute($sql) {
	//Mo ket noi toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//query
	mysqli_query($conn, $sql);

	//Dong ket noi
	mysqli_close($conn);
}

// /**
// * Su dung cho cac lenh: select
// */
function executeResult($sql, $onlyOne = false) {
	//Mo ket noi toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//query
	$resultset = mysqli_query($conn, $sql);

	if($onlyOne) {
		$data = mysqli_fetch_array($resultset, true);
	} else {
		$data = [];
		while(($row = mysqli_fetch_array($resultset, true)) != null) {
			$data[] = $row;
		}
	}
	//Dong ket noi
	mysqli_close($conn);

	return $data;
}