<!DOCTYPE html>

<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="https://mcanp.org/en/xmlrpc.php">
    <title>{{ __('header.app_name') }} - {{ __('header.app_name') }}</title>
    <meta name="robots" content="max-image-preview:large">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//use.fontawesome.com">
    <link rel="alternate" type="application/rss+xml" title="{{ __('header.app_name') }} » Feed"
        href="https://mcanp.org/en/feed/">
    <link rel="alternate" type="application/rss+xml" title="{{ __('header.app_name') }} » Comments Feed"
        href="https://mcanp.org/en/comments/feed/">

    {{-- @vite(['resources/css/app.css','resources/js/app.js'])  --}}
    <script type="text/javascript">
        /* <![CDATA[ */
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "https:\/\/mcanp.org\/en\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.5.5"
            }
        };
        /*! This file is auto-generated */
        ! function(i, n) {
            var o, s, e;

            function c(e) {
                try {
                    var t = {
                        supportTests: e,
                        timestamp: (new Date).valueOf()
                    };
                    sessionStorage.setItem(o, JSON.stringify(t))
                } catch (e) {}
            }

            function p(e, t, n) {
                e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
                var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data),
                    r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e
                        .getImageData(0, 0, e.canvas.width, e.canvas.height).data));
                return t.every(function(e, t) {
                    return e === r[t]
                })
            }

            function u(e, t, n) {
                switch (t) {
                    case "flag":
                        return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !
                            n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e,
                                "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f",
                                "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"
                            );
                    case "emoji":
                        return !n(e, "\ud83d\udc26\u200d\u2b1b", "\ud83d\udc26\u200b\u2b1b")
                }
                return !1
            }

            function f(e, t, n) {
                var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(
                        300, 150) : i.createElement("canvas"),
                    a = r.getContext("2d", {
                        willReadFrequently: !0
                    }),
                    o = (a.textBaseline = "top", a.font = "600 32px Arial", {});
                return e.forEach(function(e) {
                    o[e] = t(a, e, n)
                }), o
            }

            function t(e) {
                var t = i.createElement("script");
                t.src = e, t.defer = !0, i.head.appendChild(t)
            }
            "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = {
                everything: !0,
                everythingExceptFlag: !0
            }, e = new Promise(function(e) {
                i.addEventListener("DOMContentLoaded", e, {
                    once: !0
                })
            }), new Promise(function(t) {
                var n = function() {
                    try {
                        var e = JSON.parse(sessionStorage.getItem(o));
                        if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() <
                            e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
                    } catch (e) {}
                    return null
                }();
                if (!n) {
                    if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" !=
                        typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                        var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p
                                .toString()
                            ].join(",") + "));",
                            r = new Blob([e], {
                                type: "text/javascript"
                            }),
                            a = new Worker(URL.createObjectURL(r), {
                                name: "wpTestEmojiSupports"
                            });
                        return void(a.onmessage = function(e) {
                            c(n = e.data), a.terminate(), t(n)
                        })
                    } catch (e) {}
                    c(n = f(s, u, p))
                }
                t(n)
            }).then(function(e) {
                for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n
                    .supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports
                        .everythingExceptFlag && n.supports[t]);
                n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n
                    .DOMReady = !1, n.readyCallback = function() {
                        n.DOMReady = !0
                    }
            }).then(function() {
                return e
            }).then(function() {
                var e;
                n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e
                    .concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
            }))
        }((window, document), window._wpemojiSettings);
        /* ]]> */
    </script>
    <style id="wp-emoji-styles-inline-css" type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }

        #description {
            width: 100%;
            /* atau nilai lebar yang Anda inginkan */
            word-wrap: break-word;
            /* Memastikan teks tidak melampaui lebar elemen */
            white-space: pre-wrap;
            /* Menjaga spasi dan baris baru dari input teks */
        }
    </style>
    <link rel="stylesheet" id="wp-block-library-css"
        href="https://mcanp.org/en/wp-includes/css/dist/block-library/style.min.css?ver=6.5.5" type="text/css"
        media="all">
    <style id="classic-theme-styles-inline-css" type="text/css">
        /*! This file is auto-generated */
        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }
    </style>
    <style id="global-styles-inline-css" type="text/css">
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex>* {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        body .is-layout-grid>* {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .wp-block-navigation a:where(:not(.wp-element-button)) {
            color: inherit;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        .wp-block-pullquote {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <link rel="stylesheet" id="contact-form-7-css"
        href="https://mcanp.org/en/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.9.6" type="text/css"
        media="all">
    <link rel="stylesheet" id="simply-gallery-block-frontend-css"
        href="https://mcanp.org/en/wp-content/plugins/simply-gallery-block/blocks/pgc_sgb.min.style.css?ver=3.2.2.1"
        type="text/css" media="all">
    <link rel="stylesheet" id="pgc-simply-gallery-plugin-lightbox-style-css"
        href="https://mcanp.org/en/wp-content/plugins/simply-gallery-block/plugins/pgc_sgb_lightbox.min.style.css?ver=3.2.2.1"
        type="text/css" media="all">
    <link rel="stylesheet" id="sp-news-public-css"
        href="https://mcanp.org/en/wp-content/plugins/sp-news-and-widget/assets/css/wpnw-public.css?ver=5.0"
        type="text/css" media="all">
    <link rel="stylesheet" id="wp-job-manager-job-listings-css"
        href="https://mcanp.org/en/wp-content/plugins/wp-job-manager/assets/dist/css/job-listings.css?ver=598383a28ac5f9f156e4"
        type="text/css" media="all">
    <link rel="stylesheet" id="wpb-google-fonts-Poppins-css"
        href="https://fonts.googleapis.com/css2?family=Open+Sans%3Awght%40300%3B400%3B700&amp;ver=6.5.5" type="text/css"
        media="all">
    <link rel="stylesheet" id="wpb-google-fonts-Oswald-css"
        href="https://fonts.googleapis.com/css?family=Oswald%3A300%2C400%2C500%2C600%2C700&amp;ver=6.5.5"
        type="text/css" media="all">
    <link rel="stylesheet" id="wpb-google-fonts-Arimo-css"
        href="https://fonts.googleapis.com/css?family=Arimo%3A400%2C400i%2C700%2C700i&amp;ver=6.5.5" type="text/css"
        media="all">
    <link rel="stylesheet" id="parent-style-css"
        href="https://mcanp.org/en/wp-content/themes/wp-bootstrap-starter/style.css?ver=6.5.5" type="text/css"
        media="all">
    <link rel="stylesheet" id="wp-bootstrap-starter-bootstrap-css-css"
        href="https://mcanp.org/en/wp-content/themes/wp-bootstrap-starter/inc/assets/css/bootstrap.min.css?ver=6.5.5"
        type="text/css" media="all">
    <link rel="stylesheet" id="wp-bootstrap-pro-fontawesome-cdn-css"
        href="https://use.fontawesome.com/releases/v5.1.0/css/all.css?ver=6.5.5" type="text/css" media="all">
    <link rel="stylesheet" id="wp-bootstrap-starter-style-css"
        href="https://mcanp.org/en/wp-content/themes/wp-bootstrap-starter-child-english/style.css?ver=6.5.5"
        type="text/css" media="all">
    <link rel="stylesheet" id="wpdreams-asl-basic-css"
        href="https://mcanp.org/en/wp-content/plugins/ajax-search-lite/css/style.basic.css?ver=4.12" type="text/css"
        media="all">
    <link rel="stylesheet" id="wpdreams-asl-instance-css"
        href="https://mcanp.org/en/wp-content/plugins/ajax-search-lite/css/style-simple-red.css?ver=4.12"
        type="text/css" media="all">
    <link rel="stylesheet" id="font-awesome-css"
        href="https://mcanp.org/en/wp-content/plugins/popup-anything-on-click/assets/css/font-awesome.min.css?ver=2.8.1"
        type="text/css" media="all">
    <link rel="stylesheet" id="popupaoc-public-style-css"
        href="https://mcanp.org/en/wp-content/plugins/popup-anything-on-click/assets/css/popupaoc-public.css?ver=2.8.1"
        type="text/css" media="all">
    <link rel="stylesheet" type="text/css"
        href="https://mcanp.org/en/wp-content/plugins/smart-slider-3/Public/SmartSlider3/Application/Frontend/Assets/dist/smartslider.min.css?ver=6f970dc2"
        media="all">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?display=swap&amp;family=Roboto%3A300%2C400%7COpen+Sans%3A300%2C400"
        media="all">
    <style data-related="n2-ss-2">
        div#n2-ss-2 .n2-ss-slider-1 {
            display: grid;
            position: relative;
        }

        div#n2-ss-2 .n2-ss-slider-2 {
            display: grid;
            position: relative;
            overflow: hidden;
            padding: 0px 0px 0px 0px;
            border: 0px solid RGBA(62, 62, 62, 1);
            border-radius: 0px;
            background-clip: padding-box;
            background-repeat: repeat;
            background-position: 50% 50%;
            background-size: cover;
            background-attachment: scroll;
            z-index: 1;
        }

        div#n2-ss-2:not(.n2-ss-loaded) .n2-ss-slider-2 {
            background-image: none !important;
        }

        div#n2-ss-2 .n2-ss-slider-3 {
            display: grid;
            grid-template-areas: 'cover';
            position: relative;
            overflow: hidden;
            z-index: 10;
        }

        div#n2-ss-2 .n2-ss-slider-3>* {
            grid-area: cover;
        }

        div#n2-ss-2 .n2-ss-slide-backgrounds,
        div#n2-ss-2 .n2-ss-slider-3>.n2-ss-divider {
            position: relative;
        }

        div#n2-ss-2 .n2-ss-slide-backgrounds {
            z-index: 10;
        }

        div#n2-ss-2 .n2-ss-slide-backgrounds>* {
            overflow: hidden;
        }

        div#n2-ss-2 .n2-ss-slide-background {
            transform: translateX(-100000px);
        }

        div#n2-ss-2 .n2-ss-slider-4 {
            place-self: center;
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 20;
            display: grid;
            grid-template-areas: 'slide';
        }

        div#n2-ss-2 .n2-ss-slider-4>* {
            grid-area: slide;
        }

        div#n2-ss-2.n2-ss-full-page--constrain-ratio .n2-ss-slider-4 {
            height: auto;
        }

        div#n2-ss-2 .n2-ss-slide {
            display: grid;
            place-items: center;
            grid-auto-columns: 100%;
            position: relative;
            z-index: 20;
            -webkit-backface-visibility: hidden;
            transform: translateX(-100000px);
        }

        div#n2-ss-2 .n2-ss-slide {
            perspective: 1500px;
        }

        div#n2-ss-2 .n2-ss-slide-active {
            z-index: 21;
        }

        .n2-ss-background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 3;
        }

        div#n2-ss-2 .n2-ss-button-container,
        div#n2-ss-2 .n2-ss-button-container a {
            display: block;
        }

        div#n2-ss-2 .n2-ss-button-container--non-full-width,
        div#n2-ss-2 .n2-ss-button-container--non-full-width a {
            display: inline-block;
        }

        div#n2-ss-2 .n2-ss-button-container.n2-ss-nowrap {
            white-space: nowrap;
        }

        div#n2-ss-2 .n2-ss-button-container a div {
            display: inline;
            font-size: inherit;
            text-decoration: inherit;
            color: inherit;
            line-height: inherit;
            font-family: inherit;
            font-weight: inherit;
        }

        div#n2-ss-2 .n2-ss-button-container a>div {
            display: inline-flex;
            align-items: center;
            vertical-align: top;
        }

        div#n2-ss-2 .n2-ss-button-container span {
            font-size: 100%;
            vertical-align: baseline;
        }

        div#n2-ss-2 .n2-ss-button-container a[data-iconplacement="left"] span {
            margin-right: 0.3em;
        }

        div#n2-ss-2 .n2-ss-button-container a[data-iconplacement="right"] span {
            margin-left: 0.3em;
        }

        div#n2-ss-2 .n2-ss-background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 3;
        }

        div#n2-ss-2 .n2-ss-background-animation .n2-ss-slide-background {
            z-index: auto;
        }

        div#n2-ss-2 .n2-bganim-side {
            position: absolute;
            left: 0;
            top: 0;
            overflow: hidden;
            background: RGBA(51, 51, 51, 1);
        }

        div#n2-ss-2 .n2-bganim-tile-overlay-colored {
            z-index: 100000;
            background: RGBA(51, 51, 51, 1);
        }

        div#n2-ss-2 .nextend-arrow {
            cursor: pointer;
            overflow: hidden;
            line-height: 0 !important;
            z-index: 18;
            -webkit-user-select: none;
        }

        div#n2-ss-2 .nextend-arrow img {
            position: relative;
            display: block;
        }

        div#n2-ss-2 .nextend-arrow img.n2-arrow-hover-img {
            display: none;
        }

        div#n2-ss-2 .nextend-arrow:FOCUS img.n2-arrow-hover-img,
        div#n2-ss-2 .nextend-arrow:HOVER img.n2-arrow-hover-img {
            display: inline;
        }

        div#n2-ss-2 .nextend-arrow:FOCUS img.n2-arrow-normal-img,
        div#n2-ss-2 .nextend-arrow:HOVER img.n2-arrow-normal-img {
            display: none;
        }

        div#n2-ss-2 .nextend-arrow-animated {
            overflow: hidden;
        }

        div#n2-ss-2 .nextend-arrow-animated>div {
            position: relative;
        }

        div#n2-ss-2 .nextend-arrow-animated .n2-active {
            position: absolute;
        }

        div#n2-ss-2 .nextend-arrow-animated-fade {
            transition: background 0.3s, opacity 0.4s;
        }

        div#n2-ss-2 .nextend-arrow-animated-horizontal>div {
            transition: all 0.4s;
            transform: none;
        }

        div#n2-ss-2 .nextend-arrow-animated-horizontal .n2-active {
            top: 0;
        }

        div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-horizontal .n2-active {
            left: 100%;
        }

        div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-horizontal .n2-active {
            right: 100%;
        }

        div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-horizontal:HOVER>div,
        div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-horizontal:FOCUS>div {
            transform: translateX(-100%);
        }

        div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-horizontal:HOVER>div,
        div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-horizontal:FOCUS>div {
            transform: translateX(100%);
        }

        div#n2-ss-2 .nextend-arrow-animated-vertical>div {
            transition: all 0.4s;
            transform: none;
        }

        div#n2-ss-2 .nextend-arrow-animated-vertical .n2-active {
            left: 0;
        }

        div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-vertical .n2-active {
            top: 100%;
        }

        div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-vertical .n2-active {
            bottom: 100%;
        }

        div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-vertical:HOVER>div,
        div#n2-ss-2 .nextend-arrow-previous.nextend-arrow-animated-vertical:FOCUS>div {
            transform: translateY(-100%);
        }

        div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-vertical:HOVER>div,
        div#n2-ss-2 .nextend-arrow-next.nextend-arrow-animated-vertical:FOCUS>div {
            transform: translateY(100%);
        }

        div#n2-ss-2 .n-uc-O2V0W8G675Nf-inner {
            --n2bgimage: URL("//mcanp.org/en/wp-content/uploads/sites/2/slider2/signing-of-compact-agreement-on-14-september-2017.jpg");
            background-position: 50% 50%, 100% 34%;
        }

        div#n2-ss-2 .n2-font-3a939ab86c69e78a40d185481c3836c8-hover {
            font-family: 'Roboto';
            color: #ffffff;
            font-size: 225%;
            text-shadow: none;
            line-height: 1.5;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            text-align: inherit;
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            font-weight: 700;
        }

        div#n2-ss-2 .n2-font-a14cae60c1cf12a6e3f96739625bd51d-paragraph {
            font-family: 'Roboto';
            color: #ffffff;
            font-size: 112.5%;
            text-shadow: none;
            line-height: 1.6;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            text-align: center;
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            font-weight: 400;
        }

        div#n2-ss-2 .n2-font-a14cae60c1cf12a6e3f96739625bd51d-paragraph a,
        div#n2-ss-2 .n2-font-a14cae60c1cf12a6e3f96739625bd51d-paragraph a:FOCUS {
            font-family: 'Roboto';
            color: #1890d7;
            font-size: 100%;
            text-shadow: none;
            line-height: 1.6;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            text-align: center;
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            font-weight: 400;
        }

        div#n2-ss-2 .n2-font-a14cae60c1cf12a6e3f96739625bd51d-paragraph a:HOVER,
        div#n2-ss-2 .n2-font-a14cae60c1cf12a6e3f96739625bd51d-paragraph a:ACTIVE {
            font-family: 'Roboto';
            color: #1890d7;
            font-size: 100%;
            text-shadow: none;
            line-height: 1.6;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            text-align: center;
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            font-weight: 400;
        }

        div#n2-ss-2 .n2-font-7556321c953bdccd524d3f20efd5ace9-link a {
            font-family: 'Open Sans';
            color: #ffffff;
            font-size: 87.5%;
            text-shadow: none;
            line-height: 1.5;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            text-align: center;
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            font-weight: 400;
        }

        div#n2-ss-2 .n2-style-f8293b450b12ef15d5c4ff97a617a3e3-heading {
            background: RGBA(255, 255, 255, 0);
            opacity: 1;
            padding: 0px 0px 0px 0px;
            box-shadow: none;
            border: 0px solid RGBA(0, 0, 0, 1);
            border-radius: 0px;
        }

        div#n2-ss-2 .n2-font-f0e0b7315ea9e3d4346e9c01476156f7-hover {
            font-family: 'Open Sans';
            color: #ffffff;
            font-size: 225%;
            text-shadow: none;
            line-height: 1.5;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            text-align: center;
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            font-weight: 700;
        }

        div#n2-ss-2 .n2-font-3f47ee917c7074b3a2cb6648918d4cc8-paragraph {
            font-family: 'Roboto';
            color: RGBA(255, 255, 255, 0.8);
            font-size: 112.5%;
            text-shadow: none;
            line-height: 1.6;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            text-align: center;
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            font-weight: 400;
        }

        div#n2-ss-2 .n2-font-3f47ee917c7074b3a2cb6648918d4cc8-paragraph a,
        div#n2-ss-2 .n2-font-3f47ee917c7074b3a2cb6648918d4cc8-paragraph a:FOCUS {
            font-family: 'Roboto';
            color: #1890d7;
            font-size: 100%;
            text-shadow: none;
            line-height: 1.6;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            text-align: center;
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            font-weight: 400;
        }

        div#n2-ss-2 .n2-font-3f47ee917c7074b3a2cb6648918d4cc8-paragraph a:HOVER,
        div#n2-ss-2 .n2-font-3f47ee917c7074b3a2cb6648918d4cc8-paragraph a:ACTIVE {
            font-family: 'Roboto';
            color: #1890d7;
            font-size: 100%;
            text-shadow: none;
            line-height: 1.6;
            font-weight: normal;
            font-style: normal;
            text-decoration: none;
            text-align: center;
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            font-weight: 400;
        }

        div#n2-ss-2 .n-uc-pyvt6CX9YOA0-inner {
            --n2bgimage: URL("//mcanp.org/en/wp-content/uploads/sites/2/2022/10/IMG_0216-scaled.jpg");
            background-position: 50% 50%, 100% 95%;
        }

        div#n2-ss-2 .n2-ss-slide-limiter {
            max-width: 3000px;
        }

        div#n2-ss-2 .n-uc-TRKNk3UMhPII {
            padding: 0px 0px 0px 0px
        }

        div#n2-ss-2 .n-uc-O2V0W8G675Nf-inner {
            padding: 10px 20px 10px 20px;
            text-align: left;
            --ssselfalign: var(--ss-fs);
            ;
            justify-content: center
        }

        div#n2-ss-2 .n-uc-1075c5c280547-inner {
            padding: 0px 0px 0px 0px
        }

        div#n2-ss-2 .n-uc-1075c5c280547-inner>.n2-ss-layer-row-inner {
            width: calc(100% + 1px);
            margin: -0px;
            flex-wrap: nowrap;
        }

        div#n2-ss-2 .n-uc-1075c5c280547-inner>.n2-ss-layer-row-inner>.n2-ss-layer[data-sstype="col"] {
            margin: 0px
        }

        div#n2-ss-2 .n-uc-12c4bd41e3ce3-inner {
            padding: 0px 0px 0px 0px;
            text-align: left;
            --ssselfalign: var(--ss-fs);
            ;
            justify-content: center
        }

        div#n2-ss-2 .n-uc-12c4bd41e3ce3 {
            width: 100%
        }

        div#n2-ss-2 .n-uc-YhcK5an0nZSe {
            align-self: center;
        }

        div#n2-ss-2 .n-uc-EWaia6xHJvOQ {
            padding: 0px 0px 0px 0px
        }

        div#n2-ss-2 .n-uc-13e4b625e83b6-inner {
            padding: 10px 20px 10px 20px;
            text-align: left;
            --ssselfalign: var(--ss-fs);
            ;
            justify-content: center
        }

        div#n2-ss-2 .n-uc-1b7f6d937b530-inner {
            padding: 0px 0px 0px 0px
        }

        div#n2-ss-2 .n-uc-1b7f6d937b530-inner>.n2-ss-layer-row-inner {
            width: calc(100% + 1px);
            margin: -0px;
            flex-wrap: nowrap;
        }

        div#n2-ss-2 .n-uc-1b7f6d937b530-inner>.n2-ss-layer-row-inner>.n2-ss-layer[data-sstype="col"] {
            margin: 0px
        }

        div#n2-ss-2 .n-uc-1823f3e014451-inner {
            padding: 0px 0px 0px 0px;
            text-align: left;
            --ssselfalign: var(--ss-fs);
            ;
            justify-content: center
        }

        div#n2-ss-2 .n-uc-1823f3e014451 {
            width: 100%
        }

        div#n2-ss-2 .n-uc-BXsNpfyxAaFz {
            align-self: center;
        }

        div#n2-ss-2 .n-uc-15qv5PpGjJg6 {
            --margin-bottom: 30px;
            max-width: 770px;
            align-self: center;
        }

        div#n2-ss-2 .n-uc-rP0xbyHK3nNE {
            --margin-bottom: 30px;
            max-width: 90px;
            align-self: center;
        }

        div#n2-ss-2 .n-uc-ERlsQ8RZqIlJ {
            padding: 0px 0px 0px 0px
        }

        div#n2-ss-2 .n-uc-pyvt6CX9YOA0-inner {
            padding: 10px 20px 10px 20px;
            text-align: left;
            --ssselfalign: var(--ss-fs);
            ;
            justify-content: center
        }

        div#n2-ss-2 .n-uc-pyvt6CX9YOA0 {
            align-self: center;
        }

        div#n2-ss-2 .n-uc-12ca329dc573a-inner {
            padding: 0px 0px 0px 0px
        }

        div#n2-ss-2 .n-uc-12ca329dc573a-inner>.n2-ss-layer-row-inner {
            width: calc(100% + 1px);
            margin: -0px;
            flex-wrap: nowrap;
        }

        div#n2-ss-2 .n-uc-12ca329dc573a-inner>.n2-ss-layer-row-inner>.n2-ss-layer[data-sstype="col"] {
            margin: 0px
        }

        div#n2-ss-2 .n-uc-1fa65951fa410-inner {
            padding: 0px 0px 0px 0px;
            text-align: left;
            --ssselfalign: var(--ss-fs);
            ;
            justify-content: center
        }

        div#n2-ss-2 .n-uc-1fa65951fa410 {
            width: 100%
        }

        div#n2-ss-2 .n-uc-AjwhnBYK9Eca {
            align-self: center;
        }

        div#n2-ss-2 .n-uc-GhcPQHUVOZqc {
            --margin-bottom: 30px;
            max-width: 695px;
            align-self: center;
        }

        div#n2-ss-2 .n-uc-GzzKsHkh0BaX {
            --margin-bottom: 30px;
            max-width: 90px;
            align-self: center;
        }

        div#n2-ss-2 .n-uc-YigWjs02SeQa {
            padding: 10px 10px 10px 10px
        }

        div#n2-ss-2 .n-uc-ycu3B7u8qT2F {
            padding: 10px 10px 10px 10px
        }

        div#n2-ss-2 .n-uc-U7IwINtsqaE6 {
            padding: 10px 10px 10px 10px
        }

        div#n2-ss-2 .n-uc-WKrBfMCMQiAo {
            padding: 10px 10px 10px 10px
        }

        div#n2-ss-2 .n-uc-SEvI4WGEHFl5 {
            padding: 10px 10px 10px 10px
        }

        div#n2-ss-2 .n-uc-QekwHmaOptVs {
            padding: 10px 10px 10px 10px
        }

        div#n2-ss-2 .n-uc-UjaHsI97jHF6 {
            padding: 10px 10px 10px 10px
        }

        div#n2-ss-2 .nextend-arrow img {
            width: 32px
        }

        @media (min-width: 1200px) {
            div#n2-ss-2 [data-hide-desktopportrait="1"] {
                display: none !important;
            }
        }

        @media (orientation: landscape) and (max-width: 1199px) and (min-width: 901px),
        (orientation: portrait) and (max-width: 1199px) and (min-width: 701px) {
            div#n2-ss-2 .n-uc-1075c5c280547-inner>.n2-ss-layer-row-inner {
                flex-wrap: nowrap;
            }

            div#n2-ss-2 .n-uc-12c4bd41e3ce3 {
                width: 100%
            }

            div#n2-ss-2 .n-uc-YhcK5an0nZSe {
                --ssfont-scale: 0.8
            }

            div#n2-ss-2 .n-uc-baeIh6hgJKt0 {
                --ssfont-scale: 0.8
            }

            div#n2-ss-2 .n-uc-1b7f6d937b530-inner>.n2-ss-layer-row-inner {
                flex-wrap: nowrap;
            }

            div#n2-ss-2 .n-uc-1823f3e014451 {
                width: 100%
            }

            div#n2-ss-2 .n-uc-BXsNpfyxAaFz {
                --ssfont-scale: 0.8
            }

            div#n2-ss-2 .n-uc-15qv5PpGjJg6 {
                --ssfont-scale: 0.8
            }

            div#n2-ss-2 .n-uc-12ca329dc573a-inner>.n2-ss-layer-row-inner {
                flex-wrap: nowrap;
            }

            div#n2-ss-2 .n-uc-1fa65951fa410 {
                width: 100%
            }

            div#n2-ss-2 .n-uc-AjwhnBYK9Eca {
                --ssfont-scale: 0.8
            }

            div#n2-ss-2 .n-uc-GhcPQHUVOZqc {
                --ssfont-scale: 0.8
            }

            div#n2-ss-2 [data-hide-tabletportrait="1"] {
                display: none !important;
            }
        }

        @media (orientation: landscape) and (max-width: 900px),
        (orientation: portrait) and (max-width: 700px) {
            div#n2-ss-2 .n-uc-O2V0W8G675Nf-inner {
                padding: 20px 20px 20px 20px
            }

            div#n2-ss-2 .n-uc-1075c5c280547-inner>.n2-ss-layer-row-inner {
                width: calc(100% + 11px);
                margin: -5px;
                flex-wrap: wrap;
            }

            div#n2-ss-2 .n-uc-1075c5c280547-inner>.n2-ss-layer-row-inner>.n2-ss-layer[data-sstype="col"] {
                margin: 5px
            }

            div#n2-ss-2 .n-uc-12c4bd41e3ce3-inner {
                text-align: center;
                --ssselfalign: center;
            }

            div#n2-ss-2 .n-uc-12c4bd41e3ce3 {
                order: 2;
                width: calc(100% - 10px)
            }

            div#n2-ss-2 .n-uc-YhcK5an0nZSe {
                --margin-top: 15px;
                --margin-right: 15px;
                --margin-bottom: 15px;
                --margin-left: 15px;
                --ssfont-scale: 0.7
            }

            div#n2-ss-2 .n-uc-baeIh6hgJKt0 {
                --ssfont-scale: 0.6
            }

            div#n2-ss-2 .n-uc-k706DKngnaS2 {
                --ssfont-scale: 0.8
            }

            div#n2-ss-2 .n-uc-13e4b625e83b6-inner {
                padding: 20px 20px 20px 20px
            }

            div#n2-ss-2 .n-uc-1b7f6d937b530-inner>.n2-ss-layer-row-inner {
                width: calc(100% + 11px);
                margin: -5px;
                flex-wrap: wrap;
            }

            div#n2-ss-2 .n-uc-1b7f6d937b530-inner>.n2-ss-layer-row-inner>.n2-ss-layer[data-sstype="col"] {
                margin: 5px
            }

            div#n2-ss-2 .n-uc-1823f3e014451-inner {
                text-align: center;
                --ssselfalign: center;
            }

            div#n2-ss-2 .n-uc-1823f3e014451 {
                order: 2;
                width: calc(100% - 10px)
            }

            div#n2-ss-2 .n-uc-BXsNpfyxAaFz {
                --margin-top: 15px;
                --margin-right: 15px;
                --margin-bottom: 15px;
                --margin-left: 15px;
                --ssfont-scale: 0.7
            }

            div#n2-ss-2 .n-uc-15qv5PpGjJg6 {
                --margin-top: 15px;
                --margin-right: 15px;
                --margin-bottom: 15px;
                --margin-left: 15px;
                --ssfont-scale: 0.6
            }

            div#n2-ss-2 .n-uc-rP0xbyHK3nNE {
                --margin-bottom: 0px;
                --ssfont-scale: 0.8
            }

            div#n2-ss-2 .n-uc-pyvt6CX9YOA0-inner {
                padding: 20px 20px 20px 20px
            }

            div#n2-ss-2 .n-uc-12ca329dc573a-inner>.n2-ss-layer-row-inner {
                width: calc(100% + 11px);
                margin: -5px;
                flex-wrap: wrap;
            }

            div#n2-ss-2 .n-uc-12ca329dc573a-inner>.n2-ss-layer-row-inner>.n2-ss-layer[data-sstype="col"] {
                margin: 5px
            }

            div#n2-ss-2 .n-uc-1fa65951fa410-inner {
                text-align: center;
                --ssselfalign: center;
            }

            div#n2-ss-2 .n-uc-1fa65951fa410 {
                order: 2;
                width: calc(100% - 10px)
            }

            div#n2-ss-2 .n-uc-AjwhnBYK9Eca {
                --margin-top: 15px;
                --margin-right: 15px;
                --margin-bottom: 15px;
                --margin-left: 15px;
                --ssfont-scale: 0.7
            }

            div#n2-ss-2 .n-uc-GhcPQHUVOZqc {
                --margin-top: 15px;
                --margin-right: 15px;
                --margin-bottom: 15px;
                --margin-left: 15px;
                --ssfont-scale: 0.6
            }

            div#n2-ss-2 .n-uc-GzzKsHkh0BaX {
                --margin-bottom: 0px;
                --ssfont-scale: 0.8
            }

            div#n2-ss-2 [data-hide-mobileportrait="1"] {
                display: none !important;
            }

            div#n2-ss-2 .nextend-arrow img {
                width: 16px
            }
        }
    </style>
    <script type="text/javascript" src="https://mcanp.org/en/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"
        id="jquery-core-js"></script>
    <script type="text/javascript" src="https://mcanp.org/en/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1"
        id="jquery-migrate-js"></script>
    <link rel="https://api.w.org/" href="https://mcanp.org/en/wp-json/">
    <link rel="alternate" type="application/json" href="https://mcanp.org/en/wp-json/wp/v2/pages/13">
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://mcanp.org/en/xmlrpc.php?rsd">
    <meta name="generator" content="WordPress 6.5.5">
    <link rel="canonical" href="https://mcanp.org/en/">
    <link rel="shortlink" href="https://mcanp.org/en/">
    <link rel="alternate" type="application/json+oembed"
        href="https://mcanp.org/en/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fmcanp.org%2Fen%2F">
    <link rel="alternate" type="text/xml+oembed"
        href="https://mcanp.org/en/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fmcanp.org%2Fen%2F&amp;format=xml">
    <noscript>
        <style>
            .simply-gallery-amp {
                display: block !important;
            }
        </style>
    </noscript><noscript>
        <style>
            .sgb-preloader {
                display: none !important;
            }
        </style>
    </noscript>
    <style type="text/css">
        #page-sub-header {
            background: #fff;
        }
    </style>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="preload" as="style" href="//fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans&amp;display=swap" media="all">
    <style>
        div[id*='ajaxsearchlitesettings'].searchsettings .asl_option_inner label {
            font-size: 0px !important;
            color: rgba(0, 0, 0, 0);
        }

        div[id*='ajaxsearchlitesettings'].searchsettings .asl_option_inner label:after {
            font-size: 11px !important;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .asl_w_container {
            width: 100%;
            margin: 0px 0px 0px 0px;
            min-width: 200px;
        }

        div[id*='ajaxsearchlite'].asl_m {
            width: 100%;
        }

        div[id*='ajaxsearchliteres'].wpdreams_asl_results div.resdrg span.highlighted {
            font-weight: bold;
            color: rgba(217, 49, 43, 1);
            background-color: rgba(238, 238, 238, 1);
        }

        div[id*='ajaxsearchliteres'].wpdreams_asl_results .results img.asl_image {
            width: 70px;
            height: 70px;
            object-fit: cover;
        }

        div.asl_r .results {
            max-height: none;
        }

        div.asl_r.asl_w.vertical .results .item::after {
            display: block;
            position: absolute;
            bottom: 0;
            content: '';
            height: 1px;
            width: 100%;
            background: #D8D8D8;
        }

        div.asl_r.asl_w.vertical .results .item.asl_last_item::after {
            display: none;
        }
    </style>
    <link rel="icon" href="https://mcanp.org/en/wp-content/uploads/sites/2/2021/08/mca-nepal-logo@2x-150x150.png"
        sizes="32x32">
    <link rel="icon"
        href="https://mcanp.org/en/wp-content/uploads/sites/2/2021/08/mca-nepal-logo@2x-e1630344272397.png"
        sizes="192x192">
    <link rel="apple-touch-icon"
        href="https://mcanp.org/en/wp-content/uploads/sites/2/2021/08/mca-nepal-logo@2x-e1630344272397.png">
    <meta name="msapplication-TileImage"
        content="https://mcanp.org/en/wp-content/uploads/sites/2/2021/08/mca-nepal-logo@2x-e1630344272397.png">
    <script>
        (function() {
            this._N2 = this._N2 || {
                _r: [],
                _d: [],
                r: function() {
                    this._r.push(arguments)
                },
                d: function() {
                    this._d.push(arguments)
                }
            }
        }).call(window);
    </script>
    <script
        src="https://mcanp.org/en/wp-content/plugins/smart-slider-3/Public/SmartSlider3/Application/Frontend/Assets/dist/n2.min.js?ver=6f970dc2"
        defer="" async=""></script>
    <script
        src="https://mcanp.org/en/wp-content/plugins/smart-slider-3/Public/SmartSlider3/Application/Frontend/Assets/dist/smartslider-frontend.min.js?ver=6f970dc2"
        defer="" async=""></script>
    <script
        src="https://mcanp.org/en/wp-content/plugins/smart-slider-3/Public/SmartSlider3/Slider/SliderType/Simple/Assets/dist/ss-simple.min.js?ver=6f970dc2"
        defer="" async=""></script>
    <script
        src="https://mcanp.org/en/wp-content/plugins/smart-slider-3/Public/SmartSlider3/Slider/SliderType/Simple/Assets/dist/smartslider-backgroundanimation.min.js?ver=6f970dc2"
        defer="" async=""></script>
    <script
        src="https://mcanp.org/en/wp-content/plugins/smart-slider-3/Public/SmartSlider3/Widget/Arrow/ArrowImage/Assets/dist/w-arrow-image.min.js?ver=6f970dc2"
        defer="" async=""></script>
    <script>
        _N2.r('documentReady', function() {
            _N2.r(["documentReady", "smartslider-frontend", "smartslider-backgroundanimation",
                "SmartSliderWidgetArrowImage", "ss-simple"
            ], function() {
                new _N2.SmartSliderSimple('n2-ss-2', {
                    "admin": false,
                    "background.video.mobile": 1,
                    "loadingTime": 2000,
                    "alias": {
                        "id": 0,
                        "smoothScroll": 0,
                        "slideSwitch": 0,
                        "scroll": 1
                    },
                    "align": "normal",
                    "isDelayed": 0,
                    "responsive": {
                        "mediaQueries": {
                            "all": false,
                            "desktopportrait": ["(min-width: 1200px)"],
                            "tabletportrait": [
                                "(orientation: landscape) and (max-width: 1199px) and (min-width: 901px)",
                                "(orientation: portrait) and (max-width: 1199px) and (min-width: 701px)"
                            ],
                            "mobileportrait": ["(orientation: landscape) and (max-width: 900px)",
                                "(orientation: portrait) and (max-width: 700px)"
                            ]
                        },
                        "base": {
                            "slideOuterWidth": 1300,
                            "slideOuterHeight": 400,
                            "sliderWidth": 1300,
                            "sliderHeight": 400,
                            "slideWidth": 1300,
                            "slideHeight": 400
                        },
                        "hideOn": {
                            "desktopLandscape": false,
                            "desktopPortrait": false,
                            "tabletLandscape": false,
                            "tabletPortrait": false,
                            "mobileLandscape": false,
                            "mobilePortrait": false
                        },
                        "onResizeEnabled": true,
                        "type": "auto",
                        "sliderHeightBasedOn": "real",
                        "focusUser": 1,
                        "focusEdge": "auto",
                        "breakpoints": [{
                            "device": "tabletPortrait",
                            "type": "max-screen-width",
                            "portraitWidth": 1199,
                            "landscapeWidth": 1199
                        }, {
                            "device": "mobilePortrait",
                            "type": "max-screen-width",
                            "portraitWidth": 700,
                            "landscapeWidth": 900
                        }],
                        "enabledDevices": {
                            "desktopLandscape": 0,
                            "desktopPortrait": 1,
                            "tabletLandscape": 0,
                            "tabletPortrait": 1,
                            "mobileLandscape": 0,
                            "mobilePortrait": 1
                        },
                        "sizes": {
                            "desktopPortrait": {
                                "width": 1300,
                                "height": 400,
                                "max": 3000,
                                "min": 1200
                            },
                            "tabletPortrait": {
                                "width": 701,
                                "height": 215,
                                "customHeight": false,
                                "max": 1199,
                                "min": 701
                            },
                            "mobilePortrait": {
                                "width": 320,
                                "height": 98,
                                "customHeight": false,
                                "max": 900,
                                "min": 320
                            }
                        },
                        "overflowHiddenPage": 0,
                        "focus": {
                            "offsetTop": "#wpadminbar",
                            "offsetBottom": ""
                        }
                    },
                    "controls": {
                        "mousewheel": 0,
                        "touch": "horizontal",
                        "keyboard": 1,
                        "blockCarouselInteraction": 1
                    },
                    "playWhenVisible": 1,
                    "playWhenVisibleAt": 0.5,
                    "lazyLoad": 0,
                    "lazyLoadNeighbor": 0,
                    "blockrightclick": 0,
                    "maintainSession": 0,
                    "autoplay": {
                        "enabled": 1,
                        "start": 1,
                        "duration": 8000,
                        "autoplayLoop": 1,
                        "allowReStart": 0,
                        "pause": {
                            "click": 1,
                            "mouse": "enter",
                            "mediaStarted": 1
                        },
                        "resume": {
                            "click": 0,
                            "mouse": "0",
                            "mediaEnded": 1,
                            "slidechanged": 0
                        },
                        "interval": 1,
                        "intervalModifier": "loop",
                        "intervalSlide": "current"
                    },
                    "perspective": 1500,
                    "layerMode": {
                        "playOnce": 0,
                        "playFirstLayer": 1,
                        "mode": "skippable",
                        "inAnimation": "mainInEnd"
                    },
                    "bgAnimations": {
                        "global": 0,
                        "color": "RGBA(51,51,51,1)",
                        "speed": "normal",
                        "slides": [{
                            "animation": [{
                                "type": "Flat",
                                "tiles": {
                                    "delay": 0,
                                    "sequence": "ForwardDiagonal"
                                },
                                "main": {
                                    "type": "both",
                                    "duration": 1,
                                    "zIndex": 2,
                                    "current": {
                                        "ease": "easeOutCubic",
                                        "opacity": 0
                                    }
                                }
                            }],
                            "speed": "normal",
                            "color": "RGBA(51,51,51,1)"
                        }, {
                            "animation": [{
                                "type": "Flat",
                                "tiles": {
                                    "delay": 0,
                                    "sequence": "ForwardDiagonal"
                                },
                                "main": {
                                    "type": "both",
                                    "duration": 1,
                                    "zIndex": 2,
                                    "current": {
                                        "ease": "easeOutCubic",
                                        "opacity": 0
                                    }
                                }
                            }],
                            "speed": "normal",
                            "color": "RGBA(51,51,51,1)"
                        }, {
                            "animation": [{
                                "type": "Flat",
                                "tiles": {
                                    "delay": 0,
                                    "sequence": "ForwardDiagonal"
                                },
                                "main": {
                                    "type": "both",
                                    "duration": 1,
                                    "zIndex": 2,
                                    "current": {
                                        "ease": "easeOutCubic",
                                        "opacity": 0
                                    }
                                }
                            }],
                            "speed": "normal",
                            "color": "RGBA(51,51,51,1)"
                        }]
                    },
                    "mainanimation": {
                        "type": "crossfade",
                        "duration": 600,
                        "delay": 0,
                        "ease": "easeOutQuad",
                        "shiftedBackgroundAnimation": 0
                    },
                    "carousel": 1,
                    "initCallbacks": function() {
                        new _N2.SmartSliderWidgetArrowImage(this)
                    }
                })
            })
        });
    </script>
    <script src="https://mcanp.org/en/wp-includes/js/wp-emoji-release.min.js?ver=6.5.5" defer=""></script>
    <style>
        @font-face {
            font-family: 'NotoSans_online_security';
            src: url(chrome-extension://jcpgbnbdnakoblgfkbgggankeidkfcdl/assets/fonts/noto-sans-regular.woff);
        }

        @font-face {
            font-family: 'NotoSans_medium_online_security';
            src: url(chrome-extension://jcpgbnbdnakoblgfkbgggankeidkfcdl/assets/fonts/noto-sans-medium.ttf);
        }

        @font-face {
            font-family: 'NotoSans_bold_online_security';
            src: url(chrome-extension://jcpgbnbdnakoblgfkbgggankeidkfcdl/assets/fonts/noto-sans-bold.woff);
        }

        @font-face {
            font-family: 'NotoSans_semibold_online_security';
            src: url(chrome-extension://jcpgbnbdnakoblgfkbgggankeidkfcdl/assets/fonts/noto-sans-semibold.ttf);
        }
    </style>
    @stack('style')
</head>

<body class="home page-template-default page page-id-13 modula-best-grid-gallery wp-bootstrap-starter-child-english">
    <div id="page" class="site">
        <header id="masthead" class="site-header navbar-static-top fixed-top navbar-light" role="banner">
            <nav class="navbar top-navigation">
                <div class="col-sm-6">
                    <a href="https://mcanp.org/clock/" target="_blank">
                        <div id="clockdiv">

                            <div class="clockrow">


                                <span class="year" id="year">4</span>
                                <div class="smalltext">{{ __('header.year') }}</div>


                            </div>
                            <div class="clockrow">


                                <span class="days" id="month">1</span>
                                <div class="smalltext">{{ __('header.month') }}</div>


                            </div>
                            <div class="clockrow">


                                <span class="days" id="days">18</span>
                                <div class="smalltext">{{ __('header.days') }}</div>


                            </div>
                            <div class="clockrow">


                                <span class="hours" id="hour">7</span>
                                <div class="smalltext">{{ __('header.hours') }}</div>


                            </div>
                            <div class="clockrow">


                                <span class="minutes" id="minute">58</span>
                                <div class="smalltext">{{ __('header.minutes') }}</div>


                            </div>
                            <div class="clockrow">



                                <span class="seconds" id="second">46</span>
                                <div class="smalltext">{{ __('header.seconds') }}</div>

                            </div>

                        </div>
                    </a>
                </div>
                <div class="col-sm-6 top-nav ">
                    <ul class="text-right">

                        <li>
                            <div id="wrap">
                                <form method="get" role="search" action="">
                                    <input id="search" name="s" type="text"
                                        placeholder="{{ __('header.what_are_you_looking_for') }}" value=""
                                        autocomplete="off">
                                    <input id="search_submit" value="submit" type="submit">
                                </form>
                            </div>
                        </li>
                        <li><a class="btn btn-danger report-fraud" href="https://oig.usaid.gov/report-fraud"
                                target="_blank">{{ __('header.report_fraud') }}</a></li>
                        <li>
                            <a href="{{ url(app()->getLocale() === 'pt' ? '/en' : '/pt') }}">
                                {{ app()->getLocale() === 'pt' ? 'EN' : 'PT' }}
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <nav class="navbar top-navigation">

                <div class="col-md-4 col-lg-4 col-sm-4 col-nav text-left">
                    <a href="#" class="logo-text logo-mca">
                        <img width="90" src="{{ $generalSetting?->left_icon }}"
                            alt="{{ __('header.app_name') }}">
                    </a>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4 col-nav text-center">
                    <a href="#" class="logo-text logo-mcc" target="_blank">
                        <img src="{{ $generalSetting?->center_icon }}" alt="MCC-USA" width="120px">
                    </a>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4 col-nav text-right">
                    <a href="#" class="logo-text logo-gon" target="_blank">
                        <img src="{{ $generalSetting?->right_icon }}" alt="Nepal Government" width="90px">
                    </a>
                </div>

            </nav>

            <nav class="navbar navbar-expand-xl main-navigation">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav"
                    aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="main-nav" class="collapse navbar-collapse justify-content-end">
                    <ul id="menu-primary-menu" class="navbar-nav">
                        <li id="menu-item-2107"
                            class="nav-item menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-2107 {{ setNavbarActive(['home']) }} active">
                            <a title="Home" href="{{ route('home') }}"
                                class="nav-link">{{ __('header.home') }}</a>
                        </li>
                        <li id="menu-item-2120"
                            class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2120 dropdown {{ setNavbarActive(['mca-nepal.board-of-director', 'mca-nepal.executive-team', 'mca-nepal.organizational-chart']) }}">
                            <a title="{{ __('header.mca_nepal') }}" href="#" data-toggle="dropdown"
                                class="dropdown-toggle nav-link" aria-haspopup="true">{{ __('header.mca_nepal') }}
                                <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                <li id="menu-item-2123"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2123 {{ setSubNavbarActive(['mca-nepal.board-of-director']) }}">
                                    <a title="{{ __('header.board_of_directors') }}"
                                        href="{{ route('mca-nepal.board-of-director', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('header.board_of_directors') }}</a>
                                </li>
                                <li id="menu-item-2121"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2121 {{ setSubNavbarActive(['mca-nepal.executive-team']) }}">
                                    <a title="{{ __('header.executive_team') }}"
                                        href="{{ route('mca-nepal.executive-team', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('header.executive_team') }}</a>
                                </li>
                                <li id="menu-item-2124"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2124 {{ setSubNavbarActive(['mca-nepal.organizational-chart']) }}">
                                    <a title="{{ __('header.organizational_chart') }}"
                                        href="{{ route('mca-nepal.organizational-chart', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('header.organizational_chart') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-2142"
                            class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2142 dropdown {{ setNavbarActive(['project-category']) }}">
                            <a title="{{ __('header.projects') }}" href="#" data-toggle="dropdown"
                                class="dropdown-toggle nav-link" aria-haspopup="true">{{ __('header.projects') }}
                                <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach ($projectCategories as $projectCategory)
                                    <li id="menu-item-{{ $loop->iteration }}"
                                        class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-{{ $loop->iteration }} {{ setSubSlugNavbarActive(['project-category'], $projectCategory->slug) }}">
                                        <a title="{{ __('app.' . $projectCategory->name) }}"
                                            href="{{ route('project-category', ['locale' => session('locale', 'en'), 'slugCategory' => $projectCategory->slug]) }}"
                                            class="dropdown-item">{{ __('app.' . $projectCategory->name) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li id="menu-item-2110"
                            class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2110 dropdown {{ setNavbarActive(['document-category']) }}">
                            <a title="{{ __('header.documents_reports') }}" href="#" data-toggle="dropdown"
                                class="dropdown-toggle nav-link"
                                aria-haspopup="true">{{ __('header.documents_reports') }} <span
                                    class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach ($documentsReportsCategories as $documentReportCategory)
                                    <li id="menu-item-{{ $loop->iteration }}"
                                        class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2112 {{ setSubSlugNavbarActive(['document-category'], $documentReportCategory->slug) }}">
                                        <a title="{{ __('app.' . $documentReportCategory->name) }}"
                                            href="{{ route('document-category', ['locale' => session('locale', 'en'), 'slugCategory' => $documentReportCategory->slug]) }}"
                                            class="dropdown-item">{{ __('app.' . $documentReportCategory->name) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li id="menu-item-2127"
                            class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2127 dropdown {{ setNavbarActive(['articles-interviews', 'notices', 'press-releases', 'photo-gallery', 'video-gallery']) }}">
                            <a title="{{ __('header.media_notices') }}" href="#" data-toggle="dropdown"
                                class="dropdown-toggle nav-link"
                                aria-haspopup="true">{{ __('header.media_notices') }} <span
                                    class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                <li id="menu-item-2128"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2128">
                                    <a title="{{ __('app.News') }}" href="{{ route('news', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('app.News') }}</a>
                                </li>
                                <li id="menu-item-2344"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2344 {{ setNavbarActive(['community-voices']) }}">
                                    <a title="{{ __('app.Community Voice') }}"
                                        href="{{ route('community-voices', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('app.Community Voice') }}</a>
                                </li>
                                <li id="menu-item-2302"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2302 {{ setSubNavbarActive(['articles-interviews']) }}">
                                    <a title="{{ __('app.Articles/Interviews') }}"
                                        href="{{ route('articles-interviews', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('app.Articles/Interviews') }}</a>
                                </li>
                                <li id="menu-item-2235"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2235 {{ setSubNavbarActive(['notices']) }}">
                                    <a title="{{ __('app.Notice') }}"
                                        href="{{ route('notices', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('app.Notice') }}</a>
                                </li>
                                <li id="menu-item-2130"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2130 {{ setSubNavbarActive(['press-releases']) }}">
                                    <a title="{{ __('app.Press Releases') }}"
                                        href="{{ route('press-releases', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('app.Press Releases') }}</a>
                                </li>
                                <li id="menu-item-2129"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2129 {{ setSubNavbarActive(['photo-gallery']) }}">
                                    <a title="{{ __('app.Photo Gallery') }}"
                                        href="{{ route('photo-gallery', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('app.Photo Gallery') }}</a>
                                </li>
                                <li id="menu-item-2211"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2211 {{ setSubNavbarActive(['video-gallery']) }}">
                                    <a title="{{ __('app.Video Gallery') }}"
                                        href="{{ route('video-gallery', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('app.Video Gallery') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-2135"
                            class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2135 dropdown {{ setNavbarActive(['procurement-notice', 'guidelines', 'procurement-bid-challenge-systems', 'procurement-contract-award-notices']) }}">
                            <a title="{{ __('header.procurement') }}" href="#" data-toggle="dropdown"
                                class="dropdown-toggle nav-link" aria-haspopup="true">{{ __('header.procurement') }}
                                <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                <li id="menu-item-2140"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2140 {{ setSubNavbarActive(['procurement-notice']) }}">
                                    <a title="{{ __('header.procurement_notices') }}"
                                        href="{{ route('procurement-notice', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('header.procurement_notices') }}</a>
                                </li>
                                <li id="menu-item-2238"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2238 {{ setSubNavbarActive(['guidelines']) }}">
                                    <a title="{{ __('header.procurement_guidelines') }}"
                                        href="{{ route('guidelines', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('header.procurement_guidelines') }}</a>
                                </li>
                                <li id="menu-item-2136"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2136 {{ setSubNavbarActive(['procurement-bid-challenge-systems']) }}">
                                    <a title="{{ __('header.bid_challenge_system') }}"
                                        href="{{ route('procurement-bid-challenge-systems', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('header.bid_challenge_system') }}</a>
                                </li>
                                <li id="menu-item-2137"
                                    class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2137 {{ setSubNavbarActive(['procurement-contract-award-notices']) }}">
                                    <a title="{{ __('header.contract_award_notice') }}"
                                        href="{{ route('procurement-contract-award-notices', ['locale' => session('locale', 'en')]) }}"
                                        class="dropdown-item">{{ __('header.contract_award_notice') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li id="menu-item-2118"
                            class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2118 {{ setNavbarActive(['jobs.*']) }}">
                            <a title="{{ __('header.jobs') }}"
                                href="{{ route('jobs.index', ['locale' => session('locale', 'en')]) }}"
                                class="nav-link">{{ __('header.jobs') }}</a>
                        </li>
                        <li id="menu-item-2116"
                            class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2118"
                            {{ setNavbarActive(['faq*']) }}><a title="{{ __('header.faqs') }}"
                                href="{{ route('faq.index', ['locale' => session('locale', 'en')]) }}"
                                class="nav-link">{{ __('header.faqs') }}</a></li>
                        <li id="menu-item-2109"
                            class="nav-item menu-item menu-item-type-post_type menu-item-object-page menu-item-2118"
                            {{ setNavbarActive(['contact.*']) }}><a title="{{ __('header.contact') }}"
                                href="{{ route('contact.index', ['locale' => session('locale', 'en')]) }}"
                                class="nav-link">{{ __('header.contact') }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- </div> -->
        </header>

        @yield('content')

        <div id="footer-widget" class="row footer-widget m-0 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <section id="nav_menu-2" class="widget widget_nav_menu">
                            <h3 class="widget-title">{{ __('header.quick_menu') }}</h3>
                            <div class="menu-footer-menu-container">
                                <ul id="menu-footer-menu" class="menu nav flex-column">
                                    <li id="menu-item-2160"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-13 current_page_item menu-item-2160 nav-item">
                                        <a href="{{ url('/') }}" aria-current="page"
                                            class="nav-link">{{ __('header.home') }}</a>
                                    </li>
                                    <li id="menu-item-2162"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2162 nav-item">
                                        <a href="{{ route('mca-nepal.board-of-director', ['locale' => session('locale', 'en')]) }}"
                                            class="nav-link">{{ __('header.board_of_directors') }}</a>
                                    </li>
                                    <li id="menu-item-2161"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2161 nav-item">
                                        <a href="{{ route('document-category', ['locale' => session('locale', 'en'), 'slugCategory' => 'main-agreements']) }}"
                                            class="nav-link">{{ __('header.main_agreements') }}</a>
                                    </li>
                                    {{-- <li id="menu-item-2163"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2163 nav-item">
                                        <a href="https://www.mcc.gov/" class="nav-link">MCC Website</a>
                                    </li>
                                    <li id="menu-item-2164"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2164 nav-item">
                                        <a href="https://oig.usaid.gov/report-fraud" class="nav-link">Report
                                            Fraud</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </section>
                    </div>

                    <div class="col-12 col-md-3">
                        <section id="block-7" class="widget widget_block">
                            <h2>{{ __('header.contact_us') }}</h2>
                            <p><b>{{ __('header.app_name') }} </b><br>
                                {{ $contactSetting?->address }}<br>
                                <i class="fa fa-phone"></i> {{ $contactSetting?->phone }}<br>
                                <i class="fa fa-envelope"></i> <a
                                    href="mailto:{{ $contactSetting?->email }}">{{ $contactSetting?->email }}</a>
                            </p>
                            <p><b>{{ __('header.stay_connected') }}</b> <br>
                                @foreach ($footerSocialLink as $link)
                                    <a style="font-size:20px" href="{{ $link->url }}" target="_blank"><i
                                            class="{{ $link->icon }}"></i></a> &nbsp;
                                @endforeach
                            </p>
                        </section>
                    </div>
                    @if ($footerSettings?->count() == 1)
                        @foreach ($footerSettings as $setting)
                            <div class="col-12 col-md-3">
                                <section id="block-8" class="widget widget_block">
                                    <h2>{{ $setting->title }}</h2>
                                    <p><b>{{ $setting->name }}</b></p>
                                    <div class="wp-block-image">
                                        <figure>
                                            <img decoding="async" style="border:7px solid #ccc"
                                                src="{{ $setting->images }}" alt="{{ $setting->name }}"
                                                width="127">
                                        </figure>
                                    </div>
                                    <i class="fa fa-phone"></i>{{ $setting->call }}<br>
                                    <i class="fa fa-mobile"></i>{{ $setting->phone }}<br>
                                    <i class="fa fa-envelope"></i> <a
                                        href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                                </section>
                            </div>
                        @endforeach
                    @elseif ($footerSettings?->count() == 2)
                        @foreach ($footerSettings as $index => $setting)
                            @if ($index == 0)
                                <div class="col-12 col-md-3">
                                    <section id="block-8" class="widget widget_block">
                                        <h2>{{ $setting->title }}</h2>
                                        <p><b>{{ $setting->name }}</b></p>
                                        <div class="wp-block-image">
                                            <figure>
                                                <img decoding="async" style="border:7px solid #ccc"
                                                    src="{{ $setting->images }}" alt="{{ $setting->name }}"
                                                    width="127">
                                            </figure>
                                        </div>
                                        <i class="fa fa-phone"></i>{{ $setting->call }}<br>
                                        <i class="fa fa-mobile"></i>{{ $setting->phone }}<br>
                                        <i class="fa fa-envelope"></i> <a
                                            href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                                    </section>
                                </div>
                            @elseif ($index == 1)
                                <div class="widget">
                                    <h2>{{ $setting->title }}</h2>
                                    <p><b>{{ $setting->name }}</b></p>
                                    <div class="wp-block-image">
                                        <figure>
                                            <img decoding="async" style="border:7px solid #ccc"
                                                src="{{ $setting->images }}" alt="{{ $setting->name }}"
                                                width="127">
                                        </figure>
                                    </div>
                                    <i class="fa fa-phone"></i>{{ $setting->call }}<br>
                                    <i class="fa fa-mobile"></i>{{ $setting->phone }}<br>
                                    <i class="fa fa-envelope"></i> <a
                                        href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    <div class="widget">
                        <h2>{{ __('header.for_media_queries') }}</h2>
                        <p><b>{{ $footerSetting?->media_query_name }}</b></p>
                        <div class="wp-block-image">
                            <figure><img decoding="async" style="border:7px solid #ccc"
                                    src="{{ $footerSetting?->media_query_picture }}"
                                    alt="{{ $footerSetting?->media_query_name }}" width="127"></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="colophon" class="site-footer navbar-light" role="contentinfo">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="site-info">
                        <p> {{ __('header.footer_text') }}</p>
                        <strong>{{ __('header.footer_slogan') }}.</strong><br>
                        © Copyright {{ date('Y') }} {{ __('header.app_name') }}.
                        <!--<br/> {{ __('header.app_name') }} Development Board  -->
                    </div><!-- close .site-info -->
                </div>

            </div>
        </div>
    </footer><!-- #colophon -->
    </div><!-- #page -->
    <a href="#" class="scrollToTop">
        <i class="fa fa-angle-up"></i>
    </a>
    <style type="text/css"></style>
    <div class="paoc-cb-popup-body paoc-wrap paoc-popup paoc-modal-popup paoc-popup-2682 paoc-popup-image paoc-popup-announcement paoc-popup-announcement-design-1 paoc-design-1 paoc-popup-js"
        id="paoc-popup-2682-2"
        data-popup-conf="{&quot;content&quot;:{&quot;target&quot;:&quot;#paoc-popup-2682-2&quot;,&quot;effect&quot;:&quot;fadein&quot;,&quot;positionX&quot;:&quot;center&quot;,&quot;positionY&quot;:&quot;center&quot;,&quot;fullscreen&quot;:false,&quot;speedIn&quot;:500,&quot;speedOut&quot;:250,&quot;close&quot;:false,&quot;animateFrom&quot;:&quot;top&quot;,&quot;animateTo&quot;:&quot;top&quot;},&quot;loader&quot;:{&quot;active&quot;:false,&quot;color&quot;:&quot;#000000&quot;,&quot;speed&quot;:1000},&quot;overlay&quot;:{&quot;active&quot;:true,&quot;color&quot;:&quot;rgba(0, 0, 0, 0.5)&quot;,&quot;close&quot;:false,&quot;opacity&quot;:1}}"
        data-conf="{&quot;id&quot;:2682,&quot;popup_type&quot;:&quot;image&quot;,&quot;display_type&quot;:&quot;modal&quot;,&quot;disappear&quot;:0,&quot;disappear_mode&quot;:&quot;normal&quot;,&quot;open_delay&quot;:0.299999999999999988897769753748434595763683319091796875,&quot;cookie_prefix&quot;:&quot;paoc_popup&quot;,&quot;cookie_expire&quot;:&quot;&quot;,&quot;cookie_unit&quot;:&quot;day&quot;}"
        data-id="paoc-popup-2682">
        <div class="paoc-popup-inr-wrap">
            <div class="paoc-padding-20 paoc-popup-con-bg">
                <div class="paoc-popup-inr">
                    <div class="paoc-popup-margin paoc-popup-content">
                        <p>
                        <div class="paoc-iframe-wrap"><iframe loading="lazy" width="560" height="315"
                                src="https://www.youtube.com/embed/J5GEu7D0zio?si=YhIZuxHJ1nfowYqa"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen=""></iframe></div>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <a href="javascript:void(0);" class="paoc-close-popup paoc-popup-close">
            <svg viewBox="0 0 1792 1792">
                <path
                    d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z">
                </path>
            </svg>
        </a>
    </div>
    <link rel="stylesheet" id="accordions-style-css"
        href="https://mcanp.org/en/wp-content/plugins/accordions/assets/frontend/css/style.css?ver=6.5.5"
        type="text/css" media="all">
    <link rel="stylesheet" id="jquery-ui-css"
        href="//code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.min.css?ver=1.13.2" type="text/css"
        media="all">
    <link rel="stylesheet" id="accordions-themes-css"
        href="https://mcanp.org/en/wp-content/plugins/accordions/assets/global/css/themes.style.css?ver=6.5.5"
        type="text/css" media="all">
    <link rel="stylesheet" id="fontawesome-5-css"
        href="https://mcanp.org/en/wp-content/plugins/accordions/assets/global/css/font-awesome-5.css?ver=6.5.5"
        type="text/css" media="all">
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/contact-form-7/includes/swv/js/index.js?ver=5.9.6" id="swv-js">
    </script>
    <script type="text/javascript" id="contact-form-7-js-extra">
        /* <![CDATA[ */
        var wpcf7 = {
            "api": {
                "root": "https:\/\/mcanp.org\/en\/wp-json\/",
                "namespace": "contact-form-7\/v1"
            }
        };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.9.6" id="contact-form-7-js">
    </script>
    <script type="text/javascript" id="pgc-simply-gallery-plugin-lightbox-script-js-extra">
        /* <![CDATA[ */
        var PGC_SGB_LIGHTBOX = {
            "lightboxPreset": {
                "nativGalleryEnable": true,
                "nativeAttachment": true,
                "singletonAttachment": true,
                "groupingAllImages": false,
                "lightboxType": "classic",
                "copyRProtection": false,
                "copyRAlert": "Hello, this photo is mine!",
                "sliderScrollNavi": false,
                "sliderNextPrevAnimation": "animation",
                "galleryScrollPositionControll": false,
                "sliderItemCounterEnable": true,
                "sliderItemTitleEnable": false,
                "sliderItemTitleFontSize": 18,
                "sliderItemTitleTextColor": "rgba(255,255,255,1)",
                "itemCounterColor": "rgba(255,255,255,1)",
                "sliderThumbBarEnable": true,
                "sliderThumbBarHoverColor": "rgba(240,240,240,1)",
                "sliderBgColor": "rgba(0,0,0,0.8)",
                "sliderPreloaderColor": "rgba(240,240,240,1)",
                "sliderHeaderFooterBgColor": "rgba(0,0,0,0.4)",
                "sliderNavigationColor": "rgba(0,0,0,1)",
                "sliderNavigationColorOver": "rgba(255,255,255,1)",
                "sliderNavigationIconColor": "rgba(255,255,255,1)",
                "sliderNavigationIconColorOver": "rgba(0,0,0,1)",
                "sliderSlideshow": true,
                "sliderSlideshowDelay": 8,
                "slideshowIndicatorColor": "rgba(255,255,255,1)",
                "slideshowIndicatorColorBg": "rgba(255,255,255,0.5)",
                "sliderThumbSubMenuBackgroundColor": "rgba(255,255,255,0)",
                "sliderThumbSubMenuBackgroundColorOver": "rgba(255,255,255,1)",
                "sliderThumbSubMenuIconColor": "rgba(255,255,255,1)",
                "sliderThumbSubMenuIconHoverColor": "rgba(0,0,0,1)",
                "sliderSocialShareEnabled": true,
                "sliderZoomEnable": true,
                "sliderFullscreenEnabled": true,
                "modaBgColor": "rgba(0,0,0,0.8)",
                "modalIconColor": "rgba(255,255,255,1)",
                "modalIconColorHover": "rgba(255,255,255,0.8)",
                "shareFacebook": true,
                "shareTwitter": true,
                "sharePinterest": true,
                "sliderItemDownload": true,
                "shareCopyLink": true
            },
            "postType": "page",
            "lightboxSettigs": ""
        };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/simply-gallery-block/plugins/pgc_sgb_lightbox.min.js?ver=3.2.2.1"
        id="pgc-simply-gallery-plugin-lightbox-script-js"></script>
    <script type="text/javascript" src="https://mcanp.org/en/wp-content/themes/wp-bootstrap-starter/script.js?ver=1.1"
        id="script-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/themes/wp-bootstrap-starter/inc/assets/js/popper.min.js?ver=6.5.5"
        id="wp-bootstrap-starter-popper-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/themes/wp-bootstrap-starter/inc/assets/js/bootstrap.min.js?ver=6.5.5"
        id="wp-bootstrap-starter-bootstrapjs-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/themes/wp-bootstrap-starter/inc/assets/js/theme-script.min.js?ver=6.5.5"
        id="wp-bootstrap-starter-themejs-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/themes/wp-bootstrap-starter/inc/assets/js/skip-link-focus-fix.min.js?ver=20151215"
        id="wp-bootstrap-starter-skip-link-focus-fix-js"></script>
    <script type="text/javascript" id="wd-asl-ajaxsearchlite-js-before">
        /* <![CDATA[ */
        window.ASL = typeof window.ASL !== 'undefined' ? window.ASL : {};
        window.ASL.wp_rocket_exception = "DOMContentLoaded";
        window.ASL.ajaxurl = "https:\/\/mcanp.org\/en\/wp-admin\/admin-ajax.php";
        window.ASL.backend_ajaxurl = "https:\/\/mcanp.org\/en\/wp-admin\/admin-ajax.php";
        window.ASL.js_scope = "jQuery";
        window.ASL.asl_url = "https:\/\/mcanp.org\/en\/wp-content\/plugins\/ajax-search-lite\/";
        window.ASL.detect_ajax = 1;
        window.ASL.media_query = 4762;
        window.ASL.version = 4762;
        window.ASL.pageHTML = "";
        window.ASL.additional_scripts = [{
            "handle": "wd-asl-ajaxsearchlite",
            "src": "https:\/\/mcanp.org\/en\/wp-content\/plugins\/ajax-search-lite\/js\/min\/plugin\/optimized\/asl-prereq.js",
            "prereq": []
        }, {
            "handle": "wd-asl-ajaxsearchlite-core",
            "src": "https:\/\/mcanp.org\/en\/wp-content\/plugins\/ajax-search-lite\/js\/min\/plugin\/optimized\/asl-core.js",
            "prereq": []
        }, {
            "handle": "wd-asl-ajaxsearchlite-vertical",
            "src": "https:\/\/mcanp.org\/en\/wp-content\/plugins\/ajax-search-lite\/js\/min\/plugin\/optimized\/asl-results-vertical.js",
            "prereq": ["wd-asl-ajaxsearchlite"]
        }, {
            "handle": "wd-asl-ajaxsearchlite-autocomplete",
            "src": "https:\/\/mcanp.org\/en\/wp-content\/plugins\/ajax-search-lite\/js\/min\/plugin\/optimized\/asl-autocomplete.js",
            "prereq": ["wd-asl-ajaxsearchlite"]
        }, {
            "handle": "wd-asl-ajaxsearchlite-load",
            "src": "https:\/\/mcanp.org\/en\/wp-content\/plugins\/ajax-search-lite\/js\/min\/plugin\/optimized\/asl-load.js",
            "prereq": ["wd-asl-ajaxsearchlite-autocomplete"]
        }];
        window.ASL.script_async_load = false;
        window.ASL.init_only_in_viewport = true;
        window.ASL.font_url = "https:\/\/mcanp.org\/en\/wp-content\/plugins\/ajax-search-lite\/css\/fonts\/icons2.woff2";
        window.ASL.css_async = false;
        window.ASL.highlight = {
            "enabled": false,
            "data": []
        };
        window.ASL.analytics = {
            "method": 0,
            "tracking_id": "",
            "string": "?ajax_search={asl_term}",
            "event": {
                "focus": {
                    "active": 1,
                    "action": "focus",
                    "category": "ASL",
                    "label": "Input focus",
                    "value": "1"
                },
                "search_start": {
                    "active": 0,
                    "action": "search_start",
                    "category": "ASL",
                    "label": "Phrase: {phrase}",
                    "value": "1"
                },
                "search_end": {
                    "active": 1,
                    "action": "search_end",
                    "category": "ASL",
                    "label": "{phrase} | {results_count}",
                    "value": "1"
                },
                "magnifier": {
                    "active": 1,
                    "action": "magnifier",
                    "category": "ASL",
                    "label": "Magnifier clicked",
                    "value": "1"
                },
                "return": {
                    "active": 1,
                    "action": "return",
                    "category": "ASL",
                    "label": "Return button pressed",
                    "value": "1"
                },
                "facet_change": {
                    "active": 0,
                    "action": "facet_change",
                    "category": "ASL",
                    "label": "{option_label} | {option_value}",
                    "value": "1"
                },
                "result_click": {
                    "active": 1,
                    "action": "result_click",
                    "category": "ASL",
                    "label": "{result_title} | {result_url}",
                    "value": "1"
                }
            }
        };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/ajax-search-lite/js/min/plugin/optimized/asl-prereq.js?ver=4762"
        id="wd-asl-ajaxsearchlite-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/ajax-search-lite/js/min/plugin/optimized/asl-core.js?ver=4762"
        id="wd-asl-ajaxsearchlite-core-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/ajax-search-lite/js/min/plugin/optimized/asl-results-vertical.js?ver=4762"
        id="wd-asl-ajaxsearchlite-vertical-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/ajax-search-lite/js/min/plugin/optimized/asl-autocomplete.js?ver=4762"
        id="wd-asl-ajaxsearchlite-autocomplete-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/ajax-search-lite/js/min/plugin/optimized/asl-load.js?ver=4762"
        id="wd-asl-ajaxsearchlite-load-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/ajax-search-lite/js/min/plugin/optimized/asl-wrapper.js?ver=4762"
        id="wd-asl-ajaxsearchlite-wrapper-js"></script>
    <script type="text/javascript" src="https://mcanp.org/en/wp-includes/js/jquery/ui/core.min.js?ver=1.13.2"
        id="jquery-ui-core-js"></script>
    <script type="text/javascript" src="https://mcanp.org/en/wp-includes/js/jquery/ui/accordion.min.js?ver=1.13.2"
        id="jquery-ui-accordion-js"></script>
    <script type="text/javascript" src="https://mcanp.org/en/wp-includes/js/jquery/ui/effect.min.js?ver=1.13.2"
        id="jquery-effects-core-js"></script>
    <script type="text/javascript" id="accordions_js-js-extra">
        /* <![CDATA[ */
        var accordions_ajax = {
            "accordions_ajaxurl": "https:\/\/mcanp.org\/en\/wp-admin\/admin-ajax.php"
        };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/accordions/assets/frontend/js/scripts.js?ver=1720688409"
        id="accordions_js-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/popup-anything-on-click/assets/js/custombox.legacy.min.js?ver=2.8.1"
        id="wpos-custombox-legacy-js-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/popup-anything-on-click/assets/js/custombox.min.js?ver=2.8.1"
        id="wpos-custombox-popup-js-js"></script>
    <script type="text/javascript"
        src="https://mcanp.org/en/wp-content/plugins/popup-anything-on-click/assets/js/popupaoc-public.js?ver=2.8.1"
        id="popupaoc-public-js-js"></script>
    <style>
        @media only screen and (min-width: 0px) and (max-width: 767px) {
            #accordions-2158 {
                width: 100%;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 1023px) {
            #accordions-2158 {
                width: 100%;
            }
        }

        @media only screen and (min-width: 1024px) {
            #accordions-2158 {
                width: 100%;
            }
        }

        #accordions-2158 .accordions-lazy {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #accordions-2158 {
            position: relative;
            text-align: left;
            background: #ffffff url() repeat scroll 0 0;
        }

        #accordions-2158 .accordions-head {
            outline: none;
            background: #1e73be none repeat scroll 0 0;
        }

        #accordions-2158 .accordions-head-title {
            color: #ffffff;
            font-size: 16px;
        }

        #accordions-2158 .accordions-head-title-toggle {
            color: #ffffff;
            font-size: 16px;
        }

        #accordions-2158 .accordions-head:hover .accordions-head-title {
            color: #ffffff;
        }

        #accordions-2158 .ui-state-active {
            border: none;
            background: #174e7f;
        }

        #accordions-2158 .accordion-content {
            border: none;
            background: #ffffff none repeat scroll 0 0;
        }

        #accordions-2158 .accordion-icons {}

        #accordions-2158 .accordions-head:hover .accordion-icons span {}
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {});
    </script>


    <script>
        var accordions_active = {
            "2158": []
        };
        var accordions_tabs_active = null;
    </script>

    <script type="text/javascript">
        /*Scroll to top*/
        jQuery(document).ready(function() {
            jQuery(window).scroll(function() {
                if (jQuery(this).scrollTop() > 100) {
                    jQuery('.scrollToTop').fadeIn();
                } else {
                    jQuery('.scrollToTop').fadeOut();
                }
            });

            jQuery('.scrollToTop').click(function() {
                jQuery('.scrollToTop').tooltip('hide');
                jQuery('html, body').animate({
                    scrollTop: 0
                }, 1200);
                return false;
            });
        });

        /*placeholder for subscription*/
        jQuery('.tnp-email').attr('placeholder', 'Email Address');
    </script>
    @stack('script')

</body>

</html>
