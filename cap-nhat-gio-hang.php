<?php 

	require_once __DIR__. "/autoload/autoload.php";
	$key = intval(getInput('key')); // id sản phẩm
	$qty = intval(getInput('qty')); 

	$product = $db->fetchID('product',$key);

	
	if($qty > $product['number'])
	{
		echo "<script>alert('Số lượng bạn mua vượt quá số trong kho!');location.href='gio-hang.php';</script>";
	}
	else 
	{
		$_SESSION['cart'][$key]['qty'] = $qty;
	}
	
	

	
	
	echo 1;
 ?>