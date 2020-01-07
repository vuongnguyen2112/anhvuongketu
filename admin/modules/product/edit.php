<?php 
	
	$open = 'category';
    require_once __DIR__. "/../../autoload/autoload.php";


    $id = intval(getInput('id'));

    $Editproduct = $db->fetchID('product',$id);

    if(empty($Editproduct))
    {
        $_SESSION['error'] = 'Dữ liệu không tồn tại';
        redirectAdmin('product');

    }

    $category = $db->fetchAll('category');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $data = 
        [
            "name"        =>  postInput('name'),
            "slug"        =>  to_slug(postInput('name')),
            "category_id" =>  postInput('category_id'),
            "price"       =>  postInput('price'),
            "number"      =>  postInput('number'),
            "content"     =>  postInput('content'),
            "sale"        =>  postInput('sale')


        ];

        $error = [];

        if (postInput('name') == '') {
            $error['name'] = 'Mời nhập đầy đủ tên danh mục';
        }

        if (postInput('category_id') == '') {
            $error['category_id'] = 'Mời bạn chọn tên danh mục';
        }

        if (postInput('price') == '') {
            $error['price'] = 'Mời nhập giá sản phẩm';
        }

        if (postInput('content') == '') {
            $error['content'] = 'Mời nhập nội dung';
        }

        if (postInput('number') == '') {
            $error['number'] = 'Mời nhập số lượng sp';
        }

        //nếu không có lỗi
        if (empty($error)) {
            
           if( isset($_FILES['thunbar']))
            {
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_erro = $_FILES['thunbar']['error'];


                if ($file_erro == 0) {
                    $path = ROOT ."product/";
                    $data['thunbar'] = $file_name;
                }
                
            }
            $update = $db->update('product',$data,array("id" => $id));
            if($update > 0 )
            {
            	move_uploaded_file($file_tmp, $path.$file_name);
                $_SESSION['success'] = "Cập nhật thành công";
                redirectAdmin('product');
            }
            else {
            	$_SESSION['error'] = "Cập nhật thất bại";
            	redirectAdmin('product');
            }
        }
    }

    
    
 ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm mới sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li>
                  <a href="">Sản phẩm</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Sửa
            </li>
            
        </ol>
        
        <div class="clearfix"></div>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Danh mục sản phẩm</label>
                <div class="col-sm-8">

                    <select class="form-control col-sm-8" name="category_id">
                        <option value="">-Chọn danh mục sản phẩm-</option>
                        <?php foreach ($category as $item): ?>
                            <option value="<?php echo $item['id']?>" <?php echo $Editproduct['category_id'] == $item['id'] ? "selected = 'selected'" : '' ?>><?php echo $item['name']; ?></option>
                        <?php endforeach ?>
                    </select>

                    <?php if (isset($error['category_id'])): ?>
                    <p class="text-danger"><?php echo $error['category_id']; ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Tên sản phẩm" name="name" value="<?php echo $Editproduct['name'] ?>">
                    <?php if (isset($error['name'])): ?>
                    <p class="text-danger"><?php echo $error['name']; ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Giá sản phẩm</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="1.000.000" name="price" value="<?php echo $Editproduct['price'] ?>">
                    <?php if (isset($error['price'])): ?>
                    <p class="text-danger"><?php echo $error['price']; ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Số lượng</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputEmail3" placeholder=0 name="number" value="<?php echo $Editproduct['number'] ?>">
                    <?php if (isset($error['number'])): ?>
                    <p class="text-danger"><?php echo $error['number']; ?></p>
                    <?php endif ?>
                </div>
            </div>



            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Giảm giá</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="15 %" name="sale" value="<?php echo $Editproduct['sale'] ?>">
                    
                </div>

                <label for="inputEmail3" class="col-sm-1 control-label">Hình ảnh</label>
                <div class="col-sm-4">
                    <input type="file" class="form-control" id="inputEmail3"  name="thunbar">
                    <?php if (isset($error['thunbar'])): ?>
                    <p class="text-danger"><?php echo $error['thunbar']; ?></p>
                    <?php endif ?>
                    <img src="<?php echo uploads() ?>product/<?php echo $Editproduct['thunbar'] ?>" width="50px" height="50px">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 control-label">Nội dung</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="content" rows="4"><?php echo $Editproduct['content'] ?></textarea>
                    <?php if (isset($error['content'])): ?>
                    <p class="text-danger"><?php echo $error['content']; ?></p>
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