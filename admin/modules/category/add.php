
<?php 
    $open = 'category';
    require_once __DIR__. "/../../autoload/autoload.php";

    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $data = 
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name'))


        ];

        $error = [];

        if (postInput('name') == '') {
            $error['name'] = 'Mời nhập đầy đủ tên danh mục';
        }

        //nếu không có lỗi
        if (empty($error)) {
            
            $isset = $db->fetchOne("category","name = '".$data['name']."' ");
            if(count($isset) > 0)
            {
                $_SESSION['error'] = "Tên danh mục đã tồn tại!";
            }
            else {

                $id_insert = $db->insert("category",$data);
            if ($id_insert > 0) {
                $_SESSION['success'] = 'Thêm mới thành công';
                redirectAdmin('category');
            }
            else {
                $_SESSION['error'] = 'Thêm mới thất bại';
            }
            }
            
        }
    }

    
    
 ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm mới danh mục
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li>
                  <a href="">Danh mục</a>
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
                <label for="inputEmail3" class="col-sm-1 col-form-label">Tên danh mục</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name="name">
                    <?php if (isset($error['name'])): ?>
                    <p class="text-danger"><?php echo $error['name']; ?></p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-offset-1 col-sm-8">
                    <button type="submit" class="btn btn-success">Sign in</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>