<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="<?= baseUrl(); ?>/asset/css/all.css">

    <script src="<?= baseUrl(); ?>/asset/js/jquery-2.1.0.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400,400italic,300,600,700,800'
          rel='stylesheet'
          type='text/css'>
    <link rel="shortcut icon" href="/favicon.png">
    <title><?= !empty($this->title) ? $this->title : 'Travel around Vietnam' ?></title>

</head>
<body>

<div id="layer">
    <div id="nav-page">

        <?php include_once '_menu.php' ?>
    </div><!-- //page navigation -->
    <div id="wrap-top" style="max-height: 384px;">
        <!--class="wrap-slider-top hide"-->
        <div id="slide-top" class="carousel slide carousel-fade check-slider" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item">
                    <figure
                        style="background: url(&quot;http://viewretreats.dev/uploads/banners/20/thumb2/1471266611_20_Scrubby_Bay,_Canterbury,_NZ.jpg&quot;) center center / cover; height: 384px;">
                        <div class="caption_link" style="display: block;">
                            <a href="/retreat/scrubby-bay">Scrubby Bay, South Island NZ&nbsp;&gt;&gt;</a>
                        </div>
                    </figure>
                </div>
                <div class="item active">
                    <figure
                        style="background: url(&quot;http://viewretreats.dev/uploads/banners/24/thumb2/1471266629_24_qualia_-_Whitsundays,_QLD.jpg&quot;) center center / cover; height: 384px;">
                        <div class="caption_link" style="display: block;">
                            <a href="/retreat/qualia">Qualia, QLD Australia&nbsp;&gt;&gt;</a>
                        </div>
                    </figure>
                </div>
                <div class="item ">
                    <figure
                        style="background: url(&quot;http://viewretreats.dev/uploads/banners/25/thumb2/1471266672_25_Beachfront_Luxury_-_Palm_Beach,_NSW_.jpg&quot;) center center / cover; height: 384px;">
                        <div class="caption_link" style="display: block;">
                            <a href="/retreat/beachfront-luxury">Beachfront Luxury, NSW Australia&nbsp;&gt;&gt;</a>
                        </div>
                    </figure>
                </div>
                <div class="item ">
                    <figure
                        style="background: url(&quot;http://viewretreats.dev/uploads/banners/26/thumb2/1471266712_26_Blanket_Bay_-_Otago,_NZ.jpg&quot;) center center / cover; height: 384px;">
                        <div class="caption_link" style="display: block;">
                            <a href="/retreat/blanket-bay">Blanket Bay, South Island NZ&nbsp;&gt;&gt;</a>
                        </div>
                    </figure>
                </div>
                <div class="item ">
                    <figure
                        style="background: url(&quot;http://viewretreats.dev/uploads/banners/50/thumb2/1471266758_50_True_North_-_Kimberley,_WA.jpg&quot;) center center / cover; height: 384px;">
                        <div class="caption_link" style="display: block;">
                            <a href="/retreat/true-north">True North, WA Australia&nbsp;&gt;&gt;</a>
                        </div>
                    </figure>
                </div>
                <div class="caption">
                    <h2>Travel Around Vietnam</h2>
                    <h1>Boutique Getaways</h1>

                </div>
                <div class="search-box container">
                    <form class="form validateForm" autocomplete="off" id="search-form" action="<?= baseUrl() ?>/search"
                          method="GET">
                        <div class="row">
                            <div class="col-xs-6 col-sm-2">
                                <div class="column">
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
                                    <div class="select-rv input">
                                        <select class="form-control" rel="locations" name="search-form[category]"
                                                id="search-form_locations">
                                            <option style="color:#0B0A0A" value="">Địa điểm</option>
                                            <?php \application\models\Tours::optionCats(isset($_GET['category']) ? $_GET['category'] : $model->id) ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-2">
                                <div class="column">
                                    <div class="select-rv input">
                                        <input type="" id="check_in" name="search-form[check_in]" value=""
                                               class="form-control" placeholder="Ngày khởi hành">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-2">
                                <div class="column">

                                    <div class="select-rv input">
                                        <select class="form-control" rel="night" name="search-form[total_person]"
                                                id="search-form_nights">
                                            <option value="">Số người</option>
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
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-2">
                                <div class="column">

                                    <div class="select-rv input">
                                        <select class="form-control" rel="night" name="search-form[total_days]"
                                                id="search-form_nights">
                                            <option value="0">Số ngày</option>
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
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-2">
                                <div class="column">
                                    <div class="select-rv input">
                                        <select class="form-control" rel="adults" name="search-form[price]"
                                                id="search-form_adults">
                                            <option value="">Giá</option>
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
                        <input type="hidden" name="<?=\vendor\security\Csrf::$_csrf_token_name?>" value="<?=\vendor\security\Csrf::_creatToken()?>">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 btn-search">
                                <div class="column">
                                    <button type="submit" class="button-search">Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <a class="carousel-ct prev" href="#slide-top" title="" role="button" data-slide="prev"></a>
                <a class="carousel-ct next" href="#slide-top" title="" role="button" data-slide="next"></a>
            </div>
            <a href="#wrapper" title="" class="arrow-br"><img src="/asset/img/arrow-browse.png" alt=""></a>
        </div>
        <div id="wrapper">
            <header id="header">
                <div class="container">
                    <?php include_once '_header.php' ?>
                </div>
                <div class="blur"></div>
            </header>
            <!-- //header -->
            <div id="main">

            </div>
            <?php include_once '_footer.php' ?>
            <style>
                .search-box.container {
                    position: absolute;
                    top: 57.4%;
                    /* width: 44%; */
                    margin-left: 5%;
                }

                button.button-search {
                    right: 15px;
                }

                button.button-search {
                    width: 145px;
                }

                .ui-datepicker {
                    z-index: 199 !important;
                }
                .search-box.container
                .select-rv {
                    border: 6px solid rgba(0, 0, 0, .300);
                    -webkit-background-clip: padding-box;
                    background-clip: padding-box;
                }
            </style>
            <script>
                $(document).ready(function () {
                    $(function () {
                        $("#check_in").datepicker({
                            dateFormat: "dd-mm-yy",
                            minDate: -0,
                        });
                    });
                });
            </script>
</body>
</html>
