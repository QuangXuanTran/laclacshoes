<?php
$view = $_GET['view'];
switch ($view) {
    case 'products-category':
        $products=product_category($_GET['id']);
        break;
    case 'products-search':
        $products=product_search($_POST['key']);
        break;    
    
    default:
        # code...
        break;
}
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="bread"><span><a href="?view">Trang Chủ</a></span> / <span>Sản phẩm</span></p>
            </div>
        </div>
    </div>
</div>
<div class="colorlib-product">
    <div class="container">
        <div class="row row-pb-md"> 
        <?php
            while ($row=(mysqli_fetch_array($products))) { $price_sale=price_sale($row['MaSP'],$row['DonGia']);?>
            <div class="col-lg-3 mb-4 ">
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
            </div> 
            <?php }?>      
        </div>
    </div>
</div>