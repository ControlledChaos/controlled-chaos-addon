<?php
/**
 * Settings for site customization.
 *
 * Extends the parent plugin site settings.
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

/**
 * Settings for site customization.
 *
 * @since  1.0.0
 * @access public
 */
class Settings_Fields_Site {

	/**
	 * Holds the values to be used in the fields callbacks.
	 *
	 * @var array
	 */
	private $options;

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

		// Register settings sections and fields.
		add_action( 'admin_init', [ $this, 'settings' ], 11 );

	}

	/**
	 * Plugin site settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 *
	 * @link  https://codex.wordpress.org/Settings_API
	 */
	public function settings() {

		/**
		 * Admin menu settings.
		 *
		 * @since 1.0.0
		 */

		// Site Settings page position.
		add_settings_field(
			'cca_hide_addon_settings',
			__( 'Hide Addon Settings', 'controlled-chaos-addon' ),
			[ $this, 'cca_hide_addon_settings_callback' ],
			'ccp-site-admin-menu',
			'ccp-site-admin-menu',
			[ sprintf(
				'%1s %2s %3s',
				esc_html__( 'Hide the', 'controlled-chaos-addon' ),
				CCA_CHILD_NAME,
				esc_html__( 'link in the admin menu', 'controlled-chaos-addon' )
			) ]
		);

		register_setting(
			'ccp-site-admin-menu',
			'cca_hide_addon_settings'
		);

	}

	/**
	 * Site Settings page position.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args Extra arguments passed into the callback function.
	 * @return string
	 */
	public function cca_hide_addon_settings_callback( $args ) {

		$option = get_option( 'cca_hide_addon_settings' );

		$html = '<p><input type="checkbox" id="cca_hide_addon_settings" name="cca_hide_addon_settings" value="1" ' . checked( 1, $option, false ) . '/>';

		$html .= '<label for="cca_hide_addon_settings"> '  . $args[0] . '</label></p>';

		echo $html;

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function cca_settings_fields_site() {

	return Settings_Fields_Site::instance();

}

// Run an instance of the class.
cca_settings_fields_site();