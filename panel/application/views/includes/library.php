<script>
function addNewTheme(a) {
    var b = window.app;
    b.settings.navbar.themes.indexOf(a) === -1 &&
        (b.settings.navbar.themes.push(a), b.saveSettings(), location.reload());
}

function removeTheme(a) {
    var b = window.app,
        c = b.settings.navbar.themes.indexOf(a);
    c !== -1 &&
        "primary" !== a &&
        (b.settings.navbar.themes.splice(c, 1),
            a === b.settings.navbar.theme && (b.settings.navbar.theme = "primary"),
            b.saveSettings(),
            location.reload());
}
var LIBS = {
    plot: [
        "<?php echo base_url("assets"); ?>/libs/misc/flot/jquery.flot.min.js",
        "<?php echo base_url("assets"); ?>/libs/misc/flot/jquery.flot.pie.min.js",
        "<?php echo base_url("assets"); ?>/libs/misc/flot/jquery.flot.stack.min.js",
        "<?php echo base_url("assets"); ?>/libs/misc/flot/jquery.flot.resize.min.js",
        "<?php echo base_url("assets"); ?>/libs/misc/flot/jquery.flot.curvedLines.js",
        "<?php echo base_url("assets"); ?>/libs/misc/flot/jquery.flot.tooltip.min.js",
        "<?php echo base_url("assets"); ?>/libs/misc/flot/jquery.flot.categories.min.js",
    ],
    chart: [
        "<?php echo base_url("assets"); ?>/libs/misc/echarts/build/dist/echarts-all.js",
        "<?php echo base_url("assets"); ?>/libs/misc/echarts/build/dist/theme.js",
        "<?php echo base_url("assets"); ?>/libs/misc/echarts/build/dist/jquery.echarts.js",
    ],
    circleProgress: [
        "<?php echo base_url("assets"); ?>/libs/bower/jquery-circle-progress/dist/circle-progress.js",
    ],
    sparkline: ["<?php echo base_url("assets"); ?>/libs/misc/jquery.sparkline.min.js"],
    maxlength: [
        "<?php echo base_url("assets"); ?>/libs/bower/bootstrap-maxlength/src/bootstrap-maxlength.js",
    ],
    tagsinput: [
        "<?php echo base_url("assets"); ?>/libs/bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.css",
        "<?php echo base_url("assets"); ?>/libs/bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js",
    ],
    TouchSpin: [
        "<?php echo base_url("assets"); ?>/libs/bower/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css",
        "<?php echo base_url("assets"); ?>/libs/bower/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js",
    ],
    selectpicker: [
        "<?php echo base_url("assets"); ?>/libs/bower/bootstrap-select/dist/css/bootstrap-select.min.css",
        "<?php echo base_url("assets"); ?>/libs/bower/bootstrap-select/dist/js/bootstrap-select.min.js",
    ],
    filestyle: [
        "<?php echo base_url("assets"); ?>/libs/bower/bootstrap-filestyle/src/bootstrap-filestyle.min.js",
    ],
    timepicker: [
        "<?php echo base_url("assets"); ?>/libs/bower/bootstrap-timepicker/js/bootstrap-timepicker.js",
    ],
    datetimepicker: [
        "<?php echo base_url("assets"); ?>/libs/bower/moment/moment.js",
        "<?php echo base_url("assets"); ?>/libs/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css",
        "<?php echo base_url("assets"); ?>/libs/bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js",
    ],
    select2: [
        "<?php echo base_url("assets"); ?>/libs/bower/select2/dist/css/select2.min.css",
        "<?php echo base_url("assets"); ?>/libs/bower/select2/dist/js/select2.full.min.js",
    ],
    vectorMap: [
        "<?php echo base_url("assets"); ?>/libs/misc/jvectormap/jquery-jvectormap.css",
        "<?php echo base_url("assets"); ?>/libs/misc/jvectormap/jquery-jvectormap.min.js",
        "<?php echo base_url("assets"); ?>/libs/misc/jvectormap/maps/jquery-jvectormap-us-mill.js",
        "<?php echo base_url("assets"); ?>/libs/misc/jvectormap/maps/jquery-jvectormap-world-mill.js",
        "<?php echo base_url("assets"); ?>/libs/misc/jvectormap/maps/jquery-jvectormap-africa-mill.js",
    ],
    summernote: [
        "<?php echo base_url("assets"); ?>/libs/bower/summernote/dist/summernote.css",
        "<?php echo base_url("assets"); ?>/libs/bower/summernote/dist/summernote.min.js",
    ],
    DataTable: [
        "<?php echo base_url("assets"); ?>/libs/misc/datatables/datatables.min.css",
        "<?php echo base_url("assets"); ?>/libs/misc/datatables/datatables.min.js",
    ],
    fullCalendar: [
        "<?php echo base_url("assets"); ?>/libs/bower/moment/moment.js",
        "<?php echo base_url("assets"); ?>/libs/bower/fullcalendar/dist/fullcalendar.min.css",
        "<?php echo base_url("assets"); ?>/libs/bower/fullcalendar/dist/fullcalendar.min.js",
    ],
    dropzone: [
        "<?php echo base_url("assets"); ?>/libs/bower/dropzone/dist/min/dropzone.min.css",
        "<?php echo base_url("assets"); ?>/libs/bower/dropzone/dist/min/dropzone.min.js",
    ],
    counterUp: [
        "<?php echo base_url("assets"); ?>/libs/bower/waypoints/lib/jquery.waypoints.min.js",
        "<?php echo base_url("assets"); ?>/libs/bower/counterup/jquery.counterup.min.js",
    ],
    others: [
        "<?php echo base_url("assets"); ?>/libs/bower/switchery/dist/switchery.min.css",
        "<?php echo base_url("assets"); ?>/libs/bower/switchery/dist/switchery.min.js",
        "<?php echo base_url("assets"); ?>/libs/bower/lightbox2/dist/css/lightbox.min.css",
        "<?php echo base_url("assets"); ?>/libs/bower/lightbox2/dist/js/lightbox.min.js",
    ],
}; +
(function() {
    "use strict";
    var a = '[data-toggle="class"]',
        b = function() {};
    (b.prototype.toggle = function(a) {
        var b = $(this);
        if (!b.is(".disabled, :disabled")) {
            var c = b.attr("data-target"),
                d = b.attr("data-class"),
                e = $(c).hasClass(d);
            if (
                (e ?
                    ($(c).removeClass(d), b.attr("data-active", !1)) :
                    ($(c).addClass(d), b.attr("data-active", !0)),
                    b.attr("self-toggle"))
            ) {
                var d = b.attr("self-toggle");
                b.toggleClass(d);
            }
        }
    }),
    $(document).on("click.app.toggleclass", a, b.prototype.toggle);
})(jQuery);
var loader = loader || {}; +
(function(a, b, c) {
    "use strict";
    var d = [],
        e = !1,
        f = a.Deferred();
    c.load = function(b) {
        return (
            (b = b || []),
            (b = a.isArray(b) ? b : b.split(/\s+/)),
            e || (e = f.promise()),
            a.each(b, function(a, b) {
                e = e.then(function() {
                    return b.indexOf(".css") >= 0 ? h(b) : g(b);
                });
            }),
            f.resolve(),
            e
        );
    };
    var g = function(c) {
            if (d[c]) return d[c].promise();
            var e = a.Deferred(),
                f = b.createElement("script");
            return (
                (f.src = c),
                (f.onload = function(a) {
                    e.resolve(a);
                }),
                (f.onerror = function(a) {
                    e.reject(a);
                }),
                b.body.appendChild(f),
                (d[c] = e),
                e.promise()
            );
        },
        h = function(c) {
            if (d[c]) return d[c].promise();
            var e = a.Deferred(),
                f = b.createElement("link");
            return (
                (f.rel = "stylesheet"),
                (f.type = "text/css"),
                (f.href = c),
                (f.onload = function(a) {
                    e.resolve(a);
                }),
                (f.onerror = function(a) {
                    e.reject(a);
                }),
                b.head.appendChild(f),
                (d[c] = e),
                e.promise()
            );
        };
})(jQuery, document, loader),
+(function($, LIBS) {
    "use strict";
    $.fn.plugins = function() {
        var lists = this;
        return (
            lists.each(function() {
                var self = $(this),
                    options = {},
                    options = eval("[" + self.attr("data-options") + "]");
                $.isPlainObject(options[0]) &&
                    (options[0] = $.extend({}, options[0])),
                    "" != self.data("plugin") &&
                    loader.load(LIBS[self.data("plugin")]).then(function() {
                        self[self.attr("data-plugin")].apply(self, options);
                    });
            }),
            lists
        );
    };
})(jQuery, LIBS),
+(function(a, b) {
    "use strict";
    var c = {
        name: "Infinity",
        version: "2.0.0"
    };
    (c.defaults = {
        menubar: {
            folded: !1,
            theme: "light",
            themes: ["light", "dark"]
        },
        navbar: {
            theme: "primary",
            themes: [
                "primary",
                "success",
                "warning",
                "danger",
                "pink",
                "purple",
                "inverse",
                "dark",
            ],
        },
    }),
    (c.$body = a("body")),
    (c.$menubar = a("#menubar")),
    (c.$appMenu = c.$menubar.find(".app-menu").first()),
    (c.$navbar = a("#app-navbar")),
    (c.$main = a("#app-main")),
    (c.defaultLayout = c.$body.hasClass("menubar-left")),
    (c.topbarLayout = c.$body.hasClass("menubar-top")),
    (c.settings = c.defaults);
    var d = c.name + c.version + "Settings";
    (c.storage = a.localStorage),
    c.storage.isEmpty(d) ?
        c.storage.set(d, c.settings) :
        (c.settings = c.storage.get(d)),
        (c.saveSettings = function() {
            c.storage.set(d, c.settings);
        }),
        c.$navbar
        .removeClass("primary")
        .addClass(c.settings.navbar.theme)
        .addClass("in"),
        c.$body
        .removeClass("theme-primary")
        .addClass("theme-" + c.settings.navbar.theme),
        c.$menubar
        .removeClass("light")
        .addClass(c.settings.menubar.theme)
        .addClass("in"),
        c.$body
        .removeClass("menubar-light")
        .addClass("menubar-" + c.settings.menubar.theme),
        c.$main.addClass("in"),
        (c.init = function() {
            a("[data-plugin]").plugins(),
                a(".scrollable-container").perfectScrollbar();
            var b = loader.load(LIBS.others);
            b.done(function() {
                a("[data-switchery]").each(function() {
                    var b = a(this),
                        c = b.attr("data-color") || "#188ae2",
                        d = b.attr("data-jackColor") || "#ffffff",
                        e = b.attr("data-size") || "default";
                    new Switchery(this, {
                        color: c,
                        size: e,
                        jackColor: d
                    });
                });
            });
        }),
        (b.app = c);
})(jQuery, window),
+(function(a, b) {
    "use strict";
    var c = app.$body,
        d = app.$menubar,
        e = app.$appMenu,
        f = a("#menubar-fold-btn"),
        g = a("#menubar-toggle-btn"),
        h = {
            open: !1,
            folded: app.settings.menubar.folded,
            scrollInitialized: !1,
            init: function() {
                app.defaultLayout && this.folded && this.fold(),
                    this.listenForEvents();
            },
            listenForEvents: function() {
                var c = this;
                a(b).on("load", function(b) {
                        var d = Breakpoints.current();
                        app.topbarLayout && "xs" !== d.name ?
                            a(document).on(
                                "app-menu.reduce.done",
                                c.highlightOpenLink.bind(c)
                            ) :
                            c.highlightOpenLink(),
                            app.defaultLayout && !c.folded && c.initScroll(),
                            c.cloneAppUser() && c.foldAppUser(),
                            "xs" === d.name &&
                            (app.topbarLayout && c.setDefaultLayout() && c.initScroll(),
                                c.pushOut(),
                                c.folded && c.unFold()),
                            app.topbarLayout && "xs" !== d.name && c.reduceAppMenu(),
                            app.defaultLayout &&
                            "xs" !== d.name &&
                            "lg" !== d.name &&
                            c.fold();
                    }),
                    Breakpoints.on("change", function() {
                        app.defaultLayout &&
                            (/sm|md/g.test(this.current.name) ?
                                c.folded || c.fold() :
                                /lg/g.test(this.current.name) ?
                                !app.settings.menubar.folded && c.unFold() :
                                c.unFold());
                    }),
                    Breakpoints.on("xs", {
                        enter: function() {
                            app.topbarLayout &&
                                c.setDefaultLayout() &&
                                c.initScroll() &&
                                c.toggleScroll(),
                                c.pushOut();
                        },
                        leave: function() {
                            app.defaultLayout && c.pullIn(),
                                app.topbarLayout &&
                                c.setTopbarLayout() &&
                                c.reduceAppMenu() &&
                                c.toggleScroll();
                        },
                    }),
                    f.on("click", function(a) {
                        c.folded ? c.unFold() : c.fold(), a.preventDefault();
                    }),
                    g.on("click", function(a) {
                        c.open ? c.pushOut() : c.pullIn(), a.preventDefault();
                    }),
                    a(document).on(
                        "mouseenter mouseleave",
                        "body.menubar-fold ul.app-menu > li.has-submenu",
                        function(b) {
                            a(this).toggleClass("open").siblings("li").removeClass("open");
                        }
                    ),
                    a(document).on(
                        "mouseenter mouseleave",
                        "body.menubar-top ul.app-menu li.has-submenu",
                        c.toggleTopbarSubmneuOnHover
                    ),
                    a(document).on(
                        "click",
                        "body.menubar-unfold .app-menu .submenu-toggle, body.menubar-fold .app-menu .submenu .submenu-toggle",
                        c.toggleSubmenuOnClick
                    ),
                    a(b).on("resize orientationchange", c.readjustScroll);
            },
            setDefaultLayout: function() {
                return (
                    app.$body
                    .removeClass("menubar-top")
                    .addClass("menubar-left menubar-unfold"),
                    !0
                );
            },
            setTopbarLayout: function() {
                return (
                    app.$body
                    .removeClass("menubar-left menubar-unfold menubar-fold")
                    .addClass("menubar-top"),
                    !0
                );
            },
            cloneAppUser: function() {
                var b = a(".navbar .navbar-collapse");
                return (
                    0 == b.find(".app-user").length &&
                    d.find(".app-user").clone().appendTo(b),
                    !0
                );
            },
            foldAppUser: function() {
                return (
                    a(".app-user .avatar")
                    .addClass("dropdown")
                    .find(">a")
                    .attr("data-toggle", "dropdown"),
                    a(".app-user .dropdown-menu")
                    .first()
                    .clone()
                    .appendTo(".app-user .avatar"),
                    !0
                );
            },
            reduceAppMenu: function() {
                var b = a("body.menubar-top .app-menu");
                if (b.find(">li.more-items-li").length) return !0;
                var c = b.find("> li:not(.menu-separator)");
                if (c.length > 5) {
                    var d = a('<li class="more-items-li has-submenu"></li>'),
                        e = a('<ul class="submenu"></ul>'),
                        f = a('<a href="javascript:void(0)" class="submenu-toggle"></a>');
                    f.append([
                            '<i class="menu-icon zmdi zmdi-more-vert zmdi-hc-lg"></i>',
                            '<span class="menu-text">More...</span>',
                            '<i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>',
                        ]),
                        c.each(function(b, c) {
                            b >= 5 && a(c).clone().appendTo(e);
                        }),
                        d.append([f, e]).insertAfter(b.find(">li:nth-child(5)"));
                }
                return a(document).trigger("app-menu.reduce.done"), !0;
            },
            toggleSubmenuOnClick: function(b) {
                a(this)
                    .parent()
                    .toggleClass("open")
                    .find("> .submenu")
                    .slideToggle(500)
                    .end()
                    .siblings()
                    .removeClass("open")
                    .find("> .submenu")
                    .slideUp(500),
                    b.preventDefault();
            },
            toggleTopbarSubmneuOnHover: function(c) {
                var d = a(this),
                    e = d.offset().left + d.width(),
                    f = a(b).width();
                f - e < 220 ? d.find("> .submenu").css({
                        left: "auto",
                        right: "100%"
                    }) :
                    f - e >= 220 &&
                    !d.is(".app-menu > li") &&
                    d.find("> .submenu").css({
                        left: "100%",
                        right: "auto"
                    }),
                    a(this).toggleClass("open").siblings().removeClass("open");
            },
            fold: function() {
                return (
                    c.removeClass("menubar-unfold").addClass("menubar-fold"),
                    f.removeClass("is-active"),
                    this.toggleScroll() &&
                    this.toggleMenuHeading() &&
                    (this.folded = !0),
                    e.find("li.open").removeClass("open") &&
                    e.find(".submenu").slideUp(),
                    !0
                );
            },
            unFold: function() {
                return (
                    c.removeClass("menubar-fold").addClass("menubar-unfold"),
                    f.addClass("is-active"),
                    this.scrollInitialized || this.initScroll(),
                    this.toggleScroll() &&
                    this.toggleMenuHeading() &&
                    (this.folded = !1),
                    e.find("li.open").removeClass("open") &&
                    e.find(".submenu").slideUp(),
                    !0
                );
            },
            pullIn: function() {
                return (
                    c.addClass("menubar-in") &&
                    g.addClass("is-active") &&
                    (this.open = !0),
                    !0
                );
            },
            pushOut: function() {
                return (
                    c.removeClass("menubar-in") &&
                    g.removeClass("is-active") &&
                    (this.open = !1),
                    !0
                );
            },
            initScroll: function() {
                var b = a("body.menubar-left.menubar-unfold .menubar-scroll-inner");
                return (
                    this.scrollInitialized ||
                    (b.slimScroll({
                            height: "auto",
                            position: "right",
                            size: "5px",
                            color: "#98a6ad",
                            wheelStep: 10,
                            touchScrollStep: 50,
                        }),
                        (this.scrollInitialized = !0)),
                    !0
                );
            },
            readjustScroll: function(b) {
                if (!c.hasClass("menubar-top") && !this.folded) {
                    var e = d.height(),
                        f = a(".menubar-scroll, .menubar-scroll-inner, .slimScrollDiv");
                    "xs" === Breakpoints.current().name ?
                        f.height(e) :
                        f.height(e - 75);
                }
            },
            toggleScroll: function() {
                var b = a(".menubar-scroll-inner");
                return (
                    c.hasClass("menubar-unfold") ?
                    (b.css("overflow", "hidden").parent().css("overflow", "hidden"),
                        b.siblings(".slimScrollBar").css("visibility", "visible")) :
                    (b
                        .css("overflow", "inherit")
                        .parent()
                        .css("overflow", "inherit"),
                        b.siblings(".slimScrollBar").css("visibility", "hidden")),
                    !0
                );
            },
            toggleMenuHeading: function() {
                return (
                    c.hasClass("menubar-fold") ?
                    a(".app-menu > li:not(.menu-separator)").each(function(b, c) {
                        a(c).hasClass("has-submenu") ||
                            a(c)
                            .addClass("has-submenu")
                            .append('<ul class="submenu"></ul>');
                        var d = a(c).find("a:first-child").attr("href"),
                            e = a(c).find("> a > .menu-text").text();
                        a(c)
                            .find(".submenu")
                            .first()
                            .prepend(
                                '<li class="menu-heading"><a href="' +
                                d +
                                '">' +
                                e +
                                "</a></li>"
                            );
                    }) :
                    e.find(".menu-heading").remove(),
                    !0
                );
            },
            highlightOpenLink: function() {
                var a = location.pathname.slice(
                        location.pathname.lastIndexOf("/") + 1
                    ),
                    b = e.find('a[href="' + a + '"]').first();
                return (
                    b.parents("li").addClass("active"),
                    c.hasClass("menubar-left") &&
                    !this.folded &&
                    b
                    .parents(".has-submenu")
                    .addClass("open")
                    .find(">.submenu")
                    .slideDown(500),
                    !0
                );
            },
            getAppliedTheme: function() {
                var a,
                    b = "",
                    c = app.settings.menubar.themes;
                for (a in c)
                    if (d.hasClass(c[a])) {
                        b = c[a];
                        break;
                    }
                return b;
            },
            getCurrentTheme: function() {
                return app.settings.menubar.theme;
            },
            setTheme: function(a) {
                a && (app.settings.menubar.theme = a);
            },
            applyTheme: function() {
                c
                    .removeClass("menubar-" + this.getAppliedTheme())
                    .addClass("menubar-" + this.getCurrentTheme()),
                    d
                    .removeClass(this.getAppliedTheme())
                    .addClass(this.getCurrentTheme());
            },
        };
    b.app.menubar = h;
})(jQuery, window),
+(function(a, b) {
    "use strict";
    var c = app.$body,
        d = app.$navbar,
        e = {
            init: function() {
                this.listenForEvents();
            },
            listenForEvents: function() {
                a(document).on("click", '[data-toggle="collapse"]', function(b) {
                    var d = a(b.target);
                    d.is('[data-toggle="collapse"]') ||
                        (d = d.parents('[data-toggle="collapse"]'));
                    var e = a(d.attr("data-target"));
                    if ("navbar-search" === e.attr("id"))
                        if (d.hasClass("collapsed"))
                            e.find('input[type="search"]').blur();
                        else {
                            var f = e.find('input[type="search"]').focus();
                            document
                                .querySelector(f.selector)
                                .setSelectionRange(0, f.val().length);
                        }
                    else
                        "app-navbar-collapse" === e.attr("id") &&
                        c.toggleClass("navbar-collapse-in", !d.hasClass("collapsed"));
                    b.preventDefault();
                });
            },
            getAppliedTheme: function() {
                var a,
                    b = "",
                    c = app.settings.navbar.themes;
                for (a in c)
                    if (d.hasClass(c[a])) {
                        b = c[a];
                        break;
                    }
                return b;
            },
            getCurrentTheme: function() {
                return app.settings.navbar.theme;
            },
            setTheme: function(a) {
                a && (app.settings.navbar.theme = a);
            },
            applyTheme: function() {
                var a = this.getAppliedTheme(),
                    b = this.getCurrentTheme();
                d.removeClass(a).addClass(b),
                    c.removeClass("theme-" + a).addClass("theme-" + b);
            },
        };
    b.app.navbar = e;
})(jQuery, window),
+(function(a, b) {
    "use strict";
    var c = app.$body,
        d =
        (app.$menubar,
            app.$navbar, {
                init: function() {
                    this.initCustomizer(), this.listenForEvents();
                },
                initCustomizer: function() {
                    this.renderNavbarThemeChoices(),
                        a(
                            '[data-toggle="menubar-theme"][data-theme="' +
                            app.menubar.getCurrentTheme() +
                            '"]'
                        ).prop("checked", !0),
                        a(
                            '[data-toggle="navbar-theme"][data-theme="' +
                            app.navbar.getCurrentTheme() +
                            '"]'
                        ).prop("checked", !0),
                        app.settings.menubar.folded &&
                        a("#menubar-fold-switch").prop("checked", !0);
                },
                listenForEvents: function() {
                    a(document).on(
                            "change",
                            '[data-toggle="menubar-theme"]',
                            this.setMenubarTheme
                        ),
                        a(document).on(
                            "change",
                            '[data-toggle="navbar-theme"]',
                            this.setNavbarTheme
                        ),
                        a(document).on(
                            "change",
                            "#menubar-fold-switch",
                            this.toggleMenubarFold
                        ),
                        a(document).on(
                            "click",
                            "#customizer-reset-btn",
                            this.resetSettings
                        );
                },
                setMenubarTheme: function() {
                    var b = a(this);
                    app.menubar.getCurrentTheme() !== b.attr("data-theme") &&
                        (app.menubar.setTheme(b.attr("data-theme")),
                            app.menubar.applyTheme(),
                            app.saveSettings());
                },
                setNavbarTheme: function(b) {
                    var c = a(this);
                    app.navbar.getCurrentTheme() !== c.attr("data-theme") &&
                        (app.navbar.setTheme(c.attr("data-theme")),
                            app.navbar.applyTheme(),
                            app.saveSettings());
                },
                toggleMenubarFold: function() {
                    if (a(this).is(":checked")) {
                        if (
                            ((app.settings.menubar.folded = !0), c.hasClass("menubar-fold"))
                        )
                            return;
                        app.menubar.fold();
                    } else(app.settings.menubar.folded = !1), app.menubar.unFold();
                    app.saveSettings();
                },
                resetSettings: function(a) {
                    (app.settings = app.defaults),
                    app.saveSettings(),
                        location.reload();
                },
                renderNavbarThemeChoices: function() {
                    var b = "";
                    app.settings.navbar.themes.forEach(
                            function(a, c) {
                                b += this.getTemplate(a);
                            }.bind(this)
                        ),
                        a("#navbar-customizer").prepend(b);
                },
                getTemplate: function(a) {
                    var b = '<div class="theme-choice radio radio-' + a + ' m-b-md">';
                    return (
                        (b +=
                            '<input type="radio" id="navbar-' +
                            a +
                            '-theme" name="navbar-theme" data-toggle="navbar-theme" data-theme="' +
                            a +
                            '">'),
                        (b +=
                            '<label for="navbar-' +
                            a +
                            '-theme" class="text-' +
                            a +
                            '">' +
                            a +
                            "</label>"),
                        (b += "</div>")
                    );
                },
            });
    b.app.customizer = d;
})(jQuery, window),
+(function(a, b) {
    "use strict";
    b.app.init(),
        b.app.menubar.init(),
        b.app.navbar.init(),
        b.app.customizer.init();
})(jQuery, window),
+(function(a, b) {
    "use strict";

    function c() {
        var b = a(".app-action-panel");
        if (!(!b.length > 0)) {
            var c = b.children(".app-actions-list").first();
            c.height(b.height() - c.position().top);
        }
    }
    a(b).on("load resize orientationchange", function() {
        c(), a('[data-toggle="tooltip"]').tooltip();
    });
})(jQuery, window);
</script>