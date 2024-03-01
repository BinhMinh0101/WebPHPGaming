<?php
	class showsanpham_controller{
		function getName(){
			include ("../../Model/showsanpham.php");
			$p=new showsanpham;
			$sp = $p->getName();
			return $sp;
		}
		
	}
?>