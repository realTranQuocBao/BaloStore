<?php
require_once('./utils/utility.php');
require_once('./database/dbhelper.php');


?>

<!DOCTYPE html>
<html lang="en">
<?php require_once('layouts/head.php'); ?>
<body>
    <div class="apps">
        <?php require_once("layouts/top.php"); ?>

        <div class="container">
            <div class="grid wide">
                <div class="container-pays">
                    <div class="container-pays__sale">
                        <p class="container-pays__sale-text">
                            Bạn có mã ưu đãi ?
                            <span class="container-pays__span js-pays__span">Ấn vào đây để nhập mã</span>
                        </p>
                        <div class="container-pays__login js-pays__login">
                            <span class="container-pays__login-text">
                                Nếu bạn có mã giảm giá, vui lòng điền vào phía bên dưới.
                            </span>
                            <form action="" class="container-pays__login-from">
                                <input type="text" class="container-pays__login-sale">
                                <button class="btn btn--blue container-pays__login-button">Áp dụng</button>
                            </form>
                        </div>
                        <div class="container-client">
                            <div class="row sm-gutter">
                                <div class="col l-7 m-7 c-12">
                                    <form action="" class="container-client__pay">
                                        <label for="" class="container-client__pay-text">Thông Tin Thanh Toán</label>
                                        <div class="container-client__flex">
                                            <div class="container-client__flex-name">
                                                <label for="" class="container-client__flex-text">Tên*</label>
                                                <input type="text" class="container-client__flex-input">
                                                <p class="container-client__flex-span">...</p>
                                            </div>
                                            <div class="container-client__flex-name">
                                                <label for="" class="container-client__flex-text">Họ*</label>
                                                <input type="text" class="container-client__flex-input">
                                                <p class="container-client__flex-span"></p>
                                            </div>
                                        </div>
                                        <div class="container-client__last">
                                            <label for="" class="container-client__last-text">Tên công ty</label>
                                            <input type="text" class="container-client__last-input">
                                            <p class="container-client__last-span">....</p>
                                        </div>
                                        <div class="container-client__last">
                                            <label for="" class="container-client__last-text">Địa chỉ*</label>
                                            <input type="text" class="container-client__last-input">
                                            <p class="container-client__last-span">...</p>
                                        </div>
                                        <div class="container-client__last">
                                            <label for="" class="container-client__last-text">Tỉnh/Thành phố*</label>
                                            <input type="text" class="container-client__last-input">
                                            <p class="container-client__last-span">...</p>
                                        </div>
                                        <div class="container-client__last">
                                            <label for="" class="container-client__last-text">Số điện thoại*</label>
                                            <input type="text" class="container-client__last-input">
                                            <p class="container-client__last-span">...</p>
                                        </div>
                                        <div class="container-client__last">
                                            <label for="" class="container-client__last-text">Địa chỉ Email*</label>
                                            <input type="text" class="container-client__last-input">
                                            <p class="container-client__last-span"></p>
                                        </div>
                                    </form>
                                </div>
                                <div class="col l-5 m-5 c-12">
                                    <div class="container-bill">
                                        <h2 class="container-bill__text">Đơn hàng của bạn</h2>
                                        <div class="container-bill__noti">
                                            <span class="container-bill__noti-span">Sản phẩm</span>
                                            <span class="container-bill__noti-span">Tạm tính</span>
                                        </div>
                                        <ul class="container-bill__list">

                                            <?php foreach($cartList as $sp): ?> 
                                            <li class="container-bill__item">
                                                <div class="container-bill__item-flex">
                                                    <p class="container-bill__item-text">
                                                        <?=$sp['name'];?>
                                                        <span class="container-bill__item-sapn">x1</span>
                                                    </p>
                                                    <p class="container-bill__item-money"><?=number_format($sp['price']*$cart[$key]['quantity'], 0, ',', '.'); ?></p>
                                                </div>
                                            </li>
                                            <?php endforeach; ?>
                                            
                                        </ul>
                                        <div class="container-bill__price">
                                            <span class="container-bill__price-text">Tạm tính:</span>
                                            <span class="container-bill__price-text"><?=number_format($total,0,',','.');?>đ</span>
                                        </div>
                                        <div class="container-bill__price">
                                            <span class="container-bill__price-text">Mã giảm giá:</span><?php $discount = 0000;?>
                                            <span class="container-bill__price-text"><?=number_format(00000,0,',','.');?>đ</span>
                                        </div>
                                        <div class="container-bill__price">
                                            <span class="container-bill__price-text">Tổng:</span>
                                            <span class="container-bill__price-text"><?=number_format($total-$discount,0,',','.');?>đ</span>
                                        </div>
                                        <form action="" class="container-bill__pay">
                                            <p class="container-bill__pay-text">
                                                Không có hình thức thanh toán nào được thiết
                                                lập theo địa chỉ khu vực của bạn. Vui lòng liên hệ
                                                với quản trị website để hỗ trợ vấn đề này.
                                            </p>
                                            <button type="button" class="btn btn--green container-bill__pay-submit js-pay-submit">Đặt Hàng</button>
                                            <p class="container-bill__pay-noti">
                                                Thông tin cá nhân của bạn sẽ được sử dụng để
                                                xử lý đơn hàng, tăng trải nghiệm sử dụng website
                                                , và cho các mục đích cụ thể khác đã được mô tả trong
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-pay js-modal-turnon">
            <div class="modal-pay__over"></div>
            <div class="modal-pay__form">
                <div class="modal-form__list">
                    <img src="./assets/images/MoMo.png" alt="" class="modal-form__img-list">
                    <p class="modal-form__list-text">Quét mã QR Code để thanh toán</p>
                </div>
                <div class="modal-form__img">
                    <img src="./assets/images/qr.jpg" alt="" class="modal-form__img-last">
                    <p class="modal-form__list-span js-modal-number"></p>
                    <p class="modal-form__list-span js-modal-sucsess"></p>
                </div>
                <div class="modal-form__pays">
                    <!-- <button class="modal-form__pays-submit js-modal-pays">Đồng ý thanh toán</button> -->
                    <button class="modal-form__pays-close js-modal-close">Trở về</button>
                </div>
            </div>
        </div>
        <?php require_once($baseUrl . "layouts/bot.php"); ?>
    </div>
    <!-- javasprit -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./assets/js/thanhtoan.js"></script>
</body>

</html>