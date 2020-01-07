
<?php 
    require_once __DIR__. "/autoload/autoload.php"; 

    // unset($_SESSION['cart']);
    $sqlHomeCate = "SELECT name,id FROM category WHERE home = 1 ORDER BY update_at";
    $CategoryHome = $db->fetchsql($sqlHomeCate);

    $data = [];

    foreach ($CategoryHome as $item) {
        $categoId = intval($item['id']);
        
        $sql = "SELECT * FROM product WHERE category_id = $categoId";
        $ProductHome = $db ->fetchsql($sql);
        $data[$item['name']] = $ProductHome; 
    }
?>
    <?php require_once __DIR__. "/layouts/header.php"; ?>

<!--             <div id="maincontent">
 -->                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                            <!-- <ul>
                                <li>
                                    <a href="">Máy tính  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">Máy giặt  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">Đồ điện  <span class="badge pull-right">14</span></a>
                                </li>
                                <li>
                                    <a href=""> Thiết bị văn phòng  <span class="badge pull-right">14</span> </a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                            <ul>
                                <?php foreach ($category as $item): ?>
                                    <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm hot </h3>
                            
                            <ul>
                                <?php foreach ($productNew as $item): ?>
                                    <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name'] ?></p >
                                            <b class="price">Giảm giá: <?php echo formatSalePrice($item['price'],$item['sale']) ?></b><br>
                                            <b class="sale">Giá gốc: <?php echo formatPrice($item['price']) ?></b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 1000 : <i class="fa fa-heart-o"></i> 120</span>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach ?>
                                                                
                            </ul>
                            <!-- </marquee> -->
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                            <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo base_url() ?>/public/frontend/images/corsairiron.jpeg" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> Chuột Corsair IRONCLAW RGB</p >
                                            <b class="price">Giảm giá: 1.390.000 đ</b><br>
                                            <b class="sale">Giá gốc: 1.690.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo base_url() ?>/public/frontend/images/corsairk63.jpg" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name">BÀN PHÍM CORSAIR K63 WIRELESS ( KHÔNG DÂY )</p >
                                            <b class="price">Giảm giá: 1.890.000 đ</b><br>
                                            <b class="sale">Giá gốc: 1.990.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>                                            
                                        </div>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo base_url() ?>/public/frontend/images/sm680r.jpg" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> Bàn phím cơ Fuhlen SM680R RGB</p >
                                            <b class="price">Giảm giá: 820.000 đ</b><br>
                                            <b class="sale">Giá gốc: 850.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo base_url() ?>/public/frontend/images/taiblue.jpg" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name">Tai nghe Bluetooth 4.1 tích hợp nam châm</p >
                                            <b class="price">Giảm giá: 60.000 đ</b><br>
                                            <b class="sale">Giá gốc: 60.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!-- </marquee> -->
                        </div>
                    </div>


    <div class="col-md-9 bor">
        <section class="box-main1">
            <?php foreach ($data as $key => $value): ?>
                <h3 class="title-main"><a href=""><?php echo $key ?></a> </h3>
            <div class="showitem">
                <?php foreach ($value as $item): ?>
                    <div class="col-md-3 item-product bor">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                        </a>
                        <div class="info-item">
                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                            <p><strike class="sale"><?php echo formatPrice($item['price']); ?></strike> <b class="price"><?php echo formatSalePrice($item['price'],$item['sale']); ?></b></p>
                        </div>
                        <div class="hidenitem">
                            <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                            <p><a href=""><i class="fa fa-heart"></i></a></p>
                            <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                        </div>
                    </div>
                <?php endforeach ?>
                               
            </div>
            <?php endforeach ?>
            
        </section>
    </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>          