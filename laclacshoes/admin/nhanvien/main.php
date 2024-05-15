<?php 
	include_once('../model/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'them':
					include_once('nhanvien/them.php');
				break;
			case 'sua':
					include_once('nhanvien/sua.php');
				break;
			case 'xoa':
					include_once('nhanvien/xoa.php?view='.$view);
				break;		
			default:
					
				break;
		}
	}
	else{
		include_once('nhanvien/danhsach.php');
	}
	

?>