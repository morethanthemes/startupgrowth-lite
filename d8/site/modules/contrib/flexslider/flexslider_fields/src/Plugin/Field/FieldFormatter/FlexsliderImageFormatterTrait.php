<?php

namespace Drupal\flexslider_fields\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Cache\Cache;
use Drupal\Component\Utility\Xss;

/**
 * A trait for all image-related FlexSlider formatters.
 *
 * @see Drupal\Core\Field\FormatterBase
 * @see Drupal\flexslider_fields\Plugin\Field\FieldFormatter\FlexsliderFormatterTrait
 */
trait FlexsliderImageFormatterTrait {

  /**
   * Returns the image-related FlexSlider specific default settings.
   *
   * @return array
   *   An array of default settings for the formatter.
   */
  protected static function getDefaultImageSettings() {
    return [
      'caption' => '',
    ];
  }

  /**
   * The flexslider formatted view for images.
   *
   * @param array $images
   *   Images render array from the (Responsive)Image Formatter.
   * @param array $formatter_settings
   *   Render array of settings.
   *
   * @return array
   *   Render of flexslider formatted images.
   */
  protected function viewImages(array $images, array $formatter_settings) {

    // Bail out if no images to render.
    if (empty($images)) {
      return [];
    }

    // Get cache tags for the option set.
    if ($optionset = $this->loadOptionset($formatter_settings['optionset'])) {
      $cache_tags = $optionset->getCacheTags();
    }
    else {
      $cache_tags = [];
    }

    $items = [];

    foreach ($images as $delta => &$image) {

      // Merge in the cache tags.
      if ($cache_tags) {
        $image['#cache']['tags'] = Cache::mergeTags($image['#cache']['tags'], $cache_tags);
      }

      // Prepare the slide item render array.
      $item = [];

      // Check caption settings.
      if ($formatter_settings['caption'] == 1) {
        $item['caption'] = ['#markup' => Xss::filterAdmin($image['#item']->title)];
      }
      elseif ($formatter_settings['caption'] == 'alt') {
        $item['caption'] = ['#markup' => Xss::filterAdmin($image['#item']->alt)];
      }

      // @todo Should find a way of dealing with render arrays instead of the actual output
      $item['slide'] = \Drupal::service('renderer')->render($image);

      $items[$delta] = $item;
    }

    $images['#theme'] = 'flexslider';
    $images['#flexslider'] = [
      'settings' => $formatter_settings,
      'items' => $items,
    ];

    return $images;
  }

  /**
   * Returns the form element for caption settings.
   *
   * @param \Drupal\Core\Field\FormatterBase $formatter
   *   The formatter having this trait.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The image field definition.
   *
   * @return array
   *   The caption settings render array.
   */
  protected function captionSettings(FormatterBase $formatter, FieldDefinitionInterface $field_definition) {
    $field_settings = $field_definition->getSettings();

    // Set the caption options.
    $caption_options = [
      0 => $formatter->t('None'),
      1 => $formatter->t('Image title'),
      'alt' => $formatter->t('Image ALT attribute'),
    ];

    $default_value = $formatter->getSetting('caption');

    // Remove the options that are not available.
    $action_fields = [];
    if ($field_settings['title_field'] === FALSE) {
      unset($caption_options[1]);
      // User action required on the image title.
      $action_fields[] = 'title';
      if ($default_value == 1) {
        $default_value = '';
      }
    }
    if ($field_settings['alt_field'] === FALSE) {
      unset($caption_options['alt']);
      // User action required on the image alt.
      $action_fields[] = 'alt';
      if ($default_value == 'alt') {
        $default_value = '';
      }
    }

    // Create the caption element.
    $element['caption'] = [
      '#title' => $formatter->t('Choose a caption source'),
      '#type' => 'select',
      '#options' => $caption_options,
      '#default_value' => $default_value,
    ];

    // If the image field doesn't have all of the suitable caption sources,
    // tell the user.
    if ($action_fields) {
      $action_text = $formatter->t('enable the @action_field field', ['@action_field' => implode(' and/or ', $action_fields)]);
      /* This may be a base field definition (e.g. in Views UI) which means it
       * is not associated with a bundle and will not have the toUrl() method.
       * So we need to check for the existence of the method before we can
       * build a link to the image field edit form.
       */
      if (method_exists($field_definition, 'toUrl')) {
        // Build the link to the image field edit form for this bundle.
        $rel = "{$field_definition->getTargetEntityTypeId()}-field-edit-form";
        $action = $field_definition->toLink($action_text, $rel,
          [
            'fragment' => 'edit-settings-alt-field',
            'query' => \Drupal::destination()->getAsArray(),
          ]
        )->toRenderable();
      }
      else {
        // Just use plain text if we can't build the field edit link.
        $action = ['#markup' => $action_text];
      }
      $element['caption']['#description']
        = $formatter->t('You need to @action for this image field to be able to use it as a caption.',
        ['@action' => \Drupal::service('renderer')->render($action)]);

      // If there are no suitable caption sources, disable the caption element.
      if (count($action_fields) >= 2) {
        $element['caption']['#disabled'] = TRUE;
      }
    }

    return $element;
  }

}
