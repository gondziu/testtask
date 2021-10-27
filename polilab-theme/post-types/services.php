<?php

/**
 * Registers the `services` post type.
 */
function services_init() {
	register_post_type( 'services', array(
		'labels'                => array(
			'name'                  => __( 'Services', 'polilab-theme' ),
			'singular_name'         => __( 'Services', 'polilab-theme' ),
			'all_items'             => __( 'All Services', 'polilab-theme' ),
			'archives'              => __( 'Services Archives', 'polilab-theme' ),
			'attributes'            => __( 'Services Attributes', 'polilab-theme' ),
			'insert_into_item'      => __( 'Insert into Services', 'polilab-theme' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Services', 'polilab-theme' ),
			'featured_image'        => _x( 'Featured Image', 'services', 'polilab-theme' ),
			'set_featured_image'    => _x( 'Set featured image', 'services', 'polilab-theme' ),
			'remove_featured_image' => _x( 'Remove featured image', 'services', 'polilab-theme' ),
			'use_featured_image'    => _x( 'Use as featured image', 'services', 'polilab-theme' ),
			'filter_items_list'     => __( 'Filter Services list', 'polilab-theme' ),
			'items_list_navigation' => __( 'Services list navigation', 'polilab-theme' ),
			'items_list'            => __( 'Services list', 'polilab-theme' ),
			'new_item'              => __( 'New Services', 'polilab-theme' ),
			'add_new'               => __( 'Add New', 'polilab-theme' ),
			'add_new_item'          => __( 'Add New Services', 'polilab-theme' ),
			'edit_item'             => __( 'Edit Services', 'polilab-theme' ),
			'view_item'             => __( 'View Services', 'polilab-theme' ),
			'view_items'            => __( 'View Services', 'polilab-theme' ),
			'search_items'          => __( 'Search Services', 'polilab-theme' ),
			'not_found'             => __( 'No Services found', 'polilab-theme' ),
			'not_found_in_trash'    => __( 'No Services found in trash', 'polilab-theme' ),
			'parent_item_colon'     => __( 'Parent Services:', 'polilab-theme' ),
			'menu_name'             => __( 'Services', 'polilab-theme' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'           => false,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'services',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'services_init' );

/**
 * Sets the post updated messages for the `services` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `services` post type.
 */
function services_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['services'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Services updated. <a target="_blank" href="%s">View Services</a>', 'polilab-theme' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'polilab-theme' ),
		3  => __( 'Custom field deleted.', 'polilab-theme' ),
		4  => __( 'Services updated.', 'polilab-theme' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Services restored to revision from %s', 'polilab-theme' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Services published. <a href="%s">View Services</a>', 'polilab-theme' ), esc_url( $permalink ) ),
		7  => __( 'Services saved.', 'polilab-theme' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Services submitted. <a target="_blank" href="%s">Preview Services</a>', 'polilab-theme' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Services scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Services</a>', 'polilab-theme' ),
		date_i18n( __( 'M j, Y @ G:i', 'polilab-theme' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Services draft updated. <a target="_blank" href="%s">Preview Services</a>', 'polilab-theme' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'services_updated_messages' );
