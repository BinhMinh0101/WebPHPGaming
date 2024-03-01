<?php
error_reporting(0);
include('../../Controller/c_order.php');
include('../../Model/m_order.php');
include('../../Controller/sanpham.php');
include('../../Model/connection.php');
$order = new order_c;
$products = new sanpham_controller;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/Logogear.ico">
    <title>Admin Gear Gaming</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/datepicker3.css" rel="stylesheet">
    <link href="../css/bootstrap-table.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">

    <script src="../js/lumino.glyphs.js"></script>

</head>

<body>
    <?php
    include('menu-top.php')
    ?>

    <?php
    include('navthukho.php')
    ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết đơn hàng</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-primary">
                    </div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="fixed-table-container">
                                <div class="fixed-table-header">
                                    <table></table>
                                </div>
                                <div class="fixed-table-body">
                                    <div class="fixed-table-loading" style="top: 37px;">Loading, please wait…</div>
                                    <table data-toggle="table" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                                        <thead>
                                            <tr>
                                                <th data-field="id" data-sortable="true">Mã sản phẩm</th>
                                                <th data-field="img" data-sortable="true">Hình ảnh</th>
                                                <th data-field="products" data-sortable="true">Tên sản phẩm</th>
                                                <th data-field="qty" data-sortable="true">Số lượng</th>
                                                <th data-field="price1" data-sortable="true">Đơn giá</th>
                                                <th data-field="price" data-sortable="true">Thành Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_POST['submitDetail'])) {
                                                $id = $_GET['id_order'];
                                                foreach ($order->detail_order($id) as $list_detail) {
                                                    $masp = $list_detail['MaSanPham'];
                                                    $soLuong = $list_detail['SoLuong'];
                                                    $donGia = $list_detail['DonGia'];
                                                    $thanhTien = $list_detail['ThanhTien'];
                                                    $sanPham = $products->sanPhamtheoID($masp);
                                                    while ($row = mysqli_fetch_array($sanPham)) {
                                            ?>
                                                        <tr>
                                                            <td><?= $masp ?></td>
                                                            <td>
                                                                <img src="../../products-images/<?= $row['Anh'] ?>" alt="" style="width: 75px">
                                                            </td>
                                                            <td><?= $row['TenSanPham'] ?></td>
                                                            <td><?= $soLuong ?></td>
                                                            <td><?= number_format($donGia, 0, ',', ',') ?>VNĐ</td>
                                                            <td><?= number_format($thanhTien, 0, ',', ',') ?>VNĐ</td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php
                                                }
                                                ?>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--/.main-->

    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/chart.min.js"></script>
    <script src="../js/chart-data.js"></script>
    <script src="../js/easypiechart.js"></script>
    <script src="../js/easypiechart-data.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/bootstrap-table.js"></script>
    <script>
        $('#calendar').datepicker({});

        ! function($) {
            $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function() {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function() {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>
</body>

</html>