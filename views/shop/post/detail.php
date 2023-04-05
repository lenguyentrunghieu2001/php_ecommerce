<?php $post_detail = $data['post_detail'] ?>
<div class="container">
    <div class="wrapper_all_main_right">
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
                            <?= $post_detail['name'] ?>
                        </strong>
                    </span>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
        <!--breadcrumbs-->
        <div class="content_page">
            <div class="box-title">
                <div class="title-bar">
                    <h1>Tin tức về <?= $post_detail['name'] ?></h1>
                </div>
            </div>
            <div>
                <img width="20%" style="margin-right: 20px;" src="<?= asset ?>/uploads/post//<?= $post_detail['image'] ?>" alt="">
                <div class="content_text" style="font-size: 18px;">
                    <?= $post_detail['content'] ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>