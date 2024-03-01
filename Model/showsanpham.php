<?php
	class showsanpham{
		function getName(){
			$a=new DateBase;
			$con=$a->connnection();
			$sql = "select * from showsanpham where TrangThai = 1" ;
            $rs = mysqli_query($con,$sql);
            while ($row=mysqli_fetch_array($rs)){
				$MaHang = $row['MaHang'];
				$TenMuc = $row['TenMuc'];
				$Muc =['MaHang' => $MaHang, 'TenMuc' => $TenMuc];
				$CacMuc[]=$Muc;
			}
			return ($CacMuc);
		}
	}
?>