<!doctype html>
<!--[if lt IE 7]>
<html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <script type="text/javascript" src="<?= baseUrlAmin() ?>/asset/js/jquery.js"></script>
    <script type="text/javascript" src="<?= baseUrlAmin() ?>/asset/js/jquery.yiiactiveform.js"></script>
    <title>View Retreat - Login</title>

    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>

    <link rel="stylesheet" href="<?= baseUrlAmin() ?>/asset/css/reset.css" type="text/css" media="screen"
          title="no title"/>
    <link rel="stylesheet" href="<?= baseUrlAmin() ?>/asset/css/buttons.css" type="text/css" media="screen"
          title="no title"/>
    <link rel="stylesheet" href="<?= baseUrlAmin() ?>/asset/css/login.css" type="text/css" media="screen"
          title="no title"/>
    <link rel="stylesheet" href="<?= baseUrlAmin() ?>/asset/css/errors.css" type="text/css" media="screen"
          title="no title"/>
</head>

<body>
<?php echo $content ?>
<script type="text/javascript">
    /*<![CDATA[*/
    jQuery(function ($) {
        jQuery('#login-form').yiiactiveform({
            'validateOnSubmit': true, 'attributes': [{
                'id': 'AdminLogin_email',
                'inputID': 'AdminLogin_email',
                'errorID': 'AdminLogin_email_em_',
                'model': 'AdminLogin',
                'name': 'email',
                'enableAjaxValidation': false,
                'errorCssClass': 'text-error',
                'clientValidation': function (value, messages, attribute) {

                    if (jQuery.trim(value) == '') {
                        messages.push("Email cannot be blank.");
                    }


                    if (jQuery.trim(value) != '' && !value.match(/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/)) {
                        messages.push("Email is not a valid email address.");
                    }

                }
            }, {
                'id': 'AdminLogin_password',
                'inputID': 'AdminLogin_password',
                'errorID': 'AdminLogin_password_em_',
                'model': 'AdminLogin',
                'name': 'password',
                'enableAjaxValidation': false,
                'errorCssClass': 'text-error',
                'clientValidation': function (value, messages, attribute) {

                    if (jQuery.trim(value) == '') {
                        messages.push("Password cannot be blank.");
                    }

                }
            }], 'errorCss': 'error'
        });
    });
    /*]]>*/
</script>
</body>
</html>