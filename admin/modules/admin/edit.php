
<?php 
    $open = 'admin';
    require_once __DIR__. "/../../autoload/autoload.php";

    /**
     * danh sách danh mục sp
     */
    $id = intval(getInput('id'));
    $Editadmin = $db->fetchID("admin",$id);

    if(empty($Editadmin))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin('admin');
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        
        $data = 
        [
            "name"     =>  postInput('name'),
            "email"    =>  postInput('email'),
            "phone"    =>  postInput('phone'),
            "address"  =>  postInput('address'),
            "level"    =>  postInput('level') 

        ];

        $error = [];

        if (postInput('name') == '') {
            $error['name'] = 'Mời nhập đầy đủ tên';
        }

        if (postInput('email') == '') {
            $error['email'] = 'Mời bạn nhập email';
        }else 
            {
            if(postInput('email') != $Editadmin['email'])
            {
                $is_check = $db->fetchOne("admin"," email = '".$data['email']."' ");
                if($is_check != NULL)
                {
                    $error['email'] = 'Email đã tồn tại!';
                }
            }
            
        }

        if (postInput('phone') == '') {
            $error['phone'] = 'Mời nhập số phone';
        }

        if(postInput('password') != NULL && postInput('re_password') != NULL)
        {
            if(postInput('password') != postInput('re_password'))
            {
                $error['re_password'] = "Mật khẩu thay đổi không khớp";
            }else
            {
                $data['password'] = MD5(postInput('password'));
            }
        }

        //nếu không có lỗi => dữ liệu nhập thành công
        if (empty($error)) {
            
            

            $id_update = $db->update("admin",$data,array("id" => $id));
            
            if ($id_update > 0) {
               
                $_SESSION['success'] = "Cập nhật thành công";
                redirectAdmin('admin');
            }
            else {
                $_SESSION['error'] = "Cập nhật thất bại";
                redirectAdmin('admin');
            }


        }
        
        
    }

    
    
 ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm mới Admin
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li>
                  <a href="">Admin</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Thêm mới
            </li>
            
        </ol>
        
        <div class="clearfix"></div>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif ?>

        <form action="" method="POST">
            
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Tên sản phẩm" name="name" value="<?php echo $Editadmin['name'] ?>" > 
                    <?php if (isset($error['name'])): ?>
                    <p class="text-danger"><?php echo $error['name']; ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="DHV16B@gmail.com" name="email" value="<?php echo $Editadmin['email'] ?>">
                    <?php if (isset($error['email'])): ?>
                    <p class="text-danger"><?php echo $error['email']; ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="0903126791" name="phone" value="<?php echo $Editadmin['phone'] ?>">
                    <?php if (isset($error['phone'])): ?>
                    <p class="text-danger"><?php echo $error['phone']; ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputEmail3" placeholder="********" name="password" >
                    <?php if (isset($error['password'])): ?>
                    <p class="text-danger"><?php echo $error['password']; ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">ConfigPassword</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputEmail3" placeholder="********" name="re_password">
                    <?php if (isset($error['re_password'])): ?>
                    <p class="text-danger"><?php echo $error['re_password']; ?></p>
                    <?php endif ?>
                </div>
            </div>


            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="70 Tô Ký, Q.12, TPHCM " name="address" value="<?php echo $Editadmin['address'] ?>">
                    <?php if (isset($error['address'])): ?>
                    <p class="text-danger"><?php echo $error['address']; ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
                <div class="col-sm-8">
                    <select class="form-control" name="level">
                    <option value="1" <?php echo isset($Editadmin['level']) && $Editadmin['level'] == 1 ? "selected = 'selected" :'' ?>>CTV
                        </option>
                    <option value="2" <?php echo isset($Editadmin['level']) && $Editadmin['level'] == 1 ? "selected = 'selected" :'' ?>>Admin
                        </option>
                    </select>
                    <?php if (isset($error['level'])): ?>
                    <p class="text-danger"><?php echo $error['level']; ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>