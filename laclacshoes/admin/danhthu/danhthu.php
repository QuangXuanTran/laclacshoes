<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$date=getdate();
	$ngay=$date['year'];
	$thang = array($ngay-2,$ngay-1,$ngay);
	if(isset($_GET['nam'])){
		$nam3=$_GET['nam'];
	}else{$nam3=$date['year'];}
?>
<div class="container-fluid">
	<div class=" alert alert-primary">
	  <h4 class="page-title">
	    <span class="page-title-icon bg-gradient-primary text-white mr-2">
	    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Doanh Thu</h4>
	</div><br>
	<div  class="row">
		<form class="col-xl-3 col-md-6 mb-4" action="danhthu/xuly.php" method="POST" accept-charset="utf-8">
			<div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body row">
                	<select name="nam" class="browser-default custom-select " style="width: 100px; margin-top: 10px;"><?php
						foreach( $thang as $value ) 
					    { ?>
					       <option  <?php if($value==$nam3){echo 'selected';} ?>  value="<?php echo $value ?>"><?php echo $value ?></option>
			  		 <?php } ?>
					</select>
					<button class="btn btn-indigo " style="height: 38px;margin-top: 10px;" type="sub" name="xem">Xem</button>
                </div>
            </div>
		</form><div class="col-1"></div>
		<form class="col-xl-8 col-md-6 mb-4" action="?action=danhthu" method="POST" accept-charset="utf-8">
			<div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body row">
                	<input class="btn btn-light" type="date" name="tu" required><input class="btn btn-light" type="date" name="den" required>
					<button class="btn btn-indigo"  type="sub" name="xem2">Xem</button>
                </div>
            </div>
		</form>
	</div><br>
<?php 
	if(isset($_GET['nam'])){
		$nam2=$_GET['nam'];
		echo'<hr><center><h4> Doanh Thu Năm : '.$nam2.' </h4></center><hr>';
		for($month=1;$month<=12; $month++){
			switch($month)
			{		
			case 1: case 3: case 5: case 7: case 8: case 10: case 12:
						{
							$day = 31;
							break;
						}	
			case 4: case 6: case 9: case 11:
						{
							$day = 30;
							break;
						}
			case 2:{
				$day=28;
				break;
				}	
			}
			$day1= $nam2.'-'.$month.'-'.'1'.' 00:00:00';
			$day2= $nam2.'-'.$month.'-'.$day.' 23:59:59';
			$sql="SELECT * FROM hoadon WHERE TinhTrang='hoàn thành' and (NgayGiao BETWEEN '{$day1}' AND '{$day2}')";
			$rs=mysqli_query($conn,$sql);
			$tt=0;
			while ( $row=mysqli_fetch_array($rs)) {
				$tt=$tt+$row['TongTien'];
			}
			
?>			
			<div class="card">
				<div class="card-body">
					<h4 class="text-info"> Tháng : <?php echo $month ?></h4>
					<table class="m-auto " >
						<thead>
							<tr>
								<th>Tổng Tiền : </th> <th class="text-danger font-weight-bold"> <?php echo '&#160;'.number_format($tt).' đ <br>' ?></th>
							</tr>
							<tr >
								<th class="text-center" colspan="2"></th>
							</tr>
						</thead>

					</table>
					<h6 class="text-right"><a href="index.php?action=danhthu&view=ctdt&thang=<?php echo $month; ?>&nam=<?php echo $nam2 ?>" >Xem chi tiết</a></h6>
				</div>
			</div>
			<br>

<?php		} 
	}if(isset($_POST['xem2'])){
		$tu=$_POST['tu'];
		$den=$_POST['den'];
		$tt=0;
		$sql="SELECT * FROM hoadon WHERE TinhTrang='hoàn thành' and (NgayGiao BETWEEN '$tu' AND '$den')";
		$rs=mysqli_query($conn,$sql);
		while ( $row=mysqli_fetch_array($rs)) {
				$tt=$tt+$row['TongTien']; ?>	
	<?php	} ?><br>
	<div class="card">
				<div class="card-body">

					<h4 class="text-info">Doanh thu : <?php echo $tu .' Đến '.$den ?></h4>
					<table class="m-auto " >
						<thead>
							<tr>
								<th>Tổng Tiền : </th> <th class="text-danger font-weight-bold"> <?php echo '&#160;'.number_format($tt).' đ <br>' ?></th>
							</tr>
							<tr >
								<th class="text-center" colspan="2"></th>
							</tr>
						</thead>

					</table>
					<h6 class="text-right"><a href="index.php?action=danhthu&view=ctdt&tu=<?php echo $tu; ?>&den=<?php echo $den ?>" >Xem chi tiết</a></h6>
				</div>
			</div>

<?php	}else{
	$nam2=$date['year'];
		echo'<hr><center><h4> Doanh Thu Năm : '.$nam2.' </h4></center><hr>';
		for($month=1;$month<=12; $month++){
			switch($month)
			{		
			case 1: case 3: case 5: case 7: case 8: case 10: case 12:
						{
							$day = 31;
							break;
						}	
			case 4: case 6: case 9: case 11:
						{
							$day = 30;
							break;
						}
			case 2:{
				$day=28;
				break;
				}	
			}
			$day1= $nam2.'-'.$month.'-'.'1'.' 00:00:00';
			$day2= $nam2.'-'.$month.'-'.$day.' 23:59:59';
			$sql="SELECT * FROM hoadon WHERE TinhTrang='hoàn thành' and (NgayGiao BETWEEN '{$day1}' AND '{$day2}')";
			$rs=mysqli_query($conn,$sql);
			$tt=0;
			while ( $row=mysqli_fetch_array($rs)) {
				$tt=$tt+$row['TongTien'];
			}
			
?>			
			<div class="card">
				<div class="card-body">
					<h4 class="text-info"> Tháng : <?php echo $month ?></h4>
					<table class="m-auto " >
						<thead>
							<tr>
								<th>Tổng Tiền : </th> <th class="text-danger font-weight-bold"> <?php echo '&#160;'.number_format($tt).' đ <br>' ?></th>
							</tr>
							<tr >
								<th class="text-center" colspan="2"></th>
							</tr>
						</thead>

					</table>
					<h6 class="text-right"><a href="index.php?action=danhthu&view=ctdt&thang=<?php echo $month; ?>&nam=<?php echo $nam2 ?>" >Xem chi tiết</a></h6>
				</div>
			</div>
			<br><?php
}
}

?>
</div>