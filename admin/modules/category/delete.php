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
    /**
     * kiểm tra xem danh mục có sản phẩm hay ko
     * isset product
     */
    $is_product = $db->fetchOne("product","category_id = $id ");
    if($is_product == NULL)
    {
        $num = $db->delete('category', $id);
        if($num > 0)
        {
            $_SESSION['success'] = 'Xoá thành công';
            redirectAdmin('category');

        }else
        {
            $_SESSION['error'] = 'Xoá thất bại';
            redirectAdmin('category');
                    
        }
    }else
    {
        $_SESSION['error'] = 'Danh mục có sản phẩm, không thể xoá! ';
        redirectAdmin('category');    
    }
    
?>