
<?php
include_once('../../model/database.php');
	// Thêm màu
	if(isset($_POST['sua'])){
		$manv=$_POST['manv'];
		$ten=$_POST['tennv'];
		$email=$_POST['email'];
		$sdt=$_POST['sdt'];
		$dc=$_POST['dc'];
		$q=$_POST['q'];
		$mk=$_POST['mk'];
		$sql="UPDATE `nhanvien` SET `TenNV`='$ten',`Email`='$email',`SDT`='$sdt',`DiaChi`='$dc',`MatKhau`='$mk',`Quyen`='$q' WHERE `MaNV`='$manv'";
		$rs=mysqli_query($conn,$sql);
		if(isset($rs)){
			header('location:../index.php?action=nhanvien&thongbao=sua');
		}else{
			header('location:../index.php?action=nhanvien&thongbao=loi');
		}
	}
	//----------------------------------------
	//Cập nhập
	if(isset($_POST['them'])){
		$ten=$_POST['tennv'];
		$email=$_POST['email'];
		$sdt=$_POST['sdt'];
		$dc=$_POST['dc'];
		$q=$_POST['q'];
		$mk=$_POST['mk'];
		$sql="INSERT INTO `nhanvien`( `TenNV`, `Email`, `SDT`, `DiaChi`, `Quyen`,`MatKhau` ) VALUES ('$ten','$email','$sdt','$dc','$q','$mk')";
		$rs=mysqli_query($conn,$sql);
		if(isset($rs)){
			header('location:../index.php?action=nhanvien&thongbao=them');
		}else{
			header('location:../index.php?action=nhanvien&thongbao=loi');
		}
	}

	//----------------------------------------
// xóa 
if(isset($_GET['xoa'])){
		$manv=$_GET['manv'];
		$sql="delete  from nhanvien where MaNV='$manv'";
		$rs=mysqli_query($conn,$sql);
		if(isset($rs)){
			header('location:../index.php?action=nhanvien&thongbao=xoa');
		}else{
			header('location:../index.php?action=nhanvien&thongbao=loi');
		}
	}