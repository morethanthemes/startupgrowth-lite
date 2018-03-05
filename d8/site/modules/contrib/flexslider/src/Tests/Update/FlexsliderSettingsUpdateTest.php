<?php

namespace Drupal\flexslider\Tests\Update;

use Drupal\system\Tests\Update\UpdatePathTestBase;

/**
 * Provides tests for settings update.
 *
 * @group Update
 */
class FlexsliderSettingsUpdateTest extends UpdatePathTestBase {

  /**
   * {@inheritdoc}
   */
  protected function setDatabaseDumpFiles() {
    $this->databaseDumpFiles = [
      __DIR__ . '/../../../tests/fixtures/update/drupal-8.flexslider.pre8001.php.gz',
    ];
  }

  /**
   * Tests that flexslider css toggle settings are added properly.
   */
  public function testUpdateHook8001() {
    // Make sure the css settings are not there before the update.
    $settings = \Drupal::config('flexslider.settings')->get();

    $this->assertFalse(isset($settings['flexslider_css']), 'FlexSlider base css setting not available before update.');
    $this->assertFalse(isset($settings['flexslider_module_css']), 'FlexSlider module integration css setting not available before update.');

    // Run the updates.
    $this->runUpdates();

    // Make sure settings are available and set to TRUE after the update.
    $settings = \Drupal::config('flexslider.settings')->get();
    $this->assertTrue($settings['flexslider_css'], 'FlexSlider base css setting is TRUE after update');
    $this->assertTrue($settings['flexslider_css'], 'FlexSlider module integration css setting is TRUE after update');
  }

}
