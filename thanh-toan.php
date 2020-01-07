
<?php

	require_once __DIR__. "/autoload/autoload.php"; 
	$user = $db->fetchID("users",intval($_SESSION['name_id']));

	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$data = 
		[
			'amount'   => $_SESSION['total'],
			'users_id' => $_SESSION['name_id'],
			'note'     => postInput('note')
		];

		$idtran = $db->insert("transaction",$data);
		if ($idtran > 0) 
		{
			foreach ($_SESSION['cart'] as $key => $value) 
			{
				$data2 = 
				[
					'transaction_id' => $idtran,
					'product_id'     => $key,
					'qty'            => $value['qty'],
					'price'          => $value['price']
				];

				$id_insert = $db->insert("orders",$data2);
			}


			
			$_SESSION['success'] = "Lưu đơn hàng thành công! Chúng tôi sẽ liên hệ để xác nhận trong thời gian sớm nhất!";
			header("location: thong-bao.php");	
		}	

		_debug($data);


	}

	
	
	
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 ">
        
        <section class="box-main1">
            <h3 class="title-main"><a href="" > Thanh toán đơn hàng</a> </h3>
            
            <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 15px">
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Họ và tên</label>
					<div class="col-md-8">
						<input type="text" readonly="true" name="name" placeholder="Tên và họ" class="form-control" value="<?php echo $user['name'] ?>">	
					</div>										
				</div>
				
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Email</label>
					<div class="col-md-8">
						<input type="text" readonly="true" name="email" placeholder="Email" class="form-control" value="<?php echo $user['email'] ?>"> 
					</div>										
				</div>

				
				
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Số điện thoại</label>
					<div class="col-md-8">
						<input type="number" readonly="true" name="phone" placeholder="Phone..." class="form-control" value="<?php echo $user['phone'] ?>"> 
					</div>										
				</div>
				
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Địa chỉ</label>
					<div class="col-md-8">
						<input type="text" readonly="true" name="address" placeholder="Địa chỉ..." class="form-control" value="<?php echo $user['address'] ?>"> 
					</div>										
				</div>

				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Tổng tiền thanh toán</label>
					<div class="col-md-8">
						<input type="text" readonly="true" name="address" placeholder="Địa chỉ..." class="form-control" value="<?php echo formatPrice($_SESSION['total']); ?>"> 
					</div>										
				</div>

				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Ghi chú</label>
					<div class="col-md-8">
						<input type="text" autofocus name="note" placeholder="Hàng dễ vỡ" class="form-control" value="" > 
					</div>										
				</div>
							
	                
	            <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 15px;">Xác nhận</button>
	                
	      
			</form>
            <!-- nội dung -->
        </section>
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>          