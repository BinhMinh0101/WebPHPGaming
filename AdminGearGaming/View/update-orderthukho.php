<?php
error_reporting(0);
include('../../Model/connection.php');
include('../../Controller/c_order.php');
include('../../Model/m_order.php');
$saveOrder = new order_c;
$id = $_GET['id_order'];
$option = $_GET['tinhtrang'];
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
                <h1 class="page-header">Cập Nhập Đơn Hàng</h1>
            </div>
        </div>
        <form method="post">
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="option" class="form-control" id="inputState">
                                        <option value="1" <?php
                                                            if ($option == 1) {
                                                                echo 'selected';
                                                            }
                                                            ?>>Đã xử lý</option>
                                        <option value="0" <?php
                                                            if ($option == 0) {
                                                                echo 'selected';
                                                            }
                                                            ?>>Chưa xử lý</option>
                                    </select>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" name="save-order" class="btn btn-info"><i class="glyphicon glyphicon-floppy-saved"></i>Lưu</button>
                                </div>
                                <?php
                                if (isset($_POST['save-order'])) {
                                    $tinhtrang = $_REQUEST['option'];
                                    $saveOrder->repair_order($id, $tinhtrang);
                                    header('Location: thukhodh.php');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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