<?php 
    $masp=$_GET['masp'];
    $sql_sua="SELECT * FROM `sanpham` WHERE MaSP=$masp";
    $rs_sua=mysqli_query($conn,$sql_sua);
    while ($kq_sua=mysqli_fetch_array($rs_sua)) {?>
<hr class="badge-danger">
<form class="form-row " method="POST" action="sanpham/xuly.php" enctype="multipart/form-data">
    <input hidden name="masp" value="<?php echo $masp?>">
    <div class="form-group col-sm-2">
        <label for="masv">Tên Sản Phẩm</label>
        <input type="text" class="form-control" name="tensp" value="<?php echo $kq_sua['TenSP'];?>">
    </div>
    <div class="form-group col-sm-3">
        <label >Mã Danh Mục</label>
        <select name="madm" class="form-control browser-default custom-select" >
            <?php $sql1="select * from danhmuc"; $rs1=mysqli_query($conn,$sql1); while ($row=mysqli_fetch_array($rs1)) { ?>   	
   			    <option <?php if($row['MaDM']===$kq_sua['MaDM']) { echo "selected";} ?> value="<?php echo $row['MaDM'] ?>" ><?php echo $row['MaDM'].' - '.$row['TenDM']; ?></option><?php } ?>
   		   </select>
    </div>
	  <div class="form-group col-sm-2">
        <label >Mã Thương Hiệu</label>
        <select name="mancc" class="form-control browser-default custom-select">
              <?php $sql2="select * from nhacc"; $rs2=mysqli_query($conn,$sql2); while ($row2=mysqli_fetch_array($rs2)) { ?> 
   			        <option <?php if($row2['MaNCC']===$kq_sua['MaNCC']) { echo "selected";} ?>  value="<?php echo $row2['MaNCC']; ?>"><?php echo $row2['MaNCC'].' - '.$row2['TenNCC']; ?></option><?php } ?>
   		   </select>
    </div>
	  <div class="form-group col-sm-2"><label >Đơn Giá</label><input type="text" class="form-control" name="dongia" value="<?php echo $kq_sua['DonGia'];?>"></div>
	<div class="form-group col-sm-4"><label >Ảnh Nền</label> <input type="file" class="form-control" name="anhnen" > </div>
  <div class="form-group col-4"><label >Ảnh sản phẩm</label> <input type="file" class="form-control" name="anhsp[]" multiple></div>
	<div class="form-group col-sm-8"><label >Mô Tả</label><textarea class="form-control" name="mota" style="min-height: 100px;"><?php echo $kq_sua['MoTa'];?></textarea> </div>
 <div class="form-group col-sm-12  border " >
    <label >Size :</label><br>
      <div class="btn-group col-12 row">
   <?php $sql_size="select * from size";
     $rs_size=mysqli_query($conn,$sql_size);
      while ($kq_size=mysqli_fetch_array($rs_size)) { 
            $sql_size2="select DISTINCT MaSize from chitietsanpham where MaSP=".$masp." and MaSize=".$kq_size['MaSize'];
            $rs_size2=mysqli_query($conn,$sql_size2);
           ?>
              <div class=" custom-checkbox custom-control col-1 ">
                 <input type="checkbox" class="custom-control-input" id="<?php echo $kq_size['MaSize']; ?>" name="size[]" value="<?php echo $kq_size['MaSize'];?>"
                  <?php  while ($kq_size2=mysqli_fetch_array($rs_size2)) {if($kq_size['MaSize']===$kq_size2['MaSize']){ echo "checked";  }}?> >

                  <label class="custom-control-label" for="<?php echo $kq_size['MaSize']; ?>"><h5><?php echo $kq_size['MaSize']; ?></h5></label>
              </div>
        <?php 
        }?>
    </div>
  </div>
  <div class="form-group col-sm-12  border " >
    <label >Màu :</label><br>
      <div class="btn-group col-12 row">
        <?php $sql_mau="select * from mau"; $rs_mau=mysqli_query($conn,$sql_mau);
         while ($kq_mau=mysqli_fetch_array($rs_mau)){$mm=$kq_mau['MaMau'];$sql_mau2="select DISTINCT MaMau from chitietsanpham where MaSP=$masp and MaMau='$mm'";
            $rs_mau2=mysqli_query($conn,$sql_mau2);?>
          <div class=" custom-checkbox custom-control col-2 ">
            <input type="checkbox" class="custom-control-input" id="<?php echo $kq_mau['MaMau']; ?>" name="mau[]" value="<?php echo $kq_mau['MaMau']; ?>" <?php  while ($kq_mau2=mysqli_fetch_array($rs_mau2)) {if($kq_mau['MaMau']===$kq_mau2['MaMau']){ echo "checked";  }}?>>
              <label class="custom-control-label" for="<?php echo $kq_mau['MaMau']; ?>"><h5><?php echo $kq_mau['MaMau']; ?></h5></label>
          </div>
        <?php } }?>
    </div>
  </div>
<hr>
<div class="form-group col-sm-6 m-auto">
	<input type="submit" class="form-control badge-info" value="Cập Nhập" name="xlsua">
</div>
</form>
<hr><hr class="badge-danger">

