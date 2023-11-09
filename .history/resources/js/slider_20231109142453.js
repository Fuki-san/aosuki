// resources/js/slider.js

import 'slick-carousel';

// DOMが読み込まれたらSlick Sliderを初期化
document.addEventListener('DOMContentLoaded', function () {
    $('.slider').slick({
        // Slick Sliderのオプションを設定
        slidesToShow: 3, // 表示するスライド数
        autoplay: true, // 自動再生
        autoplaySpeed: 2000, // 自動再生の速さ（ミリ秒単位）
        arrows: true, // 矢印ボタンを表示
    });
});
