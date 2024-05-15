<?php 
	$kh=$_SESSION['admin'];
	  $sql1="select *from nhanvien where MaNV=".$kh['MaNV'];
	  $rs1=mysqli_query($conn,$sql1);
	  $r=mysqli_fetch_array($rs1);
	
?>
<div class="container-fluid">
	<div class=" alert alert-primary">
	  <h4 class="page-title">
	    <span class="page-title-icon bg-gradient-primary text-white mr-2">
	    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Thông Tin Cá Nhân</h4>
	</div><br>
	<div class="card">
		<div class="card-body">
			<div class="row-fluid"> 
			  <div class="col-md-offset-4 col-md-4 m-auto" id="box" > 
			   <h2 class="text-center">THÔNG TIN CÁ NHÂN</h2> 
			   <hr> 
			   <form class="form-horizontal" action="" method="post" id="login_form"> 
			    <fieldset> 
			     <div class="form-group">
			      <label for="exampleInputEmail1">Email </label>
			      <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo $r['Email'] ?>" readonly>
			    </div> 
			     <div class="form-group">
			      <label for="exampleInputEmail1">Họ và tên</label>
			      <input type="text" class="form-control" name="ten" placeholder="Họ và tên" value="<?php echo $r['TenNV'] ?>">
			    </div>
			    <div class="form-group">
			      <label for="exampleInputEmail1">Số điện thoại</label>
			      <input type="text" class="form-control" name="sdt" placeholder="SĐT" value="<?php echo $r['SDT'] ?>">
			    </div>
			    <div class="form-group">
			      <label for="exampleInputEmail1">Địa chỉ</label>
			      <input type="text" class="form-control" name="dc" placeholder="Địa Chỉ" value="<?php echo $r['DiaChi'] ?>">
			    </div>
			    <div class="form-group">
			      <label for="exampleInputEmail1">Mật khẩu</label>
			      <input type="text" class="form-control" name="pass" placeholder="Pass" value="<?php echo $r['MatKhau'] ?>">
			    </div>
			     <div class="form-group "> 
			      <div class="col-md-12 "> 
			        <center>
			          <input hidden name="manv" value="<?php echo $r['MaNV'] ?>">
			       <button type="submit" name="luu" class="btn btn-md btn-dark pull-right"> Lưu </button> </center>
			      </div> 
			     </div> 
			    </fieldset> 
			   </form> 
			  </div> 
			 </div>
		</div>

	</div>
</div>
<?php
   // check đăng nhập
  if(isset($_POST['luu'])){
    $manv=$_POST['manv'];   
    $ten=$_POST['ten'];
    $sdt=$_POST['sdt'];
    $matkhau=$_POST['pass'];
    $dc=$_POST['dc'];
    $sql="UPDATE `nhanvien` SET `TenNV`='$ten',`SDT`=$sdt,`DiaChi`='$dc',`MatKhau`='$matkhau' WHERE `MaNV`=$manv";
    $rs=mysqli_query($conn,$sql);
    if($rs){
      header('location:index.php?action=thongtincanhan&ok');
      
    }else{
      
      echo '<script>alert(" Lỗi!!! ")</script>';
      
    }

}
if(isset($_GET['ok'])){
         echo '<script>alert(" Đã Lưu ")</script>';       
  }
?>