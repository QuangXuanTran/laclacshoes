
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="bread"><span><a href="?view">Trang Chủ</a></span> / <span>Giỏ hàng</span></p>
            </div>
        </div>
    </div>
</div>
<div class="colorlib-product">
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-10 offset-md-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>Giỏ hàng</h3>
                    </div>
                    <div class="process text-center">
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
        <div class="row row-pb-lg">
            <div class="col-md-12">
                <div class="product-name d-flex">
                    <div class="one-forth text-left px-4">
                        <span>THÔNG TIN CHI TIẾT SẢN PHẨM</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Size</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Màu</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Giá</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Số lượng</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>TỔNG CỘNG</span>
                    </div>
                    <div class="one-eight text-center px-4">
                        <span>Xóa</span>
                    </div>
                </div>
                <?php if(isset($_SESSION['cart_product'])){ $subtotal=0; $dem=0;
                    foreach ($_SESSION['cart_product'] as $item_cart) { $product=mysqli_fetch_array(product($item_cart['MaSP'])); ?>
                <div class="product-cart d-flex">
                    <div class="one-forth">
                        <div class="product-img" style="background-image: url('webroot/image/sanpham/<?php echo $product['AnhNen'];?>')">
                        </div>
                        <div class="display-tc">
                            <h3><?php echo $product['TenSP'] ; ?></h3>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                        <span class="price"><?php echo $item_cart['Size'] ; ?></span>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                        <span class="price"><?php echo $item_cart['Mau'] ; ?></span>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <span class="price"><?php echo $item_cart['DonGia']  ; ?></span>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="<?php echo $item_cart['SoLuong'] ; ?>" min="1" max="100">
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <span class="price"><?php $number = str_replace(',', '', $item_cart['DonGia']); echo number_format($number*$item_cart['SoLuong']); ?></span>
                        </div>
                    </div>
                    <form action="?view=addtocart" method="post" id="delete_cart_product">
                        <input type="hidden" name="productID" value="<?php echo $item_cart['MaSP']  ; ?>">
                        <input type="hidden" name="size" value="<?php echo $item_cart['Size']  ; ?>">
                        <input type="hidden" name="mau" value="<?php echo $item_cart['Mau']  ; ?>">
                    </form>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <button type="submit" name=delete_cart_product form="delete_cart_product" class="closed" value="xoa"></button>
                        </div>
                    </div>
                </div>
                <?php  $subtotal= $subtotal+$number*$item_cart['SoLuong']; $dem = $dem+$item_cart['SoLuong']; }}else{ echo 'Chưa có sản phẩm trong giỏ hàng của bạn ~~~';} ;?>
            </div>
        </div>
        <div class="row row-pb-lg">
            <div class="col-md-12">
                <div class="total-wrap">
                    <div class="row">
                        <div class="col-sm-8">
                            <form action="#">
                                <div class="row form-group">
                                    <div class="col-sm-9">
                                        <input type="text"  id="Coupon" class="form-control input-number" placeholder="Mã giảm giá ...">
                                        <p><span id="coupon2"></span></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="button" id="Apply_Coupon" value="Áp dụng" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4 text-center    ">
                            <div class="total">
                                <div class="sub">
                                    <p><span>Tạm tính:</span> <span id="subtotal"><?php  if(isset($_SESSION['cart_product'])){ echo number_format($subtotal);}else echo '0'; ?> </span></p>
                                    <p><span>Giảm giá:</span> <span id="coupon_apply"> 0</span></p>
                                </div>
                                <div class="grand-total">
                                    <p><span><strong>Tổng cộng:</strong></span> <span id="total"><?php if(isset($_SESSION['cart_product'])){ echo number_format($subtotal);}else echo '0'; ?> </span></p>
                                </div>
                                
                            </div>
                            <div class="col-sm-12"><form action="?view=thanhtoan2" method="post">
                                <input type="hidden" name="sl"  value="<?php echo $dem; ?>">
                                <input type="hidden" name="tamtinh"  value="<?php  if(isset($_SESSION['cart_product'])){ echo number_format($subtotal);}else echo '0'; ?>">
                                <input type="hidden" name="tiensale" id="tiensale" value="0">
                                <input type="hidden" name="tongtien" id="tongtien" value="<?php echo $subtotal; ?>">
                                <button type="submit" class=" btn btn-outline-success" name="thanhtoan" value="2" data-mdb-ripple-color="dark">Thanh toán</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
                <h2>Sản phẩm tương tự</h2>
            </div>
        </div>
        <div class="row"> <?php $prodcts=product_rand(); while ($row=(mysqli_fetch_array($prodcts))) { $price_sale=price_sale($row['MaSP'],$row['DonGia']);?> 
            <div class="col-md-3 col-lg-3 mb-4 text-center">
                <div class="product-entry border">
                    <a href="?view=product-detail&id=<?php echo $row['MaSP'] ?>" class="prod-img">
                        <img src="webroot/image/sanpham/<?php echo $row['AnhNen']; ?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
                    </a>
                    <div class="desc">
                        <h2><a href="#"><?php echo $row['TenSP']; ?></a></h2>
                        <span class="price"><?php echo number_format($price_sale,0).'₫'; ?></span>
                        <?php if(number_format($row['DonGia']) !== number_format($price_sale)){ ?>
                        <span class="price-old"><?php echo  number_format($row['DonGia'], 0 ).' '.' ₫' ; ?></span> <?php } ?>
                    </div>
                </div>
            </div> <?php }?>      
        </div>
    </div>
</div>
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
