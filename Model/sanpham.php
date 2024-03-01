<?php
ob_start();
class sanpham
{
	function getOnly()
	{
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select distinct MaThuongHieu from sanpham where TrangThai = 1 ";
		$rs = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$cacthuonghieu[] = $row['MaThuongHieu'];
		}
		return ($cacthuonghieu);
	}
	function getAll()
	{
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select * from sanpham where TrangThai = 1 ";
		$rs = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$MaSanPham   = $row['MaSanPham'];
			$TenSanPham = $row['TenSanPham'];
			$SoLuong  = $row['SoLuong'];
			$MaDanhMuc = $row['MaDanhMuc'];
			$sql_danhmuc = "select * from danhmuc where MaDanhMuc = '" . $MaDanhMuc . "'";
			$rs_danhmuc = mysqli_query($con, $sql_danhmuc);
			while ($row_danhmuc = mysqli_fetch_array($rs_danhmuc)) {
				$TenDanhMuc = $row_danhmuc['TenDanhMuc'];
			}
			$MaThuongHieu  = $row['MaThuongHieu'];
			$sql_thuonghieu = "select * from thuonghieu where MaThuongHieu = '" . $MaThuongHieu . "'";
			$rs_thuonghieu = mysqli_query($con, $sql_thuonghieu);
			while ($row_thuonghieu = mysqli_fetch_array($rs_thuonghieu)) {
				$TenThuongHieu = $row_thuonghieu['TenThuongHieu'];
			}
			$Anh = $row['Anh'];
			$MoTa  = $row['MoTa'];
			$Gia = $row['Gia'];
			$LoaiShow  = $row['LoaiShow'];
			$sanpham = ['MaSanPham' => $MaSanPham, 'TenSanPham' => $TenSanPham, 'SoLuong' => $SoLuong, 'MaDanhMuc' => $MaDanhMuc, 'MaThuongHieu' => $MaThuongHieu, 'Anh' => $Anh, 'MoTa' => $MoTa, 'Gia' => $Gia, 'LoaiShow' => $LoaiShow, 'DanhMuc' => $TenDanhMuc, 'ThuongHieu' => $TenThuongHieu];
			$cacsanpham[] = $sanpham;
		}
		return ($cacsanpham);
	}
	function getDone()
	{
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select * from sanpham where TenSanPham like '%" . $_REQUEST['search'] . "%' and TrangThai = 1";
		$rs = mysqli_query($con, $sql);
		$num = mysqli_num_rows($rs);
		if ($num != 0) {
			while ($row = mysqli_fetch_array($rs)) {
				$MaSanPham   = $row['MaSanPham'];
				$TenSanPham = $row['TenSanPham'];
				$SoLuong  = $row['SoLuong'];
				$MaDanhMuc = $row['MaDanhMuc'];
				$MaThuongHieu  = $row['MaThuongHieu'];
				$Anh = $row['Anh'];
				$MoTa  = $row['MoTa'];
				$Gia = $row['Gia'];
				$LoaiShow  = $row['LoaiShow'];
				$sanpham = ['MaSanPham' => $MaSanPham, 'TenSanPham' => $TenSanPham, 'SoLuong' => $SoLuong, 'MaDanhMuc' => $MaDanhMuc, 'MaThuongHieu' => $MaThuongHieu, 'Anh' => $Anh, 'MoTa' => $MoTa, 'Gia' => $Gia, 'LoaiShow' => $LoaiShow];
				$cacsanpham[] = $sanpham;
			}
			return ($cacsanpham);
		} else return 0;
	}
	function getshow()
	{
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select * from sanpham where  TrangThai = 1";
		$rs = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$MaSanPham = $row['MaSanPham'];
			$TenSanPham = $row['TenSanPham'];
			$Anh = $row['Anh'];
			$Gia = $row['Gia'];
			$LoaiShow = $row['LoaiShow'];
			$sanpham = ['MaSanPham' => $MaSanPham, 'TenSanPham' => $TenSanPham, 'Anh' => $Anh, 'Gia' => $Gia, 'LoaiShow' => $LoaiShow];
			$cacsanpham[] = $sanpham;
		}
		return ($cacsanpham);
	}
	function LayRandom()
	{
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select * FROM sanpham WHERE TrangThai = 1 ORDER BY RAND() LIMIT 8";
		$rs = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$MaSanPham = $row['MaSanPham'];
			$TenSanPham = $row['TenSanPham'];
			$Anh = $row['Anh'];
			$Gia = $row['Gia'];
			$LoaiShow = $row['LoaiShow'];
			$sanpham = ['MaSanPham' => $MaSanPham, 'TenSanPham' => $TenSanPham, 'Anh' => $Anh, 'Gia' => $Gia, 'LoaiShow' => $LoaiShow];
			$cacsanpham[] = $sanpham;
		}
		return ($cacsanpham);
	}
	public function sanPhamTheoID($maSanPham)
	{
		$connect = new DateBase;
		$connect = $connect->connnection();

		$query = 'select * from sanpham where MaSanPham = ' . $maSanPham;
		return mysqli_query($connect, $query);
	}
	public function truSanPham($maSanPham, $soLuongTru)
	{
		$connect = new DateBase;
		$connect = $connect->connnection();

		$query = 'update sanpham set SoLuong = (SELECT SoLuong from sanpham WHERE MaSanPham = ' . $maSanPham . ') - ' . $soLuongTru . ' WHERE MaSanPham = ' . $maSanPham . '';
		mysqli_query($connect, $query);
	}
	function getAllNB()
	{
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select * from sanpham where TrangThai = 0 ";
		$rs = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$MaSanPham   = $row['MaSanPham'];
			$TenSanPham = $row['TenSanPham'];
			$SoLuong  = $row['SoLuong'];
			$MaDanhMuc = $row['MaDanhMuc'];
			$sql_danhmuc = "select * from danhmuc where MaDanhMuc = '" . $MaDanhMuc . "'";
			$rs_danhmuc = mysqli_query($con, $sql_danhmuc);
			while ($row_danhmuc = mysqli_fetch_array($rs_danhmuc)) {
				$TenDanhMuc = $row_danhmuc['TenDanhMuc'];
			}
			$MaThuongHieu  = $row['MaThuongHieu'];
			$sql_thuonghieu = "select * from thuonghieu where MaThuongHieu = '" . $MaThuongHieu . "'";
			$rs_thuonghieu = mysqli_query($con, $sql_thuonghieu);
			while ($row_thuonghieu = mysqli_fetch_array($rs_thuonghieu)) {
				$TenThuongHieu = $row_thuonghieu['TenThuongHieu'];
			}
			$Anh = $row['Anh'];
			$MoTa  = $row['MoTa'];
			$Gia = $row['Gia'];
			$LoaiShow  = $row['LoaiShow'];
			$sanpham = ['MaSanPham' => $MaSanPham, 'TenSanPham' => $TenSanPham, 'SoLuong' => $SoLuong, 'MaDanhMuc' => $MaDanhMuc, 'MaThuongHieu' => $MaThuongHieu, 'Anh' => $Anh, 'MoTa' => $MoTa, 'Gia' => $Gia, 'LoaiShow' => $LoaiShow, 'DanhMuc' => $TenDanhMuc, 'ThuongHieu' => $TenThuongHieu];
			$cacsanpham[] = $sanpham;
		}
		return ($cacsanpham);
	}
	function lockSP($masp)
	{
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "update sanpham set TrangThai='0' where MaSanPham='".$masp ."'";
		mysqli_query($con, $sql);
		echo "<script>alert('Bạn đã xóa sản phẩm khỏi hệ thống');window.location='index.php';
				</script>";
	}
	function unlockSP($masp)
	{
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "update sanpham set TrangThai='1' where MaSanPham='" . $masp . "'";
		mysqli_query($con, $sql);
		echo "<script>alert('Bạn khôi phục sản phẩm xóa thành công');window.location='index.php';
				</script>";
	}
	function changeSP($masp, $sanpham)
	{
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "update sanpham set TenSanPham='" . $sanpham['TenSanPham'] . "',Gia='" . $sanpham['Gia'] . "',MoTa='" . $sanpham['MoTa'] . "',Anh='" . $sanpham['Anh'] . "' where MaSanPham='" . $masp . "'";
		mysqli_query($con, $sql);
		echo "<script>alert('Bạn đã thay đổi thông tin sản phẩm trên hệ thống');window.location='index.php';
				</script>";
	}
	function addSP($sanpham)
	{
		$a = new DateBase;
		$con = $a->connnection();
		$tensp = $sanpham['TenSanPham'];
		$danhmuc = $sanpham['DanhMuc'];
		$thuonghieu = $sanpham['ThuongHieu'];
		$gia = $sanpham['Gia'];
		$mota = $sanpham['MoTa'];
		$anh = $sanpham['Anh'];
		$sql = "select * from sanpham where TenSanPham = '" . $tensp . "'";
		$rs = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($rs);
		if ($row != 0) {
			echo '<script>alert("Tên sản phẩm đã được sử dụng. Vui lòng nhập lại tên sản phẩm")</script>';
		} else {
			$sql_them = "insert into sanpham(TenSanPham,SoLuong,MaThuongHieu,MaDanhMuc,Anh,MoTa,Gia,GiamGia,LoaiShow,TrangThai) values('" . $tensp . "','0','" . $thuonghieu . "','" . $danhmuc . "','" . $anh . "','" . $mota . "','" . $gia . "','0','1','1')";
			mysqli_query($con, $sql_them);
			echo "<script>alert('Thêm mới sản phẩm thành công');window.location='index.php';
					</script>";
		}
	}
	public function sanPhamDmThTheoID($maSanPham)
	{
		$connect = new DateBase;
		$connect = $connect->connnection();

		$query = 'select TenSanPham,TenDanhMuc,TenThuongHieu,Anh from sanpham,thuonghieu,danhmuc where sanpham.MaDanhMuc=danhmuc.MaDanhMuc and sanpham.MaThuongHieu=thuonghieu.MaThuongHieu and MaSanPham =' . $maSanPham;
		return mysqli_query($connect, $query);
	}
	function getIDCategory($categoryID)
	{
		$my_conn = new DateBase;
		$my_conn = $my_conn->connnection();
		$sql = "SELECT * FROM sanpham WHERE MaDanhMuc = $categoryID";
		$rs = mysqli_query($my_conn, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$MaSanPham = $row['MaSanPham'];
			$TenSanPham = $row['TenSanPham'];
			$Anh = $row['Anh'];
			$Gia = $row['Gia'];

			$sanpham = ['MaSanPham' => $MaSanPham, 'TenSanPham' => $TenSanPham, 'Anh' => $Anh, 'Gia' => $Gia];
			$cacsanpham[] = $sanpham;
		}
		return $cacsanpham;
	}
	function getIDBrands($brandsID)
	{
		$my_conn = new DateBase;
		$my_conn = $my_conn->connnection();
		$sql = "SELECT * FROM sanpham WHERE MaThuongHieu = $brandsID";
		$rs = mysqli_query($my_conn, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$MaSanPham = $row['MaSanPham'];
			$TenSanPham = $row['TenSanPham'];
			$Anh = $row['Anh'];
			$Gia = $row['Gia'];

			$sanpham = ['MaSanPham' => $MaSanPham, 'TenSanPham' => $TenSanPham, 'Anh' => $Anh, 'Gia' => $Gia];
			$cacsanpham[] = $sanpham;
		}
		return $cacsanpham;
	}
	public function congSanPham($maSanPham, $soLuongCong)
	{
		$connect = new DateBase;
		$connect = $connect->connnection();

		$query = 'update sanpham set SoLuong = (SELECT SoLuong from sanpham WHERE MaSanPham = ' . $maSanPham . ') + ' . $soLuongCong . ' WHERE MaSanPham = ' . $maSanPham . '';
		mysqli_query($connect, $query);
	}
}
