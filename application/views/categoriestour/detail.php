<div id="main">
    <div id="our-philosopy" class="text-center hidden-xs">
        <div class="container">
            <h2 class="head-1"><?php echo $model->name; ?></h2>
            <div class="more">
                <?php echo $model->description_sort; ?>
            </div>
            <div class="more-button hide" style="margin-top: 30px;">
                <?php echo $model->description; ?>
            </div>
            <a href="#" title="" class="btn-gray-br morelink">Xem thêm</a>
        </div>
    </div>
    <div class="wrap-search">

        <div class="container">
            <!-- Begin seach -->
            <form class="form validateForm" autocomplete="off" id="search-form" action="<?=baseUrl()?>/search"
                  method="GET">
                <div class="search-box">
                    <div class="row">
                        <div class="col-xs-6 col-sm-2">
                            <div class="column">
                                <label class="text">Nơi khởi hành</label>
                                <div class="select-rv input">
                                    <select class="form-control" rel="locations" name="search-form[departure]"
                                            id="search-form_locations">
                                        <option style="color:#0B0A0A" value="">Nơi khơi hành</option>
                                        <?php \application\models\Tours::optionDeparture(isset($_GET['departure']) ? $_GET['departure'] : $model->departure) ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-2">
                            <div class="column">
                                <label class="text">Địa điểm </label>
                                <div class="select-rv input">
                                    <select class="form-control" rel="locations" name="search-form[category]"
                                            id="search-form_locations">
                                        <option style="color:#0B0A0A" value="">---Chọn địa điểm---</option>
                                        <?php \application\models\Tours::optionCats(isset($_GET['category']) ? $_GET['category'] : $model->id) ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-2">
                            <div class="column">
                                <label class="text">Ngày khởi hành </label>
                                <div class="select-rv input">
                                    <input type="" id="check_in" name="search-form[check_in]" value=""
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-2">
                            <div class="column">
                                <label class="text">Số người</label>
                                <div class="select-rv input">
                                    <select class="form-control" rel="night" name="search-form[total_person]"
                                            id="search-form_nights">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-2">
                            <div class="column">
                                <label class="text">Số ngày</label>
                                <div class="select-rv input">
                                    <select class="form-control" rel="night" name="search-form[total_days]"
                                            id="search-form_nights">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-2">
                            <div class="column">
                                <label class="text">Giá</label>
                                <div class="select-rv input">
                                    <select class="form-control" rel="adults" name="search-form[price]"
                                            id="search-form_adults">
                                        <option value="">Tìm theo giá</option>
                                        <option value="1">Dưới 1 triệu</option>
                                        <option value="2">1 - 2 triệu</option>
                                        <option value="3">2 - 4 triệu</option>
                                        <option value="4">4 - 6 triệu</option>
                                        <option value="5">Trên 6 triệu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 col-md-2 btn-search">
                            <div class="column">
                                <button type="submit" class="btn-1 btn-white search-book btn-2">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="<?=\vendor\security\Csrf::$_csrf_token_name?>" value="<?=\vendor\security\Csrf::_creatToken()?>">
            </form>
            <!-- End Seach form -->
        </div>
    </div>
    <div id="show-gmap" class="modal modal-map fade" aria-hidden="false">
        <div class="modal-header"><h3 id="title-map">Bản đồ</h3><h5 id="country-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <div id="map" style="height: 490px;">
            </div>
        </div>
        <div class="hidden-id" style="display: none;"></div>

    </div>
    <div id="wrap-wish">
        <?php if (isset($tours) && !empty($tours)): ?>

            <?php foreach ($tours as $tour):
                $images = json_decode($tour->images);
                ?>
                <div class="box-item-vrt product-id-<?= $tour->id ?>">
                    <div class="container">
                        <div class="item-vrt" style="margin-left: -164.5px;">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="slide-vrt item ">
                                        <?php $i = 0;
                                        foreach ($images as $img): ?>
                                            <figure><img
                                                    src="<?= baseUrl() ?>/uploads/tours/<?= $tour->id ?>/<?= $img ?>"
                                                    alt="" style="width:632px ; height:455px"></figure>
                                            <?php $i++; endforeach; ?>

                                    </div>
                                    <div class="owl-controls">
                                        <div class="owl-nav">
                                            <div class="owl-prev" style=""><i class="ion-ios-arrow-back"></i></div>
                                            <div class="owl-next" style=""><i class="ion-ios-arrow-forward"></i></div>
                                        </div>
                                        <div class="owl-dots" style="display: none;"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="descrip-vrt">
                                        <h2 class="title"><a href="/<?= $tour->slug ?>" target="_blank"
                                                             title=""><?= $tour->name ?></a>
                                            <button type="" value="612" class="btn-wish btn-like"></button>
                                        </h2>
                                        <button rel="<?= $tour->id ?>" title="" class="blue link-location"><span
                                                class="ion ion-ios-location-outline"></span> <span class="map-link">Xem bản đồ</span>
                                        </button>
                                        <div class="detail"><p><?= $tour->description_sort ?></p></div>
                                        <ul class="icon-property">
                                            <li class="day_check min-nights"><span
                                                    class="icon"><?= $tour->check_in ?></span><span class="text_tour">Ngày đi</span>
                                            </li>
                                            <li class="day_check min-nights"><span
                                                    class="icon"><?= $tour->check_out ?></span><span class="text_tour">Ngày về</span>
                                            </li>
                                            <?php $socho = $tour->total_residual ?>
                                            <li class="max-guests"><span class="icon"><?= $socho ?></span><span
                                                    class="text_tour">Chỗ còn lại</span></li>
                                            <li class="min-nights"><span
                                                    class="icon"><?= $tour->total_days ?></span><span class="text_tour">Ngày</span>
                                            </li>
                                            <li class="min-nights"><span
                                                    class="icon"><?= $tour->total_nights ?></span><span
                                                    class="text_tour">Đêm</span></li>

                                        </ul>
                                        <div class="group">
                                            <div class="cost"><span class="cost-per-night">Giá chỉ từ</span><span
                                                    class="price"><?= number_format($tour->price) ?> đ</span></div>
                                            <div class="view"><a href="/<?= $tour->slug ?>" title=""
                                                                 target="_blank"
                                                                 class="btn-blue btn-2 ">Chi tiết</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h3>Không có tour nào tìm thấy</h3>
        <?php endif; ?>
    </div>
    <div id="featured" class="text-center">
        <div class="container ">
            <h2 class="head-1">You Might Also Like</h2>
            <div class="slide-featured owl-carousel owl-theme owl-responsive-1024 owl-loaded">


                <div class="owl-stage-outer">
                    <div class="owl-stage"
                         style="width: 6539.99px; transform: translate3d(-1090px, 0px, 0px); transition: 0s;">
                        <div class="owl-item cloned" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/kakara-moana" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Kakara Moana - Living Room_1448010465.jpg" alt="">
                                        <figcaption>Kakara Moana</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/riverview-retreat" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Riverview Retreat - Exterior_1448011009.jpg" alt="">
                                        <figcaption>Riverview Retreat</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/the-dairy-private-hotel" title="">
                                    <figure>
                                        <img src="/uploads/gallery/The Dairy Private Hotel - Exterior_1466311056.jpg"
                                             alt="">
                                        <figcaption>The Dairy Private Hotel</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/blanket-bay" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Blanket Bay - 3_1469001816.jpg" alt="">
                                        <figcaption>Blanket Bay</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/wyuna-house" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Wyuna House - Exterior_1440581221.jpg" alt="">
                                        <figcaption>Wyuna House</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/southerly" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Southerly - Living &amp; Fireplace_1440582610.jpg"
                                             alt="">
                                        <figcaption>Southerly</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/azur-luxury-lodge" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Azur Luxury Lodge - Mountain Views_1440770221.jpg"
                                             alt="">
                                        <figcaption>Azur Luxury Lodge</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/50-aspen-grove" title="">
                                    <figure>
                                        <img src="/uploads/gallery/50 Aspen Grove - Dinner Table_1440583815.jpg" alt="">
                                        <figcaption>50 Aspen Grove</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/amaroo" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Amaroo - Jacuzzi_1448007754.jpg" alt="">
                                        <figcaption>Amaroo</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/bellbrae" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Bellbrae - Exterior_1448008555.jpg" alt="">
                                        <figcaption>Bellbrae</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/esplanade-villa-3" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Esplanade Villa 3 - Bedroom_1449124766.jpg" alt="">
                                        <figcaption>Esplanade Villa 3</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/forty-two" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Forty Two - Dining_1440583305.jpg" alt="">
                                        <figcaption>Forty Two</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/kakara-moana" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Kakara Moana - Living Room_1448010465.jpg" alt="">
                                        <figcaption>Kakara Moana</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/riverview-retreat" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Riverview Retreat - Exterior_1448011009.jpg" alt="">
                                        <figcaption>Riverview Retreat</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/the-dairy-private-hotel" title="">
                                    <figure>
                                        <img src="/uploads/gallery/The Dairy Private Hotel - Exterior_1466311056.jpg"
                                             alt="">
                                        <figcaption>The Dairy Private Hotel</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/blanket-bay" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Blanket Bay - 3_1469001816.jpg" alt="">
                                        <figcaption>Blanket Bay</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/wyuna-house" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Wyuna House - Exterior_1440581221.jpg" alt="">
                                        <figcaption>Wyuna House</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                        <div class="owl-item cloned" style="width: 363.333px; margin-right: 0px;">
                            <div class="item" style="max-height: 400px!important">
                                <a href="http://viewretreats.dev/retreat/southerly" title="">
                                    <figure>
                                        <img src="/uploads/gallery/Southerly - Living &amp; Fireplace_1440582610.jpg"
                                             alt="">
                                        <figcaption>Southerly</figcaption>
                                    </figure>
                                </a>
                                <p>
                                    Queenstown &amp; Otago, South Island, New Zealand
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-controls">
                    <div class="owl-nav">
                        <div class="owl-prev" style=""><i class="ion-ios-arrow-back"></i></div>
                        <div class="owl-next" style=""><i class="ion-ios-arrow-forward"></i></div>
                    </div>
                    <div class="owl-dots" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAmqIdCkNBZlUHNoJH4GgWdMgTZ4p1Tugw"></script>
    <script type="text/javascript" src="<?= baseUrl(); ?>/asset/js/maps.js"></script>

    <!--<script src="<? /*= baseUrl(); */ ?>/asset/js/property.js"></script>-->
    <script type="text/javascript" src="<?= baseUrl(); ?>/asset/js/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#date").datepicker({minDate: 0, dateFormat: 'dd/mm/yy'});
        });
        $(document).ready(function () {
            $(function () {
                $("#check_in").datepicker({
                    dateFormat: "dd-mm-yy",
                    minDate: -0,
                });
            });
        });
    </script>


</div>
<style>
    li.day_check.min-nights span.icon {
        font-size: 16px;
    }

    ul.icon-property li {
        width: 19%;
    }

    span.text_tour {
        font-weight: bolder;
        font-size: 13px !important;
        text-transform: none !important;
        font-family: Open sans-serif !important;
    }
</style>