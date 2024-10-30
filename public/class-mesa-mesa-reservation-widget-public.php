<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://mesamesa.com
 * @since      1.0.0
 *
 * @package    Mesa_Mesa_Reservation_Widget
 * @subpackage Mesa_Mesa_Reservation_Widget/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mesa_Mesa_Reservation_Widget
 * @subpackage Mesa_Mesa_Reservation_Widget/public
 * @author     Mesa Mesa <laura.speck@guestserve.com>
 */
class Mesa_Mesa_Reservation_Widget_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		function print_mesa_mesa_widget( $atts ) {
			$widget_vars = shortcode_atts( array(
				'view' => '1',
				'colour' => '0',
			), $atts );

                        // Read in existing option value from database
                        $optname = 'mesa_mesa_guestserveid';
                        $optval = get_option( $optname );

			$script_params = array(
				'gsid' => $optval,
				'view' => $widget_vars['view'],
				'colour' => $widget_vars['colour'] 
			);
			wp_localize_script( 'mesa-mesa-reservation-widget', 'php_vars', $script_params );

			//var gsID = php_vars.gsid;
			//var widgetView = php_vars.view;
			//var lightDark = php_vars.colour;

			$widget = "<script> gsId = " . $optval . "; widgetView = " . $widget_vars['view'] . "; lightDark = " . $widget_vars['colour'] . "; </script><div id=\"gswidget\" class=\"gswidget\"></div>";
			return $widget;
		}

		add_shortcode( 'mesa_mesa_widget', 'print_mesa_mesa_widget' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mesa_Mesa_Reservation_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mesa_Mesa_Reservation_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'mesa-mesa-reservation-widget','https://widget.guestserve.com/r/v1.1/js/gs.js','' ,'1.0.0', false );

	}

}
