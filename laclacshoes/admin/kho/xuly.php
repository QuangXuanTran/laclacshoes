<?php 
	include_once('../../model/database.php');
	ob_start();
session_start(); 
	if (isset($_GET['action'])) {
		$action=$_GET['action'];
		$so=$_GET['so'];
		$dg=$_GET['dg'];
		if (isset($_GET['chon'])){$chon=$_GET['chon'];}else{$chon[]=0;}
		if (isset($_GET['note'])){$note=$_GET['note'];}else{$note='';}
		$masp=$_GET['masp'];
		$mau=$_GET['mau'];
		$tt=$so*$dg;
		$nv=$_SESSION['admin'];
		$manv=$nv['MaNV'];
		switch ($action) {
			case 'cong':
				foreach ($chon as $key => $value) {
					$sql="UPDATE chitietsanpham SET SoLuong=(SoLuong+".$so.") where MaSP=".$masp." and MaMau='".$mau."' and MaSize=".$value;
					$rs=mysqli_query($conn,$sql);
					$sql2="INSERT INTO `phieunhap`( `MaNV`, `MaSP`, `SoLuong`, `DonGia`, `TongTien`, `Note`, `Size`, `Mau`) VALUES ($manv,$masp,$so,'$dg','$tt','$note','$value','$mau')";
					$rs2=mysqli_query($conn,$sql2);
				}
				if (isset($rs)) {
					header('location:'.$_SERVER["HTTP_REFERER"].'&tb=ok');
				}else{ header('location:'.$_SERVER["HTTP_REFERER"].'&tb=loi'); }
				break;
			case 'tru':
				foreach ($chon as $key => $value) {
					$sql="UPDATE chitietsanpham SET SoLuong=(SoLuong-".$so.") where MaSP=".$masp." and MaMau='".$mau."' and MaSize=".$value;
					$rs=mysqli_query($conn,$sql);
					$sql2="INSERT INTO `phieuxuat`(`MaNV`, `MauSP`, `Mau`, `Size`, `SoLuong`, `DonGia`, `TongTien`, `Note`) VALUES ($manv,$masp,'$mau','$value',$so,'$dg','$tt','$note')";
					$rs2=mysqli_query($conn,$sql2);
				}
				if (isset($rs)) {
					header('location:'.$_SERVER["HTTP_REFERER"].'&tb=ok');
				}else{ header('location:'.$_SERVER["HTTP_REFERER"].'&tb=loi'); }
				break;
		}
		
	}
 ?>