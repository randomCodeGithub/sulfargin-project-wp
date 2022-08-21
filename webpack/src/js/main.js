$(document).ready(function () {
  var $w = $(window);
  var $d = $(document);
  var $b = $("body");

  /**
   * Add "scrolled" class to body when
   * user scrolls past certain point.
   */
  function add_scrolled_class() {
    if ($d.scrollTop() > 48) {
      $b.addClass("scrolled");
    } else {
      $b.removeClass("scrolled");
    }
  }

  add_scrolled_class();
  $d.on("scroll", add_scrolled_class);

  /**
   * Slick slider
   */
  if ($(".c-cta-slider__slider").length) {
    $(".c-cta-slider__slider").slick({
      autoplay: true,
      autoplaySpeed: 1500,
      arrows: true,
      fade: true,
      dots: true,
      infinite: false,
      appendDots: $(".custom-slide-dots"),
      prevArrow: $(".slide-prev"),
      nextArrow: $(".slide-next"),
      customPaging: function(slider, i) {
        // this example would render "tabs" with titles
        return '<div class="c-cta-slider__dot"></div>';
      },
    });
  }

  /**
   * Stretch block out of column.
   */
  function stretch_blocks() {
    $("[data-stretch], .wp-block-columns").each(function (i, block) {
      var $block = $(block);
      var width = $(".site-content__outer").width();
      var offset = $block.offset().left;

      $block.css({
        width: width + "px",
        "margin-left": "-" + $(".site-content__inner").css("margin-left"),
      });
    });
  }

  stretch_blocks();
  $w.on("resize", stretch_blocks);

  /**
   * Force load late assets when viewing "Pro" page
   * so that the consent is displayed without
   * user interaction.
   */
  if ($b.hasClass("pro")) {
    $d.trigger("click");
  }

  /**
   * Burger click.
   */
  $d.on("click", ".js-burger", function () {
    $b.toggleClass("nav-open");
  });
});
