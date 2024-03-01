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
    
    include('menu-top.php');
    ?>

    <?php
    include('nav.php');
    ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa Nhân Viên</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Thông tin sửa nhân viên</div>
                    <div class="panel-body">
                        <?php
                            $matk=$_GET['MaTaiKhoan'];
                            include('../../Controller/taikhoan.php');
                            $p=new taikhoan_controller;
                            $tk=$p->getTKQL($matk);
                            echo'<div class="col-md-12">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Họ Lót</label>
                                        <input class="form-control" name="holot" id="holot" value="'.$tk['HoLot'].'">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên</label>
                                        <input class="form-control" name="ten" id="ten" value="'.$tk['Ten'].'">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" id="email" value="'.$tk['Email'].'" disabled="disabled">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" name="phone" id="phone" value="'.$tk['Phone'].'">
                                    </div>    
                                    <div class="form-group" style="text-align: center;">
                                        <button type="submit" class="btn btn-info" name="nut" id="nut" value="Register"><i class="glyphicon glyphicon-floppy-saved"></i> Lưu</button>
                                        <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                    </div>                                
                                </form>
                            </div>';
                            switch($_POST['nut']){
                                case 'Register':{
                                    if($_REQUEST['holot']=="" || $_REQUEST['ten']=="" || $_REQUEST['phone']==""){
                                        echo "Vui lòng nhập đầy đủ thông tin để thay đổi";
                                    }
                                    else{
                                        $nv = ['Holot' => $_REQUEST['holot'],'Ten' => $_REQUEST['ten'], 'Phone' => $_REQUEST['phone']];
                                        $p->changeTK($matk,$nv);
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <br>
                            div class="form-group">
                                <label>Chức vụ</label>
                                <select class="form-control">
                                    <option>Quản lý</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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