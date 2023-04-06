<?php $category = $data['category_id'];
?>


<div class="module_pro_all container">
    <div class="box-title">
        <div class="title-bar">
            <h1>Danh mục <?= $category['name'] ?></h1>
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
                    <form action="<?= route_cart ?>/addcart" method="POST">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="hidden" name="product_name" value="<?= $product['name'] ?>">
                        <input type="hidden" name="product_image" value="<?= $product['image'] ?>">
                        <input type="hidden" name="product_price" value="<?= $product['price'] ?>">
                        <input type="hidden" name="product_quantity" value="1">
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
                                        <input type="submit" style="box-shadow: none;" value="Đặt hàng" class="btn btn-warning">
                                    </div>
                                    <div class="price_old_new text-center">
                                        <div class="price w-100">
                                            <span class="news_price"><?= number_format($product['price']) . 'vnd' ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


            <?php
                }
            } ?>

            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>