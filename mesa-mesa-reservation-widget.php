<?php

/**
 * @link              https://mesamesa.com
 * @since             1.0.0
 * @package           Mesa_Mesa_Reservation_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Mesa Mesa Reservation Widget
 * Plugin URI:        https://mesamesa.com
 * Description:       Reservation widget for Mesa Mesa restaurant software
 * Version:           1.0.0
 * Author:            Mesa Mesa <laura.speck@guestserve.com>
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mesa-mesa-reservation-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MESA_MESA_RESERVATION_WIDGET_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mesa-mesa-reservation-widget-activator.php
 */
function activate_mesa_mesa_reservation_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mesa-mesa-reservation-widget-activator.php';
	Mesa_Mesa_Reservation_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mesa-mesa-reservation-widget-deactivator.php
 */
function deactivate_mesa_mesa_reservation_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mesa-mesa-reservation-widget-deactivator.php';
	Mesa_Mesa_Reservation_Widget_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mesa_mesa_reservation_widget' );
register_deactivation_hook( __FILE__, 'deactivate_mesa_mesa_reservation_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mesa-mesa-reservation-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mesa_mesa_reservation_widget() {

	$plugin = new Mesa_Mesa_Reservation_Widget();
	$plugin->run();

}
run_mesa_mesa_reservation_widget();
