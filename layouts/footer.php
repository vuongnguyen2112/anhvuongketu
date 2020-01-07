        </div>
                <!-- <div class="container">
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo base_url() ?>/public/frontend/images/free-shipping.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo base_url() ?>/public/frontend/images/guaranteed.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo base_url() ?>/public/frontend/images/deal.png"></a>
                    </div>
                </div> -->
                <div class="container-pluid">
                    <section id="footer" >
                        <div class="container">
                            <div class=" col-md-3 col-md-offset-9" id="shareicon">
                                <ul>
                                    <li>
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8" id="title-block">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="footer-button">
                        <div class="container-pluid">
                            <div class="container">
                                <div class="col-md-3" id="ft-about">
                                    <img src="<?php echo base_url() ?>/public/frontend/images/mywebsite.png" width="250px" height="130px;">
                                   
                                </div>
                                <div class="col-md-3 box-footer" >
                                    <h3 class="tittle-footer">Liên hệ  Thông tin</h3>
                                    <ul>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> DH GTVT, Q12 , TP.HCM </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Sdt: 1234567890 </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Email : abc@Gmail.com </a>
                                        </li>
                                      
                                    </ul>
                                </div>
                                <div class="col-md-3 box-footer">
                                    <h3 class="tittle-footer">Khách hàng  Hỗ trợ</h3>
                                    <ul>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Câu hỏi</a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i>Hình thức thanh toán </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-angle-double-right"></i>
                                            <a href=""><i></i> Hướng dẫn </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="col-md-3" id="footer-support">
                                    <h3 class="tittle-footer"> Liên hệ</h3>
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> 50 TCH, Q.12, TPHCM </p>
                                            <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 012345678</p>
                                            <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> support@gmail.com</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="ft-bottom">
                        <p class="text-center">Copyright © 2019 . Design by Team DVH !!! </p>
                    </section>
                </div>
            </div>
        </div>
        </div>      
        </div>
        <script  src="<?php echo base_url() ?>public/frontend/js/slick.min.js"></script>
    </body>
</html>
<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })

    $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e) {
            e.preventDefault();
            $qty = $(this).parents("tr").find(".qty").val();

            $key = $(this).attr("data-key");

            console.log($key);
            $.ajax({
                url: 'cap-nhat-gio-hang.php',
                type: 'GET',
                data: {'qty':$qty, 'key':$key},
                success:function(data)
                {
                    if (data == 1) 
                    {
                        alert("Bạn đã cập nhật giỏ hàng thành công!");
                        location.href='gio-hang.php';
                    }
                    else
                    {
                        alert('Xin lỗi! Số lượng bạn mua vượt quá số lượng hàng có trong kho!');
                        location.href='gio-hang.php';
                    }


                }
            });
            
        })
    }) 
</script>