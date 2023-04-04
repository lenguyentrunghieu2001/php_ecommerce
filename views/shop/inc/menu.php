<header>
    <div class="header_top_menu">
        <div class="header_top_menu_all">
            <div class="header_top">
                <div class="bg_in">

                    <nav class="menu_top">
                        <form class="search_form" method="get" action="">
                            <input class="searchTerm" name="search" placeholder="Nhập từ cần tìm..." />
                            <button class="searchButton" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </nav>
                    <div class="cart_wrapper">
                        <div>
                            <?php
                            if (session::get('username')) {
                            ?>
                                <span><?= session::get('username') ?></span>

                                <a class="btn" style="background: yellow; box-shadow: yellow" href="<?= route_login . 'logout' ?>">Logout</a>
                            <?php
                            } else {
                            ?>
                                <a class="btn" style="background: yellow; box-shadow: yellow" href="<?= route_login  ?>">Login</a>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="btn_menu_search">
            <div class="bg_in">
                <div class="table_row_search">
                    <div class="menu_top_cate">
                        <div class="">
                            <div class="menu" id="menu_cate">
                                <div class="menu_left">
                                    <i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm
                                </div>
                                <div class="cate_pro">
                                    <div id='cssmenu_flyout' class="display_destop_menu">
                                        <ul>
                                            <?php
                                            foreach ($data['category'] as $category) {
                                            ?>
                                                <li class='active has-sub'>
                                                    <a href='<?= route_category_user ?>/index/<?= $category['id'] ?>'><span><?= $category['name'] ?></span></a>
                                                </li>

                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search_top">
                        <div id='cssmenu'>
                            <ul>
                                <li class='active'><a href='<?= BASE_URL ?>'>Trang chủ</a></li>

                                <li class=''>

                                    <a href='sanpham.php'>Loại Tin Tức</a>

                                    <ul>
                                        <li><a href='sanpham.php'>Apple</a>
                                        </li>
                                        <li><a href='sanpham.php'>Samsung</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class=''><a href='chitiettin.php'>Tin tức</a></li>
                                <li class=''><a href='chitiettin.php'>Giỏ hàng</a></li>
                                <li class=''><a href='chitiettin.php'>Đơn hàng</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>
<div class="clear"></div>