<?php 

	require_once __DIR__. "/autoload/autoload.php";
	
	$key = intval(getInput('key'));

	unset($_SESSION['cart'][$key]);

	$_SESSION['success'] = "Xoá sản phẩm trong giỏ thành công!";
	header("location: gio-hang.php");

 ?>