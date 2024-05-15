<?php 
	if (isset($_GET['masp'])) {
		$masp=$_GET['masp'];
		$t=$_GET['t'];
		$a=$_GET['h'];
		$sql="SELECT DISTINCT MaMau from chitietsanpham where MaSP=".$masp;
		$rs=mysqli_query($conn,$sql);
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$sql2="SELECT MaPN from phieunhap ORDER BY MaPN DESC LIMIT 1";
		$rs1=mysqli_query($conn,$sql2);
		$row1=mysqli_fetch_array($rs1)
?>
<div class="container-fluid">
	<div class=" alert alert-primary">
	  <h4 class="page-title">
	    <span class="page-title-icon bg-gradient-primary text-white mr-2">
	    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Kho Hàng &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Xuất / Nhập Kho&#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; <?php echo $t ?></h4>
	</div><br>
	<div class="card card-body">
		<div class="row">
			<div class="col-md-5">
				<img class="w-100" src="../webroot/img/sanpham/<?php echo $a;?>" alt=""><label>
			</div>
			<div class="col-md-4">
				<h5><?php echo $t ?></h5>
			<?php while ($row=mysqli_fetch_array($rs)) {?>
					<div class="col-12">
				 		<a class="nav-link" href="?action=kho&view=apply&masp=<?php echo $masp ?>&t=<?php echo $t ?>&h=<?php echo $a ?>&mau=<?php echo $row['MaMau'] ?>" > <?php echo 'Màu  '.$row['MaMau']?></a>
					</div>

		 <?php	} ?>
			</div>
		</div><hr>
	</div>
		
		
		

</div>



<?php


}
?>


