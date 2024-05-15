<?php 
ob_start();
session_start(); 
if(!isset($_SESSION['admin'])){
  header('location:login.php'); 
}
else{
	include_once('../model/database.php');
	include 'include/menu.php';
	include 'include/header.php';
	include 'controller.php';
	/*echo '<div class="container-fluid">
		aaaaaaa
	</div>';*/
	include 'include/footer.php';
}
 ?>
