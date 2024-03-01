<?php
session_start();
ob_start();
include('../../Model/connection.php');
include('../../Controller/cart_C.php');
include('../../Controller/donHang_C.php');
include('../../Controller/chiTietDonHang_C.php');
include('../../Controller/sanpham.php');

$cartController = new Cart_C;
$donHangController = new DonHang_C;
$chiTietDonHangController = new ChiTietDonHang_C;
$sanPhamController = new sanpham_controller;
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
            <h3>Phương thức thanh toán</h3>
        </div>
        <div class="hero" style="display: flex; justify-content:space-around; margin-top: 30px">
            <form method="post">
                <div class="left">
                    <h4>Phương thức giao hàng</h4>
                    <div class="border" style="width: 450px; border: 1px solid #D9D9D9; border-radius: 10px; margin-top: 20px">
                        <div class="radio" style="margin-left:20px">
                            <label><input style="margin-top:  8px;" type="radio" name="optradio1" checked>
                                <span style="font-size: 20px;">Giao hàng tận nơi</span>
                            </label>
                        </div>
                    </div>
                    <br>
                    <h4>Phương thức thanh toán</h4>
                    <div class="border" style="width: 450px; border: 1px solid #D9D9D9; border-radius: 10px; margin-top: 20px">
                        <div class="radio" style="margin-left:20px">
                            <label><input style="margin-top:  8px;" type="radio" name="optradio2" checked>
                                <span style="font-size: 20px;">COD</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <button name="thanhToan" class="btn" type="submit" style="border-radius: 10px; margin-top: 25px; float: right; margin-right: 15px;">
                            <span>Hoàn tất thanh toán</span>
                        </button>
                        <a class="btn" type="button" href="check-out.php" style="border-radius: 10px; margin-top: 25px; float: right; margin-right: 15px;">
                            <span>Quay lại</span>
                        </a>
                    </div>
                </div>
            </form>
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
                                    <h2 class="price"><?= number_format($cartController->tongTienGioHang(), 0, ',', ',') ?> </h2>
                                </h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <?php
    if (isset($_REQUEST['thanhToan'])) {
        //--------Add du lieu Don Hang---------------
        $maKhachHang = $_SESSION['MaTaiKhoan'];
        $ngayMua = date("Y-m-d");
        $tongTien = $cartController->tongTienGioHang();
        $tinhTrang = 0; //chua xu ly
        $hoten = $_REQUEST['hoTen'];
        $email = $_REQUEST['email'];
        $sdt = $_REQUEST['sdt'];
        $diaChi = $_REQUEST['diaChi'];
        $tinhThanh = $_REQUEST['tinhThanh'];
        $quanHuyen = $_REQUEST['quanHuyen'];

        $donHang = [
            "MaTaiKhoan" => $maKhachHang, "NgayMua" => $ngayMua, "TongTien" => $tongTien, "TinhTrang" => $tinhTrang,
            "HoTen" => $hoten, "Email" => $email, "Phone" => $sdt, "DiaChi" => $diaChi, "TinhThanh" => $tinhThanh, "QuanHuyen" => $quanHuyen
        ];

        $donHangController->themDonHang($donHang);

        //----------Add du lieu Chi tiet Don Hang----------
        $maDonHangMoiNhat = $donHangController->maDonHangMoiNhat();

        foreach ($_SESSION['cart'] as $item) {
            $maSanPham = $item['ProductID'];
            $soLuong = $item['Quantity'];
            $donGia = $item['Price'];
            $thanhTien = $soLuong * $donGia;

            $chiTietDonHang = ["MaDonHang" => $maDonHangMoiNhat, "MaSanPham" => $maSanPham, "SoLuong" => $soLuong, "DonGia" => $donGia, "ThanhTien" => $thanhTien];

            $chiTietDonHangController->themChiTietDonHang($chiTietDonHang);

            //---------------Tru so luong tren DB--------------
            $sanPhamController->truSanPham($maSanPham, $soLuong);
        }

        $cartController->xoaGioHang();
        header('location: finish-check-out.php');
    }
    ?>

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