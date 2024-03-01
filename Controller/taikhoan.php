<?php
	ob_start();
	class taikhoan_controller{
		function checkLogin($email,$pass){
			include ("../../Model/taikhoan.php");
			$p=new taikhoan;
			$p->checkTK($email,$pass);
		}
		function saveRegister($cus){
			include ("../../Model/taikhoan.php");
			$p=new taikhoan;
			$p->saveTK($cus);
		}
		function getTKKH($matk){
			include ("../../Model/taikhoan.php");
			$p=new taikhoan;
			$taikhoan=$p->getTK($matk);
			return $taikhoan;
		}
		function showTK(){
			include ("../../Model/taikhoan.php");
			$p=new taikhoan;
			$dstaikhoan=$p->showDSTK();
			return $dstaikhoan;
		}
		function showKH(){
			include ("../../Model/taikhoan.php");
			$p=new taikhoan;
			$dstaikhoan=$p->showDSTK_KH();
			return $dstaikhoan;
		}
		function showQL(){
			include ("../../Model/taikhoan.php");
			$p=new taikhoan;
			$dstaikhoan=$p->showDSTK_QL();
			return $dstaikhoan;
		}
		function getTKQL($matk){
			include ("../../Model/taikhoan.php");
			$p=new taikhoan;
			$taikhoanql=$p->getTKQL($matk);
			return $taikhoanql;
		}
		function lockTK($matk){
			$p=new taikhoan;
			$p->lockTK($matk);
			header('location:account.php');
		}
		function addNV($nv){
			include ("../../Model/taikhoan.php");
			$p=new taikhoan;
			$p->addNV($nv);
		}
		function changeTK($matk,$nv){
			$p=new taikhoan;
			$p->changeTK($matk,$nv);
		}
		function changePass($matk,$matkhau){
			include ("../../Model/taikhoan.php");
			$p=new taikhoan;
			$p->changePass($matk,$matkhau);
		}
	}
?>