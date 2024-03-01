<?php
error_reporting(0);
ob_start();
session_start();
include("../../Controller/danhmuc.php");
include("../../Model/connection.php");
$p = new danhmuc_controller;
$danhmuc = $p->getAll();
include("../../Controller/thuonghieu.php");
$l = new thuonghieu_controller;
$kq = $l->getAll();
include("../../Controller/sanpham.php");
$s = new sanpham_controller;
include("../../Controller/phieuNhap_C.php");
include('../../Model/phieuNhap_M.php');
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
                <h1 class="page-header">Thêm Phiếu Nhập</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Thêm vào phiếu</div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select class="form-control" name="select-category">
                                        <option>Chọn lọc theo danh mục</option>
                                        <?php
                                        for ($i = 0; $i < sizeof($danhmuc); $i++) {
                                            echo '<option value="' . $danhmuc[$i]['MaDanhMuc'] . '">' . $danhmuc[$i]['TenDanhMuc'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" name="filter-category" class="btn btn-secondary" style="margin-top:10px"> Lọc sản phẩm theo danh mục</button>
                                </div>
                                <div class="form-group">
                                    <label>Thương Hiệu</label>
                                    <select class="form-control" name="select-brands">
                                        <option>Chọn lọc theo thương hiệu</option>
                                        <?php
                                        for ($i = 0; $i < sizeof($kq); $i++) {
                                            echo '<option value="' . $kq[$i]['MaThuongHieu'] . '">' . $kq[$i]['TenThuongHieu'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" name="filter-brands" class="btn btn-secondary" style="margin-top:10px"> Lọc sản phẩm theo thương hiệu</button>
                                </div>
                                <div class="form-group">
                                    <label>Sản phẩm</label>
                                    <select class="form-control" name="select-products">
                                        <?php
                                        if (isset($_POST['filter-category'])) {
                                            $filter_option = $_REQUEST['select-category'];
                                            foreach ($s->getIDCategory($filter_option) as $option_category) {
                                        ?>
                                                <option value="<?= $option_category['MaSanPham'] ?>"><?= $option_category['TenSanPham'] ?></option>
                                            <?php
                                            }
                                        } else if (isset($_POST['filter-brands'])) {
                                            $filterO_brands = $_REQUEST['select-brands'];
                                            foreach ($s->getIDBrands($filterO_brands) as $option_brands) {
                                            ?>
                                                <option value="<?= $option_brands['MaSanPham'] ?>"><?= $option_brands['TenSanPham'] ?></option>
                                            <?php
                                            }
                                        } else {
                                            foreach ($s->getAll() as $option_products) {
                                            ?>
                                                <option value="<?= $option_products['MaSanPham'] ?>"><?= $option_products['TenSanPham'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <form role="form">
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input max="100" name="qty" type="text" class="form-control">
                                        <label>Đơn giá</label>
                                        <input type="text" name="price" class="form-control">
                                    </div>
                                </form>
                                <div class="form-group">
                                    <button type="submit" name="submitAddGoods" class="btn btn-info"><i class="glyphicon glyphicon-floppy-saved"></i> Thêm</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['submitAddGoods'])) {
                            $idProducts = $_REQUEST['select-products'];
                            $soLuong = $_REQUEST['qty'];
                            $donGia = $_REQUEST['price'];
                            $sanPham = $s->sanPhamtheoID($idProducts);
                            while ($rows = mysqli_fetch_array($sanPham)) {
                                $Anh = $rows['Anh'];
                                $SoLuongDangCo = $rows['SoLuong'];
                                $Tensanpham = $rows['TenSanPham'];
                            }
                            $goods->addGoods($idProducts, $Tensanpham, $Anh, $soLuong, $donGia, $SoLuongDangCo);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-primary">Thông tin chi tiết thêm phiếu
                    </div>
                    <form method="post">
                        <div class="panel-body">
                            <div class="bootstrap-table">
                                <div class="fixed-table-container">
                                    <div class="fixed-table-header">
                                        <table></table>
                                    </div>
                                    <div class="fixed-table-body">
                                        <div class="btn pull-left">
                                            <form method="post">
                                                <button class="btn btn-default" type="submit" name="updateGoods" title="Refresh" style="margin-right: 10px">
                                                    <i class="glyphicon glyphicon-refresh icon-refresh"></i> Cập nhập phiếu nhập
                                                </button>
                                                <button class="btn btn-default" name="clearGoods" type="submit" title="Refresh">
                                                    <i class="glyphicon glyphicon-remove"></i> Xóa tất cả
                                                </button>
                                            </form>

                                        </div>
                                        <div class="fixed-table-loading" style="top: 37px;">Loading, please wait…</div>
                                        <table data-toggle="table" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                                            <thead>
                                                <tr>
                                                    <th data-field="products" data-sortable="true">Tên sản phẩm</th>
                                                    <th data-field="img" data-sortable="true">Hình ảnh</th>
                                                    <th data-field="qty" data-sortable="true">Số lượng</th>
                                                    <th data-field="price1" data-sortable="true">Đơn giá</th>
                                                    <th data-field="price" data-sortable="true">Thành Tiền</th>
                                                    <th data-field="tv" data-sortable="true">Tác vụ</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_SESSION['goods']) && !empty($_SESSION['goods'])) {
                                                    $tongtien = 0;
                                                    foreach ($_SESSION['goods'] as $item) {
                                                ?>
                                                        <tr>
                                                            <td><?= $item['TenSanPham'] ?></td>
                                                            <td><img src="../../products-images/<?= $item['Anh'] ?>" style="width: 75px"></td>
                                                            <td class="a-center movewishlist"><input name="slGoods[<?= $item['MaSanPham'] ?>]" type="number" min=1 maxlength="100" class="input-text qty form-control" title="Qty" value="<?= $item['SoLuong'] ?>"></td>
                                                            <td><input type="text" name="dgGoods[<?= $item['MaSanPham'] ?>]" class="input-text form-control" value="<?= $item['DonGia'] ?>"></td>
                                                            <td><?= $item['SoLuong'] * $item['DonGia'] ?></td>
                                                            <td>
                                                                <div class="rf" style="display: flex; justify-content: space-around;">
                                                                    <a class="btn" href="insert-goodsthukho.php?action=deleteProduct&idProduct=<?= $item['MaSanPham'] ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        $tongtien += $item['SoLuong'] * $item['DonGia'];
                                                    }
                                                }
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <label>
                                        <h3 class="text-success">Tổng tiền: <?= number_format($tongtien, 0, ',', ',') ?> VNĐ</h3>
                                    </label>
                                    <button type="submit" class="btn btn-danger pull-right" name="thanhToan" style="margin-top: 20px">
                                        <i class="glyphicon glyphicon-floppy-saved"></i> Thanh toán phiếu nhập
                                    </button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    <?php
                    if (isset($_REQUEST['thanhToan']) && isset($_SESSION['goods'])) {

                        $maTaiKhoan = $_SESSION['MaTaiKhoan'];
                        $ngayNhap = date("Y-m-d");

                        $array_goods = ["MaTaiKhoan" => $maTaiKhoan, "NgayNhap" => $ngayNhap, "TongGia" => $tongtien];

                        $goods->addPGoods($array_goods);

                        $maPNMoiNhat = $goods->maPhieuNhapMoiNhat();

                        foreach ($_SESSION['goods'] as $item_goods) {
                            $maSanPham = $item_goods['MaSanPham'];
                            $price = $item_goods['DonGia'];
                            $qty = $item_goods['SoLuong'];
                            $successTien = $price * $qty;

                            $array_detail = ["MaPN" => $maPNMoiNhat, "MaSanPham" => $maSanPham, "DonGia" => $price, "SoLuong" => $qty, "ThanhTien" => $successTien];

                            $goods->addGoodsDetail($array_detail);

                            $s->congSanPham($maSanPham, $qty);
                        }
                        $goods->deleteGoods();
                        header('location: thukhonh.php');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'deleteProduct') {
        $goods->deleteProduct($_REQUEST['idProduct']);
        header('location:insert-goodsthukho.php');
    }
    if (isset($_REQUEST['clearGoods'])) {
        $goods->deleteGoods();
        header('location:insert-goodsthukho.php');
    }
    if (isset($_REQUEST['updateGoods'])) {
        $goods->updateGoods($_REQUEST['slGoods'], $_REQUEST['dgGoods']);
        header('location:insert-goodsthukho.php');
    }
    ?>


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