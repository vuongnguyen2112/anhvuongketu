<?php 

	$open = 'category';
	require_once __DIR__. "/../../autoload/autoload.php";

	$id = intval(getInput('id'));

	$Editcategory = $db->fetchID('category',$id);
    if(empty($Editcategory))
    {
        $_SESSION['error'] = 'Dữ liệu không tồn tại';
        redirectAdmin('category');

    }

    if ($Editcategory['home'] == 0) 
    {
    	$home = 1;
    }
    else
    {
    	$home = 0;
    }

    $update = $db->update("category", array('home' => $home),array('id' => $id));
    if ($update > 0) {
        $_SESSION['success'] = 'Cập nhật thành công';
        redirectAdmin('category');
    }
    else {
        $_SESSION['error'] = 'Dữ liệu không thay đổi';
        redirectAdmin('category');
    }
 ?>