<?php
	include_once('../model/database.php');
	$sql="SELECT * FROM `hoadon` WHERE `TinhTrang` = 'chưa duyệt'";
	$rs=mysqli_query($conn,$sql);
	$dem=mysqli_num_rows($rs);
?>
<div class="container-fluid">
	<div class=" alert alert-primary">
	  <h4 class="page-title">
	    <span class="page-title-icon bg-gradient-primary text-white mr-2">
	      
	    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Đơn Đặt Hàng</h4>
	</div>
	<div class="row">
        <form action="?action=xldathang" method="GET" class="col-md-9 grid-margin stretch-card">
        	<input hidden name="action" value="xldathang">
			<div class="card">
				<div class="card-body ">
					<button type="sub" name="dk" value="chưa duyệt" class="btn btn-primary " style="font-family: Comfortaa;">Chờ xử lý</button>
					<span class="counter counter-lg "><?php echo $dem ?></span>
		         	<button type="sub" name="dk" value="đã duyệt"class="btn btn-primary" style="font-family: Comfortaa;">Đã Duyệt</button>
		         	<button type="sub" name="dk" value="Hủy bỏ" class="btn btn-primary" style="font-family: Comfortaa;">Đơn Hủy</button>
		         	<button type="sub" name="dk" value="hoàn thành" class="btn btn-primary" style="font-family: Comfortaa;">Hoàn Thành</button>
		    	</div>
			</div>
		</form>
	</div>
    <br>
<?php 
	if(isset($_GET['view'])){
		$view=$_GET['view'];
		switch ($view) {
			case 'ctdh':
					include_once('dondathang/chitietdathang.php');
				break;
			
		}
	}
	else{
		include_once('dondathang/dondathang.php');
	}
?>
</div>