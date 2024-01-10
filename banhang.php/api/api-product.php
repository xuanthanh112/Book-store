<?php
session_start();
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');

if(!empty($_POST)) {
	$id = getPost('id');
	$action = getPost('action');

	switch ($action) {
		case 'add':
			addToCart($id);
			break;
		case 'delete':
			deleteItem($id);
			break;
	}
}

/**
$_SESSION['cart'] = [
	[
		object => product,
		'key' => value,
		'num': ???
	],
	[
		object => product,
		'num': ???
	],
	[
		object => product,
		'num': ???
	]
]
*/

function deleteItem($id) {
	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}

	for ($i=0; $i < count($cart); $i++) {
		if($cart[$i]['id'] == $id) {
			array_splice($cart, $i, 1);
			break;
		}
	}

	//update
	$_SESSION['cart'] = $cart;
}

function addToCart($id) {
	$num = getPost('num');

	$cart = [];
	if(isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	}

	//Kiem tra $id da ton tai trong $cart
	$isFind = false;
	for ($i=0; $i < count($cart); $i++) {
		if($cart[$i]['id'] == $id) {
			$cart[$i]['num'] += $num;
			$isFind = true;
			break;
		}
	}
	if(!$isFind) {
		$product = executeResult("select * from products where id = $id", true);
		$product['num'] = $num;

		$cart[] = $product;
	}

	//update
	$_SESSION['cart'] = $cart;
	

	
}
