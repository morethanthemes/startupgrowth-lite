<?php

namespace Drupal\flexslider_fields\Plugin\Field\FieldFormatter;

use Drupal\Core\Cache\Cache;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceEntityFormatter;
use Drupal\Core\Form\FormStateInterface;
use Drupal\flexslider\Entity\Flexslider;

/**
 * Plugin implementation of the 'flexslider_entity' formatter.
 *
 * @FieldFormatter(
 *   id = "flexslider_entity",
 *   label = @Translation("FlexSlider (Entity view)"),
 *   field_types = {
 *     "entity_reference",
 *     "entity_reference_revisions"
 *   }
 * )
 */
class FlexsliderEntityFormatter extends EntityReferenceEntityFormatter {
  use FlexsliderFormatterTrait;

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return parent::defaultSettings() + self::getDefaultSettings();
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
    return parent::settingsForm($form, $form_state) + $this->buildSettingsForm();
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $entities = parent::viewElements($items, $langcode);

    // Bail out if there are no entities to render.
    if (empty($entities)) {
      return [];
    }

    $formatter_settings = $this->getSettings();

    // Get cache tags for the option set.
    if ($optionset = Flexslider::load($formatter_settings['optionset'])) {
      $cache_tags = $optionset->getCacheTags();
    }
    else {
      $cache_tags = [];
    }

    $items = [];
    foreach ($entities as $delta => &$entity) {
      // Merge in the cache tags.
      if ($cache_tags) {
        $entity['#cache']['tags'] = Cache::mergeTags($entity['#cache']['tags'], $cache_tags);
      }

      // Prepare the slide item render array.
      $item = [];
      $item['slide'] = $entity;
      $items[$delta] = $item;
    }

    return [
      '#theme' => 'flexslider',
      '#flexslider' => [
        'settings' => $formatter_settings,
        'items' => $items,
      ],
      // @todo we probably want a twig template for this.
      '#prefix' => '<div class="flexslider-field-wrapper">',
      '#suffix' => '</div>',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function isApplicable(FieldDefinitionInterface $field_definition) {
    // @todo This could be shared with the other formatters.
    // This formatter only applies to multi-valued entity reference fields.
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
