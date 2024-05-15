<?php
if (isset($_GET['thang'])) {

	$thang=$_GET['thang'];
	$nam=$_GET['nam'];
	if($thang >=1 and $thang <= 9){
		$thang = '0'.$thang;
	}
	$sql="SELECT * FROM `hoadon` WHERE NgayGiao like '$nam-$thang-%%' and TinhTrang='hoàn thành'";
	$rs=mysqli_query($conn,$sql);

?>
<div class="container-fluid">
	<div class=" alert alert-primary">
	  	<h4 class="page-title">
		    <span class="page-title-icon bg-gradient-primary text-white mr-2">  
		    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Doanh Thu&#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Tháng <?php echo $thang.' / '. $nam ?>
		</h4>
	</div><br>	
	<div class="card card-body row">
		<table class="table table-hover m-auto text-center" style="font-size: 13px;">
			<thead class="badge-info">
				<tr>
					<th>Mã Hóa Đơn</th> <th>Mã Khách Hàng</th><th>Mã Nhân Viên</th><th>Ngày Đặt</th><th>Tổng Tiền</th><th>Tình trạng</th><th>Chi Tiết</th>
				</tr>
			</thead>
		<tbody>
			 <?php $so=0;
				 while ($row=mysqli_fetch_array($rs)) { ?>
					<tr>
						<td><?php echo $row['MaHD']; ?></td><td><?php echo $row['MaKH']; ?></td><td><?php echo $row['MaNV']; ?></td><td><?php echo $row['NgayDat']; ?></td><td><?php echo number_format($row['TongTien']).' đ'; ?></td><td><?php echo $row['TinhTrang']; ?></td>
						<td><a href="index.php?action=xldathang&view=ctdh&mahd=<?php echo $row['MaHD']; ?>" >Detail </a></td>
					</tr>

			 <?php	$so=$so+$row['TongTien'];} ?>
			<tr  class="text-right text-danger" style="font-size: 150%">
				<td colspan="7"> Tổng : <?php echo number_format($so).' đ'; ?></td>
			</tr>
		</tbody>
		</table>
	</div>
</div><?php  }
if(isset($_GET['tu']) && isset($_GET['den'])){
	$tu=$_GET['tu'];
	$den=$_GET['den'];
	$sql="SELECT * FROM `hoadon` WHERE (NgayGiao BETWEEN '$tu' AND '$den')";
	$rs=mysqli_query($conn,$sql);

?><div class="container-fluid">
	<div class=" alert alert-primary">
	  	<h4 class="page-title">
		    <span class="page-title-icon bg-gradient-primary text-white mr-2">  
		    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Doanh Thu&#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160;  <?php echo $tu.' Đến '. $den ?>
		</h4>
	</div><br>
<table class="table table-hover m-auto text-center" style="font-size: 13px;">
	<thead class="badge-info">
		<tr>
			<th>Mã Hóa Đơn</th> <th>Mã Khách Hàng</th><th>Mã Nhân Viên</th><th>Ngày Đặt</th><th>Tổng Tiền</th><th>Tình trạng</th><th>Chi Tiết</th>
		</tr>
	</thead>
	<tbody>
 <?php $so=0;
	 while ($row=mysqli_fetch_array($rs)) { ?>
		<tr>
			<td><?php echo $row['MaHD']; ?></td><td><?php echo $row['MaKH']; ?></td><td><?php echo $row['MaNV']; ?></td><td><?php echo $row['NgayDat']; ?></td><td><?php echo number_format($row['TongTien']).' đ'; ?></td><td><?php echo $row['TinhTrang']; ?></td>
			<td><a href="index.php?action=xldathang&view=ctdh&mahd=<?php echo $row['MaHD']; ?>" >Detail </a></td>
		</tr>

 <?php	$so=$so+$row['TongTien'];} ?>
		<tr  class="text-right text-danger" style="font-size: 150%">
			<td colspan="7"> Tổng : <?php echo number_format($so).' đ'; ?></td>
		</tr>
	</tbody>

</table>
</div>
<?php } ?>

