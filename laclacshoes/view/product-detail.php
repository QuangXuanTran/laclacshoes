<?php
    if (isset($_GET['id'])==false) {header('Location:?view'); }
    $id = $_GET['id'];
    if ( product($id)==false) { header('Location:?view');}
    $product=mysqli_fetch_array(product($id));  
    $price_sale=price_sale($product['MaSP'],$product['DonGia']);
    $product_detail_size=product_detail_size($id);
    $product_detail_color=product_detail_color($id);
    $product_review=product_review($id);
    if(product_detail_image($id)==false){$product_detail_image=array('Anh1'=>'loader.gif','Anh2'=>'loader.gif','Anh3'=>'loader.gif','Anh4'=>'loader.gif'); }else{ $product_detail_image=mysqli_fetch_array(product_detail_image($id));}
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="bread"><span><a href="?view">Trang chủ</a></span> / <span>Chi tiết sản phẩm<menu type="context"></menu></span></p>
            </div>
        </div>
    </div>
</div>
<div class="colorlib-product">
    <div class="container">
        <div class="row row-pb-lg product-detail-wrap">
            <div class="col-sm-8">
                <div class="owl-carousel">
                    <div class="item">
                        <div class="product-entry border">
                            <a href="#" class="prod-img">
                                <img src="webroot/image/sanpham/<?php echo $product_detail_image['Anh1'] ?>" class="img-fluid" alt="Quang Xuan code ">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-entry border">
                            <a href="#" class="prod-img">
                                <img src="webroot/image/sanpham/<?php echo $product_detail_image['Anh2'] ?>" class="img-fluid" alt="Quang Xuan code ">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-entry border">
                            <a href="#" class="prod-img">
                                <img src="webroot/image/sanpham/<?php echo $product_detail_image['Anh3'] ?>" class="img-fluid" alt="Quang Xuan code ">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-entry border">
                            <a href="#" class="prod-img">
                                <img src="webroot/image/sanpham/<?php echo $product_detail_image['Anh4'] ?>" class="img-fluid" alt="Quang Xuan code ">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <form class="col-sm-4" action="?view=addtocart" method="post" id="form1">
                <div class="product-desc">
                    <h3><?php echo $product['TenSP']; ?></h3>
                    <p class="price">
                        <span><?php echo number_format($price_sale,0).'₫'; ?></span> 
                        <?php if(number_format($product['DonGia']) !== number_format($price_sale)){ ?>
                        <span class="price-old"><?php echo  number_format($product['DonGia'], 0 ).' '.' ₫' ; ?></span> <?php } ?>
                        <span class="rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </p>
                </div>
                <div class="size-wrap">
                    <div class="block-26 mb-2">
                        <h4>Size</h4>
                        <?php while ($row=(mysqli_fetch_array($product_detail_size))) {?>
                                <div class="box-size">
                                    <input type="radio" class="custom-control-input " id="<?php echo $row['MaSize'];?>" name="size" value="<?php echo $row['MaSize'];?>" required>
                                    <label class="custom-control-label " for="<?php echo $row['MaSize'];?>"><h6><?php echo $row['MaSize'];?></h6></label>
                                </div> 
                        <?php }?>
                    </div>
                </div>
                <div class="size-wrap">
                    <div class="block-26 mb-2">
                        <h4>Màu</h4>
                        <?php while ($row=(mysqli_fetch_array($product_detail_color))) {?>
                        <div class="box-mau">
                            <input type="radio" class="custom-control-input " id="<?php echo $row['MaMau'];?>" name="mau" value="<?php echo $row['MaMau'];?>" required>
                            <label class="custom-control-label " for="<?php echo $row['MaMau'];?>"><h6><?php echo $row['MaMau'];?></h6></label>
                        </div> <?php }?>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-btn">
                        <button type="button" class="quantity-left-minus btn"  id="tru"><i class="fas fa-minus"></i></button>
                    </span>
                    <input type="text" id="soluong" name="soluong" id="soluong" class="form-control input-number" value="1" min="1" max="10">
                    <span class="input-group-btn ml-1">
                        <button type="button" class="quantity-right-plus btn" id="cong"> <i class="fas fa-plus"></i></button>
                    </span>
                </div>
                <input type="hidden"  name="idproduct" form="form1"  value='<?php echo $product['MaSP'] ?>'>
                <input type="hidden"  name="dongia" form="form1"  value='<?php echo number_format($price_sale) ?>'>
                <div class="col-sm-12 text-center">
                    <p class="addtocart"><button type="submit" form="form1" name='addtocart' class="btn col-sm-12 btn-primary "> Thêm vào giỏ hàng</button></p>
                </div> 
            </form>         
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-12 pills">
                        <div class="bd-example bd-example-tabs">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Mô tả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Đánh giá</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                    <p><?php echo $product['MoTa'] ?></p>
                                </div>       
                                <div class="tab-pane border fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                <div class="cmt-box"><form action="?view=addtoreview" method="post" id='form2'>
                                    <textarea name="noidung" id="noidung" placeholder="Viết đánh giá  ..."></textarea>
                                    <input type="hidden"  name="masp" form="form2"  value='<?php echo $product['MaSP'] ?>'>
                                    <button form='form2' name="action" value="binhluan" type="submit" class="btn btn-primary alert-danger">Đánh giá</button></form>
                                </div>
                                    <div class="row"> 
                                        <div class="col-md-12">
                                            <h3 class="head"><?php if($product_review==false){ echo "Chưa có đánh giá nào~~~";}else{ echo mysqli_num_rows($product_review) .' Đánh giá'  ;?></h3>
                                            <?php while($row=mysqli_fetch_array($product_review))  { $rowkh=selectKH($row['MaKH']) ?>
                                            <div class="review">
                                                <div class="user-img" style="background-image: url('webroot/image/logo/user.png')"></div>
                                                <div class="desc">
                                                    <h4>
                                                        <span class="text-left"><?php echo $rowkh['TenKH'] ?></span>
                                                        <span class="text-right"><?php echo $row['ThoiGian'] ?></span>
                                                    </h4>
                                                    <p class="star">
                                                        <span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        </span>
                                                        
                                                    </p>
                                                    <p><?php echo $row['NoiDung'] ?></p>
                                                </div>
                                            </div>
                                            <?php } }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>