(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.mtMagnificPopupFieldImageSlider = {
    attach: function (context, settings) {
      $(context).find('.in-page-images-slider li:not(.clone) .image-popup').once('mtMagnificPopupFieldImageSliderNotCloneInit').magnificPopup({
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
      $(context).find('.one-value .image-popup').once('mtMagnificPopupFieldImageSliderOneValueInit').magnificPopup({
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
})(jQuery, Drupal, drupalSettings);