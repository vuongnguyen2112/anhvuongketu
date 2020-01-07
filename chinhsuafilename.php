<?php
	require_once __DIR__. "/autoload/autoload.php";
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$data = 
		[
			
		];
	}
    
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 ">
        
        <section class="box-main1">
            <h3 class="title-main"><a href="" > Sửa tên file tự động</a> </h3>
            
            <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 15px">
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Nhập chuỗi</label>
					<div class="col-md-8">
						<input type="text" autofocus name="name" placeholder="Nhập chuỗi ở đây" class="form-control" value="<?php isset($_POST['name']) ? print_r($_POST['name']) : '' ;?>">	
					</div>										
				</div>
				
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Email</label>
					<div class="col-md-8">
						<input type="text" name="email" placeholder="Chuỗi ra ở đây..." class="form-control" value="<?php isset($_POST['name']) ? validateFileName($_POST['name']) : ''?>"> 
					</div>										
				</div>										
							
	                
	            <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 15px;">Xác nhận</button>
	                
	      
			</form>
            <!-- nội dung -->
        </section>
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>