<?php
/**
 * Admin functiontionality and settings.
 *
 * @package    Controlled_Chaos_Addon
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CC_Addon\Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Bail if not in the admin.
if ( ! is_admin() ) {
	return;
}

/**
 * Admin functiontionality and settings.
 *
 * @since  1.0.0
 * @access public
 */
class Admin {

	/**
	 * Get an instance of the plugin class.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Varialbe for the instance to be used outside the class.
		static $instance = null;

		if ( is_null( $instance ) ) {

			// Set variable for new instance.
			$instance = new self;

			// Require the class files.
			$instance->dependencies();

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		/**
		 * Add an about page for the plugin if not hidden in settings.
		 *
		 * @since  1.0.0
		 */

		// Get the option to hide the settings page in the menu.
		$menu_settings = get_option( 'cca_hide_addon_settings' );

		// If the option is empty (unchecked).
		if ( ! $menu_settings ) {
			add_action( 'admin_menu', [ $this, 'settings_page' ] );
		}

		// Enqueue backend styles. Uncomment to use.
		// add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_styles' ] );

		// Enqueue backend scripts. Uncomment to use.
		// add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

	}

	/**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// The core settings class for the plugin.
		require_once plugin_dir_path( __FILE__ ) . 'class-settings.php';

	}

	/**
     * Add a settings page for the plugin.
     *
     * Uses the universal slug partial for admin pages. Set this
     * slug in the core plugin file.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function settings_page() {

		add_options_page(
			CCA_CHILD_NAME,
			CCA_CHILD_NAME,
			'manage_options',
			CCA_ADMIN_SLUG . '-settings',
			[ $this, 'settings_page_output' ]
		);

	}

	/**
     * Get output of the settings page for the plugin.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function settings_page_output() {

        require plugin_dir_path( __FILE__ ) . 'partials/plugin-settings_page.php';

	}

	/**
	 * Enqueue the stylesheets for the back end of the site.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_styles() {

		// Frontend plugin styles.
		wp_enqueue_style( 'controlled-chaos-addon', plugin_dir_url( __FILE__ ) . 'assets/css/admin.css', [], CCA_VERSION, 'all' );

	}

	/**
	 * Enqueue the scripts for the back end of the site.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_scripts() {

		// Frontend plugin script.
		wp_enqueue_script( 'controlled-chaos-addon', plugin_dir_url( __FILE__ ) . 'assets/js/admin.js', [ 'jquery' ], CCA_VERSION, true );

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function cca_admin() {

	return Admin::instance();

}

// Run an instance of the class.
cca_admin();