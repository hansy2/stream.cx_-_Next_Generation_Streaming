(function ($) {
    $(document).ready(function () {
        var $contDiv = $("#contentLoad");
        $contDiv.css("height", $contDiv.height());
        if (window.location.hash == '') {
            window.location.hash = 'main';
        }
        $(window).bind("hashChange", function (e, newHash, oldHash) {
            $.getJSON("index.php?request=json&content=" + encodeURIComponent(newHash),
                function (data) {
                    if (oldHash == '') {
                        $contDiv.hide().html(data).wrapInner('<div/>').show();
                        $('div:first', $contDiv).hide();
                        $contDiv.animate({
                            height:$('div:first', $contDiv).height() + "px"
                        }, 400);
                        $('div:first', $contDiv).fadeIn(1800);
                    }
                    else {
                        $contDiv.fadeOut(200, function () {
                            $contDiv.html(data).wrapInner('<div/>').fadeIn(200, function () {
                                $contDiv.animate({
                                    height:$('div:first', $contDiv).height() + "px"
                                });
                            });
                        });
                    }
                });
        });
        $(window).hashChange();
    });
})(jQuery);