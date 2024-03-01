<?php
    include('../../Controller/thongKe_C.php');
    include('../../Model/connection.php');
    include('../../Model/thongKe_M.php');

    $thongKeController = new ThongKe_C;
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
    include('nav.php')
    ?>



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thống Kê</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-primary">
                        <h4 class="text-primary">Thống kê sản phẩm bán chạy nhất</h4>
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
                                                <th data-field="maSanPham" data-sortable="true">Mã sản phẩm</th>
                                                <th data-field="img" data-sortable="true">Hình ảnh</th>
                                                <th data-field="products" data-sortable="true">Tên sản phẩm</th>
                                                <th data-field="dm" data-sortable="true">Danh mục</th>
                                                <th data-field="th" data-sortable="true">Thương hiệu</th>
                                                <th data-field="qty" data-sortable="true">Số lượng đã bán</th>
                                                <th data-field="price1" data-sortable="true">Đơn giá</th>
                                                <th data-field="price" data-sortable="true">Tổng giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $arrSPBanChayNhat = $thongKeController->thongKeSanPhamBanChayNhat();
                                                while($row = mysqli_fetch_array($arrSPBanChayNhat))
                                                {
                                                    ?>
                                                         <tr>
                                                            <td><?= $row['MaSanPham'] ?></td>
                                                            <td>
                                                                <img src="../../products-images/<?= $row['Anh'] ?>" alt="" style="width: 75px">
                                                            </td>
                                                            <td><?= $row['TenSanPham'] ?></td>
                                                            <td><?= $row['TenDanhMuc'] ?></td>
                                                            <td><?= $row['TenThuongHieu'] ?></td>
                                                            <td><?= number_format($row['SoLuong'], 0, ',', ',') ?></td>
                                                            <td><?= number_format($row['DonGia'], 0, ',', ',') ?></td>
                                                            <td><?= number_format($row['ThanhTien'], 0, ',', ',') ?></td>
                                                        </tr>
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

        <div class="row">
            <form method="get">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="text-primary">Thống kê doanh thu theo khoảng thời gian</h4>
                        </div>
                        <div class="panel-body">
                            <?php
                                if(isset($_REQUEST['tuNgay']) && isset($_REQUEST['denNgay']))
                                {
                                    ?>
                                        <span>Từ Ngày <input type="date" id="start" value="<?= $_REQUEST['tuNgay'] ?>" name="tuNgay"></span>
                                        <span style="margin-left: 10px">Đến Ngày <input type="date" id="start" value="<?= $_REQUEST['denNgay'] ?>" name="denNgay"></span>

                                    <?php
                                }
                                else
                                {
                                    ?>
                                        <span>Từ Ngày <input type="date" id="start" name="tuNgay"></span>
                                        <span style="margin-left: 10px">Đến Ngày <input type="date" id="start" name="denNgay"></span>
                                    <?php
                                }
                            ?>
                            <button class="btn btn-info" style="margin-left:10px" type="submit" name="thongKeKhoangThoiGian">Thống kê</button>
                            <div>
                                <?php
                                    if(isset($_REQUEST['tuNgay']) && isset($_REQUEST['denNgay']) && !empty($_REQUEST['tuNgay']) && !empty($_REQUEST['denNgay']))
                                    {
                                        if($_REQUEST['tuNgay'] <= $_REQUEST['denNgay'])
                                        {
                                            $arrDoanhThu = $thongKeController->thongKeTheoKhoangThoiGian($_REQUEST['tuNgay'],$_REQUEST['denNgay']);
                                            while($row = mysqli_fetch_array($arrDoanhThu))
                                            {
                                                ?>
                                                    <h3>Thống kê doanh thu:
                                                        <h3 class="text-success"> <?= number_format($row['DoanhThu'], 0, ',', ',') ?>VNĐ</h3>
                                                    </h3>
                                                <?php
                                            }
                                        }
                                        else echo '<script>alert("Ngày bắt đầu thống kê phải NHỎ HƠN ngày kết thúc")</script>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/chart.min.js"></script>
        <script src="../js/chart-data.js"></script>
        <script src="../js/easypiechart.js"></script>
        <script src="../js/easypiechart-data.js"></script>
        <script src="../js/bootstrap-datepicker.js"></script>
        <script src="../js/bootstrap-table.js"></script>
</body>
</html>