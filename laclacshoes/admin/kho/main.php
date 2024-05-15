<?php 
	include_once('../model/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'themsl':
					include_once('kho/chonmau.php');
				break;
			case 'apply':
					include_once('kho/phieunhap.php');
				break;
			case 'nhapkho':
					include_once('kho/sanphamnhap.php');
				break;
			case 'xemdh':
					include_once('kho/dondathang.php');
				break;
			case 'chitietdh':
					include_once('kho/chitietdh.php');
				break;
			case 'nhatky':
					include_once('kho/nhatky.php');
				break;
			case 'nhatkyx':
					include_once('kho/nhapkyxuat.php');
				break;					
			default:			
				break;
		}
	}
	else{
		include_once('kho/quanlysanpham.php');
	}
	
	if(isset($_GET['tb'])){
		$tb=$_GET['tb'];
		switch ($tb) {
			case 'ok':
				echo '<script>alert("success !!!")</script>';
				break;
			case 'loi':
				echo '<script>alert("Lỗi !!!")</script>';
				break;
			default:
				# code...
				break;
		}
	}
?>