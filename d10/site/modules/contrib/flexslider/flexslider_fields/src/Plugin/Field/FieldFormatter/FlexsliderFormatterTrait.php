<?php

namespace Drupal\flexslider_fields\Plugin\Field\FieldFormatter;

use Drupal\Core\Url;
use Drupal\flexslider\Entity\Flexslider;

/**
 * A common trait for all FlexSlider formatters (image + entity).
 *
 * @see Drupal\Core\Field\FormatterBase
 * @see Drupal\flexslider_fields\Plugin\Field\FieldFormatter\FlexsliderImageFormatterTrait
 */
trait FlexsliderFormatterTrait {

  /**
   * Returns the FlexSlider specific default settings.
   *
   * @return array
   *   An array of default settings for the formatter.
   */
  protected static function getDefaultSettings() {
    return [
      'optionset' => 'default',
    ];
  }

  /**
   * Builds the FlexSlider settings summary.
   *
   * @return array
   *   The settings summary build array.
   */
  protected function buildSettingsSummary() {
    $summary = [];

    // Load the selected optionset.
    $optionset = $this->loadOptionset($this->getSetting('optionset'));

    // Build the optionset summary.
    $os_summary = $optionset ? $optionset->label() : $this->t('Default settings');
    $summary[] = $this->t('Option set: %os_summary', ['%os_summary' => $os_summary]);

    return $summary;
  }

  /**
   * Builds the FlexSlider settings form.
   *
   * @return array
   *   The render array for Optionset settings.
   */
  protected function buildSettingsForm() {

    // Get list of option sets as an associative array.
    $optionsets = flexslider_optionset_list();

    $element['optionset'] = [
      '#title' => $this->t('Option Set'),
      '#type' => 'select',
      '#default_value' => $this->getSetting('optionset'),
      '#options' => $optionsets,
    ];

    $element['links'] = [
      '#theme' => 'links',
      '#links' => [
        [
          'title' => $this->t('Create new option set'),
          'url' => Url::fromRoute('entity.flexslider.add_form', [], ['query' => \Drupal::destination()->getAsArray()]),
        ],
        [
          'title' => $this->t('Manage option sets'),
          'url' => Url::fromRoute('entity.flexslider.collection', [], ['query' => \Drupal::destination()->getAsArray()]),
        ],
      ],
      '#access' => \Drupal::currentUser()->hasPermission('administer flexslider'),
    ];

    return $element;
  }

  /**
   * Loads the selected option set.
   *
   * @param string $id
   *   This option set id.
   *
   * @returns \Drupal\flexslider\Entity\Flexslider
   *   The option set selected in the formatter settings.
   */
  protected function loadOptionset($id) {
    return Flexslider::load($id);
  }

  /**
   * Return the currently configured option set as a dependency array.
   *
   * @return array
   *   An array of option set dependencies
   */
  protected function getOptionsetDependencies() {
    $dependencies = [];
    $option_id = $this->getSetting('optionset');
    if ($option_id && $optionset = $this->loadOptionset($option_id)) {
      // Add the optionset as dependency.
      $dependencies[$optionset->getConfigDependencyKey()][] = $optionset->getConfigDependencyName();
    }
    return $dependencies;
  }

  /**
   * If a dependency is going to be deleted, set the option set to default.
   *
   * @param array $dependencies_deleted
   *   An array of dependencies that will be deleted.
   *
   * @return bool
   *   Whether or not option set dependencies changed.
   */
  protected function optionsetDependenciesDeleted(array $dependencies_deleted) {
    $option_id = $this->getSetting('optionset');
    if ($option_id && $optionset = $this->loadOptionset($option_id)) {
      if (!empty($dependencies_deleted[$optionset->getConfigDependencyKey()]) && in_array($optionset->getConfigDependencyName(), $dependencies_deleted[$optionset->getConfigDependencyKey()])) {
        $this->setSetting('optionset', 'default');
        return TRUE;
      }
    }
    return FALSE;
  }

}
