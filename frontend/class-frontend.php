<?php
/**
 * The frontend functionality of the plugin.
 *
 * @package    Controlled_Chaos_Addon
 * @subpackage Frontend
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace CC_Addon\Frontend;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Bail if in the admin.
if ( is_admin() ) {
	return;
}

/**
 * The frontend functionality of the plugin.
 *
 * @since  1.0.0
 * @access public
 */
class Frontend {

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

			// Frontend dependencies.
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

		// Enqueue frontend styles. Uncomment to use.
		// add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );

		// Enqueue frontend scripts. Uncomment to use.
		// add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

	}

	/**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {}

	/**
	 * Enqueue the stylesheets for the front end of the site.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_styles() {

		// Frontend plugin styles.
		wp_enqueue_style( 'controlled-chaos-addon', plugin_dir_url( __FILE__ ) . 'assets/css/frontend.css', [], CCA_VERSION, 'all' );

	}

	/**
	 * Enqueue the scripts for the front end of the site.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_scripts() {

		// Frontend plugin script.
		wp_enqueue_script( 'controlled-chaos-addon', plugin_dir_url( __FILE__ ) . 'assets/js/frontend.js', [ 'jquery' ], CCA_VERSION, true );

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function cca_frontend() {

	return Frontend::instance();

}

// Run an instance of the class.
cca_frontend();