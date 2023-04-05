<style>
    .content-list-in {
        text-overflow: ellipsis;
        overflow: hidden;
        width: 100%;
        height: 150px;
        white-space: pre-wrap;
    }
</style>
<div class="container">

    <div class="breadcrumbs">
        <ol itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href=".">
                    <span itemprop="name">Trang chủ</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span itemprop="item">
                    <strong itemprop="name">
                        Sản phẩm
                    </strong>
                </span>
                <meta itemprop="position" content="2" />
            </li>
        </ol>
    </div>
    <!--breadcrumbs-->
    <div class="div" style="display: flex;">
        <!--breadcrumbs-->

        <div class="content_page">
            <div class="box-title">
                <div class="title-bar">
                    <h1>Tin tức</h1>
                </div>
            </div>
            <div class="content_text">
                <ul class="list_ul">
                    <?php
                    foreach ($data['post'] as $post) {
                    ?>
                        <li class="lists">
                            <div class="img-list">
                                <a href="<?= route_post_user ?>/detail/<?= $post['id'] ?>">
                                    <img src="<?= asset ?>/uploads/post/<?= $post['image'] ?>" alt="<?= $post['name'] ?>" class="img-list-in">
                                </a>
                            </div>
                            <div class="content-list">
                                <div class="content-list_inm">
                                    <div class="title-list">
                                        <h3>
                                            <a href="<?= route_post_user ?>/detail/<?= $post['id'] ?>"><?= $post['name'] ?></a>
                                        </h3>
                                    </div>
                                    <div class="content-list-in">
                                        <p><span style="font-size:16px"><?= $post['content'] ?></span></p>
                                    </div>
                                    <div class="xt"><a href="<?= route_post_user ?>/detail/<?= $post['id'] ?>">Xem thêm</a></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </li>

                    <?php
                    }
                    ?>

                </ul>
                <div class="clear"></div>
                <div class="wp_page">
                    <div class="page">
                    </div>
                </div>
            </div>
        </div>
        <div class='' style="margin-left: 40px;">
            <?php
            foreach ($data['categorypost'] as $categorypost) {
            ?>
                <a class="btn w-100 mt-4" href="<?= route_post_user ?>/categorypost/<?= $categorypost['id'] ?>">
                    <?= $categorypost['name'] ?>
                </a>
            <?php } ?>
        </div>
    </div>
</div>