
<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    /**
     * danh sách danh mục sp
     */
    $id = intval(getInput('id'));
    $Edittransaction = $db->fetchID("transaction",$id);

    if(empty($Edittransaction))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin('transaction');
    }

    if ($Edittransaction['status'] == 1) 
    {
        $_SESSION['error'] = "Đơn hàng đã được xử lý";
        redirectAdmin('transaction'); 
    }

    $status = 1;
    // if ($Edittransaction['status'] == 0) 
    // {
    //     $status = 1;
    // }
    // else
    // {
    //     $status = 0;
    // }

    $update = $db->update("transaction", array('status' => $status),array('id' => $id));
    if ($update > 0) {

        $_SESSION['success'] = 'Cập nhật thành công';

        $sql = "SELECT product_id,qty FROM orders WHERE transaction_id = $id";
        $Order = $db->fetchsql($sql);

        foreach ($Order as $item) 
        {
            $idproduct = intval($item['product_id']);
            $product = $db->fetchID("product",$idproduct);
            $number = $product['number'] - $item['qty'];
            $update_product = $db->update("product",array("number" => $number,"pay" =>$product['pay']+1), array("id" => $idproduct));
            
        }
        
        

        redirectAdmin('transaction');
    }
    else {
        $_SESSION['error'] = 'Dữ liệu không thay đổi';
        redirectAdmin('transaction');
    }


 ?>

