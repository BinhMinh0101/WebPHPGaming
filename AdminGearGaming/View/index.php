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
				<h1 class="page-header">Quản Lý Sản Phẩm</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Bảng Sản Phẩm</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="fixed-table-toolbar">
								<div class="btn pull-left">
									<form method="get">
										<a class="btn btn-default" href="insert-product.php"><i class="glyphicon glyphicon-plus-sign" style="margin-top: 1px"></i> Thêm mới sản phẩm</a>
                                        <label>
                                            <div class="form-group">
                                                <select class="form-control" name='tinhtrang' id='tinhtrang'>
                                                    <option value='db'>Sản phẩm đang bán</option>
                                                    <option value='nb'>Sản phẩm ngừng bán</option>
                                                </select>
                                            </div>
                                        </label>
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> <b>Lọc</b></button>
                                    </form>
								</div>
								<div class="pull-right search">
									<input class="form-control" type="text" placeholder="Tìm kiếm">
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
												<th data-field="cb" data-checkbox="true"></th>
												<th data-field="id" data-sortable="true">Mã sản phẩm</th>
												<th data-field="img" data-sortable="true">Hình ảnh</th>
												<th data-field="products" data-sortable="true">Tên sản phẩm</th>
												<th data-field="dm" data-sortable="true">Danh mục</th>
												<th data-field="th" data-sortable="true">Thương hiệu</th>
												<th data-field="qty" data-sortable="true">Số lượng kho</th>
												<th data-field="price" data-sortable="true">Giá</th>
												<th data-field="rs" data-sortable="true">Tác vụ</th>
											</tr>
										</thead>
										<form method="post">
										<tbody>
											<?php
											$tinhtrang=$_GET['tinhtrang'];
											include('../../Model/connection.php');
                                            include('../../Controller/sanpham.php');
                                            $p=new sanpham_controller;
                                            if($tinhtrang=='db' || empty($tinhtrang)){
	                                            foreach($p->getAll() as $sp){
													echo'<tr>
														<td class="bs-checkbox">
															<input type="checkbox">
														</td>
														<td>'.$sp['MaSanPham'].'</td>
														<td>
															<img src="../../products-images/'.$sp['Anh'].'" alt="" style="width: 75px">
														</td>
														<td>'.$sp['TenSanPham'].'</td>
														<td>'.$sp['DanhMuc'].'</td>
														<td>'.$sp['ThuongHieu'].'</td>
														<td>'.$sp['SoLuong'].'</td>
														<td>'.number_format($sp['Gia'],0).'</td>
														<td>
															<div class="rf" style="display: flex; justify-content: space-around;">
																<a href="index.php?MaSanPham='.$sp['MaSanPham'].'"><i class="glyphicon glyphicon-trash"></i></a>
																<a href="update-product.php?MaSanPham='.$sp['MaSanPham'].'"><i class="glyphicon glyphicon-pencil"></i></a>
															</div>
														</td>
													</tr>';
												}
											}
											else if($tinhtrang=='nb'){
												foreach($p->getAllNB() as $spnb){
													echo'<tr>
														<td class="bs-checkbox">
															<input type="checkbox">
														</td>
														<td>'.$spnb['MaSanPham'].'</td>
														<td>
															<img src="../../products-images/'.$spnb['Anh'].'" alt="" style="width: 75px">
														</td>
														<td>'.$spnb['TenSanPham'].'</td>
														<td>'.$spnb['DanhMuc'].'</td>
														<td>'.$spnb['ThuongHieu'].'</td>
														<td>'.$spnb['SoLuong'].'</td>
														<td>'.number_format($spnb['Gia'],0).'</td>
														<td>
															<div class="rf" style="display: flex; justify-content: space-around;">
																<a href="index.php?MaSanPhamXoa='.$spnb['MaSanPham'].'"><i class="glyphicon glyphicon-repeat"></i></a>
															</div>
														</td>
													</tr>';
												}
											}
											?>
										</tbody>
										</form>
									</table>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		 <?php
            $masanpham=$_GET['MaSanPham'];
            $masanphamxoa=$_GET['MaSanPhamXoa'];
            if(isset($masanpham)){           
                $p->lockSP($masanpham);
            }
            if(isset($masanphamxoa)){           
                $p->unlockSP($masanphamxoa);
            }
        ?>
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