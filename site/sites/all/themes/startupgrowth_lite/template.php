<?php

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function startupgrowth_lite_breadcrumb($variables){

	$breadcrumb = $variables['breadcrumb'];
	
	if (!empty($breadcrumb)) {
	$breadcrumb[] = drupal_get_title();
	return '<div>' . implode(' <span class="breadcrumb-separator"></span>', $breadcrumb) . '</div>';
	}
	
}

/**
 * Add classes to block.
 */
function startupgrowth_lite_preprocess_block(&$variables) {

	$variables['title_attributes_array']['class'][] = 'title';
	$variables['classes_array'][]='clearfix';
	
}

/**
 * Override or insert variables into the html template.
 */
function startupgrowth_lite_preprocess_html(&$variables) {

	if (empty($variables['page']['banner'])) {
		$variables['classes_array'][] = 'no-banner';
	}
	
	$color_scheme = theme_get_setting('color_scheme');
	
	if ($color_scheme != 'default') {
		drupal_add_css(path_to_theme() . '/style-' .$color_scheme. '.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-1'  &&
		theme_get_setting('slogan_font_family')=='slff-1' ||
		theme_get_setting('headings_font_family')=='hff-1' ||
		theme_get_setting('paragraph_font_family')=='pff-1') {
		drupal_add_css(path_to_theme() . '/fonts/merriweather-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-2'  ||
		theme_get_setting('slogan_font_family')=='slff-2' ||
		theme_get_setting('headings_font_family')=='hff-2' ||
		theme_get_setting('paragraph_font_family')=='pff-2') {
		drupal_add_css(path_to_theme() . '/fonts/sourcesanspro-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-3'  ||
		theme_get_setting('slogan_font_family')=='slff-3' ||
		theme_get_setting('headings_font_family')=='hff-3' ||
		theme_get_setting('paragraph_font_family')=='pff-3') {
		drupal_add_css(path_to_theme() . '/fonts/ubuntu-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-4'  ||
		theme_get_setting('slogan_font_family')=='slff-4' ||
		theme_get_setting('headings_font_family')=='hff-4' ||
		theme_get_setting('paragraph_font_family')=='pff-4') {
		drupal_add_css(path_to_theme() . '/fonts/ptsans-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-5'  ||
		theme_get_setting('slogan_font_family')=='slff-5' ||
		theme_get_setting('headings_font_family')=='hff-5' ||
		theme_get_setting('paragraph_font_family')=='pff-5') {
		drupal_add_css(path_to_theme() . '/fonts/roboto-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-6'  ||
		theme_get_setting('slogan_font_family')=='slff-6' ||
		theme_get_setting('headings_font_family')=='hff-6' ||
		theme_get_setting('paragraph_font_family')=='pff-6') {
		drupal_add_css(path_to_theme() . '/fonts/opensans-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-7'  ||
		theme_get_setting('slogan_font_family')=='slff-7' ||
		theme_get_setting('headings_font_family')=='hff-7' ||
		theme_get_setting('paragraph_font_family')=='pff-7') {
		drupal_add_css(path_to_theme() . '/fonts/lato-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-8'  ||
		theme_get_setting('slogan_font_family')=='slff-8' ||
		theme_get_setting('headings_font_family')=='hff-8' ||
		theme_get_setting('paragraph_font_family')=='pff-8') {
		drupal_add_css(path_to_theme() . '/fonts/roboto-condensed-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-9'  ||
		theme_get_setting('slogan_font_family')=='slff-9' ||
		theme_get_setting('headings_font_family')=='hff-9' ||
		theme_get_setting('paragraph_font_family')=='pff-9') {
		drupal_add_css(path_to_theme() . '/fonts/exo-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-10'  ||
		theme_get_setting('slogan_font_family')=='slff-10' ||
		theme_get_setting('headings_font_family')=='hff-10' ||
		theme_get_setting('paragraph_font_family')=='pff-10') {
		drupal_add_css(path_to_theme() . '/fonts/roboto-slab-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-11'  ||
		theme_get_setting('slogan_font_family')=='slff-11' ||
		theme_get_setting('headings_font_family')=='hff-11' ||
		theme_get_setting('paragraph_font_family')=='pff-11') {
		drupal_add_css(path_to_theme() . '/fonts/raleway-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-12'  ||
		theme_get_setting('slogan_font_family')=='slff-12' ||
		theme_get_setting('headings_font_family')=='hff-12' ||
		theme_get_setting('paragraph_font_family')=='pff-12') {
		drupal_add_css(path_to_theme() . '/fonts/josefin-sans-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-14'  ||
		theme_get_setting('slogan_font_family')=='slff-14' ||
		theme_get_setting('headings_font_family')=='hff-14' ||
		theme_get_setting('paragraph_font_family')=='pff-14') {
		drupal_add_css(path_to_theme() . '/fonts/playfair-display-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-15'  ||
		theme_get_setting('slogan_font_family')=='slff-15' ||
		theme_get_setting('headings_font_family')=='hff-15' ||
		theme_get_setting('paragraph_font_family')=='pff-15') {
		drupal_add_css(path_to_theme() . '/fonts/philosopher-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-16'  ||
		theme_get_setting('slogan_font_family')=='slff-16' ||
		theme_get_setting('headings_font_family')=='hff-16' ||
		theme_get_setting('paragraph_font_family')=='pff-16') {
		drupal_add_css(path_to_theme() . '/fonts/cinzel-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-17'  ||
		theme_get_setting('slogan_font_family')=='slff-17' ||
		theme_get_setting('headings_font_family')=='hff-17' ||
		theme_get_setting('paragraph_font_family')=='pff-17') {
		drupal_add_css(path_to_theme() . '/fonts/oswald-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-18'  ||
		theme_get_setting('slogan_font_family')=='slff-18' ||
		theme_get_setting('headings_font_family')=='hff-18' ||
		theme_get_setting('paragraph_font_family')=='pff-18') {
		drupal_add_css(path_to_theme() . '/fonts/playfairdisplaysc-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
    
	if (theme_get_setting('sitename_font_family')=='sff-19'  ||
		theme_get_setting('slogan_font_family')=='slff-19' ||
		theme_get_setting('headings_font_family')=='hff-19' ||
		theme_get_setting('paragraph_font_family')=='pff-19') {
		drupal_add_css(path_to_theme() . '/fonts/cabin-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}
	
	if (theme_get_setting('sitename_font_family')=='sff-20'  ||
		theme_get_setting('slogan_font_family')=='slff-20' ||
		theme_get_setting('headings_font_family')=='hff-20' ||
		theme_get_setting('paragraph_font_family')=='pff-20') {
		drupal_add_css(path_to_theme() . '/fonts/notosans-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-22'  ||
		theme_get_setting('slogan_font_family')=='slff-22' ||
		theme_get_setting('headings_font_family')=='hff-22' ||
		theme_get_setting('paragraph_font_family')=='pff-22') {
		drupal_add_css(path_to_theme() . '/fonts/droidserif-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-23'  ||
		theme_get_setting('slogan_font_family')=='slff-23' ||
		theme_get_setting('headings_font_family')=='hff-23' ||
		theme_get_setting('paragraph_font_family')=='pff-23') {
		drupal_add_css(path_to_theme() . '/fonts/ptserif-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-24'  ||
		theme_get_setting('slogan_font_family')=='slff-24' ||
		theme_get_setting('headings_font_family')=='hff-24' ||
		theme_get_setting('paragraph_font_family')=='pff-24') {
		drupal_add_css(path_to_theme() . '/fonts/vollkorn-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-25'  ||
		theme_get_setting('slogan_font_family')=='slff-25' ||
		theme_get_setting('headings_font_family')=='hff-25' ||
		theme_get_setting('paragraph_font_family')=='pff-25') {
		drupal_add_css(path_to_theme() . '/fonts/alegreya-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}	

	if (theme_get_setting('sitename_font_family')=='sff-26'  ||
		theme_get_setting('slogan_font_family')=='slff-26' ||
		theme_get_setting('headings_font_family')=='hff-26' ||
		theme_get_setting('paragraph_font_family')=='pff-26') {
		drupal_add_css(path_to_theme() . '/fonts/notoserif-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-27'  ||
		theme_get_setting('slogan_font_family')=='slff-27' ||
		theme_get_setting('headings_font_family')=='hff-27' ||
		theme_get_setting('paragraph_font_family')=='pff-27') {
		drupal_add_css(path_to_theme() . '/fonts/crimsontext-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-28'  ||
		theme_get_setting('slogan_font_family')=='slff-28' ||
		theme_get_setting('headings_font_family')=='hff-28' ||
		theme_get_setting('paragraph_font_family')=='pff-28') {
		drupal_add_css(path_to_theme() . '/fonts/gentiumbookbasic-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-29'  ||
		theme_get_setting('slogan_font_family')=='slff-29' ||
		theme_get_setting('headings_font_family')=='hff-29' ||
		theme_get_setting('paragraph_font_family')=='pff-29') {
		drupal_add_css(path_to_theme() . '/fonts/volkhov-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	if (theme_get_setting('sitename_font_family')=='sff-31'  ||
		theme_get_setting('slogan_font_family')=='slff-31' ||
		theme_get_setting('headings_font_family')=='hff-31' ||
		theme_get_setting('paragraph_font_family')=='pff-31') {
		drupal_add_css(path_to_theme() . '/fonts/alegreyasc-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	}

	drupal_add_css(path_to_theme() . '/fonts/sourcecodepro-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));
	
	drupal_add_css(path_to_theme() . '/fonts/ptserif-blockquote-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));

	drupal_add_css('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array('type' => 'external'));

	drupal_add_css(path_to_theme() . '/ie9.css', array('group' => CSS_THEME, 'browsers' => array('IE' => '(IE 9)&(!IEMobile)', '!IE' => FALSE), 'preprocess' => FALSE));
    
	/**
	 * Add local.css file for CSS overrides.
	 */
	drupal_add_css(path_to_theme() . '/local.css', array('group' => CSS_THEME, 'type' => 'file'));

	/**
	* Bootstrap CDN
	*/
    if (theme_get_setting('bootstrap_css_cdn')) {
        $cdn = '//maxcdn.bootstrapcdn.com/bootstrap/' . theme_get_setting('bootstrap_css_cdn')  . '/css/bootstrap.min.css';
        drupal_add_css($cdn, array('type' => 'external'));
    }
    
    if (theme_get_setting('bootstrap_js_cdn')) {
        $cdn = '//maxcdn.bootstrapcdn.com/bootstrap/' . theme_get_setting('bootstrap_js_cdn')  . '/js/bootstrap.min.js';
        drupal_add_js($cdn, array('type' => 'external'));
    }
	
	/**
	 * Add Javascript for enable/disable scrollTop action.
	 */
	if (theme_get_setting('scrolltop_display')) {
	
		drupal_add_js('jQuery(document).ready(function($) { 
		$(window).scroll(function() {
			if($(this).scrollTop() != 0) {
				$("#toTop").addClass("show");	
			} else {
				$("#toTop").removeClass("show");
			}
		});
		
		$("#toTop").click(function() {
			$("body,html").animate({scrollTop:0},800);
		});	
		
		});',
		array('type' => 'inline', 'scope' => 'header'));
	
	}
	//EOF:Javascript
	
	/**
	 * Add Javascript for responsive mobile menu
	 */
	if (theme_get_setting('responsive_menu_state')) {
	
		if (theme_get_setting('responsive_menu_optgroups')) {
			drupal_add_js(path_to_theme() .'/js/jquery.mobilemenu.js');
		} else {
			drupal_add_js(path_to_theme() .'/js/jquery.mobilemenu-no-optgroups.js');
		}
		
		$responsive_menu_nested = theme_get_setting('responsive_menu_nested');
		$responsive_menu_switchwidth = (int) theme_get_setting('responsive_menu_switchwidth');
        $responsive_menu_topoptiontext=theme_get_setting('responsive_menu_topoptiontext');
        drupal_add_js(array('startupgrowth_lite' => array('topoptiontext' => $responsive_menu_topoptiontext)), 'setting');
		$responsive_menu_nested = theme_get_setting('responsive_menu_nested');
		
		drupal_add_js('jQuery(document).ready(function($) { 
		
		$("#main-navigation ul.main-menu, #main-navigation .content>ul.menu").mobileMenu({
			prependTo: "#main-navigation",
			combine: false,
			nested: '.$responsive_menu_nested.',
			switchWidth: '.$responsive_menu_switchwidth.',
            topOptionText: Drupal.settings.startupgrowth_lite[\'topoptiontext\']
		});
		
		});',
		array('type' => 'inline', 'scope' => 'header'));
	
	}
	//EOF:Javascript

	/**
	 * Add Javascript for Google Map
	 */
	if (theme_get_setting('google_map_js')) {

		drupal_add_js('jQuery(document).ready(function($) { 

	    var map;
	    var myLatlng;
	    var myZoom;
	    var marker;
		
		});',
		array('type' => 'inline', 'scope' => 'header')
		);
	    
		drupal_add_js('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false',array('type' => 'external', 'scope' => 'header', 'group' => 'JS_THEME'));

		$google_map_latitude = theme_get_setting('google_map_latitude');
        drupal_add_js(array('startupgrowth_lite' => array('google_map_latitude' => $google_map_latitude)), 'setting');
		$google_map_longitude = theme_get_setting('google_map_longitude');
        drupal_add_js(array('startupgrowth_lite' => array('google_map_longitude' => $google_map_longitude)), 'setting');
		$google_map_zoom = (int) theme_get_setting('google_map_zoom');
		$google_map_canvas = theme_get_setting('google_map_canvas');
        drupal_add_js(array('startupgrowth_lite' => array('google_map_canvas' => $google_map_canvas)), 'setting');
		
		drupal_add_js('jQuery(document).ready(function($) { 

		if ($("#'.$google_map_canvas.'").length) {
		
			myLatlng = new google.maps.LatLng(Drupal.settings.startupgrowth[\'google_map_latitude\'], Drupal.settings.startupgrowth[\'google_map_longitude\']);
			myZoom = '.$google_map_zoom.';
			
			function initialize() {
			
				var mapOptions = {
				zoom: myZoom,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				center: myLatlng,
				scrollwheel: false
				};
				
				map = new google.maps.Map(document.getElementById(Drupal.settings.startupgrowth[\'google_map_canvas\']),mapOptions);
				
                marker = new google.maps.Marker({
                map:map,
                draggable:true,
                position: myLatlng,
                url: "https://www.google.com/maps/dir//'.$google_map_latitude.','.$google_map_longitude.'/@'.$google_map_latitude.','.$google_map_longitude.'"
                });

                google.maps.event.addListener(marker, "click", function() {     
                window.open(this.url, "_blank");
                });

                google.maps.event.addDomListener(window, "resize", function() {
                map.setCenter(myLatlng);
                });
		
			}
		
			google.maps.event.addDomListener(window, "load", initialize);
			
		}
		
		});',
		array('type' => 'inline', 'scope' => 'header')
		);
		
	}

	$fixed_header = theme_get_setting('fixed_header');
	if ($fixed_header) {

		/**
		 * Add Javascript
		 */
		drupal_add_js('jQuery(document).ready(function($) { 

			var	headerHeight = $("#header").height();
			$(window).scroll(function() {
			if(($(this).scrollTop() > headerHeight) && ($(window).width() > 767)) {
				$("body").addClass("onscroll");	
				$("body").css("paddingTop", (headerHeight)+"px");
				if( $(this).scrollTop() > headerHeight+40 ) {
				$("body").addClass("show");	
				}
			} else {
				$("body").removeClass("onscroll");
				$("body").removeClass("show");
				$("body").css("paddingTop", (0)+"px");
				$("body.logged-in").css("paddingTop", (64)+"px");
			}
			});
		});',
		array('type' => 'inline', 'scope' => 'header'));
		//EOF:Javascript
		
	}

	$responsive_meanmenu = theme_get_setting('responsive_multilevelmenu_state');

	if ($responsive_meanmenu) {

	drupal_add_css(path_to_theme() . '/js/meanmenu/meanmenu.css');
	drupal_add_js(path_to_theme() .'/js/meanmenu/jquery.meanmenu.min.js', array('preprocess' => false));
	
		/**
		 * Add Javascript
		 */
		drupal_add_js('jQuery(document).ready(function($) {

			$("#main-navigation .sf-menu, #main-navigation .content>ul.menu, #main-navigation ul.main-menu").wrap("<div class=\'meanmenu-wrapper\'></div>");
			$("#main-navigation .meanmenu-wrapper").meanmenu({
				meanScreenWidth: "767",
				meanRemoveAttrs: true,
				meanMenuContainer: "#header-inside",
				meanMenuClose: ""
			});

		});',
		array('type' => 'inline', 'scope' => 'header'));
		//EOF:Javascript	

	} 
		
	$parallax_state = theme_get_setting('parallax_state');

	if ($parallax_state) {
		$variables['classes_array'][] = 'parallax-active';
		$parallax_opacity = (int) theme_get_setting('parallax_opacity')/100;

		/**
		 * Add Javascript
		 */
		drupal_add_js('jQuery(document).ready(function($) {

			$(window).load(function() {
				$("#highlighted-bottom-transparent-bg").css("backgroundColor", "rgba(255,255,255,'.$parallax_opacity.')");
			});

		});',
		array('type' => 'inline', 'scope' => 'header'));
		//EOF:Javascript

	}

}

/**
 * Override or insert variables into the html template.
 */
function startupgrowth_lite_process_html(&$vars) {

	$classes = explode(' ', $vars['classes']);
	$classes[] = theme_get_setting('sitename_font_family');
	$classes[] = theme_get_setting('slogan_font_family');
	$classes[] = theme_get_setting('headings_font_family');
	$classes[] = theme_get_setting('paragraph_font_family');
	$classes[] = theme_get_setting('form_style');
    $classes[] = theme_get_setting('layout_mode');
	$vars['classes'] = trim(implode(' ', $classes));

}

/**
 * Preprocess variables for page template.
 */
function startupgrowth_lite_preprocess_page(&$variables) {

	/**
	 * Insert variables into the page template.
	 */
	if (isset($variables['node']) && $variables['node']->type != 'page' ) { 
		if($variables['page']['sidebar_first'] && $variables['page']['sidebar_second']) { 
			$variables['main_grid_class'] = 'col-md-6';
			$variables['sidebar_grid_class'] = 'col-md-3';
		} elseif ($variables['page']['sidebar_first'] && !$variables['page']['sidebar_second']) {
			$variables['main_grid_class'] = 'col-md-8';
			$variables['sidebar_grid_class'] = 'col-md-4 fix-sidebar-first';
		} elseif (!$variables['page']['sidebar_first'] && $variables['page']['sidebar_second']) {
			$variables['main_grid_class'] = 'col-md-8';
			$variables['sidebar_grid_class'] = 'col-md-4 fix-sidebar-second';		
		} else {
			$variables['main_grid_class'] = 'col-md-8 col-md-offset-2';
			$variables['sidebar_grid_class'] = '';			
		}

	} else {
		if($variables['page']['sidebar_first'] && $variables['page']['sidebar_second']) { 
			$variables['main_grid_class'] = 'col-md-6';
			$variables['sidebar_grid_class'] = 'col-md-3';
		} elseif ($variables['page']['sidebar_first'] && !$variables['page']['sidebar_second']) {
			$variables['main_grid_class'] = 'col-md-8';
			$variables['sidebar_grid_class'] = 'col-md-4 fix-sidebar-first';
		} elseif (!$variables['page']['sidebar_first'] && $variables['page']['sidebar_second']) {
			$variables['main_grid_class'] = 'col-md-8';
			$variables['sidebar_grid_class'] = 'col-md-4 fix-sidebar-second';		
		} else {
			$variables['main_grid_class'] = 'col-md-12';
			$variables['sidebar_grid_class'] = '';			
		}
	}


	if($variables['page']['highlighted_bottom_right'] && $variables['page']['highlighted_bottom_left']) { 
		$variables['highlighted_bottom_left_grid_class'] = 'col-md-8';
		$variables['highlighted_bottom_right_grid_class'] = 'col-md-4';
	} elseif ($variables['page']['highlighted_bottom_right'] || $variables['page']['highlighted_bottom_left']) {
		$variables['highlighted_bottom_right_grid_class'] = 'col-md-12';
		$variables['highlighted_bottom_left_grid_class'] = 'col-md-12';		
	}

}

/**
* Implements hook_preprocess_maintenance_page().
*/
function startupgrowth_lite_preprocess_maintenance_page(&$variables) {

	$color_scheme = theme_get_setting('color_scheme');
	if ($color_scheme != 'default') {
		drupal_add_css(path_to_theme() . '/style-' .$color_scheme. '.css', array('group' => CSS_THEME, 'type' => 'file'));
	}

	drupal_add_css(path_to_theme() . '/fonts/lato-font.css', array('group' => CSS_THEME, 'type' => 'file' , 'preprocess' => FALSE));	

}

function startupgrowth_lite_page_alter($page) {

	$mobileoptimized = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'MobileOptimized',
		'content' =>  'width'
		)
	);
	$handheldfriendly = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'HandheldFriendly',
		'content' =>  'true'
		)
	);
	$viewport = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'viewport',
		'content' =>  'width=device-width, initial-scale=1'
		)
	);
	drupal_add_html_head($mobileoptimized, 'MobileOptimized');
	drupal_add_html_head($handheldfriendly, 'HandheldFriendly');
	drupal_add_html_head($viewport, 'viewport');
	
}

function startupgrowth_lite_form_alter(&$form, &$form_state, $form_id) {
	
	if ($form_id == 'search_block_form') {
	unset($form['search_block_form']['#title']);
	$form['search_block_form']['#title_display'] = 'invisible';
	$form_default = t('Enter terms then hit Search...');
	$form['search_block_form']['#default_value'] = $form_default;

	$form['actions']['submit']['#attributes']['value'][] = '';

	$form['search_block_form']['#attributes'] = array('onblur' => "if (this.value == '') {this.value = '{$form_default}';}", 'onfocus' => "if (this.value == '{$form_default}') {this.value = '';}" );
	}  

}

?>