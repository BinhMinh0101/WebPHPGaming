<?php
    error_reporting(0);
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
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Thông tin sửa sản phẩm</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <?php
                                    $masanpham=$_GET['MaSanPham'];
                                    include('../../Model/connection.php');
                                    include('../../Controller/sanpham.php');
                                    include('../../Controller/thuonghieu.php');
                                    include('../../Controller/danhmuc.php');
                                    $p=new sanpham_controller;
                                    $q=new danhmuc_controller;
                                    $z=new thuonghieu_controller;
                                    $sanpham=$p->sanPhamtheoID($masanpham);
                                    while($row=mysqli_fetch_array($sanpham)){
                                        $tensanpham=$row['TenSanPham'];
                                        $madanhmuc=$row['MaDanhMuc'];
                                        $mathuonghieu=$row['MaThuongHieu'];
                                        $gia=$row['Gia'];
                                        $mota=$row['MoTa'];
                                        $anh=$row['Anh'];
                                    }
                                    $danhmuc=$q->danhmuctheoID($madanhmuc);
                                    $thuonghieu=$z->thuonghieutheoID($mathuonghieu);
                                    echo '<div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input class="form-control" name="tensp" id="tensp" value="'.$tensanpham.'">
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select class="form-control" name="danhmuc" id="danhmuc" disabled="disabled">
                                            <option value="'.$madanhmuc.'">'.$danhmuc['TenDanhMuc'].'</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thương Hiệu</label>
                                        <select class="form-control" name="thuonghieu" id="thuonghieu" disabled="disabled">
                                            <option value="'.$mathuonghieu.'">'.$thuonghieu['TenThuongHieu'].'</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá</label>
                                        <input class="form-control" value="'.$gia.'" name="gia" id="gia">
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="3" value="'.$mota.'" name="mota" id="mota">'.$mota.'</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tải ảnh sản phẩm</label>
                                        <input type="file" value="'.$anh.'" id="image" name="image">
                                    </div>
                                    <div class="form-group" style="text-align: center;">
                                        <button type="submit" class="btn btn-info" name="nut" id="nut" value="Change"><i class="glyphicon glyphicon-floppy-saved"></i> Lưu</a>
                                        <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-repeat"></i> Reset</a>
                                    </div>';
                                ?>
                            </form>
                            <?php
                                switch($_POST['nut']){
                                    case 'Change':{
                                        if($_REQUEST['tensp']=="" || $_REQUEST['gia']=="" || $_REQUEST['mota']==""){
                                            echo "Vui lòng nhập đầy đủ thông tin để thay đổi";
                                        }
                                        else{
                                            $img=$_FILES['image']['name'];
                                            $img_tmp=$_FILES['image']['tmp_name'];
                                            move_uploaded_file($img_tmp,'../../products-images/'.$img);
                                            $sanpham=['TenSanPham' => $_REQUEST['tensp'], 'Gia' => $_REQUEST['gia'], 'MoTa' => $_REQUEST['mota'], 'Anh' => $img];
                                            $p->changeSP($masanpham,$sanpham);
                                        }
                                    }
                                }
                            ?>
                        </div>
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