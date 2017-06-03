function fullImg() {
    var e = $(window).height(),
        t = e / $(window).width();
    $("#wrap-top").css("max-height", e), $("#slide-top figure").each(function() {
        var o = $(this).find("img");
        o.attr("src");
        $(this).css({
            height: e,
            "background-position": "center"
        });
        var i = o.height() / o.width();
        t > i ? o.css({
            height: "100%",
            width: "auto"
        }) : o.css({
            height: "auto",
            width: "100%"
        })
    })
}

function marginLeft() {
    $(".item-vrt").each(function() {
        var e = -($(window).width() - $(this).parent(".container").width()) / 2;
        $(this).css({
            "margin-left": e + "px"
        })
    })
}

function calSize() {
    $(".group-img .col-sm-6").height($(".large").innerHeight() / 2 + .1)
}

function homeNew() {
    if ($(window).width() > 767) {
        var e = $(".blog-hot").height(),
            t = $(".blog-list-side").height();
        if (t > e) $(".blog-hot").height(t);
        else {
            $(".blog-hot").removeAttr("style");
            var o = e - t,
                i = Math.round(o / 4) + 25;
            $(".blog-list-side .descrip").css({
                "padding-top": i + "px",
                "padding-bottom": i + "px"
            })
        }
    } else $(".blog-list-side .descrip").removeAttr("style")
}
$(document).ready(function() {
    $('#slide-top').on('slide.bs.carousel', function () {
        $(".carousel-fade .active .caption_link").hide();
    });
    $('#slide-top').on('slid.bs.carousel', function () {
        $('.caption_link:not(".active")').css({'display':'block'});
    });
    $("#wrap-top").length && $("#header").addClass("hasslide"), $(window).scroll(function() {
        $(document).scrollTop() > 5 ? $("#header").addClass("bgHeader") : $("#header").removeClass("bgHeader")
    }), fullImg(), marginLeft(), $(window).load(function() {
        calSize(), homeNew()
    }), $(".nav-toggle").click(function() {
        $("body").toggleClass("show-nav")
    }), $("#close-nav").click(function() {
        $("body").removeClass("show-nav"), $(".btn-menu").trigger("click")
    });
    var e = $(window).width();
    if (979 > e) {
        $("#slide-top").find(".item").each(function(e) {
            e > 0 && $(this).remove()
        }), $("#checkout_mobi").css("display", "block");
        var t = $(".rightHead").find("#itemCard").html(),
            o = $(".nav-link-menu").find("#checkout_mobi");
        o.html(t)
    }
    $(window).scroll(function() {
        var e = "50%" + $(document).scrollTop() / 2 + "px";
        $("#slide-top figure").css({
            "background-position": e
        }), scrollTop = $(this).scrollTop(), scrollTop > 600 ? ($("#wrapper").addClass("fixed"), $("#header").css("position", "fixed"), $("#header").addClass("nofixed")) : $("#wrapper").removeClass("fixed"), $(this).scrollTop() > 600 ? $("#iTop").addClass("show-top") : $("#iTop").removeClass("show-top"), $(".fixed-light-detail").each(function() {
            var e = $(window).scrollTop() - $(".fixed-light-detail").offset().top + $("#header").height();
            e > 0 ? $(".fixed-light-detail").addClass("top-fix") : $(".fixed-light-detail").removeClass("top-fix")
        })
    }), $(".arrow-br").click(function(e) {
        e.preventDefault();
        var t = $(this),
            o = $("#header").height(),
            i = $(t.attr("href")).offset().top - o;
        $("html, body").animate({
            scrollTop: i
        }, 600)
    }), $(".scroll-center").click(function(e) {
        e.preventDefault();
        var t = $(this),
            o = $(t.attr("href")).offset().top;
        $("html, body").animate({
            scrollTop: o
        }, 600)
    }), $("#iTop").click(function() {
        return $("body,html").animate({
            scrollTop: 0
        }, 800), !1
    }), $(".checkbox-vr input:checked").parent(".checkbox-vr").addClass("checker"), $(document).on("click touch", ".checkbox-vr input", function() {
        $(this).parent(".checkbox-vr").toggleClass("checker");
        var e = $(".checkbox-vr"),
            t = $(this);
        $("#ContactForm_reciever_updated").length > 0 && (e.hasClass("checker") ? ($("#ContactForm_reciever_updated").val(1), $("#ytContactForm_reciever_updated").val(1)) : ($("#ContactForm_reciever_updated").val(0), $("#ytContactForm_reciever_updated").val(0))), $("#enquiry-form_reciever_updated").length > 0 && (e.hasClass("checker") ? $("#enquiry-form_reciever_updated").val(1) : $("#enquiry-form_reciever_updated").val(0))
    }), $(".btn-search-blog").click(function() {
        $("#barBlog").addClass("show-blog")
    }), $("#barBlog").click(function(e) {
        e.stopPropagation()
    }), $("html, body").click(function() {
        $("#barBlog").removeClass("show-blog")
    }), $(".light-menu a").click(function(e) {
        if($(this).attr("href")== "#"){e.preventDefault();}
        var t = $(this);
        "#" != t.attr("href") && (iTop = $(t.attr("href")).offset().top - $(".fixed #header").height() - $(".light-menu").outerHeight(!0), $("html, body").animate({
            scrollTop: iTop
        }, 600))
    }), $(".search-box .refines").hide(), $(".hideRefine").click(function() {
        $(this).toggleClass("show"), $(".search-box .refines").slideToggle(250)
    }), $(".select-rv").each(function() {
        //$(this).find("select").before('<span class="form-control"></span>');
        var e = $(this).find("span.form-control");
        $(this).change(function() {
            var t = "";
            $(this).find("option:selected").each(function() {
                t += $(this).text() + " "
            }), e.text(t)
        }).trigger("change")
    })
}), $(window).resize(function() {
    calSize(), homeNew(), fullImg(), marginLeft()
}), $("body").scrollspy({
    target: "#light-bar",
    offset: 120
});

// var e = $(window).width();
//     if (767 > e) {
//         $("#slide-top").find(".item").each(function(e) {
//             e > 0 && $(this).remove()
//         }), $("#checkout_mobi").css("display", "block");
//         var t = $(".rightHead").find("#itemCard").clone(),
//             o = $(".nav-link-menu").find("#checkout_mobi");
//         o.html(t)
//     }

$(document).ready(function() {
    var cur_page = $(location).attr("href");
    $("ul.link-menu >li > a").each(function(){
        if($(this).attr("href") == cur_page)
            $(this).addClass("active");
    })
    $("li.sub-nav span").click(function () {
        $("ul.mtree-level-2").css('display','block');
        $("ul.mtree-level-2").css('height','auto');
        //$(sub).children("ul").children("li").removeClass("mtree-closed").addClass("mtree-open").addClass("mtree-active");
      //  $(sub).children("ul").children("li").children("ul").css("display:block");
    });
    $("ul.nav.light-menu.clearfix a").click(function(e) {
        e.preventDefault();
        $("ul.nav.light-menu.clearfix a:focus").css("background","none");
    });

        $("h2.title").each(function () {
            if(($(this).height()==90 && $(this).children('a').height()==41) ||
                ($(this).height()==82 && $(this).children('a').height()==37) ||
                ($(this).height()==74 && $(this).children('a').height()==33)||
                ($(this).height()==64 && $(this).children('a').height()==27)
            ){
                $(this).css("width","120%");
            }
        });

});

// $(window).load(function()
// {
// 	centerContent();
// });

// $(window).resize(function()
// {
// 	centerContent();
// });

// function centerContent()

// {
// 	$("#checkout_mobi").css("display", "none");
// 	var DocWidth= $(document).width();
// 	if(DocWidth <=979){
//         $("#checkout_mobi").css("display", "block");
// 		var clonehtml= $(".rightHead").find("#itemCard").clone();
// 		$(".nav-link-menu").find("#checkout_mobi").html(clonehtml);


// 	}
    


// }

       