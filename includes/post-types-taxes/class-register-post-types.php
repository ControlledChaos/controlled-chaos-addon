<?php
/**
 * Register post types.
 *
 * @package    Controlled_Chaos_Addon
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 *
 * @link       https://codex.wordpress.org/Function_Reference/register_post_type
 */

namespace CC_Addon\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register post types.
 *
 * @since  1.0.0
 * @access public
 */
final class Post_Types_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register addon post types.
		add_action( 'init', [ $this, 'register' ], 11 );

	}

    /**
     * Register addon post types.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Post Type: Sample addon post (Addon Posts).
         *
         * Renaming:
         * Search case "Addon Post" and replace with your post type capitalized name.
         * Search case "addon post" and replace with your post type lowercase name.
         * Search case "cca_post_type" and replace with your post type database name.
         * Search case "addon-posts" and replace with your post type archive permalink slug.
         */

        $labels = [
            'name'                  => __( 'Addon Posts', 'controlled-chaos-addon' ),
            'singular_name'         => __( 'Addon Post', 'controlled-chaos-addon' ),
            'menu_name'             => __( 'Addon Posts', 'controlled-chaos-addon' ),
            'all_items'             => __( 'All Addon Posts', 'controlled-chaos-addon' ),
            'add_new'               => __( 'Add New', 'controlled-chaos-addon' ),
            'add_new_item'          => __( 'Add New Addon Post', 'controlled-chaos-addon' ),
            'edit_item'             => __( 'Edit Addon Post', 'controlled-chaos-addon' ),
            'new_item'              => __( 'New Addon Post', 'controlled-chaos-addon' ),
            'view_item'             => __( 'View Addon Post', 'controlled-chaos-addon' ),
            'view_items'            => __( 'View Addon Posts', 'controlled-chaos-addon' ),
            'search_items'          => __( 'Search Addon Posts', 'controlled-chaos-addon' ),
            'not_found'             => __( 'No Addon Posts Found', 'controlled-chaos-addon' ),
            'not_found_in_trash'    => __( 'No Addon Posts Found in Trash', 'controlled-chaos-addon' ),
            'parent_item_colon'     => __( 'Parent Addon Post', 'controlled-chaos-addon' ),
            'featured_image'        => __( 'Featured image for this addon post', 'controlled-chaos-addon' ),
            'set_featured_image'    => __( 'Set featured image for this addon post', 'controlled-chaos-addon' ),
            'remove_featured_image' => __( 'Remove featured image for this addon post', 'controlled-chaos-addon' ),
            'use_featured_image'    => __( 'Use as featured image for this addon post', 'controlled-chaos-addon' ),
            'archives'              => __( 'Addon Post archives', 'controlled-chaos-addon' ),
            'insert_into_item'      => __( 'Insert into Addon Post', 'controlled-chaos-addon' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Addon Post', 'controlled-chaos-addon' ),
            'filter_items_list'     => __( 'Filter Addon Posts', 'controlled-chaos-addon' ),
            'items_list_navigation' => __( 'Addon Posts list navigation', 'controlled-chaos-addon' ),
            'items_list'            => __( 'Addon Posts List', 'controlled-chaos-addon' ),
            'attributes'            => __( 'Addon Post Attributes', 'controlled-chaos-addon' ),
            'parent_item_colon'     => __( 'Parent Addon Post', 'controlled-chaos-addon' ),
        ];

        $args = [
            'label'               => __( 'Addon Posts', 'controlled-chaos-addon' ),
            'labels'              => $labels,
            'description'         => __( 'Custom post type description.', 'controlled-chaos-addon' ),
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_rest'        => false,
            'rest_base'           => 'cca_post_type_rest_api',
            'has_archive'         => true,
            'show_in_menu'        => true,
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
            'hierarchical'        => false,
            'rewrite'             => [
                'slug'       => 'custom-posts',
                'with_front' => true
            ],
            'query_var'           => 'cca_post_type',
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-admin-post',
            'supports'            => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'author',
                'page-attributes',
                'post-formats'
            ],
            'taxonomies'          => [
                'category',
                'post_tag',
                'cca_taxonomy' // Change to your custom taxonomy name.
            ],
        ];

        register_post_type(
            'cca_post_type',
            $args
        );

    }

}

// Run the class.
new Post_Types_Register;