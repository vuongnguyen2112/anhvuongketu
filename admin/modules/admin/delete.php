<?php 

	require_once __DIR__. "/../../autoload/autoload.php";



	$id = intval(getInput('id'));


	$DeleteAdmin = $db->fetchID("admin", $id);
	if (empty($DeleteAdmin)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin('admin');
	}

	//kiểm tra dữ liệu

	$num = $db->delete("admin",$id);
	if ($num > 0) 
	{
		$_SESSION['success'] = "Xoá thành công!";
		redirectAdmin('admin');	
	}
	else 
	{
		$_SESSION['error'] = "Xoá thất bại";
		redirectAdmin('admin');	
	}


 ?>