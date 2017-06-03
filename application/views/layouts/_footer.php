
<!-- //main -->
<footer id="footer">
    <div class="container">
        <div class="content-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xs-6 col-sm-4">
                            <div class="col"><h4 class="title">Liên kết</h4>
                                <ul class="menu-fter">
                                    <li><a href="/search" title="Search">Tìm kiếm</a>
                                    </li>
                                    <li>
                                        <a href="/tour-trong-nuoc"
                                           title="">Du lịch trong nước</a></li>
                                    <li><a href="/tour-nuoc-ngoai"
                                           title="">Du lịch nước ngoài</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="col"><h4 class="title">Xem thêm</h4>
                                <ul class="menu-fter">
                                    <li><a href="/about" title="">About
                                            Us</a></li>
                                    <li><a href="/lien-he" title="">Liên hệ</a></li>
                                    <li><a href="/tin-tuc" title="">Tin tức</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <div class="col"><h4 class="title">Join
                                    us</h4>
                                <ul class="social-us">
                                    <li><a href="https://www.facebook.com/TravelaroundVietnam" title=""><i
                                                class="ion ion-social-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/TravelaroundVietnam" title=""><i
                                                class="ion ion-social-twitter"></i></a></li>
                                    <li><a href=" https://plus.google.com/+TravelaroundVietnam" title=""><i
                                                class="ion ion-social-googleplus"></i></a></li>
                                    <li><a href="https://instagram.com/TravelaroundVietnam" title=""><i
                                                class="ion ion-social-instagram"></i></a></li>
                                    <li><a href="https://www.pinterest.com/TravelaroundVietnam/" title=""><i
                                                class="ion ion-social-pinterest-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="copyright">© TravelaroundVietnam. 2017 . 0949 751 594</p>
    <script type="text/javascript" src="<?=baseUrl();?>/asset/js/library.js"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/59198bed64f23d19a89b22b6/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <script type="text/javascript" src="<?=baseUrl();?>/asset/js/owl.carousel.js"></script>
    <script type="text/javascript" src="<?=baseUrl();?>/asset/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=baseUrl();?>/asset/js/jquery.velocity.min.js"></script>
    <script type="text/javascript" src="<?=baseUrl();?>/asset/js/mtree.js"></script>
    <script type="text/javascript" src="<?=baseUrl();?>/asset/js/select2.full.js"></script>
    <script type="text/javascript" src="<?=baseUrl();?>/asset/js/search_home.js"></script>
    <script type="text/javascript" src="<?=baseUrl();?>/asset/js/main.js"></script>

    <script
        type="text/javascript"
        src="<?=baseUrl();?>/asset/js/slider.js"></script>
</footer>
<!-- //footer -->
</div>
<div id="social-right">
    <ul>
        <li><a href="javascript:void(Tawk_API.toggle())" title=""><i class="ion-chatbubble-working"></i></a></li>
        <li><a data-target="#sendenquiryform" data-toggle="modal" id="send_email" title=""><i
                    class="ion ion-android-mail"></i></a></li>
        <li><a href="https://www.facebook.com/TravelaroundVietnam" target="_blank"><i class="ion ion-social-facebook"></i>
            </a></li>
        <li id='go_top'><a class=" icon_top ion-arrow-up-c"></a><span class="txt_top">TOP</span></li>
    </ul>

    <!--<li> <a href="https://plus.google.com/share?url=" target="_blank" title=""><i class="ion ion-social-googleplus"></i></a> </li>-->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#go_top").click(function () {
                $("html, body").animate({scrollTop: 0}, "slow");
                return false;
            });
//Scroll button show top
            var lastScrollTop = 0;
            var wmobile = $(window).width();
            $(window).scroll(function (event) {
                var st = $(this).scrollTop();
                if (wmobile < 640) {
                    if (st > lastScrollTop) {
                        $("#social-right").css("bottom", "-100px");
                    } else {
                        $("#social-right").css("bottom", "0");
                        $("#social-right").css("transition", "0.5s");
                    }

                    lastScrollTop = st;
                    if (st < 570) {
                        $("#social-right").css("bottom", "-100px");
                    }
                }
                if (wmobile > 767) {
                    $('#go_top').show(200);
                    if ($(this).scrollTop() > 1000) {

                        $('#social-right').show();
                    } else {
                        $('#social-right').hide();
                    }
                }
            });


        });
    </script>
</div>
<a href="#layer" id="iTop" class="ion-arrow-up-c" title=""></a>
</div>
</div>


<div class="modal fade modal-rv" id=signupModal aria-hidden=false data-backdrop=static>
    <div class=modal-dialog>
        <div class=box-modal>
            <div class=form-retreat>
                <button type=button id=close-mdl-register class=close-mdl data-dismiss=modal aria-label=Close><span
                        class=ion-android-close></span></button>
                <div id=success-sigin-up-alert><input type=hidden class="login-email-sigup"> <input type=hidden
                                                                                                    class="login-pass-sigup">

                    <div class=content-mdl>
                        <div class=form-group>
                            <div class=success-label role=alert><h3><b>Thanks for signing up</b></h3><br><h5>You can now
                                    save your favourite View Retreats properties to your very own wishlist - perfect if
                                    you’re planning a special occasion. If you need any help with your planning, please
                                    get in touch with one of our Getaway Specialists.</h5></div>
                        </div>
                    </div>
                </div>
                <div id=form-alert>
                    <hgroup class=head-mdl><h3>Sign Up</h3><h5>Sign up to receive updates, exclusive offers and to
                            manage your wishlist.</h5></hgroup>
                    <div class=content-mdl>
                        <div class=form-group><input id=sign-up-first-name class=form-control placeholder="First name">

                            <p id=first-name-sign-up-error style=margin-top:10px></p></div>
                        <div class=form-group><input id=sign-up-last-name class=form-control placeholder="Last name">

                            <p id=last-name-name-sign-up-error style=margin-top:10px></p></div>
                        <div class=form-group><input id=sign-up-email type=email class=form-control placeholder=Email>

                            <p id=email-sign-up-error style=margin-top:10px></p></div>
                        <div class=form-group><input id=sign-up-pass type=password class=form-control
                                                     placeholder=Password>

                            <p id=password-sign-up-error style=margin-top:10px></p></div>
                        <div class=form-group><input id=sign-up-confirm-pass type=password class=form-control
                                                     placeholder="Confirm Password">

                            <p id=confirm-password-sign-up-error style=margin-top:10px></p></div>
                        <div class=form-group><label class=text-check><span id=checkbox-vr-checked-sign-up
                                                                            class="checkbox-vr ion-checkmark-round"><input
                                        id=sign-up-reciever-updated type=checkbox value=1></span> <span>Receive updates from View Retreats?</span></label>
                        </div>
                        <div class=form-group>
                            <div class=sign-loading><img class=loading_loading id=loading
                                                         src="<?=baseUrl();?>/asset/img/loading.gif"
                                                         style="display:none"></div>
                        </div>
                        <div class=form-group>
                            <button id=signup-hompage type=submit class="btn-blue btn-2">Sign up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-rv" id=loginModal aria-hidden=false data-backdrop=static>
    <div class=modal-dialog>
        <div class=box-modal>
            <div class=form-retreat id=form-retreat-login>
                <button type=button id=close-mdl-login class=close-mdl data-dismiss=modal aria-label=Close><span
                        class=ion-android-close></span></button>
                <hgroup class=head-mdl><h3>Log In</h3></hgroup>
                <div class=content-mdl>
                    <div class=form-group><input id=email-login-form type=email class=form-control placeholder=Email>

                        <p style=margin-top:10px id=email-login-error></p></div>
                    <div class=form-group><input id=pass-login-form type=password class=form-control
                                                 placeholder=Password>

                        <p style=margin-top:10px id=pass-login-error></p></div>
                    <div class=form-group><label class=text-check><span id=checkbox-vr-checked-login
                                                                        class="checkbox-vr ion-checkmark-round"><input
                                    id=remember-login value=1 type=checkbox></span> <span>Remember me</span></label>
                    </div>
                    <div class=form-group>
                        <button id=login type=submit class="btn-blue btn-2">Login</button>
                        <a href=#forgot class=forgot-pw id=click-forgot>Forgotten Password?</a></div>
                </div>
            </div>
            <div class=form-retreat id=form-retreat-forgot>
                <button type=button id=close-mdl-forgot class=close-mdl data-dismiss=modal aria-label=Close><span
                        class=ion-android-close></span></button>
                <div class=success-false>
                    <hgroup class=head-mdl><h3>Forgot Password</h3><h5>Your new password will be sent to your registered
                            email address.</h5></hgroup>
                    <div class=content-mdl>
                        <div class=form-group><input id=email-forgot-form type=email class=form-control
                                                     placeholder=Email>

                            <p style=margin-top:10px id=email-forgot-error></p></div>
                        <div class=form-group><img class=loading
                                                   src="<?=baseUrl();?>/asset/img/loading.gif">
                        </div>
                        <div class=form-group>
                            <button id=forgot-password type=submit class="btn-blue btn-2">Submit</button>
                        </div>
                    </div>
                </div>
                <div class=success-sigin-up-alert>
                    <div class=content-mdl>
                        <div class=form-group>
                            <div class=success-label role=alert><h3><b>Thank You</b></h3><h5>New password request
                                    successful. Please check your email.</h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-profile" id=profileModal aria-hidden=false>
    <div class=modal-dialog>
        <div class=box-modal>
            <div class=form-retreat>
                <hgroup class=head-mdl><h3>Edit profile details</h3></hgroup>
                <div class="content-mdl form-profile">
                    <div class=form-group>
                        <div class=row>
                            <div class=col-sm-5><label class=text>First name:</label></div>
                            <div class=col-sm-7><input class=form-control placeholder="First name"></div>
                        </div>
                    </div>
                    <div class=form-group>
                        <div class=row>
                            <div class=col-sm-5><label class=text>Last name:</label></div>
                            <div class=col-sm-7><input class=form-control placeholder="Last name"></div>
                        </div>
                    </div>
                    <div class=form-group>
                        <div class=row>
                            <div class=col-sm-5><label class=text>Email:</label></div>
                            <div class=col-sm-7><input type=email class=form-control placeholder=Email></div>
                        </div>
                    </div>
                    <div class=form-group>
                        <div class=row>
                            <div class=col-sm-5><label class=text>Password:</label></div>
                            <div class=col-sm-7><input type=password class=form-control placeholder=Password></div>
                        </div>
                    </div>
                    <div class=form-group>
                        <div class=row>
                            <div class=col-sm-5><label class=text>Confirm Password:</label></div>
                            <div class=col-sm-7><input type=password class=form-control placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <div class=form-group>
                        <div class=row>
                            <div class="col-sm-5 hidden-xs"><label class=text></label></div>
                            <div class=col-sm-7>
                                <button type=submit class="btn-blue btn-2">save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id=sendfriendModal aria-hidden=false>
    <div class=modal-dialog>
        <div class=box-modal>
            <div class=form-retreat>
                <button type=button class=close-mdl data-dismiss=modal aria-label=Close><span
                        class=ion-android-close></span></button>
                <hgroup class=head-mdl><h3>SEND THIS PAGE TO A FRIEND</h3></hgroup>
                <form id=send-friend-form method=post name=send-friend-form action=#>
                    <div class=content-mdl>
                        <div class=form-group><input id=send-friend-email name=send-friend-email type=email
                                                     class=form-control placeholder="Your Friends Email">

                            <p style=margin-top:10px id=err_email></p></div>
                        <div class=form-group><input id=send-your-email name=send-friend-email type=email
                                                     class=form-control placeholder="Your Email">

                            <p style=margin-top:10px id=err_email_></p></div>
                        <div class=form-group><textarea id=send-friend-content class=form-control rows=5 cols=""
                                                        placeholder=Message></textarea></div>
                        <input type=hidden id=send-prop-url
                               value="http://TravelaroundVietnam.dev/">

                        <div class=form-group>
                            <button id=btn-send-friend type=button class="btn-blue btn-2">Send</button>
                            <img class=loading_handle src="<?=baseUrl();?>/asset/img/loading.gif"
                                 style="display:none"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-rv" id=sendenquiryform aria-hidden=false data-backdrop=static>
    <div class=modal-dialog>
        <div class=box-modal>
            <div class=form-retreat>
                <button type=button id=close-mdl-login class=close-mdl data-dismiss=modal aria-label=Close><span
                        class=ion-android-close></span></button>
                <hgroup class=head-mdl><h3>Booking Enquiry</h3></hgroup>
                <div class=content-mdl>
                    <div class=form-group>
                        <div class="enquiry-form enquiry-form-left">
                            <input id=first-name-enquiry type=text class="form-control" placeholder="First Name *">

                            <p style=margin-top:10px id=first-name-enquiry-error class=error-enquiry>First Name cannot
                                be blank.</p>
                        </div>
                        <div class="enquiry-form">
                            <input id=last-name-enquiry type=text class=form-control placeholder="Last Name *">

                            <p style=margin-top:10px id=last-name-enquiry-error class=error-enquiry>Last Name cannot be
                                blank</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <input id=email-enquiry type=email class=form-control placeholder="Email *">

                        <p style=margin-top:10px id=email-enquiry-error class=error-enquiry>Email cannot be blank</p>

                        <p style=margin-top:10px id=email-enquiry-error-type class=error-enquiry>Email is not a valid
                            email address.</p>
                    </div>
                    <div class=form-group>
                        <div class="enquiry-form enquiry-form-left">
                            <input id=adults-enquiry type=text class=form-control placeholder="Adults">

                            <p style=margin-top:10px id=adults-enquiry-error class=error-enquiry>Adults cannot be
                                blank</p>
                        </div>
                        <div class="enquiry-form">
                            <input id=children-enquiry type=text class=form-control placeholder="Children">

                            <p style=margin-top:10px id=children-enquiry-error class=error-enquiry>Children cannot be
                                blank</p>
                        </div>
                    </div>
                    <div class=form-group>
                        <div class="enquiry-form enquiry-form-left">
                            <input class="form-control" style="background-color: #FFF;" placeholder="Check-In"
                                   readonly="readonly" tabindex="4" id="MessageContactUs_check_in"
                                   name="MessageContactUs[check_in]" type="text"/>
                            <p style=margin-top:10px id=check-in-enquiry-error class=error-enquiry>Check In cannot be
                                blank</p>
                        </div>

                        <div class="enquiry-form">
                            <input class="form-control" placeholder="Check-Out" style="background-color: #FFF;"
                                   disabled="disabled" readonly="readonly" tabindex="5" id="MessageContactUs_check_out"
                                   name="MessageContactUs[check_out]" type="text"/>
                            <p style=margin-top:10px id=check-out-enquiry-error class=error-enquiry>Check Out cannot be
                                blank</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea id=message-enquiry class="form-control" placeholder="Message *" rows="4"></textarea>

                        <p style=margin-top:10px id=mesage-enquiry-error class=error-enquiry>Message cannot be blank</p>
                    </div>
                    <div class="form-group pull-right">
                        <label class=text-check><span id=checkbox-vr-checked-login
                                                      class="checkbox-vr ion-checkmark-round"><input
                                    id=ytContactForm_reciever_updated value=1 type=checkbox></span> <span>Receive updates from View Retreats
                                    </span></label>
                    </div>
                    <div class=form-group>
                        <button id=submit-enquiry-form type=submit class="btn-blue btn-2">ENQUIRE</button>
                        <img class=loading_handle src="<?=baseUrl();?>/asset/img/loading.gif"
                             style="display:none"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-rv" id=success-enquiry aria-hidden=false data-backdrop=static>
    <div class=modal-dialog>
        <div class=box-modal>
            <div class=form-retreat>
                <button type=button id=close-mdl-login class=close-mdl data-dismiss=modal aria-label=Close><span
                        class=ion-android-close></span></button>
                <div class=content-mdl>
                    <h3>Thank you for contacting us</h3>

                    <p>We will respond to you as soon as possible.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#wrapper').attr('style', 'padding-top: 0');
    $(document).ready(function () {
        //custom img slide property
        $(".slide-featured").owlCarousel({
            items: 3,
            loop: true,
            nav: true,
            dots: false,
            responsiveClass: true,
            navText: [
                "<i class='ion-ios-arrow-back'></i>",
                "<i class='ion-ios-arrow-forward'></i>"
            ],
            responsive: {
                0: {
                    items: 1
                },

                678: {
                    items: 2
                },

                960: {
                    items: 2
                },

                1024: {
                    items: 3
                }
            }
        });
    });

</script>
<script type="text/javascript" src="<?=baseUrl();?>/asset/js/jquery-ui.js"></script>
<script type="text/javascript">
    /*<![CDATA[*/
    jQuery(function ($) {
        jQuery('#MessageContactUs_check_in').datepicker({
            'dateFormat': 'dd/mm/yy',
            'datepickerOptions': {'changeMonth': true, 'changeYear': true},
            'minDate': 0,
            'onSelect': function (dateText, inst) {
                check_in = $('#MessageContactUs_check_in').val();
                if (check_in != '') {
                    $('#MessageContactUs_check_out').datepicker('option', 'minDate', check_in);
                    $('#MessageContactUs_check_out').removeAttr('disabled');

                }

            }
        });
        jQuery('#MessageContactUs_check_out').datepicker({
            'dateFormat': 'dd/mm/yy',
            'style': 'background-color: #FFF;',
            'minDate': '',
            'onSelect': function (dateText, inst) {
            },
            'datepickerOptions': {'changeMonth': true, 'changeYear': true}
        });
    });
</script>