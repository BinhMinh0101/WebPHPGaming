<?php
error_reporting(0);
include('../../Controller/phieuNhap_C.php');
include('../../Model/phieuNhap_M.php');
include('../../Model/connection.php');
$goods = new phieuNhap_C;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../images/Logogear.ico">
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
                <h1 class="page-header">Quản Lý Nhập Hàng</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Bảng Phiếu Nhập</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="fixed-table-toolbar">
                                <div class="btn pull-left">
                                    <form method="post">
                                        <a class="btn btn-default" name="add-goods" href="insert-goodsthukho.php"><i class="glyphicon glyphicon-plus-sign" style="margin-top: 1px"></i> Thêm Phiếu Nhập</a>
                                        <button class="btn btn-default" type="submit" name="refresh" title="Refresh">
                                            <i class="glyphicon glyphicon-refresh icon-refresh"></i> Tải lại
                                        </button>
                                    </form>
                                </div>
                                <div class="pull-right search">
                                    <form method="post">
                                        <button class="btn btn-default" type="submit" name="search_Goods" title="Refresh">
                                            <i class="glyphicon glyphicon-search"></i> Tìm kiếm
                                        </button>
                                        <label><input name="searchGoods" class="form-control" type="text" placeholder="Nhập mã phiếu nhập"></label>
                                    </form>

                                </div>
                            </div>
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
                                                <th data-field="mtk" data-sortable="true">Mã Tài Khoản</th>
                                                <th data-field="date" data-sortable="true">Ngày thêm</th>
                                                <th data-field="price" data-sortable="true">Tổng giá</th>
                                                <th data-field="detail" data-sortable="true">Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_POST['search_Goods'])) {
                                                $id_goods = $_REQUEST['searchGoods'];
                                                foreach ($goods->search_goods($id_goods) as $list_search_goods) {
                                            ?>
                                                    <tr>
                                                        <td><?= $list_search_goods['MaPN'] ?></td>s
                                                        <td><?= $list_search_goods['MaTaiKhoan'] ?></td>
                                                        <td><?= $list_search_goods['NgayNhap'] ?></td>
                                                        <td><?= number_format($list_search_goods['TongGia'], 0, ',', ',') ?></td>
                                                        <td>
                                                            <form action="detail-goodsthukho.php?id_goods=<?= $list_search_goods['MaPN'] ?>" method="post">
                                                                <button type="submit" name="submitDetailGoods" class="btn btn-secondary"><i class="glyphicon glyphicon-list-alt"></i> Xem chi tiết</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                foreach ($goods->getAll() as $list_goods) {
                                                ?>
                                                    <tr>
                                                        <td><?= $list_goods['MaPN'] ?></td>
                                                        <td><?= $list_goods['MaTaiKhoan'] ?></td>
                                                        <td><?= $list_goods['NgayNhap'] ?></td>
                                                        <td><?= number_format($list_goods['TongGia'], 0, ',', ',') ?></td>
                                                        <td>
                                                            <form action="detail-goodsthukho.php?id_goods=<?= $list_goods['MaPN'] ?>" method="post">
                                                                <button type="submit" name="submitDetailGoods" class="btn btn-secondary"><i class="glyphicon glyphicon-list-alt"></i> Xem chi tiết</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
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