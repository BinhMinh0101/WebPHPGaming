<?php
ob_start();
error_reporting(0);
include('../../Model/connection.php');
include('../../Controller/cart_C.php');
$cart = new Cart_C;
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="images/Logogear.ico">
  <title>Gear Gaming</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/font-awesome.css" media="all">
  <link rel="stylesheet" type="text/css" href="../../css/animate.css" media="all">
  <link rel="stylesheet" type="text/css" href="../../css/revslider.css">
  <link rel="stylesheet" type="text/css" href="../../css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="../../css/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="../../css/jquery.mobile-menu.css">
  <link rel="stylesheet" type="text/css" href="../../css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="../../css/style.css" media="all">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700,900' rel='stylesheet' type='text/css'>
</head>

<body class="cms-index-index cms-home-page">
  <div id="page">
    <?php
    include('../menu.php');
    $sprd = $m->LayRandom();
    ?>

    <div class="breadcrumbs bounceInUp animated">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <ul>
              <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>» </span></li>
              <?php
              $id = $_GET['SP'];
              for ($j = 0; $j < sizeof($fullsp); $j++) {
                if ($fullsp[$j]['MaSanPham'] == $id) {
                  $Anh = $fullsp[$j]['Anh'];
                  $Mota = str_replace(';', '<br>', $fullsp[$j]['MoTa']);
                  $SoLuongDangCo = $fullsp[$j]['SoLuong'];
                  $Tensanpham = $fullsp[$j]['TenSanPham'];
                  $Gia = $fullsp[$j]['Gia'];
                  $MaThuongHieus = $fullsp[$j]['MaThuongHieu'];
                  $MaDanhMucs = $fullsp[$j]['MaDanhMuc'];
                }
              }
              for ($i = 0; $i < sizeof($danhmuc); $i++) {
                if ($danhmuc[$i]['MaDanhMuc'] == $MaDanhMucs)
                  $Tdm = $danhmuc[$i]['TenDanhMuc'];
              }
              for ($j = 0; $j < sizeof($kq); $j++) {
                if ($MaThuongHieus == $kq[$j]['MaThuongHieu']) {
                  $Tth = $kq[$j]['TenThuongHieu'];
                }
              }
              echo '<li class=""> <a title="Go to Home Page" href="danhmuc.php?DM=' . $MaDanhMucs . '" >' . $Tdm . '</a><span>» </span></li><li class="category13"><a href="thuonghieu.php?TH=' . $MaThuongHieus . '" title="Go to Home Page" ><strong>' . $Tth . '</strong></a></li>';
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--<h2>SAN PHAM</h2>-->
    <div class="main-container col1-layout">
      <div class="main container">
        <div class="col-main">
          <div class="row">
            <div class="product-view">

              <div class="product-essential">
                <form method="post" id="product_addtocart_form">
                  <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                  <div class="product-img-box col-sm-5 col-xs-12 bounceInRight animated">
                    <div class="new-label new-top-left"> New </div>
                    <div class="product-image">
                      <?php echo '<div class="large-image"> <a href="../../products-images/' . $Anh . '" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img alt="Thumbnail" src="../../products-images/' . $Anh . '"> </a> </div>'; ?>
                    </div>
                    <!-- end: more-images -->
                  </div>
                  <div class="product-shop col-sm-7 col-xs-12 bounceInUp animated">
                    <div class="product-name">
                      <?php echo '<h2>' . $Tensanpham . '</h2>'; ?>
                    </div>
                    <div class="short-description">
                      <!--<h2>Quick Overview</h2>-->
                      <?php echo '<p>' . $Mota . '</p>'; ?>
                    </div>
                    <div class="price-block">
                      <div class="price-box">
                        <?php echo '<p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price">' . number_format($Gia, 0, ',', ',') . ' VNĐ </span> </p>'; ?>
                      </div>
                    </div>
                    <div class="add-to-box">
                      <div class="add-to-cart">
                        <label for="qty">Số Lượng:</label>
                        <div class="pull-left">
                          <div class="custom pull-left">
                            <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                            <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                            <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                          </div>
                        </div>
                        <button type="submit" name="buySubmit" class="button btn-cart" title="Add to Cart"><span><i class="icon-basket"></i>Thêm vào giỏ hàng</span></button>
                      </div>
                    </div>
                    <input type="text" value="<?= $id ?>" name="id" hidden>
                    <input type="text" value="<?= $Anh ?>" name="image" hidden>
                    <input type="text" value="<?= $Tensanpham ?>" name="productName" hidden>
                    <input type="text" value="<?= $Gia ?>" name="price" hidden>
                    <!-- so luong co tren input o tren name="qty" -->
                  </div>
                </form>
              </div>

              <div class="related-slider col-lg-12 col-xs-12 bounceInDown animated">
                <h1> XEM CÁC SẢN PHẨM KHÁC</h1>
              </div>
            </div>
          </div>
          <?php

          echo '<div class="featured-pro container wow bounceInUp animated">
        <div class="slider-items-products">
          <div class="new_title center">
            <h2>XEM CÁC SẢN PHẨM KHÁC</h2>
          </div>
          <div id="featured-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4 products-grid">';
          for ($j = 0; $j < sizeof($sprd); $j++) {
            echo '<div class="item">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info"> <a class="product-image" title="Sample Product" href="chitietsp.php?SP=' . $sprd[$j]['MaSanPham'] . '"> <img width=200 height=200 alt="Sample Product" src="../../products-images/' . $sprd[$j]['Anh'] . '"> </a>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Sample Product" href="chitietsp.php?SP=' . $sprd[$j]['MaSanPham'] . '"> ' . $sprd[$j]['TenSanPham'] . ' </a> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">' . number_format($sprd[$j]['Gia'], 0, ',', ',') . ' VNĐ</span> </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
          }

          echo '</div>
        </div>
          
        </div>
      </div>';

          ?>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <?php
    include('../footer.php');
    ?>
    <!-- End Footer -->

    <?php
    if (isset($_REQUEST['buySubmit'])) {
      $id = $_REQUEST['id'];
      $ten = $_REQUEST['productName'];
      $soLuong = $_REQUEST['qty'];
      $hinhAnh = $_REQUEST['image'];
      $giaTien = $_REQUEST['price'];

      if ($soLuong > $SoLuongDangCo) //check 1 truong hop tren DB so luong = 0
        echo '<script>alert("Số lượng không đủ cung cấp")</script>';
      else {
        // vao ham check them 1 truong hop trong session co vuot qua so luong tren db hay kho
        if ($cart->themGioHang($id, $ten, $soLuong, $hinhAnh, $giaTien, $SoLuongDangCo) != 1) {
          echo "<script>alert('Số lượng không đủ để cung cấp')</script>";
        } else
          echo "<script>window.location='../cart/shopping_cart.php';</script>";
      }
    }
    ?>

    <!-- JavaScript -->
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/parallax.js"></script>
    <script type="text/javascript" src="../../js/revslider.js"></script>
    <script type="text/javascript" src="../../js/common.js"></script>
    <script type="text/javascript" src="../../js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.mobile-menu.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.bxslider.min.js"></script>
</body>

<!-- Tieu Long Lanh Kute -->

</html>