<?php
error_reporting(0);
include('../../Model/detailGoods_M.php');
include('../../Controller/detailGoods_C.php');
include('../../Controller/sanpham.php');
include('../../Model/connection.php');
$detailGoods = new detailGoods_C;
$products = new sanpham_controller;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/Logogear.ico">
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
    include('nav.php')
    ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản Lý Nhập Hàng</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Chi Tiết Phiếu Nhập</div>
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
                                                <th data-field="mpn" data-sortable="true">Mã Phiếu Nhập</th>
                                                <th data-field="msp" data-sortable="true">Mã Sản Phẩm</th>
                                                <th data-field="tsp" data-sortable="true">Tên Sản Phẩm</th>
                                                <th data-field="img" data-sortable="true">Hình Ảnh</th>
                                                <th data-field="tdm" data-sortable="true">Tên Danh Mục</th>
                                                <th data-field="tth" data-sortable="true">Tên Thương Hiệu</th>
                                                <th data-field="dg" data-sortable="true">Đơn giá</th>
                                                <th data-field="sl" data-sortable="true">Số Lượng</th>
                                                <th data-field="tt" data-sortable="true">Thành Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_POST['submitDetailGoods'])) {
                                                $id_goods = $_REQUEST['id_goods'];
                                                foreach ($detailGoods->detail_goods($id_goods) as $list_goods) {
                                                    $sanPham = $products->sanPhamDmThTheoID($list_goods['MaSanPham']);
                                                    while ($row = mysqli_fetch_array($sanPham)) {
                                            ?>
                                                        <tr>
                                                            <td><?= $list_goods['MaPN'] ?></td>
                                                            <td><?= $list_goods['MaSanPham'] ?></td>
                                                            <td><?= $row['TenSanPham'] ?></td>
                                                            <td><img src="../../products-images/<?= $row['Anh'] ?>" alt="" style="width: 75px"></td>
                                                            <td><?= $row['TenDanhMuc'] ?></td>
                                                            <td><?= $row['TenThuongHieu'] ?></td>
                                                            <td><?= number_format($list_goods['DonGia'], 0, ',', ',') ?> VNĐ</td>
                                                            <td><?= $list_goods['SoLuong'] ?></td>
                                                            <td><?= number_format($list_goods['ThanhTien'], 0, ',', ',') ?> VNĐ</td>
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