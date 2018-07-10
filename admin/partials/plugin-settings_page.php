<?php
/**
 * Settings page output.
 *
 * @package    Controlled_Chaos_Addon
 * @subpackage Admin\Partials
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @todo       Add some some content, ideally demo fields.
 */

namespace CC_Addon\Admin\Partials;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} ?>
<!-- Default WordPress page wrapper -->
<div class="wrap">

	<!-- Page heading -->
	<?php echo sprintf(
		'<h1 class="wp-heading-inline">%1s</h1>',
		CCA_CHILD_NAME
	); ?>

	<!-- Page description -->
    <p class="description"><?php esc_html_e( 'A WordPress starter plugin for building child or addon plugins.', 'controlled-chaos-addon' ); ?></p>

</div>