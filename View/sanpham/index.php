<?php
    include ('../../Model/connection.php');
    include ('../../Controller/showsanpham.php');
    $p = new showsanpham_controller;
    $tieude = $p->getName();
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
    include('../menu.php');
    ?>
    <div id="magik-slideshow" class="magik-slideshow">
      <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
          <ul>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='../images/slide-img1.jpg'><img src='../../images/slideshow_1.jpg' alt="slide1" width="100%" height="100%"/></li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='../images/slide-img2.jpg'><img src='../../images/slideshow_2.jpg' alt="slide1" width="100%" height="100%"/></li>
          </ul>
        </div>
      </div>
    </div>
   
    <?php

    for($i = 0 ; $i <sizeof($tieude); $i ++){
      echo'<div class="featured-pro container wow bounceInUp animated">
      <div class="slider-items-products">
        <div class="new_title center">
          <h2>'.$tieude[$i]['TenMuc'].'</h2>
        </div>
        <div id="featured-slider" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col4 products-grid">';
        for ($j = 0 ; $j < sizeof ($ketquasp) ; $j ++){
          if ($ketquasp[$j]['LoaiShow']==$tieude[$i]['MaHang']){
          echo '<div class="item">
                  <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"> <a class="product-image" title="Sample Product" href="chitietsp.php?SP='.$ketquasp[$j]['MaSanPham'].'"> <img width=200 height=200 alt="Sample Product" src="../../products-images/'.$ketquasp[$j]['Anh'].'"> </a>
                      </div>
                    </div>
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title"> <a title="Sample Product" href="chitietsp.php?SP='.$ketquasp[$j]['MaSanPham'].'"> '.$ketquasp[$j]['TenSanPham'].' </a> </div>
                        <div class="item-content">
                          <div class="item-price">
                            <div class="price-box"> <span class="regular-price"> <span class="price">'.number_format($ketquasp[$j]['Gia'], 0, ',', ',').' VNĐ</span> </span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>'; }}
          
       echo '</div>
      </div>
        
      </div>
    </div>';

    }

    
   

    // $sql = "select * from showsanpham where TrangThai = 1" ;
    // $rs = mysqli_query($con,$sql);
    // while ($row=mysqli_fetch_array($rs)){
    //   echo'<div class="featured-pro container wow bounceInUp animated">
    //         <div class="slider-items-products">
    //           <div class="new_title center">
    //             <h2>'.$row['TenMuc'].'</h2>
    //           </div>
              // <div id="featured-slider" class="product-flexslider hidden-buttons">
              //   <div class="slider-items slider-width-col4 products-grid">';
              //     $sqls = "select * from sanpham where LoaiShow = '".$row['MaHang']."' and TrangThai = 1";
              //     $rss = mysqli_query($con,$sqls);
              //     while ($rows=mysqli_fetch_array($rss)){
              //     echo '<div class="item">
              //             <div class="item-inner">
              //               <div class="item-img">
              //                 <div class="item-img-info"> <a class="product-image" title="Sample Product" href="chitietsp.php?SP='.$rows['MaSanPham'].'"> <img alt="Sample Product" src="../products-images/'.$rows['Anh'].'"> </a>
              //                 </div>
              //               </div>
              //               <div class="item-info">
              //                 <div class="info-inner">
              //                   <div class="item-title"> <a title="Sample Product" href="chitietsp.php?SP='.$rows['MaSanPham'].'"> '.$rows['TenSanPham'].' </a> </div>
              //                   <div class="item-content">
              //                     <div class="item-price">
              //                       <div class="price-box"> <span class="regular-price"> <span class="price">'.number_format($rows['Gia'], 0, ',', ',').' VNĐ</span> </span> </div>
              //                     </div>
              //                   </div>
              //                 </div>
              //               </div>
              //             </div>
              //           </div>'; }
                  
              //  echo '</div>
              // </div>
    //         </div>
    //       </div>';} ?>

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
    include('../footer.php');
    ?>
    <!--  -->

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
        jQuery('#rev_slider_4').  show().revolution({
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