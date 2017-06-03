<header id="navBar" class="mobile">
    <button type="" id="close-nav"><i class="ion-close-round"></i></button>
    <div class="container">
        <div class="barHead">
            <figure class="logo">
                <a href="http://viewretreats.dev" title="">
                    <span class="pic"><img src="<?=baseUrl();?>/asset/img/logo2b.png" alt=""></span>
                </a>
            </figure>
            <div class="rightHead">
                <ul class="accout-box hidden-xs">
                    <li>
                        <a href="http://viewretreats.dev/member/wishlist" title=""><span
                                class="btn-heart hide"></span></a>
                    </li>
                    <li class="wishlis-li hide">
                        |
                    </li>
                    <li>
                        <a href="http://viewretreats.dev/member/wishlist" title="" class="profile ">Profile</a>
                    </li>
                    <li class="profile ">
                        |
                    </li>
                    <li><a href="http://viewretreats.dev/users/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<div id="nav-main">
    <div class="box-nav">

        <ul class="mtree transit nav-link-menu">
            <li id="checkout_mobi" class="block-item"></li>
            <!--<li><a href="http://viewretreats.dev/search" title="">Search<span></span></a></li>-->
            <li class="sub-nav mtree-node mtree-closed"><a href="#location" data-toggle="tab" title="">TOUR<span></span></a>
                <ul>
                    <?php
                    $tour_cat = \application\models\CategoriesTour::getListCat();
                    foreach ($tour_cat as $cat):
                        ?>
                        <li>
                            <a href="<?=baseUrl()?>/<?=$cat['slug']?>"><?=$cat['name']?></a>
                            <?php if(isset($cat['chidrent'])): ?>
                                <ul>
                                    <?php
                                    foreach ($cat['chidrent'] as $chid):
                                        ?>
                                        <li class="sub-nav-2"><a
                                                href="<?=baseUrl()?>/<?=$chid['slug']?>"
                                                title=""><?=$chid['name']?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

            <li class="sub-nav"><a href="/tour-trong-nuoc">Du lịch trong nước</a></li>
            <li class='sub-nav'><a href="/tour-nuoc-ngoai">Du lịch nước ngoài<span
                        class="btn-heart hide "></span></a></li>
            <li class="sub-nav"><a href="/khuyen-mai">Khuyến mại</a></li>
            <li class="sub-nav"><a href="http://viewretreats.dev/contact">Liên hệ</a></li>
        </ul>
        <script type="text/javascript">
            $(document).ready(function () {
                $("body #nav-main .box-nav .sub-nav span").click(function () {
                    $("ul.mtree-level-2").css('display', 'block');
                    $("ul.mtree-level-2").css('height', 'auto');
                })
            });
        </script>

    </div>

</div>