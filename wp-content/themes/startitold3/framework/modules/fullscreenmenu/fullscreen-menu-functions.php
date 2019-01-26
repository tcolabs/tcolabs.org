<?php

if(!function_exists('qode_startit_register_full_screen_menu_nav')) {
    function qode_startit_register_full_screen_menu_nav() {
	    register_nav_menus(
		    array(
			    'popup-navigation' => esc_html__('Fullscreen Navigation', 'startit')
		    )
	    );
    }

	add_action('after_setup_theme', 'qode_startit_register_full_screen_menu_nav');
}

if ( !function_exists('qode_startit_register_full_screen_menu_sidebars') ) {

	function qode_startit_register_full_screen_menu_sidebars() {

		register_sidebar(array(
			'name' => 'Fullscreen Menu Top',
			'id' => 'fullscreen_menu_above',
			'description' => 'This widget area is rendered above fullscreen menu',
			'before_widget' => '<div class="%2$s qodef-fullscreen-menu-above-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => 'Fullscreen Menu Bottom',
			'id' => 'fullscreen_menu_below',
			'description' => 'This widget area is rendered below fullscreen menu',
			'before_widget' => '<div class="%2$s qodef-fullscreen-menu-below-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="qodef-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));

	}

	add_action('widgets_init', 'qode_startit_register_full_screen_menu_sidebars');

}

if(!function_exists('qode_startit_fullscreen_menu_body_class')) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function qode_startit_fullscreen_menu_body_class($classes) {

		if ( is_active_widget( false, false, 'qodef_full_screen_menu_opener' )  || qode_startit_get_meta_field_intersect('header_type', qode_startit_get_page_id()) == 'header-full-screen'  ) {

			$classes[] = 'qodef-' . qode_startit_options()->getOptionValue('fullscreen_menu_animation_style');

		}


		return $classes;
	}

	add_filter('body_class', 'qode_startit_fullscreen_menu_body_class');
}

if ( !function_exists('qode_startit_get_full_screen_menu') ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function qode_startit_get_full_screen_menu() {

		if ( is_active_widget( false, false, 'qodef_full_screen_menu_opener' )  || qode_startit_get_meta_field_intersect('header_type', qode_startit_get_page_id()) == 'header-full-screen' ) {

			$parameters = array(
				'fullscreen_menu_in_grid' => qode_startit_options()->getOptionValue('fullscreen_in_grid') === 'yes' ? true : false
			);
			qode_startit_get_module_template_part('templates/fullscreen-menu', 'fullscreenmenu', '', $parameters);
		}
	}
}

if ( !function_exists('qode_startit_get_full_screen_menu_navigation') ) {
	/**
	 * Loads fullscreen menu navigation HTML template
	 */
	function qode_startit_get_full_screen_menu_navigation() {

		qode_startit_get_module_template_part('templates/parts/navigation', 'fullscreenmenu');

	}

}