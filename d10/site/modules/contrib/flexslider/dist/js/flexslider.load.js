(function () {
  'use strict';

  (function ($) {
    function flexsliderInit(id, optionset, context) {
      $(once("flexslider", "#".concat(id), context)).each(function () {
        $(this).find("ul.slides > li > *").removeAttr("width").removeAttr("height");
        if (optionset) {
          $(this).flexslider($.extend(optionset, {
            start: function start(slider) {
              slider.trigger("start", [slider]);
            },
            before: function before(slider) {
              slider.trigger("before", [slider]);
            },
            after: function after(slider) {
              slider.trigger("after", [slider]);
            },
            end: function end(slider) {
              slider.trigger("end", [slider]);
            },
            added: function added(slider) {
              slider.trigger("added", [slider]);
            },
            removed: function removed(slider) {
              slider.trigger("removed", [slider]);
            },
            init: function init(slider) {
              slider.trigger("init", [slider]);
            }
          }));
        } else {
          $(this).flexslider();
        }
      });
    }
    Drupal.behaviors.flexslider = {
      attach: function attach(context, settings) {
        var sliders = [];
        var id;
        if ($.type(settings.flexslider) !== "undefined" && $.type(settings.flexslider.instances) !== "undefined") {
          for (id in settings.flexslider.instances) {
            if (settings.flexslider.instances.hasOwnProperty(id)) {
              if ($.type(settings.flexslider.optionsets) !== "undefined" && settings.flexslider.instances[id] in settings.flexslider.optionsets) {
                if (settings.flexslider.optionsets[settings.flexslider.instances[id]].asNavFor !== "") {
                  flexsliderInit(id, settings.flexslider.optionsets[settings.flexslider.instances[id]], context);
                } else {
                  sliders[id] = settings.flexslider.optionsets[settings.flexslider.instances[id]];
                }
              }
            }
          }
        }
        for (id in sliders) {
          if (sliders.hasOwnProperty(id)) {
            flexsliderInit(id, settings.flexslider.optionsets[settings.flexslider.instances[id]], context);
          }
        }
      }
    };
  })(jQuery);

})();
