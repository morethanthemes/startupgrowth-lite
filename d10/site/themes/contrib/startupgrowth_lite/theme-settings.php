<?php

function startupgrowth_lite_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['#attached']['library'][] = 'startupgrowth_lite/theme-settings';

  $form['mtt_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('MtT Theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );

  $form['mtt_settings']['tabs'] = array(
    '#type' => 'vertical_tabs',
    '#default_tab' => 'basic_tab',
  );

  $form['mtt_settings']['basic_tab']['basic_settings'] = array(
    '#type' => 'details',
    '#title' => t('Basic Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'tabs',
  );

  $form['mtt_settings']['basic_tab']['basic_settings']['breadcrumb_separator'] = array(
    '#type' => 'textfield',
    '#title' => t('Breadcrumb separator'),
    '#description'   => t('Enter the class of the icon you want from the Font Awesome library e.g.: fa-angle-right. A list of the available classes is provided here: <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet" target="_blank">http://fortawesome.github.io/Font-Awesome/cheatsheet</a>.'),
    '#default_value' => theme_get_setting('breadcrumb_separator', 'startupgrowth_lite'),
    '#size'          => 20,
    '#maxlength'     => 100,
  );

  $form['mtt_settings']['basic_tab']['basic_settings']['scrolltop'] = array(
      '#type' => 'fieldset',
      '#title' => t('Scroll to top'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
  );

  $form['mtt_settings']['basic_tab']['basic_settings']['scrolltop']['scrolltop_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show scroll-to-top button'),
    '#description'   => t('Use the checkbox to enable or disable scroll-to-top button.'),
    '#default_value' => theme_get_setting('scrolltop_display', 'startupgrowth_lite'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['mtt_settings']['basic_tab']['basic_settings']['scrolltop']['scrolltop_icon'] = array(
    '#type' => 'textfield',
    '#title' => t('Scroll To Top icon'),
    '#description'   => t('Enter the class of the icon you want from the Font Awesome library e.g.: fa-long-arrow-up. A list of the available classes is provided here: <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet" target="_blank">http://fortawesome.github.io/Font-Awesome/cheatsheet</a>.'),
    '#default_value' => theme_get_setting('scrolltop_icon','startupgrowth_lite'),
    '#size'          => 20,
    '#maxlength'     => 100,
  );

  $form['mtt_settings']['basic_tab']['basic_settings']['header'] = array(
    '#type' => 'fieldset',
    '#title' => t('Header positioning'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['mtt_settings']['basic_tab']['basic_settings']['header']['fixed_header'] = array(
    '#type' => 'checkbox',
    '#title' => t('Fixed Header'),
    '#description'   => t('Use the checkbox to apply fixed position to the header regions.'),
    '#default_value' => theme_get_setting('fixed_header', 'startupgrowth_lite'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['mtt_settings']['bootstrap_tab']['bootstrap'] = array(
    '#type' => 'details',
    '#title' => t('Bootstrap'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'tabs',
  );

  $form['mtt_settings']['bootstrap_tab']['bootstrap']['bootstrap_remote_type'] = array(
    '#type' => 'select',
    '#title' => t('Select the remote type'),
    '#description'   => t('From the drop down select box, select how to load the Bootstrap library. If you select "Local" make sure that you download and place Bootstrap folder into the root theme folder (startupgrowth_lite/bootstrap).'),
    '#default_value' => theme_get_setting('bootstrap_remote_type', 'startupgrowth_lite'),
    '#options' => array(
    'local' => t('Local / No remote'),
    'cdn' => t('CDN'),
    ),
  );

  $form['mtt_settings']['looknfeel_tab']['looknfeel'] = array(
    '#type' => 'details',
    '#title' => t('Look\'n\'Feel'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'tabs',
  );

  $form['mtt_settings']['regions_tab']['regions'] = array(
    '#type' => 'details',
    '#title' => t('Region settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'tabs',
  );

  $form['mtt_settings']['post_tab']['post'] = array(
    '#type' => 'details',
    '#title' => t('Post'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'tabs',
  );

  $form['mtt_settings']['layout_tab']['layout_modes'] = array(
      '#type' => 'details',
      '#title' => t('Theme Layout'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#group' => 'tabs',
  );

  $form['mtt_settings']['font_tab']['font'] = array(
    '#type' => 'details',
    '#title' => t('Font Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'tabs',
  );

  $form['mtt_settings']['slideshows_tab']['slideshow'] = array(
    '#type' => 'details',
    '#title' => t('Slideshow Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'tabs',
  );

  $form['mtt_settings']['parallax_tab']['parallax_and_video_bg'] = array(
    '#type' => 'details',
    '#title' => t('Parallax/Video Background region'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'tabs',
  );

  $form['mtt_settings']['isotope_tab'] = array(
    '#type' => 'details',
    '#title' => t('Isotope Filters'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'tabs',
  );

  $form['mtt_settings']['google_maps_tab'] = array(
    '#type' => 'details',
    '#title' => t('Google Maps Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#group' => 'tabs',
  );

}
