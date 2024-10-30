<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://mesamesa.com
 * @since      1.0.0
 *
 * @package    Mesa_Mesa_Reservation_Widget
 * @subpackage Mesa_Mesa_Reservation_Widget/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Mesa_Mesa_Reservation_Widget
 * @subpackage Mesa_Mesa_Reservation_Widget/includes
 * @author     Mesa Mesa <laura.speck@guestserve.com>
 */
class Mesa_Mesa_Reservation_Widget_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'mesa-mesa-reservation-widget',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
