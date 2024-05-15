<?php 
	if(isset($_GET['mau'])){
		$mau=$_GET['mau'];
		$t=$_GET['t'];
		$masp=$_GET['masp'];
		$sql="SELECT *FROM chitietsanpham where MaSP=".$masp." and MaMau='".$mau."'";
		$rs=mysqli_query($conn,$sql);$tsl=0;
		?>
	<div class="container-fluid">
		<form action="kho/xuly.php" method="get" accept-charset="utf-8">
		<div class=" alert alert-primary">
		  <h4 class="page-title">
		    <span class="page-title-icon bg-gradient-primary text-white mr-2">
		    </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Kho Hàng &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160;Xuất / Nhập Kho &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; <?php echo $t ?> &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; <?php echo $mau ?></h4>
		</div><br>
		<div class="row">
			<div class="col-md-5">
				<table class="table table-active table-hover text-center">
					<thead class="badge-info">
						<tr>
							<th>Size</th><th>Số Lượng</th><th>Chọn</th>
						</tr>
					</thead>
					<tbody >
					<?php while ($row=mysqli_fetch_array($rs)) { $tsl+=$row['SoLuong'];?>
							<tr>
								<td><?php echo $row['MaSize'] ?></td>
								<td><?php echo $row['SoLuong'] ?></td>
								<td class="form-check"><input class="form-check-input" value="<?php echo $row['MaSize'] ?>" type="checkbox" name="chon[]" id="<?php echo $row['MaSize'] ?>">
								<label class="form-check-label" for="<?php echo $row['MaSize'] ?>">&#160;</label></td>				
							</tr>
					<?php } ?>
							<tr>
								<td>Tổng  :</td>
								<td><?php echo $tsl ?></td>
							</tr>
							<tr>
								<td colspan="3">
									<input class="btn btn-success" type="button" id="btn2"  value="Hủy ALL">
									<input class="btn btn-success" type="button" id="btn1" value="Chọn ALL">
								</td>
							</tr>	
					</tbody>
				</table>				
			</div>
			<div class="col-md-7">
				<div class=" col-12 row">
					<input onkeypress=" return isNumberKey(event)" class="form-control col-4 m-auto" type="text" name="so" placeholder="nhập số lượng" required autofocus>
					<input onkeypress=" return isNumberKey(event)" class="form-control col-4 m-auto" type="text" name="dg" placeholder="nhập đơn giá" required>
				</div><br>
				<div class=" col-5 row m-auto">
					  <textarea class=" form-control "  name="note" rows="2" placeholder="Ghi chú"></textarea>
				</div>
				<br>
				<div class=" col-12 row">
					<input hidden name="masp" value="<?php echo $masp ?>">
					<input hidden name="mau" value="<?php echo $mau ?>">
					<button class=" m-auto col-4 btn btn-outline-primary" name="action" value="cong" type="submit">Nhập Hàng</button>
					<button class=" m-auto col-4 btn btn-outline-primary" name="action" value="tru" type="submit">Xuất Hàng</button>
					<!-- <button class="m-auto btn btn-outline-primary w-25" name="action" value="tru" type="submit">-</button>
					<button class="m-auto btn btn-outline-primary w-25" name="action" value="edit" type="submit">Thay Đổi</button> -->
				</div>
				
			</div>
		</div>
		</form>
	</div>


<?php	
	}	
?>

<script language="javascript">
    // Chức năng chọn hết
    document.getElementById("btn1").onclick = function (){
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('chon[]');
        // Lặp và thiết lập checked
        for (var i = 0; i < checkboxes.length; i++){
            checkboxes[i].checked = true;
        }
    };
    // Chức năng bỏ chọn hết
    document.getElementById("btn2").onclick = function (){
        // Lấy danh sách checkbox
        var checkboxes = document.getElementsByName('chon[]');
        // Lặp và thiết lập Uncheck
        for (var i = 0; i < checkboxes.length; i++){
            checkboxes[i].checked = false;
        }
    };
    function isNumberKey(evt)
    {
       var charCode = (evt.which) ? evt.which : event.keyCode;
       if(charCode == 59 || charCode == 46)
        return true;
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
       return true;
    }

</script>
