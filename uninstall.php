<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package    Controlled_Chaos_Addon
 * @subpackage Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Uninstall avatars.
 *
 * During uninstallation, remove the custom field from the users
 * and delete the local avatars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function cca_user_avatars_uninstall() {

	$cca_user_avatars = new cca_user_avatars;
	$users            = get_users_of_blog();

	foreach ( $users as $user ) {
		$cca_user_avatars->avatar_delete( $user->user_id );
	}

	delete_option( 'cca_user_avatars_caps' );

}
register_uninstall_hook( __FILE__, 'cca_user_avatars_uninstall' );