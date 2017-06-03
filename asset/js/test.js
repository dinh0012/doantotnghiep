var puredrift = puredrift || {};
puredrift.master = function(n) {
    "use strict";
    var t = n(".subscribe-form"),
        u = t.find(".subscribe"),
        r = n(".action-msg"),
        i = n("header.top"),
        f = function() {
            a();
            h();
            s();
            e();
            c()
        },
        e = function() {
            BE.gadget.cart(".be-cart", {
                vcID: 202,
                autoCollapse: !0,
                bookingURL: "/reservation"
            });
            n('head link[href="//gadgets.impartmedia.com/css/all.cssz"]').remove()
        },
        o = function() {
            r.html("").hide();
            n.ajax({
                type: "POST",
                url: t.attr("action"),
                data: t.serialize(),
                success: function(n) {
                    u.hide();
                    r.html(n).removeClass("error").addClass("success").fadeIn(400)
                },
                error: function(n) {
                    var t = parseInt(n.status, 10) === 400 ? n.responseText : "Server error has occured.";
                    r.html(t).addClass("error").fadeIn(400)
                }
            })
        },
        s = function() {
            t.validate({
                rules: {
                    email: {
                        required: !0,
                        email: !0,
                        maxlength: 256
                    }
                },
                messages: {
                    email: {
                        required: "Please enter an email address to subscribe to Puredrift.",
                        email: "Please enter a valid email address (eg. yourname@somewhere.com)"
                    }
                },
                submitHandler: function() {
                    o()
                }
            })
        },
        h = function() {
            n(".btn-menu").on({
                click: function(t) {
                    t.preventDefault();
                    n("#app").toggleClass("nav-active");
                    var i = n("#app").hasClass("nav-active") ? "fadeIn" : "fadeOut",
                        r = n(window).width(),
                        u = n(window).height();
                    n(".nav-main").css({
                        width: r,
                        height: u
                    }).velocity(i, {
                        duration: 200
                    })
                }
            });
            n(window).on("orientationchange resize", function() {
                var t = n(window).width(),
                    i = n(window).height();
                n(".nav-main").css({
                    width: t,
                    height: i
                })
            })
        },
        c = function() {
            (function(n, t, i, r, u, f, e) {
                n.GoogleAnalyticsObject = u;
                n[u] = n[u] || function() {
                    (n[u].q = n[u].q || []).push(arguments)
                };
                n[u].l = 1 * new Date;
                f = t.createElement(i);
                e = t.getElementsByTagName(i)[0];
                f.async = 1;
                f.src = r;
                e.parentNode.insertBefore(f, e)
            })(window, document, "script", "//www.google-analytics.com/analytics.js", "ga");
            ga("create", "UA-20638657-1", "auto");
            ga("send", "pageview");
            n(window).on("error", function(n) {
                ga("send", "exception", {
                    exDescription: n.message + ":  " + n.filename + ":  " + n.lineno
                })
            });
            n(document).ajaxError(function(n, t, i) {
                ga("send", "exception", {
                    exDescription: "AJAX Error:  " + i.url + ":  " + n.result
                })
            })
        },
        l = function() {
            throw new Error("This is a mock test error!");
        },
        a = function() {
            var r = i.outerHeight(),
                t = !1;
            n(window).scroll(function() {
                t = !0
            });
            setInterval(function() {
                t && (t = !1, n(window).scrollTop() > r ? i.hasClass("fixed") || i.addClass("fixed") : i.removeClass("fixed"))
            }, 250)
        };
    return {
        init: f,
        throwTestError: l
    }
}(jQuery);
$(function() {
    puredrift.master.init()
});
puredrift = puredrift || {};
puredrift.home = function() {
    var n = function() {},
        t = function() {
            $w.event.subscribe("region.refinetools.built", function() {
                $(document).trigger("search.refinetools.built")
            })
        },
        i = function() {
            BE.gadget.search(".be-search", {
                vcID: 202,
                period: 2,
                adults: 2,
                children: 0,
                infants: 0,
                showRefineTools: !0,
                collapseRefineTools: !0,
                searchLocation: "/byron-bay-accommodation",
                disabledTypes: ["tours", "events", "carhire", "packages"]
            });
            $('head link[href="//gadgets.impartmedia.com/css/all.cssz"]').remove()
        };
    return {
        init: n
    }
}();
puredrift = puredrift || {};
puredrift.blog = function() {
    var t = $(".btn-load-more"),
        n = 0,
        r = 0,
        u = function(t, u, e) {
            _pages = parseInt(t, 10);
            n = parseInt(u, 10);
            r = parseInt(e, 10);
            i();
            $(".btn-load-more").on({
                click: function(n) {
                    n.preventDefault();
                    var i = $(this),
                        t = i.attr("href");
                    f(t);
                    ga("send", "pageview", t)
                }
            })
        },
        i = function() {
            if (n < _pages) {
                var i = [location.protocol, "//", location.host, location.pathname].join("");
                t.attr("href", "{0}?page={1}".format(i, n + 1))
            } else t.hide()
        },
        f = function(t) {
            $.get(t, function(t) {
                $(t).find(".inpiration-articles > *").appendTo(".inpiration-articles");
                n++;
                i()
            })
        };
    return {
        init: u
    }
}();
puredrift = puredrift || {};
puredrift.accommodation = function() {
    var n = {},
        i = !1,
        r = !1,
        u = null,
        f = function(t) {
            n = t;
            o();
            v();
            a();
            y();
            d();
            g();
            l();
            w();
            p();
            k();
            b();
            c();
            s();
            h()
        },
        e = function() {
            return n
        },
        o = function() {
            $.ajax({
                dataType: "json",
                url: "//sjp.impartmedia.com/be/getAccomRoomsDetails?callback=?",
                data: {
                    q: 202,
                    operators: n.BEOperatorID
                },
                success: function(r) {
                    if ($(".accommodation-rooms .loading").hide(), typeof r[0] == "undefined" || typeof r[0].Rooms == "undefined") {
                        $(".accommodation-rooms").hide();
                        return
                    }
                    var u = r[0].Rooms.sort(sort_by("RoomID", !0));
                    n.RoomData = u;
                    i = !0;
                    t()
                }
            })
        },
        s = function() {
            $(".ljh-legal").on({
                click: function(n) {
                    n.preventDefault();
                    $(".terms-placeholder").load("/legal-ljh #terms", function() {
                        $.colorbox({
                            inline: !0,
                            href: "#terms",
                            opacity: .95,
                            returnFocus: !1,
                            width: "80%"
                        })
                    })
                }
            })
        },
        h = function() {
            $(".rh-legal").on({
                click: function(n) {
                    n.preventDefault();
                    $(".terms-placeholder").load("/legal-rh #terms", function() {
                        $.colorbox({
                            inline: !0,
                            href: "#terms",
                            opacity: .95,
                            returnFocus: !1,
                            width: "80%"
                        })
                    })
                }
            })
        },
        c = function() {
            u = setInterval(t, 200)
        },
        t = function() {
            if (r && i) {
                clearInterval(u);
                $.each(n.RoomData, function(n, t) {
                    var i = $(".priceGrid tbody tr .name a:contains('" + t.Name + "')").closest("tr");
                    i.length ? (t.IsActive = !0, t.TotalPrice = i.find(".total .number").html().substring(1), t.IsAvailable = !i.find(".total a").hasClass("sold-out") && !i.hasClass("min-nights")) : t.IsActive = !1
                });
                var t = $.grep(n.RoomData, function(n) {
                    return n.IsActive === !0
                });
                $(".accommodation-room-details").html($("#accommodation_room_details").render(t, {
                    getPeriod: function() {
                        return $(".search-gadget .period select").val()
                    }
                }));
                $(".room-description a").contents().unwrap()
            }
        },
        l = function() {
            $(document).bind("details.change.complete", function() {
                ga("send", "event", "Accommodation", "Date/Price View Change", "details.change.complete")
            });
            $(document).bind("details.refinetools.built", function() {});
            $("body").on("click", ".add-to-cart-form .addToCart", function() {
                ga("send", "event", "Cart", "Item Added To Cart", n.title + " :" + n.BEOperatorID)
            });
            $("body").on("click", ".add-to-cart-form .checkOutNow", function() {
                ga("send", "event", "Cart", "Buy Now Clicked", n.title + " :" + n.BEOperatorID)
            })
        },
        a = function() {
            $(document).bind("details.change.complete", function() {
                r = !0;
                t()
            })
        },
        v = function() {
            $(document).bind("details.change.complete", function() {
                $(".priceGrid .name a").each(function() {
                    $(this).attr("data-name", n.title)
                })
            })
        },
        y = function() {
            $(document).bind("details.change.complete", function() {
                $(".priceGrid .price.sold span").html("No Accommodation Available")
            })
        },
        p = function() {
            var n = $(".accommodation-photos-hero .gallery").colorbox({
                opacity: .95,
                returnFocus: !1,
                width: "100%",
                height: "100%",
                current: "Photo {current} of {total}",
                fixed: !0,
                rel: "accommodation-photos"
            })
        },
        w = function() {
            $(".accommodation-photos").each(function() {
                var n = $(this),
                    t = n.parent(),
                    i = !0,
                    r = n.glide({
                        autoplay: !1,
                        arrows: !1,
                        navigation: !1,
                        beforeTransition: function() {
                            i && (n.find(".img-placeholder").each(function(n, t) {
                                $(t).attr("src", $(t).attr("data-src"))
                            }), i = !1)
                        }
                    }).data("api_glide");
                t.find(".btn.photo-next").click(function() {
                    r.next()
                });
                t.find(".btn.photo-prev").click(function() {
                    r.prev()
                })
            })
        },
        b = function() {
            $(".accommodation-room-details").on("click", ".accommodation-room-detail .btn-action", function() {
                var n = $(this).attr("data-name"),
                    t = $(".priceGrid tbody tr .name a:contains('" + n + "')");
                $w(t.closest("tr").find(".total a")[0]).trigger("click");
                $(this).hasClass("btn-change-dates") && $(".search-gadget .date").velocity("scroll", {
                    duration: 750,
                    offset: -$("header.top").outerHeight()
                })
            })
        },
        k = function() {
            $(".be-operator-details").on("click", ".priceGrid tbody .name", function() {
                var n = $(this).find("a").html();
                $(".accommodation-room-detail[data-name*='" + n + "']").velocity("scroll", {
                    duration: 750,
                    offset: -$("header.top").outerHeight()
                })
            })
        },
        d = function() {
            Modernizr.load({
                test: MutationObserver = window.MutationObserver || window.WebKitMutationObserver,
                nope: "/js/polyfills",
                complete: function() {
                    var n = new MutationObserver(function(n) {
                        n.forEach(function(n) {
                            for (var t = 0; t < n.addedNodes.length; t++) n.addedNodes[t].className === "priceGrid" && $(document).trigger("details.change.complete")
                        })
                    });
                    n.observe($(".be-operator-details")[0], {
                        subtree: !0,
                        childList: !0
                    });
                    $w.event.subscribe("region.refinetools.built", function() {
                        $(document).trigger("details.refinetools.built")
                    })
                }
            })
        },
        g = function() {
            $('head link[href="//gadgets.impartmedia.com/css/all.cssz"]').remove();
            n.BEOperatorID && (window.location.hash.length || (window.location.hash = "/accom/" + n.BEOperatorID), BE.gadget.details(".be-operator-details", {
                vcID: 202,
                productID: n.BEOperatorID,
                descriptionHover: !1,
                type: "accomm",
                showAllAccom: !0,
                showRoomDetails: !0,
                defaultDate: "18/11/2015",
                period: 7
            }))
        };
    return {
        init: f,
        data: e
    }
}();
puredrift = puredrift || {};
puredrift.accommodationsearch = function() {
    var y = $(".o"),
        n = function(n, a) {
            l();
            v(n, a);
            u();
            t();
            i();
            r(n);
            c();
            h();
            o();
            s();
            e();
            f()
        },
        t = function() {
            $(document).bind("search.change.complete", function() {
                var n = $(".prices-grid table tbody tr td.price span:contains($0)"),
                    t = null;
                t = n.parent().siblings(".property").find("a.name").attr("href");
                n.attr("title", "Price On Application").html("$POA").parent().siblings(".total").find("a").addClass("enquiry-only").removeAttr("onclick").on("click", function(n) {
                    n.preventDefault();
                    n.stopPropagation();
                    window.location.href = t
                }).prepend('<span class="btn-enquire"><span class="enquire">Enquire Now<\/span><span class="poa">$POA<\/span><\/span>')
            })
        },
        i = function() {
            $(document).bind("search.change.complete", function() {
                $(".prices-grid table tbody tr td.price span:contains($0)").attr("title", "Price On Application").html("$POA")
            })
        },
        r = function(n) {
            n.IsPopulated && $(document).bind("search.refinetools.built", function() {
                $(".search-gadget .showHideRefineTools a")[0].click()
            })
        },
        u = function() {
            $(document).bind("search.change.complete", function() {
                ga("send", "event", "Accommodation Search", "Date/Price View Change", "search.change.complete")
            });
            $(document).bind("search.refinetools.built", function() {
                ga("send", "event", "Accommodation Search", "Refine Tools Loaded", "search.refinetools.built")
            })
        },
        f = function() {
            $(".region-gadget").on("click", ".prices-grid table tr .total a.sold-out", function(n) {
                n.preventDefault();
                var t = {
                    duration: 400,
                    offset: -$("header.top").outerHeight()
                };
                $(".embedded-search").velocity("scroll", t)
            })
        },
        e = function() {
            $(".be-search-region").on("click", ".thumb", function() {
                var n = $(this).closest(".property").find("a.name");
                window.location.href = n.attr("href")
            })
        },
        o = function() {
            $(document).bind("search.change.complete", function() {
                var n = $(".prices-grid tbody tr:not(.grouping-header)").length,
                    t = $(".prices-grid tbody tr .total a").not(".sold-out").length;
                $(".result-count").html(n);
                $(".result-count-available").html(t);
                n == 1 && $(".result-count-pluralise").hide();
                $(".search-summary h2").css({
                    opacity: 1
                })
            })
        },
        s = function() {
            $(document).bind("search.change.complete", function() {
                $(".prices-grid .price.sold span").html("No Accommodation Available")
            })
        },
        h = function() {
            $(".btn-search, .btn-search-refine").on({
                click: function(n) {
                    n.preventDefault();
                    $("#app").removeClass("nav-active");
                    $(".nav-main").velocity("fadeOut", {
                        duration: 200
                    });
                    var t = {
                        duration: 400,
                        offset: -$("header.top").outerHeight()
                    };
                    $(".embedded-search").velocity("scroll", t)
                }
            })
        },
        c = function() {
            $(document).bind("search.refinetools.built", function() {
                $(".btn-view-map").on({
                    click: function(n) {
                        n.preventDefault();
                        $w(".region-gadget .view-choice .map").trigger("click")
                    }
                });
                $(".btn-view-grid").on({
                    click: function(n) {
                        n.preventDefault();
                        $w(".region-gadget .view-choice .price").trigger("click")
                    }
                })
            })
        },
        l = function() {
            Modernizr.load({
                test: MutationObserver = window.MutationObserver || window.WebKitMutationObserver,
                nope: "/js/polyfills",
                complete: function() {
                    var n = new MutationObserver(function(n) {
                        n.forEach(function(n) {
                            for (var t = 0; t < n.addedNodes.length; t++) n.addedNodes[t].className == "accom type-group" && $(document).trigger("search.change.complete")
                        })
                    });
                    n.observe($(".be-search-region")[0], {
                        subtree: !0,
                        childList: !0
                    });
                    $w.event.subscribe("region.refinetools.built", function() {
                        $(document).trigger("search.refinetools.built")
                    });
                    $w.event.subscribe("region.view.change", function() {
                        $(document).trigger("search.view.change")
                    })
                }
            })
        },
        a = function(n) {
            var t = {};
            return t.ignoreSearchCookie = n.IsPopulated, t.forceRegionState = "NSW", t.forceRegionRegion = "North Coast", n.Location && (t.forceRegionLoc = n.Location), n.CheckInJSON && (t.defaultDate = n.CheckInJSON), n.Nights && (t.period = n.Nights), n.Adults && (t.adults = n.Adults), n.Children && (t.children = n.Children), n.Type && (t.forceAccomType = n.Type), t
        },
        v = function(n, t) {
            window.BE_gadgetURLOverrides = t;
            var i = $.extend({
                vcID: 202,
                itemDetailPageURL: "/byron-bay-accommodation/{url}-{id}",
                defaultSort: "instant",
                accomOnlyMode: !0,
                collapseRefineTools: !0,
                showAllAccom: !0,
                enableRegionSearch: !0,
                showRoomDetails: !0,
                showList: !1,
                showLegend: !1,
                showMap: !1,
                advancedPriceView: ["Hotels / Motels / Resorts", "Houses", "Studio/Apartments", "B&B/Guesthouse", "Budget/Backpackers", "Chalets/Villas/Cottages"],
                disabledTypes: ["tours", "events", "carhire", "packages"]
            }, a(n));
            BE.gadget.region(".be-search-region", i);
            $('head link[href="//gadgets.impartmedia.com/css/all.cssz"]').remove()
        };
    return {
        init: n
    }
}();
puredrift = puredrift || {};
puredrift.confirmation = function() {
    var n = function() {
            i();
            t()
        },
        t = function() {},
        i = function() {
            $('head link[href="//gadgets.impartmedia.com/css/all.cssz"]').remove();
            BE.gadget.confirm(".confirm-message")
        };
    return {
        init: n
    }
}();
puredrift = puredrift || {};
puredrift.reservation = function() {
    var n = function() {
            t();
            i();
            r()
        },
        t = function() {
            $(document).bind("booking.form.built", function() {
                $(".spinner").hide()
            });
            $(document).bind("booking.form.error", function() {
                $(".spinner").hide()
            })
        },
        i = function() {
            Modernizr.load({
                test: MutationObserver = window.MutationObserver || window.WebKitMutationObserver,
                nope: "/js/polyfills",
                complete: function() {
                    var n = new MutationObserver(function(n) {
                        n.forEach(function(n) {
                            for (var i, t = 0; t < n.addedNodes.length; t++) i = n.addedNodes[t], i.className == "noItems" && $(document).trigger("booking.form.error"), i.className == "clear" && $(document).trigger("booking.form.built")
                        })
                    });
                    n.observe($(".be-booking")[0], {
                        subtree: !0,
                        childList: !0
                    })
                }
            })
        },
        r = function() {
            $('head link[href="//gadgets.impartmedia.com/css/all.cssz"]').remove();
            BE.gadget.book(".be-booking", {
                vcID: 202,
                confirmationURL: "/reservation-confirmation"
            })
        };
    return {
        init: n
    }
}();
puredrift = puredrift || {};
puredrift.cart = function() {
    var n = null,
        t = null,
        i = !1,
        u = function() {
            f();
            r(null)
        },
        f = function() {
            var t = window.BE.util ? window.BE.util.cookieName("seSsIoN") : null,
                i = window.getCookie ? window.getCookie(t) : null;
            n = {
                name: t,
                value: i
            }
        },
        e = function() {
            return t
        },
        o = function(n) {
            i = !1;
            r(n)
        },
        r = function(r) {
            $.ajax({
                dataType: "json",
                url: "//sjp.impartmedia.com/cart/getBECart?callback=?",
                data: {
                    q: !0,
                    key: n.value
                },
                success: function(n) {
                    i = !0;
                    t = n;
                    r && r()
                }
            })
        };
    return {
        init: u,
        json: e,
        refresh: o
    }
}();
puredrift = puredrift || {};
puredrift.subscription = function() {
    var n = $(".subscription-form"),
        t = $(".action-msg"),
        i = function() {
            u()
        },
        u = function() {
            f();
            r(null)
        },
        r = function(r) {
            t.html("").hide();
            $.ajax({
                type: "POST",
                url: n.attr("action"),
                data: n.serialize(),
                success: function(n) {
                    t.html(n).removeClass("error").addClass("success").fadeIn(400)
                },
                error: function(n) {
                    var i = n.status == 400 ? n.responseText : "Server error has occured.";
                    t.html(i).addClass("error").fadeIn(400)
                }
            })
        },
        u = function() {
            n.validate({
                rules: {
                    email: {
                        required: !0,
                        email: !0,
                        maxlength: 256
                    }
                },
                messages: {
                    email: {
                        required: "Please enter an email address to modify your subscription to Puredrift.",
                        email: "Please enter a valid email address (eg. yourname@somewhere.com)"
                    }
                },
                submitHandler: function() {
                    r()
                }
            })
        };
    return {
        init: i
    }
}()