<?php
/**
 * The core settings class for the plugin.
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
 * Admin functiontionality and settings.
 *
 * @since  1.0.0
 * @access public
 */
class Settings {

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
	 * @return void Constructor method is empty.
	 */
	public function __construct() {

		// Add tab to site settings page.
		add_filter( CCA_PARENT_PREFIX . '_tabs_site_settings', [ $this, 'site_settings_tab' ], 11 );

		// Do the settings section for the new tab.
		add_filter( CCA_PARENT_PREFIX . '_section_site_settings', [ $this, 'site_settings_section' ], 11 );

		// Do the settings fields for the new tab.
		add_filter( CCA_PARENT_PREFIX . '_fields_site_settings', [ $this, 'site_settings_fields' ], 11 );

		// Addon tab save button text.
		add_filter( CCA_PARENT_PREFIX . '_save_site_settings', [ $this, 'site_settings_save' ], 11 );

	}

	/**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		/**
		 * Settings fields.
		 *
		 * @since  1.0.0
		 */

		// Settings fields for site customization.
		require_once plugin_dir_path( __FILE__ ) . 'class-settings-fields-site.php';

	}

	/**
	 * Add a demo tab to the Site Settings page of the parent plugin.
	 *
	 * @since  1.0.0
	 * @param  array $tabs
	 * @return array
	 */
	public function site_settings_tab( $tabs ) {

		// Get the active tab.
		if ( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		} else {
			$active_tab = 'dashboard';
		}

		// Add the tab as an array to be merged.
		$addons_tab = [
			sprintf(
				'<a href="?page=%1s-settings&tab=addons" class="nav-tab %2s"><span class="dashicons dashicons-plus"></span> %3s</a>',
				CCP_ADMIN_SLUG,
				$active_tab == 'addons' ? 'nav-tab-active' : '',
				esc_html__( 'Addons', 'controlled-chaos-addon' )
			)
		];

		// Merge the new tab array with the parent plugin's tab array.
		return array_merge( $tabs, $addons_tab );

	}

	/**
	 * Settings section for the new settings tab.
	 *
	 * @since  1.0.0
	 * @param  string $section
	 * @return string Returns the name of the settings section.
	 */
	public function site_settings_section( $section ) {

		// Get the active tab.
		if ( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		} else {
			$active_tab = 'dashboard';
		}

		// Return new settings section if on the new tab.
		if ( 'addons' == $active_tab ) {
			$section = 'cca-site-addons';
			return $section;
		}

		// Otherwise return the parent settings sections.
		return $section;

	}

	/**
	 * Settings fields for the new settings tab.
	 *
	 * @since  1.0.0
	 * @param  string $fields
	 * @return string Returns the name of the settings section.
	 */
	public function site_settings_fields( $fields ) {

		// Get the active tab.
		if ( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		} else {
			$active_tab = 'dashboard';
		}

		// Return new settings section if on the new tab.
		if ( 'addons' == $active_tab ) {
			$fields = 'cca-site-addons';
			return $fields;
		}

		// Otherwise return the parent settings sections.
		return $fields;

	}

	/**
	 * Save button text for the new settings tab.
	 *
	 * @since  1.0.0
	 * @param  string $save
	 * @return string Returns the button text.
	 */
	public function site_settings_save( $save ) {

		// Get the active tab.
		if ( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		} else {
			$active_tab = 'dashboard';
		}

		// Return new button text if on the new tab.
		if ( 'addons' == $active_tab ) {
			$save = __( 'Save Addons', 'controlled-chaos-addon' );
			return $save;
		}

		// Otherwise return the parent button text.
		return $save;

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function cca_settings() {

	return Settings::instance();

}

// Run an instance of the class.
cca_settings();