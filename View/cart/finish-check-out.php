<?php
    include ('../../Model/connection.php');
    include('../../Controller/donHang_C.php');
    $donHangController = new DonHang_C;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="icon" href="images/Logogear.ico">
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

<body>

    <div class="container" style="margin-top: 60px">
        <div class="title" style="margin-left: 95px; border-bottom: 2px dotted #111111;">
            <h1>GEAR GAMING</h1>
            <h3>Hoàn tất thanh toán</h3>
        </div>
        <div class="hero" style="display: flex; justify-content:space-around; margin-top: 30px">
            <div class="left">
                <h4>Quý khách đã thanh toán thành công !</h4>
                <br>
                <h4>Thông tin thanh toán:</h4>
                <br>
                <?php
                    $maDonHangVuaTao = $donHangController->maDonHangMoiNhat();
                    $thongTinDonHang = $donHangController->thongTinDonHang($maDonHangVuaTao);
                    $row = mysqli_fetch_array($thongTinDonHang);
                    ?>
                        <div class="info" style="font-size: 15px">
                            <strong>Họ Tên: </strong>
                            <p><?= $row['HoTen'] ?></p>
                            <strong>Email: </strong>
                            <p><?= $row['Email'] ?></p>
                            <strong>Số điện thoại: </strong>
                            <p><?= $row['Phone'] ?></p>
                            <strong>Địa chỉ: </strong>
                            <p><?= $row['DiaChi'] ?></p>
                            <strong>Tỉnh thành: </strong>
                            <p><?= $row['TinhThanh'] ?></p>
                            <strong>Quận/huyện: </strong>
                            <p><?= $row['QuanHuyen'] ?></p>
                            <strong>Phương thức giao hàng: </strong>
                            <p>Giao tận nơi</p>
                            <strong>Phương thức thanh toán: </strong>
                            <p>COD</p>
                        </div>
                    <?php
                ?>
                <div class="form-row">
                    <a class="btn" type="button" href="../index.php" style="border-radius: 10px; margin-top: 25px; float: right; margin-right: 15px;">
                        <span>Tranh chủ</sp>
                    </a>
                    <!-- <a class="btn" type="button" href="history.php" style="border-radius: 10px; margin-top: 25px; float: right; margin-right: 15px;">
                        <span>Xem lịch sử</span>
                    </a> -->
                </div>
            </div>
            <!-- <div class="right">
                <table class="data-table cart-table" id="shopping-cart-table">
                    <tbody>
                        <tr class="first odd">
                            <td class="image"><a class="product-image" title="Sample Product" href="product_detail.html"><img width="75" alt="Sample Product" src="products-images/product2.jpg"></a></td>
                            <td>
                                <h2 class="product-name"> <a href="product_detail.html">Sample Product</a> </h2>
                            </td>
                            <td class="a-center hidden-table"><span class="cart-price"> <span class="price">1</span></span></td>
                            <td class="a-center hidden-table"><span class="cart-price"> <span class="price">$29.95</span> </span></td>
                        </tr>
                        <tr class="first odd">
                            <td class="image"><a class="product-image" title="Sample Product" href="product_detail.html"><img width="75" alt="Sample Product" src="products-images/product2.jpg"></a></td>
                            <td>
                                <h2 class="product-name"> <a href="product_detail.html">Sample Product</a> </h2>
                            </td>
                            <td class="a-center hidden-table"><span class="cart-price"> <span class="price">1</span></span></td>
                            <td class="a-center hidden-table"><span class="cart-price"> <span class="price">$29.95</span> </span></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr class="first odd">
                            <td class="a-center hidden-table">
                                <h2 class="cart-price">
                                    <h2 class="price">Tổng cộng</h2>
                                </h2>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td class="a-center hidden-table">
                                <h2 class="cart-price">
                                    <h2 class="price">$29.95</h2>
                                </h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> -->
        </div>

    </div>



    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>