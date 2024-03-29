"use strict";

(function(w, d, $, ajax) {
    $(function() {
        console.log("%cThe website developed by BRAIN WORKS — https://brainworks.pro/", "color: blue");
        console.log("%cСайт разработан в BRAIN WORKS — https://brainworks.pro/", "color: blue");
        var $w = $(w);
        var $d = $(d);
        var html = $("html");
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        if (isMobile) {
            html.addClass("is-mobile");
        }
        html.removeClass("no-js").addClass("js");
        dropdownPhone();
        scrollToElement();
        sidebarAccordion();
        updateCartTotalValue("#modal-cart");
        reviews(".js-reviews");
        scrollTop(".js-scroll-top");
        wrapHighlightedElements(".highlighted");
        if (ajax) {
            ajaxLoadMorePosts(".js-load-more", ".js-ajax-posts");
        }
        stickFooter(".js-footer", ".js-container");
        anotherHamburgerMenu(".js-menu", ".js-hamburger", ".js-menu-close");
        buyOneClick(".one-click-ru, .one-click-uk, .one-click-en, .one-click", '[data-field-id="field11"]', "h1");
        $d.on("copy", addLink);
        $w.on("resize", function() {
            if ($w.innerWidth() >= 630) {
                removeAllStyles($(".js-menu"));
            }
        });
        addLightBoxHandlerForImage(".wpgis-slider-for");
    });
    var dropdownPhone = function dropdownPhone() {
        var dropDownBtn = $(".js-dropdown");
        var dropDownList = $(".js-phone-list");
        dropDownBtn.on("click", function() {
            $(this).toggleClass("active").siblings(".js-phone-list").fadeToggle(300);
        });
        $(document).on("click", function(event) {
            if ($(event.target).closest(".js-dropdown, .js-phone-list").length) return;
            dropDownList.fadeOut(300);
            dropDownBtn.removeClass("active");
        });
    };
    var stickFooter = function stickFooter(footer, container) {
        var previousHeight, currentHeight;
        var offset = 0;
        var $footer = $(footer);
        var $container = $(container);
        currentHeight = $footer.outerHeight() + offset + "px";
        previousHeight = currentHeight;
        $container.css("paddingBottom", currentHeight);
        $(window).on("resize", function() {
            currentHeight = $footer.outerHeight() + offset + "px";
            if (previousHeight !== currentHeight) {
                $container.css("paddingBottom", currentHeight);
            }
        });
    };
    var reviews = function reviews(container) {
        var element = $(container);
        if (element.children().length > 1 && typeof $.fn.slick === "function") {
            element.slick({
                adaptiveHeight: false,
                autoplay: false,
                autoplaySpeed: 3e3,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev">&lsaquo;</button>',
                nextArrow: '<button type="button" class="slick-next">&rsaquo;</button>',
                dots: false,
                dotsClass: "slick-dots",
                draggable: true,
                fade: false,
                infinite: true,
                responsive: [ {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                } ],
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 300,
                swipe: true,
                zIndex: 10
            });
        }
    };
    var anotherHamburgerMenu = function anotherHamburgerMenu(menuElement, hamburgerElement, closeTrigger) {
        var Elements = {
            menu: $(menuElement),
            button: $(hamburgerElement),
            close: $(closeTrigger)
        };
        Elements.button.add(Elements.close).on("click", function() {
            Elements.menu.toggleClass("is-active");
        });
        Elements.menu.find("a").on("click", function() {
            Elements.menu.removeClass("is-active");
        });
        var arrowOpener = function arrowOpener(parent) {
            var activeArrowClass = "menu-item-has-children-arrow-active";
            return $("<button />").addClass("menu-item-has-children-arrow").on("click", function() {
                parent.children(".sub-menu").eq(0).slideToggle(300);
                if ($(this).hasClass(activeArrowClass)) {
                    $(this).removeClass(activeArrowClass);
                } else {
                    $(this).addClass(activeArrowClass);
                }
            });
        };
        var items = Elements.menu.find(".menu-item-has-children, .sub-menu-item-has-children");
        for (var i = 0; i < items.length; i++) {
            items.eq(i).append(arrowOpener(items.eq(i)));
        }
    };
    var removeAllStyles = function removeAllStyles(elementParent) {
        elementParent.find(".sub-menu").removeAttr("style");
    };
    var wrapHighlightedElements = function wrapHighlightedElements(elements) {
        elements = $(elements);
        var i, highlightedHeader;
        for (i = 0; i < elements.length; i++) {
            highlightedHeader = elements.eq(i);
            highlightedHeader.wrap('<div style="display: block;"></div>');
        }
    };
    var buyOneClick = function buyOneClick(button, field, headline) {
        var btn = $(button);
        if (btn.length) {
            btn.on("click", function() {
                $(field).prop("disabled", true).val($(headline).text());
            });
        }
    };
    var scrollTop = function scrollTop(element) {
        var el = $(element);
        el.on("click touchend", function() {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            return false;
        });
        var scrollPosition;
        $(window).on("scroll", function() {
            scrollPosition = $(this).scrollTop();
            if (scrollPosition > 200) {
                if (!el.hasClass("is-visible")) {
                    el.addClass("is-visible");
                }
            } else {
                el.removeClass("is-visible");
            }
        });
    };
    var addLink = function addLink() {
        var body = document.body || document.getElementsByTagName("body")[0];
        var selection = window.getSelection();
        var page_link = "\n Источник: " + document.location.href;
        var copy_text = selection + page_link;
        var div = document.createElement("div");
        div.style.position = "absolute";
        div.style.left = "-9999px";
        body.appendChild(div);
        div.innerText = copy_text;
        selection.selectAllChildren(div);
        window.setTimeout(function() {
            body.removeChild(div);
        }, 0);
    };
    var scrollToElement = function scrollToElement() {
        var animationSpeed = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 400;
        var links = $("a");
        links.each(function(index, element) {
            var $element = $(element), href = $element.attr("href");
            if (href) {
                if (href[0] === "#" || href.slice(0, 2) === "/#" && !(href.slice(1, 3) === "__")) {
                    $element.on("click", function(e) {
                        e.preventDefault();
                        var target = $(href[0] === "#" ? href : href.slice(1));
                        var fixedHeader = $(".fixed-to-top");
                        var fixOffset = 20;
                        var scrollBlockOffset;
                        if (target.length && href.slice(0, 3) !== "#__") {
                            if (fixedHeader.length > 0 && $(window).width() > 1024) {
                                scrollBlockOffset = fixedHeader.outerHeight() + fixOffset;
                            } else if (fixedHeader.length >= 0 && $(window).width() < 1024) {
                                scrollBlockOffset = $(".nav-mobile-header").outerHeight() + fixOffset;
                            } else {
                                scrollBlockOffset = fixOffset;
                            }
                            $("html, body").animate({
                                scrollTop: target.offset().top - scrollBlockOffset
                            }, animationSpeed);
                        } else if (href[0] === "/") {
                            location.href = href;
                        }
                    });
                }
            }
        });
    };
    var sidebarAccordion = function sidebarAccordion() {
        var sidebarMenu = $(".left-sidebar .widget_nav_menu");
        var items = sidebarMenu.find("li");
        var subMenu = items.find(".sub-menu");
        if (subMenu.length) {
            subMenu.each(function(index, value) {
                $(value).parent().first().append('<i class="trigger"></i>');
            });
        }
        var classAction = "is-opened";
        var trigger = items.find(".trigger");
        trigger.on("click", function() {
            var el = $(this), parent = el.parent();
            if (parent.hasClass(classAction)) {
                parent.removeClass(classAction);
            } else {
                parent.addClass(classAction);
            }
        });
    };
    var ajaxLoadMorePosts = function ajaxLoadMorePosts(selector, container) {
        var btn = $(selector);
        var storage = $(container);
        if (!btn.length && !storage.length) return;
        var data, ajaxStart;
        data = {
            action: ajax.action,
            nonce: ajax.nonce,
            paged: 1
        };
        btn.on("click", function() {
            if (ajaxStart) return;
            ajaxStart = true;
            btn.addClass("is-loading");
            $.ajax({
                url: ajax.url,
                method: "POST",
                dataType: "json",
                data: data
            }).done(function(response) {
                var posts = response.data;
                storage.append(response.data);
                data.paged += 1;
                ajaxStart = false;
                btn.removeClass("is-loading");
                if (posts === "") {
                    btn.remove();
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                ajaxStart = false;
                throw new Error("Handling Ajax request loading posts has caused an ".concat(textStatus, " - ").concat(errorThrown));
            });
        });
    };
    var addLightBoxHandlerForImage = function addLightBoxHandlerForImage(sliderContainer) {
        $(window).on("load", function() {
            var slider = $(sliderContainer);
            if (slider.length) {
                slider.find("img").each(function(index, element) {
                    var el = $(element);
                    el.on("click", function(event) {
                        event.preventDefault();
                        event.stopPropagation();
                        el.parents(".slick-slide").find(".wpgis-popup").click();
                    });
                });
            }
        });
    };
    $(".js-hamburger").on("click", function() {
        $("body").addClass("body-overflow");
    });
    $(".js-menu-close, .menu-link").on("click", function() {
        $("body").removeClass("body-overflow");
    });
    $('.form-cover input[type="text"]').on("focus", function() {
        $.fancybox.destroy();
    });
    var updateCartTotalValue = function updateCartTotalValue(elemId) {
        localStorage.setItem("currency", $("#cyr-value").val());
        var totalId = $(elemId);
        if ($(elemId).length > 0) {
            $(document).bind("ajaxStop.mine", function() {
                if ($(".shop_table").length > 0) {
                    totalId.css("pointerEvents", "none");
                    var checkoutTotalValue = $(".shop_table .amount").text();
                    totalId.find(".amount").first().text(checkoutTotalValue);
                }
                if (sessionStorage.getItem(wc_cart_fragments_params.fragment_name) !== null) {
                    var sessionHash = sessionStorage.getItem(wc_cart_fragments_params.fragment_name);
                    var parseValue = JSON.parse(sessionHash);
                    var totalValueCart;
                    var totalValueCyr;
                    $.each(parseValue, function(key, value) {
                        if (key == "div.widget_shopping_cart_content") {
                            var cartModalContent = $(value).text();
                            var cartContentString = cartModalContent.split(":").pop();
                            totalValueCart = Array.from(cartContentString.split("."))[0];
                            totalValueCyr = localStorage.getItem("currency");
                        } else if ($(".cart-contents-count").text() < 1) {
                            totalId.find(".amount").first().text("0 " + totalValueCyr);
                        } else {
                            totalId.find(".amount").first().text(totalValueCart + ".");
                        }
                    });
                }
            });
        }
    };
    $(window).load(function() {
        $(document.body).trigger("wc_fragment_refresh");
    });
})(window, document, jQuery, window.jpAjax);