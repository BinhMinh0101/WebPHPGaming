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
                <h1 class="page-header">Sửa Thương Hiệu</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Thông tin sửa thương hiệu</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <?php
                            $mathuonghieu=$_GET['MaThuongHieu'];
                            include('../../Controller/thuonghieu.php');
                            $p=new thuonghieu_controller;
                            $thuonghieu=$p->thuonghieuID($mathuonghieu);
                            echo'<form role="form" method="post">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input class="form-control" value="'.$thuonghieu['TenThuongHieu'].'" name="tenthuonghieu" id="tenthuonghieu">
                                    </div>
                                    <div class="form-group" style="text-align: center;">
                                        <button type="submit" class="btn btn-info" value="Sua" name="nut" id="nut"><i class="glyphicon glyphicon-floppy-saved"></i> Lưu</button>
                                        <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>
                                </form>';
                            switch($_POST['nut']){
                                case 'Sua':{
                                    if($_REQUEST['tenthuonghieu']==""){
                                        echo "Vui lòng nhập đầy đủ thông tin để thay đổi";
                                    }
                                    else{
                                        $p->updateTH($mathuonghieu,$_REQUEST['tenthuonghieu']);
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