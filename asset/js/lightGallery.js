! function(e) {
    "use strict";
    e.fn.lightGallery = function(t) {
    	
        var i, a, n, l, s, o, d, r, c, u, h, m = {
                mode: "slide",
                useCSS: !0,
                cssEasing: "ease",
                easing: "linear",
                speed: 600,
                addClass: "",
                closable: !0,
                loop: !1,
                auto: !1,
                pause: 4e3,
                escKey: !0,
                controls: !0,
                hideControlOnEnd: !1,
                preload: 1,
                showAfterLoad: !0,
                selector: null,
                index: !1,
                lang: {
                    allPhotos: "All photos"
                },
                counter: !1,
                exThumbImage: !1,
                thumbnail: !0,
                showThumbByDefault: !1,
                animateThumb: !0,
                currentPagerPosition: "middle",
                thumbWidth: 100,
                thumbMargin: 5,
                mobileSrc: !1,
                mobileSrcMaxWidth: 640,
                swipeThreshold: 50,
                enableTouch: !0,
                enableDrag: !0,
                vimeoColor: "CCCCCC",
                youtubePlayerParams: !1,
                videoAutoplay: !0,
                videoMaxWidth: "855px",
                dynamic: !1,
                dynamicEl: [],
                onOpen: function(e) {},
                onSlideBefore: function(e) {},
                onSlideAfter: function(e) {},
                onSlideNext: function(e) {},
                onSlidePrev: function(e) {},
                onBeforeClose: function(e) {},
                onCloseAfter: function(e) {}
            },
            f = e(this),
            v = this,
            p = null,
            b = 0,
            g = !1,
            C = !1,
            y = void 0 !== document.createTouch || "ontouchstart" in window || "onmsgesturechange" in window || navigator.msMaxTouchPoints,
            w = !1,
            T = !1,
            x = !1,
            q = e.extend(!0, {}, m, t),
            S = {
                init: function() {
                    f.each(function() {
                        var t = e(this);
                        q.dynamic ? (p = q.dynamicEl, b = 0, d = b, k.init(b)) : (p = null !== q.selector ? e(q.selector) : t.children(), p.on("click", function(i) {
                            p = null !== q.selector ? e(q.selector) : t.children(), i.preventDefault(), i.stopPropagation(), b = p.index(this), d = b, k.init(b)
                        }))
                    })
                }
            },
            k = {
                init: function() {
                    g = !0, this.structure(), this.getWidth(), this.closeSlide(), this.autoStart(), this.counter(), this.slideTo(), this.buildThumbnail(), this.keyPress(), q.index ? (this.slide(q.index), this.animateThumb(q.index)) : (this.slide(b), this.animateThumb(b)), q.enableDrag && this.touch(), q.enableTouch && this.enableTouch(), setTimeout(function() {
                        i.addClass("opacity")
                    }, 50)
                },
                structure: function() {
                    e("body").append('<div id="lg-outer" class="' + q.addClass + '"><div id="lg-gallery"><div id="lg-slider"></div><a id="lg-close" class="close"></a><a class="cl-thumb"></a></div></div>').addClass("light-gallery"), a = e("#lg-outer"), i = e("#lg-gallery"), q.showAfterLoad === !0 && i.addClass("show-after-load"), n = i.find("#lg-slider");
                    var t = "";
                    if (q.dynamic)
                        for (var s = 0; s < q.dynamicEl.length; s++) t += '<div class="lg-slide"></div>';
                    else p.each(function() {
                        t += '<div class="lg-slide"></div>'
                    });
                    n.append(t), l = i.find(".lg-slide")
                },
                closeSlide: function() {
                    q.closable && e("#lg-outer").on("click", function(t) {
                        e(t.target).is(".lg-slide") && v.destroy(!1)
                    }), e("#lg-close").bind("click touchend", function() {
                        v.destroy(!1)
                    })
                },
                getWidth: function() {
                    var t = function() {
                        u = e(window).width()
                    };
                    e(window).bind("resize.lightGallery", t())
                },
                doCss: function() {
                    var e = function() {
                        for (var e = ["transition", "MozTransition", "WebkitTransition", "OTransition", "msTransition", "KhtmlTransition"], t = document.documentElement, i = 0; i < e.length; i++)
                            if (e[i] in t.style) return !0
                    };
                    return q.useCSS && e() ? !0 : !1
                },
                enableTouch: function() {
                    var t = this;
                    if (y) {
                        var i = {},
                            a = {};
                        e("body").on("touchstart.lightGallery", function(e) {
                            a = e.originalEvent.targetTouches[0], i.pageX = e.originalEvent.targetTouches[0].pageX, i.pageY = e.originalEvent.targetTouches[0].pageY
                        }), e("body").on("touchmove.lightGallery", function(e) {
                            var t = e.originalEvent;
                            a = t.targetTouches[0], e.preventDefault()
                        }), e("body").on("touchend.lightGallery", function(e) {
                            var n = a.pageX - i.pageX,
                                l = q.swipeThreshold;
                            n >= l ? (t.prevSlide(), clearInterval(h)) : -l >= n && (t.nextSlide(), clearInterval(h))
                        })
                    }
                },
                touch: function() {
                    var t, i, a = this;
                    e(".light-gallery").bind("mousedown", function(e) {
                        e.stopPropagation(), e.preventDefault(), t = e.pageX
                    }), e(".light-gallery").bind("mouseup", function(e) {
                        e.stopPropagation(), e.preventDefault(), i = e.pageX, i - t > 20 ? a.prevSlide() : t - i > 20 && a.nextSlide()
                    })
                },
                isVideo: function(e, t) {
                    var i = e.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|embed\/)?([a-z0-9_\-]+)/i),
                        a = e.match(/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i),
                        n = !1;
                    return q.dynamic ? "true" == q.dynamicEl[t].iframe && (n = !0) : "true" == p.eq(t).attr("data-iframe") && (n = !0), i || a || n ? !0 : void 0
                },
                loadVideo: function(t, i) {
                    var a = t.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|embed\/)?([a-z0-9_\-]+)/i),
                        n = t.match(/\/\/(?:www\.)?vimeo.com\/([0-9a-z\-_]+)/i),
                        l = "",
                        s = "";
                    if (a) {
                        if (s = q.videoAutoplay === !0 && C === !1 ? "?autoplay=1&rel=0&wmode=opaque" : "?wmode=opaque", q.youtubePlayerParams) {
                            var o = e.param(q.youtubePlayerParams);
                            s = s + "&" + o
                        }
                        l = '<iframe class="object" width="560" height="315" src="//www.youtube.com/embed/' + a[1] + s + '" frameborder="0" allowfullscreen></iframe>'
                    } else n ? (s = q.videoAutoplay === !0 && C === !1 ? "autoplay=1&amp;" : "", l = '<iframe class="object" id="video' + i + '" width="560" height="315"  src="http://player.vimeo.com/video/' + n[1] + "?" + s + "byline=0&amp;portrait=0&amp;color=" + q.vimeoColor + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>') : l = '<iframe class="object" frameborder="0" src="' + t + '"  allowfullscreen="true"></iframe>';
                    return '<div class="video-cont" style="max-width:' + q.videoMaxWidth + ' !important;"><div class="video">' + l + "</div></div>"
                },
                addHtml: function(t) {
                    var i = null;
                    if (i = q.dynamic ? q.dynamicEl[t]["sub-html"] : p.eq(t).attr("data-sub-html"), "undefined" != typeof i && null !== i) {
                        var a = i.substring(0, 1);
                        i = "." == a || "#" == a ? e(i).html() : i, l.eq(t).append(i)
                    }
                },
                preload: function(e) {
                    for (var t = e, i = 0; i <= q.preload && !(i >= p.length - e); i++) this.loadContent(t + i, !0);
                    for (var a = 0; a <= q.preload && !(0 > t - a); a++) this.loadContent(t - a, !0)
                },
                loadObj: function(e, t) {
                    var i = this;
                    l.eq(t).find(".object").on("load error", function() {
                        l.eq(t).addClass("complete")
                    }), e === !1 && (l.eq(t).hasClass("complete") ? i.preload(t) : l.eq(t).find(".object").on("load error", function() {
                        i.preload(t)
                    }))
                },
                loadContent: function(t, i) {
                    var a, n = this;
                    p.length - t;
                    q.preload > p.length && (q.preload = p.length), q.mobileSrc === !0 && u <= q.mobileSrcMaxWidth && (a = q.dynamic ? q.dynamicEl[t].mobileSrc : p.eq(t).attr("data-responsive-src")), a || (a = q.dynamic ? q.dynamicEl[t].src : p.eq(t).attr("data-src"));
                    var s = 0;
                    i === !0 && (s = q.speed + 400), "undefined" != typeof a && "" !== a ? n.isVideo(a, t) ? setTimeout(function() {
                        l.eq(t).hasClass("loaded") || (l.eq(t).prepend(n.loadVideo(a, t)), n.addHtml(t), l.eq(t).addClass("loaded"), q.auto && q.videoAutoplay === !0 && clearInterval(h)), n.loadObj(i, t)
                    }, s) : setTimeout(function() {

                        l.eq(t).hasClass("loaded") || (l.eq(t).prepend('<img class="object" src="' + a + '" />'), n.addHtml(t), l.eq(t).addClass("loaded")), n.loadObj(i, t)
                    }, s) : setTimeout(function() {
                        if (!l.eq(t).hasClass("loaded")) {
                            var a = null;
                            if (a = q.dynamic ? q.dynamicEl[t].html : p.eq(t).attr("data-html"), "undefined" != typeof a && null !== a) {
                                var s = a.substring(0, 1);
                                a = "." == s || "#" == s ? e(a).html() : a
                            }
                            "undefined" != typeof a && null !== a && l.eq(t).append('<div class="video-cont" style="max-width:' + q.videoMaxWidth + ' !important;"><div class="video">' + a + "</div></div>"), n.addHtml(t), l.eq(t).addClass("loaded complete"), q.auto && q.videoAutoplay === !0 && clearInterval(h)
                        }
                        n.loadObj(i, t)
                    }, s)
                },
                counter: function() {
                    if (q.counter === !0) {
                        var t = e("#lg-slider > div").length;
                        i.append("<div id='lg-counter'><span id='lg-counter-current'></span> / <span id='lg-counter-all'>" + t + "</span></div>")
                    }
                },
                buildThumbnail: function() {
                    if (q.thumbnail === !0 && p.length > 1) {
                        var t = this,
                            a = "";
                        q.showThumbByDefault || (a = '<span class="close ib"><i class="bUi-iCn-rMv-16" aria-hidden="true"></i></span>'), i.append('<div class="thumb-cont"><div class="thumb-info">' + a + '</div><div class="thumb-inner"></div></div>'), r = i.find(".thumb-cont"), s.parent().addClass("has-thumb"), i.find(".cl-thumb").bind("click touchend", function() {
                            i.addClass("open"), t.doCss() && "slide" === q.mode && (l.eq(b).prevAll().removeClass("next-slide").addClass("prev-slide"), l.eq(b).nextAll().removeClass("prev-slide").addClass("next-slide"))
                        }), i.find(".thumb-cont .close").bind("click touchend", function() {
                            i.removeClass("open")
                        });
                        var n, o = i.find(".thumb-info"),
                            d = i.find(".thumb-inner"),
                            u = "";
                        if (q.dynamic)
                            for (var m = 0; m < q.dynamicEl.length; m++) n = q.dynamicEl[m].thumb, u += '<div class="thumb"><img src="' + n + '" /></div>';
                        else p.each(function() {
                            n = q.exThumbImage === !1 || "undefined" == typeof e(this).attr(q.exThumbImage) || null === e(this).attr(q.exThumbImage) ? e(this).find("img").attr("src") : e(this).attr(q.exThumbImage), u += '<div class="thumb"><img src="' + n + '" /></div>'
                        });
                        if (d.append(u), c = d.find(".thumb"), c.css({
                                "margin-right": q.thumbMargin + "px",
                                width: q.thumbWidth + "px"
                            }), q.animateThumb === !0) {
                            var f = p.length * (q.thumbWidth + q.thumbMargin);
                            i.find(".thumb-inner").css({
                                width: f + "px",
                                position: "relative",
                                "transition-duration": q.speed + "ms"
                            })
                        }
                        c.bind("click touchend", function() {
                            w = !0;
                            var i = e(this).index();
                            c.removeClass("active"), e(this).addClass("active"), t.slide(i), t.animateThumb(i), clearInterval(h)
                        }), o.prepend('<span class="ib count">' + q.lang.allPhotos + " (" + c.length + ")</span>"), q.showThumbByDefault && i.addClass("open")
                    }
                },
                animateThumb: function(e) {
                    if (q.animateThumb === !0) {
                        var t, a = i.find(".thumb-cont").width();
                        switch (q.currentPagerPosition) {
                            case "left":
                                t = 0;
                                break;
                            case "middle":
                                t = a / 2 - q.thumbWidth / 2;
                                break;
                            case "right":
                                t = a - q.thumbWidth
                        }
                        var n = (q.thumbWidth + q.thumbMargin) * e - 1 - t,
                            l = p.length * (q.thumbWidth + q.thumbMargin);
                        n > l - a && (n = l - a), 0 > n && (n = 0), this.doCss() ? i.find(".thumb-inner").css("transform", "translate3d(-" + n + "px, 0px, 0px)") : i.find(".thumb-inner").animate({
                            left: -n + "px"
                        }, q.speed)
                    }
                },
                slideTo: function() {
                    var e = this;
                    q.controls === !0 && p.length > 1 && (i.append('<div id="lg-action"><a id="lg-prev"></a><a id="lg-next"></a></div>'), s = i.find("#lg-prev"), o = i.find("#lg-next"), s.bind("click", function() {
                        e.prevSlide(), clearInterval(h)
                    }), o.bind("click", function() {
                        e.nextSlide(), clearInterval(h)
                    }))
                },
                autoStart: function() {
                    var e = this;
                    q.auto === !0 && (h = setInterval(function() {
                        b = b + 1 < p.length ? b : -1, b++, e.slide(b)
                    }, q.pause))
                },
                keyPress: function() {
                    var t = this;
                    e(window).bind("keyup.lightGallery", function(e) {
                        e.preventDefault(), e.stopPropagation(), 37 === e.keyCode && (t.prevSlide(), clearInterval(h)), 38 === e.keyCode && q.thumbnail === !0 && p.length > 1 ? i.hasClass("open") || (t.doCss() && "slide" === q.mode && (l.eq(b).prevAll().removeClass("next-slide").addClass("prev-slide"), l.eq(b).nextAll().removeClass("prev-slide").addClass("next-slide")), i.addClass("open")) : 39 === e.keyCode && (t.nextSlide(), clearInterval(h)), 40 === e.keyCode && q.thumbnail === !0 && p.length > 1 && !q.showThumbByDefault ? i.hasClass("open") && i.removeClass("open") : q.escKey === !0 && 27 === e.keyCode && (!q.showThumbByDefault && i.hasClass("open") ? i.removeClass("open") : v.destroy(!1))
                    })
                },
                nextSlide: function() {
                    var e = this;
                    b = l.index(l.eq(d)), b + 1 < p.length ? (b++, e.slide(b)) : q.loop ? (b = 0, e.slide(b)) : q.thumbnail === !0 && p.length > 1 && !q.showThumbByDefault ? i.addClass("open") : (l.eq(b).find(".object").addClass("right-end"), setTimeout(function() {
                        l.find(".object").removeClass("right-end")
                    }, 400)), e.animateThumb(b), q.onSlideNext.call(this, v)
                },
                prevSlide: function() {
                    var e = this;
                    b = l.index(l.eq(d)), b > 0 ? (b--, e.slide(b)) : q.loop ? (b = p.length - 1, e.slide(b)) : q.thumbnail === !0 && p.length > 1 && !q.showThumbByDefault ? i.addClass("open") : (l.eq(b).find(".object").addClass("left-end"), setTimeout(function() {
                        l.find(".object").removeClass("left-end")
                    }, 400)), e.animateThumb(b), q.onSlidePrev.call(this, v)
                },
                slide: function(t) {
                    var i = this;
                    if (C ? (setTimeout(function() {
                            i.loadContent(t, !1)
                        }, q.speed + 400), n.hasClass("on") || n.addClass("on"), this.doCss() && "" !== q.speed && (n.hasClass("speed") || n.addClass("speed"), x === !1 && (n.css("transition-duration", q.speed + "ms"), x = !0)), this.doCss() && "" !== q.cssEasing && (n.hasClass("timing") || n.addClass("timing"), T === !1 && (n.css("transition-timing-function", q.cssEasing), T = !0)), q.onSlideBefore.call(this, v)) : i.loadContent(t, !1), "slide" === q.mode) {
                        var a = null !== navigator.userAgent.match(/iPad/i);
                        !this.doCss() || n.hasClass("slide") || a ? this.doCss() && !n.hasClass("use-left") && a && n.addClass("use-left") : n.addClass("slide"), this.doCss() || C ? !this.doCss() && C && n.animate({
                            left: 100 * -t + "%"
                        }, q.speed, q.easing) : n.css({
                            left: 100 * -t + "%"
                        })
                    } else "fade" === q.mode && (this.doCss() && !n.hasClass("fade-m") ? n.addClass("fade-m") : this.doCss() || n.hasClass("animate") || n.addClass("animate"), this.doCss() || C ? !this.doCss() && C && (l.eq(d).fadeOut(q.speed, q.easing), l.eq(t).fadeIn(q.speed, q.easing)) : (l.fadeOut(100), l.eq(t).fadeIn(100)));
                    if (t + 1 >= p.length && q.auto && q.loop === !1 && clearInterval(h), l.eq(d).removeClass("current"), l.eq(t).addClass("current"), this.doCss() && "slide" === q.mode && (w === !1 ? (e(".prev-slide").removeClass("prev-slide"), e(".next-slide").removeClass("next-slide"), l.eq(t - 1).addClass("prev-slide"), l.eq(t + 1).addClass("next-slide")) : (l.eq(t).prevAll().removeClass("next-slide").addClass("prev-slide"), l.eq(t).nextAll().removeClass("prev-slide").addClass("next-slide"))), q.thumbnail === !0 && p.length > 1 && (c.removeClass("active"), c.eq(t).addClass("active")), q.controls && q.hideControlOnEnd && q.loop === !1 && p.length > 1) {
                        var r = p.length;
                        r = parseInt(r) - 1, 0 === t ? (s.addClass("disabled"), o.removeClass("disabled")) : t === r ? (s.removeClass("disabled"), o.addClass("disabled")) : s.add(o).removeClass("disabled")
                    }
                    d = t, C === !1 ? q.onOpen.call(this, v) : q.onSlideAfter.call(this, v), setTimeout(function() {
                        C = !0
                    }), w = !1, q.counter && e("#lg-counter-current").text(t + 1), e(window).bind("resize.lightGallery", function() {
                        setTimeout(function() {
                            i.animateThumb(t)
                        }, 200)
                    })
                }
            };
        return v.isActive = function() {
            return g === !0 ? !0 : !1
        }, v.destroy = function(t) {
            g = !1, t = "undefined" != typeof t ? !1 : !0, q.onBeforeClose.call(this, v);
            var n = C;
            C = !1, T = !1, x = !1, w = !1, clearInterval(h), t === !0 && p.off("click touch touchstart"), e(".light-gallery").off("mousedown mouseup"), e("body").off("touchstart.lightGallery touchmove.lightGallery touchend.lightGallery"), e(window).off("resize.lightGallery keyup.lightGallery"), n === !0 && (i.addClass("fade-m"), setTimeout(function() {
                a.remove(), e("body").removeClass("light-gallery")
            }, 500)), q.onCloseAfter.call(this, v)
        }, S.init(), this
    }
}(jQuery);