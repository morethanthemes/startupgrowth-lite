(function ($, Drupal, drupalSettings, once) {
  Drupal.behaviors.mtMagnificPopupFieldImageSlider = {
    attach: function (context, settings) {
      const sliderImage = once('mtMagnificPopupFieldImageSliderNotCloneInit', ".in-page-images-slider li:not(.clone) .image-popup", context);
      $(sliderImage).magnificPopup({
        type:"image",
        removalDelay: 300,
        mainClass: "mfp-fade",
        gallery: {
          enabled: true, // set to true to enable gallery
        },
        image: {
          titleSrc: function(item) {
            return item.el.children()[0].title || '';
          }
        }
      });
      const singleImage = once('mtMagnificPopupFieldImageSliderOneValueInit', ".one-value .image-popup", context);
      $(singleImage).magnificPopup({
        type:"image",
        removalDelay: 300,
        mainClass: "mfp-fade",
        gallery: {
          enabled: true, // set to true to enable gallery
        },
        image: {
          titleSrc: function(item) {
            return item.el.children()[0].title || '';
          }
        }
      });
    }
  };
})(jQuery, Drupal, drupalSettings, once);