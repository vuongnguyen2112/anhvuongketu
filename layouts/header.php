<!DOCTYPE html>
<html>
    <head>
        <title>DVH : Đồ án web</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
    </head>
    <body style = "width: 100%;">
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if (isset($_SESSION['name_user'])): ?>
                                            <li style="color: red"><?php echo $_SESSION['name_user'] ?></li>
                                            <li>
                                                <a href=""><i class="fa fa-user">&nbsp</i> Tài khoản<i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="profile.php?id=<?php echo $_SESSION['name_id'] ?>">Thông tin</a></li>
                                                    <li><a href="gio-hang.php">Giỏ hàng</a></li>
                                                    <li><a href="thoat.php"><i class="fa fa-share-square-o"></i>Thoát</a></li>
                                                </ul>
                                            </li>
                                            
                                        <?php else: ?>
                                            <div style = "margin-right: 10px;">
                                                <li>
                                                    <a href="dang-nhap.php"><i class="fa fa-unlock"></i> Đăng nhập</a>
                                                </li>
                                                <li>
                                                    <a href="dang-ky.php"><i class="fa fa-user"></i> Đăng ký </a>                                                    
                                                </li>
                                            </div>
                                            
                                        <?php endif ?>
                                        

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control">
                                            <option> All Category</option>
                                            <option> Dell </option>
                                            <option> Hp </option>
                                            <option> Asus </option>
                                            <option> Apple </option>
                                        </select>
                                    </label>
                                    <input type="text" name="keywork" placeholder=" input keywork" class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>-->
                        <div class="col-md-4">
                            <a href="index.php">
                            <img src="<?php echo base_url() ?>/public/frontend/images/mywebsite.png" width="200px" height="60px">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p style="color: yellow;">0986420994</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!--END HEADER-->
            <!--MENUNAV-->
            <div id="menunav"> 
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li class="<?php isset($open) && $open == 'baohanh' ? 'active' : '' ?>">
                                <a href="baohanh.php">Chính sách bảo hành</a>
                            </li>
                            <li>
                                <a href="baohanh.php">Chính sách vận chuyển</a>
                            </li>
                            <li>
                                <a href="hotro.php">Hỗ trợ</a>
                            </li>
                            <li>
                                 <a href="chinhsuafilename.php">Sửa file name</a>
                            </li>
                            
                        </ul>
                        <!-- end menu main-->
                        <!--Shopping-->
                        <!-- <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href=""><i class="fa fa-shopping-basket"></i> My Cart </a>
                            </li>
                        </ul> -->
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
 <!--           <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                             <ul>
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
                            </ul> 
                            <ul>
                                <?php foreach ($category as $item): ?>
                                    <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                            
                            <ul>
                                <?php foreach ($productNew as $item): ?>
                                    <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name'] ?></p >
                                            <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                            <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach ?>
                                                                
                            </ul>
                             </marquee>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                             <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > 
                            <ul>
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo base_url() ?>/public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                            <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                            <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo base_url() ?>/public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                            <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                            <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>                                            
                                        </div>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo base_url() ?>/public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                            <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                            <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="">
                                        <img src="<?php echo base_url() ?>/public/frontend/images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                            <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                            <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                             </marquee> 
                        </div>
                    </div>-->