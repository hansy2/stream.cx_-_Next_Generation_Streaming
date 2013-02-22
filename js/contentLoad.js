(function ($) {

    $(document).ready(function () {
        var $contDiv = $("#contentLoad");

        $contDiv.css("height", $contDiv.height());

        $(window).bind("hashChange", function (e, newHash, oldHash) {

            $.getJSON("index.php?request=json&content="+newHash,
                function (data) {
                    $contDiv.fadeOut(200, function () {
                        $contDiv.html(data).wrapInner('<div/>');
                        $contDiv.fadeIn(200, function () {
                            $contDiv.animate({
                                height: $('div:first', $contDiv).height() + "px"
                            });
                        });
                    });
                });
        });

        $(window).hashChange();
    });

})(jQuery);