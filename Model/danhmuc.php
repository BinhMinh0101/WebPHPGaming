<?php
	ob_start();
	class danhmuc{
		function getAll(){
			$a = new DateBase;
			$con=$a->connnection();
			$sql = "select * from danhmuc where TrangThai = 1 ";
            $rs = mysqli_query($con,$sql);
            while ($row=mysqli_fetch_array($rs)){
				$MaDanhMuc  = $row['MaDanhMuc'];
				$TenDanhMuc=$row['TenDanhMuc'];
				$TrangThai=$row['TrangThai'];
				$danhmuc=['MaDanhMuc' => $MaDanhMuc, 'TenDanhMuc' => $TenDanhMuc , 'TrangThai' => $TrangThai ];
				$cacdanhmuc[]=$danhmuc;
				}
				return($cacdanhmuc);
		}
		function getAllNB(){
			$a = new DateBase;
			$con=$a->connnection();
			$sql = "select * from danhmuc where TrangThai = 0";
            $rs = mysqli_query($con,$sql);
            while ($row=mysqli_fetch_array($rs)){
				$MaDanhMuc  = $row['MaDanhMuc'];
				$TenDanhMuc=$row['TenDanhMuc'];
				$TrangThai=$row['TrangThai'];
				$danhmuc=['MaDanhMuc' => $MaDanhMuc, 'TenDanhMuc' => $TenDanhMuc , 'TrangThai' => $TrangThai ];
				$cacdanhmuc[]=$danhmuc;
				}
				return($cacdanhmuc);
		}
		function danhmuctheoID($madm){
			include ('connection.php');
			$a=new DateBase;
			$con=$a->connnection();
			$sql="select * from danhmuc where MaDanhMuc = '".$madm."'";
            $rs=mysqli_query($con,$sql);
            while ($row=mysqli_fetch_array($rs)){
				$MaDanhMuc=$row['MaDanhMuc'];
				$TenDanhMuc=$row['TenDanhMuc'];
				$TrangThai=$row['TrangThai'];
				$danhmuc=['MaDanhMuc' => $MaDanhMuc, 'TenDanhMuc' => $TenDanhMuc , 'TrangThai' => $TrangThai];
			}
			return($danhmuc);
		}
		function lockDM($madm){
			$a=new DateBase;
			$con=$a->connnection();
			$sql="update danhmuc set TrangThai='0' where MaDanhMuc='".$madm."'";
			mysqli_query($con,$sql);
			echo "<script>alert('Bạn đã xóa danh mục khỏi hệ thống');window.location='category.php';
				</script>";
		}
		function unlockDM($madm){
			$a=new DateBase;
			$con=$a->connnection();
			$sql="update danhmuc set TrangThai='1' where MaDanhMuc='".$madm."'";
			mysqli_query($con,$sql);
			echo "<script>alert('Bạn đã khôi phục thương hiệu thành công');window.location='category.php';
				</script>";
		}
		function updateDM($madm,$tendm){
			$a=new DateBase;
			$con=$a->connnection();
			$sql_checkTen="select *  from danhmuc where TenDanhMuc='".$tendm."'";
			$rs_Ten=mysqli_query($con,$sql_checkTen);
			$row_Ten=mysqli_fetch_array($rs_Ten);
            if($row_Ten!=0){
            	echo '<script>alert("Tên danh mục đã tồn tại. Vui lòng nhập lại tên danh mục")</script>';
            }
            else{
				$sql="update danhmuc set TenDanhMuc='".$tendm."' where MaDanhMuc='".$madm."'";
				mysqli_query($con,$sql);
				echo "<script>alert('Thay đổi thông tin danh mục thành công');window.location='category.php';
					</script>";
			}
		}
		function addDM($tendm){
			include ('connection.php');
			$a = new DateBase;
			$con = $a->connnection();
			$sql_check="select *  from danhmuc where TenDanhMuc='".$tendm."'";
			$rs_check=mysqli_query($con,$sql_check);
			$row_check=mysqli_fetch_array($rs_check);
            if($row_check!=0){
                echo '<script>alert("Tên danh mục đã tồn tại. Vui lòng nhập lại tên danh mục")</script>';
            }
            else{
            	$sql="insert into danhmuc(TenDanhMuc,TrangThai) values('".$tendm."','1')";
				mysqli_query($con,$sql);
				echo "<script>alert('Thêm mới danh mục thành công');window.location='category.php';
					</script>";
            }
		}
		function getDanhmucID($madm){
			$a=new DateBase;
			$con=$a->connnection();
			$sql="select * from danhmuc where MaDanhMuc = '".$madm."'";
            $rs=mysqli_query($con,$sql);
            while ($row=mysqli_fetch_array($rs)){
				$MaDanhMuc=$row['MaDanhMuc'];
				$TenDanhMuc=$row['TenDanhMuc'];
				$TrangThai=$row['TrangThai'];
				$danhmuc=['MaDanhMuc' => $MaDanhMuc, 'TenDanhMuc' => $TenDanhMuc , 'TrangThai' => $TrangThai];
			}
			return($danhmuc);
		}
	}
?>