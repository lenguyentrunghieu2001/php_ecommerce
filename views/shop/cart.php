<section>
    <div class="bg_in">
        <div class="content_page cart_page">
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
                                Giỏ hàng
                            </strong>
                        </span>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </div>
            <div class="box-title">
                <div class="title-bar">
                    <h1>Giỏ hàng của bạn</h1>
                </div>
            </div>
            <div class="content_text">
                <div class="container_table">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr class="tr tr_first">
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th style="width:100px;">Số lượng</th>
                                <th>Thành tiền</th>
                                <th style="width:50px; text-align:center;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($data['cart'] == 0 || Count($data['cart']) == 0) {
                            ?>
                                <tr class="tr">
                                    <td colspan="5" style="font-size: 16px;">Không có sản phẩm</td>
                                </tr>
                                <?php
                            } else {
                                $sub_total = 0;
                                foreach ($data['cart'] as $cart) {
                                    $total =    $cart['product_price'] * $cart['product_quantity'];
                                    $sub_total += $total;
                                ?>
                                    <tr class="tr">
                                        <td data-th="Hình ảnh">
                                            <div class="col_table_image col_table_hidden-xs"><img src="<?= asset ?>/uploads/product/<?= $cart['product_image'] ?>" alt="Máy in laser Canon LBP251DW" class="img-responsive" /></div>
                                        </td>
                                        <td data-th="Sản phẩm">
                                            <div class="col_table_name">
                                                <h4 class="nomargin"><?= $cart['product_name'] ?></h4>
                                            </div>
                                        </td>
                                        <td data-th="Giá"><span class="color_red font_money"><?= number_format($cart['product_price']) ?> Vnd</span></td>
                                        <td data-th="Số lượng">
                                            <div class="clear margintop5">
                                                <form action="<?= route_cart ?>/updatecart" method="POST" name="update_quantity">
                                                    <input type="hidden" name="product_id" value="<?= $cart['product_id'] ?>">
                                                    <div class="floatleft"><input type="number" class="inputsoluong" name="product_quantity" value="<?= $cart['product_quantity'] ?>" min="0" max="20"></div>
                                                    <div class="floatleft width50" onclick="document.forms['update_quantity'].submit();">
                                                        <button class="btn_df btn_table_td_rf_del btn-sm">
                                                            <i class="fa fa-refresh"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="clear"></div>
                                        </td>
                                        <td data-th="Thành tiền" class="text_center"><span class="color_red font_money"><?= number_format($total) ?> Vnd</span></td>
                                        <td class="actions aligncenter" data-th="">
                                            <a href="<?= route_cart ?>/deletecart/<?= $cart['product_id'] ?>" class="btn_df btn_table_td_rf_del btn-sm"><i class="fa fa-trash-o"></i> <span class="display_mobile">Xóa sản phẩm</span></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="7" class="textright_text">
                                    <div class="sum_price_all">
                                        <span class="text_price">Tổng tiền thành toán</span>:
                                        <span class="text_price color_red"><?= isset($sub_total) ? number_format($sub_total) : 0 ?> Vnd</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="tr_last">
                                <td colspan="7">
                                    <a href="." class="btn_df btn_table floatleft"><i class="fa fa-long-arrow-left"></i> Tiếp tục mua hàng</a>
                                    <div class="clear"></div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="contact_form">
                    <div class="contact_left">
                        <div class="ch-contacts-details">
                            <ul class="contact-list">
                                <li class="addr">
                                    <strong class="title">Địa chỉ của chúng tôi</strong>
                                    <p><em><strong>Bán figure</strong></em><br />
                                    <p>Trung Tâm Bán Hàng:</p>
                                    <p>CN1: 333B Minh Phụng, Phường 2, Quận 11, HCM</p>
                                    <p>CN2: 548 Lý Thái Tổ, Phường 10, Quận 10, HCM</p>
                                    <p>N3: 297 Quang Trung, Phường 10, Q. Gò Vấp, HCM</p>
                                    <p> CN4: 72 Đinh Tiên Hoàng, Phường 01, Q. Bình Thạnh, HCM</p>
                                    <p> Hotline: 0363151035)</p>
                                    </p>
                                </li>
                            </ul>
                            <div class="hiring-box">
                                <strong class="title">Chào bạn!</strong>
                                <p>Mọi thắc mắc bạn hãy gửi về mail của chúng tôi <strong>lenguyyentrunghieu2001@gmail.com</strong> chúng tôi sẽ giải đáp cho bạn.</p>
                                <p><a href="." class="arrow-link"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Về trang chủ</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="contact_right">
                        <div class="form_contact_in">
                            <div class="box_contact">
                                <form name="FormDatHang" autocomplete="off" method="post" action="<?= route_cart ?>/order">
                                    <div class="content-box_contact">
                                        <div class="row">
                                            <div class="input">
                                                <label>Họ và tên: <span style="color:red;">*</span></label>
                                                <input type="text" name="name" required class="clsip">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="row">
                                            <div class="input">
                                                <label>Số điện thoại: <span style="color:red;">*</span></label>
                                                <input type="text" name="phone" required onkeydown="return checkIt(event)" class="clsip">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="row">
                                            <div class="input">
                                                <label>Địa chỉ: <span style="color:red;">*</span></label>
                                                <input type="text" name="address" required class="clsip">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="row">
                                            <div class="input">
                                                <label>Email: <span style="color:red;">*</span></label>
                                                <input type="text" name="email" onchange="return KiemTraEmail(this);" required class="clsip">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="row">
                                            <div class="input">
                                                <label>Nội dung: <span style="color:red;">*</span></label>
                                                <textarea type="text" name="content" class="clsipa"></textarea>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="row btnclass">
                                            <div class="input ipmaxn ">
                                                <input type="submit" class="btn-gui" name="frmSubmit" id="frmSubmit" value="Gửi đơn hàng">
                                                <input type="reset" class="btn-gui" value="Nhập lại">
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <!---row---->
                                        <div class="clear"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clear"></div>