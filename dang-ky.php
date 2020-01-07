<?php 
	
	require_once __DIR__. "/autoload/autoload.php";
	
	if (isset($_SESSION['name_id'])) 
	{
		echo "<script>alert('Bạn không thể vao đây vì đã có tài khoản'); location.href='index.php';</script>";
	}

	$data = 
	[
		'name'     => postInput('name'),
		'email'    => postInput('email'),
		'password' => postInput('password'),
		'phone'    => postInput('phone'),
		'address'  => postInput('address')
	];
	$error = [];
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		//validate và đăng ký
		
		if($data['name'] == '')
		{
			$error['name'] = "Tên không được trống!";
		}

		
		if($data['email'] == '')
		{
			$error['email'] = "Email không được trống!";
		}
		else 
		{
			$is_check = $db->fetchOne("users"," email = '".$data['email']."' ");
			if ($is_check != NULL) 
			{
				$error['email'] = "Email đã tồn tại!";		
			}	
		}

		
		if($data['password'] == '')
		{
			$error['password'] = "Password không được trống!";
		}
		else 
		{
			$data['password'] = MD5(postInput('password'));
		}

		
		if($data['phone'] == '')
		{
			$error['phone'] = "Số diện thoại không được trống!";
		}
		
		if($data['address'] == '')
		{
			$error['address'] = "Địa chỉ không được trống!";
		}


		//kiểm tra biến error
		if(empty($error))
		{
			$idinsert = $db->insert("users",$data);
			if($idinsert > 0)
			{
				$_SESSION['success'] = "Bạn có thể đăng nhập tài khoản";
				header("location: dang-nhap.php");
			}
			else {
				echo "Đăng ký thất bại";
			}
		}
	}
	
	
?>

<doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign Up</title>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			background: #EBEBEB;
			font-size: 16px;
			color: #777;
			font-family: sans-serif;
			font-weight: 300;
		}
		#login-box{
			position: relative;
			margin: 5% auto;
			width: 600px;
			height: 500px;
			background: #fff;
			box-shadow: 0 2px 4px rgba(0,0,0,0.6);
		}
		.left-box{
			position: absolute;
			top:0;
			left: 0;
			box-sizing: border-box;
			padding: 40px;
			width: 300px;
			height: 400px;
		}
		h1{
			margin: 0 0 20px 0;
			font-weight: 300;
			font-size: 28px;
		}
		input[type="text"],input[type="password"]{
			display: block;
			box-sizing: border-box;
			margin-bottom: 20px;
			padding: 4px;
			width: 220px;
			height: 32px;
			border: none;
			outline: none;
			border-bottom: 1px solid #aaa;
			font-family: sans-serif;
			font-weight: 400;
			font-size: 15px;
			transition: 0.2s ease;
		}
		input[type="submit"]{
			margin-bottom: 28px;
			width: 120px;
			height: 32px;
			background: #f44336;
			border: none;
			border-radius: 	2px;
			color: #fff;
			font-family: sans-serif;
			font-weight: 500;
			text-transform: uppercase;
			transition: 0.2s ease;
			cursor: pointer;
		}
		input[type="submit"]:hover, input[type="submit"]:focus{
			background: #ff5722;
			transition: 0.2s ease;
		}
		.right-box{
			position: absolute;
			top:0;
			right: 0;
			box-sizing: border-box;
			padding: 40px;
			width: 300px;
			height: 100%;
			background: black;
			background-size: cover;
			background-position: center;	
		}
		.or{
			position: absolute;
			top: 180px;
			left: 280px;
			width: 40px;
			height: 40px;
			background: #efefef;
			border-radius: 50%;
			box-shadow: 0 2px 4px rgba(0,0,0,0.6);
			line-height: 40px;
			text-align: center;
		}
		.right-box .signwith{
			display: block;
			margin-bottom: 40px;
			font-size: 28px;
			color: #ffffff;
			text-align: center;
			
		}
		button.social{
			margin-bottom: 20px;
			width: 220px;
			height: 36px;
			border: none;
			border-radius: 2px;
			color: #fff;
			font-family: sans-serif;
			font-weight: 500;
			transition: 0.2s ease;
			cursor: pointer;
		}
		.facebook{
			background: #32508e;
		}
		.twitter{
			background: #55acee;
			
		}
		.google{
			background: #dd4b39;
		}
		a{
			text-decoration: none;
			color: white;
		}
		.text-danger
		{
		    color: red;
		    font-size: 12px;
		    padding-top: 0;
		}
	</style>
</head>

<body>
	<div id="login-box">
		<div class="left-box">
			<form action="" method="POST" role="form">
				<h1> Đăng ký</h1>
				<div>
					<input type="text" name="name" placeholder="Tên thành viên" value="<?php echo $data['name'] ?>">
					<?php if (isset($error['name'])): ?>
						<p class="text-danger"><?php echo $error['name'] ?></p>
					<?php endif ?>
				</div>
				
				<div>
					<input type="text" name="email" placeholder="Email" value="<?php echo $data['email'] ?>">
					<?php if (isset($error['email'])): ?>
						<p class="text-danger"><?php echo $error['email'] ?></p>
					<?php endif ?>
				</div>

				<div>
					<input type="password" name="password" placeholder="Mật khẩu" value="<?php echo $data['password'] ?>">
					<?php if (isset($error['password'])): ?>
						<p class="text-danger"><?php echo $error['password'] ?></p>
					<?php endif ?>
				</div>
				
				<div>
					<input type="text" name="phone" placeholder="Phone..." value="<?php echo $data['phone'] ?>">
					<?php if (isset($error['phone'])): ?>
						<p class="text-danger"><?php echo $error['phone'] ?></p>
					<?php endif ?>
				</div>
				
				<div>
					<input type="text" name="address" placeholder="Địa chỉ..." value="<?php echo $data['address'] ?>">
					<?php if (isset($error['address'])): ?>
						<p class="text-danger"><?php echo $error['address'] ?></p>
					<?php endif ?>
				</div>
				
				
				
				<input type="submit" name="signup-button" value="Đồng ý">
			</form>
			
		</div>
		<div class="right-box">
			<span class="signwith">Đăng nhập với...</span>
			
			<button class="social facebook"><a href="#"> Facebook</a></button>
			<button class="social twitter">  Twitter</button>
			<button class="social google">  Google+</button>
		</div>
		<div class="or">Hoặc</div>
	</div>
</body>
</html>
