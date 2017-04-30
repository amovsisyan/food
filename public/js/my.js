$( document ).ready(function() {
    /*      Carousel location changing, cause there is bootstrap problem        */
    $(document).on('click', '.carousel_more', function(event) {
        var link = $('.item.active .carousel_more').attr('data-href');
        location.replace(link);
    });

    $(".most-populars").on({
        mouseenter: function () {
            var big_div_h = $(this).height();
            var text_div_h = $(this).find('.text').height();
            var text_div_w = $(this).find('.text').width();
            var under_div_w = $(this).find('.my_underline').width();
            if(under_div_w){
                for(start = under_div_w; start <= text_div_w; start += 10) {
                    $(this).find('.my_underline').remove();
                    $(this).find('.text').append('<div class="my_underline"></div>');
                    $('.my_underline').css({"width": start});
                    var asas = $(this).find('.my_underline').width();

                    console.log('start ===',  start, 'width =====', asas);
                }
            } else {
                for(start = 0; start <= text_div_w; start += 10) {
                    $(this).find('.my_underline').remove();
                    $(this).find('.text').append('<div class="my_underline"></div>');
                    $('.my_underline').css({"width": start});
                    var asas = $(this).find('.my_underline').width();

                    console.log('start ===',  start, 'width =====', asas);
                }
            }

            // MyUnderline(text_div_w)

        },
        mouseleave: function () {
            var big_div_h = $(this).height();
            var text_div_h = $(this).find('.text').height();
            var text_div_w = $(this).find('.text').width();
            var under_div_w = $(this).find('.my_underline').width();
            if(under_div_w){
                for(start = under_div_w; start >= 0; start -= 10) {
                    if (start<0)return;
                    $(this).find('.my_underline').remove();
                    $(this).find('.text').append('<div class="my_underline"></div>');
                    $('.my_underline').css({"width": start});
                    var asas = $(this).find('.my_underline').width();

                    console.log('start ===',  start, 'width =====', asas);
                }
            } else {
                for(start = 0; start >= 0; start -= 10) {
                    if (start<0)return;
                    $(this).find('.my_underline').remove();
                    $(this).find('.text').append('<div class="my_underline"></div>');
                    $('.my_underline').css({"width": start});
                    var asas = $(this).find('.my_underline').width();

                    console.log('start ===',  start, 'width =====', asas);
                }
            }

        }
    });
});

function MyUnderline(width, start){
    for(start = 0; start <= width; start += 10) {
        var text_div_h = $(this).find('.text').append('<div class="my_underline"></div>')
        console.log('start ===',  start, 'width =====', width);
    }
    // start = typeof start !== 'undefined' ? start : 0;
    // if(start>=width) return;
    // start += 10;
    // MyUnderline(width,start);
    // console.log('start ===',  start, 'width =====', width);
}