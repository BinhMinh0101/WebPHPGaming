<?php
	ob_start();
	class danhmuc_controller{
		function getAll(){
			include ("../../Model/danhmuc.php");
			$p=new danhmuc;
			$danhmuc=$p->getAll();
			return $danhmuc;
		}
		function getAllNB(){
			include ("../../Model/danhmuc.php");
			$p=new danhmuc;
			$danhmuc=$p->getAllNB();
			return $danhmuc;
		}
		function danhmucID($madm){
			include ("../../Model/danhmuc.php");
			$p=new danhmuc;
			$danhmucID=$p->danhmuctheoID($madm);
			return $danhmucID;
		}
		function lockDM($madm){
			$p=new danhmuc;
			$p->lockDM($madm);
		}
		function unlockDM($madm){
			$p=new danhmuc;
			$p->unlockDM($madm);
		}
		function updateDM($madm,$tendm){
			$p=new danhmuc;
			$p->updateDM($madm,$tendm);
		}
		function addDM($tendm){
			include ("../../Model/danhmuc.php");
			$p=new danhmuc;
			$p->addDM($tendm);
		}
		function danhmuctheoID($madm){
			include ("../../Model/danhmuc.php");
			$p=new danhmuc;
			$danhmucID=$p->getDanhmucID($madm);
			return $danhmucID;
		}
	}
?>