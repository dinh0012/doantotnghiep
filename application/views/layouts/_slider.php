<?php if(isset($model)): $galaries = json_decode($model->images); ?>
<div id="wrap-top">
    <!--class="wrap-slider-top hide"-->
    <div id="slide-top" class="carousel slide carousel-fade check-slider" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php $i=0; foreach ($galaries as $item): ?>
            <div class="item <?=$i==0?'active':''?>">
                <figure
                    style="background: url(<?=baseUrl()?>/uploads/categoriestour/<?=$model->id?>/<?=$item?>) left center; background-size: cover;">
                </figure>
            </div>
        <?php $i++; endforeach; ?>
            <div class="caption">
                <h2>Travel around Vietnam</h2>
                <h1><?=$model->name?></h1>

            </div>
        </div>
        <a class="carousel-ct prev" href="#slide-top" title="" role="button" data-slide="prev"></a>
        <a class="carousel-ct next" href="#slide-top" title="" role="button" data-slide="next"></a>
    </div>
    <a href="#wrapper" title="" class="arrow-br"><img src="<?=baseUrl();?>/asset/img/arrow-browse.png" alt=""></a>
</div>
<?php endif; ?>