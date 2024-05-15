<?php 
    $mamau=$_GET['mamau'];
    $sql_sua="SELECT * FROM `mau` WHERE MaMau='$mamau'";
    $rs_sua=mysqli_query($conn,$sql_sua);
    $kq_sua=mysqli_fetch_array($rs_sua)?>
  <form class="form-row " method="GET" action="mau/xuly.php" enctype="multipart/form-data">
	 <div class="form-group col-sm-4"></div><input hidden name="id" value="<?php echo $kq_sua['MaMau'];?>">
    <div class="form-group col-sm-3"><label class="m-auto" for="mamau">Tên Màu</label>
    	<input type="text" class="form-control" name="mamau" autofocus value="<?php echo $kq_sua['MaMau'];?>"></div>
    <div class="form-group col-sm-5"></div> <div class="form-group col-sm-4"></div>
    <div class="form-group col-sm-3"><label for="masv">&emsp;</label><input type="submit" class="form-control badge-info" name="suamau" value="Cập Nhập"></div>
    <hr>	
 </form><hr class=" badge-danger">
