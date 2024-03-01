<?php
    session_start();
    include ("../../Controller/danhmuc.php");
	$p= new danhmuc_controller;
    $danhmuc = $p->getAll();
    include ("../../Controller/sanpham.php");
	$m= new sanpham_controller;
    $sanpham = $m->getOnly();   
    $ketquasp = $m->getshow();
    $fullsp = $m->getAll();
    include ("../../Controller/thuonghieu.php");
	$l= new thuonghieu_controller;
    $kq =$l->getAll();
?>
<header>
    <div class="header-container">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7" style="margin-top: 5px;">
                        <div class="toplinks pull-right">
                            <div class="links">
                                <!-- <div class="demo"><a title="Register" href="register.php"><span class="hidden-xs">Đăng Ký</span></a></div>
                                <div class="login"><a href="login.php"><span class="hidden-xs">Đăng Nhập</span></a></div> -->
                             <?php   if(isset($_SESSION['MaTaiKhoan'])){
                                        if($_SESSION['Quyen']=='0'){
                                            echo '<div class="login"><a href="../history/history.php"><span class="hidden-xs">Xem Lịch Sử</span></a></div>
                                            <div class="login"><a href="../login-register/account.php"><span class="hidden-xs">'.$_SESSION['Holot'].' '.$_SESSION['Ten'].'</span></a></div>
                                            <div class="login"><a href="../login-register/logout.php"><span class="hidden-xs">Đăng Xuất</span></a></div>';
                                        }
                                        if($_SESSION['Quyen']=='2'){
                                            echo '<div class="login"><a href="../../AdminGearGaming/View/thukhodh.php"><span class="hidden-xs">Quản lý</span></a></div>
                                            <div class="login"><a href="../history/history.php"><span class="hidden-xs">Xem Lịch Sử</span></a></div>
                                            <div class="login"><a href="../login-register/logout.php"><span class="hidden-xs">Đăng Xuất</span></a></div>';
                                        }
                                        else if($_SESSION['Quyen']=='1'){
                                            echo '<div class="login"><a href="../../AdminGearGaming/View/index.php"><span class="hidden-xs">Quản lý</span></a></div>
                                            <div class="login"><a href="../history/history.php"><span class="hidden-xs">Xem Lịch Sử</span></a></div>
                                            <div class="login"><a href="../login-register/logout.php"><span class="hidden-xs">Đăng Xuất</span></a></div>';
                                        }
                                    }
                                else {
                                    echo '<div class="login"><a href="../login-register/register.php"><span class="hidden-xs">Đăng kí</span></a></div>
                                    <div class="login"><a href="../login-register/login.php"><span class="hidden-xs">Đăng Nhập</span></a></div>';
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="search">
                            <form method="post" enctype="multipart/form-data" action="../../../WebGearGaming/View/sanpham/search.php" id="search_mini_form" name="Categories">
                                <input type="text" placeholder="Nhập tên sản phẩm ..." maxlength="70" name="search" id="search">
                                <button type="submit" class="search-btn-bg"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-sm-3 col-xs-12 col-md-2">
                        <!-- Header Logo -->
                        <div class="logo"><a title="Magento Commerce" href="../../../WebGearGaming/View/index.php"><img class="col-xs-12" alt="Magento Commerce" src="../../images/LogoGear.png"></a></div>
                        <!-- End Header Logo -->
                    </div>
                    <!-- Navbar -->

                    <div class="nav-inner">
                        <ul id="nav" class="hidden-xs">
                            <li class="level0 parent drop-menu active"><a href="../../../WebGearGaming/View/index.php"><span>Home</span></a></li>
                            <li class="level0 parent drop-menu active"><a href="#" ><span>DANH MỤC</span></a>
                                <ul class="level1">
                                    <?php
                                        for($i = 0 ; $i < sizeof($danhmuc); $i++){
                                            echo '<li class="level1 first"><a href="../sanpham/danhmuc.php?DM='.$danhmuc[$i]['MaDanhMuc'].'"><span>'.$danhmuc[$i]['TenDanhMuc'].'</span></a></li>';
                                        }
                                ?>
                                    </ul>
                                </li>
                                <li class="mega-menu"><a href="#" class="level-top"><span>THƯƠNG HIỆU</span></a>
                                    <div style="left: 0px; display: none;" class="level0-wrapper dropdown-6col">
                                        <div class="container">
                                        <div class="level0-wrapper2">
                                            <div class="nav-block nav-block-center">
                                                <ul class="level0">
                                                <?php
                                                    for($j=0;$j<sizeof($kq);$j++){
                                                        for($o=0;$o<sizeof($sanpham);$o++){
                                                            if($sanpham[$o]==$kq[$j]['MaThuongHieu']){
                                                             echo '<li class="level2 nav-6-1-1"><a href="../sanpham/thuonghieu.php?TH='.$sanpham[$o].'" class=""><span>'.$kq[$j]['TenThuongHieu'].'</span></a></li>';
                                                            break;
                                            }}}?>
                                                </ul>
                                            </div>
                                            <!--nav-block nav-block-center-->
                                        </div>
                                        <!--level0-wrapper2--> </div>
                                    </div>
                                    </li>
                            </ul>
                       
                            <a href="../cart/shopping_cart.php">
                            <div class="top-cart-contain pull-right">
                                <!-- Top Cart -->
                                <div class="mini-cart">
                                    <div  class="basket dropdown-toggle"><a href="#"></a></div>
                                </div>
                            </div>
                            </a>
                        </div>

                    <!-- end nav -->

                </div>
            </div>
        </div>
    </div>
</header>