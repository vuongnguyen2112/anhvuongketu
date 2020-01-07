<?php 

	require_once __DIR__. "/../../autoload/autoload.php";



	$id = intval(getInput('id'));


	$DeleteAdmin = $db->fetchID("users", $id);
	if (empty($DeleteAdmin)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin('user');
	}

	//kiểm tra dữ liệu

	$num = $db->delete("users",$id);
	if ($num > 0) 
	{
		$_SESSION['success'] = "Xoá thành công!";
		redirectAdmin('user');	
	}
	else 
	{
		$_SESSION['error'] = "Xoá thất bại";
		redirectAdmin('user');	
	}


 ?>