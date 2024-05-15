<?php 
	include_once('../model/database.php');
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'danhthu':
					include_once('danhthu/danhthu.php');
				break;
			case 'ctdt':
					include_once('danhthu/chitiet.php');
				break;	
			default:			
				break;
		}
	}
	else{
		include_once('danhthu/danhthu.php');
	}
	

?>