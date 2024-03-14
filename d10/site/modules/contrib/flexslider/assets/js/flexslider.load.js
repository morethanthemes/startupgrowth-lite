/**
 * @file
 * Loads the FlexSlider library.
 */

($ => {
  /**
   * Initialize the flexslider instance.
   *
   * @param {string} id
   * Id selector of the flexslider object.
   * @param {object} optionset
   * The optionset to apply to the flexslider object.
   * @param {object} context
   * The DOM context.
   * @private
   */
  function flexsliderInit(id, optionset, context) {
    $(once("flexslider", `#${id}`, context)).each(function () {
      // Remove width/height attributes.
      // @todo load the css path from the settings
      $(this)
        .find("ul.slides > li > *")
        .removeAttr("width")
        .removeAttr("height");

      if (optionset) {
        // Add events that developers can use to interact.
        $(this).flexslider(
          $.extend(optionset, {
            start(slider) {
              slider.trigger("start", [slider]);
            },
            before(slider) {
              slider.trigger("before", [slider]);
            },
            after(slider) {
              slider.trigger("after", [slider]);
            },
            end(slider) {
              slider.trigger("end", [slider]);
            },
            added(slider) {
              slider.trigger("added", [slider]);
            },
            removed(slider) {
              slider.trigger("removed", [slider]);
            },
            init(slider) {
              slider.trigger("init", [slider]);
            },
          })
        );
      } else {
        $(this).flexslider();
      }
    });
  }

  Drupal.behaviors.flexslider = {
    attach(context, settings) {
      const sliders = [];
      let id;
      if (
        $.type(settings.flexslider) !== "undefined" &&
        $.type(settings.flexslider.instances) !== "undefined"
      ) {
        // eslint-disable-next-line no-restricted-syntax
        for (id in settings.flexslider.instances) {
          if (settings.flexslider.instances.hasOwnProperty(id)) {
            if (
              $.type(settings.flexslider.optionsets) !== "undefined" &&
              settings.flexslider.instances[id] in
                settings.flexslider.optionsets
            ) {
              if (
                settings.flexslider.optionsets[
                  settings.flexslider.instances[id]
                ].asNavFor !== ""
              ) {
                // We have to initialize all the sliders which are "asNavFor" first.
                flexsliderInit(
                  id,
                  settings.flexslider.optionsets[
                    settings.flexslider.instances[id]
                  ],
                  context
                );
              } else {
                // Everyone else is second.
                sliders[id] =
                  settings.flexslider.optionsets[
                    settings.flexslider.instances[id]
                  ];
              }
            }
          }
        }
      }
      // Slider set.
      // eslint-disable-next-line no-restricted-syntax
      for (id in sliders) {
        if (sliders.hasOwnProperty(id)) {
          flexsliderInit(
            id,
            settings.flexslider.optionsets[settings.flexslider.instances[id]],
            context
          );
        }
      }
    },
  };
})(jQuery);
