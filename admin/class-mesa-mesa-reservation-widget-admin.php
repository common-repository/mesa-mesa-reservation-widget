<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://mesamesa.com
 * @since      1.0.0
 *
 * @package    Mesa_Mesa_Reservation_Widget
 * @subpackage Mesa_Mesa_Reservation_Widget/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mesa_Mesa_Reservation_Widget
 * @subpackage Mesa_Mesa_Reservation_Widget/admin
 * @author     Mesa Mesa <laura.speck@guestserve.com>
 */
class Mesa_Mesa_Reservation_Widget_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'admin_menu', 'mesa_mesa_menu' );

		function mesa_mesa_menu() {
			add_options_page( 'Mesa Mesa Reservation Widget Settings', 'Mesa Mesa Widget', 'manage_options', 'mesa-mesa-reservation-widget', 'mesa_mesa_options' );
		}

		function mesa_mesa_options() {
			if ( !current_user_can( 'manage_options' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}

			// variables for the field and option names 
			$opt_name = 'mesa_mesa_guestserveid';
			$hidden_field_name = 'mm_submit_hidden';
			$data_field_name = 'mesa_mesa_guestserveid';

			// Read in existing option value from database
			$opt_val = get_option( $opt_name );

			// See if the user has posted us some information
			// If they did, this hidden field will be set to 'Y'
			if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
				// Read their posted value
				$opt_val = $_POST[ $data_field_name ];

				// Save the posted value in the database
				update_option( $opt_name, $opt_val );

				// Put a "settings saved" message on the screen
?>
<div class="updated"><p><strong><?php _e('Settings saved.', 'mesa-mesa-reservation-widget' ); ?></strong></p></div>
<?php

			}

			// Now display the settings editing screen
			echo '<div class="wrap">';

			// header
			echo "<h2>" . __( 'Mesa Mesa Reservation Plugin Settings', 'mesa-mesa-reservation-widget' ) . "</h2>";

			// settings form
?>
	<form method="post" action="">
		<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

		<p><?php _e("Guestserve ID:", 'mesa-mesa-reservation-widget' ); ?> 
		<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="20">
		</p>

		<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
		</p>

	</form>

	<h2>Usage</h2>

	<ol>
		<li>Set your Guestserve ID in the settings page.</li>
		<li>Place <code>[mesa_mesa_widget]</code> in your templates.</li>
		<li>Further customizations:
			<ul style="margin-left: 20px; list-style-type: circle !important;">
				<li>Use the 'view' attribute to change the widget layout. Possible values are 1, 2, and 3 (1 is default.) <code>[mesa_mesa_widget view="2"]</code></li>
				<li>Use the 'colour' attribute to change the colour scheme. Default is black text on white background, set to 1 for dark (white text on black). <code>[mesa_mesa_widget colour="1"]</code></li>
			</ul>
		</li>
	</ol>

</div>














<?php
 
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mesa-mesa-reservation-widget-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mesa-mesa-reservation-widget-admin.js', array( 'jquery' ), $this->version, false );

	}

}
