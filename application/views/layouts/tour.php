<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="<?=baseUrl();?>/asset/css/all.css">

    <script src="<?=baseUrl();?>/asset/js/jquery-2.1.0.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400,400italic,300,600,700,800'
          rel='stylesheet'
          type='text/css'>
    <link rel="shortcut icon" href="/favicon.png">
    <title><?=!empty($this->title)?$this->title:'Travel around Vietnam'?></title>

</head>
<body>
<!-- Google Tag Manager -->
<noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-T6FZ2T"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            '//www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-T6FZ2T');</script>
<!-- End Google Tag Manager -->
<div id="layer">
    <div id="nav-page">

        <?php include_once '_menu.php'?>
    </div><!-- //page navigation -->
    <?php include_once '_slider.php'?>
    <div id="wrapper">
        <header id="header">
            <div class="container">
                <?php include_once '_header.php'?>
            </div>
            <div class="blur"></div>
        </header>
        <!-- //header -->
        <div id="main">
            <?=$content?>
        </div>
        <?php include_once '_footer.php'?>
</body>
</html>
