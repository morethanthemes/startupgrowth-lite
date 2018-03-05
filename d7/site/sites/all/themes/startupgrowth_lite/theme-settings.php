<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function startupgrowth_lite_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['mtt_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('MtT Theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );

  $form['mtt_settings']['tabs'] = array(
    '#type' => 'vertical_tabs',
    '#attached' => array(
      'css' => array(drupal_get_path('theme', 'startupgrowth_lite') . '/startupgrowth_lite.settings.form.css'),
    ),
  );
  
  $form['mtt_settings']['tabs']['basic_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Basic Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['mtt_settings']['tabs']['basic_settings']['breadcrumb'] = array(
    '#type' => 'item',
    '#markup' => t('<div class="theme-settings-title">Breadcrumb</div>'),
  );

  $form['mtt_settings']['tabs']['basic_settings']['breadcrumb_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show breadcrumb'),
    '#description'   => t('Use the checkbox to enable or disable Breadcrumb.'),
    '#default_value' => theme_get_setting('breadcrumb_display'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['mtt_settings']['tabs']['basic_settings']['header'] = array(
   '#type' => 'item',
   '#markup' => t('<div class="theme-settings-title">Header positioning</div>'),
  );
  
  $form['mtt_settings']['tabs']['basic_settings']['fixed_header'] = array(
    '#type' => 'checkbox',
    '#title' => t('Fixed position'),
    '#description'   => t('Use the checkbox to apply fixed position to the header.'),
    '#default_value' => theme_get_setting('fixed_header'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  ); 
  
  $form['mtt_settings']['tabs']['basic_settings']['scrolltop'] = array(
    '#type' => 'item',
    '#markup' => t('<div class="theme-settings-title">Scroll to top</div>'),
  );
  
  $form['mtt_settings']['tabs']['basic_settings']['scrolltop_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show scroll-to-top button'),
    '#description'   => t('Use the checkbox to enable or disable scroll-to-top button.'),
    '#default_value' => theme_get_setting('scrolltop_display'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['mtt_settings']['tabs']['basic_settings']['frontpage_content'] = array(
    '#type' => 'item',
    '#markup' => t('<div class="theme-settings-title">Front Page Behavior</div>'),
  );
  
  $form['mtt_settings']['tabs']['basic_settings']['frontpage_content_print'] = array(
    '#type' => 'checkbox',
    '#title' => t('Drupal frontpage content'),
    '#description'   => t('Use the checkbox to enable or disable the Drupal default frontpage functionality. Enable this to have all the promoted content displayed in the frontpage.'),
    '#default_value' => theme_get_setting('frontpage_content_print'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
    $form['mtt_settings']['tabs']['bootstrap_cdn'] = array(
        '#type' => 'fieldset',
        '#title' => t('BootstrapCDN'),
        '#group' => 'bootstrap',
    );

    $form['mtt_settings']['tabs']['bootstrap_cdn']['bootstrap_css_cdn'] = array(
        '#type' => 'select',
        '#title' => t('BootstrapCDN Complete CSS version'),
        '#options' => drupal_map_assoc(array(
          '3.2.0',
          '3.3.2'
        )),
        '#default_value' => theme_get_setting('bootstrap_css_cdn'),
        '#empty_value' => NULL,
    );

    $form['mtt_settings']['tabs']['bootstrap_cdn']['bootstrap_js_cdn'] = array(
        '#type' => 'select',
        '#title' => t('BootstrapCDN Complete JavaScript version'),
        '#options' => drupal_map_assoc(array(
          '3.2.0',
          '3.3.2'
        )),
        '#default_value' => theme_get_setting('bootstrap_js_cdn'),
        '#empty_option' => t('Disabled'),
        '#empty_value' => NULL,
    );

  $form['mtt_settings']['tabs']['looknfeel'] = array(
    '#type' => 'fieldset',
    '#title' => t('Look\'n\'Feel'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['mtt_settings']['tabs']['looknfeel']['color_scheme'] = array(
    '#type' => 'select',
    '#title' => t('Color Schemes'),
    '#description'   => t('From the drop-down menu, select the color scheme you prefer.'),
    '#default_value' => theme_get_setting('color_scheme'),
    '#options' => array(
    'default' => t('Gray Blue/Default'),
    'gray-green' => t('Gray Green'),
    'gray-orange' => t('Gray Orange'),
    'gray-red' => t('Gray Red'),
    'gray-pink' => t('Gray Pink'),
    'gray-purple' => t('Gray Purple'),
    'blue' => t('Blue'),
    'green' => t('Green'),
    'orange' => t('Orange'),    
    'red' => t('Red'),    
    'pink' => t('Pink'),    
    'purple' => t('Purple'),
    ),
  );

  $form['mtt_settings']['tabs']['looknfeel']['form_style'] = array(
    '#type' => 'select',
    '#title' => t('Form styles of contact page'),
    '#description'   => t('From the drop-down menu, select the form style that you prefer.'),
    '#default_value' => theme_get_setting('form_style'),
    '#options' => array(
    'form-style-1' => t('Style-1 (default)'),
    'form-style-2' => t('Style-2'),
    ),
  );
    
 $form['mtt_settings']['tabs']['layout_modes'] = array(
      '#type' => 'fieldset',
      '#title' => t('Layout'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
  );

  $form['mtt_settings']['tabs']['layout_modes']['layout_mode'] = array(
    '#type' => 'select',
    '#title' => t('Layout Mode'),
    '#description'   => t('From the drop-down menu, select the layout mode you prefer.'),
    '#default_value' => theme_get_setting('layout_mode'),
    '#options' => array(
    'wide' => t('Wide'),
    'boxed' => t('Boxed'),
    ),
  );

  $form['mtt_settings']['tabs']['font'] = array(
    '#type' => 'fieldset',
    '#title' => t('Font Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['mtt_settings']['tabs']['font']['font_title'] = array(
    '#type' => 'item',
    '#markup' => 'For every region pick the <strong>font-family</strong> that corresponds to your needs.',
  );
  
  $form['mtt_settings']['tabs']['font']['sitename_font_family'] = array(
    '#type' => 'select',
    '#title' => t('Site name'),
    '#default_value' => theme_get_setting('sitename_font_family'),
    '#options' => array(
      'sff-1' => t('Merriweather, Georgia, Times, Serif'),
      'sff-2' => t('Source Sans Pro, Helvetica Neuee, Arial, Sans-serif'),
      'sff-3' => t('Ubuntu, Helvetica Neue, Arial, Sans-serif'),
      'sff-4' => t('PT Sans, Helvetica Neue, Arial, Sans-serif'),
      'sff-5' => t('Roboto, Helvetica Neue, Arial, Sans-serif'),
      'sff-6' => t('Open Sans, Helvetica Neue, Arial, Sans-serif'),
      'sff-7' => t('Lato, Helvetica Neue, Arial, Sans-serif'),
      'sff-8' => t('Roboto Condensed, Arial Narrow, Arial, Sans-serif'),
      'sff-9' => t('Exo, Arial, Helvetica Neue, Sans-serif'),
      'sff-10' => t('Roboto Slab, Trebuchet MS, Sans-serif'),
      'sff-11' => t('Raleway, Helvetica Neue, Arial, Sans-serif'),
      'sff-12' => t('Josefin Sans, Georgia, Times, Serif'),
      'sff-13' => t('Georgia, Times, Serif'),
      'sff-14' => t('Playfair Display, Times, Serif'),
      'sff-15' => t('Philosopher, Georgia, Times, Serif'),
      'sff-16' => t('Cinzel, Georgia, Times, Serif'),               
      'sff-17' => t('Oswald, Helvetica Neue, Arial, Sans-serif'),    
      'sff-18' => t('Playfair Display SC, Georgia, Times, Serif'),
      'sff-19' => t('Cabin, Helvetica Neue, Arial, Sans-serif'),
      'sff-20' => t('Noto Sans, Arial, Helvetica Neue, Sans-serif;'),
      'sff-21' => t('Helvetica Neue, Arial, Sans-serif'),
      'sff-22' => t('Droid Serif, Georgia, Times, Times New Roman, Serif'),
      'sff-23' => t('PT Serif, Georgia, Times, Times New Roman, Serif'),
      'sff-24' => t('Vollkorn, Georgia, Times, Times New Roman, Serif'),
      'sff-25' => t('Alegreya, Georgia, Times, Times New Roman, Serif'),
      'sff-26' => t('Noto Serif, Georgia, Times, Times New Roman, Serif'),
      'sff-27' => t('Crimson Text, Georgia, Times, Times New Roman, Serif'),
      'sff-28' => t('Gentium Book Basic, Georgia, Times, Times New Roman, Serif'),
      'sff-29' => t('Volkhov, Georgia, Times, Times New Roman, Serif'),
      'sff-30' => t('Times, Times New Roman, Serif'),
      'sff-31' => t('Alegreya SC, Georgia, Times, Times New Roman, Serif'),
    ),
  );
  
  $form['mtt_settings']['tabs']['font']['slogan_font_family'] = array(
    '#type' => 'select',
    '#title' => t('Slogan'),
    '#default_value' => theme_get_setting('slogan_font_family'),
    '#options' => array(
      'slff-1' => t('Merriweather, Georgia, Times, Serif'),
      'slff-2' => t('Source Sans Pro, Helvetica Neuee, Arial, Sans-serif'),
      'slff-3' => t('Ubuntu, Helvetica Neue, Arial, Sans-serif'),
      'slff-4' => t('PT Sans, Helvetica Neue, Arial, Sans-serif'),
      'slff-5' => t('Roboto, Helvetica Neue, Arial, Sans-serif'),
      'slff-6' => t('Open Sans, Helvetica Neue, Arial, Sans-serif'),
      'slff-7' => t('Lato, Helvetica Neue, Arial, Sans-serif'),
      'slff-8' => t('Roboto Condensed, Arial Narrow, Arial, Sans-serif'),
      'slff-9' => t('Exo, Arial, Helvetica Neue, Sans-serif'),
      'slff-10' => t('Roboto Slab, Trebuchet MS, Sans-serif'),
      'slff-11' => t('Raleway, Helvetica Neue, Arial, Sans-serif'),
      'slff-12' => t('Josefin Sans, Georgia, Times, Serif'),
      'slff-13' => t('Georgia, Times, Serif'),
      'slff-14' => t('Playfair Display, Times, Serif'),
      'slff-15' => t('Philosopher, Georgia, Times, Serif'),
      'slff-16' => t('Cinzel, Georgia, Times, Serif'),               
      'slff-17' => t('Oswald, Helvetica Neue, Arial, Sans-serif'),    
      'slff-18' => t('Playfair Display SC, Georgia, Times, Serif'),
      'slff-19' => t('Cabin, Helvetica Neue, Arial, Sans-serif'),
      'slff-20' => t('Noto Sans, Arial, Helvetica Neue, Sans-serif;'),
      'slff-21' => t('Helvetica Neue, Arial, Sans-serif'),
      'slff-22' => t('Droid Serif, Georgia, Times, Times New Roman, Serif'),
      'slff-23' => t('PT Serif, Georgia, Times, Times New Roman, Serif'),
      'slff-24' => t('Vollkorn, Georgia, Times, Times New Roman, Serif'),
      'slff-25' => t('Alegreya, Georgia, Times, Times New Roman, Serif'),
      'slff-26' => t('Noto Serif, Georgia, Times, Times New Roman, Serif'),
      'slff-27' => t('Crimson Text, Georgia, Times, Times New Roman, Serif'),
      'slff-28' => t('Gentium Book Basic, Georgia, Times, Times New Roman, Serif'),
      'slff-29' => t('Volkhov, Georgia, Times, Times New Roman, Serif'),
      'slff-30' => t('Times, Times New Roman, Serif'),
      'slff-31' => t('Alegreya SC, Georgia, Times, Times New Roman, Serif'),      
    ),
  );
  
  $form['mtt_settings']['tabs']['font']['headings_font_family'] = array(
    '#type' => 'select',
    '#title' => t('Headings'),
    '#default_value' => theme_get_setting('headings_font_family'),
    '#options' => array(
      'hff-1' => t('Merriweather, Georgia, Times, Serif'),
      'hff-2' => t('Source Sans Pro, Helvetica Neuee, Arial, Sans-serif'),
      'hff-3' => t('Ubuntu, Helvetica Neue, Arial, Sans-serif'),
      'hff-4' => t('PT Sans, Helvetica Neue, Arial, Sans-serif'),
      'hff-5' => t('Roboto, Helvetica Neue, Arial, Sans-serif'),
      'hff-6' => t('Open Sans, Helvetica Neue, Arial, Sans-serif'),
      'hff-7' => t('Lato, Helvetica Neue, Arial, Sans-serif'),
      'hff-8' => t('Roboto Condensed, Arial Narrow, Arial, Sans-serif'),
      'hff-9' => t('Exo, Arial, Helvetica Neue, Sans-serif'),
      'hff-10' => t('Roboto Slab, Trebuchet MS, Sans-serif'),
      'hff-11' => t('Raleway, Helvetica Neue, Arial, Sans-serif'),
      'hff-12' => t('Josefin Sans, Georgia, Times, Serif'),
      'hff-13' => t('Georgia, Times, Serif'),
      'hff-14' => t('Playfair Display, Times, Serif'),
      'hff-15' => t('Philosopher, Georgia, Times, Serif'),
      'hff-16' => t('Cinzel, Georgia, Times, Serif'),               
      'hff-17' => t('Oswald, Helvetica Neue, Arial, Sans-serif'),    
      'hff-18' => t('Playfair Display SC, Georgia, Times, Serif'),
      'hff-19' => t('Cabin, Helvetica Neue, Arial, Sans-serif'),
      'hff-20' => t('Noto Sans, Arial, Helvetica Neue, Sans-serif;'),
      'hff-21' => t('Helvetica Neue, Arial, Sans-serif'),
      'hff-22' => t('Droid Serif, Georgia, Times, Times New Roman, Serif'),
      'hff-23' => t('PT Serif, Georgia, Times, Times New Roman, Serif'),
      'hff-24' => t('Vollkorn, Georgia, Times, Times New Roman, Serif'),
      'hff-25' => t('Alegreya, Georgia, Times, Times New Roman, Serif'),
      'hff-26' => t('Noto Serif, Georgia, Times, Times New Roman, Serif'),
      'hff-27' => t('Crimson Text, Georgia, Times, Times New Roman, Serif'),
      'hff-28' => t('Gentium Book Basic, Georgia, Times, Times New Roman, Serif'),
      'hff-29' => t('Volkhov, Georgia, Times, Times New Roman, Serif'),
      'hff-30' => t('Times, Times New Roman, Serif'),
      'hff-31' => t('Alegreya SC, Georgia, Times, Times New Roman, Serif'),         
    ),
  );
  
  $form['mtt_settings']['tabs']['font']['paragraph_font_family'] = array(
    '#type' => 'select',
    '#title' => t('Paragraph'),
    '#default_value' => theme_get_setting('paragraph_font_family'),
    '#options' => array(
      'pff-1' => t('Merriweather, Georgia, Times, Serif'),
      'pff-2' => t('Source Sans Pro, Helvetica Neuee, Arial, Sans-serif'),
      'pff-3' => t('Ubuntu, Helvetica Neue, Arial, Sans-serif'),
      'pff-4' => t('PT Sans, Helvetica Neue, Arial, Sans-serif'),
      'pff-5' => t('Roboto, Helvetica Neue, Arial, Sans-serif'),
      'pff-6' => t('Open Sans, Helvetica Neue, Arial, Sans-serif'),
      'pff-7' => t('Lato, Helvetica Neue, Arial, Sans-serif'),
      'pff-8' => t('Roboto Condensed, Arial Narrow, Arial, Sans-serif'),
      'pff-9' => t('Exo, Arial, Helvetica Neue, Sans-serif'),
      'pff-10' => t('Roboto Slab, Trebuchet MS, Sans-serif'),
      'pff-11' => t('Raleway, Helvetica Neue, Arial, Sans-serif'),
      'pff-12' => t('Josefin Sans, Georgia, Times, Serif'),
      'pff-13' => t('Georgia, Times, Serif'),
      'pff-14' => t('Playfair Display, Times, Serif'),
      'pff-15' => t('Philosopher, Georgia, Times, Serif'),
      'pff-16' => t('Cinzel, Georgia, Times, Serif'),
      'pff-17' => t('Oswald, Helvetica Neue, Arial, Sans-serif'),    
      'pff-18' => t('Playfair Display SC, Georgia, Times, Serif'),
      'pff-19' => t('Cabin, Helvetica Neue, Arial, Sans-serif'),
      'pff-20' => t('Noto Sans, Arial, Helvetica Neue, Sans-serif;'),
      'pff-21' => t('Helvetica Neue, Arial, Sans-serif'),
      'pff-22' => t('Droid Serif, Georgia, Times, Times New Roman, Serif'),
      'pff-23' => t('PT Serif, Georgia, Times, Times New Roman, Serif'),
      'pff-24' => t('Vollkorn, Georgia, Times, Times New Roman, Serif'),
      'pff-25' => t('Alegreya, Georgia, Times, Times New Roman, Serif'),
      'pff-26' => t('Noto Serif, Georgia, Times, Times New Roman, Serif'),
      'pff-27' => t('Crimson Text, Georgia, Times, Times New Roman, Serif'),
      'pff-28' => t('Gentium Book Basic, Georgia, Times, Times New Roman, Serif'),
      'pff-29' => t('Volkhov, Georgia, Times, Times New Roman, Serif'),
      'pff-30' => t('Times, Times New Roman, Serif'),
      'pff-31' => t('Alegreya SC, Georgia, Times, Times New Roman, Serif'),          
    ),
  );

 $form['mtt_settings']['tabs']['responsive_menu'] = array(
    '#type' => 'fieldset',
    '#title' => t('Responsive menu'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

 $form['mtt_settings']['tabs']['responsive_menu']['responsive_multiLevel_menu'] = array(
    '#type' => 'fieldset',
    '#title' => t('Responsive Multilevel Menu'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

 $form['mtt_settings']['tabs']['responsive_menu']['responsive_multiLevel_menu']['responsive_multilevelmenu_state'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable responsive menu'),
    '#description'   => t('Use the checkbox to enable the plugin which transforms the Main menu of your site to a responsive multilevel menu when your browser is at mobile widths (requires jQuery >= 1.7.0 ).'),
    '#default_value' => theme_get_setting('responsive_multilevelmenu_state'),
  );
    

 $form['mtt_settings']['tabs']['responsive_menu']['responsive_select_menu'] = array(
    '#type' => 'fieldset',
    '#title' => t('Responsive menu - Select list'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
 $form['mtt_settings']['tabs']['responsive_menu']['responsive_select_menu']['responsive_menu_state'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable responsive menu'),
    '#description'   => t('Use the checkbox to enable the plugin which transforms the Main menu of your site to a dropdown select list when your browser is at mobile widths.'),
    '#default_value' => theme_get_setting('responsive_menu_state'),
  );
  
 $form['mtt_settings']['tabs']['responsive_menu']['responsive_select_menu']['responsive_menu_switchwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Switch width (px)'),
    '#description'   => t('Set the width (in pixels) at which the Main menu of the site will change to a dropdown select list.'),
    '#default_value' => theme_get_setting('responsive_menu_switchwidth'),
  );
  
  $form['mtt_settings']['tabs']['responsive_menu']['responsive_select_menu']['responsive_menu_topoptiontext'] = array(
    '#type' => 'textfield',
    '#title' => t('Top option text'),
    '#description'   => t('Set the very first option display text.'),
    '#default_value' => theme_get_setting('responsive_menu_topoptiontext'),
  );
  
  $form['mtt_settings']['tabs']['responsive_menu']['responsive_select_menu']['responsive_menu_optgroups'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable responsive menu with optgroups'),
    '#description'   => t('Use the checkbox to enable a dropdown select list with optgroups support.'),
    '#default_value' => theme_get_setting('responsive_menu_optgroups'),
  );
  
  $form['mtt_settings']['tabs']['responsive_menu']['responsive_select_menu']['responsive_menu_nested'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable nested responsive menu'),
    '#description'   => t('Use the checkbox to enable the optgroups for the dropdown select list (acts only in dropdown select list with optgroups).'),
    '#default_value' => theme_get_setting('responsive_menu_nested'),
  );

  $form['mtt_settings']['tabs']['parallax'] = array(
    '#type' => 'fieldset',
    '#title' => t('Parallax region'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['mtt_settings']['tabs']['parallax']['parallax_state'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable parallax background effect'),
    '#default_value' => theme_get_setting('parallax_state'),
  );

  $form['mtt_settings']['tabs']['parallax']['parallax_opacity'] = array(
    '#type' => 'textfield',
    '#title' => t('Parallax Background Opacity'),
    '#description'   => t('Set the % opacity for the background of the parallax region.'),
    '#default_value' => theme_get_setting('parallax_opacity'),
  );

  $form['mtt_settings']['tabs']['google_map'] = array(
    '#type' => 'fieldset',
    '#title' => t('Google Map'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['mtt_settings']['tabs']['google_map']['google_map_js'] = array(
    '#type' => 'checkbox',
    '#title' => t('Include Google Map javascript code'),
    '#default_value' => theme_get_setting('google_map_js','startupgrowth_lite'),
  );

  $form['mtt_settings']['tabs']['google_map']['google_map_latitude'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Map Latitude'),
    '#description'   => t('For example 40.726576'),
    '#default_value' => theme_get_setting('google_map_latitude','startupgrowth_lite'),
    '#size' => 5,
    '#maxlength' => 10,
  );  

  $form['mtt_settings']['tabs']['google_map']['google_map_longitude'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Map Longitude'),
    '#description'   => t('For example -74.046822'),
    '#default_value' => theme_get_setting('google_map_longitude','startupgrowth_lite'),
    '#size' => 5,
    '#maxlength' => 10,
  ); 
  
  $form['mtt_settings']['tabs']['google_map']['google_map_zoom'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Map Zoom'),
    '#description'   => t('For example 13'),
    '#default_value' => theme_get_setting('google_map_zoom','startupgrowth_lite'),
    '#size' => 5,
    '#maxlength' => 10,
  ); 
  
  $form['mtt_settings']['tabs']['google_map']['google_map_canvas'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Map Canvas Id'),
    '#description'   => t('Set the Google Map Canvas Id. For example: map-canvas'),
    '#default_value' => theme_get_setting('google_map_canvas','startupgrowth_lite'),
  ); 
    
  $form['mtt_settings']['tabs']['credits'] = array(
    '#type' => 'fieldset',
    '#title' => t('Credits'),
    '#collapsible' => TRUE,
	'#collapsed' => FALSE,
  );
  
  $form['mtt_settings']['tabs']['credits']['credits_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show credits'),
  	'#description'   => t('Use the checkbox to enable or disable credits.'),
	'#default_value' => theme_get_setting('credits_display'),
  );
  
}