<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
$args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
) );
$posts = get_posts( $args );
$post_options = array();
if ( $posts ) {
    foreach ( $posts as $post ) {
        $post_options [ $post->ID ] = $post->post_title;
    }
}
return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_igv_';

	/**
	 * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
	 */


  // PROPERTY METABOXES
  $cmb_property = new_cmb2_box( array(
    'id'            => $prefix . 'property_metabox',
    'title'         => esc_html__( 'Information', 'cmb2' ),
    'object_types'  => array( 'property', ), // Post type
  ) );

  $cmb_property->add_field( array(
    'name'       => esc_html__( 'Summary', 'cmb2' ),
    'id'         => $prefix . 'property_summary',
    'type'       => 'textarea_small',
  ) );

  $cmb_property->add_field( array(
    'name'       => esc_html__( 'Gallery', 'cmb2' ),
    'id'         => $prefix . 'property_gallery',
    'type'       => 'file_list',
  ) );

  $cmb_property->add_field( array(
    'name'       => esc_html__( 'Bottom image', 'cmb2' ),
    'id'         => $prefix . 'property_bottom_image',
    'type'       => 'file',
  ) );

  // PRESS QUOTES METABOXES
  $cmb_property = new_cmb2_box( array(
    'id'            => $prefix . 'press_metabox',
    'title'         => esc_html__( 'Information', 'cmb2' ),
    'object_types'  => array( 'press_quote', ), // Post type
  ) );

  $cmb_property->add_field( array(
    'name'       => esc_html__( 'Quote Text', 'cmb2' ),
    'id'         => $prefix . 'quote_text',
    'type'       => 'textarea_small',
  ) );

  $cmb_property->add_field( array(
    'name'       => esc_html__( 'Quote Link', 'cmb2' ),
    'id'         => $prefix . 'quote_link',
    'type'       => 'text_url',
  ) );

  // HOME PAGE METABOXES
  $home_page = get_page_by_path('home');

  if (!empty($home_page) ) {
    $cmb_home = new_cmb2_box( array(
      'id'            => $prefix . 'home_metabox',
      'title'         => esc_html__( 'Options', 'cmb2' ),
      'object_types'  => array( 'page', ), // Post type
      'show_on'      => array( 'key' => 'id', 'value' => array($home_page->ID) ),
    ) );

    $cmb_home->add_field( array(
      'name'       => esc_html__( 'Splash Text', 'cmb2' ),
      'id'         => $prefix . 'splash_text',
      'type'       => 'textarea_small',
    ) );

    $cmb_home->add_field( array(
      'name'       => esc_html__( 'Splash Image', 'cmb2' ),
      'id'         => $prefix . 'splash_image',
      'type'       => 'file',
    ) );

    // Get quote posts, to be used as slect field values
    $press_quote_posts = get_posts_as_options('press_quote');

    // Generate this field 3 times
    for($i = 1; $i <= 3; $i++) {
      $cmb_home->add_field( array(
        'name'       => esc_html__( 'Press Quote #' . $i, 'cmb2' ),
        'id'         => $prefix . 'home_press_quote_' . $i,
        'type'       => 'select',
        'show_option_none' => true,
        'options' => $press_quote_posts,
      ) );
    }
  }

  // WHAT WE DO PAGE METABOXES
  $what_we_do_page = get_page_by_path('what-we-do');

  if (!empty($what_we_do_page) ) {
    $cmb_what_we_do = new_cmb2_box( array(
      'id'            => $prefix . 'what_we_do_metabox',
      'title'         => esc_html__( 'Homepage options', 'cmb2' ),
      'object_types'  => array( 'page', ), // Post type
      'show_on'      => array( 'key' => 'id', 'value' => array($what_we_do_page->ID) ),
    ) );
  }

  $cmb_what_we_do->add_field( array(
    'name'       => esc_html__( 'Homepage Summary', 'cmb2' ),
    'id'         => $prefix . 'what_we_do_home_summary',
    'type'       => 'textarea_small',
  ) );
}

// Returns an array of quote posts
function get_posts_as_options($post_type) {
  $posts = get_posts( array(
    'post_type' => $post_type,
    'nopaging' => true,
  ));

  $posts_as_options = array();

  for($i = 0; $i < count($posts); $i++) {
    $post = $posts[$i];
    $posts_as_options[$post->ID] = $post->post_title;
  }

  return $posts_as_options;
}
?>
