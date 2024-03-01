<?php
class taikhoan
{
	function checkTK($email, $pass)
	{
		// include ('connection.php');
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select * from taikhoan where Email='" . $email . "'";
		$rs = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($rs);
		if ($row == 0) {
			echo '<script>alert("Không tìm thấy tài khoản")</script>';
		} else {
			if ($pass == $row['MatKhau']) {
				if ($row['KichHoat'] == '1') {
					if ($row['Quyen'] == '1') {
						session_start();
						$_SESSION['MaTaiKhoan'] = $row['MaTaiKhoan'];
						$_SESSION['Holot'] = $row['HoLot'];
						$_SESSION['Ten'] = $row['Ten'];
						$_SESSION['Email'] = $row['Email'];
						$_SESSION['Phone'] = $row['Phone'];
						$_SESSION['Quyen'] = $row['Quyen'];
						header('location: ../../AdminGearGaming/View/index.php');
					} else if ($row['Quyen'] == '2') {
						session_start();
						$_SESSION['MaTaiKhoan'] = $row['MaTaiKhoan'];
						$_SESSION['Holot'] = $row['HoLot'];
						$_SESSION['Ten'] = $row['Ten'];
						$_SESSION['Email'] = $row['Email'];
						$_SESSION['Phone'] = $row['Phone'];
						$_SESSION['Quyen'] = $row['Quyen'];
						header('location: ../../AdminGearGaming/View/thukhodh.php');
					} else {
						session_start();
						$_SESSION['MaTaiKhoan'] = $row['MaTaiKhoan'];
						$_SESSION['Holot'] = $row['HoLot'];
						$_SESSION['Ten'] = $row['Ten'];
						$_SESSION['Email'] = $row['Email'];
						$_SESSION['Phone'] = $row['Phone'];
						$_SESSION['Quyen'] = $row['Quyen'];
						header('location: ../index.php');
					}
				} else {
					echo '<script>alert("Tài khoản bạn chưa được kích hoạt. Vui lòng kích hoạt để sử dụng")</script>';
				}
			} else {
				echo '<script>alert("Nhập sai password")</script>';
			}
		}
	}
	function saveTK($cus)
	{
		// include ('connection.php');
		$a = new DateBase;
		$con = $a->connnection();
		$holot = $cus['Holot'];
		$ten = $cus['Ten'];
		$email = $cus['Email'];
		$phone = $cus['Phone'];
		$pass = $cus['Password'];
		$sql_checkEmail = "select *  from taikhoan where Email='" . $email . "'";
		$sql_checkPhone = "select *  from taikhoan where Phone='" . $phone . "'";
		$rs_Email = mysqli_query($con, $sql_checkEmail);
		$rs_Phone = mysqli_query($con, $sql_checkPhone);
		$row_Email = mysqli_fetch_array($rs_Email);
		$row_Phone = mysqli_fetch_array($rs_Phone);
		if ($row_Email != 0) {
			echo '<script>alert("Địa chỉ email đã được đăng ký. Vui lòng nhập lại địa chỉ email")</script>';
		} else if ($row_Phone != 0) {
			echo '<script>alert("Số điện thoại đã được đăng ký. Vui lòng nhập lại số điện thoại")</script>';
		} else {
			$sql = "insert into taikhoan(HoLot,Ten,Email,Phone,MatKhau,KichHoat,Quyen) values('" . $holot . "','" . $ten . "','" . $email . "','" . $phone . "','" . $pass . "','1','0')";
			mysqli_query($con, $sql);
			echo "<script>alert('Vui lòng đăng nhập vào Gmail để xác thực tài khoản');window.location='login.php';
				</script>";
		}
	}
	function getTK($matk)
	{
		// include ('connection.php');
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select * from taikhoan where MaTaiKhoan='" . $matk . "'";
		$rs = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$matk = $row['MaTaiKhoan'];
			$holot = $row['HoLot'];
			$ten = $row['Ten'];
			$email = $row['Email'];
			$phone = $row['Phone'];
			$taikhoan = ['MaTaiKhoan' => $matk, 'HoLot' => $holot, 'Ten' => $ten, 'Email' => $email, 'Phone' => $phone];
		}
		return $taikhoan;
	}
	function showDSTK()
	{
		include('connection.php');
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select * from taikhoan where Quyen!=1";
		$rs = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$matk = $row['MaTaiKhoan'];
			$holot = $row['HoLot'];
			$ten = $row['Ten'];
			$email = $row['Email'];
			$phone = substr($row['Phone'], 0, 5) . '*****';
			$kichhoat = $row['KichHoat'];
			$quyen = $row['Quyen'];
			$taikhoan = ['MaTaiKhoan' => $matk, 'HoLot' => $holot, 'Ten' => $ten, 'Email' => $email, 'Phone' => $phone, 'KichHoat' => $kichhoat, 'Quyen' => $quyen];
			$dstk[] = $taikhoan;
		}
		return $dstk;
	}
	function showDSTK_KH()
	{
		include('connection.php');
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select * from taikhoan where Quyen=0";
		$rs = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$matk = $row['MaTaiKhoan'];
			$holot = $row['HoLot'];
			$ten = $row['Ten'];
			$email = $row['Email'];
			$phone = substr($row['Phone'], 0, 5) . '*****';
			$kichhoat = $row['KichHoat'];
			$taikhoan = ['MaTaiKhoan' => $matk, 'HoLot' => $holot, 'Ten' => $ten, 'Email' => $email, 'Phone' => $phone, 'KichHoat' => $kichhoat, 'Quyen' => $quyen];
			$dstk_kh[] = $taikhoan;
		}
		return $dstk_kh;
	}
	function showDSTK_QL()
	{
		include('connection.php');
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select * from taikhoan where Quyen=2";
		$rs = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$matk = $row['MaTaiKhoan'];
			$holot = $row['HoLot'];
			$ten = $row['Ten'];
			$email = $row['Email'];
			$phone = substr($row['Phone'], 0, 5) . '*****';
			$kichhoat = $row['KichHoat'];
			$taikhoan = ['MaTaiKhoan' => $matk, 'HoLot' => $holot, 'Ten' => $ten, 'Email' => $email, 'Phone' => $phone, 'KichHoat' => $kichhoat, 'Quyen' => $quyen];
			$dstk_ql[] = $taikhoan;
		}
		return $dstk_ql;
	}
	function addNV($nv)
	{
		include('connection.php');
		$a = new DateBase;
		$con = $a->connnection();
		$holot = $nv['Holot'];
		$ten = $nv['Ten'];
		$email = $nv['Email'];
		$phone = $nv['Phone'];
		$pass = $nv['Password'];
		$quyen = $nv['Quyen'];
		$sql_checkEmail = "select *  from taikhoan where Email='" . $email . "'";
		$sql_checkPhone = "select *  from taikhoan where Phone='" . $phone . "'";
		$rs_Email = mysqli_query($con, $sql_checkEmail);
		$rs_Phone = mysqli_query($con, $sql_checkPhone);
		$row_Email = mysqli_fetch_array($rs_Email);
		$row_Phone = mysqli_fetch_array($rs_Phone);
		if ($row_Email != 0) {
			echo '<script>alert("Địa chỉ email đã được đăng ký. Vui lòng nhập lại địa chỉ email")</script>';
		} else if ($row_Phone != 0) {
			echo '<script>alert("Số điện thoại đã được đăng ký. Vui lòng nhập lại số điện thoại")</script>';
		} else {
			$sql = "insert into taikhoan(HoLot,Ten,Email,Phone,MatKhau,KichHoat,Quyen) values('" . $holot . "','" . $ten . "','" . $email . "','" . $phone . "','" . $pass . "','1','2')";
			mysqli_query($con, $sql);
			echo "<script>alert('Thêm mới quản lý thành công');window.location='account.php';
					</script>";
		}
	}
	function getTKQL($matk)
	{
		include('connection.php');
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "select * from taikhoan where MaTaiKhoan='" . $matk . "'";
		$rs = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($rs)) {
			$matk = $row['MaTaiKhoan'];
			$holot = $row['HoLot'];
			$ten = $row['Ten'];
			$email = $row['Email'];
			$phone = $row['Phone'];
			$taikhoan = ['MaTaiKhoan' => $matk, 'HoLot' => $holot, 'Ten' => $ten, 'Email' => $email, 'Phone' => $phone];
		}
		return $taikhoan;
	}
	function lockTK($matk)
	{
		$a = new DateBase;
		$con = $a->connnection();
		$sql = "update taikhoan set KichHoat='0' where MaTaiKhoan='" . $matk . "'";
		mysqli_query($con, $sql);
		header('location:account.php');
	}
	function changeTK($matk, $nv)
	{
		$a = new DateBase;
		$con = $a->connnection();
		$holot = $nv['Holot'];
		$ten = $nv['Ten'];
		$phone = $nv['Phone'];
		$sql = "update taikhoan set HoLot='" . $holot . "',Ten='" . $ten . "',Phone='" . $phone . "' where MaTaiKhoan='" . $matk . "'";
		mysqli_query($con, $sql);
		echo "<script>alert('Thay đổi thông tin quản lý thành công');window.location='account.php';
				</script>";
	}
	function changePass($matk, $matkhau)
	{
		$a = new DateBase;
		$con = $a->connnection();
		$mkcu = $matkhau['Matkhaucu'];
		$mkmoi = $matkhau['Matkhaumoi'];
		$xacnhan = $matkhau['Xacnhan'];
		$sql_check = "select * from taikhoan where MaTaiKhoan='" . $matk . "' and MatKhau='" . $mkcu . "'";
		$rs = mysqli_query($con, $sql_check);
		$row = mysqli_fetch_array($rs);
		if ($row == 0) {
			echo "<script>alert('Mật khẩu không đúng. Vui lòng nhập lại mật khẩu');window.location='password.php';
				</script>";
		} else if ($mkmoi != $xacnhan) {
			echo "<script>alert('Xác nhận mật khẩu chưa khớp. Vui lòng kiểm tra lại');window.location='password.php';
				</script>";
		} else {
			$sql = "update taikhoan set MatKhau='" . $mkmoi . "' where MaTaiKhoan='" . $matk . "'";
			mysqli_query($con, $sql);
			echo "<script>alert('Thay đổi mật khẩu thành công');window.location='account.php';
					</script>";
		}
	}
}
