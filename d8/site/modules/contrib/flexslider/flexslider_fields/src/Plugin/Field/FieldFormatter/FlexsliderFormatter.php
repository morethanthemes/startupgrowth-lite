<?php

namespace Drupal\flexslider_fields\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\image\Plugin\Field\FieldFormatter\ImageFormatter;

/**
 * Plugin implementation of the '<flexslider>' formatter.
 *
 * @FieldFormatter(
 *   id = "flexslider",
 *   label = @Translation("FlexSlider"),
 *   field_types = {
 *     "image"
 *   }
 * )
 */
class FlexsliderFormatter extends ImageFormatter {
  use FlexsliderFormatterTrait;
  use FlexsliderImageFormatterTrait;

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return parent::defaultSettings() + self::getDefaultSettings() + self::getDefaultImageSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    return array_merge(parent::settingsSummary(), $this->buildSettingsSummary());
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    // Add the optionset setting.
    $element = $this->buildSettingsForm();

    // Add the image settings.
    $element = array_merge($element, parent::settingsForm($form, $form_state));
    // We don't need the link setting.
    $element['image_link']['#access'] = FALSE;

    // Add the caption setting.
    if (!empty($this->getSettings())) {
      $element += $this->captionSettings($this, $this->fieldDefinition);
    }

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $images = parent::viewElements($items, $langcode);
    $elements[] = $this->viewImages($images, $this->getSettings());
    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public static function isApplicable(FieldDefinitionInterface $field_definition) {
    // This formatter only applies to multi-image fields.
    return parent::isApplicable($field_definition) && $field_definition->getFieldStorageDefinition()->isMultiple();
  }

  /**
   * {@inheritdoc}
   */
  public function calculateDependencies() {
    return parent::calculateDependencies() + $this->getOptionsetDependencies();
  }

  /**
   * {@inheritdoc}
   */
  public function onDependencyRemoval(array $dependencies) {
    $changed = parent::onDependencyRemoval($dependencies);
    if ($this->optionsetDependenciesDeleted($dependencies)) {
      $changed = TRUE;
    }
    return $changed;
  }

}
