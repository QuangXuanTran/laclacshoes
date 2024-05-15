<?php 
    $id=$_GET['makm'];
    $sql_sua="SELECT * FROM `khuyenmai` WHERE MaKM=$id";
    $rs_sua=mysqli_query($conn,$sql_sua);
    $kq=mysqli_fetch_array($rs_sua)
?>
<div class="container-fluid">
    <div class=" alert alert-primary">
      <h4 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
        </span> ADMIN - ONI SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Sản Phẩm</h4>
    </div>
    <div class="card card-body ">
        <div class="row">
            <form class="form-row " method="GET" action="khuyenmai/xuly.php" enctype="multipart/form-data">
    <div class="form-group col-sm-4">
        <label class="m-auto" for="th">Tên khuyến mãi</label>
        <input type="text" class="form-control" name="tkm" value="<?php echo $kq['TenKM'] ?>" required>
        <input hidden class="form-control" name="makm" value="<?php echo $kq['MaKM'] ?>" >
    </div>
    <div class="form-group col-sm-4">
        <label class="m-auto" for="th">Ngày bắt đầu</label>
        <input type="date" class="form-control" name="nbd" value="<?php echo $kq['NgayBD'] ?>" required>
    </div>
    <div class="form-group col-sm-4">
        <label class="m-auto" for="th">Ngày kết thúc</label>
        <input type="date" class="form-control" name="nkt" value="<?php echo $kq['NgayKT'] ?>" required>
    </div>
    <div class="form-group col-sm-4">
        <label class="m-auto" for="th">Tiền Giảm Giá</label>
        <input type="text" class="form-control" name="t" value="<?php echo $kq['TienKM'] ?>" >
    </div>
    <div class="form-group col-sm-4">
        <label class="m-auto" for="th">% Giảm Giá</label>
        <input type="text" class="form-control" name="pt" value="<?php echo $kq['KM_PT'] ?>" >
    </div>
    <div class="form-group col-sm-4">
        <label class="m-auto" for="th">Mô Tả</label>
        <textarea class="form-control" name="mt"  required><?php echo $kq['MoTa'] ?></textarea>
    </div>

    <div class="form-group col-sm-4 "></div>
    <div class="form-group col-sm-3 "><label for="masv">&emsp;</label><input type="submit" class="form-control badge-info" name="sua" value="Cập Nhập"></div>
    <hr>    
 </form>
        </div>
        
    </div>
