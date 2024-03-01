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
                <h1 class="page-header">Thêm Nhân Viên</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Thông tin thêm nhân viên</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form method="post">
                                <div class="form-group">
                                    <label>Họ Lót</label>
                                    <input class="form-control" id="holot" name="holot">
                                </div>
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control" id="ten" name="ten">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email" >
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" id="phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <!-- <div class="form-group">
                                    <label>Chức vụ</label>
                                    <input class="form-control" placeholder="Nhân viên" disabled="disable">
                                </div> -->
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" class="btn btn-info" name="nut" id="nut" value="Register"><i class="glyphicon glyphicon-floppy-saved"></i> Lưu</button>
                                    <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                </div>
                            </form>
                        <?php
                            include('../../Controller/taikhoan.php');
                            $p=new taikhoan_controller;
                            switch($_POST['nut']){
                                case 'Register':{
                                    if($_REQUEST['holot']=="" || $_REQUEST['ten']=="" || $_REQUEST['email']=="" || $_REQUEST['phone']=="" || $_REQUEST['password']==""){
                                        echo "Vui lòng nhập đầy đủ thông tin để đăng ký";
                                    }
                                    else{
                                        $nv = ['Holot' => $_REQUEST['holot'],'Ten' => $_REQUEST['ten'],'Email' => $_REQUEST['email'],'Phone' => $_REQUEST['phone'],'Password' => $_REQUEST['password']];
                                        $p->addNV($nv);
                                    }
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12"> -->
                          <!--   <br>
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <select class="form-control">
                                    <option>Option 1</option>
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