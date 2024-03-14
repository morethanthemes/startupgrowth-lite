(function ($, Drupal, drupalSettings, once) {
  Drupal.behaviors.mtflexsliderInPage = {
    attach: function (context, settings) {
      // store the slider in a local variable
      var $window = $(window),
      flexslider;

      once('mtflexsliderInPageSliderInit', ".in-page-images-slider", context).forEach(function(item) {
        $(item).flexslider({
          useCSS: false,
          animation: drupalSettings.startupgrowth_lite.flexsliderInPageInit.inPageSliderEffect,
          controlNav: false,
          directionNav: false,
          animationLoop: false,
          slideshow: false,
          sync: ".in-page-images-carousel"
        });

        $(item).fadeIn("slow");

      });
      once('mtflexsliderInPageCarouselInit', ".in-page-images-carousel", context).forEach(function(item) {

        // tiny helper function to add breakpoints
        function getGridSize() {
          return (window.innerWidth < 768) ? 2 : 4;
        }

        // The slider being synced must be initialized first
        $(item).flexslider({
          animation: "slide",
          controlNav: false,
          animationLoop: false,
          slideshow: false,
          itemWidth: 172.5,
          itemMargin: 20,
          prevText: "",
          nextText: "",
          asNavFor: ".in-page-images-slider",
          minItems: getGridSize(), // use function to pull in initial value
          maxItems: getGridSize(), // use function to pull in initial value
          start: function(slider){
            flexslider = slider;
          }
        });


        // check grid size on resize event
        $window.resize(function() {
          var gridSize = getGridSize();
          flexslider.vars.minItems = gridSize;
          flexslider.vars.maxItems = gridSize;
        });

        $(item).fadeIn("slow");

      });
      
    }
  };
})(jQuery, Drupal, drupalSettings, once);