<?php
include('../../Controller/cart_C.php');
$cart_c = new Cart_C;
session_start();

if (!isset($_SESSION['MaTaiKhoan'])) {
    echo '<script>alert("Bạn vui lòng đăng nhập trước khi thanh toán");window.location="../login-register/login.php"</script>';
}

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
            <h3>Thông tin giao hàng</h3>
        </div>
        <div class="hero" style="display: flex; justify-content:space-around; margin-top: 30px">
            <div class="left">
                <form action="payment.php" method="get">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <h5 for="validationCustom01">Họ Tên</h5>
                            <input name="hoTen" type="text" class="form-control" id="validationCustom01" placeholder="Họ tên" value="<?php echo $_SESSION['Holot'] ?> <?php echo $_SESSION['Ten'] ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-7 mb-3">
                            <h5 for="validationCustom01">Email</h5>
                            <input name="email" type="text" class="form-control" id="validationCustom01" placeholder="Email" value="<?php echo $_SESSION['Email'] ?>" required>
                        </div>
                        <div class="col-md-5 mb-3">
                            <h5 for="validationCustom01">Số điện thoại</h5>
                            <input name="sdt" type="text" class="form-control" id="validationCustom01" placeholder="Số điện thoại" value="<?php echo $_SESSION['Phone'] ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <h5 for="validationCustom03">Địa chỉ</h5>
                            <input name="diaChi" type="text" class="form-control" id="validationCustom03" placeholder="Địa chỉ" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <h5 for="validationCustom03">Tỉnh/Thành/</h5>
                            <input name="tinhThanh" type="text" class="form-control" id="validationCustom03" placeholder="Tỉnh/Thành" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 for="validationCustom03">Quận/huyện</h5>
                            <input name="quanHuyen" type="text" class="form-control" id="validationCustom03" placeholder="Quận/Huyện" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <button class="btn" type="submit" style="border-radius: 10px; margin-top: 25px; float: right; margin-right: 15px;">
                            <span>đến phương thức thanh toán</span>
                        </button>
                        <a class="btn" type="button" href="shopping_cart.php" style="border-radius: 10px; margin-top: 25px; float: right; margin-right: 15px;">
                            <span>Giỏ hàng</span>
                        </a>
                    </div>
                </form>
            </div>
            <div class="right">
                <table class="data-table cart-table" id="shopping-cart-table">
                    <tbody>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $tongTienGioHang = 0;
                            foreach ($_SESSION['cart'] as $item) {
                        ?>
                                <tr class="first odd">
                                    <td class="image"><a class="product-image" title="Sample Product" href="../../View/sanpham/Chitietsp.php?SP=<?= $item['ProductID'] ?>"><img width="75" alt="Sample Product" src="../../products-images/<?= $item['Image'] ?>"></a></td>
                                    <td>
                                        <h2 class="product-name"> <a href="../../View/sanpham/Chitietsp.php?SP=<?= $item['ProductID'] ?>"><?= $item['ProductName'] ?></a> </h2>
                                    </td>
                                    <td class="a-center hidden-table"><span class="cart-price"> <span class="price"><?= $item['Quantity'] ?></span></span></td>
                                    <td class="a-center hidden-table"><span class="cart-price"> <span class="price"><?= number_format($item['Price'], 0, ',', ',') ?></span> </span></td>
                                </tr>

                        <?php
                            }
                        }
                        ?>
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
                                    <h2 class="price"><?= number_format($cart_c->tongTienGioHang(), 0, ',', ',') ?> </h2>
                                </h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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