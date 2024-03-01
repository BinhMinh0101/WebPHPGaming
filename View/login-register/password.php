<?php
    error_reporting(0);
    ob_start();
    session_start();
    include ('../../Model/connection.php');
    include('../menu.php');
?>
<!DOCTYPE html>
<html lang="en">

<!-- Tieu Long Lanh Kute -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons Icon -->
    <link rel="icon" href="images/Logogear.ico">
    <title>Tài khoản</title>

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/font-awesome.css" media="all">
    <link rel="stylesheet" type="text/css" href="../../css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="../../css/animate.css" media="all">
    <link rel="stylesheet" type="text/css" href="../../css/revslider.css">
    <link rel="stylesheet" type="text/css" href="../../css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../../css/owl.theme.css">
    <link rel="stylesheet" href="../../css/flexslider.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../css/jquery.mobile-menu.css">
    <link rel="stylesheet" type="text/css" href="../../css/jquery.bxslider.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200italic,300,300italic,400,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700,900' rel='stylesheet' type='text/css'>
</head>

<body class="cms-index-index cms-home-page">
    <div id="page">
        <section class="main-container col1-layout wow bounceInUp animated">
            <div class="main container">
                <div class="account-login">
                    <div class="page-title">
                        <h2>Đổi mật khẩu</h2>
                    </div>
                    <fieldset class="col2-set">
                        <div class="col-4 registered-users">
                            <form method="post">
                            <div class="content">
                                <?php
                                    include('../../Controller/taikhoan.php');
                                    $p=new taikhoan_controller;
                                ?>
                                <ul class="form-list">
                                    <li>
                                        <label for="mkcu">Mật khẩu cữ<span class="required">*</span></label>
                                        <br>
                                        <input type="password" name="mkcu" id="mkcu" class="input-text" value="">
                                    </li>
                                    <li>
                                        <label for="mkmoi">Mật khẩu mới<span class="required">*</span></label>
                                        <br>
                                        <input type="password" name="mkmoi" id="mkmoi" class="input-text" value="">
                                    </li>
                                    <li>
                                        <label for="xn">Xác nhận mật khẩu<span class="required">*</span></label>
                                        <br>
                                        <input type="password" class="input-text" name="xn" id="xn" value="">
                                    </li>
                                </ul>
                                <div class="buttons-set">
                                    <button id="nut" name="nut" type="submit" class="button" value="Sua"><span> Đổi mật khẩu</span></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </fieldset>
                    <?php
                    $matk=$_SESSION['MaTaiKhoan'];
                    switch($_POST['nut']){
                        case 'Sua':{
                            if($_REQUEST['mkcu']=="" || $_REQUEST['mkmoi']=="" || $_REQUEST['xn']==""){
                                echo "Vui lòng nhập đầy đủ để thay đổi mật khẩu";
                            }
                            else{
                                $matkhau = ['Matkhaucu' => $_REQUEST['mkcu'],'Matkhaumoi' => $_REQUEST['mkmoi'], 'Xacnhan' => $_REQUEST['xn']];
                                $p->changePass($matk,$matkhau);
                            }
                        }
                    }
                    ?>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </section>

        <!-- <div class="brand-logo">
      <div class="container">
        <div class="slider-items-products">
          <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col6">
              <div class="item"><a href="#"><img src="images/b-logo1.png" alt="Image"></a> </div>
              <div class="item"><a href="#"><img src="images/b-logo2.png" alt="Image"></a> </div>
              <div class="item"><a href="#"><img src="images/b-logo3.png" alt="Image"></a> </div>
              <div class="item"><a href="#"><img src="images/b-logo4.png" alt="Image"></a> </div>
              <div class="item"><a href="#"><img src="images/b-logo5.png" alt="Image"></a> </div>
              <div class="item"><a href="#"><img src="images/b-logo6.png" alt="Image"></a> </div>
              <div class="item"><a href="#"><img src="images/b-logo1.png" alt="Image"></a> </div>
              <div class="item"><a href="#"><img src="images/b-logo4.png" alt="Image"></a> </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
        <!-- Footer -->

        <?php
        include('../footer.php')
        ?>

    </div>

    <!-- End Footer -->
    <!-- JavaScript -->
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/parallax.js"></script>
    <script type="text/javascript" src="../../js/common.js"></script>
    <script type="text/javascript" src="../../js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="../../js/jquery.mobile-menu.min.js"></script>
</body>

<!-- Tieu Long Lanh Kute -->

</html>