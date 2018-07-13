<?php
/**
 * Register taxonomies.
 *
 * @package    Controlled_Chaos_Addon
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://codex.wordpress.org/Function_Reference/register_taxonomy
 */

namespace CC_Addon\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register taxonomies.
 *
 * @since  1.0.0
 * @access public
 */
final class Taxonomies_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register custom taxonomies.
		add_action( 'init', [ $this, 'register' ], 11 );

	}

    /**
     * Register custom taxonomies.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Addon Taxonomy: Sample taxonomy (Addon Taxonomy).
         *
         * Renaming:
         * Search case "Addon Taxonomy" and replace with your post type singular name.
         * Search case "Addon Taxonomies" and replace with your post type plural name.
         * Search case "cca_taxonomy" and replace with your taxonomy database name.
         * Search case "cca-taxonomies" and replace with your taxonomy permalink slug.
         */

        $labels = [
            'name'                       => __( 'Addon Taxonomies', 'controlled-chaos-addon' ),
            'singular_name'              => __( 'Addon Taxonomy', 'controlled-chaos-addon' ),
            'menu_name'                  => __( 'Addon Taxonomy', 'controlled-chaos-addon' ),
            'all_items'                  => __( 'All Addon Taxonomies', 'controlled-chaos-addon' ),
            'edit_item'                  => __( 'Edit Addon Taxonomy', 'controlled-chaos-addon' ),
            'view_item'                  => __( 'View Addon Taxonomy', 'controlled-chaos-addon' ),
            'update_item'                => __( 'Update Addon Taxonomy', 'controlled-chaos-addon' ),
            'add_new_item'               => __( 'Add New Addon Taxonomy', 'controlled-chaos-addon' ),
            'new_item_name'              => __( 'New Addon Taxonomy', 'controlled-chaos-addon' ),
            'parent_item'                => __( 'Parent Addon Taxonomy', 'controlled-chaos-addon' ),
            'parent_item_colon'          => __( 'Parent Addon Taxonomy', 'controlled-chaos-addon' ),
            'popular_items'              => __( 'Popular Addon Taxonomies', 'controlled-chaos-addon' ),
            'separate_items_with_commas' => __( 'Separate Addon Taxonomies with commas', 'controlled-chaos-addon' ),
            'add_or_remove_items'        => __( 'Add or Remove Addon Taxonomies', 'controlled-chaos-addon' ),
            'choose_from_most_used'      => __( 'Choose from the most used Addon Taxonomies', 'controlled-chaos-addon' ),
            'not_found'                  => __( 'No Addon Taxonomies Found', 'controlled-chaos-addon' ),
            'no_terms'                   => __( 'No Addon Taxonomies', 'controlled-chaos-addon' ),
            'items_list_navigation'      => __( 'Addon Taxonomies List Navigation', 'controlled-chaos-addon' ),
            'items_list'                 => __( 'Addon Taxonomies List', 'controlled-chaos-addon' )
        ];

        $args = [
            'label'              => __( 'Addon Taxonomies', 'controlled-chaos-addon' ),
            'labels'             => $labels,
            'public'             => true,
            'hierarchical'       => false,
            'label'              => 'Addon Taxonomies',
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => [
                'slug'         => 'cca-taxonomies',
                'with_front'   => true,
                'hierarchical' => false,
            ],
            'show_admin_column'  => true,
            'show_in_rest'       => true,
            'rest_base'          => 'cca-taxonomies',
            'show_in_quick_edit' => true
        ];

        register_taxonomy(
            'cca_taxonomy',
            [
                'cca_post_type'
            ],
            $args
        );

    }

}

// Run the class.
new Taxonomies_Register;