
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <title>View Retreat - Default</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" href="<?= baseUrlAmin() ?>/asset/css/all.css" type="text/css" />
    <link rel="stylesheet" href="<?= baseUrlAmin() ?>/asset/css/pagination.css" type="text/css" />
    <link rel="stylesheet" href="<?= baseUrlAmin() ?>/asset/css/errors.css" type="text/css" />
    <link rel="stylesheet" href="<?= baseUrlAmin() ?>/asset/css/redactor.css" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script src="<?= baseUrlAmin() ?>/asset/js/functions.js"></script>
    <script src="<?= baseUrlAmin() ?>/asset/js/menu/jquery.nestable.js"></script>
    <script type="text/javascript" src="<?= baseUrlAmin() ?>/asset/js/jquery.yiiactiveform.js"></script>
    <script src="<?= baseUrlAmin() ?>/asset/js/bootstrap.file-input.js"></script>
    <script type="text/javascript" src="<?= baseUrlAmin() ?>/asset/js/jquery.fineuploader-3.4.1.min.js"></script>
   <!-- <script type="text/javascript" src="<?/*= baseUrlAmin() */?>/asset/js/jquery.uniform.js"></script>-->
    <script type="text/javascript" src="<?= baseUrlAmin() ?>/asset/js/redactor.js"></script>
    <script type="text/javascript" src="<?= baseUrlAmin() ?>/asset/js/rte.js"></script>
    <?php $uri = $_SERVER['REQUEST_URI'];
    $uri = explode('/',$uri);
    if(isset($uri[2])){
        $contrller = $uri[2];
        if(empty($contrller) || $contrller ==''){
            $contrller = 'site';
        }
    }
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            var controller = "<?=$contrller?>";
            $('li.nav').each(function () {
                var href = $(this).children('a').attr('href');
                console.log(href);
                if(href.search(controller)>1){
                    $(this).addClass('active');
                }
                ;
            });
        });
    </script>
    <style>
        #header h1 {
             left: 0;
        }
    .icon{
        font-family: Ionicons;
        font-size:24px ;
    }.icon-home:before {
             content: '\f448';
         }
        .icon-user:before {
            content: ' \f39f';
        }

    </style>
</head>
<body>

<div id="wrapper">
    <div id="header">
        <h1>
            <a href='<?=baseUrl()?>' target="_blank"></a>
        </h1>
    </div>

    <div id="topNav">
        <ul>
            <li><a title="Update Profile" href="/admin/profile">Edit Profile</a></li>
            <li><a href='<?=baseUrl()?>' target="_blank">Visit Website</a></li>
            <li><a title="Logout" href="/admin/login/logout">Logout</a></li>
        </ul>
    </div>

    <div id="sidebar">
        <ul id="mainNav">
            <li id="navDashboard" class="nav"><a href="/admin/site/index"><span class=" icon icon-home"></span><span>Dashboard</span></a></li>
            <li id="navMembers" class="nav"><a href="/admin/user"><span class="icon icon-user"></span><span>Members</span></a></li>
            <li id="navProperties" class="nav"><a href="/admin/tours"><span class="icon icon-map-pin-fill"></span><span>Tours</span></a></li>
            <li id="navAmenities" class="nav"><a href="/admin/services"><span class="icon icon-list"></span><span>Services</span></a></li>
            <li id="navPages" class="nav"><a href="/admin/departures"><span class="icon icon-document-alt-stroke"></span><span>Departures</span></a></li>
            <li id="navSurroundings" class="nav"><a href="/admin/categoriestour"><span class="icon icon-list"></span><span>Categories Tour</span></a></li>
            <li id="navPropertycolection" class="nav"><a href="/admin/Propertylocation"><span class="icon icon-chart"></span><span>Menu Collections</span></a></li>
            <li id="navAccommodations" class="nav"><a href="/admin/accommodation"><span class="icon icon-list"></span><span>Accommodations</span></a></li>
            <li id="navCountry" class="nav"><a href="/admin/country"><span class="icon icon-compass"></span><span>Countries</span></a></li>
            <li id="navStates" class="nav"><a href="/admin/state"><span class="icon icon-compass"></span><span>States</span></a></li>
            <li id="navRegions" class="nav"><a href="/admin/region/admin"><span class="icon icon-compass"></span><span>Regions</span></a></li>
            <li id="navMessages" class="nav"><a href="/admin/messages"><span class="icon icon-mail"></span><span>Contacts</span></a></li>
            <li id="navApplyMessages" class="nav"><a href="/admin/apply"><span class="icon icon-mail"></span><span>Apply Messages</span></a></li>
            <li id="navBlog" class="nav"><a target="_blank" href="/blog/admin"><span class="icon icon-compass"></span><span>Blog</span></a></li>
            <li id="navPayments" class="nav"><a href="/admin/payment"><span class="icon icon-compass"></span><span>Payments</span></a></li>
            <li id="navSettings" class="nav"><a href="/admin/settings"><span class="icon icon-wrench"></span><span>Settings</span></a></li>
            <li id="navReports" class="nav"><a href="/admin/reports"><span class="icon icon-document-alt-stroke"></span><span>Reports</span></a></li>
            <li id="navNewsletters" class="nav"><a href="/admin/adminUser"><span class="icon icon-user"></span><span>Admin Users</span></a></li>
            <li id="navAnalytics" class="nav"><a href="/admin/analytic"><span class="icon icon-chart"></span><span>Analytics</span></a></li>
            <li id="navSeo" class="nav"><a href="/admin/seoentity"><span class="icon icon-chart"></span><span>SEO</span></a></li>
            <li id="Groupbanners" class="nav"><a href="/admin/groupbanners"><span class="icon icon-chart"></span><span>Banners</span></a></li>
            <li id="Smartblocks" class="nav"><a href="/admin/slider"><span class="icon icon-chart"></span><span>Featured Retreats</span></a></li>
            <li id="Propertycategorys" class="nav"><a href="/admin/Propertycategorys"><span class="icon icon-chart"></span><span>Browse Collections</span></a></li>
            <li id="EmailTemplates" class="nav"><a href="/admin/emailtemplates"><span class="icon icon-chart"></span><span>Email Templates</span></a></li>
        </ul>
    </div>

    <div id="content">
        <div class="container" style="top: 0px;">
            <div id="contentHeader" style="top: 0px; height: 88px;">
                <h1><?=isset($this->page_name)?$this->page_name:''?></h1>
            </div>
            <div class="grid-24">
                    <?=$content?>

            </div>
        </div>
    </div>
</div>

</body>
</html>
