<?php
if (isset($_SESSION['laclac_khachang'])==false) {
	header('location:?view=login'); 
}else{
    $kh = $_SESSION['laclac_khachang'];
    
}
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="bread"><span><a href="?view">Trang Chủ</a></span> / <span>THANH TOÁN</span></p>
            </div>
        </div>
    </div>
</div>
<div class="colorlib-product">
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-10 offset-md-1">
                <div class="process-wrap">
                    <div class="process text-center active ">
                        <p><span>01</span></p>
                        <h3>Giỏ hàng</h3>
                    </div>
                    <div class="process text-center active">
                        <p><span>02</span></p>
                        <h3>Thanh toán</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>03</span></p>
                        <h3>Đặt hàng thành công</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
					<div class="col-lg-8">
						<form action="?view=order" method="post" class="colorlib-form" id="form_order">
							<h2>Chi tiết thanh toán</h2>
		              	    <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="fname">Họ và Tên</label>
										<input type="text" id="fname" name="fname" class="form-control"  placeholder=" &nbsp; Họ và Tên" required  value="<?php echo $kh['TenKH']?>">
									</div>
								</div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fname">Địa Chỉ</label>
                                        <input type="text" id="address" name="address" class="form-control" placeholder=" &nbsp; Địa Chỉ" required value="<?php echo $kh['DiaChi']?>">
                                    </div>
                                </div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="email">E-mail </label>
										<input type="text" id="email" name="email" class="form-control" placeholder=" &nbsp; Sô điện thoại" required value="<?php echo $kh['Email']?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="Phone">Số điện thoại</label>
										<input type="text" id="zippostalcode" name="phone" class="form-control" placeholder=" &nbsp; Sô điện thoại" required value="<?php echo $kh['SDT']?>">
									</div>
								</div>
                                <input type="hidden" name="tongtien" value="<?php echo $_POST['tongtien'] ;?>">
		               </div>
		            </form>
					</div>

					<div class="col-lg-4">
						<div class="row">
							<div class="col-md-12">
								<div class="cart-detail">
									<h2>Giỏ hàng</h2>
									<ul>
										<li>
											<span><?php echo $_POST['sl'].'  sản phẩm'; ?> </span> <span><?php echo $_POST['tamtinh'].' đ'; ?> </span>
										</li>
										<li><span>Mã giảm giá</span> <span><?php echo number_format($_POST['tiensale']).' đ'; ?></span></li>
										<li ><span class="orderTotal">Tổng cộng</span> <span class="orderTotal"><?php echo number_format($_POST['tongtien']).' đ'; ?></span></li>
									</ul>
								</div>
						   </div>

						   <div class="w-100"></div>

						   <div class="col-md-12">
								<div class="cart-detail">
									<h2>Phương thức thanh toán</h2>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" checked> Thanh toán  khi nhận hàng</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" disabled> Thanh toán online (coming soom)</label>
											</div>
										</div>
									</div>			
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<p><button class="btn btn-primary" type="submit" name="order" form="form_order">Thanh Toán</button></p>
							</div>
						</div>
					</div>
				</div>
    </div>
</div>