var mySwiper = new Swiper(".swiper-container", {
  // オプション設定
  loop: true, // ループ
  speed: 600, // 切り替えスピード(ミリ秒)。
  slidesPerView: 1, // １スライドの表示数
  spaceBetween: 0, // スライドの余白(px)
  direction: "horizontal", // スライド方向
  effect: "slide", // スライド効果

  // スライダーの自動再生設定
  autoplay: {
    delay: 3000, // スライドが切り替わるまでの時間(ミリ秒)
    stopOnLast: false, // 自動再生の停止なし
    disableOnInteraction: true, // ユーザー操作後の自動再生停止
  },

  // ページネーションを有効化
  pagination: {
    el: ".swiper-pagination",
  },

  // ナビゲーションを有効化
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});