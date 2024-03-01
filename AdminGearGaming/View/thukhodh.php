<?php
ob_start();
error_reporting(0);
include('../../Controller/c_order.php');
include('../../Model/m_order.php');
include('../../Model/connection.php');
$order = new order_c;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../img/Logogear.ico">
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
                <h1 class="page-header">Quản Lý Đơn Hàng</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Bảng Đơn Hàng</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="fixed-table-toolbar">
                                <form method="get" action="#">
                                    <div class="btn pull-left">
                                        <label>
                                            <div class="form-group">
                                                <select name="filter-tinhTrang" class="form-control">
                                                    <option value="1">Tất cả đơn hàng</option>
                                                    <option value="2">Đã xử lý</option>
                                                    <option value="3">Chưa xử lý</option>
                                                </select>
                                            </div>
                                        </label>
                                        <button class="btn btn-default" type="submit" title="Refresh">
                                            <i class="glyphicon glyphicon-search"></i> Lọc
                                        </button>
                                        <button class="btn btn-default" type="submit" name="refresh" title="Refresh" style="margin-right: 10px">
                                            <i class="glyphicon glyphicon-refresh icon-refresh"></i> Tải lại
                                        </button>
                                    </div>
                                </form>
                                <form method="post">
                                    <div class="pull-right search">
                                        <button class="btn btn-default" type="submit" name="btn-search" title="Refresh">
                                            <i class="glyphicon glyphicon-search"></i> Tìm kiếm
                                        </button>
                                        <label><input name="search" class="form-control" type="text" placeholder="Nhập mã hóa đơn"></label>
                                    </div>
                                </form>

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
                                                <th data-field="mhd" data-sortable="true">Mã Hóa Đơn</th>
                                                <th data-field="mkh" data-sortable="true">Mã Khánh Hàng</th>
                                                <th data-field="nm" data-sortable="true">Ngày Mua</th>
                                                <th data-field="money" data-sortable="true">Tổng Tiền</th>
                                                <th data-field="tt" data-sortable="true">Trình trạng</th>
                                                <th data-field="ht" data-sortable="true">Họ Tên</th>
                                                <th data-field="email" data-sortable="true">Email</th>
                                                <th data-field="sdt" data-sortable="true">SĐT</th>
                                                <th data-field="dc" data-sortable="true">Địa Chỉ</th>
                                                <th data-field="tthanh" data-sortable="true">Tỉnh Thành</th>
                                                <th data-field="qhuyen" data-sortable="true">Quận Huyện</th>
                                                <th data-field="ctite" data-sortable="true">Chi Tiết</th>
                                                <th data-field="tacvu" data-sortable="true">Tác Vụ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_POST['btn-search'])) {
                                                $search = $_REQUEST['search'];
                                                foreach ($order->search_order($search) as $list_search) {
                                            ?>
                                                    <tr>
                                                        <td><?= $list_search['MaDonHang'] ?></td>
                                                        <td><?= $list_search['MaTaiKhoan'] ?></td>
                                                        <td><?= $list_search['NgayMua'] ?></td>
                                                        <td><?= number_format($list_search['TongTien'], 0, ',', ',') ?>VNĐ</td>
                                                        <td>
                                                            <?php if ($list_search['TinhTrang'] == 0) {
                                                            ?>
                                                                <span style="color: red">Chưa xử lý</span>
                                                            <?php
                                                            } else if ($list_search['TinhTrang'] == 1) {
                                                            ?>
                                                                <span style="color: green">Đã Xử lý</span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $list_search['HoTen'] ?></td>
                                                        <td><?= $list_search['Email'] ?></td>
                                                        <td><?= $list_search['Phone'] ?></td>
                                                        <td><?= $list_search['DiaChi'] ?></td>
                                                        <td><?= $list_search['TinhThanh'] ?></td>
                                                        <td><?= $list_search['QuanHuyen'] ?></td>
                                                        <td>
                                                            <form action="detail-orderthukho.php?id_order=<?= $list_search['MaDonHang'] ?>" method="post">
                                                                <button type="submit" name="submitDetail" class="btn btn-secondary"><i class="glyphicon glyphicon-list-alt"></i> Xem chi tiết</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <div class="rf" style="display: flex; justify-content: space-around;">
                                                                <form action="update-orderthukho.php?id_order=<?= $list_search['MaDonHang'] ?>&tinhtrang=<?= $list_search['TinhTrang'] ?>" method="post">
                                                                    <button type="submit" name="submitRepair" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else if (isset($_GET['filter-tinhTrang']) == 0 || $_GET['filter-tinhTrang'] == 1) {
                                                foreach ($order->getAll() as $list_order) {
                                                ?>
                                                    <tr>
                                                        <td><?= $list_order['MaDonHang'] ?></td>
                                                        <td><?= $list_order['MaTaiKhoan'] ?></td>
                                                        <td><?= $list_order['NgayMua'] ?></td>
                                                        <td><?= number_format($list_order['TongTien'], 0, ',', ',') ?>VNĐ</td>
                                                        <td>
                                                            <?php if ($list_order['TinhTrang'] == 0) {
                                                            ?>
                                                                <span style="color: red">Chưa xử lý</span>
                                                            <?php
                                                            } else if ($list_order['TinhTrang'] == 1) {
                                                            ?>
                                                                <span style="color: green">Đã Xử lý</span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= $list_order['HoTen'] ?></td>
                                                        <td><?= $list_order['Email'] ?></td>
                                                        <td><?= $list_order['Phone'] ?></td>
                                                        <td><?= $list_order['DiaChi'] ?></td>
                                                        <td><?= $list_order['TinhThanh'] ?></td>
                                                        <td><?= $list_order['QuanHuyen'] ?></td>
                                                        <td>
                                                            <form action="detail-orderthukho.php?id_order=<?= $list_order['MaDonHang'] ?>" method="post">
                                                                <button type="submit" name="submitDetail" class="btn btn-secondary"><i class="glyphicon glyphicon-list-alt"></i> Xem chi tiết</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <div class="rf" style="display: flex; justify-content: space-around;">
                                                                <form action="update-orderthukho.php?id_order=<?= $list_order['MaDonHang'] ?>&tinhtrang=<?= $list_order['TinhTrang'] ?>" method="post">
                                                                    <button type="submit" name="submitRepair" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else if ($_GET['filter-tinhTrang'] == 2) {
                                                foreach ($order->getAll() as $list_order) {
                                                    if ($list_order['TinhTrang'] == 1) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $list_order['MaDonHang'] ?></td>
                                                            <td><?= $list_order['MaTaiKhoan'] ?></td>
                                                            <td><?= $list_order['NgayMua'] ?></td>
                                                            <td><?= number_format($list_order['TongTien'], 0, ',', ',') ?>VNĐ</td>
                                                            <td>
                                                                <span style="color: green">Đã Xử lý</span>
                                                            </td>
                                                            <td><?= $list_order['HoTen'] ?></td>
                                                            <td><?= $list_order['Email'] ?></td>
                                                            <td><?= $list_order['Phone'] ?></td>
                                                            <td><?= $list_order['DiaChi'] ?></td>
                                                            <td><?= $list_order['TinhThanh'] ?></td>
                                                            <td><?= $list_order['QuanHuyen'] ?></td>
                                                            <td>
                                                                <form action="detail-orderthukho.php?id_order=<?= $list_order['MaDonHang'] ?>" method="post">
                                                                    <button type="submit" name="submitDetail" class="btn btn-secondary"><i class="glyphicon glyphicon-list-alt"></i> Xem chi tiết</button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <div class="rf" style="display: flex; justify-content: space-around;">
                                                                    <form action="update-orderthukho.php?id_order=<?= $list_order['MaDonHang'] ?>&tinhtrang=<?= $list_order['TinhTrang'] ?>" method="post">
                                                                        <button type="submit" name="submitRepair" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                }
                                            } else if ($_GET['filter-tinhTrang'] == 3) {
                                                foreach ($order->getAll() as $list_order) {
                                                    if ($list_order['TinhTrang'] == 0) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $list_order['MaDonHang'] ?></td>
                                                            <td><?= $list_order['MaTaiKhoan'] ?></td>
                                                            <td><?= $list_order['NgayMua'] ?></td>
                                                            <td><?= number_format($list_order['TongTien'], 0, ',', ',') ?>VNĐ</td>
                                                            <td>
                                                                <span style="color: red">Chưa Xử lý</span>
                                                            </td>
                                                            <td><?= $list_order['HoTen'] ?></td>
                                                            <td><?= $list_order['Email'] ?></td>
                                                            <td><?= $list_order['Phone'] ?></td>
                                                            <td><?= $list_order['DiaChi'] ?></td>
                                                            <td><?= $list_order['TinhThanh'] ?></td>
                                                            <td><?= $list_order['QuanHuyen'] ?></td>
                                                            <td>
                                                                <form action="detail-orderthukho.php?id_order=<?= $list_order['MaDonHang'] ?>" method="post">
                                                                    <button type="submit" name="submitDetail" class="btn btn-secondary"><i class="glyphicon glyphicon-list-alt"></i> Xem chi tiết</button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <div class="rf" style="display: flex; justify-content: space-around;">
                                                                    <form action="update-orderthukho.php?id_order=<?= $list_order['MaDonHang'] ?>&tinhtrang=<?= $list_order['TinhTrang'] ?>" method="post">
                                                                        <button type="submit" name="submitRepair" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                            <?php
                                                    }
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