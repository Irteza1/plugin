<?php
/**
 * Plugin Name: Portfolio Post Type
 * Plugin URI: https://customposttype.com/
 * Description: This is custom Post Type activation Plugin.
 * Author: Portfolio Developer
 * Author URI: https://customposttype.com/
 * Version: 1.0
 * 
 * 
 *
 */

 
function  wb_create_portfolio_cpt() {

	$labels = array(
		'name' => _x( 'Portfolio', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Portfolio', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Portfolio', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Portfolio', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Portfolio Archives', 'textdomain' ),
		'attributes' => __( 'Portfolio Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Portfolio:', 'textdomain' ),
		'all_items' => __( 'All Portfolio', 'textdomain' ),
		'add_new_item' => __( 'Add New Portfolio', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Portfolio', 'textdomain' ),
		'edit_item' => __( 'Edit Portfolio', 'textdomain' ),
		'update_item' => __( 'Update Portfolio', 'textdomain' ),
		'view_item' => __( 'View Portfolio', 'textdomain' ),
		'view_items' => __( 'View Portfolio', 'textdomain' ),
		'search_items' => __( 'Search Portfolio', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Portfolio', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Portfolio', 'textdomain' ),
		'items_list' => __( 'Portfolio list', 'textdomain' ),
		'items_list_navigation' => __( 'Portfolio list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Portfolio list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Portfolio', 'textdomain' ),
		'description' => __( 'Portfolio Custom Post Type', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'page-attributes', 'post-formats'),
		'taxonomies' => array('category', 'post_tag'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'wb_create_portfolio_cpt', 0 );


add_action( 'pre_get_posts', 'wb_add_my_post_types_to_query' ); 
function  wb_add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'portfolio' ) );
    return $query;
}