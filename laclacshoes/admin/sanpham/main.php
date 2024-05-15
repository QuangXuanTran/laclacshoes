<?php 
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'themsp':
					 include_once('them.php');	
				break;
			case 'suasp':
					include_once('sua.php');
				break;
		
			case 'xoasp':
					$masp=$_GET['masp'];
					header('location:xuly.php?xoa=1&masp='.$masp);
				break;
			default:
				include_once'sanpham/sanpham.php';		
				break;
		}
	}

?>