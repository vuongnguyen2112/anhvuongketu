
<?php 

	require_once __DIR__. "/autoload/autoload.php";

	$data = 
	[
		
		'email'    => postInput('email'),
		'password' => postInput('password'),
		
	];

	$error = [];
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if($data['email'] == '')
		{
			$error['email'] = "Email không được trống!";
		}

		
		if($data['password'] == '')
		{
			$error['password'] = "Password không được trống!";
		}

		if(empty($error))
		{
			$is_check = $db->fetchOne("users", " email = '".$data['email']."' AND password = '".MD5($data['password'])."' ");

			if($is_check != NULL)
			{
				$_SESSION['name_user'] = $is_check['name'];
				$_SESSION['name_id'] = $is_check['id'];
				echo "<script>alert('Đăng nhập thành công!'); location.href='index.php';</script>";
			}
			else
			{
				$_SESSION['error'] = "Đăng nhập thất bại";
			}
		}
	}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log in</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
<script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
<script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>public/admin/css/bootstrap.css"></script>
<!---->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
<!--slide-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
<script  src="<?php echo base_url() ?>public/frontend/js/slick.min.js"></script>

<style type="text/css">

	body{
		margin:0;
		padding: 0;
		background-size: cover; 
		background-position: center;
		font-family: sans-serif;
	}
	
	.loginbox{
		width: 50%;
		height: 420px;
		background: #000;
		color: #fff;
		top: 50%;
		left: 50%;
		position: absolute;
		transform: translate(-50%,-50%);
		box-sizing: border-box;
		padding: 70px 30px;
		
	}
	.avatar{
		width: 100px;
		height: 100px;
		border-radius: 50%;
		position: absolute;
		top: -10%;
		left: calc(50% - 50px);
	}
	h1{
		margin: 0;
		padding: 0 0 20px;
		text-align: center;
		font-size: 22px;
	}
	.loginbox p{
		margin: 0;
		padding: 0;
		font-weight: bold;
	}
	.loginbox input{
		width: 100%;
		margin-bottom: 20px;
	}
	.loginbox input[type="text"], input[type="password"]{
		border: none;
		border-bottom: 1px solid #fff;
		background: transparent;
		outline: none;
		height: 40px;
		font-size: 16px;
		color: #FFFFFF;
	}
	.loginbox button[type="submit"]{
		background-color: red;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
		border-radius: 20px;
		outline: none;
	}
	.loginbox button[type="submit"]:hover{
		cursor: pointer;
		background: #51A852;
		color: #000000;
	}
	.loginbox a{
		text-decoration: none;
		font-size: 12px;
		line-height: 20px;
		color: darkgray;
	}
	.loginbox a:hover{
		color: #FE0DFF;
	}

</style>
</head>
<body>
	
    <?php require_once __DIR__. "/layouts/header.php"; ?>
	<div class="clearfix"></div>
	<?php if (isset($_SESSION['success'])): ?>
				<div class="alert alert-success">
				  <strong style="color: #3c73d">Thành Công!  </strong><?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
				</div>
	<?php endif ?>

	<?php if (isset($_SESSION['error'])): ?>
				<div class="alert alert-danger">
				  <strong style="color: #e60000">Error!  <?php echo $_SESSION['error']; unset($_SESSION['error']) ?> </strong>
				</div>
	<?php endif ?>
	<div class="loginbox">
		

		<h1>Đăng Nhập</h1>


		<form action="" method="POST" role="form">
			
			<div>
				<p>Email của tôi</p>
				<input type="text" autofocus name="email" placeholder="Email">
				<?php if (isset($error['email'])): ?>
					<p class="text-danger"><?php echo $error['email'] ?></p>
				<?php endif ?>
			</div>
			
			<div>
				<p>Mật khẩu</p>
				<input type="password" name="password" placeholder="Nhập mật khẩu...">
				<?php if (isset($error['password'])): ?>
					<p class="text-danger"><?php echo $error['password'] ?></p>
				<?php endif ?>
			</div>
			
			<button type="submit">Đồng ý</button> <br>		
			<a href="#">Quên mật khẩu</a><br>
			<a href="signup.html">Không có tài khoản ?</a>
		</form>
	</div>

	   
</body>
</html>







