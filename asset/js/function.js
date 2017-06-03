$(document).ready(function() {
        function e() {
            setTimeout(function() {
                $(".loading_handle").hide(), $("#err_email").show()
            }, 500)
        }

        function r(e) {
            var r = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return r.test(e)
        }

        function i() {
            $("#email-login-error").text(""), $("#pass-login-error").text(""), $("#email-login-form").val(""), $("#pass-login-form").val(""), $("#checkbox-vr-checked-login").removeAttr("class"), $("#checkbox-vr-checked-login").addClass("checkbox-vr ion-checkmark-round"), $("#first-name-sign-up-error").text(""), $("#last-name-name-sign-up-error").text(""), $("#email-sign-up-error").text(""), $("#password-sign-up-error").text(""), $("#confirm-password-sign-up-error").text(""), $("#sign-up-first-name").val(""), $("#sign-up-last-name").val(""), $("#sign-up-email").val(""), $("#sign-up-pass").val(""), $("#sign-up-confirm-pass").val(""), $("#checkbox-vr-checked-sign-up").removeAttr("class"), $("#checkbox-vr-checked-sign-up").addClass("checkbox-vr ion-checkmark-round"), $("#edit-profile-confirm-password").val(""), $("#edit-profile-password").val(""), $("#password-edit-profile-error").val(""), $("#first-name-edit-profile-error").text(""), $("#last-name-edit-profile-error").text(""), $("#email-edit-profile-error").text(""), $("#password-edit-profile-error").text(""), $("#confirm-password-edit-profile-error").text(""), $("#loading").hide(), $("#loading-edit-profile").hide(), $("#form-retreat-forgot").hide(), $("#form-retreat-login").show(), $("#edit-profile-iput").val(0), $("#email-forgot-error").text(""), $("#email-forgot-form").val(""), $(".loading").hide(), $(".success-sigin-up-alert").hide(), $("#ContactForm_check_in_em_").attr("style", "display:none"), $("#ContactForm_check_in").val(""), $("#ContactForm_check_out_em_").attr("style", "display:none"), $("#ContactForm_check_out").val(""), $("#ContactForm_guests_em_").attr("style", "display:none"), $("#ContactForm_guests").val(""), $("#ContactForm_message_em_").attr("style", "display:none"), $("#ContactForm_message").val(""), $("#contact-wishlist-alert").hide(), $("#contact-wishlist").show(), $("#edit-profile-success").hide(), $("#submit-enquire-wishlist").show(), $("#error-check-in").text(""), $("#error-check-out").text(""), $("#error-message").text(""), $("#error-guests").text("")
        }
        $(".availability").click(function(e) {
            e.preventDefault(), $(".availability").attr("href", "#book-spy-url");
            var r = $(".availability"),
                i = $(r.attr("href")).offset().top - $(".fixed #header").height() - $(".light-menu").outerHeight(!0);
            $("html, body").animate({
                scrollTop: i
            }, 600)
        }), $(".link-location").click(function(e) {
            e.preventDefault(), $(".link-location").attr("href", "#map-spy");
            var r = $(".link-location"),
                i = $(r.attr("href")).offset().top - $(".fixed #header").height() - $(".light-menu").outerHeight(!0);
            $("html, body").animate({
                scrollTop: i
            }, 600)
        }), $("#send_email_friend").click(function() {
            var e = $("#sendfriendModal");
            e.modal("show")
        }), $("#btn-enquiry-form").click(function() {
            var e = $("#fullname").val(),
                i = $("#name_pro").val(),
                a = $("#email").val(),
                o = $("#phone").val(),
                t = $("#message").val(),
                s = $("#date").val(),
                l = $("#enquiry-form_nights").val(),
                n = $("#enquiry-form_adults").val(),
                c = $("#enquiry-form_childrens").val(),
                d = $("#enquiry-form_infants").val(),
                u = $("#enquiry-form_reciever_updated").val();
            if ("" == e) $("#err_fullname").html("Please input the full name.");
            else if ("" == a) $("#err_fullname").html(""), $("#err_email").html("Please input the Email.");
            else if (r(a))
                if ("" == s) $("#err_fullname").html(""), $("#err_email").html(""), $("#err_date").html("Please input date.");
                else {
                    $("#err_fullname").html(""), $("#err_email").html(""), $("#err_date").html("");
                    var m = {
                        fullname: e,
                        email: a,
                        phone: o,
                        message: t,
                        date: s,
                        nights: l,
                        adults: n,
                        childrens: c,
                        infants: d,
                        nam_pro: i,
                        recieverupdated: u
                    };
                    $.ajax({
                        url: "/property/sendenquiry",
                        type: "post",
                        data: m,
                        dataType: "json",
                        beforeSend: function() {
                            $(".loading_handle").show()
                        },
                        success: function(e) {
                            return "ERRORS" == e.status ? (alert("Sorry system errors!"), !1) : (alert(e.message), $("#fullname, #email, #phone,#date,#message").val(""), $(".loading_handle").hide(), !1)
                        }
                    })
                } else $("#err_fullname").html(""), $("#err_email").html("Email is not a valid email address. ")
        }), $("#btn-send-friend").click(function(i) {
            i.preventDefault(), $(".loading_handle").show(), $("#err_email").hide();
            var a = $("#send-friend-email").val(),
                o = $("#send-your-email").val(),
                t = $("#send-friend-content").val(),
                s = $("#send-prop-url").val();
            if ("" == a) e(), $("#err_email").html("Please input the Email.");
            else if (r(a))
                if ("" == o) e(), $("#err_email_").html("Please input the Email.");
                else if (r(o)) {
                $("#err_email").html("");
                var l = {
                    email: a,
                    your_email: o,
                    content: t,
                    pro_url: s
                };
                $.ajax({
                    url: "/property/sendtofriend",
                    type: "post",
                    data: l,
                    dataType: "json",
                    beforeSend: function() {
                        $(".loading_handle").show()
                    },
                    success: function(e) {
                        alert(e.message), $("#send-friend-email, #send-your-email, #send-friend-content").val(""), $(".loading_handle").hide(), $("#sendfriendModal").modal("hide")
                    }
                })
            } else e(), $("#err_email_").html("Email is not a valid email address. ");
            else e(), $("#err_email").html("Email is not a valid email address. ")
        }), $("#sendenquiryformmodal").on('click', function () {
            $('.error-enquiry').attr('style', 'display:none');
            $('.success_popup_enquiry').attr('style', 'display:none');

        }),$("#send_email").on('click', function () {
            $('.error-enquiry').attr('style', 'display:none');
            $('.success_popup_enquiry').attr('style', 'display:none');
        }),
            $("#submit-enquiry-form").on('click', function () {
                $('.error-enquiry').attr('style', 'display:none');
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var f = $('#first-name-enquiry').val();
                var l = $('#last-name-enquiry').val();
                var e = $('#email-enquiry').val();
                var a = $('#adults-enquiry').val();
                var c = $('#children-enquiry').val();
                var i = $('#MessageContactUs_check_in').val();
                var o = $('#MessageContactUs_check_out').val();
                var m = $('#message-enquiry').val();
                var url = window.location.href;

                var u = null;

                if ($("#sendenquiryform .checker").length) {
                    u = $('#ytContactForm_reciever_updated').val();
                }
                var check = true;
                if (f == '') {
                    $('#first-name-enquiry-error').attr('style', 'display:block');
                    check = false;
                }
                if (l == '') {
                    $('#last-name-enquiry-error').attr('style', 'display:block');
                    check = false;
                }
                if (e == '') {
                    $('#email-enquiry-error').attr('style', 'display:block');
                    check = false;
                }else{
                    if(!regex.test(e)){
                        $('#email-enquiry-error-type').attr('style', 'display:block');
                        check = false;
                    }
                }
                if (m == '') {
                    $('#mesage-enquiry-error').attr('style', 'display:block');
                    check = false;
                }
                if (check) {
                    var me = {
                        first_name: f,
                        last_name: l,
                        email: e,
                        adults: a,
                        children: c,
                        message: m,
                        check_in: i,
                        check_out: o,
                        reciever_updated: u,
                        property_name: url,
                        type: 2
                    };
                    $.ajax({
                        url: "/site/contactUsForm",
                        type: "post",
                        data: me,
                        dataType: "json",
                        beforeSend: function () {
                            $(".loading_handle").show()
                        },
                        success: function (e) {
                            if (e) {
                                $(".loading_handle").hide();
                                $("body #sendenquiryform").modal('hide');
                                $("body #success-enquiry").modal();
                            }
                        }
                    })
                }
            }),
            $("#send-friend-email").on("blur", function() {
            $("#err_email").html("")
        }), $("#submit-subscribe").click(function() {
            var e = $(".email").val();
            "" == e ? $("#error_newsletter").html("Email is required!") : r(e) ? ($("#submit-subscribe").hide(), $.ajax({
                url: "/site/signupnewsletter",
                type: "post",
                data: {
                    email: e
                },
                dataType: "json",
                success: function(e) {
                    $("#submit-subscribe").show(), $("#error_newsletter").html(e.alert)
                },
                error: function() {
                    $("#submit-subscribe").show()
                }
            })) : $("#error_newsletter").html("Email address invalid!")
        }), $("#email-subscribe").keypress(function(e) {
            13 == e.keyCode && (e.preventDefault(), $("#submit-subscribe").trigger("click"))
        }), $("#login").on("click", function() {
            var e = $("#email-login-form").val(),
                i = $("#pass-login-form").val(),
                a = !1;
            $("#remember-login").is(":checked") && (a = !0), "" == e && "" == i ? ($("#email-login-error").text("Email is required"), $("#pass-login-error").text("Password is required"), $("#check-click-login").val("1")) : "" == e ? ($("#email-login-error").text("Email is required"), $("#check-click-login").val("1")) : "" == i ? ($("#pass-login-error").text("Password is required"), $("#check-click-login").val("1")) : r(e) ? ($("#email-login-error").text(""), $("#pass-login-error").text(""), $.ajax({
                url: "/site/login",
                type: "post",
                data: {
                    email: e,
                    password: i,
                    remember: a
                },
                dataType: "json",
                success: function(e) {
                    "false" == e.data ? ("" != e.ErrorEmail || "" != e.ErrorPassword) && (null == e.ErrorEmail && (e.ErrorEmail = ""), null == e.ErrorPassword && (e.ErrorPassword = ""), $("#email-login-error").text(e.ErrorEmail), $("#pass-login-error").text(e.ErrorPassword), $("#check-click-login").val("1")) : (window.location.href = e.url, $("#check-click-login").val("0"))
                },
                error: function() {
                    $("#login").show()
                }
            })) : ($("#email-login-error").text("Email address not valid email address! "), $("#pass-login-error").text(""), $("#check-click-login").val("1"))
        }), $("#signup-hompage").on("click", function() {
            var e = $("#sign-up-first-name").val(),
                r = $("#sign-up-last-name").val(),
                a = $("#sign-up-email").val(),
                o = $("#sign-up-pass").val(),
                t = $("#sign-up-confirm-pass").val(),
                s = 0;
            $("#sign-up-reciever-updated").is(":checked") && (s = 1), $.ajax({
                url: "/site/register",
                type: "post",
                data: {
                    firstname: e,
                    lastname: r,
                    email: a,
                    password: o,
                    confirm_password: t,
                    reciever_updated: s
                },
                dataType: "json",
                beforeSend: function() {
                    $("#loading").show(), $("#signup-hompage").hide()
                },
                success: function(e) {
                    $("#loading").show(), "false" == e.data ? ("" != e.ErrorEmail || "" != e.ErrorPassword || "" != e.ErrorFirstName || "" != e.ErrorLastName || "" != e.ErrorConFirmPassWord) && (null == e.ErrorFirstName && (e.ErrorFirstName = ""), null == e.ErrorLastName && (e.ErrorLastName = ""), null == e.ErrorEmail && (e.ErrorEmail = ""), null == e.ErrorPassword && (e.ErrorPassword = ""), null == e.ErrorConFirmPassWord && (e.ErrorConFirmPassWord = ""), $("#first-name-sign-up-error").text(e.ErrorFirstName), $("#last-name-name-sign-up-error").text(e.ErrorLastName), $("#email-sign-up-error").text(e.ErrorEmail), $("#password-sign-up-error").text(e.ErrorPassword), $("#confirm-password-sign-up-error").text(e.ErrorConFirmPassWord), $("#edit-profile-confirm-password").val(""), $("#edit-profile-password").val(""), $("#check-click-sign-up").val("1"), $("#loading").hide(), $("#signup-hompage").show()) : "" != e.url && ($("#close-mdl-register").addClass("close-register"), $(".login-email-sigup").val(a), $(".login-pass-sigup").val(o), $("#success-sigin-up-alert").show(), $("#form-alert").hide(), $("#check-click-sign-up").val("0"), $("#loading").hide(), i())
                },
                complete: function(e) {},
                error: function() {
                    $("#signup-hompage").show()
                }
            })
        }), $("#edit-profile-btn").click(function() {
            email = $("#edit-profile-email").val(), firstname = $("#edit-profile-first-name").val(), lastname = $("#edit-profile-last-name").val(), password = $("#edit-profile-password").val(), confirmpassword = $("#edit-profile-confirm-password").val(), $("#edit-profile-iput").val(1), $.ajax({
                url: "/member/site/updateprofile",
                type: "post",
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    password: password,
                    confirm_password: confirmpassword
                },
                dataType: "json",
                beforeSend: function() {
                    $("#loading-edit-profile").show()
                },
                success: function(e) {
                    $("#loading").show(), "false" == e.data ? ("" != e.ErrorEmail || "" != e.ErrorPassword || "" != e.ErrorFirstName || "" != e.ErrorLastName || "" != e.ErrorConFirmPassWord) && (null == e.ErrorFirstName && (e.ErrorFirstName = ""), null == e.ErrorLastName && (e.ErrorLastName = ""), null == e.ErrorEmail && (e.ErrorEmail = ""), null == e.ErrorPassword && (e.ErrorPassword = ""), null == e.ErrorConFirmPassWord && (e.ErrorConFirmPassWord = ""), $("#edit-profile-iput").val("1"), $("#first-name-edit-profile-error").text(e.ErrorFirstName), $("#last-name-edit-profile-error").text(e.ErrorLastName), $("#email-edit-profile-error").text(e.ErrorEmail), $("#password-edit-profile-error").text(e.ErrorPassword), $("#confirm-password-edit-profile-error").text(e.ErrorConFirmPassWord), $("#loading-edit-profile").hide(), $("#edit-profile-success").hide()) : ($("#edit-profile-success").show(), $("#first-name-edit-profile-error").text(""), $("#last-name-edit-profile-error").text(""), $("#email-edit-profile-error").text(""), $("#password-edit-profile-error").text(""), $("#confirm-password-edit-profile-error").text(""), $("#loading-edit-profile").hide())
                },
                complete: function() {},
                error: function() {}
            })
        }), $("#success-close").click(function() {
            $("#success-label").hide()
        }), $(".ion-android-close").click(function() {
            i()
        }), $("#click-sign-up").click(function() {
            $("#check-click-sign-up").val() > 0, i(), $("#success-sigin-up-alert").hide(), $("#form-alert").show()
        }), $("#click-login").click(function() {
            $("#check-click-login").val() > 0, i()
        }), $("#edit-profile").click(function() {
            $("#edit-profile-iput").val() > 0, i()
        }), $("#click-forgot").click(function() {
            $("#form-retreat-login").hide(), $("#form-retreat-forgot").show(), $(".success-false").show(), $(".success-sigin-up-alert").hide()
        }), $("#forgot-password").click(function() {
            $(".loading").show(), email = $("#email-forgot-form").val(), $.ajax({
                url: "/site/forgotpassword",
                type: "post",
                data: {
                    email: email
                },
                dataType: "json",
                success: function(e) {
                    "false" == e.data ? ("" != e.ErrorEmail || "" != e.ErrorPassword) && ($("#email-forgot-error").text(e.ErrorEmail), $(".loading").hide()) : ($(".success-false").hide(), $(".success-sigin-up-alert").show())
                },
                error: function() {}
            })
        }), $("#close-mdl-register").click(function() {
            var e = $(".login-email-sigup").val(),
                r = $(".login-pass-sigup").val();
            $.ajax({
                url: "/site/login",
                type: "post",
                data: {
                    email: e,
                    password: r
                },
                dataType: "json",
                success: function(e) {
                    "false" == e.data ? i() : window.location.href = e.url
                },
                error: function() {
                    $("#login").show()
                }
            })
        }), $("#close-mdl-login").click(function() {
            i()
        }), $("#close-mdl-forgot").click(function() {
            i()
        }), $("#contact-wishlist-alert").hide(), $(".success-sigin-up-alert").hide(), $(".loading").hide(), $("#form-retreat-forgot").hide(), $("#loading").hide(), $("#loading-edit-profile").hide(), $("#edit-profile-success").hide(), $("#success-sigin-up-alert").hide(), $("#btn-apply").click(function(e) {
            e.preventDefault();
            var r = $("#apply-form-h2").offset().top;
            $("html, body").animate({
                scrollTop: r
            }, 1200)
        }), $("#submit-enquire-wishlist").click(function() {
            var e = e = $("#enquire-wishlist-form").serialize();
            $(".loading").show(), $.ajax({
                type: "POST",
                url: "/member/site/enquirewishlist",
                data: e,
                dataType: "json",
                beforeSend: function() {},
                success: function(e) {
                    "true" == e.data ? ($("#error-check-in").text(""), $("#error-check-out").text(""), $("#error-message").text(""), $("#error-guests").text(""), $("#contact-wishlist-alert").show(), $("#contact-wishlist").hide()) : ("undefined" == typeof e.check_in && (e.check_in = ""), "undefined" == typeof e.check_out && (e.check_out = ""), "undefined" == typeof e.message && (e.message = ""), $("#error-check-in").text(e.check_in), $("#error-check-out").text(e.check_out), $("#error-message").text(e.message), $("#error-guests").text(e.guests), $(".loading").hide()), $("#enquire-contact").val("1")
                },
                error: function(e) {
                    alert("Error occured.please try again")
                }
            })
        }), $("#enquire-click").click(function() {
            $.ajax({
                dataType: "json",
                url: "/member/site/getwishlist",
                data: {},
                success: function(e) {
                    1 == e.status ? $("#wl-detail").html(e.wl) : $("#wl-detail").html("You don't have any favourites yet")
                },
                error: function() {}
            }), $("#enquire-contact").val() > 0, i()
        }), $(".nav-toggle").click(function() {
            $("#social-right").hide()
        }), $("#close-nav").click(function() {
            $("#social-right").show()
        }), $(document).on("click", ".morelink", function(e) {
            return e.preventDefault(), $(".morelink").hasClass("less") ? ($(this).removeClass("less"), $(".more-button").slideUp(), $(".morelink").text("Read More")) : ($(".morelink").addClass("less"), $(".more-button").removeClass("hide"), $(".more-button").slideDown(), $(".morelink").text("Read Less")), !1
        }), $(".slider-search a").click(function(e) {
            e.preventDefault();
            var r = $(this);
            if ("true" == r.attr("isAjax")) return !0;
            r.attr("isAjax", "true");
            var i = $("#listImage").data("proid"),
                a = 0;
               
            $(this).attr("id") && (a = parseInt($(this).attr("id").replace("slider-search-", "")) - 1), $.ajax({
                url: "/property/ajaxlistgalleries",
                type: "post",
                data: {
                    propertyId: i
                },
                dataType: "json",
                success: function(e) {

                    var i = [];
                    $.each(e, function(e, r) {
                        var a = {
                            src: "/" + r.file,
                            thumb: "/" + r.file
                        };
                        i.push(a)
                    }), console.info(i), $(this).lightGallery({
                        dynamic: !0,
                        html: !0,
                        addClass: "light-gallery-property",
                        index: a,
                        dynamicEl: i
                    }), r.attr("isAjax", "false")
                },
                error: function() {
                    r.attr("isAjax", "false")
                }
            })
        })
    }),
    function(e, r, i) {
        var a = {
            init: function() {
                var e = this;
                e.loadIconRs(), e.addToCard()
            },
            loadIcon: function() {
                var i = this,
                    a = e(".btn-heart").hasClass("like"),
                    o = e(".checkout");
                if (o.length > 0 || 1 == a) {
                    var t = e(r).width();
                    return 450 > t && e(".checkout-icon").css("display", "none"), !1
                }
                return 0 == a ? (setTimeout(i.reLoadIcon, 2e3), !1) : (e(".checkout-icon").css("display", "none"), !1)
            },
            loadIconRs: function() {
                var i = this;
                e(r).load(function() {
                    i.loadIcon()
                }), e(r).resize(function() {
                    i.loadIcon()
                })
            },
            reLoadIcon: function() {
                var i = e(".checkout");
                if (i.length > 0) {
                    var a = e(r).width();
                    return 450 > a && e(".checkout-icon").css("display", "none"), !1
                }
                return e(".checkout-icon").css("display", "none"), !1
            },
            addToCard: function() {
                e(document).on("click", ".addToCart", function() {
                    var e = this;
                    e.loadIcon()
                })
            }
        };
        e(document).ready(function() {
            a.init()
        })
    }(jQuery, window);