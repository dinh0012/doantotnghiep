<?php $images = json_decode($tours->images) ?>
<div id="main" class="property-profiles">
    <div class="detail-property">
        <div id="detail-property" style="">
            <div class="slider-search">
                <div class="row">
                    <div class="col-sm-6 large item-img">
                        <a id="" href="#"><img id="listImage" data-proid="<?= $tours->id ?>"
                                               src="<?= baseUrl() . '/uploads/tours/' . $tours->id . '/' . $images[0] ?>"
                                               alt="">

                            <div class="fullscreen visible-xs"></div>
                        </a>
                    </div>
                    <div class="col-sm-6 group-img hidden-xs">
                        <div class="col-sm-12 item-img">
                            <div class="row">
                                <div class="col-sm-6 item-img" style="height: 268.1px;">
                                    <a id="" href="#"><img
                                            src="<?= baseUrl() . '/uploads/tours/' . $tours->id . '/' . $images[1] ?>"
                                            alt="2"></a>
                                </div>
                                <div class="col-sm-6 item-img" style="height: 268.1px;">
                                    <a id="" href="#"><img
                                            src="<?= baseUrl() . '/uploads/tours/' . $tours->id . '/' . $images[3] ?>"
                                            alt="3"></a>
                                </div>
                                <div class="col-sm-6 item-img" style="height: 268.1px;">
                                    <a id="" href="#"><img
                                            src="<?= baseUrl() . '/uploads/tours/' . $tours->id . '/' . $images[4] ?>"
                                            alt="4"></a>
                                </div>
                                <div class="col-sm-6 item-img" style="height: 268.1px;">
                                    <a id="" href=""><img
                                            src="<?= baseUrl() . '/uploads/tours/' . $tours->id . '/' . $images[5] ?>"
                                            alt="5"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="descrip-vrt">
                <div class="row">
                    <div class="col-lg-4 col-md-4 detail-title">
                        <h2 class="title">
                            <input type="hidden" name="p_name" id="p_name" value="View Retreats">
                            <a class="title-details-property" title=""><?= $tours->name ?> </a>
                        </h2>
                    </div>
                    <div class="col-lg-8 col-md-8 total-left-icon">
                        <div class="rightDetail">
                            <div class="row">
                                <div class="col-sm-8 col-xs-12 col-lg-8 icon-details-box">
                                    <ul class="icon-property">
                                        <li class="day_check min-nights"><span
                                                <?php $checkin = explode('-', $tours->check_in);
                                                $checkout = explode('-', $tours->check_out);
                                                ?>
                                                class="icon"><?= $checkin[0] . '-' . $checkin[1] ?></span><span
                                                class="text_tour">Ngày đi</span>
                                        </li>
                                        <li class="day_check min-nights"><span
                                                class="icon"><?= $checkout[0] . '-' . $checkout[1] ?></span><span
                                                class="text_tour">Ngày về</span>
                                        </li>
                                        <?php $socho = $tours->total_residual ?>
                                        <li class="max-guests"><span class="icon"><?= $socho ?></span><span
                                                class="text_tour">Chỗ còn lại</span></li>
                                        <li class="min-nights"><span
                                                class="icon"><?= $tours->total_days ?></span><span class="text_tour">Ngày</span>
                                        </li>
                                        <li class="min-nights"><span
                                                class="icon"><?= $tours->total_nights ?></span><span
                                                class="text_tour">Đêm</span></li>

                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-lg-4 all-total-price">
                                    <div class="total-price-botton">
                                        <div class="price-bx">
                                            <p>
                                                <span class="block">Gía chỉ từ</span> <span
                                                    class="price"><?= $tours->price ?> đ
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3 hidden-xs">
                                    <div class="box-review"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fixed-light" class="fixed-light-detail">
        <div id="wrap-light">
            <div class="container">
                <div id="light-bar">
                    <ul class="nav light-menu clearfix">
                        <li class="active"><a href="#layer" title="">Hình ảnh</a></li>
                        <li><a href="#descrip-spy" title=""> Giới thiệu </a></li>
                        <li><a href="#details-spy" title=""> Dịch Vụ </a></li>
                        <li><a href="#map-spy" title="">Bản đồ </a></li>
                        <li><a href="#book-spy" class="book-spy" title="">Đặt Tour </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="box-spy" id="feature-spy">
	<div class="container">
		<div class="row">
			
								</div>
	</div>
</div>-->
    <div class="box-spy" id="descrip-spy">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 features-include">
                    <h3 class="title"><?= $tours->name ?></h3>
                    <p><?= $tours->description ?></p>
                </div>
            </div>


        </div>
    </div>
    <style>
        .row.node.hidden-mobile {
            /* text-align: center; */
            margin: auto;
        }

        .text-center.read_more.hidden-lg.hidden-sm {
            padding-top: 20px;
        }

        .row.node.hidden-mobile p {
            text-align: center;
            font-size: 12px;
            padding-top: 50px;
        }

        .service-collection td {
            width: 33.3333333334%;
        }

        .blue.link-location {
            width: 100%;
        }

        a.title-details-property:hover {
            color: #555;
        }

        .terms-condition a {
            cursor: pointer;
            color: #38b1ea;
        }

        .total-left-icon {
            padding-left: 0;
        }

        .icon-details-box {
            text-align: right;
            padding-left: 0;
            margin-top: 14px;
            border-right: 1px solid #dfe4e6;
        }

        .btn-gray-br {
        }

        #details-spy {
            padding: 60px 0 50px 0;
            background-color: #f6f6f6;
        }

        .list-property-information {
            width: 100%;
        }

        .list-property-information tr {
            width: 100%;
            height: 60px;
            border-bottom: 1px solid #dfe4e6;
        }

        .list-property-information tr:first-child {
            /* border-top: 1px solid #dfe4e6;*/
        }

        .accom-top table tr td:last-child, table.payment-list tr td:last-child {
            width: 70%;
        }

        .accom-top table tr td:first-child, table.payment-list tr td:first-child {
            font-weight: 600;
            color: #323a45;
            width: 30%;
        }

        .list-property-information tr td {
            font-size: 14px;
        }

        <!--
        -->
        .btn-wish:before {
            margin-top: -10px;
        }

        .icon-details .icon {
            font-size: 24px;
            font-family: open-sans-light;
        }

        .book-confirm .icon {
            font-size: 20px;
            text-transform: uppercase;
        }

        @media (min-width: 383px) and (max-width: 414px) {
            .all-total-price {
                padding-right: 0;
            }
        }

        @media (min-width: 768px) {
            .features-include {
                float: right;
            }

            .rightDetail .group-1 {
                margin-top: 5px;
            }

            .icon-details li {
            }

            .icon-details span {
                text-align: center;
                display: block;
            }
        }

        .rightDetail {
            margin-top: 0;
        }

        .rightDetail .group-1 {
            text-align: center;
        }

        .icon-details li {
            display: inline-block;
        }

        .icon-details li:last-child {
            border-right: none;
        }

        .icon-details .content-icon {
            text-transform: uppercase;
            width: 80px;
            font-size: 10px;
            font-family: open-sans-light;
            height: 28px;
            line-height: 13px;
        }

        .detail-property .descrip-vrt .price-bx p {
            text-align: center;
            padding: 0;
        }

        .detail-property .descrip-vrt .price-bx {
            padding-bottom: 0;
            margin-top: 0;
        }

        .detail-property .descrip-vrt .price-bx .price {
            font-size: 23px;
            font-family: Open Sans, sans-serif;
            color: #555555;
            line-height: 30px;
        }

        .descrip-vrt .price-bx span.block {
            text-align: center;
            font-size: 10px;
            font-family: open-sans-light;
        }

        .detail-property .descrip-vrt .price-bx:before {
            border-left: none;
        }

        .btn-wish {
            position: absolute;
            border: none !important;
        }

        #term-cancellationpolicy h2 {
            letter-spacing: 3px;
            font-style: italic;
            font-size: 28px;
            display: block;
            padding-right: 23px;
            font-weight: 400;
            margin: .5em 0 .25em;
        }

        #term-cancellationpolicy h3 {
            text-transform: uppercase;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 3px;
            display: block;
            margin-bottom: 1em;
        }

        .content-details-left a {
            color: #38B1EA;
        }

        .content-details-left h4 {
            padding: 15px 0 0 15px;
            font-size: 15px;
            line-height: 1.7;
        }

        .all-content-details {
            background: #f6f6f6;
        }

        .content-details-right {
            text-align: right;
            min-width: 280px;
        }

        .content-details-right a {
            margin-right: 20px;
        }

        @media (max-width: 1200px) {
            .content-details-right {
                padding-top: 15px;
            }

            .content-details-left h4 {
                padding: 15px 0 15px 15px;
            }
        }

        @media (max-width: 991px) {
            .all-content-details {
                margin: 0 20px;
            }

            .content-details-left h4 {
                padding: 20px 10px;
            }

            .content-details-right {
                display: none;
            }
        }

        @media (max-width: 767px) {
            .hidden-mobile {
                display: none;
            }

            .row.node.hidden-mobile p {
                padding-top: 0px;
            }

            .content-details-left h4 {
                font-size: 15px;
                /*padding: 20px 0;*/
            }
        }

        .features-include h3, .overview-title {
            font-weight: 600;
            color: #323a45;
            padding-bottom: 16px;
        }

        .overview-title {
            padding-bottom: 29px;
        }

        .list-feature li:last-child {
            border-bottom: none;
        }

        #term-cancellationpolicy h2 {
            letter-spacing: 3px;
            font-style: italic;
            font-size: 28px;
            display: block;
            padding-right: 23px;
            font-weight: 400;
            margin: .5em 0 .25em;
        }

        #details-spy h1 {
            font-weight: 600;
            color: #323a45;
            margin-bottom: 35px;
            text-align: center;
        }

        #term-cancellationpolicy h3 {
            text-transform: uppercase;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 3px;
            display: block;
            margin-bottom: 1em;
        }

        .content-details-left a {
            color: #38B1EA;
        }

        .content-details-left h4 {
            padding: 15px 0 0 15px;
            font-size: 15px;
            line-height: 1.7;
        }

        .list-property-information > li:first-child {
            border-top: 1px solid #dfe4e6;
        }

        .property-information-content li {
            float: left;
        }

        .all-content-details {
            background: #f6f6f6;
        }

        .content-details-right {
            text-align: right;
            min-width: 280px;
        }

        .property-information-content {
            display: inline-block;
        }

        #details-spy h3 {
            font-weight: 600;
            color: #323a45;
            padding-bottom: 13px;
        }

        .list-property-information > li {
            /*padding-bottom: 19px;
            padding-top: 19px;*/
            border-bottom: 1px solid #dfe4e6;
            position: relative;
            line-height: 18px;
        }

        .title-payment, .title-inclutions {
            margin-top: 60px;
        }

        .title-amenities, .title-payment, .title-inclutions, #details-spy h3 {
            padding-top: 17px;
            padding-bottom: 16px !important;
            border-bottom: 1px solid #dfe4e6;
        }

        .rightDetail:before {
            display: none;
        }

        .collection-list {
            margin-bottom: 60px;
        }

        .property-information-content {
            width: 100%;
        }

        .list-property-information span {
            width: 33.33%;
            display: inline-block;
            line-height: 18px;
            float: left;
        }

        .tr-collection {
            margin-top: 19px;
            margin-bottom: 19px;
            display: inline-block;
            width: 100%;
        }

        .property-information-content li:first-child {
            width: 30%;
            font-weight: 600;
            color: #323a45;
            margin-top: 19px;
            margin-bottom: 19px;
        }

        .property-information-content li:last-child {
            width: 70%;
            margin-top: 19px;
            margin-bottom: 19px;
        }

        .content-details-right a {
            margin-right: 20px;
        }

        @media (min-width: 992px) and (max-width: 1200px) {
            .min-nights .icon {
                height: 28px;
            }

            .icon-details li {
                float: left;
            }

            .all-total-price {
                padding-right: 0;
            }

            /*.detail-property .descrip-vrt .price-bx .price{
                font-size: 22px;
            }*/
        }

        @media (max-width: 1200px) {
            .content-details-right {
                padding-top: 15px;
            }

            .content-details-left h4 {
                padding: 15px 0 15px 15px;
            }
        }

        @media (max-width: 991px) {
            .payment-list {
                margin-bottom: 60px;
            }

            .all-content-details {
                margin: 0 20px;
            }

            .content-details-left h4 {
                padding: 20px 10px;
            }

            .content-details-right {
                display: none;
            }
        }

        @media (min-width: 768px) {
            .col-sm-6.features-include {
                float: right;
            }
        }

        @media (max-width: 767px) {
            .list_option_extra {
                margin-bottom: 60px;
            }

            .features-include {
                margin-bottom: 30px;
            }

            .detail-property .descrip-vrt .price-bx .price {
                display: block;
                text-align: right;
            }

            .detail-property .descrip-vrt .price-bx {

                padding-right: 15px;
            }

            .total-price-botton .group-1 {
                text-align: left;
                padding-left: 15px;
                border-left: 1px solid #dfe4e6;
            }

            .descrip-vrt .price-bx span.block {
                text-align: right;
            }

            .total-price-botton div {
                display: inline-block;
            }

            .total-left-icon {
                padding-left: 15px;
            }

            .icon-details-box {
                margin-bottom: 30px;
                padding-left: 15px;
            }

            .icon-details {
                width: 80%;
                margin: 0 auto;
                text-align: center;
            }

            .icon-details .icon {
                margin-right: 0;
            }

            .icon-details span {
                margin: 0 auto;
                text-align: center;
                display: block;
            }

            .icon-details .content-icon {
                width: 71px;
            }

            .content-details-left h4 {
                font-size: 15px;
                /*padding: 20px 0;*/
            }
        }

        @media (max-width: 639px) {
            .detail-property .descrip-vrt .price-bx .price {
                font-size: 19px;
            }

            .rightDetail .group-1 .btn-2 {
                width: 130px;
            }

            .total-price-botton .group-1 {
                padding-left: 8px !important;
            }

            .detail-property .descrip-vrt .price-bx {
                padding-right: 8px !important;
            }
        }

        @media (max-width: 520px) {
            /* .detail-property .descrip-vrt .price-bx .price{
                 font-size: 16px;
                 line-height: 24px;
             }*/

        }

        @media (max-width: 475px) {
            .icon-details li {
                display: inline-block;
                width: auto;
            }

            .btn-wish:before {
                font-size: 24px;
            }

            .icon-details {
                width: 95% !important;
            }

            .all-content-details {
                margin: 0;
            }

            .content-details-left h4 {
                font-size: 12px;
                padding: 20px 0;
            }
        }

        @media (max-width: 425px) {
            .descrip-vrt .price-bx span.block {
                font-size: 9px;
                padding-top: 5px;
            }

            /* .detail-property .descrip-vrt .price-bx .price{
                 font-size: 14px;
             }*/
        }

        @media (max-width: 357px) {
            .detail-property .descrip-vrt .price-bx .price {
                font-size: 16px;
            }
        }

        @media (max-width: 320px) {
            .icon-details-box {
                padding: 0;
            }

            .rightDetail .group-1 .btn-2 {
                width: 120px;
            }

        }
    </style>
    <div class="box-spy" id="details-spy">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="accom-top">
                        <h3>Dịch vụ đi kèm</h3>
                        <?php $sevices = explode(',', $tours->services);
                        foreach ($sevices as $sevice):
                            $dv = \application\models\Services::model()->findById($sevice);
                            ?>
                            <div class="col-sm-3 col-md-3"><?= $dv->name ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <div class="box-spy" id="map-spy">

        <div id="box-map" class="bx-map" style="height: 800px">Loading map...Please wait</div>
    </div>
    <style>
        #book-spy h3 {
            font-weight: 600;
            color: #323a45;
            padding-bottom: 16px;
        }
    </style>
    <div class="box-spy" id="book-spy">
        <div class="container" id="book-spy-url">
            <h3>Đặt Tour</h3>
            <?php $payment = vendor\helpers\Session::getState('payment_sucess'); ?>
            <?php if(isset($payment) && $payment):
                $order_id = vendor\helpers\Session::getState('order_id');
               \vendor\helpers\Session::unsetState('order_id');
               \vendor\helpers\Session::unsetState('payment_sucess');
                $order = \application\models\Orders::model()->findById($order_id);
                ?>
                <div class="row book_info">
                    <div class="col-sm-12 "><h1 class="alert-success">Bạn đã đặt tour thành công</h1></div>
                    <div class="col-sm-12 "> <h3>Thông tin thanh toán của bạn</h3></div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-2">Họ tên:</div>
                    <div class="col-sm-10"><strong><?= $order->username ?></strong>
                    </div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-2">Email:</div>
                    <div class="col-sm-10"><strong><?= $order->email ?></strong>
                    </div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-2">Điện thoại:</div>
                    <div class="col-sm-10"><strong><?= $order->phone ?></strong>
                    </div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-2">Địa chỉ:</div>
                    <div class="col-sm-10"><strong><?= $order->address ?></strong>
                    </div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-2">Mã thanh toán:</div>
                    <div class="col-sm-10"><strong><?= $order->payment_id ?></strong>
                    </div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-2">Ngày thanh toán:</div>
                    <div class="col-sm-10"><strong><?= $order->created_date ?></strong>
                    </div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-12 "><strong><h4><?= $tours->name ?></h4></strong></div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-2">Thời gian:</div>
                    <div class="col-sm-10"><strong><?= $tours->total_days ?> Ngày <?= $tours->total_nights ?> Đêm</strong>
                    </div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-2">Ngày khởi hành:</div>
                    <div class="col-sm-10"><strong><?= $tours->check_in ?></strong></div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-2">Nơi khởi hành:</div>
                    <?php $departure = \application\models\Departures::model()->findById($tours->departure) ?>
                    <div class="col-sm-10"><strong><?= $departure->name ?></strong></div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-2">Số khách:</div>
                    <div class="col-sm-10"><strong><?= $order->total_guest ?></strong></div>
                </div>
                <div class="row book_info">
                    <div class="col-sm-2">Giá:</div>
                    <div class="col-sm-10"><strong><?= number_format($order->price) ?> đ</strong></div>
                </div>

            <?php else:?>
            <div class="row book_info">
                <div class="col-sm-12 "><strong><h4><?= $tours->name ?></h4></strong></div>
            </div>
            <div class="row book_info">
                <div class="col-sm-2">Thời gian:</div>
                <div class="col-sm-10"><strong><?= $tours->total_days ?> Ngày <?= $tours->total_nights ?> Đêm</strong>
                </div>
            </div>
            <div class="row book_info">
                <div class="col-sm-2">Ngày khởi hành:</div>
                <div class="col-sm-10"><strong><?= $tours->check_in ?></strong></div>
            </div>
            <div class="row book_info">
                <div class="col-sm-2">Nơi khởi hành:</div>
                <?php $departure = \application\models\Departures::model()->findById($tours->departure) ?>
                <div class="col-sm-10"><strong><?= $departure->name ?></strong></div>
            </div>
            <div class="row book_info">
                <div class="col-sm-2">Giá:</div>
                <div class="col-sm-10"><strong><?= number_format($tours->price) ?> đ</strong></div>

            </div>
            <div class="row book_info">
                <div class="col-sm-2">Số chỗ còn nhận:</div>
                <div class="col-sm-10"><strong><?= $tours->total_residual ?></strong></div>

            </div>
            <h3>Thông tin thanh toán</h3>
            <form class="form validateForm" autocomplete="off" id="paypal" action="<?= baseUrl() ?>/paypal"
                  method="POST">
                <input type="hidden" id="price_hidden" disabled name="paypal[price_hidden]" value="<?=$tours->price?>"
                       class="form-control">
                <input type="hidden" id="id" name="paypal[tour_id]" value="<?=$tours->id?>"
                       class="form-control">
                <div class="search-box">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <div class="column">
                                <label class="text">Họ tên</label>
                                <div class="select-rv input">
                                    <input type="text" id="full_name" name="paypal[full_name]" value=""
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <div class="column">
                                <label class="text">Email </label>
                                <div class="select-rv input">
                                    <input type="email" id="email" name="paypal[email]" value=""
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <div class="column">
                                <label class="text">Số điện thoại </label>
                                <div class="select-rv input">
                                    <input type="number" id="phone" name="paypal[phone]" value=""
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <div class="column">
                                <label class="text">Địa chỉ </label>
                                <div class="select-rv input">
                                    <input type="text" id="address" name="paypal[address]" value=""
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6">
                            <div class="column">
                                <label class="text">Tổng số khách </label>
                                <div class="select-rv input">
                                    <select class="form-control" rel="total_guest" name="paypal[total_guest]"
                                            id="total_guest">
                                        <?php for ($i = 1; $i <= $socho; $i++) { ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6">
                            <div class="column">
                                <label class="text">Giá </label>
                                <div class="select-rv input">
                                    <input type="text" id="price" disabled name="paypal[price]" value="<?=$tours->price?> đ"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="<?=\vendor\security\Csrf::$_csrf_token_name?>" value="<?=\vendor\security\Csrf::_creatToken()?>">
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 col-md-2 btn-search">
                            <div class="column">
                                <button type="submit" class="btn-1 btn-white search-book btn-2">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="error" style="color: red;"></div>
            </form>
            <?php endif; ?>
        </div>
    </div>
    <script>
        $('#paypal').submit(function (e) {
            e.preventDefault();
            $('.error').html('');
            var submit='1';
            $.ajax({
               url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(data) {
                    if(!data.error){
                       windown.location(data.url)
                    }
                    else{
                        if(data.username)
                            $('.error').append('<div>'+data.username+'</div>');
                        if(data.email)
                            $('.error').append('<div>'+data.email+'</div>');
                        if(data.phone)
                            $('.error').append('<div>'+data.phone+'</div>');
                        if(data.address)
                            $('.error').append('<div>'+data.address+'</div>');
                    }

                }
            });
        })
    </script>
    <div id="featured" class="text-center">
        <div class="container ">
            <h2 class="head-1">Các Tour mới nhất</h2>
            <div class="slide-featured owl-carousel owl-theme owl-loaded owl-responsive-1024">
                <?php $route = 'tours/detail';
                foreach ($newtours as $newtour):
                    $image = json_decode($newtour->images);
                    $page = \application\models\Pages::model()->findOne(['route' => $route, 'model_id' => $newtour->id]);
                    ?>
                    <div class="col-sm-4 owl-item  " style="width: 363.333px; margin-right: 0px;">
                        <div class="item" style="max-height: 400px!important">
                            <a href="/<?= $page->slug ?>" title="">
                                <figure>
                                    <img src="<?= baseUrl() . '/uploads/tours/' . $newtour->id . '/' . $image[0] ?>"
                                         alt="">
                                    <figcaption><?= $newtour->name ?></figcaption>
                                </figure>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="item itemSimilar" style="display: none;" id="itemSimilarTMP">
        <a href="" title="" class="figure-image">
            <figure>
                <img src="/themes/retreat/img/featur-img1.jpg" alt="">
                <figcaption>Alinghi Beach House</figcaption>
            </figure>
        </a>

        <p class="pro-title">Gladstone &amp; Surrounds, Queensland</p>
    </div>
    <div class="modal fade" id="term-cancellationpolicy" aria-hidden="false">
        <div class="modal-dialog">
            <div class="box-modal">
                <div class="form-retreat">
                    <button type="button" class="close-mdl" data-dismiss="modal" aria-label="Close"><span
                            class="ion-android-close"></span></button>
                    <h2>Terms and Conditions</h2>

                    <h3>View Retreats</h3>

                    <div class="cancellationpolicy-content"><font color="black">
                            Payment Term
                            <ul>
                                <li>Deposit: 50% total balance</li>
                                <li>Balance: 14 days prior to arrival</li>
                            </ul>
                            Cancellation - Standard
                            <ul>
                                <li>0 to 30 days before arrival - 50% refund</li>
                                <li>31 days or more before arrival - Full refund less AU$25 administration fee</li>
                            </ul>


                            Cancellation - Christmas/New Year
                            <ul>
                                <li>0 to 30 days before arrival - No refund</li>
                                <li>31 to 60 days before arrival - 50% refund</li>
                                <li>61 days or more before arrival - Full refund less AU$25 administration fee</li>
                            </ul>
                            Other
                            <ul>
                                <li>This property has a zero party policy</li>
                                <li>Full guest list must be provided</li>
                                <li>Max guest numbers not to be exceeded
                                </li>
                            </ul>

                            We highly recommend travel insurance to cover for any unforeseen circumstances.
                        </font></div>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAmqIdCkNBZlUHNoJH4GgWdMgTZ4p1Tugw"></script>

    <script type="text/javascript">


        setTimeout(function () {
            $('#detail-property ').show();
            calSize();
            return false;
        }, 3000);
        var offset_opacity = 700;
        $(window).scroll(function (e) {
            if ($(window).scrollTop() < offset_opacity) {
                $("#social-right").hide();
            } else {
                $("#social-right").show();
            }
        });


        $(document).ready(function () {

            $('.read-more-mobile').click(function (e) {
                return e.preventDefault(), $(".read-more-mobile").hasClass("less") ? ($(this).removeClass("less"), $(".hidden-mobile").slideUp(1000), $(".read-more-mobile").text("Read More")) : ($(".read-more-mobile").addClass("less"), $(".hidden-mobile").slideDown(1000), $(".read-more-mobile").text("Read Less")), !1
            });
            var more_height = $('.overview ').height();
            //$('.features-include').css({'min-height': more_height});
            $('#box-map').html('Loading map...Please wait');
            setTimeout(getMap(<?=$tours->lat?>, <?=$tours->lng?>, "<?=$tours->name?>"), 2000);
            function getMap(Latitude, Longitude, name) {
                var geocoder = new google.maps.Geocoder();
                // Locate the address using the Geocoder.

                // geocoder.geocode( { location: new google.maps.LatLng(-38.53517,143.973984) }, function(results, status) {
                geocoder.geocode({location: new google.maps.LatLng(Latitude, Longitude)}, function (results, status) {
                    // If the Geocoding was successful
                    if (status == google.maps.GeocoderStatus.OK) {
                        // Create a Google Map at the latitude/longitude returned by the Geocoder.
                        var myOptions = {
                            sensor: true,
                            zoom: 12,
                            center: {lat: Latitude, lng: Longitude},
                            //center: '(' + '-38.53517' + ', ' + '143.973984' + ')',
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                            panControl: true,
                            scrollwheel: false,
                            draggable: false,
                            panControlOptions: {
                                position: google.maps.ControlPosition.TOP_RIGHT
                            },

                            zoomControl: true,
                            zoomControlOptions: {
                                style: google.maps.ZoomControlStyle.LARGE,
                                position: google.maps.ControlPosition.TOP_LEFT
                            }
                        };
                        var map = new google.maps.Map(document.getElementById("box-map"), myOptions);
                        // Add a marker at the address.
                        var marker = new google.maps.Marker({
                            map: map,
                            clickable: true,
                            position: {lat: Latitude, lng: Longitude},
                            title: ''
                            // icon: ""
                        });
                        google.maps.event.addListener(marker, 'click', function () {
                            var markerContent = "Lorne, Top End, Northern Territory, Australia ";
                            infoWindow.setContent(markerContent);
                            infoWindow.open(map, marker);
                        });
                        var infoWindow = new google.maps.InfoWindow();
                    } else {
                        try {
                            console.error("Geocode was not successful for the following reason: " + status);
                        } catch (e) {
                        }
                        $('#box-map').html("<div style='padding-bottom:10px;'>You are not has address property, please update it!</div>");
                        $('#box-map').css("height", "800px !important");
                    }
                });
            }
        });
        $( '#total_guest').change(function() {
            var total_guest = $(this).val();
            var price = $('#price_hidden').val();
            $('#price').val(total_guest*price +' đ');
        });

    </script>
</div>
<style>
    ul.icon-property li {
        width: 19%;
    }
    .row.book_info {
        padding: 15px 0;
        border-bottom: 1px solid #e8e8e8;
    }
    ul.icon-property {
        margin: 0 !important;
    }
</style>