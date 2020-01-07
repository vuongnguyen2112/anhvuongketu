<?php 

	require_once __DIR__. "/autoload/autoload.php"; 

	if(isset($_SESSION['name_id']))
	{
		$id = intval($_SESSION['name_id']);

		$profile = $db->fetchID("users",$id);

		if (empty($profile)) 
        {
            $_SESSION['error'] = "Không có dữ liệu";
        }

	    $data = 
	    	[
				'name'     => postInput('name'),
				'email'    => postInput('email'),
				'phone'    => postInput('phone'),
				'password' => MD5(postInput('password')),
				'address'  => postInput('address')
	    	];
	    

	    if ($_SERVER["REQUEST_METHOD"] == "POST")
	    {
	    	
	    	
	    	$error = [];

	    	if (postInput('name') == '') {
	            $error['name'] = 'Mời nhập đầy đủ tên và họ';
	        }

	        if (postInput('email') == '') {
	            $error['email'] = 'Mời nhập đầy đủ email';
	        }else 
	        {
	            if(postInput('email') != $profile['email'])
	            {
	                $is_check = $db->fetchOne("users"," email = '".$data['email']."' ");
	                if($is_check != NULL)
	                {
	                    $error['email'] = 'Email đã tồn tại!';
	                }
	            }
	        }

	        if (postInput('phone') == '') {
	            $error['phone'] = 'Mời nhập đầy đủ số điện thoại';
	        }

	        if (postInput('password') != '' && postInput('confirmpassword') != postInput('password')) {
	            $error['confirmpassword'] = 'Mật khẩu không khớp';
	        }

	        if (postInput('address') == '') {
	            $error['address'] = 'Mời nhập đầy đủ địa chỉ';
	        }


	        if(empty($error))
	        {
	        	$update = $db->update('users',$data,array("id" => $id));
	        	if($update > 0)
	        	{
	        		unset($_SESSION['name_user']);
					unset($_SESSION['name_id']);
	        		echo "<script>alert('Cập nhật thành công! Bạn cần phải đăng nhập lại để cập nhật thông tin'); location.href='dang-nhap.php';</script>";
	        		
	        	}
	        	else
	        	 {
	        		echo "<script>alert('Thông tin không thay đổi!');</script>";
	        		
	        	}
	        }
	    }
	}
	

    

 ?>

 <?php require_once __DIR__. "/layouts/header.php"; ?>


            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif ?>

<div class="col-md-9">
        
        <section class="box-main1">
            <h3 class="title-main"><a href="" >Thông tin khách hàng</a> </h3>
            
            <form action="" method="POST" class="form-horizontal formcustome"  style="margin-top: 15px">
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Họ và tên</label>
					<div class="col-md-8">
						<input type="text" name="name" placeholder="Tên và họ" class="form-control" value="<?php echo $profile['name'] ?>">
						<?php if (isset($error['name'])): ?>
		                    <p class="text-danger"><?php echo $error['name']; ?></p>
	                    <?php endif ?>	
					</div>										
				</div>
				
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Email</label>
					<div class="col-md-8">
						<input type="text"  name="email" placeholder="Email" class="form-control" value="<?php echo $profile['email'] ?>">
						<?php if (isset($error['email'])): ?>
		                    <p class="text-danger"><?php echo $error['email']; ?></p>
	                    <?php endif ?>
					</div>										
				</div>
							
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Số điện thoại</label>
					<div class="col-md-8">
						<input type="text"  name="phone" placeholder="Phone..." class="form-control" value="<?php echo $profile['phone'] ?>">
						<?php if (isset($error['phone'])): ?>
		                    <p class="text-danger"><?php echo $error['phone']; ?></p>
	                    <?php endif ?>
					</div>										
				</div>

				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Password</label>
					<div class="col-md-8">
						<input type="password"  name="password" placeholder="Password..." class="form-control">
					</div>										
				</div>

				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Confirm Password</label>
					<div class="col-md-8">
						<input type="password"  name="confirmpassword" placeholder="Nhập lại Password..." class="form-control">
						<?php if (isset($error['confirmpassword'])): ?>
							<p class="text-danger"><?php echo $error['confirmpassword']; ?></p>
						<?php endif ?>
					</div>										
				</div>
				
				<div class="form-group">
					<label class="col-md-2 col-md-offset-1">Địa chỉ</label>
					<div class="col-md-8">
						<input type="text"  name="address" placeholder="Địa chỉ..." class="form-control" value="<?php echo $profile['address'] ?>">
						<?php if (isset($error['address'])): ?>
		                    <p class="text-danger"><?php echo $error['address']; ?></p>
		                <?php endif ?> 
					</div>										
				</div>

				

							
	                
	            <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 15px;">Cập nhật</button>
	                
	      
			</form>
            <!-- nội dung -->
        </section>
    </div>

 <?php require_once __DIR__. "/layouts/footer.php"; ?>