<div class="barHead">
    <figure class="logo">
        <a href="/" title=""> <span class="pic"> <img class="logo2"
                                                      src="<?=baseUrl();?>/asset/img/logo2.png"
                                                      alt=""> </span> </a>
    </figure>
    <div class="rightHead">
        <!-- <ul class="accout-box">-->
        <!--<ul class="accout-box">-->

        <li class="checkoutButton hide-item">
            <div id="itemCard" class="itemCard cart_val">

            </div>
        </li>
        <ul class="link-menu">
            <li class="sub-nav"><a href="#" title="">Tour du lịch</a>
                <ul class="drop-nav">
                    <?php
                    $tour_cat = \application\models\CategoriesTour::getListCat();
                    foreach ($tour_cat as $cat):
                        ?>
                        <li class="sub-nav-1"><a
                                href="<?=baseUrl()?>/<?=$cat['slug']?>"><?=$cat['name']?></a>
                            <?php if(isset($cat['chidrent'])): ?>
                                <ul>
                                    <?php
                                    foreach ($cat['chidrent'] as $chid):
                                        ?>
                                        <li class="sub-nav-2"><a
                                                href="<?=baseUrl()?>/<?=$chid['slug']?>" title=""><?=$chid['name']?></a>

                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li class="sub-nav"><a href="/tour-trong-nuoc">Du lịch trong nước</a></li>
            <li class='sub-nav'><a href="/tour-nuoc-ngoai">Du lịch nước ngoài<span
                        class="btn-heart hide "></span></a></li>
            <li class="sub-nav"><a href="/khuyen-mai">Khuyến mại</a></li>
            <li class="sub-nav"><a href="http://viewretreats.dev/contact">Liên hệ</a></li>
        </ul>
        <ul class="head-ion">
            <li>
                <div class="search-wrap">
                    <a href="#" title="" class="search-link ion-ios-search icon-search-home"></a>
                    <div id="search2">
                        <select class="js-search js-states ion-ios-search"></select>
                        </div>
                </div>
                <style>
                    .ion-ios-search:before {
                        content: "\f4a5"
                    }
                </style>
            </li>
            <li>
                <button href="" title="" class="nav-toggle" style="position: relative;">
                    <div class="checkout-icon"></div>
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span>
                </button>
            </li>
        </ul>
    </div>
</div>