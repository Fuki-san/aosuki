// app.js またはカスタム JavaScript ファイル
import 'slick-carousel';


$(document).ready(function () {
    $('.slider').slick({
        // オプションを追加できます
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
    });
});

