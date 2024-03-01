<?php
	class DateBase{
		function connnection(){
			$con=mysqli_connect("localhost","root","","gear_web_db");
			if(!$con){
				echo 'Không thể kết nối được cơ sở dữ liệu';
			}
			else{
				return $con;
			}
		}
	}
?>