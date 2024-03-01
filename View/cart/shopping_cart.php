<?php
// error_reporting(0);
// ob_start();
// session_start();
include('../../Model/connection.php');
include('../menu.php');
include('../../Controller/cart_C.php');
$cartController = new Cart_C();
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
    <section class="main-container col1-layout wow bounceInUp animated">
      <div class="main container">
        <div class="col-main">
          <div class="cart">
            <div class="page-title">
              <h2>Giỏ Hàng</h2>
            </div>
            <div class="table-responsive">
              <form method="post">
                <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
                <fieldset>
                  <table class="data-table cart-table" id="shopping-cart-table">
                    <thead>
                      <tr class="first last">
                        <th rowspan="1">&nbsp;</th>
                        <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
                        <th colspan="1" class="a-center"><span class="nobr">Giá</span></th>
                        <th class="a-center " rowspan="1">Số lượng</th>
                        <th colspan="1" class="a-center">Tổng đơn giá</th>
                        <th class="a-center" rowspan="1">&nbsp;</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="first last">
                        <button class="button btn-update" title="Update Cart" value="update_qty" name="updateCart" type="submit"><span>Update Cart</span></button>
                        <button id="empty_cart_button" class="button" title="Clear Cart" name="clearCart" type="submit"><span>Clear Cart</span></button>
                        </td>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        $tongTienGioHang = 0;
                        foreach ($_SESSION['cart'] as $item) {
                      ?>
                          <tr class="first odd">
                            <td class="image"><a class="product-image" title="Sample Product" href="../sanpham/Chitietsp.php?SP=<?= $item['ProductID'] ?>"><img width="75" alt="Sample Product" src="../../products-images/<?= $item['Image'] ?>"></a></td>
                            <td>
                              <h2 class="product-name"> <a href="../sanpham/Chitietsp.php?SP=<?= $item['ProductID'] ?>"><?= $item['ProductName'] ?></a> </h2>
                            </td>
                            <td class="a-center hidden-table"><span class="cart-price"> <span class="price"><?= number_format($item['Price'], 0, ',', ',') ?></span> </span></td>
                            <td class="a-center movewishlist"><input name="slCart[<?= $item['ProductID'] ?>]" type="number" min=1 maxlength="12" class="input-text qty" title="Qty" size="4" value="<?= $item['Quantity'] ?>"></td>
                            <td class="a-center movewishlist"><span class="cart-price"> <span class="price"><?= number_format($item['Price'] * $item['Quantity'], 0, ',', ',') ?></span> </span></td>
                            <td class="a-center last"><a class="btn" href="shopping_cart.php?action=deleteProduct&idProduct=<?= $item['ProductID'] ?>">Xóa</a></td>
                          </tr>
                          <input type="text" name="idProduct" value="<?= $item['ProductID'] ?>" hidden>
                      <?php
                          $tongTienGioHang += $item['Quantity'] * $item['Price'];
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </fieldset>
              </form>
            </div>
            <!-- BEGIN CART COLLATERALS -->
            <?php
              if (isset($_SESSION['cart'])) {
                ?>
                  <div class="cart-collaterals row">
                    <div class="totals col-sm-5 pull-right">
                      <h3>Tổng giỏ hàng</h3>
                      <div class="inner">
                        <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                          <tfoot>
                            <tr>
                              <td colspan="1" class="a-left"><strong>Tổng Tiền</strong></td>
                              <td class="a-right"><strong><span class="price"><?= number_format($tongTienGioHang, 0, ',', ',') ?></span></strong></td>
                            </tr>
                          </tfoot>
                          <tfoot>
                            <tr>
                              <td colspan="1" class="a-left">Giảm giá</td>
                              <td class="a-right"><strong><span class="price">0</span></strong></td>
                            </tr>
                          </tfoot>
                        </table>
                        <ul class="checkout">
                          <li>
                            <a class="btn btn-proceed-checkout" title="Proceed to Checkout" type="button" href="check-out.php"><span>Thanh Toán</span></a>
                          </li>
                        </ul>
                      </div>
                      <!--inner-->
                    </div>
                  </div>
                <?php
              }
              else{
                ?>
                  <span class="alert alert-info">Bạn chưa có sản phẩm nào trong giỏ hàng</span>
                <?php
              }
            ?>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <?php
    include('../footer.php');
    ?>
  </div>
  <!--  -->
  <?php
  if (isset($_REQUEST['clearCart'])) {
    $cartController->xoaGioHang();
    header('location:shopping_cart.php');
  }
  if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'deleteProduct') {
    $cartController->xoaSanPham($_REQUEST['idProduct']);
    header('location:shopping_cart.php');
  }

  if (isset($_REQUEST['updateCart'])) {
    $cartController->capNhatGioHang($_REQUEST['slCart']);
    header('location:shopping_cart.php');
  }

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
  <script type='text/javascript'>
    jQuery(document).ready(function() {
      jQuery('#rev_slider_4').show().revolution({
        dottedOverlay: 'none',
        delay: 5000,
        startwidth: 1920,
        startheight: 650,

        hideThumbs: 200,
        thumbWidth: 200,
        thumbHeight: 50,
        thumbAmount: 2,

        navigationType: 'thumb',
        navigationArrows: 'solo',
        navigationStyle: 'round',

        touchenabled: 'on',
        onHoverStop: 'on',

        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,

        spinner: 'spinner0',
        keyboardNavigation: 'off',

        navigationHAlign: 'center',
        navigationVAlign: 'bottom',
        navigationHOffset: 0,
        navigationVOffset: 20,

        soloArrowLeftHalign: 'left',
        soloArrowLeftValign: 'center',
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: 'right',
        soloArrowRightValign: 'center',
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,

        shadow: 0,
        fullWidth: 'on',
        fullScreen: 'off',

        stopLoop: 'off',
        stopAfterLoops: -1,
        stopAtSlide: -1,

        shuffle: 'off',

        autoHeight: 'off',
        forceFullWidth: 'on',
        fullScreenAlignForce: 'off',
        minFullScreenHeight: 0,
        hideNavDelayOnMobile: 1500,

        hideThumbsOnMobile: 'off',
        hideBulletsOnMobile: 'off',
        hideArrowsOnMobile: 'off',
        hideThumbsUnderResolution: 0,

        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        fullScreenOffsetContainer: ''
      });
    });
  </script>
</body>

<!-- Tieu Long Lanh Kute -->

</html>