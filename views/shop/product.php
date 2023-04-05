<div class="container module_pro_all">
    <div class="box-title">
        <div class="title-bar">
            <h1>Tất cả sản phẩm</h1>
        </div>
    </div>
    <div class="pro_all_gird">
        <div class="girds_all list_all_other_page ">
            <?php
            if (Count($data['product']) < 1) {
            ?>
                <h1 class="text-center">Chưa có sản phẩm</h1>
                <?php
            } else {

                foreach ($data['product'] as $product) {
                ?>
                    <div class="grids">
                        <div class="grids_in">
                            <div class="content">
                                <div class="img-right-pro">

                                    <a href="sanpham.php">
                                        <img class="lazy img-pro content-image" src="<?= asset ?>/uploads/product/<?= $product['image'] ?>" />
                                    </a>

                                    <div class="content-overlay"></div>
                                    <div class="content-details fadeIn-top">
                                        <ul class="details-product-overlay">
                                            <li>Số lượng: <?= $product['quantity'] == 0 ? 'hết hàng' : $product['quantity'] ?></li>

                                        </ul>

                                    </div>
                                </div>
                                <div class="name-pro-right">
                                    <a href="<?= route_product_user ?>/detail/<?= $product['id'] ?>">
                                        <h3><?= $product['name'] ?></h3>
                                    </a>
                                </div>
                                <div class="add_card">
                                    <a onclick="return giohang(579);">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Đặt hàng
                                    </a>
                                </div>
                                <div class="price_old_new text-center">
                                    <div class="price w-100">
                                        <span class="news_price"><?= number_format($product['price']) . 'vnd' ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            } ?>

            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>