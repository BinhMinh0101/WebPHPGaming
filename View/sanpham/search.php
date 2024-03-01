<?php
error_reporting(0);
ob_start();
include('../../Model/connection.php');
include('../menu.php');
$spoke = $m->getDone();
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../images/Logogear.ico">
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
    if ($_REQUEST['search'] == "") {
      echo '<div id="page"> 
      <div class="main-container col2-left-layout bounceInUp animated">
        <div class="container">
          <div class="row">
              <article class="col-main">
                <div class="page-header">
                  <h2>TÌM KIẾM</h2>
                </div>
                <h5>Kết quả tìm kiếm cho "**".</h5>
                <div class="category-products">
                  <ul class="products-grid">';
      for ($j = 0; $j < sizeof($fullsp); $j++) {
        echo '<li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                      <div class="item-inner">
                        <div class="item-img">
                          <div class="item-img-info"> <a href="chitietsp.php?SP=' . $fullsp[$j]['MaSanPham'] . '" title="Sample Product" class="product-image"> <img width=200 height=250 src="../../products-images/' . $fullsp[$j]['Anh'] . '" alt="Sample Product"> </a>
                          </div>
                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a href="product_detail.html" title="Sample Product">' . $fullsp[$j]['TenSanPham'] . '</a> </div>
                            <div class="item-content">
                              <div class="item-price">
                                <div class="price-box"> <span class="regular-price" id="product-price-1"> <span class="price">' . number_format($fullsp[$j]['Gia'], 0, ',', ',') . ' VNĐ</span> </span> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>';
      }
      echo '</ul>
                </div>
              </article>
              <!--	///*///======    End article  ========= //*/// --> 
            </div>
          </div>
      </div>';
    } else {
      if (empty($spoke)) {
        echo '<div id="page"> 
        <div class="main-container col2-left-layout bounceInUp animated">
          <div class="container">
            <div class="row">
                <article class="col-main">
                  <div class="page-header">
                    <h2>TÌM KIẾM</h2>
                  </div>
                  <h3>Không có kết quả nào phù hợp</h3>
                </article>
                <!--	///*///======    End article  ========= //*/// --> 
              </div>
            </div>
        </div>';
      } else {
        echo '<div id="page"> 
      <div class="main-container col2-left-layout bounceInUp animated">
        <div class="container">
          <div class="row">
              <article class="col-main">
                <div class="page-header">
                  <h2>TÌM KIẾM</h2>
                </div>
                <h5>Kết quả tìm kiếm cho "' . $_REQUEST['search'] . '"</h5>
                <div class="category-products">
                  <ul class="products-grid">';
        for ($i = 0; $i < sizeof($spoke); $i++) {
          echo '<li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                      <div class="item-inner">
                        <div class="item-img">
                          <div class="item-img-info"> <a href="chitietsp.php?SP=' . $spoke[$i]['MaSanPham'] . '" title="Sample Product" class="product-image"> <img width=200 height=250 src="../../products-images/' . $spoke[$i]['Anh'] . '" alt="Sample Product"> </a>
                          </div>
                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a href="product_detail.html" title="Sample Product">' . $spoke[$i]['TenSanPham'] . '</a> </div>
                            <div class="item-content">
                              <div class="item-price">
                                <div class="price-box"> <span class="regular-price" id="product-price-1"> <span class="price">' . number_format($spoke[$i]['Gia'], 0, ',', ',') . ' VNĐ</span> </span> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>';
        }
        echo '</ul>
                </div>
              </article>
              <!--	///*///======    End article  ========= //*/// --> 
            </div>
          </div>
      </div>';
      }
    }
    include('../footer.php');
    ?>

    <!-- End Footer -->
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