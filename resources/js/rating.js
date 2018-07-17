$(document).ready(function () {
    var star = $(".star");
    star.mouseover(function () {
        var title = $(this).data("title");
        for (var i = $(this).data("count"); i > 0; i--) {
            $('[class = star][data-count = ' + i + '][data-title = ' + title + ']').css("filter", "none");
        }
    });
    star.mouseleave(function () {
        star.css("filter", "invert(0.3)")
    });
    star.click(function (event) {
        var title = $(this).data('title');
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: $(this).data('url'),
            success: function (result) {
                result = parseFloat(result).toFixed(1);
                $('[class = avg][data-title = '+ title +']').text("Current rating : "+result);
                $('[class = star][data-title ='+title +']').hide();
            }
        });
    });
});