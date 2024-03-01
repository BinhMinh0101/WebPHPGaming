<?php
	ob_start();
	class thuonghieu{
		function getAll(){
			$a = new DateBase;
			$con=$a->connnection();
			$sql = "select * from thuonghieu where TrangThai=1";
            $rs = mysqli_query($con,$sql);
            while ($row=mysqli_fetch_array($rs)){
				$MaThuongHieu  = $row['MaThuongHieu'];
				$TenThuongHieu=$row['TenThuongHieu'];
				$TrangThai=$row['TrangThai'];
				$thuonghieu=['MaThuongHieu' => $MaThuongHieu, 'TenThuongHieu' => $TenThuongHieu , 'TrangThai' => $TrangThai  ];
					$cacthuonghieu[] = $thuonghieu;
				}
				return( $cacthuonghieu);
		}
		function getAllNB(){
			$a = new DateBase;
			$con=$a->connnection();
			$sql = "select * from thuonghieu where TrangThai=0";
            $rs = mysqli_query($con,$sql);
            while ($row=mysqli_fetch_array($rs)){
				$MaThuongHieu  = $row['MaThuongHieu'];
				$TenThuongHieu=$row['TenThuongHieu'];
				$TrangThai=$row['TrangThai'];
				$thuonghieu=['MaThuongHieu' => $MaThuongHieu, 'TenThuongHieu' => $TenThuongHieu , 'TrangThai' => $TrangThai  ];
					$cacthuonghieu[] = $thuonghieu;
				}
				return( $cacthuonghieu);
		}
		function thuonghieutheoID($math){
			include ('connection.php');
			$a=new DateBase;
			$con=$a->connnection();
			$sql="select * from thuonghieu where MaThuongHieu = '".$math."'";
            $rs=mysqli_query($con,$sql);
            while ($row=mysqli_fetch_array($rs)){
				$MaThuongHieu=$row['MaThuongHieu'];
				$TenThuongHieu=$row['TenThuongHieu'];
				$TrangThai=$row['TrangThai'];
				$thuonghieu=['MaThuongHieu' => $MaThuongHieu, 'TenThuongHieu' => $TenThuongHieu , 'TrangThai' => $TrangThai];
			}
			return($thuonghieu);
		}
		function lockTH($math){
			$a=new DateBase;
			$con=$a->connnection();
			$sql="update thuonghieu set TrangThai='0' where MaThuongHieu='".$math."'";
			mysqli_query($con,$sql);
			echo "<script>alert('Bạn đã xóa thương hiệu khỏi hệ thống');window.location='trademark.php';
				</script>";
		}
		function unlockTH($math){
			$a=new DateBase;
			$con=$a->connnection();
			$sql="update thuonghieu set TrangThai='1' where MaThuongHieu='".$math."'";
			mysqli_query($con,$sql);
			echo "<script>alert('Bạn đã khôi phục thương hiệu trên hệ thống');window.location='trademark.php';
				</script>";
		}
		function updateTH($math,$tenth){
			$a=new DateBase;
			$con=$a->connnection();
			$sql_checkTen="select *  from thuonghieu where TenThuongHieu='".$tenth."'";
			$rs_Ten=mysqli_query($con,$sql_checkTen);
			$row_Ten=mysqli_fetch_array($rs_Ten);
            if($row_Ten!=0){
            	echo '<script>alert("Tên thương hiệu đã tồn tại. Vui lòng nhập lại tên thương hiệu")</script>';
            }
            else{
				$sql="update thuonghieu set TenThuongHieu='".$tenth."' where MaThuongHieu='".$math."'";
				mysqli_query($con,$sql);
				echo "<script>alert('Thay đổi thông tin thương hiệu thành công');window.location='trademark.php';
					</script>";
			}
		}
		function addTH($tenth){
			include ('connection.php');
			$a = new DateBase;
			$con = $a->connnection();
			$sql_check="select *  from thuonghieu where TenThuongHieu='".$tenth."'";
			$rs_check=mysqli_query($con,$sql_check);
			$row_check=mysqli_fetch_array($rs_check);
            if($row_check!=0){
                echo '<script>alert("Tên thương hiệu đã tồn tại. Vui lòng nhập lại tên thương hiệu")</script>';
            }
            else{
            	$sql="insert into thuonghieu(TenThuongHieu,TrangThai) values('".$tenth."','1')";
				mysqli_query($con,$sql);
				echo "<script>alert('Thêm mới thương hiệu thành công');window.location='trademark.php';
					</script>";
            }
		}
		function getThuonghieuID($math){
			$a=new DateBase;
			$con=$a->connnection();
			$sql="select * from thuonghieu where MaThuongHieu = '".$math."'";
            $rs=mysqli_query($con,$sql);
            while ($row=mysqli_fetch_array($rs)){
				$MaThuongHieu=$row['MaThuongHieu'];
				$TenThuongHieu=$row['TenThuongHieu'];
				$TrangThai=$row['TrangThai'];
				$thuonghieu=['MaThuongHieu' => $MaThuongHieu, 'TenThuongHieu' => $TenThuongHieu , 'TrangThai' => $TrangThai];
			}
			return($thuonghieu);
		}
	}
?>