<?php
if (!isset($_SESSION['laclac_khachang'])) {
    header('location:?view=login');
}else{
    $kh= $_SESSION['laclac_khachang'];
}
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="bread"><span><a href="?view">Trang Chủ</a></span> / <span>Thông tin khách hàng</span></p>
            </div>
        </div>
    </div>
</div>
<div class="container ">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Thông Tin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Đơn Hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link bg-info" href="?view=logout" >Đăng xuất</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">          
                            <form class="form-horizontal" action="" method="post" id="login_form"> 
                                <fieldset> 
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Email </label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo $kh['Email'] ?>" readonly>
                                    </div> 
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên</label>
                                    <input type="text" class="form-control" name="ten" placeholder="Họ và tên" value="<?php echo $kh['TenKH'] ?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" class="form-control" name="sdt" placeholder="SĐT" value="<?php echo $kh['SDT'] ?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" class="form-control" name="dc" placeholder="Địa Chỉ" value="<?php echo $kh['DiaChi'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="password-input">
                                            <label for="exampleInputEmail1">Mật khẩu</label>
                                            <input type="password" id="password" name="password"  class="form-control" value="<?php echo $kh['MatKhau'] ?>">
                                            <div class="toggle-password" onclick="togglePasswordVisibility()">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M12 3.75c-4.1 0-7.57 3.24-9 7.5 1.43 4.26 4.9 7.5 9 7.5s7.57-3.24 9-7.5c-1.43-4.26-4.9-7.5-9-7.5zm0 12c-2.48 0-4.5-2.02-4.5-4.5s2.02-4.5 4.5-4.5 4.5 2.02 4.5 4.5-2.02 4.5-4.5 4.5zm0-7.5c-1.38 0-2.5 1.12-2.5 2.5s1.12 2.5 2.5 2.5 2.5-1.12 2.5-2.5-1.12-2.5-2.5-2.5zm0 3c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group "> 
                                        <div class="col-md-12 "> 
                                            <center>
                                                <input hidden name="makh" value="<?php echo $kh['MaKH'] ?>">
                                                <button type="submit" name="luu" class="btn btn-md btn-dark pull-right" form="login_form"> Lưu </button>
                                            </center>
                                        </div> 
                                    </div> 
                                </fieldset> 
                            </form> 
                            </div>       
                            <div class="tab-pane " id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab"> 
                                <table class="table align-middle mb-0 bg-white">
                                    <thead class="bg-light">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th class="fw-bold">Name</th>
                                        <th class="fw-bold">Size / Màu</th>
                                        <th class="fw-bold">Giá</th>
                                        <th class="fw-bold">Tổng cộng</th>
                                        <th class="fw-bold">Tình trạng</th>
                                        <th class="fw-bold">ngày đặt</th>
                                        <th class="fw-bold">ngày giao</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php  $bill=bill_user($kh['MaKH']);
                                        if ($bill==false) { echo '<p>bạn chưa có đơn hàng</p>'; }else{  $stt=1; while ($row=mysqli_fetch_array($bill)) { ?>
                                        <tr>
                                            <th scope="row"  class=" align-middle"><?php  echo $stt++; ?></th>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-2">
                                                        <?php   $bill_detail=bill_detail($row['MaHD']);
                                                        while ($row1=mysqli_fetch_array($bill_detail)) { 
                                                            $product=mysqli_fetch_array(product($row1['MaSP']));  ?>
                                                                <p class=" mb-1"><?php echo $row1['SoLuong'].' x '.$product['TenSP']; ?></p> 
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                            <?php   $bill_detail=bill_detail($row['MaHD']);
                                                        while ($row1=mysqli_fetch_array($bill_detail)) { 
                                                            $product=mysqli_fetch_array(product($row1['MaSP']));  ?>
                                                                <p class=" mb-1"><?php echo $row1['Size'].' x ' .$row1['MaMau']; ?></p> 
                                                        <?php } ?>
                                            </td>
                                            <td>
                                            <?php   $bill_detail=bill_detail($row['MaHD']);
                                                        while ($row1=mysqli_fetch_array($bill_detail)) { 
                                                            $product=mysqli_fetch_array(product($row1['MaSP']));  ?>
                                                                <p class=" mb-1"><?php echo number_format($row1['ThanhTien']); ?></p> 
                                                        <?php } ?>
                                            </td>
                                            <td class=" align-middle"> <?php echo number_format($row['TongTien']);?> </td>
                                            <td class=" align-middle">
                                                <span class="badge badge-success rounded-pill d-inline"><?php echo $row['TinhTrang']; ?></span>
                                            </td>
                                            <td class=" align-middle"><?php echo $row['NgayDat'] ;?></td>
                                            <td class=" align-middle"> <?php echo $row['NgayGiao'] ;?></td> 
                                        </tr>   
                                        <?php    } 
                                        }
                                    ?>                          
                                    </tbody>
                                    </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
if(isset($_POST['luu'])){
    $id=$_POST['makh']; 
    $ten=$_POST['ten'];
    $sdt=$_POST['sdt'];
    $matkhau=$_POST['password'];
    $dc=$_POST['dc'];
    $rs=update_user($id,$ten,$sdt,$dc,$matkhau);
    if($rs){
        $_SESSION['laclac_khachang'] = selectKH($id);
        header('location:?view=user&alert=đã lưu');
      
    }else{
      
      echo '<script>alert(" Lỗi!!! ")</script>';
      
    } 
  }
?>
<?php 
    if(isset($_GET['alert'])){ ?> 
    <div id="alertDiv" class="alert alert-success alert-dismissible fade custom-alert " role="alert">
        <strong> <?php if($_GET['alert']!==''){ echo ' '.$_GET['alert'];} ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
<?php  }

?>
