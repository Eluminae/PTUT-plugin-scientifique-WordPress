(function ($) {

    "use strict";

    var matched, browser;

    // Use of jQuery.browser is frowned upon.
    // More details: http://api.jquery.com/jQuery.browser
    // jQuery.uaMatch maintained for back-compat
    jQuery.uaMatch = function (ua) {
        ua = ua.toLowerCase();

        var match = /(chrome)[ \/]([\w.]+)/.exec(ua) ||
            /(webkit)[ \/]([\w.]+)/.exec(ua) ||
            /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(ua) ||
            /(msie) ([\w.]+)/.exec(ua) ||
            ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(ua) || [];

        return {
            browser: match[1] || "",
            version: match[2] || "0"
        };
    };

    matched = jQuery.uaMatch(navigator.userAgent);
    browser = {};

    if (matched.browser) {
        browser[matched.browser] = true;
        browser.version = matched.version;
    }

    // Chrome is Webkit, but Webkit is also Safari.
    if (browser.chrome) {
        browser.webkit = true;
    } else if (browser.webkit) {
        browser.safari = true;
    }

    jQuery.browser = browser;

    jQuery.sub = function () {
        function jQuerySub(selector, context) {
            return new jQuerySub.fn.init(selector, context);
        }
        jQuery.extend(true, jQuerySub, this);
        jQuerySub.superclass = this;
        jQuerySub.fn = jQuerySub.prototype = this();
        jQuerySub.fn.constructor = jQuerySub;
        jQuerySub.sub = this.sub;
        jQuerySub.fn.init = function init(selector, context) {
            if (context && context instanceof jQuery && !(context instanceof jQuerySub)) {
                context = jQuerySub(context);
            }

            return jQuery.fn.init.call(this, selector, context, rootjQuerySub);
        };
        jQuerySub.fn.init.prototype = jQuerySub.fn;
        var rootjQuerySub = jQuerySub(document);
        return jQuerySub;
    };



$(document).ready(function () {
    "use strict";
    $(".responsive-menu").click(function (e) {
        $(".menu>ul").css({display: "block"});
        e.stopPropagation();
        if (e.preventDefault)
            e.preventDefault();
        return false;
    });
    $("body").click(function () {
        $(".menu>ul").css({display: "none"});
    });
});


$(document).ready(function () {
   /* GALLERY IMAGE ZOOM */
    var swipebox = (jQuery().swipebox) ? $(".swipebox").swipebox() : null;
});

/* ================= SCROOL TOP ================= */
$(document).ready(function () {
    "use strict";
    $('.backtotop').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 1200, 'swing');
        return false;
    });
});

/* ================= IE fix ================= */
$(document).ready(function () {
    "use strict";
    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function (obj, start) {
            for (var i = (start || 0), j = this.length; i < j; i++) {
                if (this[i] === obj) {
                    return i;
                }
            }
            return -1;
        };
    }
});

/* ================= START PLACE HOLDER ================= */
$(document).ready(function ($) {
    "use strict";
    $('input[placeholder], textarea[placeholder]').placeholder();
});
/* ================= END PLACE HOLDER ================= */

// Instantiate theme collapse element object
var $theme_accordion = {};
$theme_accordion.collapse = {};

/* ACCORDION */
$(".accordion-toggle").click(function () {
    "use strict";
    if ($(this).parent().hasClass('active')) {
        $theme_accordion.collapse.close($(this).parent().parent());
        return;
    }
    $('#accordion').children('.accordion-group').each(function (i, elem) {
        $theme_accordion.collapse.close(elem);
    });
    $theme_accordion.collapse.open(this);
});


/* ACCORDION STATE MANAGER */
$theme_accordion.collapse.close = function close(element) {
    "use strict";
    jQuery(element).children('.accordion-heading').removeClass('active');
    //jQuery(element).children('.accordion-body').removeClass('in');
    jQuery(element).children('.accordion-heading').find('.plus').html('+');
};
$theme_accordion.collapse.open = function open(element) {
    "use strict";
    jQuery(element).parent().toggleClass('active');
    jQuery(element).find('.plus').html('-');
};
/* --------------------------- */


/* =================Twitter============================ */
var load_twitter = function () {
    "use strict";
    var linkify = function (text) {
        text = text.replace(/(https?:\/\/\S+)/gi, function (s) {
            return '<a href="' + s + '">' + s + '</a>';
        });
        text = text.replace(/(^|)@(\w+)/gi, function (s) {
            return '<a href="http://twitter.com/' + s + '">' + s + '</a>';
        });
        text = text.replace(/(^|)#(\w+)/gi, function (s) {
            return '<a href="http://search.twitter.com/search?q=' + s.replace(/#/, '%23') + '">' + s + '</a>';
        });
        return text;
    };
    $('.twitter_widget').each(function () {
        var t = $(this);
        var t_date_obj = new Date();
        var t_loading = 'Loading tweets..'; //message to display before loading tweets
        var t_container = $('<ul>').addClass('twitter').append('<li>' + t_loading + '</li>');
        t.append(t_container);
        var t_user = t.attr('data-user');
        var t_posts = parseInt(t.attr('data-posts'), 10);
        $.getJSON("php/twitter.php?user=" + t_user, function (t_tweets) {
            t_container.empty();
            for (var i = 0; i < t_posts && i < t_tweets.length; i++) {
                var t_date = Math.floor((t_date_obj.getTime() - Date.parse(t_tweets[i].created_at)) / 1000);
                var t_date_str;
                var t_date_seconds = t_date % 60;
                t_date = Math.floor(t_date / 60);
                var t_date_minutes = t_date % 60;
                if (t_date_minutes) {
                    t_date = Math.floor(t_date / 60);
                    var t_date_hours = t_date % 60;
                    if (t_date_hours) {
                        t_date = Math.floor(t_date / 60);
                        var t_date_days = t_date % 24;
                        if (t_date_days) {
                            t_date = Math.floor(t_date / 24);
                            var t_date_weeks = t_date % 7;
                            if (t_date_weeks)
                                t_date_str = t_date_weeks + ' week' + (1 == t_date_weeks ? '' : 's') + ' ago';
                            else
                                t_date_str = t_date_days + ' day' + (1 == t_date_days ? '' : 's') + ' ago';
                        } else
                            t_date_str = t_date_hours + ' hour' + (1 == t_date_hours ? '' : 's') + ' ago';
                    } else
                        t_date_str = t_date_minutes + ' minute' + (1 == t_date_minutes ? '' : 's') + ' ago';
                } else
                    t_date_str = t_date_seconds + ' second' + (1 == t_date_seconds ? '' : 's') + ' ago';
                var t_message =
                    '<li>' +
                    linkify(t_tweets[i].text) +
                    '<span>' +
                    t_date_str +
                    '</span>' +
                    '</li>';
                t_container.append(t_message);
            }
            load_twitter_rotator();
        });
    });
};
//load modules-------------

jQuery(document).ready(function ($) {
    load_twitter();
});

/* ================= PHOTOSTREAM ================= */

var load_photostream = function() {
    "use strict";
    $('.flickr_widget').each(function() {
        var stream = $(this);
        var stream_userid = stream.attr('data-userid');
        var stream_items = parseInt(stream.attr('data-items'), 10);
        $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?lang=en-us&format=json&id=" + stream_userid + "&jsoncallback=?", function(stream_feed) {
            var i;
            var stream_function = function(i) {
                if (stream_feed.items[i].media.m) {
                    var stream_a = $('<a>').addClass('PhotostreamLink').attr('href', stream_feed.items[i].link).attr('target', '_blank');
                    var stream_img = $('<img>').addClass('PhotostreamImage').attr('src', stream_feed.items[i].media.m).attr('alt', '').each(function() {
                        var t_this = this;
                        var j_this = $(this);
                        var t_loaded_function = function() {
                            stream_a.append(t_this);
                        };
                        var t_loaded_ready = false;
                        var t_loaded_check = function() {
                            if (!t_loaded_ready) {
                                t_loaded_ready = true;
                                t_loaded_function();
                            }
                        };
                        var t_loaded_status = function() {
                            if (t_this.complete && j_this.height() !== 0)
                                t_loaded_check();
                        };
                        t_loaded_status();
                        $(this).load(function() {
                            t_loaded_check();
                        });
                    });
                    stream.append($('<li>').append(stream_a));
                }
            };
            for (i = 0; i < stream_items && i < stream_feed.items.length; i++) {
                stream_function(i);
            }
        });
    });
};

load_photostream();

/* -----------------------------------------------------------------------*/

//==============END TWITTER====================================

//==============Delete empty p=================
$('.content > .container > p')
    .filter(function() {
        return $.trim($(this).html()) === '' && $(this).children().length === 0;
    })
    .remove();
})(jQuery);